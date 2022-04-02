<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();

        DB::table('users')->insert([
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'username' => 'aulia',
            'email' => 'aulia@gmail.com',
            'role' => 'resepsionis',
            'password' => Hash::make('password'),
        ]);

        DB::table('tipe_kamars')->insert([
            'tipe_kamar' => 'duluxe',
            'deskripsi' => 'Deluxe Room is a type that is more than Superior, both in terms of area, facilities and views, such as the sea, mountains, ponds, gardens and so on. This room type is equipped with basic amenities.',
            'foto' => 'duluxe1.jpg',
            'harga' => '1200000',
            'stok' => '0',
        ]);

        DB::table('tipe_kamars')->insert([
            'tipe_kamar' => 'superior',
            'deskripsi' => 'Superior room is a room type that is slightly better than the standard room type. The difference can be from the facilities provided, the interior of the room, or the view from the room',
            'foto' => 'superior1.jpg',
            'harga' => '2170000',
            'stok' => '0',
        ]);

        DB::table('tipe_kamars')->insert([
            'tipe_kamar' => 'premium',
            'deskripsi' => 'The Premier Room has an area of ​​40 square meters, much larger than the Superior Room and Deluxe Room. This room is exposed to natural light that sneaks in from behind the window, giving the room a cozy feel and atmosphere.',
            'foto' => 'superior2.jpg',
            'harga' => '3700000',
            'stok' => '0',
        ]);

        DB::table('statuses')->insert([
            'status' => 'Check Out',
            'kode_status' => 'CO',
        ]);

        DB::table('statuses')->insert([
            'status' => 'Vacant',
            'kode_status' => 'V',
        ]);

        DB::table('statuses')->insert([
            'status' => 'Out Of Order',
            'kode_status' => 'OOO',
        ]);

        DB::table('fasilitas_kamars')->insert([
            'nama_fasilitas' => 'jsohuhwhejhewl',
            'id_tipe' => '1'
        ]);

        DB::table('fasilitas_kamars')->insert([
            'nama_fasilitas' => 'jsohuhwhejhewl',
            'id_tipe' => '1'
        ]);

        DB::table('fasilitas_kamars')->insert([
            'nama_fasilitas' => 'jsohuhwhejhewl',
            'id_tipe' => '2'
        ]);

        DB::table('kamars')->insert([
            'no_kamar' => '111',
            'id_tipe' => '1',
            'id_fasilitas_kamar' => '1',
            'id_status' => '1',
        ]);

        DB::table('kamars')->insert([
            'no_kamar' => '112',
            'id_tipe' => '2',
            'id_fasilitas_kamar' => '1',
            'id_status' => '2',
        ]);

        DB::table('kamars')->insert([
            'no_kamar' => '113',
            'id_tipe' => '3',
            'id_fasilitas_kamar' => '1',
            'id_status' => '3',
        ]);

        DB::table('fasilitas_hotels')->insert([
            'nama_fasilitas' => 'TV',
            'deskripsi' => 'shihpqhwihdw',
            'image' => 'Lorem.png',
        ]);

        DB::table('fasilitas_hotels')->insert([
            'nama_fasilitas' => 'TV',
            'deskripsi' => 'shihpqhwihdw',
            'image' => 'Lorem.png',
        ]);

        // $rand = Str::random(10);

        // DB::table('tamus')->insert([
        //     'nama_pemesan' => 'Aulia',
        //     'no_identitas' => '22',
        //     'nama_tamu' => 'Putri',
        //     'email_tamu' => 'Aulia@gmail.com',
        //     'telp_tamu' => '08673892788',
        //     'kode_reservasi' => Hash::make($rand),
        //     'bukti' => $rand,
        // ]);

        // DB::table('reservasis')->insert([
        //     'id_tamu' => '1',
        //     'check_in' => '2022/2/12',
        //     'check_out' => '2022/2/13`',
        //     'jumlah_kamar' => '1',
        //     'id_tipe' => '2',
        //     'id_kamar' => '1',
        //     'status' => 'Checout',
        //     'total' => '3000000',
        // ]);
    }
}
