<?php

use Illuminate\Database\Seeder;

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
    		[
    			'nama' => 'super admin',
    			'username' => 'superadmin',
    			'password' => bcrypt('1234')
            ]
    	]);
    }
}
