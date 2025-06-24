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
                                    <h1 class="mb-3 mt-3 text-center">{{ $pageBanner->title ?? 'Services' }}</h1>
                                    <p>{{ $pageBanner->description ?? 'Lorem ipsum dolor sit amet consectetur adipisicing elit.' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="section-3 py-5">
        <div class="container">
            <div class="divider mb-3"></div>
            <h2 class="title-color mb-4 h1">Services</h2>
            <div class="cards">
                <div class="row">
                    @foreach ($services as $service)
                        <div class="col-md-4 mb-4">
                            <div class="card border-0">
                                <img src="{{ isset($service->image) ? asset('uploads/' . $service->image) : asset('assets/images/digital-marketing.jpg') }}"
                                    class="card-img-top" alt="">
                                <div class="card-body p-3">
                                    <h1 class="card-title mt-2"><a
                                            href="{{ route('service-detail', $service->id) }}">{{ $service->name }}</a></h1>
                                    <div class="content pt-2">
                                        <p class="card-text">{{ $service->short_desc }}</p>
                                    </div>
                                    <a href="{{ route('service-detail', $service->id) }}"
                                        class="btn btn-primary mt-4">Details <i class="fa-solid fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
        </div>
    </section>
@endsection
