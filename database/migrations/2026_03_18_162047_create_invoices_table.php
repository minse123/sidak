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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('judul_invoice');
            $table->string('nama');
            $table->string('jabatan');
            $table->string('no_rekening');
            $table->decimal('gaji', 15, 2);
            $table->integer('bulan');
            $table->integer('tahun');
            $table->decimal('jumlah', 15, 2);
            $table->enum('status', ['Pending', 'Verifikasi'])->default('Pending');
            $table->foreignId('created_by')->constrained('users')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
