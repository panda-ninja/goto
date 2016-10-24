<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaqueteCotizacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paquete_cotizaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo',15)->unique()->nullable();
            $table->string('titulo',120)->nullable();
            $table->integer('duracion')->nullable();
            $table->decimal('preciocosto')->nullable();
            $table->longText('descripcion')->nullable();
            $table->longText('incluye')->nullable();
            $table->longText('noincluye')->nullable();
            $table->longText('opcional')->nullable();
            $table->string('imagen',124)->nullable();
            $table->integer('estado')->nullable();
            $table->integer('cotizaciones_id');
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
        Schema::dropIfExists('paquete_cotizaciones');
    }
}
