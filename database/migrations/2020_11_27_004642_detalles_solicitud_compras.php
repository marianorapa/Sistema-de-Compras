<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DetallesSolicitudCompras extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('detalles_solicitud_compras', function(Blueprint $table){
            $table->integer('Cantidad');
            $table->Date('FechaResposicionEstimada');
            $table->unsignedBiginteger('ArticuloID');
            $table->unsignedBiginteger('SolicitudCompraID');
            $table->foreign('ArticuloID')->references('ArticuloID')->on('articulos');
            $table->foreign('SolicitudCompraID')->references('SolicitudCompraID')->on('solicitud_compras');
            $table->primary(['ArticuloID','SolicitudCompraID']);
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
