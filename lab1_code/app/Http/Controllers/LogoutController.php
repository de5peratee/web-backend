<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LogoutController
{
    public function logout()
    {
        Session::put('isAdmin', 0);
        Auth::logout();
        return redirect('/index');
    }
}
