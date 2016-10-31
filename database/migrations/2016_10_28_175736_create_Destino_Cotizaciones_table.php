<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDestinoCotizacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('destino_cotizaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('destino',120)->nullable();
            $table->string('region',120)->nullable();
            $table->string('pais',120)->nullable();
            $table->longText('descripcion')->nullable();
            $table->integer('estado')->nullable();
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
        Schema::dropIfExists('destino_cotizaciones');
    }
}
