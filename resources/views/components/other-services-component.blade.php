<section class="section-3 py-5">
    <div class="container">
        <div class="divider mb-3"></div>
        <h2 class="title-color mb-4 h1">{{ $otherServicetitle ?? 'Services' }}</h2>
        <div class="cards">
            <div class="row">
                @foreach ($otherServices as $service)
                    <div class="col-md-4 mb-4">
                        <div class="card border-0" style="height: 480px;">
                            @if (!empty($service->image))
                                <img src="{{ asset('uploads/' . $service->image) }}" class="card-img-top" alt="">
                            @else
                                <img src="{{ asset('assets/images/digital-marketing.jpg') }}" class="card-img-top"
                                    alt="">
                            @endif

                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title mt-2">
                                    <a href="{{ route('service-detail', $service->id) }}">
                                        {{ $service->name }}
                                    </a>
                                </h5>
                                <p class="card-text flex-grow-1 overflow-auto">
                                    {{ $service->short_desc }}
                                </p>
                                <a href="{{ route('service-detail', $service->id) }}" class="btn btn-primary mt-auto">
                                    Details <i class="fa-solid fa-angle-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@push('styles')
    <style>
        .section-3 {
            background: none !important;

        }
    </style>
@endpush
