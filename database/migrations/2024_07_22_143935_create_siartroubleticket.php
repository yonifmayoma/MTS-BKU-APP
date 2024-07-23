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
        Schema::create('siartroubleticket', function (Blueprint $table) {
            $table->id();
            $table->foreignId('site_id')->constrained('data_sites');
            $table->string('siteId');
            $table->string('nama_site');
            $table->string('provinsi');
            $table->string('kabupaten');
            $table->string('kecamatan');
            $table->tinyInteger('problem');
            $table->longText('deskripsi');
            $table->string('durasi');
            $table->foreignId('created_by')->constrained('users');
            $table->foreignId('updated_by')->nullable()->constrained('users');
            $table->foreignId('assigned_by')->constrained('users');
            $table->enum('priority', ['High', 'Medium', 'Low']);
            $table->enum('status', ['Open', 'In Progress', 'Closed']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siartroubleticket');
    }
};
