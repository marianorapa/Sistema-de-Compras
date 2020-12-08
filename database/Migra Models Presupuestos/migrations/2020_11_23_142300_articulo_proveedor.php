<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ArticuloProveedor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('articulo_proveedor', function(Blueprint $table){
            $table->unsignedBigInteger('ArticuloID');
            $table->unsignedBigInteger('ProveedorID');
            $table->date('FechaDesde');
            $table->date('FechaHasta')->nullable();
            $table->foreign('ProveedorID')->references('ProveedorID')->on('proveedores');
            $table->foreign('ArticuloID')->references('ArticuloID')->on('articulos');
            $table->primary(['ArticuloID','ProveedorID']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        schema::dropIfExists('articulo_proveedor');
    }
}
