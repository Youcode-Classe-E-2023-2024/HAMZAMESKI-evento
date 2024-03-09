<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrganizerSubController extends Controller
{
    public function subscribe() {

        $validated = request()->validate([
            'email' => 'required',
        ]);

        if ($validated['email']->hasRole('organizer_lvl4')) {

        }


        return redirect()->back();
    }
}
