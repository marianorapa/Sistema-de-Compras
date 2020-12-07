<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SolicitudesPresupuestos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create(solicitudes_presupuestos, function(Blueprint $table){
            $table->id('SolicitudPresupuestoID');
            $table->date('FechaRegistro');
            $table->foreign('UsuarioID')->references('name')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        schema::dropIfExists('solicitudes_presupuestos');
    }
}
