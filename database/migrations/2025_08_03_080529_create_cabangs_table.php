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
        Schema::create('cabangs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lembaga_pendidikan_id')->constrained()->cascadeOnDelete();
            $table->string('nama')->nullable();
            $table->string('slug');
            $table->string('logo')->nullable();
            $table->text('deskripsi_singkat')->nullable();
            $table->longText('konten_lengkap')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cabangs');
    }
};
