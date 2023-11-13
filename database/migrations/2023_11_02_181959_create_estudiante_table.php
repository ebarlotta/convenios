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
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->id();
            $table->string('nombreestudiante');
            $table->unsignedInteger('dniestudiante');
            $table->string('domicilioestudiante');
            $table->unsignedBigInteger('provincia_id')->default(1);
            $table->string('telefonoestudiante');
            $table->string('emailestudiante');
            $table->unsignedBigInteger('carrera_id');
            $table->text('tareasasignadas');
            $table->unsignedInteger('cuil');
            $table->date('fechanacimiento');
            $table->integer('legajo');
            $table->string('polizanro');
            $table->date('vigenciadesde');
            $table->date('vigenciahasta');
            
            $table->foreign('provincia_id')->references('id')->on('provincias');
            $table->foreign('carrera_id')->references('id')->on('carreras');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estudiantes');
    }
};
