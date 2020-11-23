<?php

use Illuminate\Database\Seeder;

class BatikTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('batik')->insert([
    		[
    			'nama' => 'Batik Tulis Paseban Motif Sekar Galuh',
                'foto' => 'sekar_galuh.jpg',
                'makna' => 'Sekar memiliki arti kembang. Galuh dari kata galeuh yang memiliki arti inti kehidupan. Secara filosofis sekar galuh mengandung makna bahwa manusia hendaknya melestarikan nilai-nilai adikodrati yang telah ada sejak awal secara berkesinambungan antar generasi',
                'motif' => 'Terdiri dari ragam hias tumbuhan dengan komposisi elemen daun,  bunga dan ranting serta jenis pola hias menggunakan prinsip pola pengulangan teratur'
            ],
            [
                'nama' => 'Batik Tulis Paseban Motif Oyod Mingmang',
                'foto' => 'oyod_mingmang.jpg',
                'makna' => 'Oyod Mingmang merupakan gambaran rangkaian akar yang saling berkaitan sehingga membentuk satu kekuatan yang utuh yaitu kekuatan persatuan dan kesatuan yang memiliki dasar adikodrati. Manusia memiliki akar kepribadian, akar budaya dan akar bangsanya masing-masing.Perbedaan yang ada hendaknya menjadi kekuatan untuk tidak saling merusak antara satu akar budaya dengan akar budaya yang lain.',
                'motif' => 'Terdiri dari ragam hias tumbuhan dengan komposisi menjalar / buketan serta jenis pola hias menggunakan prinsip pola pengulangan teratur'
            ],
            [
                'nama' => 'Batik Tulis Paseban Motif Mayang Segara',
                'foto' => 'mayang_segara.jpg',
                'makna' => 'Mayang segara merupakan gambaran keagungan, keindahan samudra yang luas dan dalam sebagai simbol refleksi dari adanya alam raya dan alam raga. Mayang Sagara menyiratkan bahwa manusia hendaknya memiliki keleluasaan hati bagaikan luas dan dalamnya samudera',
                'motif' => 'Terdiri dari ragam hias tumbuhan dengan komposisi elemen daun,  bunga dan ranting serta jenis pola hias menggunakan prinsip pola pengulangan teratur.'
            ],
            [
                'nama' => 'Batik Tulis Paseban Motif Adu Manis',
                'foto' => 'adu_manis.jpg',
                'makna' => 'Batik bermotif adu manis biasanya digunakan pada saat upacara perkawinan.Adu manis merupakan lambang menyatunya dua insan yang selaras dan harmonis dalam mengarungi biduk rumah tangga.',
                'motif' => 'Terdiri dari ragam hias tumbuhan dengan komposisi elemen daun,  bunga serta jenis pola hias menggunakan prinsip pola pengulangan teratur.'
            ],
            [
                'nama' => 'Batik Tulis Paseban Motif Rereng Pwah Aci',
                'foto' => 'rereng_pwah.jpg',
                'makna' => 'Rereng Pwah Aci merupakan gambaran sosok perempuan Sunda yang memiliki peran penting dalam keberlangsungan kehidupan pribadi, keluarga dan sosial. Perempuan Sunda adalah sosok yang kuat, teguh, memiliki peranan penting dan mampu berkarya sepanjang hidupnya.',
                'motif' => 'Terdiri dari ragam hias tumbuhan dengan komposisi elemen daun,  bunga padi serta jenis pola hias menggunakan prinsip pola pengulangan teratur.'
            ],
            [
                'nama' => 'Batik Tulis Paseban Motif Geger Sunten',
                'foto' => 'geger_sunten.png',
                'makna' => 'Secara filosofis Geger Sunten mengandung makna suatu tempat yang dijadikan sebagai tempat untuk berintrospeksi, berperang melawan ego diri (perang mandalerang).Geger Sunten dapat pula diartikan sebagai benteng pertahanan yang mampu menahan serangan dari luar. Manusia hendaknya mampu membentengi diri dari pengaruh-pengaruh yang berasal dari luar.',
                'motif' => 'Terdiri dari ragam hias tumbuhan dengan komposisi elemen daun,  bunga serta jenis pola hias menggunakan prinsip pola memusat dengan gradasi bentuk dari besar ke kecil.'
            ],
            [
                'nama' => 'Batik Tulis Paseban Motif Rereng Kujang',
                'foto' => 'rereng_kujang.png',
                'makna' => 'Secara filosofis kujang berarti kukuh kana jangji( kukuh pada janji), janji yang harus kita kukuhkan kembali pada kesadaran diri sebagai manusia dan kesadaran pribadi sebagai bangsa.',
                'motif' => 'Terdiri dari ragam hias rereng klasik dengan komposisi motif kujang serta jenis pola hias menggunakan prinsip pola pengulangan teratur.'
            ]
     ]);
    }
}
