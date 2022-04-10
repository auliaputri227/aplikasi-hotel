<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Reservasi;
use App\Models\ReservedRoom;
use App\Models\Tamu;
use App\Models\TipeKamar;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use PDF;
use Symfony\Component\Console\Input\Input;

class GuestController extends Controller
{
    public function kamar()
    {
        $kamar = Kamar::all();
        $tipe_kamar = TipeKamar::all();

        return view('kamar', compact('tipe_kamar', 'kamar'));
    }

    public function index()
    {
        return view('index');
    }
    public function fasilitas()
    {
        return view('fasilitas');
    }

    public function stored_reser(Request $request)
    {
        $request->validate([
            'nama_pemesan',
            'no_identitas',
            'email_tamu',
            'telp_tamu',
        ]);

        $str_rand = Str::random(10);

        $tamu = '';

        if (isset($request->nama_tamu)) {
            $tamu = $request->nama_tamu;
        } else {
            $tamu = $request->nama_pemesan;
        }

        $id_tipes = TipeKamar::select('id')->where('stok', '>=', $request->jumlah)->where('id', $request->id_tipe)->first();

        if (empty($id_tipes)) {
            return redirect()->back()->withInput()->with('stok', 'Stok kurang dari jumlah!');
        }

        $id_tamu = Tamu::insertGetId([
            'nama_pemesan' => $request->nama_pemesan,
            'no_identitas' => $request->no_identitas,
            'nama_tamu' => $tamu,
            'email_tamu' => $request->email,
            'telp_tamu' => $request->no_hp,
            'kode_reservasi' => Hash::make($str_rand),
            'bukti' => $str_rand,
        ]);

        $kamar = Kamar::where('id_tipe', $request->id_tipe)->first();
        // dd($request);
        $uid = Str::uuid();

        $id_reservasi = Reservasi::insertGetId([
            'id_tamu' => $id_tamu,
            'uid' => $uid,
            'check_in' => $request->check_in,
            'check_out' => $request->check_in,
            'jumlah_kamar' => $request->jumlah,
            'id_tipe' => $request->id_tipe,
            'id_kamar' => $kamar->id,
            'status' => 'Reserved',
            'total' => $request->total,
        ]);

        $reserved = [];
        $id_tipes = TipeKamar::select('id')->where('stok', '>=', $request->jumlah)->where('id', $request->id_tipe)->first();

        if (empty($id_tipes)) {
            return redirect()->back()->withInput()->with('stok', 'Stok kurang dari jumlah!');
        }

        $kamars = Kamar::where('id_tipe', $id_tipes->id)->where('id_status', '2')->limit($request->jumlah)->get();

        foreach ($kamars as $no => $kmr) {
            array_push($reserved, array(
                'id_reservasi' => $id_reservasi,
                'id_kamar' => $kmr->id
            ));
        };

        // dd($reserved);

        ReservedRoom::insert($reserved);

        return redirect()->route('detail-res', $uid);
    }

    public function detail_res($id)
    {
        $res = Reservasi::where('uid', $id)->first();

        $data = [
            'reservasi' => Reservasi::where('uid', $id)->first(),
            'tamu' => Tamu::where('id', $res->id_tamu)->first(),
            'reserved' => ReservedRoom::where('id_reservasi', $res->id)->get(),
            'kamar' => Kamar::all(),
            'tipe' => TipeKamar::all(),
        ];
        return view('detail-reservasi', compact('data'));
    }

    public function downloadBukti($id)
    {
        $res = Reservasi::where('uid', $id)->first();

        $data = [
            'reservasi' => Reservasi::where('uid', $id)->first(),
            'tamu' => Tamu::where('id', $res->id_tamu)->first(),
            'reserved' => ReservedRoom::where('id_reservasi', $res->id)->get(),
            'kamar' => Kamar::all(),
            'tipe' => TipeKamar::all(),
        ];

        $pdf = PDF::loadView('bukti', compact('data'));
        // return view('bukti', compact('data'));

        return $pdf->download($data['tamu']->nama_tamu . '_' . date('dmY', strtotime(Carbon::now())) . '.pdf');
    }
}
