<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Video;

class IndexController extends Controller
{
    public function index()
    {
        $videos = Video::get();
        return view('welcome', compact('videos'));
    }
}
