@extends('layouts.admin')
@section('content')
<div class="pagetitle">
    <h1>Verified</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Verified</li>
        </ol>
    </nav>
</div><!-- End Page Title -->
<hr>
@if (\Session::has('success'))
<div class="alert alert-success">
    {!! \Session::get('success') !!}
</div>
@endif

<div class="card " style="width: 18rem;">
    <div class="card-body">
        <p class="card-text mt-3"><strong>Card Number:</strong> {{ $card->card_number }}</p>
        <p class="card-text mt-3"><strong>Name:</strong> {{ $user->name }}</p>
        <p class="card-text mt-3"><strong>Validity:</strong> {{ date('M-d-Y', strtotime($card->valid_from)); }} - {{
            date('M-d-Y', strtotime($card->valid_to)); }}</p>
    </div>
</div>
<a href="{{ route('scanner') }}" class="btn btn-primary">Scan Again</a>

@endsection