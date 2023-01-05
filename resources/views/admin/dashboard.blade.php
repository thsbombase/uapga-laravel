@extends('layouts.admin')
@section('content')
<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </nav>
</div><!-- End Page Title -->
<hr>
@if (\Session::has('success'))
<div class="alert alert-success">
    {!! \Session::get('success') !!}
</div>
@endif
<section class="section dashboard">
    <div class="row">
        @if (Auth::user()->role == 'admin')
        <!-- Left side columns -->
        <div class="col-lg-8">
            <div class="row">

                <x-dashboard.cards />

                <x-dashboard.pending />
            </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

            <x-dashboard.announcement />

        </div><!-- End Right side columns -->
        @else
        <div class="col-lg-12">

            <x-dashboard.announcement />

        </div><!-- End Right side columns -->
        @endif

    </div>
</section>
@endsection