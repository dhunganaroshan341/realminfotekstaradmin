@php
    $activeMenuServiceItems = getActiveStatusServices();
@endphp

<header>
    {{-- Top Bar --}}
    <div class="header-top-bar py-2 bg-realm-blue text-white">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-md-6 text-md-start text-center mb-2 mb-md-0">
                    <a href="mailto:{{ $email }}"
                        class=" email-header text-realm-yellow text-decoration-none me-3">
                        <i class="bi bi-envelope-fill me-1"></i>{{ $email }}
                    </a>
                </div>
                <div class="col-md-6 text-md-end text-center">
                    <a href="tel:{{ $contact }}" class="phone-header text-realm-yellow text-decoration-none">
                        <i class="bi bi-telephone-fill me-1"></i><span class=""> +977 {{ $contact }}</span>
                    </a>
                    <a href="tel:{{ $contact_2 }}" class="phone-header text-realm-yellow text-decoration-none">

                        | <span class="">{{ $contact_2 }}</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    {{-- Main Navbar --}}
    {{-- @include('frontend.layout.working-navbar') --}}
    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ route('first.index') }}">
                @if ($logo)
                    <img src="{{ asset('uploads/' . $logo) }}" alt="Logo" class="img-fluid">
                @else
                    <img src="{{ asset('defaultImage/defaultlogo.png') }}" alt="Default Logo" class="img-fluid">
                @endif
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarmain"
                aria-controls="navbarmain" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                <i class="fas fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarmain">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item {{ request()->routeIs('first.index') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('first.index') }}">Home</a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('about-us') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('about-us') }}">About</a>
                    </li>
                    <li class="nav-item dropdown {{ request()->is('service*') ? 'active' : '' }}">
                        <a class="nav-link dropdown-toggle" href="#" id="servicesDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Services
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="servicesDropdown">
                            <li><a href="{{ route('service') }}" class="dropdown-item">All Services</a></li>
                            @foreach ($activeMenuServiceItems as $service)
                                <li>
                                    <a class="dropdown-item {{ request()->is('service/detail/' . $service->id) ? 'active' : '' }}"
                                        href="{{ route('service-detail', $service->id) }}">
                                        {{ $service->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="nav-item {{ request()->is('portfolio*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('gallery') }}">Portfolio</a>
                    </li>
                    <li class="nav-item {{ request()->is('blog*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('blog') }}">Blog</a>
                    </li>
                    <li class="nav-item {{ request()->is('contact-us*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('contact-us') }}">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

</header>

{{-- If you want breadcrumb, you can place it like this after the header --}}
{{--
<div class="container mt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('first.index') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Current Page</li>
        </ol>
    </nav>
</div>
--}}
