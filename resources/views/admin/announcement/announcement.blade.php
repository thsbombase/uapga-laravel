@extends('layouts.admin')
@section('content')
<div class="pagetitle">
    <h1>Announcement</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Announcement</li>
        </ol>
    </nav>
</div><!-- End Page Title -->
<a href="{{ route('announcements.create') }}" class="btn btn-primary btn-icon-split btn-lg mb-3">
    <span class="icon text-white-50">
        <i class="fas fa-plus"></i>
    </span>
    <span class="text">Create <b>New Announcement</b></span>
</a>

<p>Click the button above to <b>add a new announcement</b>.</p>
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
                    <th scope="col">Date</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ( $announcements as $announcement)
                <tr>
                    <td>{{ date('F d, Y', strtotime($announcement->date)); }}</td>
                    <td>{{ $announcement->description }}</td>
                    <td>
                        <a href="{{ route('announcements.edit', $announcement->id) }}"
                            class="btn btn-secondary btn-sm">Edit</a>
                        <form action="{{ route('announcements.destroy', $announcement->id) }}" method="post"
                            class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4">No announcements found.</td>
                </tr>
                @endforelse

            </tbody>
        </table>
    </div>
</section>
@endsection