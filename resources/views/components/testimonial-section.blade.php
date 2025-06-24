<section class="section-3 py-5 position-relative">
    <div class="angle-left"></div>
    <div class="angle-right"></div>
    <div class="container">
        <div class="testimonial-head text-center">
            <div class="divider mb-3 mx-auto"></div>
            <h2 class="text-realm-blue mb-4">Testimonials</h2>
        </div>

        <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">
            <div class="carousel-inner">
                @if (!isset($testimonials) || empty($testimonials))
                    <div class="carousel-item active">
                        <div class="text-center">
                            <p class="text-muted">No testimonials available at the moment.</p>
                        </div>
                    </div>
                @else
                    @foreach ($testimonials->chunk(2) as $chunkIndex => $chunk)
                        <div class="carousel-item {{ $chunkIndex === 0 ? 'active' : '' }}">
                            <div class="row justify-content-center">
                                @foreach ($chunk as $testimonial)
                                    <div class="col-md-5 col-12 mb-4">
                                        <div class="card border-0 text-center h-100 mx-auto" style="max-width: 420px;">
                                            @if (!empty($testimonial->image))
                                                <img src="{{ asset('uploads/' . $testimonial->image) }}"
                                                    class="card-img-top rounded-circle mx-auto mt-3"
                                                    style="width: 80px; height: 80px; object-fit: cover;"
                                                    alt="{{ $testimonial->name }}">
                                            @else
                                                <img src="{{ asset('assets/images/default-user.png') }}"
                                                    class="card-img-top rounded-circle mx-auto mt-3"
                                                    style="width: 80px; height: 80px; object-fit: cover;"
                                                    alt="Default Avatar">
                                            @endif

                                            <div class="card-body p-3">
                                                <h5 class="card-title mt-2 mb-1">{{ $testimonial->name ?? 'Anonymous' }}
                                                </h5>

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
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

            <!-- Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon bg-none text-realm-blue" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon bg-none text-realm-blue" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</section>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const cardBodies = document.querySelectorAll('#testimonialCarousel .card-body');
            if (!cardBodies.length) return;

            let maxHeight = 0;

            // Reset heights and find max height
            cardBodies.forEach(card => {
                card.style.height = 'auto'; // reset for accurate measurement
                const height = card.offsetHeight;
                if (height > maxHeight) maxHeight = height;
            });

            // Apply max height to all card bodies
            cardBodies.forEach(card => {
                card.style.height = maxHeight + 'px';
            });
        });
    </script>
@endpush

@push('styles')
    <style>
        /* Desktop: Two testimonials per slide */
        .carousel .carousel-item .col-md-5 {
            flex: 0 0 45%;
            max-width: 45%;
        }

        /* Mobile: Only one testimonial per slide */
        @media (max-width: 767.98px) {

            /* Make each testimonial take full width */
            .carousel .carousel-item .col-12 {
                flex: 0 0 100% !important;
                max-width: 100% !important;
            }

            /* Hide second testimonial in each slide on mobile */
            .carousel-inner .carousel-item .col-md-5:nth-child(2) {
                display: none;
            }
        }

        /* Fix control icons size */
        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            background-size: 100%, 100%;
        }

        /* Testimonial description styling */
        .testimonial-description {
            display: -webkit-box;
            -webkit-line-clamp: 8;
            /* Adjust line clamp */
            -webkit-box-orient: vertical;
            text-overflow: ellipsis;
            max-height: 90px;
            /* fixed height for text */
            overflow-y: auto;
            /* scroll if overflow */
            padding-right: 8px;
            /* padding for scrollbar */
        }

        /* Consistent card body height */
        .card-body {
            min-height: 180px;
            /* adjust as needed */
        }

        /* Remove horizontal gutters */
        .section-3 .row {
            --bs-gutter-x: 0.5rem;
            /* reduce gutter from 1.5rem to 0.5rem */
        }
    </style>
@endpush
