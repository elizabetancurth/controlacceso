<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ControlAccesos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('control_accesos', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('resultado', ['Exitoso', 'Contraseña incorrecta', 'Usuario inactivo o no existe' ]);
            $table->string('ruta_imagen');
            $table->enum('tipo_acceso', ['Ingreso', 'Salida']);
            $table->integer('user_id_creacion')->unsigned()->nullable();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('user_id_creacion')->references('id')->on('users')
                ->onUpdate('CASCADE')
                ->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('control_accesos');
    }
}
