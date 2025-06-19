<?php

namespace Database\Seeders; 
use Database\Seeders\UsersTableSeeder;
use Database\Seeders\MoviesTableSeeder; 
use Database\Seeders\ScreeningRoomsTableSeeder;
use Database\Seeders\ShowTimesTableSeeder;
use Database\Seeders\TicketsTableSeeder;
         
use App\Models\User;    

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()   
    {
        $this->call([
            UsersTableSeeder::class,
            MoviesTableSeeder::class,
            ScreeningRoomsTableSeeder::class,
            CustomersTableSeeder::class,
            FoodsTableSeeder::class,
            ShowTimesTableSeeder::class,
            TicketsTableSeeder::class,
        ]);
    }

}
