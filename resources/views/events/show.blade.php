<link rel="stylesheet" href="/css/style.css">

<div class="event-container">
    <h1>{{ $event->title }}</h1>
    <p>{{ $event->description }}</p>
    <p><strong>Date:</strong>{{ \Carbon\Carbon::parse($event->event_date)->format('d-m-Y h:i A') }}</p>
    <p><strong>Capacity:</strong> {{ $booked }} / {{ $event->max_capacity }}</p>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-error">{{ session('error') }}</div>
    @endif

    @if($booked < $event->max_capacity)
        <h3>Book this Event</h3>
        <form method="POST" action="/events/{{ $event->id }}/book" class="event-form-buttons">
            @csrf
            <input type="text" name="name" placeholder="Your Name" required>
            <input type="email" name="email" placeholder="Your Email" required>
            <input type="text" name="phone" placeholder="Phone Number" required>
            <textarea name="comments" placeholder="Notes (optional)"></textarea>

            <div class="button-row">
                <button type="submit" class="button">Book Now</button>
                <a href="http://127.0.0.1:8000/" class="button back-button">Back</a>
            </div>
        </form>
    @else
        <p><strong>Event is fully booked.</strong></p>
        <a href="http://127.0.0.1:8000/" class="button back-button">Back</a>
    @endif
</div>
