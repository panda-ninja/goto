<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrecioPaquetesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('precio_paquetes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('estrellas')->nullable();
            $table->decimal('precio_s')->nullable();
            $table->integer('personas_s')->nullable();
            $table->decimal('precio_d')->nullable();
            $table->integer('personas_d')->nullable();
            $table->decimal('precio_t')->nullable();
            $table->integer('personas_t')->nullable();
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
        Schema::dropIfExists('precio_paquetes');
    }
}
