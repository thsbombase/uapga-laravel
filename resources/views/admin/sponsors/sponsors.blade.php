@extends('layouts.admin')
@section('content')
<div class="pagetitle">
    <h1>Sponsors and Partners</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Sponsors and Partners</li>
        </ol>
    </nav>
</div><!-- End Page Title -->
<a href="{{ route('sponsors.create') }}" class="btn btn-primary btn-icon-split btn-lg mb-3">
    <span class="icon text-white-50">
        <i class="fas fa-plus"></i>
    </span>
    <span class="text">Create <b>New Sponsor or Partner</b></span>
</a>

<p>Click the button above to <b>add a new sponsor or partner</b>.</p>
<hr>
@if (\Session::has('success'))
<div class="alert alert-success">
    {!! \Session::get('success') !!}
</div>
@endif
<section class="section dashboard">

    <div class="row">

        <table class="table table-borderless datatable">
            <thead>
                <tr>
                    <th scope="col">Company Name</th>
                    <th scope="col">Company Logo</th>
                    <th scope="col">Contact Person</th>
                    <th scope="col">Type</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ( $sponsors as $sponsor)
                <tr>
                    <th scope="row"><a href="{{ $sponsor->company_url }}" target="_blank">{{ $sponsor->company_name
                            }}</a></th>
                    <td><img src="{{ asset('images/sponsors/'. $sponsor->company_logo ) }}" alt="" class="img-fluid"
                            width="100">
                    </td>
                    <td>{{ $sponsor->company_contact_person }}</td>
                    <td>{{ strtoupper($sponsor->type) }}</td>
                    <td>
                        <a href="{{ route('sponsors.edit', $sponsor->id) }}" class="btn btn-secondary btn-sm">Edit</a>
                        <form action="{{ route('sponsors.destroy', $sponsor->id) }}" method="post" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4">No sponsors or partners found.</td>
                </tr>
                @endforelse

            </tbody>
        </table>
    </div>
</section>
@endsection