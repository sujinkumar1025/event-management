<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Booking;
use Illuminate\Http\Request;

class AdminController extends Controller {

    public function events() {
        $events = Event::orderBy('event_date')->get();
        return view('admin.events', compact('events'));
    }

    // public function storeEvent(Request $request) {
    //     $request->validate([
    //         'title' => 'required',
    //         'description' => 'required',
    //         'event_date' => 'required|date',
    //         'max_capacity' => 'required|integer|min:1'
    //     ]);

    //     Event::create($request->all());
    //     return back()->with('success', 'Event created successfully.');
    // }


    public function storeEvent(Request $request) {
    $request->validate([
        'title' => 'required',
        'description' => 'required',
        'event_date_only' => 'required|date',
        'event_time_only' => 'required',
        'max_capacity' => 'required|integer|min:1'
    ]);

    $combinedDateTime = $request->event_date_only . ' ' . $request->event_time_only;

    Event::create([
        'title' => $request->title,
        'description' => $request->description,
        'event_date' => $combinedDateTime,
        'max_capacity' => $request->max_capacity,
    ]);

    return back()->with('success', 'Event created successfully.');
}


    public function bookings($eventId) {
        $event = Event::findOrFail($eventId);
        $bookings = $event->bookings;
        return view('admin.bookings', compact('event', 'bookings'));
    }

    public function deleteBooking($bookingId) {
        Booking::findOrFail($bookingId)->delete();
        return back()->with('success', 'Booking cancelled.');
    }
}
