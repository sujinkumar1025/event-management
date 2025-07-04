<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function store(Request $request, $eventId)
    {
        $event = Event::findOrFail($eventId);

        if ($event->bookings()->count() >= $event->max_capacity) {
            return redirect()->back()->with('error', 'Event is fully booked.');
        }

        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'comments' => 'nullable|string|max:500',
        ]);

        Booking::create([
            'event_id' => $event->id,
            'name'     => $request->name,
            'email'    => $request->email,
            'phone'    => $request->phone,
            'comments'    => $request->comments,
        ]);

        return redirect()->back()->with('success', 'Booking successful!');
    }
}
