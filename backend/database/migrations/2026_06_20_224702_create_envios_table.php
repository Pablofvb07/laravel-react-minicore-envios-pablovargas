<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('envios', function (Blueprint $table) {

            $table->bigIncrements('id_envio');

            $table->unsignedBigInteger('id_repartidor');

            $table->unsignedBigInteger('id_zona');

            $table->decimal('peso_kg', 8, 2);

            $table->date('fecha_envio');

            $table->timestamps();

            $table->foreign('id_repartidor')
                ->references('id_repartidor')
                ->on('repartidores');

            $table->foreign('id_zona')
                ->references('id_zona')
                ->on('zonas');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('envios');
    }
};