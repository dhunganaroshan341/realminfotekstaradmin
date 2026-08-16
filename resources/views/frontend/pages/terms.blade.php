@extends('frontend.layout.main')

@section('content')
    <!-- Hero Section -->
    <section class="hero-small">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active"
                    style="background-image: url({{ $pageBanner->image ? asset('uploads/' . $pageBanner->image) : asset('assets/images/banner1.jpg') }});">
                    <div class="hero-small-background-overlay"></div>
                    <div class="container h-100">
                        <div class="row align-items-center h-100">
                            <div class="col-12 text-center text-white">
                                <h1 class="mb-3 mt-3">{{ $pageBanner->title ?? 'Terms & Conditions' }}</h1>
                                <p>{{ $bannerDescription ?? 'Please read our terms before using Roshan Dhunganaservices.' }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Terms Content -->
    <section class="pt-5 pb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <h2 class="mb-4">1. Acceptance of Terms</h2>
                    <p>By using our website or services, you agree to follow the rules and terms outlined here. If you don’t
                        agree, please do not use our services.</p>

                    <h2 class="mt-4 mb-3">2. Services</h2>
                    <p>We offer web development, design, and IT consulting. We have the right to update or stop any service
                        at any time without prior notice.</p>

                    <h2 class="mt-4 mb-3">3. User Responsibilities</h2>
                    <p>When using our services, please don’t engage in any illegal or harmful activities. We expect users to
                        be respectful and responsible.</p>

                    <h2 class="mt-4 mb-3">4. Payments</h2>
                    <p>Any payment for our services must be made as agreed. We do not offer refunds unless clearly mentioned
                        in our service agreement.</p>

                    <h2 class="mt-4 mb-3">5. Changes to Terms</h2>
                    <p>We may update these terms at any time. The latest version will always be posted here with an updated
                        date.</p>
                </div>
            </div>
        </div>
    </section>
@endsection
