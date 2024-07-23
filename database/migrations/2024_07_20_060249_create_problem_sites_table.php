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
    Schema::create('problem_sites', function (Blueprint $table) {
        $table->id();
            $table->foreignId('data_site_id')->constrained('data_sites')->onDelete('cascade');
            $table->string('riwayat_problem');
            $table->text('description');
            $table->string('petugas');
            $table->string('status');
            $table->timestamps();
        });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('problem_sites');
    }
};
