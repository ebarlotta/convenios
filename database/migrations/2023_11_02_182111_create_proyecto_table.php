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
        Schema::create('proyectos', function (Blueprint $table) {
            $table->id();
            $table->integer('anio')->nullable();
            $table->string('descripciondelapropuesta');
            $table->string('intencionalidadpedagógica');
            $table->string('relacionconlaslineasdeacciondelpei');
            $table->string('determinaciondeestudiantesdocentes')->nullable();
            $table->string('localizacionfisicaycobertura')->nullable();
            $table->string('tareasarealizar');
            $table->string('cronogramaseactividades');
            $table->string('detalledefondos');
            $table->unsignedBigInteger('responsable_id')->nullable();
            $table->string('documentaciondetransporte')->nullable();
            $table->string('polizasegurodge');
            $table->unsignedBigInteger('carrera_id')->nullable();
            
            $table->timestamps();

            $table->foreign('responsable_id')->references('id')->on('responsables');
            $table->foreign('carrera_id')->references('id')->on('carreras');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proyectos');
    }
};
