<?php

use Illuminate\Database\Seeder;

class GaleriTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('gallery')->insert([
    		[
    			'profile_id' => 1,
    			'nama' => 'Paseban Tri Panca Tunggal pada periode Madrais Lingkaran Merah adalah Tugu',
    			'foto' => 'profile1.png'
    		],
    		[
    			'profile_id' => 1,
    			'nama' => 'Paseban Tri Panca Tunggal  pada periode Teja Lingkaran Merah adalah Tugu',
    			'foto' => 'profile2.png'
    		],
    		[
    			'profile_id' => 1,
    			'nama' => 'Paseban Tri Panca Tunggal  pada periode Jatikusumah',
    			'foto' => 'profile3.png'
    		]
    	]);
    }
}
