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