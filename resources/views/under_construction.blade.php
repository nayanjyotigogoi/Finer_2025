@extends('layouts.layout')

@push('styles')
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    }

    body {
        min-height: 100vh;
        background-color: #fff;
    }

    .container {
        position: relative;
        z-index: 2;
        max-width: 1200px;
        margin: 0 auto;
        padding: 40px 20px;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
    }

    .text-content h1 {
        font-size: 2.5rem;
        color: #2d4356;
        margin-bottom: 20px;
    }

    .text-content p {
        color: #666;
        margin-bottom: 30px;
        font-size: 1.1rem;
    }

    .subscribe-form {
        display: flex;
        gap: 10px;
        max-width: 400px;
        margin: 0 auto;
    }

    .subscribe-form input {
        flex: 1;
        padding: 12px 20px;
        border: 1px solid #ddd;
        border-radius: 6px;
        font-size: 1rem;
    }

    .subscribe-form button {
        padding: 12px 24px;
        background-color: #1a73e8;
        color: white;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        font-size: 1rem;
        transition: background-color 0.3s;
    }

    .subscribe-form button:hover {
        background-color: #1557b0;
    }

    .countdown {
        margin-top: 60px;
    }

    .countdown h2 {
        color: #666;
        font-size: 1.5rem;
        margin-bottom: 20px;
        text-align: center;
    }

    .countdown-timer {
        display: flex;
        justify-content: center;
        gap: 20px;
    }

    .countdown-item {
        text-align: center;
    }

    .countdown-number {
        font-size: 2.5rem;
        color: #2d4356;
        font-weight: bold;
    }

    .countdown-label {
        color: #666;
        font-size: 0.9rem;
        text-transform: uppercase;
    }

    .separator {
        font-size: 2.5rem;
        color: #2d4356;
        margin-top: -10px;
    }

    @media (max-width: 768px) {
        .countdown-timer {
            flex-wrap: wrap;
        }

        .subscribe-form {
            flex-direction: column;
        }
    }
</style>
@endpush

@section('content')
<div class="container">
    <div class="text-content">
        <h1>Under construction</h1>
        <p>This page is under construction, but we are ready<br>to go!</p>
        <form class="subscribe-form">
            <input type="email" placeholder="Your email" required>
            <button type="submit">Subscribe</button>
        </form>
    </div>

    <div class="countdown">
        <h2>WE ARE LIVE IN</h2>
        <div class="countdown-timer">
            <div class="countdown-item">
                <div class="countdown-number" id="days">00</div>
                <div class="countdown-label">Days</div>
            </div>
            <div class="separator">:</div>
            <div class="countdown-item">
                <div class="countdown-number" id="hours">00</div>
                <div class="countdown-label">Hours</div>
            </div>
            <div class="separator">:</div>
            <div class="countdown-item">
                <div class="countdown-number" id="minutes">00</div>
                <div class="countdown-label">Minutes</div>
            </div>
            <div class="separator">:</div>
            <div class="countdown-item">
                <div class="countdown-number" id="seconds">00</div>
                <div class="countdown-label">Seconds</div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Set the target date 30 days from now
    const countDownDate = new Date().getTime() + 30 * 24 * 60 * 60 * 1000;

    // Update the countdown every second
    const countdown = setInterval(function () {
        const now = new Date().getTime();
        const distance = countDownDate - now;

        // Time calculations for days, hours, minutes, and seconds
        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Update the timer display
        document.getElementById("days").textContent = String(days).padStart(2, '0');
        document.getElementById("hours").textContent = String(hours).padStart(2, '0');
        document.getElementById("minutes").textContent = String(minutes).padStart(2, '0');
        document.getElementById("seconds").textContent = String(seconds).padStart(2, '0');

        // If the countdown is over, display "EXPIRED"
        if (distance < 0) {
            clearInterval(countdown);
            document.querySelector(".countdown-timer").innerHTML = "EXPIRED";
        }
    }, 1000);

    // Form submission handling
    document.querySelector('.subscribe-form').addEventListener('submit', function (e) {
        e.preventDefault();
        const email = this.querySelector('input[type="email"]').value;
        alert(`Thank you for subscribing with: ${email}`);
        this.reset();
    });
</script>
@endpush
