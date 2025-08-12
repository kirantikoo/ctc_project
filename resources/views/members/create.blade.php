@extends('layouts.app')

@section('container')

<form id="userForm" action="{{ route('members.store') }}" method="POST">
    @csrf
    <div id="createMemberPage" class="page-content">
        <div class="container py-4">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-primary text-white">
                            <h3 class="mb-0">
                                <i class="fa-solid fa-user-plus me-2"></i>
                                <span id="eventFormTitle">Create New Member</span>
                            </h3>
                        </div>
                        <div class="card-body">
                            <!-- Removed nested form tag here -->
                            <input type="hidden" id="userId">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="firstName" class="form-label">First Name *</label>
                                    <input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required>
                                    <div class="invalid-feedback">Please enter a first name.</div>
                                </div>
                                <div class="col-md-6">
                                    <label for="lastName" class="form-label">Last Name *</label>
                                    <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required>
                                    <div class="invalid-feedback">Please enter a last name.</div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email *</label>
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                    <div class="invalid-feedback">Please enter a valid email address.</div>
                                </div>
                                <div class="col-md-6">
                                    <label for="age" class="form-label">Age *</label>
                                    <input type="number" class="form-control" name="age" value="{{ old('age') }}" required>
                                    <div class="invalid-feedback">Please enter an age between 1 and 120.</div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone *</label>
                                <input type="text" class="form-control" name="phone" value="{{ old('phone') }}" pattern="[+]?[0-9\s\-\(\)]{10,}" required>
                                <div class="invalid-feedback">Please enter a valid phone number.</div>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Address *</label>
                                <textarea class="form-control" name="address" rows="3" required>{{ old('address') }}</textarea>
                                <div class="invalid-feedback">Please enter an address.</div>
                            </div>
                            <div class="mb-3">
                                <label for="professionalSummary" class="form-label">Professional Summary</label>
                                <textarea class="form-control" name="professional_summary" rows="4" placeholder="Brief description of professional background...">{{ old('professional_summary') }}</textarea>
                            </div>
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa-solid fa-floppy-disk me-1"></i>
                                    <span id="SubmitButtonText">Create Member</span>
                                </button>
                                <button type="button" class="btn btn-secondary" onclick="showPage('home')">
                                    <i class="fa-solid fa-xmark me-1"></i>Cancel
                                </button>
                            </div>
                            <!-- end form body -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection
