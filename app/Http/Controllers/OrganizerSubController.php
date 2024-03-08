<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organizer;

class OrganizerSubController extends Controller
{
    public function subscribe() {

        $validated = request()->validate([
            'email' => 'required|email|unique:organizers,email',
        ]);

        $validated['user_id'] = auth()->id();
        Organizer::create($validated);


        return redirect()->back();
    }
}
