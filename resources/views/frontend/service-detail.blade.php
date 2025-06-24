@extends('frontend.layout.main')
@section('content')
    <section class="hero-small">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active"
                    style="background-image: url('{{ $pageBanner->image ? asset('uploads/' . $pageBanner->image) : asset('assets/images/default-blog.jpg') }}');">
                    <div class="hero-small-background-overlay"></div>
                    <div class="container h-100">
                        <div class="row align-items-center d-flex h-100">
                            <div class="col-md-12">
                                <div class="block">
                                    <span class="text-uppercase text-sm letter-spacing"></span>
                                    <h3 class="mb-3 mt-3 text-center text-white"> Services &nbsp <i
                                            class="fa-solid fa-angle-right"></i> &nbsp {{ $serviceDetail->name ?? '' }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-2 py-5">
        <div class="container py-2">

            <div class="row">
                <div class="col-md-6 align-items-center d-flex flex-column">
                    <div class="about-block mb-4 mb-md-0">
                        <h1 class="title-color mb-3">{{ $serviceDetail->name ?? '' }}</h1>
                        <p>{!! $serviceDetail->description ?? '' !!}</p>
                    </div>


                </div>

                <div class="col-md-6 mt-4">
                    <div class="image-realm-background-before">

                        <img src="{{ $serviceDetail->image ? asset('uploads/' . $serviceDetail->image) : asset('assets/images/digital-marketing.jpg') }}"
                            alt="" class="w-100">

                    </div>
                </div>
                {{-- Query Now Form --}}
                <div class="w-100 mt-3 mb-2 mt-md-0">
                    @include('components.service-popup-form')
                </div>
            </div>

            {{-- Other services and sections --}}
            @include('components.other-services-component', ['otherServicetitle' => 'Other Services'])

            {{-- Do you need help section --}}
            @include('components.cta-section')

            {{-- Blog and news section --}}
            @include('components.blog-and-news-section')

            {{-- Team section --}}
        </div>
    </section>
@endsection
