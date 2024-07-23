<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use HasFactory;

    protected $table = 'data';

    protected $fillable = [
        // 'Waktu',
        // 'Waktu_Hingga',
        'Provinsi',
        'Kabupaten_Kota',
        'Kecamatan',
        'Desa',
        'Site_ID',
        'Nama_Site',
        'Site_ID_Bakti',
        'Terminal_ID',
        'Keterangan_3T',
        'Tahun_Pembangunan',
        'Tower_Owner',
        'Tanggal_OnAir',
        'Project_Phase',
        'Site_Penyiaran',
        'Status',
        'Tanggal_Integrasi',
        'Spotbeam',
        'Mitra_LC',
        'Opsel',
        'Vendor_Opsel',
        'Teknologi',
        'Bandwidth_Total_kbps',
        'Capacity_Uplink_kbps',
        'Capacity_Downlink_kbps',
        'Center_Point_GS',
        'Center_Point_Topo',
        'Longitude',
        'Latitude',
        'Penyedia_Power',
    ];
}
