<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ route('first.index') }}">
        @if ($logo)
            <img src="{{ asset('storage/' . $logo) }}" alt="Logo" class="img-fluid" style="max-height: 80px;">
        @else
            <img src="{{ asset('defaultImage/defaultlogo.png') }}" alt="Default Logo" class="img-fluid"
                style="max-height: 80px;">
        @endif
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ms-auto">

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('first.index') ? 'active' : '' }}"
                    href="{{ route('first.index') }}">Home</a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('about-us') ? 'active' : '' }}"
                    href="{{ route('about-us') }}">About</a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->is('gallery*') ? 'active' : '' }}"
                    href="{{ route('gallery') }}">Gallery</a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->is('blog*') ? 'active' : '' }}" href="{{ route('blog') }}">Blog</a>
            </li>

            <li class="nav-item dropdown  {{ request()->is('service*') ? 'active' : '' }}">
                <a class="nav-link dropdown-toggle" href="#" id="servicesDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Services
                </a>
                <ul class="dropdown-menu" aria-labelledby="servicesDropdown">
                    @foreach ($services as $service)
                        <li><a class="dropdown-item"
                                href="{{ route('service-detail', $service->id) }}">{{ $service->name }}</a></li>
                    @endforeach
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->is('contact-us*') ? 'active' : '' }}"
                    href="{{ route('contact-us') }}">Contact</a>
            </li>

        </ul>
    </div>
</nav>
@push('styles')
    <style>
        /* Show dropdown on hover */
        .navbar-nav .dropdown:hover>.dropdown-menu {
            display: block;
            margin-top: 0;
            /* optional: fix slight jump */
        }
    </style>
@endpush

@push('styles')
    <style>
        @media (min-width: 992px) {
            .navbar .dropdown:hover .dropdown-menu {
                display: block;
            }
        }

        .nav-link.active {
            font-weight: bold;
            color: #0d6efd !important;
        }



        .navbar-brand img {
            max-height: 60px;
            height: auto;
        }

        .header-top-bar a {
            font-size: 14px;
        }

        #servicesDropdown:hover .dropdown-menu {
            display: block;
        }
    </style>
@endpush
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (window.innerWidth > 992) {
                const dropdowns = document.querySelectorAll('.navbar .dropdown');

                dropdowns.forEach(dropdown => {
                    dropdown.addEventListener('mouseenter', function() {
                        const menu = dropdown.querySelector('.dropdown-menu');
                        dropdown.classList.add('show');
                        menu.classList.add('show');
                    });

                    dropdown.addEventListener('mouseleave', function() {
                        const menu = dropdown.querySelector('.dropdown-menu');
                        dropdown.classList.remove('show');
                        menu.classList.remove('show');
                    });
                });
            }
        });
    </script>
@endpush
