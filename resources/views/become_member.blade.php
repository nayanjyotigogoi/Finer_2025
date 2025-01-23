@extends('layouts.layout')

@push('styles')
<link href="{{ asset('css/become_member.css') }}" rel="stylesheet">
@endpush

@section('content')
   

<div class="member-hero">
    <h1>Become A Member</h1>
    <img src="assests/about-us-bg.jpg" alt="Background Image">
</div> 

<main class="member-container">
    <div class="member-become-member-wrapper">
        <div class="member-header-actions">
            <h2 class="member-header1">Criteria for becoming a member</h2>
            <div>
            <a href="path-to-your-application-form.pdf" class="member-become-member-btn1" download>
                <i class="fa fa-download"></i> Download Application Form
            </a>

                <a href="#contact" class="member-become-member-btn" style="margin-left: 1rem;">Enquire Now</a>
            </div>
        </div>

        <table>
            <thead class="member-header2">
                <tr>
                    <th>Segment</th>
                    <th class="member-criteria-header">
                        Criteria
                        <span class="member-criteria-subtext">(Investment in Plant & Machinery)</span>
                    </th>
                    <th>Admission Fee</th>
                    <th>Annual Subscription</th>
                </tr>
            </thead>
            <tbody class="member-paragraph-info-box">
                <tr>
                    <td class="member-segment">Micro</td>
                    <td class="member-criteria">Investment which does not exceed RS. 25 lakh</td>
                    <td class="member-fee">3,000</td>
                    <td class="member-fee">5,000</td>
                </tr>
                <tr>
                    <td class="member-segment">Small</td>
                    <td class="member-criteria">Investment more than Rs. 25 Lakh<br>But does not exceed Rs. 5 crores.</td>
                    <td class="member-fee">4,000</td>
                    <td class="member-fee">11,000</td>
                </tr>
                <tr>
                    <td class="member-segment">Medium</td>
                    <td class="member-criteria">Investment more than Rs. 5 crores<br>But does not exceed Rs. 10 crores.</td>
                    <td class="member-fee">6,000</td>
                    <td class="member-fee">17,000</td>
                </tr>
                <tr>
                    <td class="member-segment">Large</td>
                    <td class="member-criteria">10 crores to 100 crores Investment</td>
                    <td class="member-fee">15,000</td>
                    <td class="member-fee">45,000</td>
                </tr>
                <tr>
                    <td class="member-segment">Mega</td>
                    <td class="member-criteria">100 crores +</td>
                    <td class="member-fee">20,000</td>
                    <td class="member-fee">75,000</td>
                </tr>
                <tr>
                    <td class="member-segment">Chambers of Commerce/<br>Association of Industry</td>
                    <td class="member-criteria">Not Applicable</td>
                    <td class="member-fee">6,000</td>
                    <td class="member-fee">11000</td>
                </tr>
                <tr>
                    <td class="member-segment">Commerce and Service</td>
                    <td class="member-criteria">Contact FINER Secretariat</td>
                    <td class="member-fee">10,000</td>
                    <td class="member-fee">12,000</td>
                </tr>
            </tbody>
        </table>

        <div class="member-info-sections">
            <div class="member-info-box">
                <h3>The documents mentioned below have to be submitted along with the Application Form:</h3>
                <ol>
                    <div class="member-header3-info-box">
                        <li>1. Trade License</li>
                        <li>2. Registration Certificate (Company)</li>
                        <li>3. Audited Balance sheet</li>
                        <li>4. PAN Card (If Any)</li>
                        <li>5. Partnership/Deed (If Any)</li>
                        <li>6. Memorandum of Article (If Any)</li>
                        <li>7. GST Registration Certificate</li>
                    </div>
                </ol>
            </div>
            <div class="member-info-box">
                <h3>Our Bank Account Details :</h3>
                <p class="member-paragraph-info-box">A/C Name: FINER</p>
                <p class="member-paragraph-info-box">Bank Name: Industrial Bank Ltd.</p>
                <p class="member-paragraph-info-box">A/C No: 1000256903695</p>
                <p class="member-paragraph-info-box">IFSC: IND80000038</p>
                <p class="member-paragraph-info-box">Bank Branch: Guwahati</p>
                <p class="member-paragraph-info-box">FINER GST No: 18AAAF0458M1Z0</p>
                <p class="member-paragraph-info-box">Email id: info@finer.in</p>
            </div>
        </div>

        <div class="member-contact-section" id="contact">
    <h2 class="member-member-header">// Contact Us</h2>
    <h3 class="member-title">Enquire</h3>
    <form class="member-contact-form" id="contactForm">
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