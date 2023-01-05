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