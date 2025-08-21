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
        Schema::create('lembaga_pendidikans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lembaga');
            $table->string('slug');
            $table->string('deskripsi')->nullable();
            $table->text('deskripsi_panjang')->nullable();
            $table->string('logo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lembaga_pendidikans');
    }
};
