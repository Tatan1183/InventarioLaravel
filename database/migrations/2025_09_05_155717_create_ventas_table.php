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
        Schema::create('ventas', function (Blueprint $table) {
        $table->id();
        $table->string('producto_id', 20);
        $table->integer('cantidad_vendida');
        $table->decimal('precio_unitario', 10, 2);
        $table->decimal('total', 10, 2);
        $table->dateTime('fecha');
        $table->timestamps();

        $table->foreign('producto_id')->references('codigo')->on('productos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventas');
    }
};
