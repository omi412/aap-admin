<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::updateOrCreate(['name'=>'Admin'],['name'=>'Admin']);
        Role::updateOrCreate(['name'=>'User'],['name'=>'User']);
        Role::updateOrCreate(['name'=>'Mandal Prabhari'],['name'=>'Mandal Prabhari']);
        Role::updateOrCreate(['name'=>'Ward Prabhari'],['name'=>'Ward Prabhari']);
        Role::updateOrCreate(['name'=>'Booth Prabhari'],['name'=>'Booth Prabhari']);
        Role::updateOrCreate(['name'=>'Gali Prabhari'],['name'=>'Gali Prabhari']);
    }
}
