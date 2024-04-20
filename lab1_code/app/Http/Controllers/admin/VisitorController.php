<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Visitor;
use Illuminate\Http\Request;

class VisitorController extends Controller {
    public function index()
    {
        $visitors = Visitor::orderBy('created_at', 'desc')->paginate(20);
        return view('/admin/visitors', compact('visitors'));
    }
}
