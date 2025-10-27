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
        Schema::create('brosurs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('periode_pendaftaran_id')->constrained()->onDelete('cascade');
            $table->longText('sejarah')->nullable();
            $table->longText('visi_misi')->nullable();
            $table->longText('kurikulum_formal')->nullable();
            $table->longText('kurikulum_non_formal')->nullable();
            $table->longText('jadwal_kbm')->nullable();
            $table->longText('biaya')->nullable();
            $table->longText('syarat_pendaftaran')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brosurs');
    }
};