<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TicketsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('tickets')->insert([
            [
                'showtimeId' => 1,
                'movieId' => 1,
                'roomId' => 1,
                'seatNumber' => 'A1',
                'price' => '70000',
                'status' => 'Còn trống',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'showtimeId' => 2,
                'movieId' => 2,
                'roomId' => 2,
                'seatNumber' => 'B2',
                'price' => '80000',
                'status' => 'Đã đặt',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
