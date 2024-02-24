<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        
        Schema::dropIfExists('ventas');
        Schema::create('ventas', function (Blueprint $table){
            $table->id('idVenta');
            $table->date('fechaVenta');
            $table->smallInteger('cantidadVenta');
            $table->integer('cantidadTotalVenta');
            $table->boolean('movimientoVenta')->default(1);
            $table->unsignedBigInteger('idVendedorVenta_id');
            $table->unsignedBigInteger('idCategoriaVenta_id');
            $table->unsignedBigInteger('idClienteVenta_id');
            $table->unsignedBigInteger('idProductoVenta_id');
            $table->foreign('idVendedorVenta_id')->references('idVendedor')->on('vendedores')->onDelete('cascade');
            $table->foreign('idCategoriaVenta_id')->references('idCategoria')->on('categorias')->onDelete('cascade');
            $table->foreign('idClienteVenta_id')->references('idCliente')->on('clientes')->onDelete('cascade');
            $table->foreign('idProductoVenta_id')->references('idProducto')->on('productos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
