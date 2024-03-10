<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Category;

class MainController extends Controller
{
    public function index() {

        $black_hover = 'home';
        $events = Event::latest()->where('is_published', '1')->paginate(10);
        $categories = Category::latest()->get();

        return view('main', compact('black_hover', 'events', 'categories'));
    }

    public function category_events (Category $category) {
        $black_hover = 'home';
        $events = $category->events()->paginate(10);
        $categories = Category::latest()->get();

        return view('main', compact('black_hover', 'events', 'categories'));
    }
}
