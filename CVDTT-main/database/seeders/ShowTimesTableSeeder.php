<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShowTimesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('show_times')->insert([
            [
                'movieId' => 1,
                'date' => '2025-06-20',
                'startTime' => '19:00',
                'roomId' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'movieId' => 2,
                'date' => '2025-06-21',
                'startTime' => '20:00',
                'roomId' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
