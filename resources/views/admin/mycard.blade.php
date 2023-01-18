@extends('layouts.admin')
@push('styles')
<style>
    .scene {
        display: inline-block;
        /*   border: 1px solid #CCC; */
        margin: 40px 0;
        perspective: 600px;
    }

    .cardbg {
        position: relative;
        width: 566px;
        height: 358px;
        cursor: pointer;
        transform-style: preserve-3d;
        transform-origin: center right;
        transition: transform 1s;
    }

    .cardbg.is-flipped {
        transform: translateX(-100%) rotateY(-180deg);
    }

    .card__face {
        position: absolute;
        width: 100%;
        height: 100%;
        color: white;
        text-align: center;
        font-weight: bold;
        font-size: 40px;
        backface-visibility: hidden;
    }

    .card__face--front {
        background: rgba(255, 255, 255, 0);
        width: inherit;
        background-size: contain !important;
        background-position: center !important;
        background-repeat: no-repeat !important;
    }

    .card__face--back {
        background: rgba(255, 255, 255, 0);
        width: inherit;
        background-size: contain !important;
        background-position: center !important;
        background-repeat: no-repeat !important;
        transform: rotateY(180deg);
    }

    /* set card height and witdt for mobile */
    @media (max-width: 767px) {
        .cardbg {
            position: relative;
            margin: 0;
            width: 100vw;
            height: 25vh;
        }
        #qrcode img {
            justify-content: flex-end;
            width: 60%;
            height: 60%;
        }
        
    }
</style>
@endpush
@push('scripts')
<script src="https://cdn.jsdelivr.net/gh/davidshimjs/qrcodejs@gh-pages/qrcode.min.js"></script>
@if (Auth::user()->status == 'approved')
<script type="text/javascript">
    var qrcode = new QRCode("qrcode" , {
        width: 100,
        height: 100,
        correctLevel : QRCode.CorrectLevel.H
    });

    function makeCode () {  
        var elText = '{{ $card->code }}';
        qrcode.makeCode(elText);
        var qrcode1 = document.getElementById("qrcode");
        qrcode1.removeAttribute("title");
        var img = qrcode1.getElementsByTagName("img")[0];
        img.className = "img-fluid";
    }

    makeCode();
    
    var cards = document.querySelectorAll('.cardbg');

    [...cards].forEach((card)=>{
        card.addEventListener( 'click', function() {
            card.classList.toggle('is-flipped');
        });
    });
</script>
@endif
@endpush
@section('content')
<div class="pagetitle">
    <h1>My Card</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">My Card</li>
        </ol>
    </nav>
</div><!-- End Page Title -->
<hr>
@if (\Session::has('success'))
<div class="alert alert-success">
    {!! \Session::get('success') !!}
</div>
@endif
<div class="text-center m-0 p-0">
    @if ($card && $card->valid_until < now()) <div class="alert alert-danger">
        <p>Your card is already expired.</p>

        @elseif (Auth::user()->status == 'approved')
        <div class="scene scene--cardbg">
            <div class="cardbg">
                <div class="card__face card__face--front "
                    style="background-image: url('{{ asset('admin/img/FRONT_OPTION 1.webp') }}');">
                    <div class=" d-flex align-items-end justify-content-end h-100 w-100 p-3">
                        <div>
                            <p class=" text-end text-white m-0" style="font-size: 11px">{{ $card->year . '
                                ' .
                                strtoupper($card->district_code) . '
                                ' .
                                $card->control_number }}</p>
                            <h5 class=" text-end text-white m-0 ">{{ Auth::user()->name }}</h5>
                            <p class=" text-end text-white m-0" style="font-size: 10px">{{
                                Auth::user()->position
                                }}
                            </p>
                            <p class=" text-end text-white m-0" style="font-size: 9px">{{ date('F Y',
                                strtotime($card->valid_until));
                                }}
                            </p>
                        </div>
                        <div id="qrcode" class=" float-end ms-2  "></div>

                    </div>
                </div>
                <div class="card__face card__face--back"
                    style="background-image: url('{{ asset('admin/img/BACK_OPTION 1.webp') }}')"></div>
            </div>
        </div>
        {{-- <div class="flip me-2">
            <div class="front w-100 flex"
                style="background-image: url('{{ asset('admin/img/FRONT_OPTION 1.webp') }}');">
                <div class=" d-flex align-items-end justify-content-end h-100 w-100 ">

                    <div>
                        <p class="card-text text-end text-white m-0 pt-3" style="font-size: 11px">{{ $card->year . ' ' .
                            strtoupper($card->district_code) . '
                            ' .
                            $card->control_number }}</p>
                        <h5 class="card-text text-end text-white m-0 ">{{ Auth::user()->name }}</h5>
                        <p class="card-text text-end text-white m-0" style="font-size: 10px">{{ Auth::user()->position
                            }}
                        </p>
                        <p class="card-text text-end text-white m-0" style="font-size: 9px">{{ date('F Y',
                            strtotime($card->valid_until));
                            }}
                        </p>
                    </div>
                    <div id="qrcode" class="float-end ms-2 "></div>

                </div>
            </div>
            <div class="back" style="background-image: url('{{ asset('admin/img/BACK_OPTION 1.webp') }}')">
            </div>
        </div> --}}
        @else <div class="alert alert-danger">
            <p>Your account is not yet approved. Please wait for the admin to approve your account.</p>
        </div>
        @endif
        </center>
        @endsection