<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('concepto', 120)->nullable();
            $table->decimal('monto')->nullable();
            $table->date('fecha')->nullable();
            $table->date('vencimiento')->nullable();
            $table->string('medio', 60)->nullable();
            $table->string('transaccion', 60)->nullable();
            $table->integer('estado')->nullable();
            $table->integer('cotizaciones_id')->nullable();
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
        Schema::dropIfExists('pagos');
    }
}
