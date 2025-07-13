@extends('frontend.layout.main')
@section('content')
    <section class="hero-small">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active"
                    style="background-image: url({{ $pageBanner ? asset('uploads/' . $pageBanner->image) : asset('assets/images/banner1.jpg') }}) ;">
                    <div class="hero-small-background-overlay"></div>
                    <div class="container  h-100">
                        <div class="row align-items-center d-flex h-100">
                            <div class="col-md-12">
                                <div class="block">
                                    <span class="text-uppercase text-sm letter-spacing"></span>
                                    <h1 class="mb-3 mt-3 text-center">{{ $pageBanner ? $pageBanner->title : 'About Us' }}</h1>
                                    <p>{{ $bannerDescription ?? '' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="pt-5 pb-0">
        <div class="container contact-box">
            <div class="row">
                <div class="col-lg-8 col-xl-6 text-center mx-auto">
                    <h1 class="mb-4 text-black">We're here to help!</h1>
                </div>
            </div>

            <!-- Contact info box -->
            <div class="row g-4 g-md-5 mt-0 mt-lg-3">
                <!-- Box item -->
                <div class="col-lg-4 mt-lg-0">
                    <div class="card card-body shadow py-5 text-center h-100 border-0">
                        <!-- Title -->
                        <h5 class=" mb-3">Visit Our Office</h5>
                        <ul class="list-inline mb-0">
                            <!-- Address -->
                            <li class="list-item mb-3">
                                <a href="#"> <i
                                        class="fas fa-fw fa-map-marker-alt me-2 mt-1"></i>{{ $address }}</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Box item -->
                <div class="col-lg-4 mt-lg-0">
                    <div class="card card-body shadow py-5 text-center h-100 border-0">
                        <!-- Title -->
                        <h5 class="mb-3">Call us</h5>
                        <ul class="list-inline mb-0">
                            <!-- Phone number -->
                            <li class="list-item mb-3 h6 fw-light">
                                <a href="tel:+977-{{ $contact }}"> <i
                                        class="fas fa-fw fa-phone-alt me-2"></i>{{ $contact }} </a>
                            </li>

                        </ul>
                    </div>
                </div>

                <!-- Box item -->
                <div class="col-lg-4 mt-lg-0">
                    <div class="card card-body shadow py-5 text-center h-100 border-0">
                        <!-- Title -->
                        <h5 class="mb-3">Email Us</h5>
                        <ul class="list-inline mb-0">

                            <!-- Email id -->
                            <li class="list-item mb-0 h6 fw-light">
                                <a href="mailto:{{ $email }}"> <i
                                        class="far fa-fw fa-envelope me-2"></i>{{ $email }} </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container my-5">
            <div class="row g-4 g-lg-0 align-items-center">

                <!-- Contact form START -->
                <div class="col-md-12">
                    <!-- Title -->
                    <h2 class="mt-4 mt-md-0">Let's talk</h2>
                    <p>Reaching our Office & Find Our Location</p>

                    <form id="storeContact">
                        <!-- Name -->
                        <div class="row">
                            <div class="col-md-4">
                                @csrf
                                <div class="mb-4 bg-light-input">
                                    <label for="yourName" class="form-label">Your name *</label>
                                    <input type="text" class="form-control form-control-lg" name="name" id="name"
                                        placeholder="" value="{{ old('name') }}">
                                    <span class="text-danger error-message" id="name-validation"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-4 bg-light-input">
                                    <label for="emailInput" class="form-label">Email address *</label>
                                    <input type="email" class="form-control form-control-lg" name="email" id="email"
                                        placeholder="" value="{{ old('email') }}">
                                    <span class="text-danger error-message" id="email-validation"></span>

                                </div>
                            </div>
                            {{-- <div class="col-md-4">
                                <div class="mb-4 bg-light-input">
                                    <label for="emailInput" class="form-label">Subject *</label>
                                    <input type="text" class="form-control form-control-lg" name="subject" id="subject"
                                        placeholder="" value="{{ old('subject') }}">
                                    <span class="text-danger error-message" id="subject-validation"></span>

                                </div>
                            </div> --}}
                        </div>

                        <!-- Message -->
                        <div class="mb-4 bg-light-input">
                            <label for="textareaBox" class="form-label">Message *</label>
                            <textarea class="form-control" name="message" id="message" value="{{ old('message') }}" rows="4"></textarea>
                            <span class="text-danger error-message" id="message-validation"></span>

                        </div>
                        <!-- Button -->
                        <div class="d-grid">
                            <button class="btn btn-lg btn-primary mb-0" id="sendMessage" type="submit">Send
                                Message</button>
                        </div>
                    </form>
                </div>
                <!-- Contact form END -->
            </div>
        </div>
    </section>

    <section class="pt-0 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4425.791097184029!2d85.31862677628256!3d27.677986976199414!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19799ecafa79%3A0xbd693a1616123b1f!2sRealm%20Infotech%20Pvt.%20Ltd.!5e1!3m2!1sen!2snp!4v1743856965231!5m2!1sen!2snp"
                        width="1300" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>

    <script>
        $(document).ready(function() {
            $("#storeContact").submit(function(event) {
                event.preventDefault();
                $("#sendMessage").prop("disabled", true);
                let message = $("#message").val();
                console.log(message);
                let formdata = new FormData(this);
                $.ajax({
                    type: "post",
                    url: "{{ route('store.contact-us') }}",
                    data: formdata,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        console.log(response);
                        if (response.status === true) {
                            $("#storeContact").trigger("reset");
                            alert("Message has been sent");
                        } else {
                            alert("Something went wrong!");
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
            })
        })
    </script>
@endsection
