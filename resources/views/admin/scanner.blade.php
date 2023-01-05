@extends('layouts.admin')
@push('scripts')
<script src="{{ asset('admin/vendor/scanner.js') }}"></script>
<script>
    function onScanSuccess(decodedText, decodedResult) {

    alert(`Scan result: ${decodedText}`, decodedResult);
}

var html5QrcodeScanner = new Html5QrcodeScanner(
	"reader", { fps: 10, qrbox: 250, disableFlip: false });
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