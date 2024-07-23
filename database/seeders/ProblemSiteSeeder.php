<?php

namespace Database\Seeders;

use App\Models\DataSite;
use App\Models\ProblemSite;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProblemSiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $dataSites = DataSite::all();

        foreach ($dataSites as $dataSite) {
            for ($i = 1; $i <= 5; $i++) {
                ProblemSite::create([
                    'data_site_id' => $dataSite->id,
                    'riwayat_problem' => 'Problem history ' . $i,
                    'description' => 'Description for problem ' . $i,
                    'petugas' => 'Technician ' . $i,
                    'status' => 'Pending'
                ]);
            }
        }
    }
}
