@extends('layouts.landing')
@section('content')
<section class="hero-section inner-page">
    <div class="wave">

        <svg width="1920px" height="265px" viewBox="0 0 1920 265" version="1.1" xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink">
            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <g id="Apple-TV" transform="translate(0.000000, -402.000000)" fill="#FFFFFF">
                    <path
                        d="M0,439.134243 C175.04074,464.89273 327.944386,477.771974 458.710937,477.771974 C654.860765,477.771974 870.645295,442.632362 1205.9828,410.192501 C1429.54114,388.565926 1667.54687,411.092417 1920,477.771974 L1920,667 L1017.15166,667 L0,667 L0,439.134243 Z"
                        id="Path"></path>
                </g>
            </g>
        </svg>

    </div>

    <div class="container">
        <div class="row align-items-center">
            <div class="col-12">
                <div class="row justify-content-center">
                    <div class="col-md-7 text-center hero-text">
                        <h1 data-aos="fade-up" data-aos-delay="">About UAPGA</h1>
                        {{-- <p class="mb-5" data-aos="fade-up" data-aos-delay="100">Lorem ipsum dolor sit amet,
                            consectetur
                            adipisicing elit.</p> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<section class="section mb-0 p-0 mt-4">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-4 me-auto">
                <h2 class="mb-4">Vision</h2>
                <p class="mb-4">The United Architects of the Philippines Graduate Auxiliary's prime purpose is
                    to promote the significance of the role of an Architecture Graduate in nation building and public
                    service. </p>
            </div>
            <div class="col-md-6" data-aos="fade-left">
                <img src="{{ asset('landing/img/undraw_svg_2.svg') }}" alt="Image" class="img-fluid mb-5">
            </div>
            <div class="col-md-6 me-auto" data-aos="fade-left">
                <img src="{{ asset('landing/img/undraw_svg_2.svg') }}" alt="Image" class="img-fluid mb-5">
            </div>
            <div class="col-md-4  mt-5">
                <h2 class="mb-4">Mission</h2>
                <p class="mb-4">To <b>ESTABLISH AND PROMOTE</b> the highest standards, in preparation for professional
                    excellence and ethical conduct for the practice and service of architecture; through strict
                    adherence to the Architects National Cod; Code of Ethical Conduct (UAP Doc. 200); and Standards of
                    Professiona Practice (SPP Docs. 201-209); </p>
                <p class="mb-4">To <b> ENCOURAGE ARCHITECTURE GRADUATES'</b> interests to pursue in the preparation to
                    the
                    practice of architecture and assimilate them with desirable motivations an values by supporting all
                    the UAPGA activities as deemed necessary; </p>
                <p class="mb-4">To render appropriate ASSISTANCE to any member partiularly through diversified
                    experience, filing of licensure exam application, architecture reviews and other concerns related to
                    the practice pf architectural profession; </p>
                <p class="mb-4">To PARTICIPATE in matters concerning national and regional development of te country;
                    and </p>
                <p class="mb-4">To <b>COOPERATE AND COORDINATE</b> with international linkages in the field of
                    architectyre,
                    environmental design and other fields of arts, science and technology. </p>
            </div>

        </div>
    </div>
</section>
<section class="section mb-0 p-0">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-12 me-auto">
                <h2 class="mb-4">What do we do? </h2>
                <p class="mb-4">Through programs and events that will broaden their knowledge in variety of interest
                    areas, UAPGA is committed to helping architecture gradates enance their careers as they make
                    transition from being apprentice architects to full-fledged architects. A few of the events that
                    make up the aim include forums, design competitions, and seminars and career orientation. </p>
            </div>

        </div>
    </div>
</section>
<section class="section mt-0">
    <div class="container text-center">
        <h2>
            Organizational Chart
        </h2>
        <div class="row mt-5">
            <div class="col-md-12">
                <img src="{{ asset('landing/img/NBD_ORGANIZATIONALCHART.png') }}" alt="Image" class="img-fluid mb-5">
            </div>
        </div>
    </div>
</section>
@include('landing.cta')
@endsection