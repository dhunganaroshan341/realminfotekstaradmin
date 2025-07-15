<!-- footer starts -->
<footer class="pt-5 footer">
    {{-- <footer class="pt-5 footer"style="background-image:url({{ asset('assets/images/banner2.jpg') }}); background-size: cover; background-position: center;"> --}}
    <div class="footer-upper pb-4">
        <div class="container">
            <!-- Top Row: Logo & Quick Links -->
            <div class="row align-items-center justify-content-between mb-4 text-center text-lg-start">
                <!-- Logo -->
                <div class="col-lg-4 mb-3 mb-lg-0">
                    <a class="text-decoration-none" href="{{ url('/') }}">
                        <img src="https://realm.bivekp23.sg-host.com/defaultImage/realm-logo-white.png"
                            alt="Realm Infotek Logo" style="max-width: 160px; height: auto;"></a>
                </div>

                <!-- Quick Links -->
                <div class="col-lg-8">
                    <ul class="list list-inline mb-0">
                        <li class="list-inline-item mx-2"><a href="{{ route('about-us') }}"
                                class="text-white footer-a">About
                                Us</a></li>
                        <li class="list-inline-item mx-2"><a href="{{ route('gallery') }}"
                                class="text-white footer-a">Portfolio</a></li>
                        <li class="list-inline-item mx-2"><a href="{{ route('blog') }}" class="text-white footer-a">Blog
                                &
                                News</a></li>
                        <li class="list-inline-item mx-2"><a href="{{ route('contact-us') }}"
                                class="text-white footer-a">Contact</a></li>
                        <li class="list-inline-item mx-2"><a href="#" class="text-white footer-a">Terms &
                                Conditions</a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Mid Row: About Text -->
            <div class="row mb-4">
                <div class="col text-center text-white">
                    <p class="mb-0">
                        Realm Infotek is a forward-thinking IT company specializing in Web Development, SEO, Digital
                        Marketing, and Domain Hosting. We deliver innovative, reliable solutions that help businesses
                        grow and succeed in the digital world. Our team is dedicated to providing quality service and
                        tailored strategies to meet each client’s unique needs.
                    </p>
                </div>
            </div>

            <!-- Bottom Row: Address / Support / Social -->
            <div class="row justify-content-between text-center text-lg-start">
                <!-- Nepal Office -->
                <div class="col-lg-4 mb-4">
                    <div class="footer-listing text-white">
                        <h5><i class="fas fa-map-marker-alt me-2"></i>Nepal Office</h5>
                        <p class="mb-1">New Baneshwor, Kathmandu, Nepal</p>
                        <p class="mb-1">
                            <i class="fas fa-phone-alt me-2"></i>
                            <a href="tel:+97715529237" class="text-white">01-5529237</a>,
                            <a href="tel:+9779851056649" class="text-white">9851056649</a>
                        </p>
                        <p class="mb-0">
                            <i class="fas fa-envelope me-2"></i>
                            <a href="mailto:info@realminfotek.com" class="text-white">info@realminfotek.com</a>
                        </p>
                    </div>
                </div>

                <!-- US Office -->
                <div class="col-lg-4 mb-4">
                    <div class="footer-listing text-white">
                        <h5><i class="fas fa-map-marker-alt me-2"></i>US Office</h5>
                        <p class="mb-1">23rd Ave, Flushing, NY 11354, USA</p>
                        <p class="mb-1">
                            <i class="fas fa-phone-alt me-2"></i>
                            <a href="tel:+13478909000" class="text-white">+1 347 890 9000</a>
                        </p>
                        <p class="mb-0">
                            <i class="fas fa-envelope me-2"></i>
                            <a href="mailto:us.office@realminfotek.com"
                                class="text-white">us.office@realminfotek.com</a>
                        </p>
                    </div>
                </div>

                <!-- Support + Social -->
                <div class="col-lg-4 mb-4">
                    <div class="footer-listing text-white">
                        <h5><i class="fas fa-headset me-2"></i>Support</h5>
                        {{-- <p class="mb-1">
                            <i class="fas fa-envelope me-2"></i>
                            <a href="mailto:support@realminfotek.com" class="text-white">support@realminfotek.com</a>
                        </p> --}}
                        <p class="mb-1">
                            <i class="fas fa-envelope me-2"></i>
                            <a href="mailto:info@realminfotek.com" class="text-white">info@realminfotek.com</a>
                        </p>

                        <div class="social-links mt-3">
                            <ul class="list-inline">
                                <li class="list-inline-item"><a href="#"><i
                                            class="fab fa-facebook text-white"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i
                                            class="fab fa-twitter text-white"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i
                                            class="fab fa-instagram text-white"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i
                                            class="fab fa-linkedin text-white"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Newsletter -->
            <div class="row mt-4 justify-content-center">
                <div class="col-12 col-md-4 text-center">
                    <form action="#" method="POST" class="newsletter-form w-100">
                        @csrf
                        <div class="input-group">
                            <input type="email" name="email" class="form-control"
                                placeholder="Subscribe to our newsletter" required>
                            <button class="btn btn-primary" type="submit">Subscribe</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <!-- Copyright -->
    <div class="footer-copyright pt-3 pb-3">
        <div class="container">
            <div class="text-center text-white">
                <p class="m-0">© {{ date('Y') }} Realm Infotek. All rights reserved.</p>
            </div>
        </div>
    </div>

    {{-- <div class="dot-overlay"></div> --}}
</footer>
<!-- footer ends -->
@push('styles')
    <style>
        .footer-listing {
            border: 1px dashed rgba(241, 241, 241, 0.3411764706);
            padding: 20px;
        }
    </style>
@endpush
