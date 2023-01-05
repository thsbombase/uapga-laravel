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