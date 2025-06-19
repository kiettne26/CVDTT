<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('customers')->insert([
            [
                'email' => 'user@gmail.com',
                'password' => bcrypt('password'),
                'name' => 'Nguyen Van A',
                'gender' => 'Nam',
                'dob' => '1995-01-01',
                'phone' => '0987654321',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'email' => 'kiet@gmail.com',
                'password' => bcrypt('password'),
                'name' => 'Tran Thi B',
                'gender' => 'Nữ',
                'dob' => '1998-04-15',
                'phone' => '0912345678',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
