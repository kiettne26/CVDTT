<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScreeningRoomsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('screening_rooms')->insert([
            [
                'roomName' => 'Room 1',
                'capacity' => '100',
                'roomType' => '2D',
                'isAvailable' => 'Yes',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'roomName' => 'Room 2',
                'capacity' => '80',
                'roomType' => '3D',
                'isAvailable' => 'No',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
