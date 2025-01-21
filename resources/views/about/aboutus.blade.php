@extends('layouts.layout')
@push('styles')
<link href="{{ asset('css/aboutus.css') }}" rel="stylesheet">
@endpush
@section('content')

<div class="member-hero">
    <h1>About Us</h1>
    <img src="assests/about-us-bg.jpg" alt="Background Image">
</div> 

<div class="main-section">


    <h1 class="main-heading">
        Empowering Northeast industries through innovation, <br> advocacy, collaboration, and sustainable growth for <br> regional economic development.
    </h1>

    <div class="content-wrapper">
        <div class="text-content">
            <p>FINER is the leading and oldest apex business association in North East. Established in 1992 and head quartered in Guwahati, FINER has a membership strength of over 400 members cutting across different sectors and ranging from large and mega categories to small and medium. FINER is a non-government, not-for-profit, industry-led and industry-managed organization. Being the voice of industry FINER has been playing a very proactive and stellar role in influencing policy issues to strategizing on growth perspectives with all the State Governments of the North East , Central Government Ministries & Government Agencies .</p>
          
            <p>FINER has a holistic and deep understanding of the business and industry ecosystem of the region and is the single point of reference for Governments Investors, Civil societies, Academia, Media and any trade delegation to provide information on NER.</p>
            
            <p>FINER is an ideal platform for networking & consensus building, knowledge dissemination & knowledge enhancement and capacity building.</p>
            
            <p>FINER also lends itself beyond industry commitment in supporting and strengthening communities and the marginalized section of the society. Works in partnership with civil society, governments and other stake holders towards integrated and inclusive development. During any crisis or calamity it always rises up to support as and when necessary.</p>
            
            <p>
            FINER works across diverse sectors on policy advocacy, business and investment opportunities for industries and interfaces with business and thought leaders, thinks tanks to create an efficient ecosystem. It is committed to building a strong and efficient entrepreneurial ecosystem to leverage the power of youth in the eight states of North East and build competiveness of the MSME sector .
            </p>
        
        </div>

        <div class="image-container">
            <!-- <div class="experience-badge">5+ Industry<br>Experience</div> -->
            <img src="assests/Frame_32.jpg" alt="Business meeting">
       
        </div>
    </div>

    <div class="section">
        <h2 class="section-title">
           💡Our Vision</h2>
        <p>To capitalize on the natural assets, natural resources, and human resources of the Region through multi-dimensional initiatives of skill and entrepreneurship development, building new and strengthening existing ecosystems, and channeling new investments in the Region.</p>
    </div>

    <div class="mission-canvas-wrapper">
        <div class="mission-section">
            <h2 class="mission-title">🎯 Our Mission</h2>
            <ul class="mission-list">
      
    <li>
        Catalyze local value addition and establish market linkages through involvement and participation of industry and businesses in and outside the Region and at international fora.
    </li>
    <li>
        To provide inputs and serve as a reference point to the Central and North Eastern State Governments through policy advocacy and policy formulation.
    </li>
    <li>
        Develop a three-pronged intervention for promoting “Entrepreneurship,” generating “Employment,” and creating “Empowerment” in the region through focused interventions and development initiatives.
    </li>
    <li>
        Catalyze linkages and partnerships with neighboring countries to take advantage of the ACT East Policy in consultation with the Central and State Governments.
    </li>
    <li>
        Build competitiveness for MSMEs by driving excellence, efficiency, productivity, and sustainability and infusing & facilitating technology in the Region.
    </li>
    <li>
        Catalyze societal initiatives through Corporate Social Responsibility.
    </li>
    <li>
        To build a collaborative platform for networking and consensus-building with all stakeholders: Industry, Government, Civil Society, and Media.
    </li>
    <li>
        To capture the global best practices evolving in the manufacturing, agriculture, and services sectors and disseminate them through appropriate platforms.
    </li>
    <li>
        Launch focused initiatives to facilitate and promote infrastructure development in NER.
    </li>

            </ul>

        </div>

        <div class="sectors-container">
            <canvas id="sectorsCanvas"></canvas>
        </div>
    </div>

    <div class="committee-section">
        <h2 class="committee-title">FINER functions through 3 levels of committees and a secretariat</h2>
        
        <div class="committee-grid">
            <div class="committee-item">1. Management committee</div>
            <div class="committee-item">2. Board of Directors</div>
            <div class="committee-item">3. Sectoral committee</div>
        </div>

        <table class="committee-table">
            <tr>
                <td>GST & Taxation Committee</td>
                <td>Industry & MSME Committee</td>
                <td>Banking & all Statutory Matters Committee</td>
            </tr>
            <tr>
                <td>Information Technology Committee</td>
                <td>Mines, Minerals & Power Committee</td>
                <td>Energy Committee</td>
            </tr>
        </table>
    </div>
    </div>
@endsection
@push('scripts')
<script src="{{ asset('js/aboutus.js') }}"></script>
@endpush
