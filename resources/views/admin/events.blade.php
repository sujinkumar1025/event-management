<link rel="stylesheet" href="/css/style.css">

<div class="admin-container">
    <h1>Admin - Create Event</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="/admin/events" class="admin-form">
        @csrf
        <input type="text" name="title" placeholder="Title" required>
        <textarea name="description" placeholder="Description" required></textarea>
        <!-- <input type="datetime-local" name="event_date" required> -->
         <label>Event Date:</label>
<input type="date" name="event_date_only" required>

<label>Event Time:</label>
<input type="time" name="event_time_only" step="60" required>


        <input type="number" name="max_capacity" placeholder="Max Capacity" required>
        <button type="submit" class="button">Create Event</button>
    </form>

    <h2>All Events</h2>

    <table class="admin-table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Date</th>
                <th>Max Capacity</th>
                <th>Bookings</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($events as $event)
            <tr>
                <td>{{ $event->title }}</td>
                        <td>{{ \Carbon\Carbon::parse($event->event_date)->format('d-m-Y h:i A') }}</td>

                <!-- <td>{{ $event->event_date }}</td> -->
                <td>{{ $event->max_capacity }}</td>
                <td>{{ $event->bookings->count() }}</td>
                <td><a href="/admin/events/{{ $event->id }}/bookings" class="button button-small">View Bookings</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
