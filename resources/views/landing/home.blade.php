@extends('layouts.landing')
@section('content')
<!-- ======= Hero Section ======= -->
<section class="hero-section" id="hero">

    <div class="wave">

        <svg width="100%" height="355px" viewBox="0 0 1920 355" version="1.1" xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink">
            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <g id="Apple-TV" transform="translate(0.000000, -402.000000)" fill="#FFFFFF">
                    <path
                        d="M0,439.134243 C175.04074,464.89273 327.944386,477.771974 458.710937,477.771974 C654.860765,477.771974 870.645295,442.632362 1205.9828,410.192501 C1429.54114,388.565926 1667.54687,411.092417 1920,477.771974 L1920,757 L1017.15166,757 L0,757 L0,439.134243 Z"
                        id="Path"></path>
                </g>
            </g>
        </svg>

    </div>

    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 hero-text-image">
                <div class="row">
                    <div class="col-lg-8 text-center text-lg-start ">
                        <h1 data-aos="fade-right">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</h1>
                        <p class="mb-5" data-aos="fade-right" data-aos-delay="100">Lorem ipsum dolor sit amet,
                            consectetur
                            adipisicing elit.</p>
                        <p data-aos="fade-right" data-aos-delay="200" data-aos-offset="-500"><a href="#"
                                class="btn btn-outline-white">Login</a></p>
                    </div>
                    <div class="col-lg-4 iphone-wrap mt-5">
                        <img src="assets/img/logo.png" alt="Image" class="phone-1  p-3 mt-5" data-aos="fade-right">
                    </div>
                </div>
            </div>
        </div>
    </div>

</section><!-- End Hero -->
<!-- ======= Clients Section ======= -->
<section id="clients" class="clients">
    <div class="container" data-aos="zoom-out">

        <div class="clients-slider swiper">
            <div class="swiper-wrapper align-items-center">
                <div class="swiper-slide"><img src="assets/img/client-1.png" class="img-fluid" alt="">
                </div>
                <div class="swiper-slide"><img src="assets/img/client-2.png" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </div>

    </div>
</section><!-- End Clients Section -->
<section class="section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-4 me-auto">
                <h2 class="mb-4">Lorem ipsum dolor</h2>
                <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur at
                    reprehenderit optio,
                    laudantium eius quod, eum maxime molestiae porro omnis. Dolores aspernatur delectus impedit
                    incidunt
                    dolore mollitia esse natus beatae.</p>
                <p><a href="#" class="btn btn-primary">Register Now</a></p>
            </div>
            <div class="col-md-6" data-aos="fade-left">
                <img src="assets/img/undraw_svg_2.svg" alt="Image" class="img-fluid">
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-4 ms-auto order-2">
                <h2 class="mb-4">Lorem ipsum dolor</h2>
                <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur at
                    reprehenderit optio,
                    laudantium eius quod, eum maxime molestiae porro omnis. Dolores aspernatur delectus impedit
                    incidunt
                    dolore mollitia esse natus beatae.</p>
                <p><a href="#" class="btn btn-primary">Register Now</a></p>
            </div>
            <div class="col-md-6" data-aos="fade-right">
                <img src="assets/img/undraw_svg_3.svg" alt="Image" class="img-fluid">
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