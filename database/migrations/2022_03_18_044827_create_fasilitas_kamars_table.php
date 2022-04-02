<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFasilitasKamarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fasilitas_kamars', function (Blueprint $table) {
            $table->id();
            $table->text('nama_fasilitas');
            $table->unsignedBigInteger('id_tipe');
            $table->timestamps();

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
        Schema::dropIfExists('fasilitas_kamars');
    }
}
