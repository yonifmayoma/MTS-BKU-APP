<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TopoTroubleTicketDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $statuses = ['Sukses', 'Gagal'];
        $tickets = DB::table('topotroubleticket')->pluck('id');

        foreach (range(1, 20) as $index) {
            DB::table('topotroubleticket_details')->insert([
                'topotroubleticket_id' => $tickets->random(),
                'tanggal' => Carbon::now()->subDays(rand(0, 365))->format('Y-m-d'),
                'tindakan' => 'Tindakan ' . Str::random(10),
                'deskripsi' => 'Deskripsi ' . Str::random(20),
                'status' => $statuses[array_rand($statuses)],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
