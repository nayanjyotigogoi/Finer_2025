@extends('layouts.layout')

@push('styles')
<link href="{{ asset('css/become_member.css') }}" rel="stylesheet">
@endpush

@section('content')
   

<div class="member-hero">
    <h1>Contact Us</h1>
    <img src="assests/about-us-bg.jpg" alt="Background Image">
</div> 

<main class="member-container">

        <div class="member-contact-section">
            <h2 class="member-member-header-page">// Contact Us</h2>
            
            <ol>
                <div class="member-info-box">
                    <div class="member-header3-info-box">
                        <li> Supreme Tower, </li>
                        <li> Lobby- A 2nd Floor, Walford,</li>
                        <li>GS Road, Guwahati, </li>
                        <li>Assam-781005.</li>
                        <li>Phone: +91-94355 55590</li>
                    </div>
                </div>
            </ol>
        </div>

        <div class="member-contact-section" id="contact">
            <!-- <h2 class="member-member-header">// Contact Us</h2> -->
            <!-- <h3 class="member-title">Enquire</h3> -->
            <form class="member-contact-form" id="contactForm" action="{{ route('contact.send') }}" method="POST">
            @csrf
                <div>
                    <label for="firstName">First Name</label>
                    <input type="text" id="firstName" name="firstName" placeholder="Enter your first name" required>
                </div>
                <div>
                    <label for="lastName">Last Name</label>
                    <input type="text" id="lastName" name="lastName" placeholder="Enter your last name" required>
                </div>
                <div>
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email address" required>
                </div>
                <div>
                    <label for="mobileNumber">Mobile Number</label>
                    <input type="tel" id="mobileNumber" name="mobileNumber" placeholder="Enter your mobile number" pattern="[0-9]{10}" required>
                </div>
                <div class="form-full-width">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" placeholder="Enter your message" rows="5" required></textarea>
                </div>
                <div class="member-form-full-width">
                    <button type="submit" class="member-submit-btn">Submit</button>
                </div>
            </form>
        </div>

    </div>
</main>
@endsection

@push('scripts')
<script src="{{ asset('js/become_member.js') }}"></script>
@endpush