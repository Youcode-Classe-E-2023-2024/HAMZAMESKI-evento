<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;

class ManageEventController extends Controller
{
    public function show () {
        $black_hover = 'Manage events';

        return view('manage-events', compact('black_hover'));
    }

    public function event_details (Event $event) {
        $black_hover = 'Home';
        return view('event.event-details', compact('black_hover', 'event'));
    }
}
