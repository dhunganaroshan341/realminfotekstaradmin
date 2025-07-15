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
                                <h1 class="mb-3 mt-3">{{ $pageBanner->title ?? 'Contact Us' }}</h1>
                                <p>{{ $bannerDescription ?? 'Get in touch with the Realm Infotech team — we\'re here to help.' }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Title -->
    <section class="pt-5 pb-3">
        <div class="container contact-box">
            <div class="row">
                <div class="col-lg-8 col-xl-6 mx-auto text-center">
                    <h1 class="mb-4 text-black">We're here to help!</h1>
                </div>
            </div>

            <!-- Contact Info Boxes -->
            <div class="row g-4 mt-2">
                <!-- Office Address -->
                <div class="col-md-4">
                    <div class="card card-body shadow text-center h-100 border-0 py-5">
                        <h5 class="mb-3">Visit Our Office</h5>
                        <p><i class="fas fa-map-marker-alt me-2"></i>{{ $address }}</p>
                    </div>
                </div>

                <!-- Phone -->
                <div class="col-md-4">
                    <div class="card card-body shadow text-center h-100 border-0 py-5">
                        <h5 class="mb-3">Call Us</h5>
                        <p><i class="fas fa-phone-alt me-2"></i><a
                                href="tel:+977{{ $contact }}">{{ $contact }}</a></p>
                        <p><i class="fas fa-phone-alt me-2"></i><a
                                href="tel:+977{{ $contact_2 }}">{{ $contact_2 }}</a></p>
                    </div>
                </div>

                <!-- Email -->
                <div class="col-md-4">
                    <div class="card card-body shadow text-center h-100 border-0 py-5">
                        <h5 class="mb-3">Email Us</h5>
                        <p><i class="far fa-envelope me-2"></i><a href="mailto:{{ $email }}">{{ $email }}</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Form -->
    <section class="pt-5 pb-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Let's talk</h2>
                    <p>Reaching our office & finding our location</p>

                    <form id="storeContact">
                        @csrf
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="name" class="form-label">Your Name *</label>
                                <input type="text" name="name" class="form-control" id="name"
                                    value="{{ old('name') }}">
                                <span class="text-danger error-message" id="name-validation"></span>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="email" class="form-label">Email Address *</label>
                                <input type="email" name="email" class="form-control" id="email"
                                    value="{{ old('email') }}">
                                <span class="text-danger error-message" id="email-validation"></span>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="subject" class="form-label">Select Service *</label>
                                <select name="subject" id="subject" class="form-select">
                                    <option value="">-- Select a Service --</option>
                                    @foreach ($services as $service)
                                        <option value="{{ $service->title }}"
                                            {{ old('subject') == $service->title ? 'selected' : '' }}>
                                            {{ $service->title }}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="text-danger error-message" id="subject-validation"></span>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="message" class="form-label">Message *</label>
                            <textarea name="message" id="message" class="form-control" rows="4">{{ old('message') }}</textarea>
                            <span class="text-danger error-message" id="message-validation"></span>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg" id="sendMessage">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Google Maps -->
    <section class="pt-5 mb-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-12 col-md-6">
                    <div class="ratio ratio-16x9 rounded shadow-sm overflow-hidden">
                        <iframe src="https://www.google.com/maps/embed?...realm map url..." class="w-100 h-100 border-0"
                            loading="lazy" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="ratio ratio-16x9 rounded shadow-sm overflow-hidden">
                        <iframe src="https://www.google.com/maps/embed?...us map url..." class="w-100 h-100 border-0"
                            loading="lazy" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <style>
        .contact-box {
            padding-bottom: 2rem;
        }

        .card-body a {
            color: #000;
            text-decoration: none;
        }

        .card-body a:hover {
            text-decoration: underline;
        }

        .ratio iframe {
            border-radius: 10px;
        }

        @media screen and (max-width: 576px) {
            .card-body {
                padding: 2rem 1rem;
            }

            .form-control,
            .form-select {
                font-size: 0.9rem;
            }

            .btn-lg {
                font-size: 1rem;
            }
        }
    </style>
@endpush

@push('scripts')
    <script>
        $(document).ready(function() {
            $("#storeContact").submit(function(event) {
                event.preventDefault();
                $("#sendMessage").prop("disabled", true);
                let formdata = new FormData(this);
                $.ajax({
                    type: "POST",
                    url: "contact-us",
                    data: formdata,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.status === true) {
                            $("#storeContact").trigger("reset");
                            Swal.fire({
                                icon: "success",
                                title: "Success",
                                text: `Message has been sent successfully.`,
                                showConfirmButton: false,
                                timer: 1800,
                            });
                        } else {
                            Swal.fire({
                                icon: "warning",
                                title: "Something went wrong!",
                                text: response.message || "Please try again.",
                            });
                        }
                    },
                    error: function(response) {
                        if (response.status === 422) {
                            let errors = response.responseJSON.errors;
                            $.each(errors, function(key, value) {
                                $("#" + key + "-validation").text(value[0]);
                            });
                        }
                    },
                    complete: function() {
                        $("#sendMessage").prop("disabled", false);
                    }
                });
            });
        });
    </script>
@endpush
