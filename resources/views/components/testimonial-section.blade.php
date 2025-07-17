{{-- MOBILE VERSION (1 per slide) --}}
<div class="d-md-none">
    <div id="testimonialCarouselMobile" class="carousel slide" data-bs-ride="carousel" data-bs-interval="4000">
        <div class="carousel-inner">
            @foreach ($testimonials as $index => $testimonial)
                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                    <div class="d-flex justify-content-center">
                        @include('partials.testimonial-card', ['testimonial' => $testimonial])
                    </div>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarouselMobile"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon text-dark" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarouselMobile"
            data-bs-slide="next">
            <span class="carousel-control-next-icon text-dark" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>

{{-- DESKTOP VERSION (3 per slide) --}}
<div class="d-none d-md-block">
    <div id="testimonialCarouselDesktop" class="carousel slide" data-bs-ride="carousel" data-bs-interval="4000">
        <div class="carousel-inner">
            @foreach ($testimonials->chunk(3) as $chunkIndex => $chunk)
                <div class="carousel-item {{ $chunkIndex === 0 ? 'active' : '' }}">
                    <div class="row justify-content-center">
                        @foreach ($chunk as $testimonial)
                            <div class="col-md-4 d-flex align-items-stretch mb-4">
                                @include('partials.testimonial-card', ['testimonial' => $testimonial])
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarouselDesktop"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon text-dark" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarouselDesktop"
            data-bs-slide="next">
            <span class="carousel-control-next-icon text-dark" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
