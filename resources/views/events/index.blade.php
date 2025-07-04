<link rel="stylesheet" href="/css/style.css">

<h1>Upcoming Events</h1>


@if($events->count() > 0)
    @foreach($events as $event)
 <div class="event-card">
        <h3>{{ $event->title }}</h3>
        <p>{{ \Carbon\Carbon::parse($event->event_date)->format('d-m-Y h:i A') }}</p>
        <a href="/events/{{ $event->id }}" class="button">View Details</a>
    </div>    @endforeach
@else
    <p style="text-align: center; color: #555;">No upcoming events at the moment. Please check back later.</p>
@endif
