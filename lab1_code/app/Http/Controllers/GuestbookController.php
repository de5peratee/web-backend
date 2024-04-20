<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GuestbookController extends Controller
{
    protected function getMessages()
    {
        $contents = Storage::get('messages.inc');
        $lines = explode("\n", trim($contents));
        $messages = array_filter(array_map(function ($line) {
            $parts = explode(';', $line);
            return count($parts) >= 6 ? $parts : null;
        }, $lines));
        return array_reverse($messages);
    }

    public function index()
    {
        $messages = $this->getMessages();
        return view('guestbook', ['messages' => $messages]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'surname' => 'required',
            'name' => 'required',
            'patronymic' => 'required',
            'email' => 'required|email',
            'review' => 'required',
        ]);

        $message = date('d.m.y, H:i:s') . ';' . implode(';', $data) . "\n";
        Storage::append('messages.inc', $message);

        return redirect('/guestbook');
    }


}
