<?php

namespace Database\Seeders;

use App\Models\ProfilPesertaApeksi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ProfilPesertaApeksiSeeder extends Seeder
{
    public function run(): void
    {
       ProfilPesertaApeksi::insert([
            [
                'nama' => 'Kota Kediri',
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/c/c1/Logo_Kota_Kediri_-_Seal_of_Kediri_City.svg',
                'deskripsi' => '<p>Kota Kediri merupakan kota yang berkembang pesat di bagian barat Jawa Timur dan dikenal sebagai pusat perdagangan serta industri, khususnya industri rokok dan makanan. Kota ini memiliki posisi strategis di jalur ekonomi selatan dan terus bertransformasi menjadi kota modern yang ramah investasi.</p>
                <p>Selain kekuatan ekonominya, Kediri juga kaya akan budaya dan sejarah. Jejak kerajaan Kediri dan berbagai tradisi lokal seperti jaranan, festival budaya, serta potensi wisata religi membuat kota ini tetap lestari dalam nuansa kearifan lokal.</p>',
                'embed_video' => 'https://drive.google.com/file/d/1SmXdhwdX46Tgp4mXrvun7kSUAlOoItMZ/preview',
                'pimpinan' => 'KOTA-KEDIRI.png'
            ],
            [
                'nama' => 'Kota Surabaya',
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/ba/City_of_Surabaya_Logo.svg/1200px-City_of_Surabaya_Logo.svg.png',
                'deskripsi' => '<p>Surabaya adalah kota metropolitan terbesar kedua di Indonesia dan memiliki julukan “Kota Pahlawan” karena sejarah perjuangan rakyatnya melawan penjajah. Sebagai pusat pemerintahan Provinsi Jawa Timur, Surabaya memegang peran penting dalam sektor industri, perdagangan, dan transportasi nasional.</p>
                <p>Kota ini juga dikenal dengan kekayaan kuliner, taman kota yang tertata baik, serta revitalisasi kawasan bersejarah seperti Kota Lama. Dengan infrastruktur modern dan komitmen terhadap digitalisasi pelayanan publik, Surabaya menjadi salah satu kota termaju di Indonesia.</p>',
                'embed_video' => 'https://drive.google.com/file/d/1Xn-BsdusAOmrXh4nzSGORa-WrjEPmwyn/preview',
                'pimpinan' => 'KOTA-SURABAYA.png'
            ],
            [
                'nama' => 'Kota Mojokerto',
                'logo' => 'https://ppid.mojokertokota.go.id/userfiles/2023/03/a1ee3d6283faf8ea08c97a0ec6b10d81.png',
                'deskripsi' => '<p>Mojokerto dikenal sebagai kota yang menyimpan banyak warisan sejarah Kerajaan Majapahit. Banyak situs arkeologi seperti Candi Tikus, Kolam Segaran, dan Museum Majapahit yang memperkuat identitas Mojokerto sebagai pusat sejarah Nusantara.</p>
                <p>Kota ini juga berkembang dalam bidang UMKM dan ekonomi kreatif, serta memiliki potensi wisata edukatif yang terus digali. Kombinasi sejarah dan inovasi menjadikan Mojokerto sebagai kota yang unik dan penuh daya tarik.</p>',
                'embed_video' => '/preview',
                'pimpinan' => 'KOTA-MOJOKERTO.png'
            ],
            [
                'nama' => 'Kota Pasuruan',
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/d/dc/Logo_Kota_Pasuruan_-_Seal_of_Pasuruan_City.svg',
                'deskripsi' => '<p>Pasuruan memiliki letak strategis di jalur utama Surabaya–Banyuwangi, menjadikannya pusat industri dan pertanian yang berkembang pesat. Kota ini terkenal dengan sentra pertanian hortikultura, perikanan, serta industri kreatif seperti bordir dan kerajinan logam.</p>
                <p>Keberagaman etnis dan budaya yang hidup berdampingan menciptakan kekayaan tradisi yang khas. Pasuruan juga aktif mengembangkan kawasan wisata alam dan religi untuk mendukung sektor pariwisata lokal.</p>',
                'embed_video' => '/preview',
                'pimpinan' => 'KOTA-PASURUAN.png'
            ],
            [
                'nama' => 'Kota Denpasar',
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/6/65/Lambang_Kota_Denpasar_%281%29.png',
                'deskripsi' => '<p>Denpasar merupakan ibu kota Provinsi Bali dan menjadi pusat administrasi, pendidikan, dan bisnis di pulau dewata. Kota ini menyeimbangkan modernitas dengan nilai-nilai budaya Bali yang kental dalam kehidupan sehari-hari.</p><p>Berbagai upacara adat, seni tari, dan kerajinan khas Bali dapat ditemui di berbagai sudut kota. Sebagai jantung Bali, Denpasar menjadi penopang utama pariwisata internasional yang membawa dampak positif bagi pertumbuhan ekonomi lokal.</p>',
                'embed_video' => '/preview',
                'pimpinan' => 'KOTA-DENPASAR.png'
            ],
            [
                'nama' => 'Kota Batu',
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/8a/Logo_Kota_Batu%2C_Jawa_Timur_%28Seal_of_Batu%2C_East_Java%29.svg/1200px-Logo_Kota_Batu%2C_Jawa_Timur_%28Seal_of_Batu%2C_East_Java%29.svg.png',
                'deskripsi' => '<p>Kota Batu dikenal sebagai destinasi wisata pegunungan yang menawarkan udara sejuk dan panorama alam yang indah. Terletak di lereng Gunung Panderman, kota ini berkembang pesat dengan agrowisata, taman hiburan, dan edukasi berbasis alam.</p><p>Sektor pertanian, khususnya hortikultura dan peternakan, menjadi kekuatan ekonomi utama. Kombinasi wisata dan pertanian menjadikan Batu sebagai kota yang asri dan menarik bagi keluarga maupun pelancong edukatif.</p>',
                'embed_video' => '/preview',
                'pimpinan' => 'KOTA-BATU.png'
            ],
            [
                'nama' => 'Kota Malang',
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/e/ef/Logo_Kota_Malang_color.png',
                'deskripsi' => '<p>Malang merupakan kota pendidikan yang dipenuhi oleh mahasiswa dari berbagai penjuru Indonesia. Universitas ternama, iklim sejuk, serta infrastruktur yang berkembang menjadikan Malang sebagai kota yang nyaman untuk belajar dan tinggal.</p><p>Di sisi lain, Malang juga kaya akan budaya, sejarah kolonial, dan kuliner khas seperti bakso, orem-orem, serta cwie mie. Suasana kota yang tenang dan bersahabat membuatnya menjadi salah satu kota favorit di Jawa Timur.</p>',
                'embed_video' => '/preview',
                'pimpinan' => 'KOTA-MALANG.png'
            ],
            [
                'nama' => 'Kota Blitar',
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/55/Lambang_Kota_Blitar.png/800px-Lambang_Kota_Blitar.png',
                'deskripsi' => '<p>Blitar memiliki nilai sejarah yang tinggi sebagai kota kelahiran dan makam Bung Karno, proklamator kemerdekaan Indonesia. Setiap tahun, ribuan peziarah datang untuk menghormati warisan perjuangan tersebut.</p><p>Selain itu, Blitar aktif mengembangkan sektor pertanian dan pariwisata berbasis budaya lokal. Pemerintah daerah juga fokus pada pembangunan infrastruktur dan pelestarian tradisi, menjadikan kota ini semakin maju namun tetap berakar pada sejarah bangsa.</p>',
                'embed_video' => '/preview',
                'pimpinan' => 'KOTA-BLITAR.png'
            ],
            [
                'nama' => 'Kota Probolinggo',
                'logo' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR1HzMUPQSrTAmjS6MZYu35KS3GVzXfnWsjpg&s',
                'deskripsi' => '<p>Terletak di pesisir utara Jawa Timur, Probolinggo dikenal sebagai gerbang utama menuju kawasan wisata Gunung Bromo. Letaknya yang strategis menjadikannya penghubung penting jalur pantura serta kota transit wisata.</p><p>Selain sektor pariwisata, kota ini juga dikenal dengan produk mangga, perikanan, dan industri pengolahan hasil laut. Pemerintah daerah terus berupaya mengembangkan potensi lokal guna meningkatkan kesejahteraan masyarakat.</p>',
                'embed_video' => 'https://drive.google.com/file/d/1Ac3cXX1OOsqmMQ5L3nG1Ui6YT7RvQvS1/preview',
                'pimpinan' => 'KOTA-PROBOLINGGO.png'
            ],
            [
                'nama' => 'Kota Madiun',
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/e/ec/Lambang_Kota_Madiun.png',
                'deskripsi' => '<p>Madiun dikenal sebagai kota industri dan teknologi, terutama dengan keberadaan PT INKA, produsen kereta api nasional. Julukan "Kota Gadis" yang merupakan singkatan dari Perdagangan, Pendidikan, dan Industri mencerminkan karakter kota ini.</p><p>Di samping itu, Madiun juga mempertahankan nilai-nilai budaya lokal melalui berbagai pertunjukan seni, kuliner seperti pecel Madiun, dan tradisi masyarakat yang kuat. Kota ini terus tumbuh menjadi pusat pertumbuhan ekonomi di wilayah barat Jawa Timur.</p>',
                'embed_video' => '/preview',
                'pimpinan' => 'KOTA-MADIUN.png'
            ],
            [
                'nama' => 'Kota Kupang',
                'logo' => 'https://upload.wikimedia.org/wikipedia/id/b/b0/LOGO_KOTA_KUPANG.png',
                'deskripsi' => '<p>Kupang adalah ibu kota Provinsi Nusa Tenggara Timur dan menjadi pusat aktivitas sosial, ekonomi, dan pemerintahan di kawasan timur Indonesia. Dengan pelabuhan yang ramai dan bandara internasional, Kupang menjadi pintu gerbang logistik ke wilayah kepulauan sekitarnya.</p><p>Kekayaan budaya lokal, potensi kelautan, serta posisi geografis yang strategis menjadikan Kupang kota penting dalam konektivitas nasional. Pemerintah daerah terus mendorong sektor pariwisata dan pembangunan berkelanjutan di kawasan pesisir.</p>',
                'embed_video' => 'https://drive.google.com/file/d/1GSMlzm1SK9SbVUrrQFcVDjKr6nBu4Z58/preview',
                'pimpinan' => 'KOTA-KUPANG.png'
            ],
            [
                'nama' => 'Kota Mataram',
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/f/fa/Lambang_Kota_Mataram.png',
                'deskripsi' => '<p>Sebagai pusat pemerintahan dan ekonomi NTB, Kota Mataram menjadi jantung aktivitas masyarakat Pulau Lombok. Fasilitas pendidikan, kesehatan, dan infrastruktur publik yang lengkap menjadikannya sebagai kota yang siap bersaing di tingkat nasional.</p><p>Mataram juga menyimpan kekayaan adat Sasak, kuliner khas, dan akses ke objek wisata unggulan seperti Pantai Senggigi dan Gili. Perpaduan modernitas dan kearifan lokal menjadikan Mataram sebagai kota yang harmonis dan terus berkembang.</p>',
                'embed_video' => '/preview',
                'pimpinan' => 'KOTA-MATARAM.png'
            ],
            [
                'nama' => 'Kota Bima',
                'logo' => 'https://portal.bimakota.go.id/upload/kontent/fc2780b8d6db4d2767782e35e5211306_lambang1.png',
                'deskripsi' => '<p>Bima memiliki sejarah panjang sebagai pusat Kesultanan Bima di masa lampau, yang menjadikannya salah satu kota dengan identitas budaya kuat di Nusa Tenggara Barat. Tradisi Mbojo masih terjaga melalui upacara adat dan bahasa daerah.</p><p>Selain potensi sejarah, Bima memiliki kekayaan alam di sektor pertanian dan kelautan. Kota ini terus berupaya mengembangkan sektor pariwisata dan infrastruktur untuk mendukung kemajuan wilayah timur Sumbawa.</p>',
                'embed_video' => 'https://drive.google.com/file/d/1z0dY0z5dFTiY75CYB-XGH9ezqjyQLC0n/preview',
                'pimpinan' => 'KOTA-BIMA.png'
            ],
        ]);
    }
}
