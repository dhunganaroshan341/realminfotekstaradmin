<section class="section-3 py-5">
    <div class="container">
        <div class="divider mb-3"></div>
        <h2 class="title-color mb-4 h1">Services</h2>
        <div class="cards">
            <div class="row service-wrapper">
                @if (isset($services) && count($services) > 0)
                    @foreach ($services as $service)
                        <div class="col-md-4 mb-4 service-img-parent">
                            <div class="card border-0">
                                @if (!empty($service->image))
                                    <img src="{{ asset('uploads/' . $service->image) }}" class="card-img-top"
                                        alt="">
                                @else
                                    <img src="{{ asset('assets/images/digital-marketing.jpg') }}" class="card-img-top"
                                        alt="">
                                @endif

                                <div class="card-body p-3">
                                    <h1 class="card-title mt-2">
                                        <a href="{{ route('service-detail', $service->id) }}">{{ $service->name }}</a>
                                    </h1>
                                    <div class="content pt-2">
                                        <p class="card-text">{{ $service->short_desc }}</p>
                                    </div>
                                    <a href="{{ route('service-detail', $service->id) }}"
                                        class="btn btn-primary mt-4 text-realm-blue">
                                        Details <i class="fa-solid fa-angle-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-12 text-center">
                        <div class="alert alert-info">
                            <h4>No services available at the moment.</h4>
                            <p>Please check back later or contact us for more information.</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <!-- Mobile-only View More Button -->
        <div class="text-center mt-4 d-block d-md-none">
            <button class="btn btn-outline-primary" id="viewMoreBtn" style="display:none;">
                <i class="fas fa-eye"></i> View More
            </button>
        </div>

        <!-- All Services Link -->
        <div class="text-center mt-3">
            <a href="{{ route('service') }}" class="text-realm-blue p-2"> <i class="fas fa-eye"></i> All Services</a>
        </div>
    </div>
</section>
@push('scripts')
    <script>
        $(document).ready(function() {
            let $services = $('.service-wrapper .service-img-parent');
            let itemsToShow = 3;

            // Only on mobile
            if ($(window).width() <= 768 && $services.length > itemsToShow) {
                $services.slice(itemsToShow).hide(); // hide after 4
                $('#viewMoreBtn').show(); // show "View More" button

                $('#viewMoreBtn').on('click', function() {
                    $services.slideDown(); // animate reveal
                    $(this).hide(); // hide "View More"
                });
            }
        });
    </script>
@endpush
