<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKamarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kamars', function (Blueprint $table) {
            $table->id();
            $table->string('no_kamar');
            $table->unsignedBigInteger('id_tipe');
            $table->unsignedBigInteger('id_fasilitas_kamar');
            $table->unsignedBigInteger('id_status');
            $table->timestamps();

            $table->foreign('id_tipe')->references('id')->on('tipe_kamars')->onDelete('cascade')-> onUpdate('cascade');

            $table->foreign('id_fasilitas_kamar')->references('id')->on('fasilitas_kamars')->onDelete('cascade')-> onUpdate('cascade');

            $table->foreign('id_status')->references('id')->on('statuses')->onDelete('cascade')-> onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kamars');
    }
}
