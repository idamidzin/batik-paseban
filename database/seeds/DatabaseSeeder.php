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
        $this->call(UsersTableSeeder::class);
        $this->call(ProfileTableSeeder::class);
        $this->call(BatikTableSeeder::class);
        $this->call(BatikProsesTableSeeder::class);
        $this->call(GaleriTableSeeder::class);
    }
}

