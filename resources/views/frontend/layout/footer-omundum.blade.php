<!-- footer starts -->
<footer class="pt-10 footer"
    style="background-image:url({{ asset('images/banner-2.jpg') }}); background-size: cover; background-position: center;">
    <div class="footer-upper pb-5">
        <div class="container">
            <div class="row">
                <!-- Left: About & Newsletter -->
                <div class="col-lg-4 mb-4">
                    <div class="footer-about text-center text-lg-start">
                        <img src="{{ asset('defaultImage/realm-logo-white-back.png') }}" alt="Realm Infotek Logo"
                            style="max-width: 180px;">
                        <p class="mt-3 mb-3 text-white">
                            Realm Infotek is a forward-thinking IT company offering reliable solutions in web
                            development, digital marketing, SEO, and cloud hosting for clients in Nepal and abroad.
                        </p>

                        <form action="#" method="POST" class="newsletter-form mt-3">
                            @csrf
                            <div class="input-group">
                                <input type="email" name="email" class="form-control"
                                    placeholder="Subscribe to our newsletter" required>
                                <button class="btn btn-primary" type="submit">Subscribe</button>
                            </div>
                        </form>

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

                <!-- Right: Links + Info Boxes -->
                <div class="col-lg-8 mb-4">
                    <!-- Quick Links -->
                    <div class="footer-links text-center mb-3">
                        <ul class="list list-inline m-0">
                            <li class="list-inline-item mx-2"><a href="{{ route('about-us') }}" class="text-white">About
                                    Us</a></li>
                            <li class="list-inline-item mx-2"><a href="{{ route('gallery') }}"
                                    class="text-white">Portfolio</a></li>
                            <li class="list-inline-item mx-2"><a href="{{ route('blog') }}" class="text-white">Blog &
                                    News</a></li>
                            <li class="list-inline-item mx-2"><a href="{{ route('contact-us') }}"
                                    class="text-white">Contact</a></li>
                            <li class="list-inline-item mx-2"><a href="#" class="text-white">Terms &
                                    Conditions</a></li>
                        </ul>
                    </div>

                    <!-- 3-column Info -->
                    <div
                        class="footer-listing-main d-lg-flex align-items-start justify-content-between mt-4 text-center text-lg-start">
                        <!-- Nepal Office -->
                        <div class="footer-listing text-white mb-4 mb-lg-0">
                            <i class="fa fa-map-marker-alt white mb-1"></i>
                            <p class="mb-0">New Baneshwor, Kathmandu, Nepal</p>
                            <p class="mb-0"><a href="tel:+97715529237" class="text-white">01-5529237</a>, <a
                                    href="tel:+9779851056649" class="text-white">9851056649</a></p>
                            <p class="mb-0"><a href="mailto:info@realminfotek.com"
                                    class="text-white">info@realminfotek.com</a></p>
                        </div>

                        <!-- US Office -->
                        <div class="footer-listing text-white mb-4 mb-lg-0">
                            <i class="fa fa-map-marker-alt white mb-1"></i>
                            <p class="mb-0">23rd Ave, Flushing, NY 11354, USA</p>
                            <p class="mb-0"><a href="tel:+13478909000" class="text-white">+1 347 890 9000</a></p>
                            <p class="mb-0"><a href="mailto:us.office@realminfotek.com"
                                    class="text-white">us.office@realminfotek.com</a></p>
                        </div>

                        <!-- Support Box -->
                        <div class="footer-listing text-white">
                            <i class="fa fa-headphones white mb-1"></i>
                            <p class="mb-0"><a href="mailto:support@realminfotek.com"
                                    class="text-white">support@realminfotek.com</a></p>
                            <p class="mb-0"><a href="mailto:info@realminfotek.com"
                                    class="text-white">info@realminfotek.com</a></p>
                            <p class="mb-0"><a href="mailto:booking@realminfotek.com"
                                    class="text-white">booking@realminfotek.com</a></p>
                        </div>
                    </div>
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

    <div class="dot-overlay"></div>
</footer>
<!-- footer ends -->
