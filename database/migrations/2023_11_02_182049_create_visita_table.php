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
        Schema::create('visitas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('carrera_id');
            $table->integer('anio');
            $table->date('vigenciadesde');
            $table->date('vigenciahasta');
            $table->time('horadesde');
            $table->time('horahasta');
            $table->unsignedBigInteger('responsable_id');
            $table->unsignedBigInteger('elevo_id');
            $table->string('direcciondestino');
            $table->timestamps();

            $table->foreign('carrera_id')->references('id')->on('carreras');
            $table->foreign('responsable_id')->references('id')->on('responsables');
            $table->foreign('elevo_id')->references('id')->on('elevos');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visitas');
    }
};
