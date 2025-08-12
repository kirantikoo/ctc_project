@extends('layouts.app')

@section('container')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h3><i class="fa-solid fa-user-pen me-2"></i>Edit Member</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('members.update', $member->id) }}">
                        @csrf
                        @method('PUT')

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="mb-3">
                            <label for="first_name" class="form-label">First Name</label>
                            <input 
                                type="text" 
                                class="form-control" 
                                id="first_name" 
                                name="first_name" 
                                value="{{ old('first_name', $member->first_name) }}" 
                                required
                            >
                        </div>
                        <div class="mb-3">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input 
                                type="text" 
                                class="form-control" 
                                id="last_name" 
                                name="last_name" 
                                value="{{ old('last_name', $member->last_name) }}" 
                                required
                            >
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input 
                                type="email" 
                                class="form-control" 
                                id="email" 
                                name="email" 
                                value="{{ old('email', $member->email) }}" 
                                required
                            >
                        </div>
                        <div class="mb-3">
                            <label for="age" class="form-label">Age</label>
                            <input 
                                type="number" 
                                class="form-control" 
                                id="age" 
                                name="age" 
                                value="{{ old('age', $member->age) }}" 
                                required 
                                min="1" 
                                max="120"
                            >
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input 
                                type="text" 
                                class="form-control" 
                                id="phone" 
                                name="phone" 
                                value="{{ old('phone', $member->phone) }}" 
                                required
                            >
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input 
                                type="text" 
                                class="form-control" 
                                id="address" 
                                name="address" 
                                value="{{ old('address', $member->address) }}" 
                                required
                            >
                        </div>
                        <button type="submit" class="btn btn-success">
                            <i class="fa-solid fa-floppy-disk me-1"></i> Update
                        </button>
                        <a href="{{ route('home') }}" class="btn btn-secondary ms-2">
                            <i class="fa-solid fa-xmark me-1"></i> Cancel
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
