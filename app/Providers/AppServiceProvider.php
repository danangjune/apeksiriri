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
            [
                'title' => 'Progress Harian',
                'url' => '/rangkaian-acara',
                'routes' => ['rangkaian-acara'],
                'icon' => 'fa-tasks',
            ],
            [
                'title' => 'Live Report',
                'url' => '/live-report',
                'routes' => ['liveReport'],
                'icon' => 'fa-video',
            ],
            [
                'title' => 'Data PIC',
                'url' => '/data-pic',
                'routes' => ['data-pic'],
                'icon' => 'fa-user',
            ],
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
