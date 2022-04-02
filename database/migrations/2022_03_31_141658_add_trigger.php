<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE TRIGGER stok AFTER INSERT ON reserved_rooms FOR EACH ROW
            BEGIN
                SET @id_tipe = (SELECT id_tipe FROM kamars WHERE id=NEW.id_kamar);
                SET @stok = (SELECT stok FROM tipe_kamars WHERE id=@id_tipe);
                SET @jumlah = (SELECT jumlah_kamar FROM reservasis WHERE id=NEW.id_reservasi);
                SET @sisa = (@stok - @jumlah);
                UPDATE tipe_kamars SET stok = @sisa WHERE id=@id_tipe;
                UPDATE kamars SET id_status = "1" WHERE id=NEW.id_kamar;
            END
        ');

        DB::unprepared('CREATE TRIGGER stok_tipe AFTER INSERT ON kamars FOR EACH ROW
            BEGIN
                SET @stok = (SELECT stok FROM tipe_kamars WHERE id=NEW.id_tipe);
                SET @sisa = (@stok + 1);
                UPDATE tipe_kamars SET stok = @sisa WHERE id=NEW.id_tipe;
            END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `stok`');
    }
}
