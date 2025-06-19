<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FoodsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('foods')->insert([
            [
                'name' => 'Bắp rang',
                'price' => '35000',
                'description' => 'Bắp rang bơ thơm ngon',
                'poster' => 'popcorn.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Nước ngọt',
                'price' => '20000',
                'description' => 'Pepsi 500ml',
                'poster' => 'pepsi.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
