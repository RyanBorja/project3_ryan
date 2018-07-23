<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // These seeds should always run when setting up a new installtion.
        $this->call(UsersTableSeeder::class);
        $this->call(FlashcardsTableSeeder::class);
    }
}