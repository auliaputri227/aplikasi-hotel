<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FasilitasKamar extends Model
{
    use HasFactory;

    protected $fillable = ['nama_fasilitas', 'id_tipe'];

    protected $table = 'fasilitas_kamars';

    public function kamar()
    {
        return $this->hasMany('App\Models\Kamars', 'id_fasilitas_kamar', 'id');
    }
}
