<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DataSiteSeeder extends Seeder
{
    public function run()
    {
        // Jumlah data yang ingin dimasukkan
        $dataCount = 10;
        
        // Data dummy untuk tabel datasites
        for ($i = 1; $i <= $dataCount; $i++) {
            DB::table('data_sites')->insert([
                'siteId' => 'SITE' . Str::padLeft($i, 3, '0'),
                'name' => 'Site ' . $i,
                'longitude' => rand(100000, 999999) / 10000,
                'latitude' => rand(100000, 999999) / 10000,
                'provinsi' => 'Provinsi ' . $i,
                'kabupaten' => 'Kabupaten ' . $i,
                'kecamatan' => 'Kecamatan ' . $i,
                'terminalId' => 'TER' . Str::padLeft($i, 3, '0'),
                'spotbeam' => 'Spotbeam ' . $i,
                'lc' => 'LC ' . $i,
                'vsat' => 'VSAT ' . $i,
                'tahun' => rand(2000, 2023),
                'oa' => now()->subDays(rand(0, 365))->format('Y-m-d'),
            ]);
        }
    }
}
