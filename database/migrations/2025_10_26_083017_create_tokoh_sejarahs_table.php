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
        Schema::create('tokoh_sejarahs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('periode_jabatan'); 
            $table->string('foto')->nullable();
            $table->text('kisah_historis');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tokoh_sejarahs');
    }
};
