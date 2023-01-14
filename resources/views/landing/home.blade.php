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
                    <div class="col-lg-7 text-center text-lg-start">
                        <h1 data-aos="fade-right">Embrace the change,<br>
                            Be part of the growth,<br>
                            Experience the Metamorphosis.</h1>
                        {{-- <p class="mb-5" data-aos="fade-right" data-aos-delay="100">Lorem ipsum dolor sit amet,
                            consectetur
                            adipisicing elit.</p> --}}
                        <p data-aos="fade-right" data-aos-delay="200" data-aos-offset="-500"><a
                                href="{{ route('login') }}" class="btn btn-outline-white">Login</a></p>
                    </div>
                    <div class="col-lg-4 iphone-wrap text-center ms-auto ">
                        <img src="{{ asset('landing/img/logo.png') }}" alt="Image" class="phone-1 p-3 mt-5"
                            data-aos="fade-right">
                    </div>
                </div>
            </div>
        </div>
    </div>

</section><!-- End Hero -->

<!-- ======= Clients Section ======= -->
<section id="clients" classd="clients">
    <div class="container" data-aos="zoom-out">
        <div class="clients-slider swiper">
            <div class="swiper-wrapper align-items-center">
                @if($logos->isNotEmpty())
                @foreach ($logos as $logo)

                <div class="swiper-slide"><img src="{{ asset('images/sponsors/'. $logo->company_logo ) }}"
                        class="img-fluid" alt="">
                </div>


                @endforeach
                @else



                @endif

            </div>
        </div>
    </div>

    </div>
</section><!-- End Clients Section -->

<section class="section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-4 me-auto">
                <h5 class="mb-4 text-muted">As we celebrate the 18th year of United Architects of the Philippines
                    Graduate
                    Auxiliary, we continue to move forward to find new ways to evolve and transform.
                    <br> <br>
                    A new opportunity to go above and beyond the metaverse.
                    <br> <br>
                    An objective to make bolder movements toward a larger impact.
                </h5>
                {{-- <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur at
                    reprehenderit optio,
                    laudantium eius quod, eum maxime molestiae porro omnis. Dolores aspernatur delectus impedit
                    incidunt
                    dolore mollitia esse natus beatae.</p> --}}
                {{-- <p><a href="#" class="btn btn-primary">Register Now</a></p> --}}
            </div>
            <div class="col-md-6" data-aos="fade-left">
                <img src="{{ asset('landing/img/undraw_svg_2.svg') }}" alt="Image" class="img-fluid">
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-4 ms-auto order-2">
                <h5 class="mb-4 text-muted">Be a Member. <br><br>
                    Be part of the meta-zone.<br><br>
                    Be part of the UAPGA META, Future Architects!
                </h5>
                {{-- <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur at
                    reprehenderit optio,
                    laudantium eius quod, eum maxime molestiae porro omnis. Dolores aspernatur delectus impedit
                    incidunt
                    dolore mollitia esse natus beatae.</p>
                <p><a href="#" class="btn btn-primary">Register Now</a></p> --}}
            </div>
            <div class="col-md-6" data-aos="fade-right">
                <img src="{{ asset('landing/img/undraw_svg_3.svg') }}   " alt="Image" class="img-fluid">
            </div>
        </div>
    </div>
</section>

@include('landing.cta')
@endsection