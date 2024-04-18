<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AlbumController extends Controller
{
    public function index(){
        $photos = Photo::PHOTOS;
        return view('photoalbum', ['photos' => $photos]);
    }
}
