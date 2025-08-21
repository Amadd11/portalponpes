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
        Schema::create('informasi_pendaftarans', function (Blueprint $table) {
            $table->id();
            $table->longText('syarat_pendaftaran')->nullable();
            $table->longText('alur_pendaftaran')->nullable();
            $table->longText('biaya_pendaftaran')->nullable();
            $table->string('brosur_pendaftaran')->nullable();  // Menambahkan kolom baru
            $table->string('link_pendaftaran')->nullable();
            $table->string('lampiran')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('informasi_pendaftarans');
    }
};
