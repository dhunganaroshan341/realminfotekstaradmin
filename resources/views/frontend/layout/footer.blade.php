<footer class="footer section bg-realm-blue">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 mr-auto col-sm-6 text-center text-lg-start">
                <div class="widget mb-5 mb-lg-0">
                    <div class="logo mb-4">
                        {{-- @if ($logo)
                            <img src="{{ asset('uploads/' . $logo) }}" alt="Logo" class="img-fluid logo-img"
                                style="filter: drop-shadow(-2px 3px 1px #a1842c)">
                        @else --}}
                        <img src="{{ asset('defaultImage/logo_white_gold.png') }}" alt="Default Logo" class="img-fluid"
                            style="filter: drop-shadow(-2px 3px 1px #a1842c)">
                        {{-- @endif --}}
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 text-center text-lg-start">
                <div class="widget mb-5 mb-lg-0">
                    <h4 class="text-capitalize mb-3 text-white">Services</h4>
                    <div class="divider mb-4 mx-auto mx-lg-0"></div>

                    <ul class="list-unstyled footer-menu lh-35">
                        @foreach ($services as $service)
                            <li>
                                <a class="footer-service-detail d-inline-block"
                                    href="{{ route('service-detail', $service->id) }}">
                                    {{ $service->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 text-center text-lg-start">
                <div class="widget mb-5 mb-lg-0">
                    <h4 class="text-capitalize mb-3 text-white">Quick Links</h4>
                    <div class="divider mb-4 mx-auto mx-lg-0"></div>

                    <ul class="list-unstyled footer-menu lh-35">
                        <li><a href="{{ route('about-us') }}">About Us</a></li>
                        <li><a href="{{ route('contact-us') }}">Contact Us</a></li>
                        <li><a href="{{ route('blog') }}">Blog & news</a></li>
                        <li><a href="{{ route('gallery') }}">Portfolio</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 text-center text-lg-start">
                <div class="widget widget-contact mb-5 mb-lg-0">
                    <h4 class="text-capitalize mb-3 text-white">Get in Touch</h4>
                    <div class="divider mb-4 mx-auto mx-lg-0"></div>

                    <div class="footer-contact-block mb-4">
                        <h4 class="mt-2"><i class="fa-solid fa-envelope"></i> <a
                                href="mailto:{{ $email }}">{{ $email }}</a></h4>
                        <h4 class="mt-2"><i class="fa-solid fa-phone-square" aria-hidden="true"></i> <a
                                href="tel:{{ $contact }}">{{ $contact }}</a>,<a
                                href="tel:{{ $contact }}">{{ $contact_2 }}</a></h4>
                    </div>

                    <div class="footer-contact-block">
                        <ul class="list-inline footer-socials mt-4">
                            <li class="list-inline-item">
                                <a href="{{ $facebook }}"><i class="fa-brands fa-facebook-f"></i> </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="{{ $twitter }}"><i class="fa-brands fa-twitter"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="{{ $instagram }}"><i class="fa-brands fa-instagram"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-btm py-4 mt-5">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-12">
                    <div class="copyright text-center text-white">
                        Copyright © {{ date('Y') }} {{ $title }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

@push('styles')
    <style>
        .footer-service-detail {
            color: #fff;
            text-decoration: none;
        }

        .footer-service-detail:hover {
            color: #f0f0f0;
            text-decoration: underline;
        }

        .logo-img {
            max-width: 100%;
            height: auto;
            /* box-shadow: 2px 2px 2px 2px white; */
            filter: drop-shadow(-2px 3px 1px #a1842c) !important;
        }
    </style>
@endpush
