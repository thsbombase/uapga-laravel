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
        @if ($card && $card->valid_until < now()) <div class="alert alert-danger">
            <p>Card is already expired.</p>
    </div>
    @endif
    <p class="card-text mt-3"><strong>Card Number:</strong> {{ $card->year . ' ' . $card->district_code . ' ' .
        $card->control_number }}</p>
    <p class="card-text mt-3"><strong>Name:</strong> {{ $user->name }}</p>
    <p class="card-text mt-3"><strong>Valid Until:</strong> {{ date('F Y', strtotime($card->valid_until)); }} </p>
</div>
</div>
<a href="{{ route('scanner') }}" class="btn btn-primary">Scan Again</a>

@endsection