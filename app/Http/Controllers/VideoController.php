<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Video;
use App\Comment;
use App\User;
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
      $video->tittle = $request->tittle;
      $video->description = $request->description;
      $video->image = $request->image;
      $video->video_path = $request->video_path;
      $video->status = $request->status;
      $video->save();

      return redirect()->back();

    }
}
