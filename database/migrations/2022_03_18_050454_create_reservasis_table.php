<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservasis', function (Blueprint $table) {
            $table->id();
            $table->string('uid');
            $table->unsignedBigInteger('id_tamu');
            $table->date('check_in');
            $table->date('check_out');
            $table->string('jumlah_kamar');
            $table->unsignedBigInteger('id_tipe');
            $table->unsignedBigInteger('id_kamar');
            $table->string('status');
            $table->string('total');
            $table->timestamps();

            $table->foreign('id_kamar')->references('id')->on('kamars')->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('id_tamu')->references('id')->on('tamus')->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('id_tipe')->references('id')->on('tipe_kamars')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservasis');
    }
}
