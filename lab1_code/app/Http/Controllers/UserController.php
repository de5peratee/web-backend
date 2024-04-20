<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller {
    public function indexReg(){
        return view('/reg_user');
    }
    public function indexLog(){
        return view('/log_user');
    }

    public function checkLog(Request $request)
    {
        $validatedData = $request->validate([
            'login' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('login', $validatedData['login'])->first();

        if ($user && Hash::check($validatedData['password'], $user->password)) {
            Auth::login($user);
            Session::put('user', $user);
            return redirect('/index')->with('success', 'Вы успешно вошли в систему!');
        } else {
            return back()->withErrors([
                'login' => 'Неверный логин или пароль.',
            ]);
        }
    }

    public function storeReg(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'login' => 'required|min:5|max:255|unique:users',
            'password' => [
                'required',
                'min:8',
                'confirmed',
                'regex:/[a-zA-Z]/',
                'regex:/\d/',
            ],
            'password_confirmation' => 'required'
        ]);

        $user = new User;
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->login = $validatedData['login'];
        $user->password = bcrypt($validatedData['password']);

        $user->save();

        return redirect('/index')->with('success', 'Вы успешно зарегистрировались!');
    }


}
