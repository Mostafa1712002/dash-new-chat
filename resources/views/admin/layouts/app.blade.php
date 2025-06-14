<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light"
    data-menu-styles="dark" data-toggled="close">

<head>

    <!-- Meta Data -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=no'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> @lang('trans.app_name') @yield('title')</title>
    <meta name="description"
        content="&quot;Join Chat and Decide to engage in meaningful conversations about Islam. Our platform encourages open discussions, providing clarity and answers to common misconceptions and questions." />

    <meta name="title" content="Chat and Decide: Explore Islam through Dialogue" />

    <meta property="og:title" content="Chat and Decide: Explore Islam through Dialogue" />

    <meta property="og:description"
        content="&quot;Join Chat and Decide to engage in meaningful conversations about Islam. Our platform encourages open discussions, providing clarity and answers to common misconceptions and questions." />

    <meta property="og:image" content="{{ asset('assets/images/brand-logos/logo.svg') }}" />


    <meta name="author" content="Chat And Decide" />
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/images/brand-logos/logo.svg') }}" type="image/x-icon">

    <!-- Choices JS -->
    <script src="{{ asset('assets/libs/choices.js/public/assets/scripts/choices.min.js') }}"></script>

    <!-- Main Theme Js -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <!-- Bootstrap Css -->
    @if (app()->getLocale() == 'ar')
        <link id="style" href="{{ asset('assets/libs/bootstrap/css/bootstrap.rtl.min.css') }}" rel="stylesheet">
    @else
        <link id="style" href="{{ asset('assets/libs/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    @endif

    <!-- Style Css -->
    <link href="{{ asset('assets/css/styles.min.css') }}" rel="stylesheet">

    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet">

    <!-- Node Waves Css -->
    <link href="{{ asset('assets/libs/node-waves/waves.min.css') }}" rel="stylesheet">

    <!-- Simplebar Css -->
    <link href="{{ asset('assets/libs/simplebar/simplebar.min.css') }}" rel="stylesheet">

    <!-- Color Picker Css -->
    <link rel="stylesheet" href="{{ asset('assets/libs/flatpickr/flatpickr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/libs/@simonwep/pickr/themes/nano.min.css') }}">

    <!-- Choices Css -->
    <link rel="stylesheet" href="{{ asset('assets/libs/choices.js/public/assets/styles/choices.min.css') }}">


    <link rel="stylesheet" href="{{ asset('assets/libs/jsvectormap/css/jsvectormap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/libs/swiper/swiper-bundle.min.css') }}">
    {{-- select2 cdn --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    
    @livewireStyles
    {{-- <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script> --}}
    @stack('css')
</head>

<body>


    <div class="page">
        <!-- app-header -->
        <header class="app-header">

            <!-- Start::main-header-container -->
            <div class="main-header-container container-fluid">

                <!-- Start::header-content-left -->
                <div class="header-content-left">

                    <!-- Start::header-element -->
                    <div class="header-element">
                        <div class="horizontal-logo">
                            <a href="index.html" class="header-logo">
                                <img src="{{ asset('assets/images/brand-logos/logo.svg') }}" alt="logo"
                                    class="desktop-logo">
                                <img src="{{ asset('assets/images/brand-logos/logo.svg') }}" alt="logo"
                                    class="toggle-logo">
                                <img src="{{ asset('assets/images/brand-logos/logo.svg') }}" alt="logo"
                                    class="desktop-dark">
                                <img src="{{ asset('assets/images/brand-logos/logo.svg') }}" alt="logo"
                                    class="toggle-dark">
                            </a>
                        </div>
                    </div>
                    <!-- End::header-element -->

                    <!-- Start::header-element -->
                    <div class="header-element">
                        <!-- Start::header-link -->
                        <a aria-label="Hide Sidebar"
                            class="sidemenu-toggle header-link animated-arrow hor-toggle horizontal-navtoggle"
                            data-bs-toggle="sidebar" href="javascript:void(0);"><span></span></a>
                        <!-- End::header-link -->
                    </div>
                    <!-- End::header-element -->

                </div>
                <!-- End::header-content-left -->

                <!-- Start::header-content-right -->
                <div class="header-content-right">


                    <!-- End::header-element -->

                    <!-- Start::header-element -->
                    <div class="header-element country-selector">
                        <!-- Start::header-link|dropdown-toggle -->
                        <a href="javascript:void(0);" class="header-link dropdown-toggle" data-bs-auto-close="outside"
                            data-bs-toggle="dropdown">
                            <span class='text-ellipsis d-flex align-items-center justify-content-center'>
                                {{ app()->getLocale() }}
                            </span>

                        </a>
                        <!-- End::header-link|dropdown-toggle -->
                        <ul class="main-header-dropdown dropdown-menu dropdown-menu-end" data-popper-placement="none">
                            @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <li>
                                    <a class="dropdown-item d-flex align-items-center" rel="alternate"
                                        hreflang="{{ $localeCode }}"
                                        href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                        <span class="avatar avatar-xs lh-1 me-2">
                                            {{ $localeCode }}
                                        </span>
                                        {{ $properties['native'] }}
                                    </a>
                                </li>
                            @endforeach



                        </ul>
                    </div>
                    <!-- End::header-element -->

                    <!-- Start::header-element -->
                    <div class="header-element header-theme-mode">
                        <!-- Start::header-link|layout-setting -->
                        <a href="javascript:void(0);" class="header-link layout-setting">

                            <span class="dark-layout">
                                <!-- Start::header-link-icon -->
                                <i class="bx bx-sun header-link-icon"></i>
                                <!-- End::header-link-icon -->
                            </span>
                        </a>
                        <!-- End::header-link|layout-setting -->
                    </div>
                    <!-- End::header-element -->

                    <!-- Start::header-element -->
                    <div class="header-element header-fullscreen">
                        <!-- Start::header-link -->
                        {{-- <a onclick="openFullscreen();" href="#" class="header-link">
                            <i class="bx bx-fullscreen full-screen-open header-link-icon"></i>
                            <i class="bx bx-exit-fullscreen full-screen-close header-link-icon d-none"></i>
                        </a> --}}
                        <!-- End::header-link -->
                    </div>
                    <!-- End::header-element -->
                    @php
                        $user = auth()->user();
                    @endphp
                    <!-- Start::header-element -->
                    <div class="header-element">
                        <!-- Start::header-link|dropdown-toggle -->
                        <a href="#" class="header-link dropdown-toggle" id="mainHeaderProfile"
                            data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                            <div class="d-flex align-items-center">
                                <div class="me-sm-2 me-0">
                                    <img src="{{ asset('assets/images/faces/9.jpg') }}" alt="img"
                                        width="32" height="32" class="rounded-circle">
                                </div>
                                <div class="d-sm-block d-none">
                                    <p class="fw-semibold mb-0 lh-1">{{ $user->first_name }}</p>
                                </div>
                            </div>
                        </a>
                        <!-- End::header-link|dropdown-toggle -->
                        <ul class="main-header-dropdown dropdown-menu pt-0 overflow-hidden header-profile-dropdown dropdown-menu-end"
                            aria-labelledby="mainHeaderProfile">
                            <li><a class="dropdown-item d-flex" href="profile.html"><i
                                        class="ti ti-user-circle fs-18 me-2 op-7"></i>Profile</a></li>
                            <li><a class="dropdown-item d-flex" href="sign-in-cover.html"><i
                                        class="ti ti-logout fs-18 me-2 op-7"></i>Log Out</a></li>
                        </ul>
                    </div>
                    <!-- End::header-element -->


                </div>
                <!-- End::header-content-right -->

            </div>
            <!-- End::main-header-container -->

        </header>
        @include('sweetalert::alert')
        <!-- /app-header -->
        <!-- Start::app-sidebar -->
        @include('admin.layouts.sidebar')
        <!-- End::app-sidebar -->

        <!-- Start::app-content -->
        <!-- Start::app-content -->
        <div class="main-content app-content">
            <div class="container-fluid">

                <!-- Page Header -->
                <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
                    {{-- <h1 class="page-title fw-semibold fs-18 mb-2">@yield('title')</h1> --}}
                    <div class="ms-md-1 ms-0">
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('dashboard') }}">@lang('trans.home')</a>
                                </li>
                                @yield('breadcrumb')
                            </ol>
                        </nav>
                    </div>
                </div>
                <!-- Page Header Close -->

                <!-- Start::row-1 -->
                <div class="row" id='app'>
                    {{ $slot }}
                </div>
                <!--End::row-1 -->

            </div>
        </div>


        <!-- End::app-content -->

        <footer class="footer mt-auto py-3 bg-white text-center">
            <div class="container">
                <span class="text-muted"> Copyright © <span id="year"></span> <a href="https://midade.com/"
                        target="__blank" class="text-dark fw-semibold">Midade</a>.
                    Designed && Developed by <span class="bi bi-heart-fill text-danger"></span>
                    </a> All
                    rights
                    reserved
                </span>
            </div>
        </footer>
    </div>


    <div class="scrollToTop">
        <span class="arrow"><i class="ri-arrow-up-s-fill fs-20"></i></span>
    </div>
    <div id="responsive-overlay"></div>

    <!-- Popper JS -->
    <script src="{{ asset('assets/libs/@popperjs/core/umd/popper.min.js') }}"></script>

    <!-- Bootstrap JS -->
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Defaultmenu JS -->
    <script src="{{ asset('assets/js/defaultmenu.min.js') }}"></script>

    <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('assets/libs/jsvectormap/js/jsvectormap.min.js') }}"></script>

    <!-- JSVector Maps MapsJS -->
    <script src="{{ asset('assets/libs/jsvectormap/maps/world-merc.js') }}"></script>
    <!-- Sticky JS -->
    <script src="{{ asset('assets/js/sticky.js') }}"></script>

    <!-- Simplebar JS -->
    {{-- <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/js/simplebar.js') }}"></script> --}}

    <!-- Color Picker JS -->
    <script src="{{ asset('assets/libs/@simonwep/pickr/pickr.es5.min.js') }}"></script>



    <!-- CRM-Dashboard -->
    {{-- <script src="{{ asset('') }}assets/js/crm-dashboard.js"></script> --}}


    <!-- Custom-Switcher JS -->
    <script src="{{ asset('assets/js/custom-switcher.min.js') }}"></script>

    <!-- Custom JS -->
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    @livewireScripts
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
        $('.select2').select2({
            allowClear: true
        });
        Livewire.on('openModal', id => {
            const truck_modal = document.querySelector(id);
            let myModal = bootstrap.Modal.getOrCreateInstance(truck_modal);
            myModal.show();
        });

        Livewire.on('closeModal', id => {
            const truck_modal = document.querySelector(id);
            const modal = bootstrap.Modal.getOrCreateInstance(truck_modal);
            modal.hide();
        });
    </script>
    @stack('js')

</body>

</html>
