<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MoviesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('movies')->insert([
            [
                'title' => 'Avengers: Endgame',
                'director' => 'Anthony Russo, Joe Russo',
                'genre' => 'Action',
                'duration' => '181',
                'releaseDate' => '2019-04-26',
                'description' => 'The epic finale of the Infinity Saga.',
                'poster' => 'avengers.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Inception',
                'director' => 'Christopher Nolan',
                'genre' => 'Sci-Fi',
                'duration' => '148',
                'releaseDate' => '2010-07-16',
                'description' => 'A mind-bending thriller.',
                'poster' => 'inception.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
