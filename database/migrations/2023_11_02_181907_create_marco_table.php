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
        Schema::create('marcos', function (Blueprint $table) {
            $table->id();
            $table->string('nroconvenio',20)->nullable();
            $table->integer('anio');
            $table->date('firmaconvenio')->nullable();
            $table->string('aprobadoporresolucion');
            $table->string('polizanro');
            $table->date('vigenciadesde');
            $table->date('vigenciahasta');
            $table->unsignedBigInteger('carrera_id');
            
            $table->timestamps();

            $table->foreign('carrera_id')->references('id')->on('carreras');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('marcos');
    }
};
