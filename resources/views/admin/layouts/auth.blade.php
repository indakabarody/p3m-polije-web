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
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
</head>
{{-- end::Head --}}
{{-- begin::Body --}}

<body id="kt_body" class="auth-bg bgi-size-cover bgi-position-center">
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
        {{-- begin::Page bg image --}}
        <style>
            body {
                background-image: url('{{ asset('themes/admin/media/auth/bg10.jpeg') }}');
            }

            [data-bs-theme="dark"] body {
                background-image: url('{{ asset('themes/admin/media/auth/bg10-dark.jpeg') }}');
            }
        </style>
        {{-- end::Page bg image --}}
        {{-- begin::Authentication - Sign-in --}}
        <div class="d-flex flex-column flex-lg-row flex-column-fluid">
            {{-- begin::Aside --}}
            <div class="d-flex flex-lg-row-fluid">
                {{-- begin::Content --}}
                <div class="d-flex flex-column flex-center pb-0 pb-lg-10 p-10 w-100">
                    {{-- begin::Image --}}
                    <img class="theme-light-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20"
                        src="{{ asset('themes/admin/media/auth/agency.png') }}" alt="" />
                    <img class="theme-dark-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20"
                        src="{{ asset('themes/admin/media/auth/agency-dark.png') }}" alt="" />
                    {{-- end::Image --}}
                    {{-- begin::Title --}}
                    <h1 class="text-gray-800 fs-2qx fw-bold text-center mb-7">
                        {{ config('app.name') }}
                    </h1>
                    {{-- end::Title --}}
                </div>
                {{-- end::Content --}}
            </div>
            {{-- begin::Aside --}}
            @yield('content')
        </div>
        {{-- end::Authentication - Sign-in --}}
    </div>
    {{-- end::Root --}}
    {{-- end::Main --}}
    {{-- begin::Javascript --}}
    {{-- begin::Global Javascript Bundle(mandatory for all pages) --}}
    <script src="{{ asset('themes/admin/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('themes/admin/js/scripts.bundle.js') }}"></script>
    {{-- end::Global Javascript Bundle --}}
    {{-- begin::Custom Javascript(used for this page only) --}}
    <script src="{{ asset('themes/admin/js/custom/authentication/sign-in/general.js') }}"></script>
    {{-- end::Custom Javascript --}}
    {{-- end::Javascript --}}
</body>
{{-- end::Body --}}

</html>
