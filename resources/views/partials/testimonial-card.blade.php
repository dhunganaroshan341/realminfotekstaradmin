<div class="card border-0 text-center w-100 shadow-sm">
    @if (!empty($testimonial->image))
        <img src="{{ asset('uploads/' . $testimonial->image) }}" class="card-img-top rounded-circle mx-auto mt-3"
            style="width: 80px; height: 80px; object-fit: cover;" alt="{{ $testimonial->name }}">
    @else
        <img src="{{ asset('assets/images/default-user.png') }}" class="card-img-top rounded-circle mx-auto mt-3"
            style="width: 80px; height: 80px; object-fit: cover;" alt="Default Avatar">
    @endif

    <div class="card-body p-3">
        <h5 class="card-title mt-2 mb-1">{{ $testimonial->name ?? 'Anonymous' }}</h5>

        @if (!empty($testimonial->designation) || !empty($testimonial->address))
            <p class="mb-2 text-muted small">
                @if (!empty($testimonial->designation))
                    <span>{{ $testimonial->designation }}</span>
                @endif
                @if (!empty($testimonial->designation) && !empty($testimonial->address))
                    <span> | </span>
                @endif
                @if (!empty($testimonial->address))
                    <span>{{ $testimonial->address }}</span>
                @endif
            </p>
        @endif

        <p class="card-text fst-italic testimonial-description">
            {!! $testimonial->description ?? '' !!}
        </p>
    </div>
</div>
