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
        Schema::create('laporans', function (Blueprint $table) {
            $table->id();
            $table->string('judul', 20);
            $table->string('deskripsi', 100);
            $table->text('foto');
            $table->enum('status', ['DIKIRIM', 'DISETUJUI', 'DITOLAK'])->default('DIKIRIM');
            $table->string('keterangan', 100)->nullable();
            $table->enum('is_read', ['0', '1'])->comment('0 = Belum dilihat, 1 = Sudah dilihat');
            $table->foreignId('user_id')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan');
    }
};
