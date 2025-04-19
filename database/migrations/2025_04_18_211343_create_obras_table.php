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
        Schema::create('obras', function (Blueprint $table) {
            $table->id();
            $table->integer('numero');
            $table->string('nombre', 100);
            $table->string('clave', 22);
            $table->text('objeto', 350);
            $table->text('direccion', 500);
            $table->text('coordenadas',300);
            $table->unsignedBigInteger('imagen_id');
            $table->unsignedBigInteger('incidente_id');
            $table->integer('baja')->default(0);
            $table->timestamps();
            $table->foreign('imagen_id')
                ->references('id')
                ->on('imagenes');
            $table->foreign('incidente_id')
                ->references('id')
                ->on('incidentes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obras');
    }
};
