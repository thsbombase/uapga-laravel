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

                <!-- Sales Card -->
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card sales-card">

                        <div class="card-body">
                            <h5 class="card-title">Approved </h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-person"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $approved }}</h6>
                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Sales Card -->

                <!-- Revenue Card -->
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card revenue-card">


                        <div class="card-body">
                            <h5 class="card-title">For Approval </h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-person"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $pending }}</h6>
                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Revenue Card -->

                <!-- Customers Card -->
                <div class="col-xxl-4 col-xl-12">

                    <div class="card info-card customers-card">

                        <div class="card-body">
                            <h5 class="card-title">Sponsors</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-people"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $sponsors }}</h6>
                                </div>
                            </div>

                        </div>
                    </div>

                </div><!-- End Customers Card -->

                <!-- Recent Sales -->
                <div class="col-12">
                    <div class="card recent-sales overflow-auto">

                        <div class="card-body">
                            <h5 class="card-title">For Approval</h5>

                            <table class="table table-borderless datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ( $pendings as $pending )
                                    <tr>
                                        <td>{{ $pending->name }}</td>
                                        <td><span class="badge bg-warning">Pending</span></td>
                                    </tr>
                                    @empty
                                    <tr></tr>
                                    <td>No Pending</td>
                                    <td></td>
                                    @endforelse

                                </tbody>
                            </table>

                        </div>

                    </div>
                </div><!-- End Recent Sales -->
            </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

            <!-- Recent Activity -->
            <div class="card">

                <div class="card-body">
                    <h5 class="card-title">Recent Announcement</h5>

                    <div class="activity">
                        @forelse ( $announcements as $announcement)
                        <div class="activity-item d-flex">
                            <div class="activite-label">{{ date('F d, Y', strtotime($announcement->date)); }}</div>
                            <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                            <div class="activity-content">
                                {{ $announcement->description }}

                            </div>
                        </div><!-- End activity item-->
                        @empty
                        <div class="activity-item d-flex">
                            <div class="activite-label"></div>
                            <i class='bi bi-circle-fill activity-badge text-error align-self-start'></i>
                            <div class="activity-content">
                                No Announcement
                            </div>
                        </div><!-- End activity item-->

                        @endforelse
                    </div>

                </div>
            </div><!-- End Recent Activity -->

        </div><!-- End Right side columns -->
        @else
        <div class="col-lg-12">

            <!-- Recent Activity -->
            <div class="card">

                <div class="card-body">
                    <h5 class="card-title">Recent Announcement</h5>

                    <div class="activity">
                        @forelse ( $announcements as $announcement)
                        <div class="activity-item d-flex">
                            <div class="activite-label">{{ date('F d, Y', strtotime($announcement->date)); }}</div>
                            <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                            <div class="activity-content">
                                {{ $announcement->description }}

                            </div>
                        </div><!-- End activity item-->
                        @empty
                        <div class="activity-item d-flex">
                            <div class="activite-label"></div>
                            <i class='bi bi-circle-fill activity-badge text-error align-self-start'></i>
                            <div class="activity-content">
                                No Announcement
                            </div>
                        </div><!-- End activity item-->

                        @endforelse
                    </div>

                </div>
            </div><!-- End Recent Activity -->

        </div><!-- End Right side columns -->
        @endif

    </div>
</section>
@endsection