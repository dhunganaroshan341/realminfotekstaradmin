<!-- footer starts -->
<footer class="pt-10"
    style="background-image:url({{ asset('template/yatri_world/main-file/images/bg/bg3.jpg') }}); background-size: cover; background-position: center;">
    <div class="footer-upper pb-5">
        <div class="container">
            <div class="row">
                <!-- Left: About Section -->
                <div class="col-lg-4 mb-4">
                    <div class="footer-about text-center text-lg-start">
                        <img src="{{ asset('defaultImage/logo_white_gold.png') }}" alt="Realm Infotek Logo"
                            class="img-fluid mb-3" style="max-width: 200px; filter: drop-shadow(-2px 3px 1px #a1842c);">
                        <p class="mt-3 mb-3 text-white">
                            Realm Infotek is a full-service IT company offering expert solutions in Web Development,
                            SEO, Digital Marketing, and Cloud Hosting — committed to innovation and global impact from
                            Nepal to the USA.
                        </p>
                        <div class="social-links">
                            <ul class="list-inline">
                                <li class="list-inline-item"><a href="{{ $facebook }}"><i
                                            class="fab fa-facebook text-white"></i></a></li>
                                <li class="list-inline-item"><a href="{{ $twitter }}"><i
                                            class="fab fa-twitter text-white"></i></a></li>
                                <li class="list-inline-item"><a href="{{ $instagram }}"><i
                                            class="fab fa-instagram text-white"></i></a></li>
                                <li class="list-inline-item"><a href="{{ $linkedin }}"><i
                                            class="fab fa-linkedin text-white"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Right: Quick Links -->
                <div class="col-lg-8 mb-4">
                    <div class="footer-links text-center">
                        <ul class="list list-inline">
                            <li class="list-inline-item mx-2"><a class="text-white" href="{{ route('about-us') }}">About
                                    Us</a></li>
                            <li class="list-inline-item mx-2"><a class="text-white"
                                    href="{{ route('contact-us') }}">Contact Us</a></li>
                            <li class="list-inline-item mx-2"><a class="text-white" href="{{ route('blog') }}">Blog &
                                    News</a></li>
                            <li class="list-inline-item mx-2"><a class="text-white"
                                    href="{{ route('gallery') }}">Portfolio</a></li>
                        </ul>
                    </div>

                    <!-- Info Boxes (Nepal Office, US Office, Support) -->
                    <div
                        class="footer-listing-main d-lg-flex align-items-start justify-content-between mt-4 text-center text-lg-start">

                        <!-- Nepal Office -->
                        <div class="footer-listing text-white mb-4 mb-lg-0">
                            <i class="fa fa-map-marker-alt white mb-1"></i>
                            <p class="mb-0">New Baneshwor, Kathmandu, Nepal</p>
                            <p class="mb-0">
                                <a href="tel:+97715529237" class="text-white">01-5529237</a>,
                                <a href="tel:+9779851056649" class="text-white">9851056649</a>
                            </p>
                            <p class="mb-0">
                                <a href="mailto:info@realminfotek.com" class="text-white">info@realminfotek.com</a>
                            </p>
                        </div>

                        <!-- US Office -->
                        <div class="footer-listing text-white mb-4 mb-lg-0">
                            <i class="fa fa-map-marker-alt white mb-1"></i>
                            <p class="mb-0">23rd Ave, Flushing, NY 11354, USA</p>
                            <p class="mb-0">
                                <a href="tel:+13478909000" class="text-white">+1 347 890 9000</a>
                            </p>
                            <p class="mb-0">
                                <a href="mailto:us.office@realminfotek.com"
                                    class="text-white">us.office@realminfotek.com</a>
                            </p>
                        </div>

                        <!-- Support Box -->
                        <div class="footer-listing text-white">
                            <i class="fa fa-headphones white mb-1"></i>
                            <p class="mb-0">
                                <a href="mailto:support@realminfotek.com"
                                    class="text-white">support@realminfotek.com</a>
                            </p>
                            <p class="mb-0">
                                <a href="mailto:info@realminfotek.com" class="text-white">info@realminfotek.com</a>
                            </p>
                            <p class="mb-0">
                                <a href="mailto:info@realminfotek.com" class="text-white">realminfotek@gmail.com</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Copyright -->
    <div class="footer-copyright pt-3 pb-3 bg-dark">
        <div class="container">
            <div class="text-center text-white">
                <p class="m-0">© {{ date('Y') }} Realm Infotek. All rights reserved.</p>
            </div>
        </div>
    </div>
    <div class="dot-overlay"></div>
</footer>
