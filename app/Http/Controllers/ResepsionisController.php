<?php

namespace App\Http\Controllers;

use App\Models\Reservasi;
use App\Models\Tamu;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PDF;

class resepsionisController extends Controller
{
    public function daftar()
    {
        $reservasi = Reservasi::all();
        $tamu = Tamu::all();
        $id = 1;
        return view('resepsionis.d-tamu', compact('reservasi', 'tamu', 'id'));
    }

    public function checkin(Request $request, $id)
    {

        $db_kode = Tamu::where('id', $id)->first()->kode_reservasi;

        if (Hash::check($request->kode_reservasi, $db_kode)) {
            $update = Reservasi::where('id_tamu', $id)->update([
                'status' => 'Check-In'
            ]);
            return redirect()->route('daftar');
        } else {
            return redirect()->back();
        }
    }

    public function exportPdf()
    {
        $data = [
            'reservasi' => Reservasi::all(),
            'tamu' => Tamu::all(),
        ];

        $pdf = PDF::loadView('resepsionis.laporan-pdf', compact('data'));
        // return view('bukti', compact('data'));

        return $pdf->download('laporan_' . Carbon::now()->format('dmY') . '.pdf');
    }

    // public function d_kamar()
    // {
    //     $reservasi = Reservasi::all();
    //     $tamu = Tamu::all();
    //     $id = 1;
    //     return view('resepsionis.d-tamu', compact('reservasi', 'tamu', 'id'));
    // }
}
