@extends('frontend.layout.main')
@section('content')
    <section class="hero-small">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active"
                    style="background-image: url({{ $pageBanner->image ? asset('uploads/' . $pageBanner->image) : asset('assets/images/banner1.jpg') }}) ;">
                    <div class="hero-small-background-overlay"></div>
                    <div class="container h-100">
                        <div class="row align-items-center d-flex h-100">
                            <div class="col-md-12">
                                <div class="block text-center">
                                    <h1 class="mb-3 mt-3 text-center">{{ 'Blog & News' }}</h1>
                                    <p>{{ $processedDescription ?? '' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-2  py-5">
        <div class="container py-2">
            <div class="col-md-12">
                {{-- <div class="image-red-background">
                    <img src="{{ asset('uploads/' . $detail->postImages[0]->image) }}" alt="" class="w-100">
                </div> --}}

                <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($detail->postImages as $index => $image)
                            <div class="carousel-item  {{ $index == 1 ? 'active' : '' }}">
                                <img src="{{ asset('uploads/' . $image->image) }}" class="d-block w-100" width="700"
                                    height="700" alt="...">
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="col-md-12 align-items-center d-flex">
                <div class="about-block">
                    <h1 class="title-color mb-3">{{ $detail->title ?? '' }}</h1>
                    <p>{!! $detail->description ?? '' !!}</p>
                </div>
            </div>

        </div>
    </section>
@endsection
