@php
    $appSetting = App\Models\AppSetting::first();
    $importantLinks = App\Models\ImportantLink::where('is_shown', 1)->get();
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - {{ config('app.name') }}</title>

    {{-- ====== Favicon Icon ====== --}}
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="img/png" />
    {{-- ====== Bootstrap css ====== --}}
    <link rel="stylesheet" href="{{ asset('themes/guest/css/bootstrap.min.css') }}" />
    {{-- ====== Slick Slider ====== --}}
    <link rel="stylesheet" href="{{ asset('themes/guest/css/slick.min.css') }}" />
    {{-- ====== Magnific ====== --}}
    <link rel="stylesheet" href="{{ asset('themes/guest/css/magnific-popup.min.css') }}" />
    {{-- ====== Nice Select ====== --}}
    <link rel="stylesheet" href="{{ asset('themes/guest/css/nice-select.min.css') }}" />
    {{-- ====== Animate CSS ====== --}}
    <link rel="stylesheet" href="{{ asset('themes/guest/css/animate.min.css') }}" />
    {{-- ====== Jquery UI CSS ====== --}}
    <link rel="stylesheet" href="{{ asset('themes/guest/css/jquery-ui.min.css') }}" />
    {{-- ====== Font Awesome ====== --}}
    <link rel="stylesheet" href="{{ asset('themes/guest/fonts/fontawesome/css/all.min.css') }}" />
    {{-- ====== Flaticon ====== --}}
    <link rel="stylesheet" href="{{ asset('themes/guest/fonts/flaticon/flaticon.css') }}" />
    {{-- ====== Spacing Css ====== --}}
    <link rel="stylesheet" href="{{ asset('themes/guest/css/spacing.min.css') }}" />
    {{-- ====== Main Css ====== --}}
    <link rel="stylesheet" href="{{ asset('themes/guest/css/style.css') }}" />
    {{-- ====== Responsive CSS ====== --}}
    <link rel="stylesheet" href="{{ asset('themes/guest/css/responsive.css') }}" />
    <style>
        html {
            scroll-behavior: smooth
        }
    </style>
</head>

