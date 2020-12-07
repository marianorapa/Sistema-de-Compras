<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EstadosSolicitudCompras extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('estados_solicitud_compras', function(Blueprint $table){
            $table->string('EstadoID',25);
            $table->dateTime('FechaHora');
            $table->unsignedBigInteger('ResponsableID');
            $table->unsignedBigInteger('AdminComprasID')->nullable();
            $table->unsignedBiginteger('SolicitudCompraID');
            //fks
            $table->foreign('EstadoID')->references('EstadoID')->on('estados');
            $table->foreign('SolicitudCompraID')->references('SolicitudCompraID')->on('solicitud_compras');
            $table->foreign('ResponsableID')->references('id')->on('users');
            $table->foreign('AdminComprasID')->references('id')->on('users');
            //pk
            $table->primary(['EstadoID','SolicitudCompraID']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        schema::dropIfExists('estados_solicitud_compras');
    }
}
