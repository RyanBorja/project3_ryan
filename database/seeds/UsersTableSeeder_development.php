<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UsersTableSeeder_Development extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
    	$names = ['Aaron', 'Beth', 'Chris', 'Dennis', 'Erik', 'Francine', 'Ginny', 'Hermione', 'Ian', 'Jennifer', 'Karla', 'Linus', 'Madeline', 'Neville', 'Opie', 'Persephone', 'Quill', 'Rasputin', 'Sunny', 'Trevor', 'Ursula', 'Vanessa', 'Wendy', 'Xephos', 'Yolanda', 'Zander'];

    	foreach ($names as $name) {

	    	DB::table('users')->insert([
	    		'name' => $name,
	    		'email' => strtolower($name) . '@example.com',
	    		'password' => bcrypt(strtolower($name)),
	    		'is_admin' => 0,
	    		'created_at' => Carbon::now(),
	    		'updated_at' => Carbon::now()
	    	]);

	    }


    }
}