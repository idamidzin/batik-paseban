<?php

use Illuminate\Database\Seeder;

class BatikProsesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('proses_batik')->insert([
    		[
    			'nama' => NULL,
    			'batik_id' => 1,
    			'foto' => 'sekar_galuh_1.jpg'
            ],
    		[
    			'nama' => NULL,
    			'batik_id' => 1,
    			'foto' => 'sekar_galuh_2.png'
            ],
    		[
    			'nama' => NULL,
    			'batik_id' => 1,
    			'foto' => 'sekar_galuh_3.jpg'
            ],
    		[
    			'nama' => NULL,
    			'batik_id' => 2,
    			'foto' => 'oyod_mingmang_1.jpg'
            ],
    		[
    			'nama' => NULL,
    			'batik_id' => 2,
    			'foto' => 'oyod_mingmang_2.jpg'
            ],
    		[
    			'nama' => NULL,
    			'batik_id' => 2,
    			'foto' => 'oyod_mingmang_3.jpg'
            ],
    		[
    			'nama' => NULL,
    			'batik_id' => 3,
    			'foto' => 'mayang_segara_1.jpg'
            ],
    		[
    			'nama' => NULL,
    			'batik_id' => 3,
    			'foto' => 'mayang_segara_2.jpg'
            ],
    		[
    			'nama' => NULL,
    			'batik_id' => 4,
    			'foto' => 'adu_manis_1.jpg'
            ],
    		[
    			'nama' => NULL,
    			'batik_id' => 5,
    			'foto' => 'rereng_pwah_1.jpg'
            ],
    		[
    			'nama' => NULL,
    			'batik_id' => 5,
    			'foto' => 'rereng_pwah_2.png'
            ],
    		[
    			'nama' => NULL,
    			'batik_id' => 5,
    			'foto' => 'rereng_pwah_3.png'
            ],
    		[
    			'nama' => NULL,
    			'batik_id' => 6,
    			'foto' => 'geger_sunten_1.png'
            ],
    		[
    			'nama' => NULL,
    			'batik_id' => 6,
    			'foto' => 'geger_sunten_2.png'
            ],
    		[
    			'nama' => NULL,
    			'batik_id' => 6,
    			'foto' => 'geger_sunten_3.png'
            ],
    		[
    			'nama' => NULL,
    			'batik_id' => 7,
    			'foto' => 'rereng_kujang_1.png'
            ],
    		[
    			'nama' => NULL,
    			'batik_id' => 7,
    			'foto' => 'rereng_kujang_2.png'
            ],
    		[
    			'nama' => NULL,
    			'batik_id' => 7,
    			'foto' => 'rereng_kujang_3.png'
            ]
    	]);
    }
}
