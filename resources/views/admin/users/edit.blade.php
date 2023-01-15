@extends('layouts.admin')
@section('content')
<div class="pagetitle">
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">User</li>
            <li class="breadcrumb-item active">Edit User</li>
        </ol>
    </nav>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit {{ $user->name }}</h4>

                    <form method="post" action="{{ route('users.update' , $user->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ $user->name }}">
                                @error('name')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-sm-2 col-form-label">
                                Email </label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control " name="email" value="{{ $user->email }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="position" class="col-sm-2 col-form-label">
                                Position </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control " name="position" value="{{ $user->position }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="type" class="col-sm-2 col-form-label">Role</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="role">
                                    <option disabled value="" selected>Select Role</option>
                                    <option value="admin" @selected($user->role == 'admin')>Admin</option>
                                    <option value="sponsor" @selected($user->role == 'sponsor')>Sponsor</option>
                                    <option value="user" @selected($user->role == 'user')>User</option>
                                </select>
                                @error ('type')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="type" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="status">
                                    <option disabled value="" selected>Select status</option>
                                    @if ($user->status == 'pending')
                                    <option value="pending" @selected($user->status == 'pending')>Pending</option>
                                    @endif
                                    <option value="approved" @selected($user->status == 'approved')>Approved</option>
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