<?php

namespace App\Http\Controllers;

use App\Models\Event;

class EventController extends Controller {
    public function index() {
        $events = Event::where('event_date', '>=', now())->orderBy('event_date')->get();
        return view('events.index', compact('events'));
    }

    public function show($id) {
        $event = Event::findOrFail($id);
        $booked = $event->bookings()->count();
        return view('events.show', compact('event', 'booked'));
    }
}
