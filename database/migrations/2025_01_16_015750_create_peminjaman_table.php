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
        Schema::create('peminjamans', function (Blueprint $table) {
            $table->id('id');
            $table->string('user_id', 13);
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreignId('kendaraan_id')->constrained('kendaraans');
            $table->date('tanggal_pinjam');
            $table->date('tanggal_kembali');
            $table->enum('status_peminjaman', ['dipinjam', 'selesai', 'diperpanjang'])->default('dipinjam');
            $table->string('tujuan', 255);
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }   

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjaman');
    }
};
