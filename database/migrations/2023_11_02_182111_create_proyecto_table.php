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
            $table->integer('anio');
            $table->string('descripciondelapropuesta');
            $table->string('intencionalidadpedagógica');
            $table->string('relacionconlaslineasdeacciondelpei');
            $table->string('determinaciondeestudiantesdocentes');
            $table->string('localizacionfisicaycobertura');
            $table->string('tareasarealizar');
            $table->string('cronogramaseactividades');
            $table->string('detalledefondos');
            $table->unsignedBigInteger('responsable_id');
            $table->string('documentaciondetransporte');
            $table->string('polizasegurodge');
            
            $table->timestamps();

            $table->foreign('responsable_id')->references('id')->on('responsables');

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
