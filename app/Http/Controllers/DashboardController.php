<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() 
    {
        $progress = app("App\Http\Controllers\ProgressHarianController")->getDataProgress();
        return view('admin.dashboard.index', compact("progress"));
    }
}
