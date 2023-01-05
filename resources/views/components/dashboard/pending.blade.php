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