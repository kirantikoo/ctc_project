@extends('layouts.app')

@section('container')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <!-- Create New Event Text with Normal Case -->
                        <h3 class="mb-0">
                            <i class="fa-solid fa-calendar-plus me-2"></i>
                            <span id="eventFormTitle">Create New Event</span>
                        </h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('events.store') }}" enctype="multipart/form-data">
                            @csrf
                            <!-- Event Title -->
                            <div class="mb-3">
                                <label for="title" class="form-label">Event Title*</label>
                                <input type="text" name="title" class="form-control" required>
                            </div>
                            
                            <!-- Date & Time -->
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="date" class="form-label">Date*</label>
                                    <input type="date" name="date" id="date" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="time" class="form-label">Time*</label>
                                    <input type="time" name="time" id="time" class="form-control" required>
                                </div>
                            </div>
                            
                            <!-- Location -->
                            <div class="mb-3">
                                <label for="location" class="form-label">Location*</label>
                                <input type="text" name="location" id="location" class="form-control" required>
                            </div>
                            
                            <!-- Category -->
                            <div class="mb-3">
                                <label for="category" class="form-label">Category*</label>
                                <select name="category" id="category" class="form-select" required>
                                    <option value="">Select Category</option>
                                    <option value="workshop">Workshop</option>
                                    <option value="seminar">Seminar</option>
                                    <option value="social">Social</option>
                                    <option value="training">Training</option>
                                    <option value="conference">Conference</option>
                                </select>
                            </div>
                            
                            <!-- Description -->
                            <div class="mb-3">
                                <label for="description" class="form-label">Description*</label>
                                <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
                            </div>
                            
                            <!-- Event Image -->
                            <div class="mb-3">
                                <label for="image" class="form-label">Event Image</label>
                                <input type="file" name="image" id="image" class="form-control" accept="image/*">
                            </div>
                            
                            <!-- Buttons -->
                            <button type="submit" class="btn btn-primary">
                                <i class="fa-solid fa-floppy-disk me-1"></i>Create Event
                            </button>
                            <a href="{{ route('events.index') }}" class="btn btn-secondary">
                                <i class="fa-solid fa-xmark me-1"></i>Cancel
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
