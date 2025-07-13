<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    private function _appNavigation() 
    {
        return array(
            [
                'title' => 'Mengenal Kediri',
                'url' => '/profil',
                'routes' => ['pesona-kediri-raya', 'tentang-kediri', 'fasilitas-kota', 'perangkat-daerah', 'kelurahan', 'penghargaan', 'detil-penghargaan/*', 'perangkat-daerah'],
                'children' => array(
                        [
                            'title' => 'Pesona Kediri Raya',
                            'description' => 'Informasi lengkap tentang tempat wisata, budaya, kuliner, hingga produk khas Kota Kediri.',
                            'icon' => 'bi-search-heart', 
                            'url' => '/pesona-kediri-raya'
                        ],
                        [
                            'title' => 'Tentang Kediri',
                            'description' => 'Gambaran umum tentang Kota Kediri, termasuk sejarah, visi & misi, serta profil pemimpinnya.',
                            'icon' => 'bi-info-circle', 
                            'url' => '/tentang-kediri'
                        ],
                        [
                            'title' => 'Fasilitas Kota',
                            'description' => 'Berbagai sarana dan prasarana yang ada di Kota Kediri.',
                            'icon' => 'bi-building', 
                            'url' => '/fasilitas-kota'
                        ],
                        [
                            'title' => 'Perangkat Daerah',
                            'description' => 'Struktur dan tugas perangkat daerah yang mendukung pelayanan publik.',
                            'icon' => 'bi-diagram-3', 
                            'url' => '/perangkat-daerah/struktur-organisasi'
                        ],
                        [
                            'title' => 'Kelurahan',
                            'description' => 'Informasi tentang pembagian wilayah kelurahan di Kota Kediri.',
                            'icon' => 'bi-map', 
                            'url' => '/kelurahan'
                        ],
                        [
                            'title' => 'Penghargaan',
                            'description' => 'Prestasi dan penghargaan yang telah diraih oleh Kota Kediri.',
                            'icon' => 'bi-trophy', 
                            'url' => '/penghargaan'
                        ]
                ),
            ],
            [
                'title' => 'Pusat Media & Informasi',
                'url' => '/profil',
                'routes' => ['pengumuman', 'pengumuman/*', 'detil-pengumuman/*', 'galeri', 'video', 'dokumen'],
                'children' => array(
                    [
                        'title' => 'Berita',
                        'description' => 'Berita terkini mengenai berbagai aktivitas dan program Kota Kediri',
                        'icon' => 'bi-newspaper', 
                        'url' => '/berita'
                    ],
                    [
                        'title' => 'Pengumuman',
                        'description' => 'Informasi penting yang perlu diketahui masyarakat.',
                        'icon' => 'bi-megaphone', 
                        'url' => '/pengumuman'
                    ],
                    [
                        'title' => 'Galeri',
                        'description' => 'Koleksi foto yang menggambarkan aktivitas dan keindahan Kota Kediri.',
                        'icon' => 'bi-images', 
                        'url' => '/galeri'
                    ],
                    [
                        'title' => 'Video',
                        'description' => 'Dokumentasi audiovisual terkait Kota Kediri.',
                        'icon' => 'bi-camera-video',
                        'url' => '/video'
                    ],
                    // [
                    //     'title' => 'Kediri dalam Angka',
                    //     'description' => 'Statistik dan data penting yang menggambarkan kondisi Kota Kediri.',
                    //     'icon' => 'bi-file-earmark-bar-graph', 
                    //     'url' => '/kediri-dalam-angka'
                    // ],
                    [
                        'title' => 'Satu Data',
                        'description' => 'Portal satu data Pemerintah Kota Kediri.',
                        'icon' => 'bi-graph-up-arrow', 
                        'url' => 'https://satudata.kedirikota.go.id'
                    ],
                    [
                        'title' => 'Dokumen',
                        'description' => 'Dokumen berisi berbagai laporan dan regulasi Pemerintah Kota Kediri.',
                        'icon' => 'bi-file-earmark-medical', 
                        'url' => '/dokumen'
                    ],
                ),
            ],
            [
                'title' => 'Layanan Publik',
                'url' => '/layanan-publik',
                'routes' => ['layanan_publik'],
            ],
            [
                'title' => 'PPID',
                'routes' => ['ppid'],
                'url' => 'https://ppid.kedirikota.go.id',
            ],
        );
    }

    private function _footerNavigation() 
    {
        return array(
            [
                'title' => 'Pelayanan',
                'url' => '/pelayanan',
            ],
            [
                'title' => 'Investasi',
                'url' => '/investasi',
            ],
            [
                'title' => 'Telephone Penting',
                'url' => '/telephone-penting',
            ],
            [
                'title' => 'Organisasi',
                'url' => '/organisasi',
            ],
            [
                'title' => 'Lowongan Kerja',
                'url' => '/lowongan-kerja',
            ],
            [
                'title' => 'Transparasi Anggaran',
                'url' => '/transparasi-anggaran',
            ],
        );
    }

    private function _appAdminSidebar()
    {
        return array(
            [
                'title' => 'Dashboard',
                'url' => '/dashboard',
                'routes' => ['dashboard'],
                'icon' => 'fa-cubes',
            ],
            // [
            //     'title' => 'Landing Page',
            //     'url' => '#',
            //     'routes' => ['layanan-terpadu', 'kalender-acara', 'list-arsip-banner-layanan', 'form-kalender-acara/*'],
            //     'icon' => 'fa-shapes',
            //     'children' => array(
            //         [
            //             'title' => 'Layanan Terpadu',
            //             'url' => '/layanan-terpadu',
            //             'routes' => ['layanan-terpadu', 'list-arsip-banner-layanan'],
            //         ],
            //         [
            //             'title' => 'Kalender Acara',
            //             'url' => '/kalender-acara',
            //             'routes' => ['kalender-acara', 'form-kalender-acara/*']
            //         ]
            //     ),
            // ],
            [
                'title' => 'Home',
                'url' => '#',
                'routes' => ['banner-beranda','list-program-unggulan', 'form-program-unggulan/*', 'list-layanan-digital'],
                'icon' => 'fa-home',
                'children' => array(
                    [
                        'title' => 'Banner',
                        'url' => '/banner-beranda',
                        'routes' => ['banner-beranda'],
                    ],
                    [
                        'title' => 'Banner Promo',
                        'url' => '/list-banner-promo',
                        'routes' => ['list-banner-promo']
                    ],
                    [
                        'title' => 'Program Unggulan',
                        'url' => '/list-program-unggulan',
                        'routes' => ['list-program-unggulan', 'form-program-unggulan/*']
                    ],
                    [
                        'title' => 'Layanan Digital',
                        'url' => '/list-layanan-digital',
                        'routes' => ['list-layanan-digital']
                    ],
                ),
            ],
            [
                'title' => 'Mengenal Kediri',
                'url' => '#',
                'routes' => ['form-pesona-kediri', 'ada-apa-kediri', 'form-ada-apa/*', 'list-kategori-aset', 'list-penghargaan', 'form-visimisi', 'list-opd', 'list-sejarah', 'list-jabatan', 'list-pimpinan', 'list-kelurahan', 'list-kelurahan', 'list-fasilitas', 'form-opd/*'],
                'icon' => 'fa-industry',
                'children' => array(
                    [
                        'title' => 'Pesona Kediri Raya',
                        'url' => '/form-pesona-kediri',
                        'routes' => ['form-pesona-kediri']
                    ],
                    [
                        'title' => 'Ada Apa Di Kediri',
                        'url' => '/ada-apa-kediri',
                        'routes' => ['ada-apa-kediri', 'form-ada-apa/*', 'list-kategori-aset']
                    ],
                    [
                        'title' => 'Penghargaan',
                        'url' => '/list-penghargaan',
                        'routes' => ['list-penghargaan']
                    ],
                    [
                        'title' => 'Visi Dan Misi',
                        'url' => '/form-visimisi',
                        'routes' => ['form-visimisi']
                    ],
                    [
                        'title' => 'Perangkat Daerah',
                        'url' => '/list-opd',
                        'routes' => ['list-opd', 'form-opd/*']
                    ],
                    [
                        'title' => 'Sejarah Kota',
                        'url' => '/list-sejarah',
                        'routes' => ['list-sejarah']
                    ],
                    [
                        'title' => 'Daftar Pimpinan',
                        'url' => '/list-pimpinan',
                        'routes' => ['list-pimpinan']
                    ],
                    [
                        'title' => 'Kelurahan',
                        'url' => '/list-kelurahan',
                        'routes' => ['list-kelurahan']
                    ],
                    [
                        'title' => 'Fasilitas Kota',
                        'url' => '/list-fasilitas',
                        'routes' => ['list-fasilitas']
                    ],
                ),
            ],
            [
                'title' => 'Pusat Media & Informasi',
                'url' => '#',
                'routes' => ['list-pengumuman', 'list-berita', 'list-berita-luar', 'list-galeri', 'list-dokumen', 'list-artikel', 'form-berita/*', 'form-pengumuman/*', 'form-dokumen/*', 'form-artikel/*'],
                'icon' => 'fa-newspaper',
                'children' => array(
                    [
                        'title' => 'Pengumuman',
                        'url' => '/list-pengumuman',
                        'routes' => ['list-pengumuman', 'form-pengumuman/*']
                    ],
                    [
                        'title' => 'Berita',
                        'url' => '/list-berita',
                        'routes' => ['list-berita', 'form-berita/*']
                    ],
                    [
                        'title' => 'Berita Luar',
                        'url' => '/list-berita-luar',
                        'routes' => ['list-berita-luar']
                    ],
                    [
                        'title' => 'Galeri',
                        'url' => '/list-galeri',
                        'routes' => ['list-galeri']
                    ],
                    [
                        'title' => 'Dokumen',
                        'url' => '/list-dokumen',
                        'routes' => ['list-dokumen', 'form-dokumen/*']
                    ],
                    [
                        'title' => 'Artikel',
                        'url' => '/list-artikel',
                        'routes' => ['list-artikel', 'form-artikel/*']
                    ],
                ),
            ],
            [
                'title' => 'Feedback',
                'url' => '/list-feedback',
                'routes' => ['list-feedback'],
                'icon' => 'fa-star',
            ],
            [
                'title' => 'User',
                'url' => '/list-user',
                'routes' => ['list-user'],
                'icon' => 'fa-user',
            ],
            // [
            //     'title' => 'Profil Kota',
            //     'url' => '#',
            //     'routes' => ['profil-kota-editor/*'],
            //     'icon' => 'fa-building',
            //     'children' => [
            //         [
            //             'title' => 'Kediri The Service City',
            //             'url' => '/profil-kota-editor/1',
            //             'routes' => ['profil-kota-editor/1']
            //         ],
            //         [
            //             'title' => 'Makna Lambang',
            //             'url' => '/profil-kota-editor/2',
            //             'routes' => ['profil-kota-editor/2']
            //         ],
                   
            //         [
            //             'title' => 'Renstra',
            //             'url' => '/profil-kota-editor/5',
            //             'routes' => ['profil-kota-editor/5']
            //         ],
            //         [
            //             'title' => 'Ekonomi',
            //             'url' => '/profil-kota-editor/6',
            //             'routes' => ['profil-kota-editor/6']
            //         ],
            //     ],
            // ],
            // [
            //     'title' => 'Deskripsi Kota',
            //     'url' => '#',
            //     'routes' => ['deskripsi-kota-editor/*'],
            //     'icon' => 'fa-university',
            //     'children' => array(
            //         [
            //             'title' => 'Kondisi Geografis',
            //             'url' => '/deskripsi-kota-editor/7',
            //             'routes' => ['deskripsi-kota-editor/7']
            //         ],
            //         [
            //             'title' => 'Kondisi Demografis',
            //             'url' => '/deskripsi-kota-editor/8',
            //             'routes' => ['deskripsi-kota-editor/8']
            //         ],
            //         [
            //             'title' => 'Kebudayaan Dan Kesenian',
            //             'url' => '/deskripsi-kota-editor/10',
            //             'routes' => ['deskripsi-kota-editor/10']
            //         ],
            //         [
            //             'title' => 'Kelurahan',
            //             'url' => '/deskripsi-kota-editor/11',
            //             'routes' => ['deskripsi-kota-editor/11']
            //         ],
            //     ),
            // ],
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (! app()->runningInConsole()) {
            View::share('appNavigation', $this->_appNavigation());
            View::share('footerNavigation', $this->_footerNavigation());
            View::share('appAdminSidebar', $this->_appAdminSidebar());
        }

        View::composer('*', function ($view) {
            $navigation = $this->_appNavigation();
            $view->with('footerMenus', collect($navigation)->whereIn('title', ['Mengenal Kediri', 'Pusat Media & Informasi']));
        });
    }
}
