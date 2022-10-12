<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GreetingsController extends Controller
{
    public function index() {
        return view('greetings');
    }
}
//in git
