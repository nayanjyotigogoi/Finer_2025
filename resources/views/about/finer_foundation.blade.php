@extends('layouts.layout')
@push('styles')
<link href="{{ asset('css/finer_foundation.css') }}" rel="stylesheet">
@endpush
@section('content')
    <div class="header">
        <h1>FINER Foundation</h1>
        <img src="assests/about-us-bg.jpg" alt="Background Image">

    </div>

    <div class="content">
        <div class="section">
            <h2 class="section-title">FINER Foundation</h2>
            <p class="text-content">
                FINER continuously assists industry to identify and execute CSR programs and also partners with civil society organizations through members to initiate, implement and execute programs on diverse domains of inclusive development.
            </p>
            <p class="text-content">
                To enable developmental & charitable activities, initiatives, and policy advocacy measures related the FINER foundation raise funds for carrying out intervention in following areas :
            </p>
            <ul class="bullet-list">
                <li>Skill development</li>
                <li>Social and community development in all its forms</li>
                <li>Encouragement and facilitation of CSR activities amongst member companies. Corporates</li>
                <li>Inclusion of the marginalized and disadvantaged sections of the population and backward regions in the mainstream economic processes</li>
                <li>Preservation of environment, heritage, traditional arts and crafts</li>
                <li>Ready response to disaster related relief and rehabilitation requirements</li>
                <li>Practice affirmative action</li>
            </ul>
        </div>

        <div class="section">
           
            <div class="row">
                <div class="key-initiatives">
                    <h3 class="section-title">Key Initiatives</h3>
                    <ul class="bullet-list">
                        <li>Entrepreneurship Development</li>
                        <li>Employment Generation</li>
                        <li>Empowerment Creation</li>
                    </ul>

                    <div class="finer-services">
                        <h2 class="section-title">FINER Services And Focus Area Of Work</h2>
                        <ul class="bullet-list">
                            <li>Policy advocacy</li>
                            <li>Knowledge dissemination</li>
                            <li>Enhancing efficiency & Competitiveness</li>
                            <li>Commitment to the society</li>
                            <li>Research</li>
                            <li>Events</li>
                            <li>Research Reports / Publications / Whitepapers</li>
                        </ul>
                    </div>

                    
                </div>

                <div class="chart-container" id="membershipChart">
                <h2 class="section-title-membership">FINER Membership</h2>
                </div>
            </div>
        </div>

        <div class="section">
            <h2 class="section-title">FINER Strategy Statement</h2>
            <p class="text-content">
                FINER strategies for North East is built on the pillars of stakeholder partnership, national and international integration, societal commitment and competitiveness & efficiency.
            </p>
            <p class="text-content">
                FINER charts change by working closely with all Governments on developing conducive environment policy issues, interfacing with thought leaders, and driving efficiency, productivity, and sustainability for the industry to become competitive and provide opportunities for business development and promotion of specialized services access to international linkages for industry a range of specialized services and strategic global linkages.
            </p>
        </div>
    </div>

@endsection
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- Corrected the CDN link -->
<script src="{{ asset('js/finer_foundation.js') }}"></script> <!-- Your local script -->
@endpush

