<!DOCTYPE html>
<html lang="en">

<header>
    @include('Admin.layout.header')
    <style>
        #userImage img {
            object-fit: contain !important;
        }
    </style>
    @stack('styles')

</header>

<body class="with-welcome-text">
    <div class="container-scroller">

        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
                <div class="me-3">
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button"
                        data-bs-toggle="minimize">
                        <span class="icon-menu"></span>
                    </button>
                </div>
                <div>
                    <a class="navbar-brand brand-logo" href="{{ url('/') }}">
                        <img src="{{ $logo ?? asset('assets/images/logo.jpeg') }}" alt="logo" />
                    </a>
                    <a class="navbar-brand brand-logo-mini" href="{{ url('/') }}">
                        <img src="{{ asset('admin/images/logo.png') }}" alt="logo" />
                    </a>
                </div>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.dashboard') }}">
                            <i class="mdi mdi-view-dashboard menu-icon"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.user') }}">
                            <i class="mdi mdi-account menu-icon"></i>
                            <span class="menu-title">Users</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.setting') }}">
                            <i class="mdi mdi-cog  menu-icon"></i>
                            <span class="menu-title">General Settings</span>
                        </a>
                    </li>

                    {{-- <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.frontend') }}">
                            <i class="mdi mdi-apps menu-icon"></i>
                            <span class="menu-title">Home Page</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.siteData') }}">
                            <i class="mdi mdi-grid-large menu-icon"></i>
                            <span class="menu-title">Footer</span>
                        </a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.gallery-albums.index') }}">
                            <i class="mdi mdi-view-gallery menu-icon"></i>
                            <span class="menu-title"> Gallery</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('service.index') }}">
                            <i class="mdi mdi-face-agent menu-icon"></i>
                            <span class="menu-title">Services </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#bannerMenu" role="button"
                            aria-expanded="false" aria-controls="bannerMenu">
                            <i class="mdi mdi-folder menu-icon"></i>
                            <span class="menu-title"> Banners</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="bannerMenu">
                            <ul class="nav flex-column sub-menu list-unstyled ">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.homeslide') }}">
                                        <i class="mdi mdi-page-layout-header-footer menu-icon"></i> Home Slider
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.page-banner.index') }}">
                                        <i class="mdi mdi-page-layout-header menu-icon"></i> BreadCrumb
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.call-to-action.index') }}">
                                        <i class="mdi mdi-phone menu-icon"></i> CTA Banner
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.testimonial') }}">
                            <i class="mdi mdi-animation menu-icon"></i>
                            <span class="menu-title">Testimonial</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('client.index') }}">
                            <i class="mdi mdi-account-group-outline menu-icon"></i>
                            <span class="menu-title">Client </span>
                        </a>
                    </li>





                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('notice.index') }}">
                            <i class="mdi mdi-bullhorn menu-icon"></i>
                            <span class="menu-title">Notice </span>
                        </a>
                    </li>
                    <!-- Blog Section with Collapse -->
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#blogSubmenu" role="button"
                            aria-expanded="false" aria-controls="blogSubmenu">
                            <i class="mdi mdi-post-outline menu-icon"></i>
                            <span class="menu-title">Blogs</span>
                            <i class="mdi mdi-chevron-down float-end"></i>
                        </a>
                        <ul class="collapse ps-3" id="blogSubmenu">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.category') }}">
                                    <i class="mdi mdi-grid-large menu-icon"></i>
                                    <span class="menu-title">Category</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.post') }}">
                                    <i class="mdi mdi-newspaper menu-icon"></i>
                                    <span class="menu-title">Post</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Album & Media with collapse toggle -->





                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#messageMenu" role="button"
                            aria-expanded="false" aria-controls="messageMenu">
                            <i class="mdi mdi-folder menu-icon"></i>
                            <span class="menu-title"> Messages</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="messageMenu">
                            <ul class="nav flex-column sub-menu list-unstyled ">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.contact') }}">
                                        <i class="mdi mdi-contacts menu-icon"></i>
                                        <span class="menu-title">Contact </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.service-query') }}">
                                        <i class="mdi mdi-contacts menu-icon"></i>
                                        <span class="menu-title"> Query </span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </li>




                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.logout') }}">
                            <i class="mdi mdi-logout  menu-icon"></i>
                            <span class="menu-title">Logout</span>
                        </a>
                    </li>



                </ul>
            </nav>
            <!-- partial -->
            <div class="main-panel">

                @yield('content')


                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    @include('Admin.layout.footer-script')
    @stack('scripts')

</body>

</html>
