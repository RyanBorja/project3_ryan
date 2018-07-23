<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	DB::table('users')->insert([
    		'name' => 'bubger',
    		'email' => 'bubger@kirg.com',
    		'password' => bcrypt('bubger'),
    		'is_admin' => 1,
    		'created_at' => Carbon::now(),
    		'updated_at' => Carbon::now()
    	]);

    }
}