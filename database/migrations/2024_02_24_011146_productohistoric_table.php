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
        //Schema::dropIfExists('productosHistoric');
        Schema::create('productosHistoric', function (Blueprint $table){
            $table->id('idProductoHistoric');
            $table->float('precio');
            $table->timestamp('fecha');
            $table->unsignedBigInteger('idProductoProductoHistoric_id');
            $table->foreign('idProductoProductoHistoric_id')->references('idProducto')->on('productos')->onDelete('cascade');
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
