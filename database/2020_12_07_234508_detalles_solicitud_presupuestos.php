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
        schema::create('deta_soli_presu', function(Blueprint $table){
          
            $table->integer('Cantidad');
            $table->unsignedBiginteger('ArtiID');
            $table->unsignedBiginteger('SoliPresuID');
            $table->unsignedBiginteger('ProveID');
            $table->foreign('ArtiID')->references('ArticuloID')->on('articulos');
            $table->foreign('SoliPresuID')->references('SolicitudPresupuestoID')->on('solicitudes_presupuestos');
            $table->foreign('ProveID')->references('ProveedorID')->on('proveedores');
            $table->primary(['ArtiID','SoliPresuID', 'ProveID']);
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        schema::dropIfExists('deta_soli_presu');
    }
}
