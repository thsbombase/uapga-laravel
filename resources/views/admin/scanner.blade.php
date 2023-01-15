@extends('layouts.admin')
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{ asset('admin/vendor/scanner.js') }}"></script>

<script>
    function onScanSuccess(decodedText, decodedResult) {

        $.ajax({
                url: '/verifyCard/' + decodedText,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    console.log(data)
                    if (data.status == 'success') {
                        window.location.href = '/verifiedCard/' + decodedText;
                    }
                    if (data.status == 'error') {
                        alert(data.message);
                    }
                }
            });
}

var html5QrcodeScanner = new Html5QrcodeScanner(
	"reader", { fps: 10, qrbox: 250, disableFlip: true });
html5QrcodeScanner.render(onScanSuccess);
</script>
@endpush
@section('content')
<div class="pagetitle">
    <h1>Scanner</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Scanner</li>
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
    <div style="width: 500px" id="reader"></div>
</center>
@endsection