<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormValidation;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    public function index()
    {
        $posts = BlogPost::orderBy('created_at', 'desc')->paginate(10);
        return view('blog', ['posts' => $posts]);
    }

}
