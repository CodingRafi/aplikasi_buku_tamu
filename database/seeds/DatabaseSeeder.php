<?php

use Illuminate\Database\Seeder;
use \App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'username' => 'admin',
            'email' => 'muhamadrafi1408@gmail.com', 
            'password' => bcrypt('admin')
        ]);
    }
}
