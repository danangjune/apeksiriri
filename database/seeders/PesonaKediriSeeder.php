<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PesonaKediriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PesonaKediri::create(['id' => 1, 'judul' => 'PESONA KEDIRI RAYA', 'deskripsi' => '<p>Pesona Kota Kediri memancarkan daya tarik modern sekaligus sejarah yang mendalam. Sebagai salah satu kota tertua di Indonesia, Kediri menjadi saksi kejayaan Kerajaan Kediri, yang warisannya masih terasa hingga kini. Kota ini menawarkan destinasi wisata yang menarik, seperti Taman Brantas yang menyegarkan, Museum Airlangga yang sarat sejarah, dan ikon religius Klenteng Tjoe Hwie Kiong. Selain itu, suasana kota yang tenang dengan aliran Sungai Brantas menjadikan Kediri tempat yang nyaman untuk dikunjungi. Kediri juga dikenal dengan kuliner legendarisnya, seperti tahu takwa yang gurih dan soto Kediri yang kaya rasa. Dengan seni budaya lokal seperti seni jaranan dan beragam festival, Kota Kediri adalah perpaduan sempurna antara sejarah, tradisi, dan modernitas. <strong>Inilah kota yang menyambut setiap langkah dengan kehangatan dan pesona tiada tara!&nbsp;</strong></p>', 'gambar1' => 'cut 1.png', 'gambar2' => 'cut 2.png', 'gambar3' => 'cut 3.png']);
    }
}
