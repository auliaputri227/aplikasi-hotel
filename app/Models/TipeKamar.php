<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipeKamar extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipe_kamar',
        'deskripsi',
        'foto',
        'harga',
    ];

    protected $table = 'tipe_kamars';

    public function kamar()
    {
        return $this->hasMany('App\Models\Kamar', 'id', 'id_tipe');
    }
}
