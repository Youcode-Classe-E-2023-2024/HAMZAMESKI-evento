<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class MainController extends Controller
{
    public function index() {

        $black_hover = 'home';
        $events = Event::latest()->where('is_published', '1')->get();

        return view('main', compact('black_hover', 'events'));
    }
}
