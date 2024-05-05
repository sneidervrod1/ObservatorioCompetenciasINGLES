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
        Schema::create('validations', function (Blueprint $table) {
            $table->id();
            $table->integer('user');
            $table->string('nombre');
            $table->string('codigo');
            $table->string('curso');
            $table->integer('UtilidadPercibida');
            $table->integer('modeloCFacilidadDeUsoPercibida');
            $table->integer('ActitudPorElUso');
            $table->integer('IntencionDeUso');
            $table->integer('totalAceptacion');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('validations');
    }
};
