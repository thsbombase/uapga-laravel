<div class="row mb-5">

    @if($sponsors->isNotEmpty())
    @foreach ($sponsors as $sponsor)

    <div class="col-md-4">
        <a href="{{ $sponsor->company_url }}" target="_blank">
            <div class="post-entry">
                <img src="{{ asset('images/sponsors/'. $sponsor->company_logo ) }}" alt="Image" class="img-fluid">
                <div class="post-text mt-4">
                    <h3>{{ $sponsor->company_name }}</h3>
                    <p>Contact Person: {{ $sponsor->company_contact_person }}</p>
                </div>
            </div>
        </a>
    </div>

    @endforeach
    @else



    @endif

</div>