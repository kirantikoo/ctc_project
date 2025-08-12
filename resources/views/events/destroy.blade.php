@extends('layouts.app')

@section('container')
<div class="container text-center py-5">
    <h2 class="text-danger mb-4">Are you sure you want to delete this event?</h2>

    @if(isset($event))
        <p>Are you sure you want to delete event: <strong>{{ $event->first_name }} {{ $event->last_name }}</strong>?</p>
    @else
        <p><strong>event details not found.</strong></p>
    @endif

    <form method="POST" action="{{ isset($event) ? route('events.destroy', $event) : '#' }}">
        @csrf
        @method('DELETE')

        <button type="submit" class="btn btn-danger" {{ !isset($event) ? 'disabled' : '' }}>
            Yes, Delete
        </button>
        <a href="{{ route('events.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
