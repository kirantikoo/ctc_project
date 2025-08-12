@extends('layouts.app')

@section('container')
<div class="container text-center py-5">
    <h2 class="text-danger mb-4">Are you sure you want to delete this member?</h2>

    @if(isset($member))
        <p>Are you sure you want to delete member: <strong>{{ $member->first_name }} {{ $member->last_name }}</strong>?</p>
    @else
        <p><strong>Member details not found.</strong></p>
    @endif

    <form method="POST" action="{{ isset($member) ? route('members.destroy', $member) : '#' }}">
        @csrf
        @method('DELETE')

        <button type="submit" class="btn btn-danger" {{ !isset($member) ? 'disabled' : '' }}>
            Yes, Delete
        </button>
        <a href="{{ route('members.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
