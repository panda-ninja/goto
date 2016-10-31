<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicioExtrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicio_extras', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo',120)->nullable();
            $table->longText('descripcion')->nullable();
            $table->decimal('precio')->nullable();
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
        Schema::dropIfExists('servicio_extras');
    }
}
