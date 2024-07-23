<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('data', function (Blueprint $table) {
            $table->id();
            // $table->timestamp('Waktu')->nullable();
            // $table->timestamp('Waktu_Hingga')->nullable();
            $table->string('Provinsi')->nullable();
            $table->string('Kabupaten_Kota')->nullable();
            $table->string('Kecamatan')->nullable();
            $table->string('Desa')->nullable();
            $table->string('Site_ID')->nullable();
            $table->string('Nama_Site')->nullable();
            $table->string('Site_ID_Bakti')->nullable();
            $table->string('Terminal_ID')->nullable();
            $table->string('Keterangan_3T')->nullable();
            $table->year('Tahun_Pembangunan')->nullable();
            $table->string('Tower_Owner')->nullable();
            $table->date('Tanggal_OnAir')->nullable();
            $table->string('Project_Phase')->nullable();
            $table->string('Site_Penyiaran')->nullable();
            $table->string('Status')->nullable();
            $table->date('Tanggal_Integrasi')->nullable();
            $table->string('Spotbeam')->nullable();
            $table->string('Mitra_LC')->nullable();
            $table->string('Opsel')->nullable();
            $table->string('Vendor_Opsel')->nullable();
            $table->string('Teknologi')->nullable();
            $table->integer('Bandwidth_Total')->nullable();
            $table->integer('Capacity_Uplink')->nullable();
            $table->integer('Capacity_Downlink')->nullable();
            $table->string('Center_Point_GS')->nullable();
            $table->string('Center_Point_Topo')->nullable();
            $table->decimal('Longitude', 10, 7)->nullable();
            $table->decimal('Latitude', 10, 7)->nullable();
            $table->string('Penyedia_Power')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('data');
    }
};
