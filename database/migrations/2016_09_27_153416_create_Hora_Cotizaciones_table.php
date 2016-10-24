<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHoraCotizacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hora_cotizaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->time('hora')->nullable();
            $table->longText('descripcion')->nullable();
            $table->integer('estado')->nullable();
            $table->integer('itinerario_cotizaciones_id');
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
        Schema::dropIfExists('hora_cotizaciones');
    }
}
