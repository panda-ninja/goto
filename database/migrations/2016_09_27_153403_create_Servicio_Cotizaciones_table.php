<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicioCotizacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicio_cotizaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('precio')->nullable();
            $table->longText('observaciones')->nullable();
            $table->integer('idvarios')->nullable();
            $table->string('tiposervicio', 60)->nullable();
            $table->string('verificaciom', 60)->nullable();
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
        Schema::dropIfExists('servicio_cotizaciones');
    }
}
