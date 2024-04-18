<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GuestbookEditController extends Controller
{

    public function index()
    {
        return view('/admin/upload-guestbook');
    }

    public function storeUpload(Request $request)
    {
        $request->validate([
            'file' => 'required|file',
        ]);

        if ($request->file('file')->getClientOriginalName() == 'messages.inc') {
            Storage::put('messages.inc', file_get_contents($request->file('file')));
        }

        return redirect('/guestbook');
    }
}
