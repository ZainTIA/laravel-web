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
       Schema::create('portofolio_1019', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('profesi');
            $table->string('email');
            $table->string('telepon');
            $table->string('lokasi');
            $table->text('tentang_saya');
            $table->text('keahlian');
            $table->text('pengalaman_kerja');
            $table->text('pendidikan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       Schema::dropIfExists('portofolio_1019');
    }
};
