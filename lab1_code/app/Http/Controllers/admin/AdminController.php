<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function index()
    {
        return view('/admin/log_admin');
    }

    public function check(Request $request)
    {
        $admin = Admin::where('login', $request->login)->first();

        if ($admin && Hash::check($request->password, $admin->password)) {
            Auth::login($admin);
            Session::put('isAdmin', 1);

            return redirect('/admin/visitors');
        } else {
            return back()->withErrors([
                'login' => 'Неверный логин или пароль.',
            ]);
        }
    }

}
