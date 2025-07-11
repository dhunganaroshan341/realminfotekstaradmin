@php
    $backgroundImage =
        isset($cta) && $cta->image ? asset('uploads/' . $cta->image) : asset('assets/images/hero_cta.jpg');

    $ctaTitle = $cta->title ?? 'Do you need help?';
    $ctaDescription =
        $cta->description ?? 'We are here to assist you with your queries and problems. Reach out to us now!';
@endphp

<section class="section-4 py-5 text-center"
    style="background-image: url('{{ $backgroundImage }}'); background-size: cover; background-position: center; position: relative;">

    <div class="hero-background-overlay"
        style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0,0,0,0.4); z-index: 1;">
    </div>

    <div class="container position-relative z-2">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8">
                <div class="help-container text-white">
                    <h1 class="title">{{ $ctaTitle }}</h1>
                    <p class="card-text mt-3">{!! $ctaDescription !!}</p>
                    <a href="{{ url('/contact-us') }}" class="btn btn-primary mt-3">
                        Reach Out <i class="fa-solid fa-angle-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
