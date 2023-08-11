<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDobladosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doblados', function (Blueprint $table) {
            $table->id();
            $table->string('Idioma');
            $table->string('Url');
            $table->unsignedBigInteger('capitulo_id');
            $table->foreign('capitulo_id')->references('id')->on('capitulos')->onDelete('cascade');
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
        Schema::dropIfExists('doblados');
    }
}
