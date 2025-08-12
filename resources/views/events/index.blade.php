@extends('layouts.app')

@section('container')

<div id="eventPage" class="page-content">
    <div class="container py-4">

        {{-- Event Heading & Add Event Button --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="text-primary">
                <i class="fa-solid fa-calendar-days me-2"></i>Upcoming Events
            </h2>
            @if(Auth::check() && Auth::user()->is_admin)
                <a href="{{ route('events.create') }}" class="btn btn-primary">
                    <i class="fa-solid fa-plus me-1"></i>Add Event
                </a>
            @endif
        </div>

        {{-- Filters & Sorting --}}
        <div class="row mb-4">
            <div class="col-md-4">
                <label for="eventDateFilter" class="form-label">Filter by Date</label>
                <input type="date" class="form-control" id="eventDateFilter" onchange="filterEvents()">
            </div>
            <div class="col-md-4">
                <label for="eventLocationFilter" class="form-label">Filter by Location</label>
                <input type="text" class="form-control" id="eventLocationFilter" placeholder="Enter location..." onkeyup="filterEvents()">
            </div>
            <div class="col-md-4">
                <label for="eventSort" class="form-label">Sort by Date</label>
                <select class="form-select" id="eventSort" onchange="sortEvents()">
                    <option value="asc">Ascending</option>
                    <option value="desc">Descending</option>                       
                </select>
            </div>
        </div>

        {{-- Event container --}}
        <div class="row" id="eventsContainer">
            @forelse($events as $event)
                <div class="col-md-6 col-lg-4 mb-4" data-event-date="{{ \Carbon\Carbon::parse($event->date)->format('Y-m-d') }}" data-event-location="{{ strtolower($event->location) }}">
                    <div class="card event-card h-100 shadow-sm">
                        {{-- Event Image --}}
                        <img src="{{ $event->image ?? 'https://picsum.photos/600/400?random=' . $event->id }}" 
                             class="card-img-top" 
                             alt="Event Image"
                             onerror="this.style.display='none'; this.nextElementSibling.classList.remove('d-none');">
                        {{-- Image Placeholder --}}
                        <div class="event-placeholder d-none text-center p-5">
                            <i class="fa-solid fa-image fa-3x text-muted mb-2"></i>
                            <p class="text-muted mb-0">Event Image Goes Here</p>
                        </div>
                        {{-- Event Body --}}
                        <div class="card-body">
                            <h5 class="card-title">{{ $event->name }}</h5>
                            <p class="card-text"><strong>Date:</strong> {{ \Carbon\Carbon::parse($event->date)->format('d-m-Y') }}</p>
                            <p class="card-text"><strong>Time:</strong> {{ \Carbon\Carbon::parse($event->time)->format('h:i A') }}</p>
                            <p class="card-text"><strong>Location:</strong> {{ $event->location }}</p>
                            <p class="card-text">{{ $event->description }}</p>
                            {{-- Delete Button --}}
                            @if(Auth::check() && Auth::user()->is_admin)
                                <form action="{{ route('events.destroy', $event) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('events.destroyConfirm', $event) }}" class="btn btn-sm btn-danger">
                                        <i class="fa-solid fa-trash"></i> Delete
                                    </a>
                                    {{-- <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this event?')">
                                        <i class="fa-solid fa-trash"></i> Delete
                                    </button> --}}
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <p>No events available at the moment.</p>
            @endforelse
        </div>
    </div>
</div>

{{-- JavaScript Functions --}}
<script>
    function filterEvents() {
        const dateFilter = document.getElementById('eventDateFilter').value;
        const locationFilter = document.getElementById('eventLocationFilter').value.toLowerCase();
        const cards = document.querySelectorAll('#eventsContainer .col-md-6');

        cards.forEach(card => {
            const eventDate = card.getAttribute('data-event-date');
            const eventLocation = card.getAttribute('data-event-location');

            const matchDate = !dateFilter || eventDate === dateFilter;
            const matchLocation = !locationFilter || eventLocation.includes(locationFilter);

            card.style.display = (matchDate && matchLocation) ? 'block' : 'none';
        });
    }

    function sortEvents() {
        const sortOrder = document.getElementById('eventSort').value;
        const container = document.getElementById('eventsContainer');
        const cards = Array.from(container.children);

        cards.sort((a, b) => {
            const dateA = new Date(a.getAttribute('data-event-date'));
            const dateB = new Date(b.getAttribute('data-event-date'));

            return sortOrder === 'asc' ? dateA - dateB : dateB - dateA;
        });

        cards.forEach(card => container.appendChild(card));
    }
</script>

@endsection
