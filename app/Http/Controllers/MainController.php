<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index() {

        $black_hover = 'home';
        return view('main', compact('black_hover'));
    }
}
