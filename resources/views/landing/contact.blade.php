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
                        <h1 data-aos="fade-up" data-aos-delay="">Get in touch</h1>
                        <p class="mb-5" data-aos="fade-up" data-aos-delay="100">Lorem ipsum dolor sit amet, consectetur
                            adipisicing elit.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<section class="section">
    <div class="container">
        <div class="row mb-5 align-items-end">
            <div class="col-md-6" data-aos="fade-up">

                <h2>Contact Us</h2>
                <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam necessitatibus
                    incidunt ut
                    officiis explicabo inventore.</p>
            </div>

        </div>

        <div class="row">
            <div class="col-md-4 ms-auto order-2" data-aos="fade-up">
                <ul class="list-unstyled">
                    <li class="mb-3">
                        <strong class="d-block mb-1">Address</strong>
                        <span>203 Fake St. Mountain View, San Francisco, California, USA</span>
                    </li>
                    <li class="mb-3">
                        <strong class="d-block mb-1">Phone</strong>
                        <span>+1 232 3235 324</span>
                    </li>
                    <li class="mb-3">
                        <strong class="d-block mb-1">Email</strong>
                        <span>youremail@domain.com</span>
                    </li>
                </ul>
            </div>

            <div class="col-md-6 mb-5 mb-md-0 map" data-aos="fade-up">

                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621"
                    frameborder="0" allowfullscreen></iframe>

            </div>

        </div>
    </div>
</section>


<!-- ======= CTA Section ======= -->
<section class="section cta-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 me-auto text-center text-md-start mb-5 mb-md-0">
                <h2>Lorem ipsum dolor sit amet</h2>
            </div>
            <div class="col-md-5 text-center text-md-end">
                <p><a href="#" class="btn d-inline-flex align-items-center"><span>Login</span></a> <a href="#"
                        class="btn d-inline-flex align-items-center"><span>Register</span></a>
                </p>
            </div>
        </div>
    </div>
</section><!-- End CTA Section -->
@endsection
