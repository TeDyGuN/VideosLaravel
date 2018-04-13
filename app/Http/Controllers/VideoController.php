<?php

namespace App\Http\Controllers;


use App\Video;
use App\Comment;


use App\User;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Redirect;
//use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;
//use Barryvdh\DomPDF\PDF;
//use Barryvdh\DomPDF;
use Validator;
use Illuminate\Support\Facades\File;
use App\Categoria;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    public function createVideo(){
      $cat = Categoria::all();
      return view('Video.createVideo', compact('cat'));
    }
    public function saveVideo(Request $request){
      $validateData = $this->validate($request, [
          'tittle' => 'required|min:5',
          'description' => 'required',
          'video' => 'mimes:mp4'
      ]);
      $video = new Video();
      //subida Miniatura
      $image = $request->file('mini');
      if($image)
      {
        $image_path = time().$image->getClientOriginalName();
        \Storage::disk('images')->put($image_path, \File::get($image));
        $video->image = $image_path;
      }
      //subida videos
      $videos = $request->file('video');
      if($videos)
      {
        $video_path = time().$videos->getClientOriginalName();
        \Storage::disk('videos')->put($video_path, \File::get($videos));
        $video->video_path = $video_path;
        $video->duration = $request->duration;
      }
      $video->id_categoria = $request->categoria;
      $video->tittle = $request->tittle;
      $video->description = $request->description;
      $video->visitas = 0;
      $video->status = 'OK';
      $video->save();

      return Redirect::back()->with(['success' => ' ']);
    }
    public function getImage($filename){
      $file = \Storage::disk('images')->get($filename);
      return \Response($file, 200);
    }
    public function getVideo($filename){
      $file = \Storage::disk('videos')->get($filename);
      return \Response($file, 200);
    }
    public function getDescription($id){
      $video = Video::find($id);
      $video->visitas = $video->visitas + 1;
      $video->save();
      $categorias = Categoria::get();
      $otros = Video::where('id_categoria', $video->id_categoria)
                ->take(5)
                ->get();
      return view('Video.videoDescription', compact('video', 'categorias', 'otros', 'otros'));
    }
    public function listar(){
      $videos = Video::paginate(10);
      return view('Video.listar', compact('videos'));
    }
    public function modificar($id)
    {
        $video = Video::find($id);
        return view('Video.modificar', compact('video'));
    }
    public function update(Request $request){
      $video = Video::find($request->id);
      $video->tittle = $request->titulo;
      $video->description = $request->description;
      $video->duration = $request->duration;
      $video->save();
      return Redirect::back()->with(['success' => ' ']);
    }
}
