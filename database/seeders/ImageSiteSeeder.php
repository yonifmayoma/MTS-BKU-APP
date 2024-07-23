<?php

namespace Database\Seeders;

use App\Models\DataSite;
use App\Models\ImageSite;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImageSiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $dataSites = DataSite::all();

        foreach ($dataSites as $dataSite) {
            for ($i = 1; $i <= 3; $i++) {
                ImageSite::create([
                    'data_site_id' => $dataSite->id,
                    'description' => 'Description for image ' . $i,
                    'image_path' => 'path/to/image' . $i . '.jpg',
                    'upload_date' => now()
                ]);
            }
        }
    }
}
