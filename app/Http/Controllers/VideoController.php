<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VideoController extends Controller
{
    // ------------------------------------ USER ----------------------------------------
    public function video()
    {
        $titlepage = "Video";
        return view('video.index', compact('titlepage'));
    }
}
