<link rel="stylesheet" href="/css/style.css">

<div class="admin-container">
    <div class="admin-header">
        <h1>Bookings for {{ $event->title }}</h1>
        <a href="/admin/events" class="button back-button">Back to Events</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="admin-table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Comments</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach($event->bookings as $booking)
        <tr>
            <td>{{ $booking->name }}</td>
            <td>{{ $booking->email }}</td>
            <td>{{ $booking->phone ?? '-' }}</td>
            <td>{{ $booking->comments ?? '-' }}</td>
            <td>
                <form method="POST" action="/admin/bookings/{{ $booking->id }}" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="button button-small">Cancel</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>
