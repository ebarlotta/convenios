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
        Schema::create('elevos', function (Blueprint $table) {
            $table->id();
            $table->integer('anio');
            $table->date('vigenciadesde');
            $table->date('vigenciahasta');
            $table->time('horadesde');
            $table->time('horahasta');
            $table->unsignedBigInteger('responsable_id');
            $table->string('materia');
            $table->string('tipodesalida');
            $table->string('destino');
            $table->string('hospedaje');
            $table->string('lugarderegreso');
            $table->string('tipomediodetransporte');
            $table->string('otros');            
            $table->timestamps();

            $table->foreign('responsable_id')->references('id')->on('responsables');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('elevos');
    }
};
