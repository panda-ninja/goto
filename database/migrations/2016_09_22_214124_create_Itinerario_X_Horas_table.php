<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItinerarioXHorasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itinerario_x_horas', function (Blueprint $table) {
            $table->increments('id');
            $table->time('hora')->nullable();
            $table->longText('descripcion')->nullable();
            $table->integer('estado')->nullable();
            $table->integer('itinerario_personalizados_id');
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
        Schema::dropIfExists('itinerario_x_horas');
    }
}
