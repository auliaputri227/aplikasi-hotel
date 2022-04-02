<?php

namespace App\Http\Controllers;

use App\Models\FasilitasHotel;
use App\Models\FasilitasKamar;
use App\Models\Kamar;
use App\Models\Status;
use App\Models\TipeKamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    // kamar
    public function kamar()
    {
        $tipe_kamar = TipeKamar::all();
        $status = Status::all();
        $kamar = Kamar::all();
        return view('admin.kamar.kamar', compact('tipe_kamar', 'kamar', 'status'));
    }

    public function tambah_kamar()
    {
        $kamar = Kamar::OrderBy('id', 'desc')->first()->no_kamar;
        $tipe_kamar = TipeKamar::all();
        $fasilitas_kamar = FasilitasKamar::all();
        return view('admin.kamar.tambah_kamar', compact('tipe_kamar', 'kamar', 'fasilitas_kamar'));
    }

    public function kamar_stored(Request $request)
    {
        $request->validate([
            'no_kamar',
            'id_tipe',
            'fasilitas_kamar',
        ]);

        $tambah = Kamar::insert([
            'no_kamar' => $request->no_kamar,
            'id_tipe' => $request->id_tipe,
            'id_fasilitas_kamar' => $request->fasilitas_kamar,
            'id_status' => '2'
        ]);

        return redirect()->route('kamar');
    }

    public function edit_kamar($id)
    {
        // $tipe_kamar = TipeKamar::where('id', $id)->first();
        $status = Status::all();
        $kamar = Kamar::where('id', $id)->first();
        $tipe_kamar_all = TipeKamar::all();
        return view('admin.kamar.edit', compact('kamar', 'tipe_kamar_all', 'status'));
    }

    public function kamar_update(Request $request, $id)
    {
        // dd($request);
        $update = Kamar::find($id)->update([
            'id_tipe' => $request->id_tipe,
            'id_status' => $request->status
        ]);
        return redirect()->route('kamar');
    }

    public function kamar_destroy($id)
    {
        $post = Kamar::find($id);
        $post->delete();

        return redirect()->route('kamar');
    }
    // end kamar

    // faslitas kamar
    public function faska()
    {
        $tipe_kamar = TipeKamar::all();
        $faska = FasilitasKamar::all();
        return view('admin.fasilitas_kamar.f-kamar', compact('tipe_kamar', 'faska'));
    }

    public function edit_faska($id)
    {
        $tipe_kamar = TipeKamar::where('id', $id)->first();
        $faska = FasilitasKamar::where('id', $id)->first();
        $tipe_kamar_all = TipeKamar::all();
        return view('admin.fasilitas_kamar.edit_faska', compact('tipe_kamar', 'faska', 'tipe_kamar_all'));
    }

    public function faska_update(Request $request, $id)
    {
        // dd($request);
        $update = FasilitasKamar::find($id)->update([
            'id_tipe' => $request->id_tipe,
            'nama_fasilitas' => $request->nama_fasilitas,
        ]);
        return redirect()->route('faska');
    }

    public function faska_tambah()
    {
        $tipe_kamar = TipeKamar::all();
        $fasilitas_kamar = FasilitasKamar::all();
        return view('admin.fasilitas_kamar.tambah_faska', compact('tipe_kamar', 'fasilitas_kamar'));
    }

    public function faska_stored(Request $request)
    {
        $request->validate([
            'id_tipe',
            'nama_fasilitas',
        ]);

        $tambah = FasilitasKamar::insert([
            'id_tipe' => $request->id_tipe,
            'nama_fasilitas' => $request->nama_fasilitas,
        ]);

        return redirect()->route('faska');
    }

    public function faska_destroy($id)
    {
        $post = FasilitasKamar::find($id);
        $post->delete();

        return redirect()->route('faska');
    }
    // end fasilitas kamar

    // fasilitas hotel
    public function fasha()
    {
        $fasha = FasilitasHotel::all();
        return view('admin.fasilitas_hotel.f-hotel', compact('fasha'));
    }

    public function edit_fasha($id)
    {
        // $tipe_kamar = TipeKamar::where('id', $id)->first();
        $fasha = FasilitasHotel::where('id', $id)->first();
        // $tipe_kamar_all = TipeKamar::all();
        return view('admin.fasilitas_hotel.edit_fasha', compact('fasha'));
    }

    public function fasha_update(Request $request, $id)
    {
        // dd($request);
        $nm = $request->foto;
        $namafile = time() . rand(100, 999) . "." . $nm->getClientOriginalExtension();

        $update = FasilitasHotel::find($id)->update([
            'nama_fasilitas' => $request->nama_fasilitas,
            'image' => $namafile,
            'deskripsi' => $request->deskripsi,
        ]);

        File::delete(public_path(). '/assets' . '/' . FasilitasHotel::where('id', $id)->first()->foto);
        $nm->move(public_path() . '/assets', $namafile);
        return redirect()->route('fasha');
    }

    public function fasha_tambah()
    {
        $tipe_kamar = TipeKamar::all();
        return view('admin.fasilitas_hotel.tambah_fasha', compact('tipe_kamar'));
    }

    public function fasha_stored(Request $request)
    {
        $request->validate([
            'foto',
            'nama_fasilitas',
            'deskripsi',
        ]);

        $nm = $request->foto;
        $namafile = time() . rand(100, 999) . "." . $nm->getClientOriginalExtension();

        $tambah = FasilitasHotel::insert([
                'image' => $namafile,
                'nama_fasilitas' => $request->nama_fasilitas,
                'deskripsi' => $request->deskripsi,
            ]);

        $nm->move(public_path() . '/assets', $namafile);
        return redirect()->route('fasha');
    }

    public function fasha_destroy($id)
    {
        $post = FasilitasHotel::find($id);
        $post->delete();

        return redirect()->route('fasha');
    }
    // end fasilitas hotel
}
