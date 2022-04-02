<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_tamu',
        'uid',
        'check_in',
        'check_out',
        'jumlah_kamar',
        'id_tipe',
        'id_kamar',
        'status',
        'total',
    ];

    protected $table = 'reservasis';

    public function tipe()
    {
        return $this->belongsTo('App\Models\Tamu', 'id_tamu', 'id');
    }

    public function kamar()
    {
        return $this->belongsTo('App\Models\Kamar', 'id_kamar', 'id');
    }

    public function tipe_kamar()
    {
        return $this->belongsTo('App\Models\TipeKamar', 'id_tipe', 'id');
    }

    public function reserved()
    {
        return $this->hasMany('App\Models\ReservedRoom', 'id_reservasi', 'id');
    }
}
