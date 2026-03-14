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
        Schema::create('bapp', function (Blueprint $table) {
            $table->id();
            $table->string('nama_penerima');
            $table->string('nik');
            $table->date('selesai_pengerjaan');
            $table->string('alamat_pekerjaan');
            $table->date('selesai_pemeriksaan');
            $table->string('nama_pekerjaan');
            $table->string('detail_pekerjaan');
            $table->decimal('subtotal', 10, 2);
            $table->enum('status', ['Pending', 'Verifikasi'])->default('Pending');
            $table->foreignId('created_by')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bapp');
    }
};
