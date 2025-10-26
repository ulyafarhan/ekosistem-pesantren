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
        Schema::create('kontak_panitias', function (Blueprint $table) {
            $table->id();
            // Kunci Relasi ke tabel periode_pendaftarans
            $table->foreignId('periode_pendaftaran_id')
                ->constrained()
                ->onDelete('cascade'); // Jika periode dihapus, kontaknya ikut terhapus

            $table->string('nama_panitia');
            $table->string('nomor_whatsapp');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kontak_panitias');
    }
};
