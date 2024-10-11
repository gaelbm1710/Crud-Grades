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
        Schema::create('gradable_activities', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('subject_ID')->constrained()->onDelete('cascade');
            $table->string('tipo');
            $table->decimal('grade', 5,2)->default(0)->nullable();
            $table->date('fecha_actividad');
            $table->text('descripcion')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gradable_activities');
    }
};
