<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'email' => 'kiet@gmail.com',
                'password' => Hash::make('password'),
                'role' => 1,
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'email' => 'user@gmail.com',
                'password' => Hash::make('password'),
                'role' => 0,
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
