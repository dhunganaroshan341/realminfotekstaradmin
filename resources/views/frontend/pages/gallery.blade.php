    @extends('frontend.layout.main')





    @section('content')
        <button id="galleryToggleBtn" class="gallery-btn btn d-md-none position-fixed end-0"
            style="top: 10px; z-index: 1100; border: none; background: transparent;" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#mobileSidebar" aria-controls="mobileSidebar">
            <i class="fas fa-arrow-left text-realm-yellow" style="font-size: 1.5em;"></i>

        </button>




        <section class="hero-small">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active"
                        style="background-image: url({{ isset($pageBanner->image) ? asset('uploads/' . $pageBanner->image) : asset('assets/images/banner1.jpg') }}) ;">
                        <div class="hero-small-background-overlay"></div>
                        <div class="container  h-100">
                            <div class="row align-items-center d-flex h-100">
                                <div class="col-md-12">

                                    <div class="block text-center">
                                        <h1 class="mb-3 mt-3 text-center">{{ $pageBanner->title ?? 'Portfolio' }}</h1>
                                        <p>{{ $pageBanner->description ?? 'Reliable tech. Real results.' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="container-fluid py-4">






            <!-- Clean Offcanvas Sidebar -->
            <div class="offcanvas offcanvas-start d-md-none" tabindex="-1" id="mobileSidebar" data-bs-backdrop="false"
                data-bs-scroll="true" data-bs-keyboard="false" aria-labelledby="mobileSidebarLabel">

                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="mobileSidebarLabel">Albums</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <div class="list-group">
                        <a class="text-realm-yellow list-group-item list-group-item-action" href="{{ route('gallery') }}">
                            <img class="realm-logo" src="{{ asset('assets/images/logo.png') }}" alt="">
                            RoshanDhungana Albums
                        </a>
                        <hr>
                        @foreach ($clientsWithAlbums as $clientId => $clientAlbums)
                            @foreach ($clientAlbums->items() as $album)
                                @php
                                    $client = optional($clientAlbums->first())->client;
                                    $clientName = $client->name ?? 'Unknown Client';
                                    // dd($client->image);
                                    $clientImage = $client->image ?? null;
                                    // pre client image add uploads/
                                    $clientImage = 'uploads/' . $clientImage;
                                @endphp
                                <button type="button"
                                    class="list-group-item list-group-item-action d-flex align-items-center gap-2"
                                    onclick="showClientAlbums({{ $clientId }})">
                                    @if ($clientImage)
                                        <img src="{{ asset($clientImage) }}" alt="Client Image" class="client-thumb " />
                                    @else
                                        <i
                                            class="fas fa-user client-thumb text-secondary d-flex align-items-center justify-content-center  bg-light"></i>
                                    @endif
                                    <span>{{ $clientName }}</span>
                                </button>
                            @endforeach
                            {{ $clientAlbums->links() }}
                    </div>
                </div>
            </div>


            <div class="row">
                <!-- Sidebar for Desktop -->
                <aside class="col-md-3 d-none d-md-block border-end pe-3"
                    style="height: calc(100vh - 4rem); overflow-y: auto;">
                    <h4 class="text-realm-blue mb-3">Albums</h4>
                    <div class="list-group">
                        <a class="text-realm-yellow list-group-item list-group-item-action" href="{{ route('gallery') }}">
                            <img class  = "realm-logo" src="{{ asset('assets/images/logo.png') }}" alt="">
                            RoshanDhungana Albums
                        </a>
                        <hr>
                        @foreach ($clientsWithAlbums as $clientId => $clientAlbums)
                            @php
                                $client = optional($clientAlbums->first())->client;
                                $clientName = $client->name ?? 'Unknown Client';
                                $clientImage = $client->image ?? null;
                                $clientImage = 'uploads/' . $clientImage;
                            @endphp
                            <button class="list-group-item list-group-item-action d-flex align-items-center gap-2"
                                onclick="showClientAlbums({{ $clientId }})">
                                @if ($clientImage)
                                    <img src="{{ asset($clientImage) }}" alt="Client Image" class="client-thumb " />
                                @else
                                    <i
                                        class="fas fa-user client-thumb text-secondary d-flex align-items-center justify-content-center  bg-light"></i>
                                @endif
                                <span>{{ $clientName }}</span>
                            </button>
                        @endforeach
                    </div>
                </aside>

                <!-- Main Content -->
                <main class="col-md-9" id="mainContent">
                    <div class="divider mb-3"></div>
                    <h2 class="title-color mb-4 h1">RoshanDhungana Albums</h2>
                    <div class="row g-4">
                        @foreach ($albumsWithNoClients->items() as $album)
                            <div class="col-sm-6 col-lg-3">
                                <div class="card h-100 shadow-sm"
                                    onclick="loadAlbumDetails({{ $album->id }}, '{{ $album->title }}')">
                                    @php
                                        $imageMedia = $album->galleryMedia->first(function ($media) {
                                            return !Str::endsWith(strtolower($media->media_path), '.pdf');
                                        });
                                    @endphp

                                    @if ($imageMedia)
                                        <img src="/{{ $imageMedia->media_path }}" class="card-img-top" alt="Album image">
                                    @else
                                        <div class="card-img-top bg-secondary text-white d-flex align-items-center justify-content-center"
                                            style="height: 160px;">
                                            No Image
                                        </div>
                                    @endif

                                    <div class="card-body">
                                        <h5 class="card-title">{{ $album->title }}</h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{ $albumsWithNoClients->links() }}
                </main>

                <!-- Album Type Bar -->
                <x-album-type-bar />
            </div>
        </div>
    @endsection

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>

        <script>
            $('.modal-backdrop').remove();

            function showClientAlbums(id) {
                const mainContent = $('#mainContent');
                mainContent.empty();

                $.ajax({
                    url: `/gallery-album/client/${id}`,
                    method: "GET",
                    success: function(response) {
                        if (!response.success) return alert('No albums found for this client.');

                        const clientAlbums = response.message;
                        const portfolioUrl = "{{ url('/portfolio') }}";
                        let content = `
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h2 class="title-color mb-0">
                                ${clientAlbums[0]?.client?.name || 'Unknown Client'} Albums
                            </h2>
                            <button onclick="window.location.href='${portfolioUrl}'" class="btn btn-secondary">← Back</button>
                        </div>
                        <div class="divider mb-3"></div>
                        <div class="row g-4">
                    `;

                        clientAlbums.forEach(album => {
                            const galleryMedia = album.gallery_media || [];
                            const hasMedia = galleryMedia.length > 0;

                            const safeTitle = album.title.replace(/"/g, '&quot;'); // escape " for safety

                            if (album.type === "image") {
                                const imgTag = hasMedia ?
                                    `<img src="/${galleryMedia[0].media_path}" class="card-img-top" />` :
                                    `<div class="card-img-top bg-light text-muted d-flex align-items-center justify-content-center" style="height: 180px;">No Media Available</div>`;

                                content += `
                                <div class="col-sm-6 col-md-4">
                                    <div class="card h-100 shadow-sm" onclick="loadAlbumDetails(${album.id}, &quot;${safeTitle}&quot;)">
                                        ${imgTag}
                                        <div class="card-body">
                                            <h5 class="card-title">${album.title}</h5>
                                        </div>
                                    </div>
                                </div>
                            `;
                            }

                            // (continue same for video, pdf, website — you can repeat similar safety)
                        });

                        content += `</div>`;
                        mainContent.html(content);
                    },
                    error: function() {
                        alert('Failed to load client albums.');
                    }
                });
            }

            function loadAlbumDetails(albumId, albumTitle) {
                $.ajax({
                    url: `/gallery-album/${albumId}`,
                    method: "GET",
                    success: function(response) {
                        if (!response.success) return alert('Album not found.');

                        const album = response.message;
                        const galleryMedia = album.gallery_media || [];
                        const portfolioUrl2 = "{{ url('/portfolio') }}";
                        let content = `
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h2 class="title-color mb-4 h1">${album.title}</h2>
                            <button onclick="window.location.href='${portfolioUrl2}'" class="btn btn-secondary">← Back</button>
                        </div>
                        <div class="divider mb-3"></div>
                        <div class="row g-4">
                    `;

                        if (album.type === "image" && galleryMedia.length > 0) {
                            galleryMedia.forEach(media => {
                                content += `
                                <div class="col-sm-6 col-md-4">
                                    <a href="/${media.media_path}" data-fancybox="${album.title}">
                                        <img src="/${media.media_path}" class="img-fluid rounded" />
                                    </a>
                                </div>
                            `;
                            });
                        }

                        content += `</div>`;
                        $('#mainContent').html(content);

                        Fancybox.bind("[data-fancybox]", {
                            Carousel: {
                                infinite: true
                            }
                        });
                    },
                    error: function() {
                        alert('Failed to load album details.');
                    }
                });
            }

            document.addEventListener('DOMContentLoaded', function() {
                const btn = document.getElementById('galleryToggleBtn');
                btn.style.display = 'none';

                window.addEventListener('scroll', function() {
                    const scrollY = window.scrollY;
                    const windowHeight = window.innerHeight;
                    const docHeight = document.documentElement.scrollHeight;

                    const scrollPercent = (scrollY + windowHeight) / docHeight * 100;

                    if (scrollY < 50 || scrollPercent > 80) {
                        btn.style.display = 'none';
                    } else {
                        btn.style.display = 'block';
                        btn.style.position = scrollY >= 30 && scrollY <= 80 ? 'sticky' : 'fixed';
                        btn.style.top = scrollY >= 30 && scrollY <= 80 ? '0' : '80px';
                    }
                });
            });
        </script>
    @endpush

    @push('styles')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
        <style>
            .client-thumb,
            .realm-logo {
                max-width: 120px;
                height: 40px !important;
                object-fit: contain;
            }

            .offcanvas {
                box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
                border-right: 1px solid #ddd;
            }

            .offcanvas-body .list-group-item {
                border: none;
                padding: 12px 16px;
                color: var(--realm-yellow);
                background: #ffffff91;
            }

            .gallery-btn {
                z-index: 1100;
                border-radius: 0 12px 12px 0;
                border-color: var(--realm-blue);
                color: var(--realm-yellow);
                overflow: hidden;
                width: 30px;
            }

            .card-body {
                min-height: 0 !important;
            }

            #mobileSidebar {
                background: #292771c9;
            }
        </style>
    @endpush
