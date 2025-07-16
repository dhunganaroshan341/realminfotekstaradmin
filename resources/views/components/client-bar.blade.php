<div class="container my-5">
    <div class="divider mb-3 text-center"></div>
    <h2 class="title-color mb-4">Our Clients</h2>
    <section class="customer-logos slider">
        @if (!isset($clients) || $clients->isEmpty())
            <div class="text-center">
                <p class="text-muted">No clients available at the moment.</p>
            </div>
        @else
            @foreach ($clients as $client)
                @php
                    $hasAlbums = $client->albums && $client->albums->count() > 0;
                    $galleryUrl = $hasAlbums ? route('gallery-album.singleJsonclient', ['id' => $client->id]) : '#';
                @endphp
                <div class="slide text-center">
                    <a href="{{ $galleryUrl }}" @if (!$hasAlbums) onclick="return false;" @endif>
                        <img src="{{ $client->image ? 'uploads/' . $client->image : asset('assets/images/logo.png') }}"
                            alt="{{ $client->name }}" class="logo-img">
                    </a>
                    <div class="logo-name">{{ $client->name }}</div>
                </div>
            @endforeach
        @endif
    </section>
</div>

@push('styles')
    <style>
        h2 {
            text-align: center;
            padding: 20px;
            font-weight: bold;
        }

        .customer-logos .slide {
            height: 150px;
            display: flex !important;
            flex-direction: column;
            justify-content: flex-end;
            align-items: center;
            position: relative;
        }

        .customer-logos .logo-img {
            max-height: 80px;
            width: auto;
            object-fit: contain;
            margin-bottom: 8px;
            display: block;
        }

        .customer-logos .logo-name {
            font-size: 14px;
            color: #333;
            line-height: 1;
            margin: 0;
            white-space: nowrap;
        }

        .slick-slider {
            position: relative;
            display: block;
            box-sizing: border-box;
            user-select: none;
            touch-action: pan-y;
            -webkit-tap-highlight-color: transparent;
        }

        .slick-list {
            overflow: hidden;
            margin: 0;
            padding: 0;
        }

        .slick-track {
            display: flex;
            align-items: center;
        }
    </style>
@endpush

@push('scripts')
    <script>
        $(document).ready(function() {
            const $slider = $('.customer-logos');

            $slider.slick({
                slidesToShow: 5,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 1500,
                arrows: false,
                dots: false,
                pauseOnHover: false,
                draggable: true,
                responsive: [{
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 4
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 3
                        }
                    },
                    {
                        breakpoint: 520,
                        settings: {
                            slidesToShow: 2
                        }
                    }
                ]
            });

            $slider.on('swipe', function() {
                $slider.slick('slickPlay');
            });

            $slider.on('touchend mouseup', function() {
                setTimeout(() => {
                    $slider.slick('slickPlay');
                }, 100);
            });
        });
    </script>
@endpush
