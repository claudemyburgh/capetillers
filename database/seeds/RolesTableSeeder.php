<?php

use Carbon\Carbon;
use Designbycode\RolesAndPermissions\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
        	[
        		'name' => 'super admin',
        		'created_at' => Carbon::now(),
        		'updated_at' => Carbon::now()       
        	],
        	[
        		'name' => 'admin',
        		'created_at' => Carbon::now(),
        		'updated_at' => Carbon::now()       
        	],
        	[
        		'name' => 'manager',
        		'created_at' => Carbon::now(),
        		'updated_at' => Carbon::now()       
        	],
        	[
        		'name' => 'agent',
        		'created_at' => Carbon::now(),
        		'updated_at' => Carbon::now()       
        	],

        ];

        Role::insert($roles);




    }
}
