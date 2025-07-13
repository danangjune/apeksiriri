<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Daftarkan semua rute dalam aplikasi.
     */
    public function boot(): void
    {
        $this->routes(function () {
            // Rute API
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            // Rute Web
            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });
    }
}
