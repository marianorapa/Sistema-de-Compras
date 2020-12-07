<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Presupuestos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('presupuestos', function(Blueprint $table){
            $table->id('PresupuestoID');
            $table->date('FechaRegistro');
            $table->date('FechaFechaValidez');
            $table->money('DescuentoTotal');
            $table->money('Total');
            $table->foreign('ProveedorID')->references('ProveedorID')->on('proveedores');
            $table->foreign('SolicitudPresupuestoID')->references('SolicitudPresupuestoID')->on('presupuestos');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        schema::dropIfExists('presupuestos');
    }
}
