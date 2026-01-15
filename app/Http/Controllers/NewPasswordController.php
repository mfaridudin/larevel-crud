<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewPasswordController extends Controller
{
    public function create(){
        return view('Auth.new-password');
    }
}
