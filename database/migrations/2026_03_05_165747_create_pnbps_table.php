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
        Schema::create('pnbps', function (Blueprint $table) {
            $table->id();
            $table->string('no_dokumen')->unique();
            $table->string('nama_paket');
            $table->string('termin');
            $table->decimal('persentase_tarif', 8, 2);
            $table->decimal('nominal_tarif', 15, 2);
            $table->decimal('total_potongan', 15, 2);
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
        Schema::dropIfExists('pnbps');
    }
};
