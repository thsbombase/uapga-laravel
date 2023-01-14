<div class="row mb-5">

    @if($partners->isNotEmpty())
    @foreach ($partners as $partner)

    <div class="col-md-4">
        <a href="{{ $partner->company_url }}" target="_blank">
            <div class="post-entry">
                <img src="{{ asset('images/sponsors/'. $partner->company_logo ) }}" alt="Image" class="img-fluid">
                <div class="post-text mt-4">
                    <h3>{{ $partner->company_name }}</h3>
                    <p>Contact Person: {{ $partner->company_contact_person }}</p>
                </div>
            </div>
        </a>
    </div>

    @endforeach
    @else



    @endif

</div>