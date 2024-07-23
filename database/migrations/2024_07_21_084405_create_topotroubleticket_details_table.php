<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('topotroubleticket_details', function (Blueprint $table) {
        $table->id();
        $table->foreignId('topotroubleticket_id')->constrained('topotroubleticket'); // Foreign key untuk relasi dengan tabel topotroubleticket
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
        Schema::dropIfExists('topotroubleticket_details');
    }
};
