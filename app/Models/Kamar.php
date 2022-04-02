<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_kamar',
        'id_fasilitas_kamar',
        'id_tipe',
        'id_status',
    ];

    protected $table = 'kamars';

    public function tipe()
    {
        return $this->belongsTo('App\Models\TipeKamar', 'id_tipe', 'id');
    }

    public function status()
    {
        return $this->belongsTo('App\Models\Status', 'id_status', 'id');
    }

    public function fasilitas_kamar()
    {
        return $this->belongsTo('App\Models\FasilitasKamar', 'id_fasilitas_kamar', 'id');
    }

    public function reserved()
    {
        return $this->hasMany('App\Models\ReservedRoom', 'id_kamar', 'id');
    }

    public function reservasi()
    {
        return $this->hasMany('App\Models\Reservasi', 'id_kamar', 'id');
    }
}
