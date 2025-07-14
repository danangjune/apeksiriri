<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Str;

class DashboardController extends Controller
{
    public function index() 
    {
        $progress = app("App\Http\Controllers\ProgressHarianController")->getDataProgress();
        return view('admin.dashboard.index', compact("progress"));
    }

    public function getChartDataJsonAPIProgress()
    {
        $progress = app("App\Http\Controllers\ProgressHarianController")->getDataProgress();
        $labels = [];
        $values = [];
        $backgroundColors = [];
    
        foreach ($progress as $acara) {
            $labels[] = $acara->nama;
            $details = $acara->detail ?? [];
            $total = count($details);
            $sum = 0;
    
            foreach ($details as $d) {
                if (isset($d->progress->progress)) {
                    $sum += $d->progress->progress;
                }
            }
    
            $avg = $total > 0 ? round($sum / $total, 2) : 0;
            $values[] = $avg;

            $r = rand(150, 255);
            $g = rand(150, 255);
            $b = rand(150, 255);
            $color = sprintf("rgba(%d,%d,%d,0.8)", $r, $g, $b);
            $backgroundColors[] = $color;
        }
    
        return response()->json([
            'labels' => $labels,
            'datasets' => [[
                'label' => 'Progress Rata-rata (%)',
                'data' => $values,
                'backgroundColor' => $backgroundColors,
                'borderColor' => $backgroundColors,
                'borderWidth' => 1
            ]]
        ]);
    }
}
