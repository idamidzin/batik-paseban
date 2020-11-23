<?php

use Illuminate\Database\Seeder;

class ProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profile')->insert([
    		[
    			'nama' => 'Sejarah',
    			'sejarah_singkat' => 'Cagar Budaya Nasional Gedung Paseban Tri Panca Tunggal, terdapat di Kabupaten Kuningan tepatnya di Jalan Raya Cigugur No.1031, Kuningan Jawa Barat. Bangunan ini berdiri bekisar dari tahun 1840an yang sampai sekarang tetap terlestarikan dan menjadi tempat kegiatan berkesenian. Bangunan Paseban Tri Panca Tunggal memiliki karakteristik yang banyak kesamaan dengan konsep arsitektural bangunan tradisional Jawa dan Sunda. Bangunan ini juga secara keseluruhan menghadap ke arah barat. Letak itu merupakan lambang yang menggambarkan bahwa timur barat merupakan garis perjalanan Matahari, dan diartikan bahwa dalam pagelaran hidup ini antara terbit dan terbenam atau lahir dan mati sesuai yang tersimpulkan dalam arti atau makna Tri Panca Tunggal. Selain pengaruh kebudayaan Jawa dan Sunda, pengaruh dari Cirebon sebagai kota yang berbatasan dengan Kuningan juga dapat terlihat dari bentuk ornamen hiasnya. Misalnya saja motif hias jagad ayang-ayang yang merupakan variasi dari motif hias mega mendung dan wadasan khas kota Cirebon, terlihat banyak menghiasi bangunan ini. Secara keseluruhan ornamen hias pada bangunan ini motif hiasnya berpola simetri, beraturan, memancar, dan berulang. Pola yang paling dominan menggunakan pola simetri yaitu bagian kiri dan kanan ornamen memiliki bentuk dan ukuran yang serupa membentuk satu kesatuan yang utuh. Fungsi ornamen hiasnya secara keseluruhan berfungsi simbolis, murni estetis, dan konstruksi. Akan tetapi yang paling dominan lebih ke fungsi simbolis yang kaya akan makna nasihat hidup sesuai dengan ajaran dan prinsip dari bapak Kiai Madrais yang mendasari pembangunan gedung ini, bahwa ia menghendaki segala yang ada di dalam ruangan Paseban, haruslah selalu membuat manusia mengingat bahwa mereka adalah utusan Tuhan dan bagian dari alam semesta. Inspirasi Motif Batik Tulis Paseban Lahirnya Batik Paseban Cigugur diprakarsai oleh Pangeran Djatikusumah sebagai cucu atau keturunan ke III dari Pangeran Madrais. Beliau memberikan konsep Batik Paseban Cigugur kepada seniman-seniman yang ada di sekitar Paseban. Usaha batik dan seni ukir Cigugur dikembangkan di Paseban Cigugur, pada motif batik Paseban Cigugur terilhami dari relief lama dan seni ukir klasik yang terdapat pada ornamen gedung Paseban Tri Panca Tunggal. Selama enam tahun terkumpul lebih dari 200 motif, maka sejak juni 2006 dimulai pelatihan-pelatihan membatik pada masyarakat sekitar. Pada 15 Oktober 2006 Batik Paseban Cigugur diresmikan lahir dan menyemarakan seni adiluhung batik tulis bangsa ini. Hal ini bertujuan pula untuk memperkenalkan lebih jauh kepada masyarakat mengenai nilai-nilai filosofi dalam penerapan yang berbeda. Dari 200 motif terdapat 7 motif yang sudah memiliki Hak Atas Kekayaan Intelektual, yang akan diuraikan dengan makna filosofis yang ada pada Batik Tulis Paseban.'
    		]
    	]);
    }
}
