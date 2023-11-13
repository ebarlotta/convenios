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
        Schema::create('receptoras', function (Blueprint $table) {
            $table->id();
            $table->string('institucionreceptora');
            $table->string('dependientereceptora');
            $table->string('representadareceptora');
            $table->string('dnirepresentante');
            $table->string('telefonorepresentante');
            $table->string('caracterrepresentante');
            $table->string('acreditadopor');
            $table->string('domicilioreceptora');
            $table->string('ciudadreceptora');
            $table->string('correoreceptora');
            $table->string('enadelantereceptora');
            $table->string('receptora')->default(2); // 1: Para el IES  2: Para otras instituciones
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('receptoras');
    }
};
