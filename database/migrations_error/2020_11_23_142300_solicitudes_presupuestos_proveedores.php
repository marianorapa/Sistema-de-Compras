<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SolicitudPresupuestoProveedor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('solicitudes_presupuestos_proveedores', function(Blueprint $table){
            $table->unsignedBigInteger('SolicitudPresupuestoID');
            $table->unsignedBigInteger('ProveedorID');
            $table->date('FechaRegistro');
            $table->foreign('SolicitudPresupuestoID')->references('SolicitudPresupuestoID')->on('solicitudes_presupuestos');
            $table->foreign('ProveedorID')->references('ProveedorID')->on('proveedores');
            $table->primary(['SolicitudPresupuestoID','ProveedorID']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        schema::dropIfExists('solicitudes_presupuestos_proveedores');
    }
}
