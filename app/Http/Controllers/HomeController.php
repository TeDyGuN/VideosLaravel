<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');

    }
    public function panel(){
      $cat = Categoria::all();
      return view('Video.createVideo', compact('cat'));
    }
    public function indexVideos()
    {
        return view('welcome');
    }
}
