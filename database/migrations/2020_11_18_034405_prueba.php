<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Prueba extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('establecimientos', function (Blueprint $table) {
             $table->increments('idestablecimientos');
        });

       Schema::create('productos', function (Blueprint $table) {
             $table->increments('idproductos');
             $table->integer('establecimiento_idestablecimientos')->unsigned();
             $table->foreign('establecimiento_idestablecimientos')->references('idestablecimientos')->on('establecimientos');
        });

         Schema::create('detalles', function (Blueprint $table) {
             $table->integer('precio');
             $table->integer('productos_idproductos')->unsigned();
             $table->foreign('productos_idproductos')->references('idproductos')->on('productos');
             $table->increments('cantidad');
         });

         Schema::create('pedidos', function (Blueprint $table) {
             $table->increments('idpedidos');
             $table->integer('detalles_cantidad')->unsigned();
             $table->foreign('detalles_cantidad')->references('cantidad')->on('detalles');
             $table->integer('producto_idproducto')->unsigned();
             $table->foreign('producto_idproducto')->references('idproductos')->on('productos');
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('establecimientos');
        Schema::dropIfExists('productos');
        Schema::dropIfExists('detalles');
        Schema::dropIfExists('pedidos');
    }
}
