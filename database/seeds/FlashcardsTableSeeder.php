<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class FlashcardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    
    public function run()
    {
        $admin = \App\User::where('name', '=', 'Admin')->first();
        
        DB::table('flashcards')->insert([
            'term' => 'Test term',
            'definition' => 'Test definition',
            'creator_id' => $admin->id,
            'created_at' => Carbon::now()
        ]);
    }
}
