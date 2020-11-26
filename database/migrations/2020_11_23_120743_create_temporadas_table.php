<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemporadasTable extends Migration
{
    public function up()
    {
        Schema::create('temporadas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('numero')->nullable();
            $table->integer('anime_id');

            $table->foreign('anime_id')
            ->references('id')
            ->on('animes');

        });

    }
    public function down()
    {
        Schema::dropIfExists('temporadas');
    }
}
