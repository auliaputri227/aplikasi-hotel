<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Reservasi;
use App\Models\ReservedRoom;
use App\Models\Tamu;
use App\Models\TipeKamar;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use PDF;

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
            'jumlah_kamar' => '1',
            'id_tipe' => $request->id_tipe,
            'id_kamar' => $kamar->id,
            'status' => 'Reserved',
            'total' => $request->total,
        ]);

        $reserved = [];
        $id_tipes = TipeKamar::select('id')->where('stok', '>=', $request->jumlah)->where('id', $request->id_tipe)->first();

        if (empty($id_tipes)) {
            return redirect()->back();
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
        return view('detail-reservasi');
    }

    public function downloadBukti()
    {
        $data = [
            'title' => 'Welcome to ItSolutionStuff.com',
            'date' => date('m/d/Y')
        ];

        $pdf = PDF::loadView('detail-reservasi', $data);

        return $pdf->download('itsolutionstuff.pdf');
    }
}
