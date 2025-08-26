@php
    $appSetting = App\Models\AppSetting::first();
@endphp
<!DOCTYPE html>
{{--
	Author: Keenthemes
	Product Name: Metronic
	Product Version: 8.1.7
	Purchase: https://1.envato.market/EA4JP
	Website: http://www.keenthemes.com
	Contact: support@keenthemes.com
	Follow: www.twitter.com/keenthemes
	Dribbble: www.dribbble.com/keenthemes
	Like: www.facebook.com/keenthemes
	License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
	--}}
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme-mode="light">
{{-- begin::Head --}}

<head>
    <title>@yield('title') - {{ config('app.name') }}</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="{{ str_replace('_', '-', app()->getLocale()) }}" />
    <meta property="og:title" content="@yield('title') - {{ config('app.name') }}" />
    <meta property="og:url" content="{{ route('home') }}" />
    <meta property="og:site_name" content="{{ config('app.name') }}" />
    <link rel="canonical" href="{{ route('home') }}" />
    @if ($appSetting != null && $appSetting->app_icon != null)
        <link rel="shortcut icon" href="{{ asset('storage/public/app-icon/' . $appSetting->app_icon) }}" />
    @else
        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" />
    @endif
    {{-- begin::Fonts(mandatory for all pages) --}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    {{-- end::Fonts --}}
    {{-- begin::Vendor Stylesheets(used for this page only) --}}
    @yield('page_styles')
    {{-- end::Vendor Stylesheets --}}
    {{-- begin::Global Stylesheets Bundle(mandatory for all pages) --}}
    <link href="{{ asset('themes/admin/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('themes/admin/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    {{-- end::Global Stylesheets Bundle --}}
    {{-- Begin::Google Tag Manager --}}
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-5FS8GGP');
    </script>
    {{-- End::Google Tag Manager --}}
    <style>
        /*=======  Fonts =======*/
        @font-face {
            font-family: "CircularStdBold";
            src: url("{{ asset('fonts/circularstd/CircularStdBold.eot') }}");
            src: url("{{ asset('fonts/circularstd/CircularStdBold.eot') }}") format("embedded-opentype"), url("{{ asset('fonts/circularstd/CircularStdBold.woff2') }}") format("woff2"), url("{{ asset('fonts/circularstd/CircularStdBold.woff') }}") format("woff"), url("{{ asset('fonts/circularstd/CircularStdBold.ttf') }}") format("truetype"), url("{{ asset('fonts/circularstd/CircularStdBold.svg#CircularStdBold') }}") format("svg");
        }

        @font-face {
            font-family: "CircularStdMedium";
            src: url("{{ asset('fonts/circularstd/CircularStdMedium.eot') }}");
            src: url("{{ asset('fonts/circularstd/CircularStdMedium.eot') }}") format("embedded-opentype"), url("{{ asset('fonts/circularstd/CircularStdMedium.woff2') }}") format("woff2"), url("{{ asset('fonts/circularstd/CircularStdMedium.woff') }}") format("woff"), url("{{ asset('fonts/circularstd/CircularStdMedium.ttf') }}") format("truetype"), url("{{ asset('fonts/circularstd/CircularStdMedium.svg#CircularStdMedium') }}") format("svg");
        }

        @font-face {
            font-family: "CircularStdBook";
            src: url("{{ asset('fonts/circularstd/CircularStdBook.eot') }}");
            src: url("{{ asset('fonts/circularstd/CircularStdBook.eot') }}") format("embedded-opentype"), url("{{ asset('fonts/circularstd/CircularStdBook.woff2') }}") format("woff2"), url("{{ asset('fonts/circularstd/CircularStdBook.woff') }}") format("woff"), url("{{ asset('fonts/circularstd/CircularStdBook.ttf') }}") format("truetype"), url("{{ asset('fonts/circularstd/CircularStdBook.svg#CircularStdBook') }}") format("svg");
        }
    </style>
</head>
{{-- end::Head --}}
{{-- begin::Body --}}

<body id="kt_body" class="header-fixed">
    @include('sweetalert::alert')
    {{-- begin::Theme mode setup on page load --}}
    <script>
        var defaultThemeMode = "light";
        var themeMode;

        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
            } else {
                if (localStorage.getItem("data-bs-theme") !== null) {
                    themeMode = localStorage.getItem("data-bs-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }

            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }

            document.documentElement.setAttribute("data-bs-theme", themeMode);
        }
    </script>
    {{-- end::Theme mode setup on page load --}}
    {{-- Begin::Google Tag Manager (noscript) --}}
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FS8GGP" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    {{-- End::Google Tag Manager (noscript) --}}
    {{-- begin::Main --}}
    {{-- begin::Root --}}
    <div class="d-flex flex-column flex-root">
        {{-- begin::Page --}}
        <div class="flex-row page d-flex flex-column-fluid">
            {{-- begin::Aside --}}
            <div id="kt_aside" class="aside py-9 " data-kt-drawer="true" data-kt-drawer-name="aside"
                data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
                data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start"
                data-kt-drawer-toggle="#kt_aside_toggle">
                {{-- begin::Brand --}}
                <div class="aside-logo flex-column-auto px-9 mb-9" id="kt_aside_logo">
                    {{-- begin::Logo --}}
                    {{-- <a href="{{ route('admin.dashboard') }}">
                        <img alt="Logo" src="{{ asset('logos/rji.png') }}" class="h-40px logo theme-light-show" />
                        <img alt="Logo" src="{{ asset('logos/rji-white.png') }}"
                            class="h-40px logo theme-dark-show" />
                    </a> --}}
                    <a href="{{ route('admin.dashboard') }}">
                        <h1>{{ config('app.name') }}</h1>
                    </a>
                    {{-- end::Logo --}}
                </div>
                {{-- end::Brand --}}
                {{-- begin::Aside menu --}}
                <div class="aside-menu flex-column-fluid ps-5 pe-3 mb-9" id="kt_aside_menu">
                    {{-- begin::Aside Menu --}}
                    <div class="w-100 hover-scroll-overlay-y d-flex pe-2" id="kt_aside_menu_wrapper"
                        data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                        data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer"
                        data-kt-scroll-wrappers="#kt_aside, #kt_aside_menu, #kt_aside_menu_wrapper"
                        data-kt-scroll-offset="100">
                        {{-- begin::Menu --}}
                        <div class="my-auto menu menu-column menu-rounded menu-sub-indention menu-active-bg fw-semibold"
                            id="#kt_aside_menu" data-kt-menu="true">
                            {{-- begin:Menu item --}}
                            <div class="menu-item menu-accordion">
                                {{-- begin:Menu link --}}
                                <a href="{{ route('admin.dashboard') }}" class="menu-link">
                                    <span class="menu-icon">
                                        {{-- begin::Svg Icon | path: icons/duotune/arrows/arr001.svg --}}
                                        <span class="svg-icon svg-icon-5">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <path
                                                    d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z"
                                                    fill="currentColor" opacity="0.3" />
                                                <path
                                                    d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z"
                                                    fill="currentColor" />
                                            </svg>
                                        </span>
                                        {{-- end::Svg Icon --}}
                                    </span>
                                    <span class="menu-title">Dashboard</span>
                                </a>
                                {{-- end:Menu link --}}
                            </div>
                            {{-- end:Menu item --}}
                            {{-- begin:Menu item --}}
                            <div class="menu-item menu-accordion">
                                <div class="pt-8 pb-0 menu-content">
                                    <span class="menu-section text-muted text-uppercase fs-8 ls-1">
                                        @if (Auth::user()->is_superadmin == 1)
                                            Menu Super Admin
                                        @else
                                            Menu Admin
                                        @endif
                                    </span>
                                </div>
                            </div>
                            {{-- end:Menu item --}}
                            {{-- begin:Menu item --}}
                            <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                {{-- begin:Menu link --}}
                                <span class="menu-link">
                                    <span class="menu-icon">
                                        {{-- begin::Svg Icon | path: icons/duotune/arrows/arr001.svg --}}
                                        <span class="svg-icon svg-icon-5">
                                            {{-- begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/Files/Selected-file.svg --}}
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24" />
                                                    <path
                                                        d="M4.85714286,1 L11.7364114,1 C12.0910962,1 12.4343066,1.12568431 12.7051108,1.35473959 L17.4686994,5.3839416 C17.8056532,5.66894833 18,6.08787823 18,6.52920201 L18,19.0833333 C18,20.8738751 17.9795521,21 16.1428571,21 L4.85714286,21 C3.02044787,21 3,20.8738751 3,19.0833333 L3,2.91666667 C3,1.12612489 3.02044787,1 4.85714286,1 Z M8,12 C7.44771525,12 7,12.4477153 7,13 C7,13.5522847 7.44771525,14 8,14 L15,14 C15.5522847,14 16,13.5522847 16,13 C16,12.4477153 15.5522847,12 15,12 L8,12 Z M8,16 C7.44771525,16 7,16.4477153 7,17 C7,17.5522847 7.44771525,18 8,18 L11,18 C11.5522847,18 12,17.5522847 12,17 C12,16.4477153 11.5522847,16 11,16 L8,16 Z"
                                                        fill="currentColor" fill-rule="nonzero" opacity="0.3" />
                                                    <path
                                                        d="M6.85714286,3 L14.7364114,3 C15.0910962,3 15.4343066,3.12568431 15.7051108,3.35473959 L20.4686994,7.3839416 C20.8056532,7.66894833 21,8.08787823 21,8.52920201 L21,21.0833333 C21,22.8738751 20.9795521,23 19.1428571,23 L6.85714286,23 C5.02044787,23 5,22.8738751 5,21.0833333 L5,4.91666667 C5,3.12612489 5.02044787,3 6.85714286,3 Z M8,12 C7.44771525,12 7,12.4477153 7,13 C7,13.5522847 7.44771525,14 8,14 L15,14 C15.5522847,14 16,13.5522847 16,13 C16,12.4477153 15.5522847,12 15,12 L8,12 Z M8,16 C7.44771525,16 7,16.4477153 7,17 C7,17.5522847 7.44771525,18 8,18 L11,18 C11.5522847,18 12,17.5522847 12,17 C12,16.4477153 11.5522847,16 11,16 L8,16 Z"
                                                        fill="currentColor" fill-rule="nonzero" />
                                                </g>
                                            </svg>
                                            {{-- end::Svg Icon --}}
                                        </span>
                                        {{-- end::Svg Icon --}}
                                    </span>
                                    <span class="menu-title">Master Data</span><span class="menu-arrow"></span>
                                </span>
                                {{-- end:Menu link --}}
                                {{-- begin:Menu sub --}}
                                <div class="menu-sub menu-sub-accordion">
                                    {{-- begin:Menu item --}}
                                    <div class="menu-item menu-accordion">
                                        {{-- begin:Menu link --}}
                                        <a class="menu-link" href="{{ route('admin.teams.index') }}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Data Anggota Tim</span>
                                        </a>
                                        {{-- end:Menu link --}}
                                    </div>
                                    {{-- end:Menu item --}}
                                    {{-- begin:Menu item --}}
                                    <div class="menu-item menu-accordion">
                                        {{-- begin:Menu link --}}
                                        <a class="menu-link" href="{{ route('admin.galleries.index') }}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Data Galeri</span>
                                        </a>
                                        {{-- end:Menu link --}}
                                    </div>
                                </div>
                                {{-- end:Menu sub --}}
                            </div>
                            {{-- end:Menu item --}}
                            {{-- begin:Menu item --}}
                            <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                {{-- begin:Menu link --}}
                                <span class="menu-link">
                                    <span class="menu-icon">
                                        {{-- begin::Svg Icon | path: icons/duotune/arrows/arr001.svg --}}
                                        <span class="svg-icon svg-icon-5">
                                            {{-- begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/Files/Selected-file.svg --}}
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M8 18L10 14L9.60001 13.2C9.30001 12.6 9.69999 12 10.4 12H13.7C14.3 12 14.7 12.7 14.5 13.2L14 14L16 18H8ZM6 6H4V8H6V6ZM7 11C7 11.6 7.4 12 8 12C8.6 12 9 11.6 9 11V10H7V11ZM10 6V8H20V6H10Z"
                                                    fill="currentColor" />
                                                <path opacity="0.3"
                                                    d="M21 22H3C2.4 22 2 21.6 2 21V3C2 2.4 2.4 2 3 2H21C21.6 2 22 2.4 22 3V21C22 21.6 21.6 22 21 22ZM20 4H4V18H20V4ZM10 9V6H6V9C6 9.6 6.4 10 7 10H9C9.6 10 10 9.6 10 9Z"
                                                    fill="currentColor" />
                                            </svg>
                                            {{-- end::Svg Icon --}}
                                        </span>
                                        {{-- end::Svg Icon --}}
                                    </span>
                                    <span class="menu-title">Blog</span><span class="menu-arrow"></span>
                                </span>
                                {{-- end:Menu link --}}
                                {{-- begin:Menu sub --}}
                                <div class="menu-sub menu-sub-accordion">
                                    <div class="menu-item menu-accordion">
                                        {{-- begin:Menu link --}}
                                        <a class="menu-link" href="{{ route('admin.blogs.index') }}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Data Postingan Blog</span>
                                        </a>
                                        {{-- end:Menu link --}}
                                    </div>
                                    {{-- end:Menu item --}}
                                    <div class="menu-item menu-accordion">
                                        {{-- begin:Menu link --}}
                                        <a class="menu-link" href="{{ route('admin.blog-categories.index') }}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Data Kategori Blog</span>
                                        </a>
                                        {{-- end:Menu link --}}
                                    </div>
                                </div>
                                {{-- end:Menu sub --}}
                            </div>
                            {{-- end:Menu item --}}
                            {{-- begin:Menu item --}}
                            <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                {{-- begin:Menu link --}}
                                <span class="menu-link">
                                    <span class="menu-icon">
                                        {{-- begin::Svg Icon | path: icons/duotune/arrows/arr001.svg --}}
                                        <span class="svg-icon svg-icon-5">
                                            {{-- begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/General/User.svg --}}
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none"
                                                    fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24" />
                                                    <path
                                                        d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
                                                        fill="currentColor" fill-rule="nonzero" opacity="0.3" />
                                                    <path
                                                        d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
                                                        fill="currentColor" fill-rule="nonzero" />
                                                </g>
                                            </svg>
                                            {{-- end::Svg Icon --}}
                                        </span>
                                        {{-- end::Svg Icon --}}
                                    </span>
                                    <span class="menu-title">Pengguna</span><span class="menu-arrow"></span>
                                </span>
                                {{-- end:Menu link --}}{{-- begin:Menu sub --}}
                                <div class="menu-sub menu-sub-accordion">
                                    {{-- begin:Menu item --}}
                                    <div class="menu-item menu-accordion">
                                        {{-- begin:Menu link --}}
                                        <a class="menu-link" href="{{ route('admin.admins.index') }}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Data Admin</span>
                                        </a>
                                        {{-- end:Menu link --}}
                                    </div>
                                    {{-- end:Menu item --}}
                                </div>
                                {{-- end:Menu sub --}}
                            </div>
                            {{-- end:Menu item --}}
                            {{-- begin:Menu item --}}
                            <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                {{-- begin:Menu link --}}
                                <span class="menu-link">
                                    <span class="menu-icon">
                                        {{-- begin::Svg Icon | path: icons/duotune/arrows/arr001.svg --}}
                                        <span class="svg-icon svg-icon-5">
                                            {{-- begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/General/Settings-2.svg --}}
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none"
                                                    fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path
                                                        d="M5,8.6862915 L5,5 L8.6862915,5 L11.5857864,2.10050506 L14.4852814,5 L19,5 L19,9.51471863 L21.4852814,12 L19,14.4852814 L19,19 L14.4852814,19 L11.5857864,21.8994949 L8.6862915,19 L5,19 L5,15.3137085 L1.6862915,12 L5,8.6862915 Z M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z"
                                                        fill="currentColor" />
                                                </g>
                                            </svg>
                                            {{-- end::Svg Icon --}}
                                        </span>
                                        {{-- end::Svg Icon --}}
                                    </span>
                                    <span class="menu-title">Pengaturan</span><span class="menu-arrow"></span>
                                </span>
                                {{-- end:Menu link --}}
                                {{-- begin:Menu sub --}}
                                <div class="menu-sub menu-sub-accordion">
                                    {{-- begin:Menu item --}}
                                    <div class="menu-item menu-accordion">
                                        {{-- begin:Menu link --}}
                                        <a class="menu-link" href="{{ route('admin.app-settings.index') }}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Pengaturan Umum Aplikasi</span>
                                        </a>
                                        {{-- end:Menu link --}}
                                    </div>
                                    {{-- end:Menu item --}}
                                    {{-- begin:Menu item --}}
                                    <div class="menu-item menu-accordion">
                                        {{-- begin:Menu link --}}
                                        <a class="menu-link" href="{{ route('admin.important-links.index') }}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Tautan Penting</span>
                                        </a>
                                        {{-- end:Menu link --}}
                                    </div>
                                    {{-- end:Menu item --}}
                                </div>
                                {{-- end:Menu sub --}}
                            </div>
                            {{-- end:Menu item --}}
                        </div>
                        {{-- end::Menu --}}
                    </div>
                    {{-- end::Aside Menu --}}
                </div>
                {{-- end::Aside menu --}}
                {{-- begin::Footer --}}
                <div class="aside-footer flex-column-auto px-9" id="kt_aside_footer">
                    {{-- begin::User panel --}}
                    <div class="d-flex flex-stack">
                        {{-- begin::Wrapper --}}
                        <div class="d-flex align-items-center">
                            {{-- begin::Avatar --}}
                            <div class="symbol symbol-circle symbol-40px">
                                @if (Auth::user()->image != null)
                                    <img src="{{ asset('storage/admin/images/' . Auth::user()->id . '/' . Auth::user()->image) }}"
                                        alt="photo" />
                                @else
                                    <img src="{{ asset('themes/admin/media/avatars/blank.png') }}" alt="photo" />
                                @endif
                            </div>
                            {{-- end::Avatar --}}
                            {{-- begin::User info --}}
                            <div class="ms-2">
                                {{-- begin::Name --}}
                                <a href="{{ route('admin.profile.edit') }}"
                                    class="text-gray-800 text-hover-primary fs-6 fw-bold lh-1">{{ Auth::user()->name }}</a>
                                {{-- end::Name --}}
                                {{-- begin::Major --}}
                                <span
                                    class="text-muted fw-semibold d-block fs-7 lh-1">{{ Auth::user()->email }}</span>
                                {{-- end::Major --}}
                            </div>
                            {{-- end::User info --}}
                        </div>
                        {{-- end::Wrapper --}}
                        {{-- begin::User menu --}}
                        <div class="ms-1">
                            <div class="btn btn-sm btn-icon btn-active-color-primary position-relative me-n2"
                                data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-overflow="true"
                                data-kt-menu-placement="top-end">
                                {{-- begin::Svg Icon | path: icons/duotune/coding/cod001.svg --}}
                                <span class="svg-icon svg-icon-1">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.3"
                                            d="M22.1 11.5V12.6C22.1 13.2 21.7 13.6 21.2 13.7L19.9 13.9C19.7 14.7 19.4 15.5 18.9 16.2L19.7 17.2999C20 17.6999 20 18.3999 19.6 18.7999L18.8 19.6C18.4 20 17.8 20 17.3 19.7L16.2 18.9C15.5 19.3 14.7 19.7 13.9 19.9L13.7 21.2C13.6 21.7 13.1 22.1 12.6 22.1H11.5C10.9 22.1 10.5 21.7 10.4 21.2L10.2 19.9C9.4 19.7 8.6 19.4 7.9 18.9L6.8 19.7C6.4 20 5.7 20 5.3 19.6L4.5 18.7999C4.1 18.3999 4.1 17.7999 4.4 17.2999L5.2 16.2C4.8 15.5 4.4 14.7 4.2 13.9L2.9 13.7C2.4 13.6 2 13.1 2 12.6V11.5C2 10.9 2.4 10.5 2.9 10.4L4.2 10.2C4.4 9.39995 4.7 8.60002 5.2 7.90002L4.4 6.79993C4.1 6.39993 4.1 5.69993 4.5 5.29993L5.3 4.5C5.7 4.1 6.3 4.10002 6.8 4.40002L7.9 5.19995C8.6 4.79995 9.4 4.39995 10.2 4.19995L10.4 2.90002C10.5 2.40002 11 2 11.5 2H12.6C13.2 2 13.6 2.40002 13.7 2.90002L13.9 4.19995C14.7 4.39995 15.5 4.69995 16.2 5.19995L17.3 4.40002C17.7 4.10002 18.4 4.1 18.8 4.5L19.6 5.29993C20 5.69993 20 6.29993 19.7 6.79993L18.9 7.90002C19.3 8.60002 19.7 9.39995 19.9 10.2L21.2 10.4C21.7 10.5 22.1 11 22.1 11.5ZM12.1 8.59998C10.2 8.59998 8.6 10.2 8.6 12.1C8.6 14 10.2 15.6 12.1 15.6C14 15.6 15.6 14 15.6 12.1C15.6 10.2 14 8.59998 12.1 8.59998Z"
                                            fill="currentColor" />
                                        <path
                                            d="M17.1 12.1C17.1 14.9 14.9 17.1 12.1 17.1C9.30001 17.1 7.10001 14.9 7.10001 12.1C7.10001 9.29998 9.30001 7.09998 12.1 7.09998C14.9 7.09998 17.1 9.29998 17.1 12.1ZM12.1 10.1C11 10.1 10.1 11 10.1 12.1C10.1 13.2 11 14.1 12.1 14.1C13.2 14.1 14.1 13.2 14.1 12.1C14.1 11 13.2 10.1 12.1 10.1Z"
                                            fill="currentColor" />
                                    </svg>
                                </span>
                                {{-- end::Svg Icon --}}
                            </div>
                            {{-- begin::User account menu --}}
                            <div class="py-4 menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold fs-6 w-275px"
                                data-kt-menu="true">
                                {{-- begin::Menu item --}}
                                <div class="px-3 menu-item menu-accordion">
                                    <div class="px-3 menu-content d-flex align-items-center">
                                        {{-- begin::Avatar --}}
                                        <div class="symbol symbol-50px me-5">
                                            @if (Auth::user()->image != null)
                                                <img alt="Logo"
                                                    src="{{ asset('storage/admin/images/' . Auth::user()->id . '/' . Auth::user()->image) }}" />
                                            @else
                                                <img alt="Logo"
                                                    src="{{ asset('themes/admin/media/avatars/blank.png') }}" />
                                            @endif
                                        </div>
                                        {{-- end::Avatar --}}
                                        {{-- begin::Username --}}
                                        <div class="d-flex flex-column">
                                            <div class="fw-bold d-flex align-items-center fs-5">
                                                {{ Auth::user()->name }}
                                                <span class="px-2 py-1 badge badge-light-success fw-bold fs-8 ms-2">
                                                    @if (Auth::user()->is_superadmin == 1)
                                                        Super Admin
                                                    @else
                                                        Administrator
                                                    @endif
                                                </span>
                                            </div>
                                            <a href="#" class="fw-semibold text-muted text-hover-primary fs-7">
                                                {{ Auth::user()->email }} </a>
                                        </div>
                                        {{-- end::Username --}}
                                    </div>
                                </div>
                                {{-- end::Menu item --}}
                                {{-- begin::Menu separator --}}
                                <div class="my-2 separator"></div>
                                {{-- end::Menu separator --}}
                                {{-- begin::Menu item --}}
                                <div class="px-5 menu-item menu-accordion">
                                    <a href="{{ route('admin.profile.edit') }}" class="px-5 menu-link">
                                        Edit Profil
                                    </a>
                                </div>
                                {{-- end::Menu item --}}
                                {{-- begin::Menu item --}}
                                <div class="px-5 menu-item menu-accordion">
                                    <a href="{{ route('admin.change-password.index') }}" class="px-5 menu-link">
                                        Ubah Kata Sandi
                                    </a>
                                </div>
                                {{-- end::Menu item --}}
                                {{-- begin::Menu separator --}}
                                <div class="my-2 separator"></div>
                                {{-- end::Menu separator --}}
                                {{-- begin::Menu item --}}
                                <div class="px-5 menu-item menu-accordion">
                                    <a href="#" class="px-5 menu-link" data-bs-toggle="modal"
                                        data-bs-target="#logout_modal">
                                        Log Out
                                    </a>
                                </div>
                                {{-- end::Menu item --}}
                            </div>
                            {{-- end::User account menu --}}
                        </div>
                        {{-- end::User menu --}}
                    </div>
                    {{-- end::User panel --}}
                </div>
                {{-- end::Footer --}}
            </div>
            {{-- end::Aside --}}
            {{-- begin::Wrapper --}}
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                {{-- begin::Header --}}
                <div id="kt_header" class="header ">
                    {{-- begin::Container --}}
                    <div class="container flex-wrap gap-2 d-flex flex-stack" id="kt_header_container">
                        {{-- begin::Page title --}}
                        <div class="flex-wrap pb-5 page-title d-flex flex-column align-items-start justify-content-center me-lg-2 pb-lg-0"
                            data-kt-swapper="true" data-kt-swapper-mode="prepend"
                            data-kt-swapper-parent="{default: '#kt_content_container', lg: '#kt_header_container'}">
                            {{-- begin::Heading --}}
                            <h1 class="my-0 d-flex flex-column text-dark fw-bold fs-1">
                                @if (Route::currentRouteName() == 'admin.dashboard')
                                    Selamat Datang, {{ Auth::user()->name }}
                                @else
                                    @yield('title')
                                @endif
                            </h1>
                            {{-- end::Heading --}}
                        </div>
                        {{-- end::Page title- --}}
                        {{-- begin::Wrapper --}}
                        <div class="d-flex d-lg-none align-items-center ms-n2 me-2">
                            {{-- begin::Aside mobile toggle --}}
                            <div class="btn btn-icon btn-active-icon-primary" id="kt_aside_toggle">
                                {{-- begin::Svg Icon | path: icons/duotune/abstract/abs015.svg --}}
                                <span class="mt-1 svg-icon svg-icon-1">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z"
                                            fill="currentColor" />
                                        <path opacity="0.3"
                                            d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z"
                                            fill="currentColor" />
                                    </svg>
                                </span>
                                {{-- end::Svg Icon --}}
                            </div>
                            {{-- end::Aside mobile toggle --}}
                            {{-- begin::Logo --}}
                            {{-- <a href="/metronic8/demo3/../demo3/index.html" class="d-flex align-items-center">
                                <img alt="Logo" src="{{ asset('logos/rji.png') }}"
                                    class="theme-light-show h-40px" />
                                <img alt="Logo" src="{{ asset('logos/rji-white.png') }}"
                                    class="theme-dark-show h-40px" />
                            </a> --}}
                            {{-- end::Logo --}}
                        </div>
                        {{-- end::Wrapper --}}
                        {{-- begin::Topbar --}}
                        <div class="flex-shrink-0 d-flex align-items-center">
                            {{-- begin::Theme mode --}}
                            <div class="d-flex align-items-center ms-3 ms-lg-4">
                                {{-- begin::Menu toggle --}}
                                <a href="#"
                                    class="btn btn-icon btn-color-gray-700 btn-active-color-primary btn-outline w-40px h-40px"
                                    data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-attach="parent"
                                    data-kt-menu-placement="bottom-end">
                                    {{-- begin::Svg Icon | path: icons/duotune/general/gen060.svg --}}
                                    <span class="svg-icon theme-light-show svg-icon-1">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M11.9905 5.62598C10.7293 5.62574 9.49646 5.9995 8.44775 6.69997C7.39903 7.40045 6.58159 8.39619 6.09881 9.56126C5.61603 10.7263 5.48958 12.0084 5.73547 13.2453C5.98135 14.4823 6.58852 15.6185 7.48019 16.5104C8.37186 17.4022 9.50798 18.0096 10.7449 18.2557C11.9818 18.5019 13.2639 18.3757 14.429 17.8931C15.5942 17.4106 16.5901 16.5933 17.2908 15.5448C17.9915 14.4962 18.3655 13.2634 18.3655 12.0023C18.3637 10.3119 17.6916 8.69129 16.4964 7.49593C15.3013 6.30056 13.6808 5.62806 11.9905 5.62598Z"
                                                fill="currentColor" />
                                            <path
                                                d="M22.1258 10.8771H20.627C20.3286 10.8771 20.0424 10.9956 19.8314 11.2066C19.6204 11.4176 19.5018 11.7038 19.5018 12.0023C19.5018 12.3007 19.6204 12.5869 19.8314 12.7979C20.0424 13.0089 20.3286 13.1274 20.627 13.1274H22.1258C22.4242 13.1274 22.7104 13.0089 22.9214 12.7979C23.1324 12.5869 23.2509 12.3007 23.2509 12.0023C23.2509 11.7038 23.1324 11.4176 22.9214 11.2066C22.7104 10.9956 22.4242 10.8771 22.1258 10.8771Z"
                                                fill="currentColor" />
                                            <path
                                                d="M11.9905 19.4995C11.6923 19.5 11.4064 19.6187 11.1956 19.8296C10.9848 20.0405 10.8663 20.3265 10.866 20.6247V22.1249C10.866 22.4231 10.9845 22.7091 11.1953 22.9199C11.4062 23.1308 11.6922 23.2492 11.9904 23.2492C12.2886 23.2492 12.5746 23.1308 12.7854 22.9199C12.9963 22.7091 13.1147 22.4231 13.1147 22.1249V20.6247C13.1145 20.3265 12.996 20.0406 12.7853 19.8296C12.5745 19.6187 12.2887 19.5 11.9905 19.4995Z"
                                                fill="currentColor" />
                                            <path
                                                d="M4.49743 12.0023C4.49718 11.704 4.37865 11.4181 4.16785 11.2072C3.95705 10.9962 3.67119 10.8775 3.37298 10.8771H1.87445C1.57603 10.8771 1.28984 10.9956 1.07883 11.2066C0.867812 11.4176 0.749266 11.7038 0.749266 12.0023C0.749266 12.3007 0.867812 12.5869 1.07883 12.7979C1.28984 13.0089 1.57603 13.1274 1.87445 13.1274H3.37299C3.6712 13.127 3.95706 13.0083 4.16785 12.7973C4.37865 12.5864 4.49718 12.3005 4.49743 12.0023Z"
                                                fill="currentColor" />
                                            <path
                                                d="M11.9905 4.50058C12.2887 4.50012 12.5745 4.38141 12.7853 4.17048C12.9961 3.95954 13.1147 3.67361 13.1149 3.3754V1.87521C13.1149 1.57701 12.9965 1.29103 12.7856 1.08017C12.5748 0.869313 12.2888 0.750854 11.9906 0.750854C11.6924 0.750854 11.4064 0.869313 11.1955 1.08017C10.9847 1.29103 10.8662 1.57701 10.8662 1.87521V3.3754C10.8664 3.67359 10.9849 3.95952 11.1957 4.17046C11.4065 4.3814 11.6923 4.50012 11.9905 4.50058Z"
                                                fill="currentColor" />
                                            <path
                                                d="M18.8857 6.6972L19.9465 5.63642C20.0512 5.53209 20.1343 5.40813 20.1911 5.27163C20.2479 5.13513 20.2772 4.98877 20.2774 4.84093C20.2775 4.69309 20.2485 4.54667 20.192 4.41006C20.1355 4.27344 20.0526 4.14932 19.948 4.04478C19.8435 3.94024 19.7194 3.85734 19.5828 3.80083C19.4462 3.74432 19.2997 3.71531 19.1519 3.71545C19.0041 3.7156 18.8577 3.7449 18.7212 3.80167C18.5847 3.85845 18.4607 3.94159 18.3564 4.04633L17.2956 5.10714C17.1909 5.21147 17.1077 5.33543 17.0509 5.47194C16.9942 5.60844 16.9649 5.7548 16.9647 5.90264C16.9646 6.05048 16.9936 6.19689 17.0501 6.33351C17.1066 6.47012 17.1895 6.59425 17.294 6.69878C17.3986 6.80332 17.5227 6.88621 17.6593 6.94272C17.7959 6.99923 17.9424 7.02824 18.0902 7.02809C18.238 7.02795 18.3844 6.99865 18.5209 6.94187C18.6574 6.88509 18.7814 6.80195 18.8857 6.6972Z"
                                                fill="currentColor" />
                                            <path
                                                d="M18.8855 17.3073C18.7812 17.2026 18.6572 17.1195 18.5207 17.0627C18.3843 17.006 18.2379 16.9767 18.0901 16.9766C17.9423 16.9764 17.7959 17.0055 17.6593 17.062C17.5227 17.1185 17.3986 17.2014 17.2941 17.3059C17.1895 17.4104 17.1067 17.5345 17.0501 17.6711C16.9936 17.8077 16.9646 17.9541 16.9648 18.1019C16.9649 18.2497 16.9942 18.3961 17.0509 18.5326C17.1077 18.6691 17.1908 18.793 17.2955 18.8974L18.3563 19.9582C18.4606 20.0629 18.5846 20.146 18.721 20.2027C18.8575 20.2595 19.0039 20.2887 19.1517 20.2889C19.2995 20.289 19.4459 20.26 19.5825 20.2035C19.7191 20.147 19.8432 20.0641 19.9477 19.9595C20.0523 19.855 20.1351 19.7309 20.1916 19.5943C20.2482 19.4577 20.2772 19.3113 20.277 19.1635C20.2769 19.0157 20.2476 18.8694 20.1909 18.7329C20.1341 18.5964 20.051 18.4724 19.9463 18.3681L18.8855 17.3073Z"
                                                fill="currentColor" />
                                            <path
                                                d="M5.09528 17.3072L4.0345 18.368C3.92972 18.4723 3.84655 18.5963 3.78974 18.7328C3.73294 18.8693 3.70362 19.0156 3.70346 19.1635C3.7033 19.3114 3.7323 19.4578 3.78881 19.5944C3.84532 19.7311 3.92822 19.8552 4.03277 19.9598C4.13732 20.0643 4.26147 20.1472 4.3981 20.2037C4.53473 20.2602 4.68117 20.2892 4.82902 20.2891C4.97688 20.2889 5.12325 20.2596 5.25976 20.2028C5.39627 20.146 5.52024 20.0628 5.62456 19.958L6.68536 18.8973C6.79007 18.7929 6.87318 18.6689 6.92993 18.5325C6.98667 18.396 7.01595 18.2496 7.01608 18.1018C7.01621 17.954 6.98719 17.8076 6.93068 17.671C6.87417 17.5344 6.79129 17.4103 6.68676 17.3058C6.58224 17.2012 6.45813 17.1183 6.32153 17.0618C6.18494 17.0053 6.03855 16.9763 5.89073 16.9764C5.74291 16.9766 5.59657 17.0058 5.46007 17.0626C5.32358 17.1193 5.19962 17.2024 5.09528 17.3072Z"
                                                fill="currentColor" />
                                            <path
                                                d="M5.09541 6.69715C5.19979 6.8017 5.32374 6.88466 5.4602 6.94128C5.59665 6.9979 5.74292 7.02708 5.89065 7.02714C6.03839 7.0272 6.18469 6.99815 6.32119 6.94164C6.45769 6.88514 6.58171 6.80228 6.68618 6.69782C6.79064 6.59336 6.87349 6.46933 6.93 6.33283C6.9865 6.19633 7.01556 6.05003 7.01549 5.9023C7.01543 5.75457 6.98625 5.60829 6.92963 5.47184C6.87301 5.33539 6.79005 5.21143 6.6855 5.10706L5.6247 4.04626C5.5204 3.94137 5.39643 3.8581 5.25989 3.80121C5.12335 3.74432 4.97692 3.71493 4.82901 3.71472C4.68109 3.71452 4.53458 3.7435 4.39789 3.80001C4.26119 3.85652 4.13699 3.93945 4.03239 4.04404C3.9278 4.14864 3.84487 4.27284 3.78836 4.40954C3.73185 4.54624 3.70287 4.69274 3.70308 4.84066C3.70329 4.98858 3.73268 5.135 3.78957 5.27154C3.84646 5.40808 3.92974 5.53205 4.03462 5.63635L5.09541 6.69715Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                    {{-- end::Svg Icon --}} {{-- begin::Svg Icon | path: icons/duotune/general/gen061.svg --}}
                                    <span class="svg-icon theme-dark-show svg-icon-1">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M19.0647 5.43757C19.3421 5.43757 19.567 5.21271 19.567 4.93534C19.567 4.65796 19.3421 4.43311 19.0647 4.43311C18.7874 4.43311 18.5625 4.65796 18.5625 4.93534C18.5625 5.21271 18.7874 5.43757 19.0647 5.43757Z"
                                                fill="currentColor" />
                                            <path
                                                d="M20.0692 9.48884C20.3466 9.48884 20.5714 9.26398 20.5714 8.98661C20.5714 8.70923 20.3466 8.48438 20.0692 8.48438C19.7918 8.48438 19.567 8.70923 19.567 8.98661C19.567 9.26398 19.7918 9.48884 20.0692 9.48884Z"
                                                fill="currentColor" />
                                            <path
                                                d="M12.0335 20.5714C15.6943 20.5714 18.9426 18.2053 20.1168 14.7338C20.1884 14.5225 20.1114 14.289 19.9284 14.161C19.746 14.034 19.5003 14.0418 19.3257 14.1821C18.2432 15.0546 16.9371 15.5156 15.5491 15.5156C12.2257 15.5156 9.48884 12.8122 9.48884 9.48886C9.48884 7.41079 10.5773 5.47137 12.3449 4.35752C12.5342 4.23832 12.6 4.00733 12.5377 3.79251C12.4759 3.57768 12.2571 3.42859 12.0335 3.42859C7.32556 3.42859 3.42857 7.29209 3.42857 12C3.42857 16.7079 7.32556 20.5714 12.0335 20.5714Z"
                                                fill="currentColor" />
                                            <path
                                                d="M13.0379 7.47998C13.8688 7.47998 14.5446 8.15585 14.5446 8.98668C14.5446 9.26428 14.7693 9.48891 15.0469 9.48891C15.3245 9.48891 15.5491 9.26428 15.5491 8.98668C15.5491 8.15585 16.225 7.47998 17.0558 7.47998C17.3334 7.47998 17.558 7.25535 17.558 6.97775C17.558 6.70015 17.3334 6.47552 17.0558 6.47552C16.225 6.47552 15.5491 5.76616 15.5491 4.93534C15.5491 4.65774 15.3245 4.43311 15.0469 4.43311C14.7693 4.43311 14.5446 4.65774 14.5446 4.93534C14.5446 5.76616 13.8688 6.47552 13.0379 6.47552C12.7603 6.47552 12.5357 6.70015 12.5357 6.97775C12.5357 7.25535 12.7603 7.47998 13.0379 7.47998Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                    {{-- end::Svg Icon --}}
                                </a>
                                {{-- begin::Menu toggle --}}
                                {{-- begin::Menu --}}
                                <div class="py-4 menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-muted menu-active-bg menu-state-color fw-semibold fs-base w-150px"
                                    data-kt-menu="true" data-kt-element="theme-mode-menu">
                                    {{-- begin::Menu item --}}
                                    <div class="px-3 my-0 menu-item menu-accordion">
                                        <a href="#" class="px-3 py-2 menu-link" data-kt-element="mode"
                                            data-kt-value="light">
                                            <span class="menu-icon" data-kt-element="icon">
                                                {{-- begin::Svg Icon | path: icons/duotune/general/gen060.svg --}}
                                                <span class="svg-icon svg-icon-3">
                                                    <svg width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M11.9905 5.62598C10.7293 5.62574 9.49646 5.9995 8.44775 6.69997C7.39903 7.40045 6.58159 8.39619 6.09881 9.56126C5.61603 10.7263 5.48958 12.0084 5.73547 13.2453C5.98135 14.4823 6.58852 15.6185 7.48019 16.5104C8.37186 17.4022 9.50798 18.0096 10.7449 18.2557C11.9818 18.5019 13.2639 18.3757 14.429 17.8931C15.5942 17.4106 16.5901 16.5933 17.2908 15.5448C17.9915 14.4962 18.3655 13.2634 18.3655 12.0023C18.3637 10.3119 17.6916 8.69129 16.4964 7.49593C15.3013 6.30056 13.6808 5.62806 11.9905 5.62598Z"
                                                            fill="currentColor" />
                                                        <path
                                                            d="M22.1258 10.8771H20.627C20.3286 10.8771 20.0424 10.9956 19.8314 11.2066C19.6204 11.4176 19.5018 11.7038 19.5018 12.0023C19.5018 12.3007 19.6204 12.5869 19.8314 12.7979C20.0424 13.0089 20.3286 13.1274 20.627 13.1274H22.1258C22.4242 13.1274 22.7104 13.0089 22.9214 12.7979C23.1324 12.5869 23.2509 12.3007 23.2509 12.0023C23.2509 11.7038 23.1324 11.4176 22.9214 11.2066C22.7104 10.9956 22.4242 10.8771 22.1258 10.8771Z"
                                                            fill="currentColor" />
                                                        <path
                                                            d="M11.9905 19.4995C11.6923 19.5 11.4064 19.6187 11.1956 19.8296C10.9848 20.0405 10.8663 20.3265 10.866 20.6247V22.1249C10.866 22.4231 10.9845 22.7091 11.1953 22.9199C11.4062 23.1308 11.6922 23.2492 11.9904 23.2492C12.2886 23.2492 12.5746 23.1308 12.7854 22.9199C12.9963 22.7091 13.1147 22.4231 13.1147 22.1249V20.6247C13.1145 20.3265 12.996 20.0406 12.7853 19.8296C12.5745 19.6187 12.2887 19.5 11.9905 19.4995Z"
                                                            fill="currentColor" />
                                                        <path
                                                            d="M4.49743 12.0023C4.49718 11.704 4.37865 11.4181 4.16785 11.2072C3.95705 10.9962 3.67119 10.8775 3.37298 10.8771H1.87445C1.57603 10.8771 1.28984 10.9956 1.07883 11.2066C0.867812 11.4176 0.749266 11.7038 0.749266 12.0023C0.749266 12.3007 0.867812 12.5869 1.07883 12.7979C1.28984 13.0089 1.57603 13.1274 1.87445 13.1274H3.37299C3.6712 13.127 3.95706 13.0083 4.16785 12.7973C4.37865 12.5864 4.49718 12.3005 4.49743 12.0023Z"
                                                            fill="currentColor" />
                                                        <path
                                                            d="M11.9905 4.50058C12.2887 4.50012 12.5745 4.38141 12.7853 4.17048C12.9961 3.95954 13.1147 3.67361 13.1149 3.3754V1.87521C13.1149 1.57701 12.9965 1.29103 12.7856 1.08017C12.5748 0.869313 12.2888 0.750854 11.9906 0.750854C11.6924 0.750854 11.4064 0.869313 11.1955 1.08017C10.9847 1.29103 10.8662 1.57701 10.8662 1.87521V3.3754C10.8664 3.67359 10.9849 3.95952 11.1957 4.17046C11.4065 4.3814 11.6923 4.50012 11.9905 4.50058Z"
                                                            fill="currentColor" />
                                                        <path
                                                            d="M18.8857 6.6972L19.9465 5.63642C20.0512 5.53209 20.1343 5.40813 20.1911 5.27163C20.2479 5.13513 20.2772 4.98877 20.2774 4.84093C20.2775 4.69309 20.2485 4.54667 20.192 4.41006C20.1355 4.27344 20.0526 4.14932 19.948 4.04478C19.8435 3.94024 19.7194 3.85734 19.5828 3.80083C19.4462 3.74432 19.2997 3.71531 19.1519 3.71545C19.0041 3.7156 18.8577 3.7449 18.7212 3.80167C18.5847 3.85845 18.4607 3.94159 18.3564 4.04633L17.2956 5.10714C17.1909 5.21147 17.1077 5.33543 17.0509 5.47194C16.9942 5.60844 16.9649 5.7548 16.9647 5.90264C16.9646 6.05048 16.9936 6.19689 17.0501 6.33351C17.1066 6.47012 17.1895 6.59425 17.294 6.69878C17.3986 6.80332 17.5227 6.88621 17.6593 6.94272C17.7959 6.99923 17.9424 7.02824 18.0902 7.02809C18.238 7.02795 18.3844 6.99865 18.5209 6.94187C18.6574 6.88509 18.7814 6.80195 18.8857 6.6972Z"
                                                            fill="currentColor" />
                                                        <path
                                                            d="M18.8855 17.3073C18.7812 17.2026 18.6572 17.1195 18.5207 17.0627C18.3843 17.006 18.2379 16.9767 18.0901 16.9766C17.9423 16.9764 17.7959 17.0055 17.6593 17.062C17.5227 17.1185 17.3986 17.2014 17.2941 17.3059C17.1895 17.4104 17.1067 17.5345 17.0501 17.6711C16.9936 17.8077 16.9646 17.9541 16.9648 18.1019C16.9649 18.2497 16.9942 18.3961 17.0509 18.5326C17.1077 18.6691 17.1908 18.793 17.2955 18.8974L18.3563 19.9582C18.4606 20.0629 18.5846 20.146 18.721 20.2027C18.8575 20.2595 19.0039 20.2887 19.1517 20.2889C19.2995 20.289 19.4459 20.26 19.5825 20.2035C19.7191 20.147 19.8432 20.0641 19.9477 19.9595C20.0523 19.855 20.1351 19.7309 20.1916 19.5943C20.2482 19.4577 20.2772 19.3113 20.277 19.1635C20.2769 19.0157 20.2476 18.8694 20.1909 18.7329C20.1341 18.5964 20.051 18.4724 19.9463 18.3681L18.8855 17.3073Z"
                                                            fill="currentColor" />
                                                        <path
                                                            d="M5.09528 17.3072L4.0345 18.368C3.92972 18.4723 3.84655 18.5963 3.78974 18.7328C3.73294 18.8693 3.70362 19.0156 3.70346 19.1635C3.7033 19.3114 3.7323 19.4578 3.78881 19.5944C3.84532 19.7311 3.92822 19.8552 4.03277 19.9598C4.13732 20.0643 4.26147 20.1472 4.3981 20.2037C4.53473 20.2602 4.68117 20.2892 4.82902 20.2891C4.97688 20.2889 5.12325 20.2596 5.25976 20.2028C5.39627 20.146 5.52024 20.0628 5.62456 19.958L6.68536 18.8973C6.79007 18.7929 6.87318 18.6689 6.92993 18.5325C6.98667 18.396 7.01595 18.2496 7.01608 18.1018C7.01621 17.954 6.98719 17.8076 6.93068 17.671C6.87417 17.5344 6.79129 17.4103 6.68676 17.3058C6.58224 17.2012 6.45813 17.1183 6.32153 17.0618C6.18494 17.0053 6.03855 16.9763 5.89073 16.9764C5.74291 16.9766 5.59657 17.0058 5.46007 17.0626C5.32358 17.1193 5.19962 17.2024 5.09528 17.3072Z"
                                                            fill="currentColor" />
                                                        <path
                                                            d="M5.09541 6.69715C5.19979 6.8017 5.32374 6.88466 5.4602 6.94128C5.59665 6.9979 5.74292 7.02708 5.89065 7.02714C6.03839 7.0272 6.18469 6.99815 6.32119 6.94164C6.45769 6.88514 6.58171 6.80228 6.68618 6.69782C6.79064 6.59336 6.87349 6.46933 6.93 6.33283C6.9865 6.19633 7.01556 6.05003 7.01549 5.9023C7.01543 5.75457 6.98625 5.60829 6.92963 5.47184C6.87301 5.33539 6.79005 5.21143 6.6855 5.10706L5.6247 4.04626C5.5204 3.94137 5.39643 3.8581 5.25989 3.80121C5.12335 3.74432 4.97692 3.71493 4.82901 3.71472C4.68109 3.71452 4.53458 3.7435 4.39789 3.80001C4.26119 3.85652 4.13699 3.93945 4.03239 4.04404C3.9278 4.14864 3.84487 4.27284 3.78836 4.40954C3.73185 4.54624 3.70287 4.69274 3.70308 4.84066C3.70329 4.98858 3.73268 5.135 3.78957 5.27154C3.84646 5.40808 3.92974 5.53205 4.03462 5.63635L5.09541 6.69715Z"
                                                            fill="currentColor" />
                                                    </svg>
                                                </span>
                                                {{-- end::Svg Icon --}}
                                            </span>
                                            <span class="menu-title">
                                                Terang
                                            </span>
                                        </a>
                                    </div>
                                    {{-- end::Menu item --}}
                                    {{-- begin::Menu item --}}
                                    <div class="px-3 my-0 menu-item menu-accordion">
                                        <a href="#" class="px-3 py-2 menu-link" data-kt-element="mode"
                                            data-kt-value="dark">
                                            <span class="menu-icon" data-kt-element="icon">
                                                {{-- begin::Svg Icon | path: icons/duotune/general/gen061.svg --}}
                                                <span class="svg-icon svg-icon-3">
                                                    <svg width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M19.0647 5.43757C19.3421 5.43757 19.567 5.21271 19.567 4.93534C19.567 4.65796 19.3421 4.43311 19.0647 4.43311C18.7874 4.43311 18.5625 4.65796 18.5625 4.93534C18.5625 5.21271 18.7874 5.43757 19.0647 5.43757Z"
                                                            fill="currentColor" />
                                                        <path
                                                            d="M20.0692 9.48884C20.3466 9.48884 20.5714 9.26398 20.5714 8.98661C20.5714 8.70923 20.3466 8.48438 20.0692 8.48438C19.7918 8.48438 19.567 8.70923 19.567 8.98661C19.567 9.26398 19.7918 9.48884 20.0692 9.48884Z"
                                                            fill="currentColor" />
                                                        <path
                                                            d="M12.0335 20.5714C15.6943 20.5714 18.9426 18.2053 20.1168 14.7338C20.1884 14.5225 20.1114 14.289 19.9284 14.161C19.746 14.034 19.5003 14.0418 19.3257 14.1821C18.2432 15.0546 16.9371 15.5156 15.5491 15.5156C12.2257 15.5156 9.48884 12.8122 9.48884 9.48886C9.48884 7.41079 10.5773 5.47137 12.3449 4.35752C12.5342 4.23832 12.6 4.00733 12.5377 3.79251C12.4759 3.57768 12.2571 3.42859 12.0335 3.42859C7.32556 3.42859 3.42857 7.29209 3.42857 12C3.42857 16.7079 7.32556 20.5714 12.0335 20.5714Z"
                                                            fill="currentColor" />
                                                        <path
                                                            d="M13.0379 7.47998C13.8688 7.47998 14.5446 8.15585 14.5446 8.98668C14.5446 9.26428 14.7693 9.48891 15.0469 9.48891C15.3245 9.48891 15.5491 9.26428 15.5491 8.98668C15.5491 8.15585 16.225 7.47998 17.0558 7.47998C17.3334 7.47998 17.558 7.25535 17.558 6.97775C17.558 6.70015 17.3334 6.47552 17.0558 6.47552C16.225 6.47552 15.5491 5.76616 15.5491 4.93534C15.5491 4.65774 15.3245 4.43311 15.0469 4.43311C14.7693 4.43311 14.5446 4.65774 14.5446 4.93534C14.5446 5.76616 13.8688 6.47552 13.0379 6.47552C12.7603 6.47552 12.5357 6.70015 12.5357 6.97775C12.5357 7.25535 12.7603 7.47998 13.0379 7.47998Z"
                                                            fill="currentColor" />
                                                    </svg>
                                                </span>
                                                {{-- end::Svg Icon --}}
                                            </span>
                                            <span class="menu-title">
                                                Gelap
                                            </span>
                                        </a>
                                    </div>
                                    {{-- end::Menu item --}}
                                    {{-- begin::Menu item --}}
                                    <div class="px-3 my-0 menu-item menu-accordion">
                                        <a href="#" class="px-3 py-2 menu-link" data-kt-element="mode"
                                            data-kt-value="system">
                                            <span class="menu-icon" data-kt-element="icon">
                                                {{-- begin::Svg Icon | path: icons/duotune/general/gen062.svg --}}
                                                <span class="svg-icon svg-icon-3">
                                                    <svg width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M1.34375 3.9463V15.2178C1.34375 16.119 2.08105 16.8563 2.98219 16.8563H8.65093V19.4594H6.15702C5.38853 19.4594 4.75981 19.9617 4.75981 20.5757V21.6921H19.2403V20.5757C19.2403 19.9617 18.6116 19.4594 17.8431 19.4594H15.3492V16.8563H21.0179C21.919 16.8563 22.6562 16.119 22.6562 15.2178V3.9463C22.6562 3.04516 21.9189 2.30786 21.0179 2.30786H2.98219C2.08105 2.30786 1.34375 3.04516 1.34375 3.9463ZM12.9034 9.9016C13.241 9.98792 13.5597 10.1216 13.852 10.2949L15.0393 9.4353L15.9893 10.3853L15.1297 11.5727C15.303 11.865 15.4366 12.1837 15.523 12.5212L16.97 12.7528V13.4089H13.9851C13.9766 12.3198 13.0912 11.4394 12 11.4394C10.9089 11.4394 10.0235 12.3198 10.015 13.4089H7.03006V12.7528L8.47712 12.5211C8.56345 12.1836 8.69703 11.8649 8.87037 11.5727L8.0107 10.3853L8.96078 9.4353L10.148 10.2949C10.4404 10.1215 10.759 9.98788 11.0966 9.9016L11.3282 8.45467H12.6718L12.9034 9.9016ZM16.1353 7.93758C15.6779 7.93758 15.3071 7.56681 15.3071 7.1094C15.3071 6.652 15.6779 6.28122 16.1353 6.28122C16.5926 6.28122 16.9634 6.652 16.9634 7.1094C16.9634 7.56681 16.5926 7.93758 16.1353 7.93758ZM2.71385 14.0964V3.90518C2.71385 3.78023 2.81612 3.67796 2.94107 3.67796H21.0589C21.1839 3.67796 21.2861 3.78023 21.2861 3.90518V14.0964C15.0954 14.0964 8.90462 14.0964 2.71385 14.0964Z"
                                                            fill="currentColor" />
                                                    </svg>
                                                </span>
                                                {{-- end::Svg Icon --}}
                                            </span>
                                            <span class="menu-title">
                                                Sesuai Sistem
                                            </span>
                                        </a>
                                    </div>
                                    {{-- end::Menu item --}}
                                </div>
                                {{-- end::Menu --}}
                            </div>
                            {{-- end::Theme mode --}}
                        </div>
                        {{-- end::Topbar --}}
                    </div>
                    {{-- end::Container --}}
                </div>
                {{-- end::Header --}}
                {{-- begin::Content --}}
                @yield('content')
                {{-- end::Content --}}
                {{-- begin::Footer --}}
                <div class="py-4 footer d-flex flex-lg-column " id="kt_footer">
                    {{-- begin::Container --}}
                    <div class="container d-flex flex-column flex-md-row flex-stack">
                        {{-- begin::Copyright --}}
                        <div class="order-2 text-dark order-md-1">
                            <span class="text-gray-400 fw-semibold me-1">Copyright &copy;
                                {{ Carbon\Carbon::now()->year }}</span>
                            <a href="{{ $appSetting->institution_url ?? url('') }}" target="_blank"
                                class="text-muted text-hover-primary fw-semibold me-2 fs-6">{{ $appSetting->institution_name ?? config('app.name') }}</a>
                        </div>
                        {{-- end::Copyright --}}
                        {{-- begin::Menu --}}
                        <ul class="order-1 menu menu-gray-600 menu-hover-primary fw-semibold">
                        </ul>
                        {{-- end::Menu --}}
                    </div>
                    {{-- end::Container --}}
                </div>
                {{-- end::Footer --}}
            </div>
            {{-- end::Wrapper --}}
        </div>
        {{-- end::Page --}}
    </div>
    {{-- end::Root --}}
    {{-- begin::Modal Log Out --}}
    <div class="modal fade" tabindex="-1" id="logout_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi Log Out</h5>

                    {{-- begin::Close --}}
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span class="svg-icon svg-icon-2x">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)"
                                    fill="currentColor">
                                    <rect fill="currentColor" x="0" y="7" width="16" height="2"
                                        rx="1"></rect>
                                    <rect fill="currentColor" opacity="0.5"
                                        transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)"
                                        x="0" y="7" width="16" height="2" rx="1">
                                    </rect>
                                </g>
                            </svg>
                        </span>
                    </div>
                    {{-- end::Close --}}
                </div>

                <div class="modal-body">
                    <p>Yakin ingin log out?</p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tidak</button>
                    <button type="button"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                        class="btn btn-primary">Ya</button>
                </div>
            </div>
        </div>
    </div>
    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
        @csrf
    </form>
    {{-- end::Modal Log Out --}}
    {{-- end::Main --}}
    {{-- begin::Scrolltop --}}
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        {{-- begin::Svg Icon | path: icons/duotune/arrows/arr066.svg --}}
        <span class="svg-icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1"
                    transform="rotate(90 13 6)" fill="currentColor" />
                <path
                    d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                    fill="currentColor" />
            </svg>
        </span>
        {{-- end::Svg Icon --}}
    </div>
    {{-- end::Scrolltop --}}
    {{-- begin::Javascript --}}
    {{-- begin::Global Javascript Bundle(mandatory for all pages) --}}
    <script src="{{ asset('themes/admin/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('themes/admin/js/scripts.bundle.js') }}"></script>
    {{-- end::Global Javascript Bundle --}}
    {{-- begin::Vendors Javascript(used for this page only) --}}
    @yield('page_scripts')
    {{-- end::Custom Javascript --}}
    {{-- end::Javascript --}}
</body>
{{-- end::Body --}}

</html>
