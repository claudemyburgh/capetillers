<?php

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [

        	[
        		'name' => 'Claude Myburgh',
        		'password' => bcrypt('CMyburgh1978'),
        		'active' => true,
        		'email' => 'claude@designbycode.co.za',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
        	]

        ];

        User::insert($users);




    }
}
