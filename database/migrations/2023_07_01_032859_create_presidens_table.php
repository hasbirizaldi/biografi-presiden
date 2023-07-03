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
        Schema::create('presidens', function (Blueprint $table) {
            $table->id();
            $table->string('nama_tokoh');
            $table->string('image');
            $table->text('orientasi');
            $table->text('peristiwa_penting');
            $table->text('reorientasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presidens');
    }
};