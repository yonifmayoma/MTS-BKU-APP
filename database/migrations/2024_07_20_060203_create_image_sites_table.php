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
    Schema::create('image_sites', function (Blueprint $table) {
        $table->id();
            $table->foreignId('data_site_id')->constrained('data_sites')->onDelete('cascade');
            $table->string('description');
            $table->string('image_path');
            $table->date('upload_date');
            $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('image_sites');
    }
};
