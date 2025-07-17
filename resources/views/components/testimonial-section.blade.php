<section class="section-3 py-5 position-relative">
    <div class="angle-left"></div>
    <div class="angle-right"></div>
    <div class="container">
        <div class="testimonial-head text-center">
            <div class="divider mb-3 mx-auto"></div>
            <h2 class="text-realm-blue mb-4">Testimonials</h2>
        </div>

        <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="4000">
            <div class="carousel-inner">
                @if (!isset($testimonials) || empty($testimonials))
                    <div class="carousel-item active">
                        <div class="text-center">
                            <p class="text-muted">No testimonials available at the moment.</p>
                        </div>
                    </div>
                @else
                    @foreach ($testimonials->chunk(3) as $chunkIndex => $chunk)
                        <div class="carousel-item {{ $chunkIndex === 0 ? 'active' : '' }}">
                            <div class="row justify-content-center">
                                @foreach ($chunk as $testimonial)
                                    <div class="col-md-4 col-sm-12 mb-4 d-flex align-items-stretch">
                                        <div class="card border-0 text-center w-100 shadow-sm">
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

            <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon text-dark" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon text-dark" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</section>
@push('styles')
    <style>
        .testimonial-description {
            overflow: hidden;
            text-overflow: ellipsis;
            display: block;
        }

        /* All card bodies should be of same height (adjusted via JS) */
        .card-body {
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            height: 100%;
        }

        /* Responsive layout */
        @media (max-width: 767.98px) {
            .carousel-inner .carousel-item>.row>div {
                display: none;
            }

            .carousel-inner .carousel-item>.row>div:first-child {
                display: block;
            }
        }

        @media (min-width: 768px) {
            .carousel-inner .carousel-item>.row>div {
                display: block;
            }
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            background-size: 100% 100%;

        }
    </style>
@endpush
