<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombres', 100)->nullable();
            $table->string('apellidos', 120)->nullable();
            $table->boolean('sexo')->nullable();
            $table->date('fechanacimiento')->nullable();
            $table->string('nacionalidad', 120)->nullable();
            $table->string('residencia', 120)->nullable();
            $table->longText('restricciones')->nullable();
            $table->longText('alergias')->nullable();
            $table->longText('dieta')->nullable();
            $table->longText('comentarios')->nullable();
            $table->string('pasaporte', 60)->nullable();
            $table->string('telefono', 40)->nullable();
            $table->string('email')->unlique()->nullable();
            $table->string('password')->nullable();
            $table->integer('estado')->nullable();
            $table->integer('clientes_id');
            $table->rememberToken();
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
        Schema::dropIfExists('sub_clientes');
    }
}
