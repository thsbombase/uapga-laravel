<!-- ======= CTA Section ======= -->
<section class="section cta-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 me-auto text-center text-md-start mb-5 mb-md-0">
                <h5 class="text-white">A lot of perks and benefits await you as you become a member for this Fiscal
                    Year! <br><br>
                    What are you waiting for? <br><br>
                    Register now!</h5>
            </div>
            <div class="col-md-5 text-center text-md-end">
                @php
                $main_color = \App\Models\SystemColor::first();
                if(!$main_color){
                $main_color = new \App\Models\SystemColor();
                $main_color->color = '#f75d12';
                $main_color->save();
                }
                @endphp
                <p><a href="{{ route('login') }}" class="btn d-inline-flex align-items-center bg-white"
                        style="color: {{ $main_color->color }};"><span>Login</span></a> <a
                        href="{{ route('register') }}" class="btn d-inline-flex align-items-center bg-white"
                        style="color: {{ $main_color->color }};"><span>Register</span></a>
                </p>
            </div>
        </div>
    </div>
</section><!-- End CTA Section -->