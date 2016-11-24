<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncluyePaqueteCotizacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incluye_paquete_cotizaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('incluye_paquetes_id');
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
        Schema::dropIfExists('incluye_paquete_cotizaciones');
    }
}
