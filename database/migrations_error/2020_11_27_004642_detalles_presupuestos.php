<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DetallesPresupuestos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('detalles_presupuestos', function(Blueprint $table){
            $table->id('ItemID');
            $table->integer('Cantidad');
            $table->money('PrecioUnitario');
            $table->decimal('Descuento');
            $table->Date('FechaResposicionEstimada');
            $table->date('FechaEntregado')->nullable();;
            $table->unsignedBiginteger('ArticuloID');
            $table->unsignedBiginteger('PresupuestoID');
            $table->foreign('ArticuloID')->references('ArticuloID')->on('articulos');
            $table->foreign('PresupuestoID')->references('PresupuestoID')->on('presupuestos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        schema::dropIfExists('detalles_solicitud_compras');
    }
}
