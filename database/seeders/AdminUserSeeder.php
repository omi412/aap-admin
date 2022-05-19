<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
              'name' => 'Manish Sisodia',
              'email' => 'manishsisodia@gmail.com',
              'password' => bcrypt('abcd1234'),
              'role' => 'admin',
              'mobileno' => '9977848652',
        ]);

        DB::table('users')->insert([
              'name' => 'Sachin Gupta',
              'email' => 'sachingupta@gmail.com',
              'password' => bcrypt('12345678'),
              'role' => 'manager',
              'mobileno' => '9977848650',
        ]);
        DB::table('users')->insert([
              'name' => 'Aakash Singh',
              'email' => 'aakash56@gmail.com',
              'password' => bcrypt('abcd1234'),
              'role' => 'user',
              'mobileno' => '9977848651',
            ]);
        DB::table('users')->insert([
              'name' => 'Vijay Shah',
              'email' => 'vijays45@gmail.com',
              'password' => bcrypt('123456'),
              'role' => 'user',
              'mobileno' => 'user',
          ]);

    }
}
