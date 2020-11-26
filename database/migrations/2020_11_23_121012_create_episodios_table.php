<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEpisodiosTable extends Migration
{
    public function up()
    {
        Schema::create('episodios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('numero')->nullable();
            $table->integer('temporada_id');

            $table->foreign('temporada_id')->references('id')
            ->on('temporadas');
            
        });
    }

    public function down()
    {
        Schema::dropIfExists('episodios');
    }
}
