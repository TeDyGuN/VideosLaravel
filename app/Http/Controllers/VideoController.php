<?php

namespace App\Http\Controllers;


use App\Video;
use App\Comment;

use App\User;

use FFMpeg;
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
        $media = FFMpeg::open(\File::get($videos));
        $durationInSeconds = $media->getDurationInSeconds(); // returns an int
        $video->video_path = $video_path;
        $video->duration = $durationInSeconds;
      }

      $video->tittle = $request->tittle;
      $video->description = $request->description;
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
      return view('Video.videoDescription', compact('video'));
    }
    public function prueba(){
      $url = storage_path('app/videos/1523470363videoplayback.mp4');
      //$exel = 'ffmpeg -i '.$url.' 2>&1 | grep Duration | awk \'{print $2}\' | tr -d ,';
      //dd($exel);
      //echo exec('ffmpeg -i '.$url.' 2>&1 | grep Duration | awk \'{print $2}\' | tr -d ,', $duration);
      var_dump(shell_exec('ffmpeg -i /opt/lampp/htdocs/vides/storage/app/videos/1523470363videoplayback.mp4 2>&1 | grep Duration | awk \'{print $2}\' | tr -d ,'));
      // $duration = FFMpeg\FFProbe::create()
      //   ->format($file)
      //   ->get('duration');
      //var_dump($duration);
    }
}
