<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FasilitasHotel extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_fasilitas',
        'deskripsi',
        'image',
    ];

    protected $table = 'fasilitas_hotels';
}
