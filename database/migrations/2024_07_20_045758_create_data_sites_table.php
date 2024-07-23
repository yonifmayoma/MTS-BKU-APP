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
    Schema::create('data_sites', function (Blueprint $table) {
        $table->id();
        $table->string('siteId')->unique();
        $table->string('name');
        $table->decimal('longitude', 10, 7);
        $table->decimal('latitude', 10, 7);
        $table->string('provinsi');
        $table->string('kabupaten');
        $table->string('kecamatan');
        $table->string('terminalId');
        $table->string('spotbeam');
        $table->string('lc');
        $table->string('vsat');
        $table->year('tahun');
        $table->date('oa');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_sites');
    }
};
