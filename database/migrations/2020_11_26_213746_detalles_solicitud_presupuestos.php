<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DetallesSolicitudPresupuestos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('detalles_solicitud_presupuestos', function(Blueprint $table){
            $table->id('ItemID');
            $table->integer('Cantidad');
            $table->unsignedBiginteger('ArticuloID');
            $table->unsignedBiginteger('SolicitudPresupuestoID');
            $table->unsignedBiginteger('ProveedorID');
            $table->foreign('ArticuloID')->references('ArticuloID')->on('articulos');
            $table->foreign('ProveedorID')->references('ProveedorID')->on('proveedores');
            $table->foreign('SolicitudPresupuestoID')->references('SolicitudPresupuestoID')->on('solicitudes_presupuestos');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        schema::dropIfExists('solicitud_compras');
    }
}
