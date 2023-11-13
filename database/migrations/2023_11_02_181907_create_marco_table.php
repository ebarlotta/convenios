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
            $table->integer('nroconvenio');
            $table->integer('anio');
            $table->date('firmaconvenio');
            $table->string('aprobadoporresolucion');
            $table->string('polizanro');
            $table->date('vigenciadesde');
            $table->date('vigenciahasta');

            $table->timestamps();
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
