@php
    $backgroundImage =
        isset($cta) && $cta->image ? asset('uploads/' . $cta->image) : asset('assets/images/hero_cta.jpg');
    $ctaTitle = $cta->title ?? 'Do you need help?';
    $ctaDescription =
        $cta->description ?? 'We are here to assist you with your queries and problems. Reach out to us now!';
@endphp

<section class="section-4 py-5 text-center text-white position-relative"
    style="background-image: url('{{ $backgroundImage }}');
                background-size: cover;
                background-position: center;">

    {{-- Overlay --}}
    <div class="position-absolute top-0 start-0 w-100 h-100" style="background-color: rgba(0,0,0,0.5); z-index: 1;"></div>

    {{-- Content --}}
    <div class="container position-relative z-2">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8">
                <div class="help-container py-4">
                    <h1 class="title mb-3">{{ $ctaTitle }}</h1>
                    <p class="lead">{!! $ctaDescription !!}</p>
                    <a href="{{ url('/contact-us') }}" class="btn btn-primary mt-3">
                        Reach Out <i class="fa-solid fa-angle-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
