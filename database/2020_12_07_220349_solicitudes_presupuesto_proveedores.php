<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SolicitudesPresupuestoProveedores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('soli_presu_prove', function(Blueprint $table){
            $table->unsignedBigInteger('SolicitudPresupuestoID');
            $table->unsignedBigInteger('ProveedorID');
            $table->date('FechaRegistro');
            $table->foreign('ProveedorID')->references('ProveedorID')->on('proveedores');
            $table->foreign('SolicitudPresupuestoID')->references('SolicitudPresupuestoID')->on('solicitudes_presupuestos');
            $table->primary(['ProveedorID','SolicitudPresupuestoID']);
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        schema::dropIfExists('solicitudes_presupuesto_proveedores');
    }
}
