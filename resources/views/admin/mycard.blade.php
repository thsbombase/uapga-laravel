@extends('layouts.admin')
@push('scripts')
<script src="https://cdn.jsdelivr.net/gh/davidshimjs/qrcodejs@gh-pages/qrcode.min.js"></script>
@if (Auth::user()->status == 'approved')
<script type="text/javascript">
    //remove title="" from qrcode
    

    var qrcode = new QRCode("qrcode");

    function makeCode () {  
        var elText = '{{ $card->code }}';
        qrcode.makeCode(elText);
        var qrcode1 = document.getElementById("qrcode").removeAttribute("title");
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
<center>
    @if ($card && $card->valid_until < now()) <div class="alert alert-danger">
        <p>Your card is already expired.</p>
        </div>
        @elseif (Auth::user()->status == 'approved')
        <div id="qrcode"></div>
        @else <div class="alert alert-danger">
            <p>Your account is not yet approved. Please wait for the admin to approve your account.</p>
        </div>
        @endif
</center>
@endsection