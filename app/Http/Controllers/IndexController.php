<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Video;
use App\Categoria;

class IndexController extends Controller
{
    public function index()
    {
        $videos = Video::get();
        $categorias = Categoria::get();
        $key = null;
        return view('welcome', compact('videos', 'categorias', 'key'));
    }
}
