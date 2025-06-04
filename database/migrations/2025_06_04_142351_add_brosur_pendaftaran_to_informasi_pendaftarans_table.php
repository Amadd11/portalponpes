<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('informasi_pendaftarans', function (Blueprint $table) {
            $table->string('brosur_pendaftaran')->nullable();  // Menambahkan kolom baru
        });
    }

    public function down()
    {
        Schema::table('informasi_pendaftarans', function (Blueprint $table) {
            $table->dropColumn('brosur_pendaftaran');  // Menghapus kolom baru jika rollback
        });
    }
};
