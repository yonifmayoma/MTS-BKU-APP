<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            // ImageSiteSeeder::class,
            ProblemSiteSeeder::class,
            UserSeeder::class,
            DataSiteSeeder::class,
            TopoTroubleTicketDetailSeeder::class,
            SiarTroubleTicketDetailSeeder::class,
        ]);
    }
}
