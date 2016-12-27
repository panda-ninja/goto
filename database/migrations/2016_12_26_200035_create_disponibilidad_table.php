<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDisponibilidadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tdisponibilidad', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('idpaquete')->nullable();
        $table->date('fecha_disponibilidad')->nullable();
        $table->integer('nro_dias',2)->nullable();
        $table->string('tipo_promo',45)->nullable();
        $table->integer('precio',5)->nullable();
        $table->integer('stock',2)->nullable();
        $table->integer('estado',1)->nullable();
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
        Schema::dropIfExists('tdisponibilidad');
    }
}
