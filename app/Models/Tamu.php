<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tamu extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_pemesan',
        'no_identitas',
        'nama_tamu',
        'email_tamu',
        'telp_tamu',
        'kode_reservasi',
        'bukti',
    ];

    protected $table = 'tamus';

    public function reservasi()
    {
        return $this->hasMany('App\Models\Reservasi', 'id_tamu', 'id');
    }
}
