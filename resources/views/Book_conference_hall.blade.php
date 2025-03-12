@extends('layouts.layout')

@push('styles')
<link href="{{ asset('css/Book_conference_hall.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="Conference-hero">
        <h1>Book Conference Hall</h1>
        <img src="assests/about-us-bg.jpg" alt="Background Image">
    </div> 

    <main class="Conference-container">
        <div class="Conferencecontainer">
            <div class="Conferencebuttons">
                <button class="Conferencebtn Conferencebtn-primary" onclick="downloadDetails()">Download Details</button>
                <button class="Conferencebtn Conferencebtn-orange">Book Now</button>
            </div>

            <div class="Conferencecategories">
                <h2 class="Conferencecategories-header2">Categories :</h2>
                <ul>
                    <li>FINER Members</li>
                    <li>Non-Members</li>
                </ul>
            </div>

            <h2 class="Conferencecategories-header2">FINER Conference Hall Rate :</h2>
            <table>
                <tr>
                    <th>Facility</th>
                    <th>FINER Members (INR)</th>
                    <th>Non-Members (INR)</th>
                </tr>
                <tr>
                    <td>Full-Day Rental (8 hours)</td>
                    <td>5,000</td>
                    <td>8,000</td>
                </tr>
                <tr>
                    <td>Half-Day Rental (4 hours)</td>
                    <td>3,000</td>
                    <td>5,000</td>
                </tr>
                <tr>
                    <td>Hourly Rental</td>
                    <td>1,000</td>
                    <td>2,000</td>
                </tr>
            </table>

            <h2 class="Conferencecategories-header2">Additional Charges :</h2>
            <table>
                <tr>
                    <th>Services</th>
                    <th>Rate (INR)</th>
                </tr>
                <tr>
                    <td>Projector and Screen Usage</td>
                    <td>1,500 per session</td>
                </tr>
                <tr>
                    <td>Audio System and Microphones</td>
                    <td>2,000 per session</td>
                </tr>
                <tr>
                    <td>Tea/Coffee and Snacks</td>
                    <td>150 per person</td>
                </tr>
                <tr>
                    <td>Lunch (Vegetarian)</td>
                    <td>400 per person</td>
                </tr>
                <tr>
                    <td>Lunch (Non-Vegetarian)</td>
                    <td>500 per person</td>
                </tr>
                <tr>
                    <td>Additional Cleaning Services</td>
                    <td>500 per person</td>
                </tr>
            </table>

            <div class="Conferenceterms-payment">
                <div class="Conferenceterms">
                    <h3 class="Conferenceterms-header3">Terms and Conditions</h3>
                    <ol>
                        <div class="Conferenceterms-li">
                            <li>1. Bookings are subject to availability and must be confirmed at least 7 days in advance.</li>
                            <li>2. 18% GST extra on the total bill amount.</li>
                            <li>3. A non-refundable booking deposit of 50% is required to secure the reservation.</li>
                            <li>4. Cancellations must be communicated at least 48 hours prior to the booking date.</li>
                            <li>5. Any damage to the property or equipment will be charged to the renter.</li>
                            <li>6. FINER members must present their membership ID for availing the discounted rates.</li>
                            <li>7. All payments must be settled prior to the event.</li>
                        </div>

                    </ol>
                </div>

                <div class="Conferencepayment">
                    <h3 class="Conferenceterms-header3">Payment Details</h3>
                    <ul>
                        <li>Account Name: FINER</li>
                        <li>Bank Name: Industrial Bank Ltd</li>
                        <li>Account Number: 10002503895</li>
                        <li>IFSC Code: INDB0000038</li>
                    </ul>
                </div>
            </div>

            <div class="Conferencecontact">
                <p>For booking or special requirements, please contact us at 9954807357 / 9435555590</p>
                <p>or email us at info@finer.in</p>
            </div>
        </div>
    </main>
@endsection

@push('scripts')
<script src="{{ asset('js/Book_conference_hall.js') }}"></script>
@endpush
