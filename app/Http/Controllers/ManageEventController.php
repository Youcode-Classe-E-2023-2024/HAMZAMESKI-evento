<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManageEventController extends Controller
{
    public function show () {
        $black_hover = 'Manage events';

        return view('manage-events', compact('black_hover'));
    }
}
