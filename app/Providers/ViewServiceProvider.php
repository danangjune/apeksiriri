<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Feedback;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $total = Feedback::count();
    
            $sangatPuas = Feedback::where('rating', 4)->count();
            $puas = Feedback::where('rating', 3)->count();
            $cukupPuas = Feedback::where('rating', 2)->count();
            $tidakPuas = Feedback::where('rating', 1)->count();
    
            $persentase = [];
            if ($total > 0) {
                $persentase = [
                    'sangat_puas' => round(($sangatPuas / $total) * 100, 2),
                    'puas' => round(($puas / $total) * 100, 2),
                    'cukup_puas' => round(($cukupPuas / $total) * 100, 2),
                    'tidak_puas' => round(($tidakPuas / $total) * 100, 2),
                ];
            }
    
            // Kirim data ke semua view
            $view->with('persentaseKepuasan', $persentase);
        });
    }
}
