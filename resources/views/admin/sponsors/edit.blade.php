@extends('layouts.admin')
@section('content')
<div class="pagetitle">
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Sponsor and Partners</li>
            <li class="breadcrumb-item active">Edit Sponsor or Partners</li>
        </ol>
    </nav>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit {{ $sponsor->company_name }}</h4>

                    <form method="post" action="{{ route('sponsors.update' , $sponsor->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <label for="company_name" class="col-sm-2 col-form-label">Company Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('company_name') is-invalid @enderror"
                                    name="company_name" value="{{ $sponsor->company_name }}">
                                @error('company_name')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                        </div>
                        <div class="row mb-3">
                            <label for="company_contact_person" class="col-sm-2 col-form-label">
                                Contact Person </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control " name="company_contact_person"
                                    value="{{ $sponsor->company_contact_person }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="company_logo" class="col-sm-2 col-form-label">Company Logo</label>
                            <div class="col-sm-10">
                                <input class="form-control @error('company_logo') is-invalid @enderror" type="file"
                                    id="company_logo" name="company_logo">
                                @error('company_logo')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="company_url" class="col-sm-2 col-form-label">Company Link</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('company_url') is-invalid @enderror"
                                    name="company_url" value="{{ $sponsor->company_url }}">
                                @error ('company_url')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="type" class="col-sm-2 col-form-label">Type</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="type">
                                    <option disabled value="" selected>Select type</option>
                                    <option value="sponsor" @selected($sponsor->type == 'sponsor')>Sponsor</option>
                                    <option value="partner" @selected($sponsor->type == 'partner')>Partner</option>
                                </select>
                                @error ('type')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class=" mt-3 text-end">
                            <input class="btn btn-success rounded" type="submit" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection