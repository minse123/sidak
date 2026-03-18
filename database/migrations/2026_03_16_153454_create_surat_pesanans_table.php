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
        Schema::create('surat_pesanans', function (Blueprint $table) {
            $table->id();
            $table->string('no_surat_pesanan')->unique();
            $table->string('nama_produk');
            $table->string('jenis_produk');
            $table->string('kategori');
            $table->integer('durasi_bulan');
            $table->string('variasi');
            $table->decimal('harga', 15, 2);
            $table->integer('jumlah');
            $table->boolean('bebas_ppn')->default(false);
            $table->text('url_produk');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_pesanans');
    }
};