<body>
    {{-- ======= Start Preloader ======= --}}
    {{-- <div id="preloader">
        <img class="preloader-image" width="60" src="{{ asset('images/logos/preloader-logo.png') }}"
            alt="preloader" />
    </div> --}}
    {{-- ======= End Preloader ======= --}}

    {{-- ====== Start Header ====== --}}
    @if (Route::is('home'))
        <header
            class="template-header navbar-center absolute-header nav-white-color submenu-seconday-color nav-border-bottom sticky-header">
        @else
            <header class="template-header navbar-center sticky-header">
    @endif
    <div class="container-fluid container-1430">
        <div class="header-inner">
            <div class="header-left">
                <div class="brand-logo">
                    <a href="{{ route('home') }}">
                        @if (Route::is('home'))
                            <img src="{{ asset('images/logos/logo_polije.png') }}" alt="logo" class="main-logo"
                                height="50">
                        @else
                            <img src="{{ asset('images/logos/logo_polije.png') }}" alt="logo" class="main-logo"
                                height="50">
                        @endif
                        <img src="{{ asset('images/logos/logo_polije.png') }}" alt="logo" class="sticky-logo"
                            height="50">
                    </a>
                </div>
            </div>
            <div class="header-right">
                <nav class="nav-menu d-none d-xl-block">
                    <ul>
                        <li>
                            <a href="{{ route('home') }}">Beranda</a>
                        </li>
                        <li>
                            <a href="#">Profil P3M</a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="{{ route('about.index') }}">Tentang</a>
                                </li>
                                <li>
                                    <a href="{{ route('vission-mission.index') }}">Visi & Misi</a>
                                </li>
                                <li>
                                    <a href="{{ route('team.index') }}">Struktur Organisasi</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('galleries.index') }}">Galeri</a>
                        </li>
                        <li>
                            <a href="{{ route('blogs.index') }}">Blog</a>
                        </li>
                        <li>
                            <a href="{{ route('contact.index') }}">Kontak</a>
                        </li>
                    </ul>
                </nav>
                <ul class="header-extra">
                    <li class="d-xl-none">
                        <a href="#" class="navbar-toggler">
                            <span></span>
                            <span></span>
                            <span></span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    {{-- Start Mobile Slide Menu --}}
    <div class="mobile-slide-panel">
        <div class="panel-overlay"></div>
        <div class="panel-inner">
            <div class="mobile-logo">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('images/logos/logo_polije.png') }}" alt="Landio" height="50">
                </a>
            </div>
            <nav class="mobile-menu">
                <ul>
                    <li>
                        <a href="{{ route('home') }}">Beranda</a>
                    </li>
                    <li>
                        <a href="#">Profil P3M</a>
                        <ul class="sub-menu">
                            <li>
                                <a href="{{ route('about.index') }}">Tentang</a>
                            </li>
                            <li>
                                <a href="{{ route('vission-mission.index') }}">Visi & Misi</a>
                            </li>
                            <li>
                                <a href="{{ route('team.index') }}">Struktur Organisasi</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('galleries.index') }}">Galeri</a>
                    </li>
                    <li>
                        <a href="{{ route('blogs.index') }}">Blog</a>
                    </li>
                    <li>
                        <a href="{{ route('contact.index') }}">Kontak</a>
                    </li>
                </ul>
            </nav>
            <a href="#" class="panel-close">
                <i class="fal fa-times"></i>
            </a>
        </div>
    </div>
    {{-- End Mobile Slide Menu --}}
    </header>
    {{-- ====== End Header ====== --}}

    @yield('content')

    {{-- ====== Start Scroll To Top ====== --}}
    <a href="#" class="back-to-top" id="scroll-top">
        <i class="far fa-angle-up"></i>
    </a>
    {{-- ====== End Scroll To Top ====== --}}

    {{-- ====== Start Footer ====== --}}
    <footer class="template-footer bg-primary-color-2 footer-white-color">
        <div class="container">
            <div class="footer-widgets p-t-80 p-b-30">
                <div class="row">
                    {{-- Single Footer Widget --}}
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="widget contact-widget">
                            <h5 class="widget-title">Kontak</h5>
                            <ul>
                                @if ($appSetting != null && $appSetting->company_address != null)
                                    <li>
                                        <a href="#">
                                            <i class="fal fa-map-marker-alt"></i>
                                            {!! $appSetting->company_address !!}
                                        </a>
                                    </li>
                                @endif
                                @if ($appSetting != null && $appSetting->company_email != null)
                                    <li>
                                        <a href="mailto:{{ $appSetting->company_email }}">
                                            <i class="fal fa-envelope-open-text"></i>
                                            {{ $appSetting->company_email }}
                                        </a>
                                    </li>
                                @endif
                                @if ($appSetting != null && $appSetting->company_phone != null)
                                    <li>
                                        <a href="tel:{{ $appSetting->company_phone }}">
                                            <i class="fal fa-phone"></i>
                                            {{ $appSetting->company_phone }}
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                        {{-- <div class="widget text-block-widget">
                            <ul class="social-links bordered-style">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                <li><a href="#"><i class="fab fa-behance"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                            </ul>
                        </div> --}}
                    </div>
                    {{-- Single Footer Widget --}}
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="d-lg-flex justify-content-center">
                            <div class="widget nav-widget">
                                <h5 class="widget-title">Tautan Penting</h5>
                                <ul>
                                    @foreach ($importantLinks as $importantLink)
                                        <li><a href="{{ $importantLink->url }}"
                                                @if ($importantLink->open_in_new_tab == 1) target="_blank" @endif>{{ $importantLink->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copyright border-top-off-white">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-sm-auto col-12">
                        <div class="text-center copyright-logo text-sm-left">
                            <img src="{{ asset('images/logos/logo_polije.png') }}" height="50" alt="Landio">
                        </div>
                    </div>
                    <div class="col-sm-auto col-12">
                        <p class="pt-4 text-center copyright-text text-sm-right pt-sm-0">
                            © {{ date('Y') }} {{ $appSetting->company_name ?? null }}. All Rights Reserved
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    {{-- ====== End Footer ====== --}}

    {{-- ====== Jquery ====== --}}
    <script src="{{ asset('themes/guest/js/jquery-3.6.0.min.js') }}"></script>
    {{-- ====== Bootstrap ====== --}}
    <script src="{{ asset('themes/guest/js/bootstrap.min.js') }}"></script>
    {{-- ====== Slick slider ====== --}}
    <script src="{{ asset('themes/guest/js/slick.min.js') }}"></script>
    {{-- ====== Magnific ====== --}}
    <script src="{{ asset('themes/guest/js/jquery.magnific-popup.min.js') }}"></script>
    {{-- ====== Isotope Js ====== --}}
    <script src="{{ asset('themes/guest/js/isotope.pkgd.min.js') }}"></script>
    {{-- ====== Jquery UI Js ====== --}}
    <script src="{{ asset('themes/guest/js/jquery-ui.min.js') }}"></script>
    {{-- ====== Inview ====== --}}
    <script src="{{ asset('themes/guest/js/jquery.inview.min.js') }}"></script>
    {{-- ====== Nice Select ====== --}}
    <script src="{{ asset('themes/guest/js/jquery.nice-select.min.js') }}"></script>
    {{-- ====== Wow ====== --}}
    <script src="{{ asset('themes/guest/js/wow.min.js') }}"></script>
    {{-- ====== Main JS ====== --}}
    <script src="{{ asset('themes/guest/js/main.js') }}"></script>
</body>

</html>
