<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservedRoom extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_reservasi',
        'id_kamar',
    ];

    protected $table = 'reserved_rooms';

    public function reservasi()
    {
        return $this->belongsTo('App\Models\Reservasi', 'id_reservasi', 'id');
    }

    public function kamar()
    {
        return $this->belongsTo('App\Models\Kamar', 'id_kamar', 'id');
    }
}
