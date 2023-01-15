@extends('layouts.admin')
@section('content')
<div class="pagetitle">
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">User</li>
            <li class="breadcrumb-item active">Change Password</li>
        </ol>
    </nav>
</div>
@if (\Session::has('error'))
<div class="alert alert-danger">
    {!! \Session::get('error') !!}
</div>
@endif
<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Change Password</h4>

                    <form method="post" action="{{ route('change_password') }}" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <div class="row mb-3">
                            <label for="current_password" class="col-sm-2 col-form-label">
                                Current Password </label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control " name="current_password">
                                @error ('current_password')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="new_password" class="col-sm-2 col-form-label">
                                New Password </label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control " name="new_password">
                                @error ('new_password')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="type" class="col-sm-2 col-form-label">Confirm Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control " name="confirm_password">
                                @error ('confirm_password')
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