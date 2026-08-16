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
                                <h1 class="mb-3 mt-3">{{ $pageBanner->title ?? 'Privacy Policy' }}</h1>
                                <p>{{ $bannerDescription ?? 'How we collect, use, and protect your personal information.' }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Privacy Policy Content -->
    <section class="pt-5 pb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <h2 class="mb-4">1. What Information We Collect</h2>
                    <p>We collect basic information like your name, email, phone number, and service interests when you
                        contact us or fill out a form.</p>

                    <h2 class="mt-4 mb-3">2. How We Use Your Information</h2>
                    <p>We use your information to provide services, respond to inquiries, and improve your experience with
                        RoshanDhungana Infotech.</p>

                    <h2 class="mt-4 mb-3">3. Sharing Your Information</h2>
                    <p>We do not sell or share your personal data with third parties unless required by law or for service
                        delivery.</p>

                    <h2 class="mt-4 mb-3">4. Data Protection</h2>
                    <p>We take reasonable steps to keep your data secure. However, no online system is 100% safe, so we
                        encourage you to be cautious.</p>

                    <h2 class="mt-4 mb-3">5. Your Choices</h2>
                    <p>You can request access to, correction of, or deletion of your personal information by contacting us
                        directly.</p>

                    <h2 class="mt-4 mb-3">6. Updates to This Policy</h2>
                    <p>We may change this privacy policy at any time. The latest version will always be available on this
                        page.</p>
                </div>
            </div>
        </div>
    </section>
@endsection
