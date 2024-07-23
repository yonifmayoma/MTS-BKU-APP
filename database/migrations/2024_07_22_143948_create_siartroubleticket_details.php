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
        Schema::create('siartroubleticket_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siartroubleticket_id')->constrained('siartroubleticket'); // Foreign key untuk relasi dengan tabel topotroubleticket
            $table->date('tanggal');
            $table->string('tindakan');
            $table->longText('deskripsi');
            $table->enum('status', ['Gagal', 'Sukses']); // Pilihan status
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siartroubleticket_details');
    }
};
