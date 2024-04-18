<?php

namespace App\Http\Controllers;

use App\Models\Interest;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class InterestsController extends Controller
{
    public function index(){
        $interests = Interest::$interests;
        return view('interests', compact('interests'));
    }
}
