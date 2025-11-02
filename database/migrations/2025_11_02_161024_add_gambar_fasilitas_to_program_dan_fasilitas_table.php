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
        Schema::table('program_dan_fasilitas', function (Blueprint $table) {
            $table->string('gambar_fasilitas')->nullable()->after('gambar');
        });
    }

    public function down(): void
    {
        Schema::table('program_dan_fasilitas', function (Blueprint $table) {
            $table->dropColumn('gambar_fasilitas');
        });
    }
};
