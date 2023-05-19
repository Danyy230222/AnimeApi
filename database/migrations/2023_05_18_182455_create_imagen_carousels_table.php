<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagenCarouselsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imagen_carousels', function (Blueprint $table) {
            $table->id();
            $table->string('Logo');
            $table->string('Sinopsis');
            $table->string('ImagenWeb');
            $table->string('ImagenMovil');
            $table->string('Tipo');
            $table->integer('Year');
            $table->string('Subtitulado');
            $table->string('Doblado');
            $table->unsignedBigInteger('carousel_id');
            $table->foreign('carousel_id')->references('id')->on('carousels');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('imagen_carousels');
    }
}
