@extends('layouts.admin')
@push('styles')
<style>
    h1 {
        font-size: 2.2em;
    }

    .flip {
        position: relative;
    }

    .flip>.front,
    .flip>.back {
        display: block;
        transition-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1.275);
        transition-duration: 0.5s;
        transition-property: transform, opacity;
    }

    .flip>.front {
        transform: rotateY(0deg);
    }

    .flip>.back {
        position: absolute;
        opacity: 0;
        top: 0px;
        left: 0px;
        width: 100%;
        height: 100%;
        transform: rotateY(-180deg);
    }

    .flip:hover>.front {
        transform: rotateY(180deg);
    }

    .flip:hover>.back {
        opacity: 1;
        transform: rotateY(0deg);
    }

    .flip.flip-vertical>.back {
        transform: rotateX(-180deg);
    }

    .flip.flip-vertical:hover>.front {
        transform: rotateX(180deg);
    }

    .flip.flip-vertical:hover>.back {
        transform: rotateX(0deg);
    }

    .flip {
        position: relative;
        display: inline-block;
        margin-right: 2px;
        margin-bottom: 1em;
        width: 566px;
    }

    .flip>.front,
    .flip>.back {
        display: block;
        color: white;
        width: inherit;
        background-size: contain !important;
        background-position: center !important;
        background-repeat: no-repeat !important;
        height: 358px;
        padding: 1em 2em;
        background: #f9f8f800;
        border-radius: 18px;
    }

    .flip>.front p,
    .flip>.back p {
        font-size: 0.9125rem;
        line-height: 160%;
        color: #999;
    }

    .text-shadow {
        text-shadow: 1px 1px rgba(0, 0, 0, 0.04), 2px 2px rgba(0, 0, 0, 0.04), 3px 3px rgba(0, 0, 0, 0.04), 4px 4px rgba(0, 0, 0, 0.04), 0.125rem 0.125rem rgba(0, 0, 0, 0.04), 6px 6px rgba(0, 0, 0, 0.04), 7px 7px rgba(0, 0, 0, 0.04), 8px 8px rgba(0, 0, 0, 0.04), 9px 9px rgba(0, 0, 0, 0.04), 0.3125rem 0.3125rem rgba(0, 0, 0, 0.04), 11px 11px rgba(0, 0, 0, 0.04), 12px 12px rgba(0, 0, 0, 0.04), 13px 13px rgba(0, 0, 0, 0.04), 14px 14px rgba(0, 0, 0, 0.04), 0.625rem 0.625rem rgba(0, 0, 0, 0.04), 16px 16px rgba(0, 0, 0, 0.04), 17px 17px rgba(0, 0, 0, 0.04), 18px 18px rgba(0, 0, 0, 0.04), 19px 19px rgba(0, 0, 0, 0.04), 1.25rem 1.25rem rgba(0, 0, 0, 0.04);
    }

    /* responsive .flip>.front,
    .flip>.back and .flip for mobile*/
    /* @media (max-width: 767px) {
        .flip {
            width: 100%;
        }

        .flip>.front,
        .flip>.back {
            height: 223px;
        }
    } */
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
<div class="text-center">
    @if ($card && $card->valid_until < now()) <div class="alert alert-danger">
        <p>Your card is already expired.</p>

        @elseif (Auth::user()->status == 'approved')
        <div class="flip me-2">
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
        </div>
        @else <div class="alert alert-danger">
            <p>Your account is not yet approved. Please wait for the admin to approve your account.</p>
        </div>
        @endif
        </center>
        @endsection