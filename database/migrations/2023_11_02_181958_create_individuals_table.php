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
        Schema::create('individuals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('marco_id');
            $table->unsignedBigInteger('estudiante_id');
            $table->date('periododesde');
            $table->date('periodohasta');
            $table->string('diasdelasemana');
            $table->date('horariosdesdehasta');
            $table->unsignedBigInteger('responsable_id');
            $table->date('firmaconvenio')->nullable();
            
            $table->timestamps();

            $table->foreign('responsable_id')->references('id')->on('responsables');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('individuals');
    }
};
