<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormValidation;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        return view('contact');
    }

    public function store(Request $request){

        $validator = new FormValidation();
        $validator->setRule('fullName', 'isFullName');
        $validator->setRule('birthday', 'isAdult');
        $validator->setRule('phone', 'isPhoneNumber');
        $validator->setRule('gender', 'isNotEmpty');
        $validator->setRule('age', 'isNotEmpty');
        $validator->setRule('email', 'isEmail');
        $validator->setRule('message', 'isMessage');

        $validator->validate($request->all());

        if (!empty($validator->getErrors())) {
            return view('contact', ['errors_data' => $validator->getErrors()]);
        }
        else {
            return view('contact');
        }
    }
}
