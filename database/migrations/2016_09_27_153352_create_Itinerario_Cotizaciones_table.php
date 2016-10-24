<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItinerarioCotizacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itinerario_cotizaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo',120)->nullable();
            $table->longText('descripcion')->nullable();
            $table->integer('dias')->nullable();
            $table->date('fecha')->nullable();
            $table->string('imagen',124)->nullable();
            $table->integer('estado')->nullable();
            $table->integer('paquete_cotizaciones_id');
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
        Schema::dropIfExists('itinerario_cotizaciones');
    }
}
