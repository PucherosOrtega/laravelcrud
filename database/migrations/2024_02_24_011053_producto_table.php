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
        
        //Schema::dropIfExists('producto');
        Schema::create('productos', function (Blueprint $table){
            $table->id('idProducto');
            $table->string('nombreProducto');
            $table->float('precioProducto');
            $table->boolean('isActiveProducto')->default(1);
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
