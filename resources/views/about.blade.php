@extends('layouts.app')

@section('container')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <h1 class="text-primary text-center mb-5">
                <i class="fa-solid fa-info-circle me-2"></i>About Our Organisation
            </h1>
            <div class="row mb-5">
                <div class="col-md-6">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body">
                            <h4 class="text-primary">
                                <i class="fa-solid fa-bullseye me-2"></i>Our Mission
                                </h4>
                                <p class="text-muted px-2">We are dedicated to fostering innovation and excellence in our community. Our mission is to provide exceptional services and create meaningful connections that drive positive change and growth.
                                </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body">
                            <h4 class="text-primary">
                                <i class="fa-solid fa-clock-rotate-left me-2"></i>Our History
                            </h4>
                            <p class="text-muted px-2">Founded with a vision to empower individuals through education, our college has consistently delivered high-quality training and development programs for over a decade.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h4 class="text-primary text-center mb-4">
                        <i class="fa-solid fa-envelope-open me-2"></i>Contact Information
                    </h4>
                    <div class="row">
                        <div class="col-md-4 text-center mb-3">
                            <i class="fa-solid fa-square-envelope fa-2x text-primary mb-2"></i>
                            <p class="mb-0"><strong>Email</strong></p>
                            <a href="mailto:info@careertrainingcollege.com" class="text-decoration-none">info@careertrainingcollege.com</a>
                        </div>
                        <div class="col-md-4 text-center mb-3">
                            <i class="fa-solid fa-phone fa-2x text-primary mb-2"></i>
                            <p class="mb-0"><strong>Phone</strong></p>
                            <a href="tel:+1234567890" class="text-decoration-none">+61 (234) 567-890</a>
                        </div>
                        <div class="col-md-4 text-center mb-3">
                            <i class="fa-solid fa-map-location-dot fa-2x text-primary mb-2"></i>
                            <p class="mb-0"><strong>Address</strong></p>
                            <p class="mb-0">251-255 Stirling St,<br> Perth, WA 6000
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-4">
                <h4 class="text-primary text-center mb-4">
                    <i class="fa-solid fa-map-location-dot me-2"></i>Our Location
                </h4>
                <div class="ratio ratio-16x9">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3641.2933559137614!2d115.86492910981177!3d-31.94436264377771!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2a32bb0c7d68b0c1%3A0x54ecf2f7e3f3263b!2s251-255%20Stirling%20St%2C%20Perth%20WA%206000%2C%20Australia!5e0!3m2!1sen!2sau!4v1691330716495!5m2!1sen!2sau" 
                        style="border:0;" 
                        allowfullscreen 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection