<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('zonas', function (Blueprint $table) {

            $table->bigIncrements('id_zona');

            $table->string('nombre_zona');

            $table->decimal('tarifa_por_kg', 8, 2);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('zonas');
    }
};
