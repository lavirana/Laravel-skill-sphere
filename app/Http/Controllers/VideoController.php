<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function  index(){
        $video = \App\Models\video::with('latestComment')->find(1);
        return $video;
    }
    public function show($id){
        $video = \App\Models\video::with('comments')->find($id);
        return $video;
    }

    public function show_best(){
        $video = \App\Models\video::with('bestComment')->find(1);
        return $video;
    }
}
