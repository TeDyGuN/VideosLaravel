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
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    public function createVideo(){
      return view('Video.createVideo');
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
    public function getDescription($id){


      $video = Video::find($id);
      $video->visitas = $video->visitas + 1;
      $video->save();
      return view('Video.videoDescription', compact('video'));
    }
}
