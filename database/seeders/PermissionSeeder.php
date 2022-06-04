<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Carbon\Carbon;
class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $insert = [
        	[
        		'name'=>'View Dashboard',
        		'guard_name'=>'web',
        		'created_at'=>Carbon::now(),
        		'updated_at'=>Carbon::now()
        	],
        	[
        		'name'=>'Permission Create',
        		'guard_name'=>'web',
        		'created_at'=>Carbon::now(),
        		'updated_at'=>Carbon::now()
        	],[
        		'name'=>'Permission Edit',
        		'guard_name'=>'web',
        		'created_at'=>Carbon::now(),
        		'updated_at'=>Carbon::now()
        	],[
        		'name'=>'Permission List',
        		'guard_name'=>'web',
        		'created_at'=>Carbon::now(),
        		'updated_at'=>Carbon::now()
        	],[
        		'name'=>'Permission Delete',
        		'guard_name'=>'web',
        		'created_at'=>Carbon::now(),
        		'updated_at'=>Carbon::now()
        	],
        ];

        Permission::insert($insert);

    }
}
