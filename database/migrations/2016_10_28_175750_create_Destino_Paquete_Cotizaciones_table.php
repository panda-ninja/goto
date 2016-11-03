<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDestinoPaqueteCotizacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('destino_paquete_cotizaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('destino_cotizaciones_id');
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
        Schema::dropIfExists('destino_paquete_cotizaciones');
    }
}
