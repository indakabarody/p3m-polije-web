@php
    $appSetting = App\Models\AppSetting::first();
@endphp
<!DOCTYPE html>
{{--
Product Name: Metronic - Bootstrap 5 HTML Multi-purpose Admin Dashboard ThemeAuthor: KeenThemes
Purchase: https://1.envato.market/EA4JPWebsite: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project. --}}
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
{{-- begin::Head --}}

<head>
    <meta charset="utf-8" />
    <title>@yield('title') - {{ config('app.name') }}</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="canonical" href="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" />
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />
    {{-- begin::Fonts --}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    {{-- end::Fonts --}}
    {{-- begin::Global Stylesheets Bundle(used by all pages) --}}
    <link href="{{ asset('themes/admin/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('themes/admin/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    {{-- end::Global Stylesheets Bundle --}}
</head>
{{-- end::Head --}}
{{-- begin::Body --}}

<body id="kt_body"
    class="bg-white header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed toolbar-tablet-and-mobile-fixed aside-enabled aside-fixed"
    style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
    {{-- begin::Main --}}
    <div class="d-flex flex-column flex-root">
        {{-- begin::Authentication - Error 404 --}}
        <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed"
            style="background-size1: 100% 50%; background-image: url({{ asset('themes/admin/media/svg/illustrations/progress.svg') }})">
            {{-- begin::Content --}}
            <div class="p-10 text-center d-flex flex-column flex-column-fluid py-lg-20">
                {{-- begin::Logo --}}
                <a href="{{ url('') }}" class="mb-10 pt-lg-20">
                    <h1 class="text-dark">{{ config('app.name') }}</h1>
                </a>
                {{-- end::Logo --}}
                {{-- begin::Wrapper --}}
                <div class="pt-lg-10">
                    {{-- begin::Logo --}}
                    <h1 class="fw-bolder fs-2qx text-dark mb-7">@yield('title')</h1>
                    {{-- end::Logo --}}
                    {{-- begin::Message --}}
                    <div class="text-gray-400 fw-bold fs-3 mb-15">@yield('message')</div>
                    {{-- end::Message --}}
                    {{-- begin::Action --}}
                    <div class="text-center">
                        <a href="{{ url('') }}" class="btn btn-lg btn-primary fw-bolder">Ke Beranda</a>
                    </div>
                    {{-- end::Action --}}
                </div>
                {{-- end::Wrapper --}}
            </div>
            {{-- end::Content --}}
            {{-- begin::Footer --}}
            <div class="p-10 d-flex flex-center flex-column-auto">
                {{-- begin::Links --}}
                <div class="d-flex align-items-center fw-bold fs-6">
                    <a href="{{ route('home') }}" class="px-2 text-muted text-hover-primary">Copyright &copy;
                        {{ date('Y') }} {{ $appSetting->company_name }}</a>
                </div>
                {{-- end::Links --}}
            </div>
            {{-- end::Footer --}}
        </div>
        {{-- end::Authentication - Error 404 --}}
    </div>
    {{-- end::Main --}}
    {{-- begin::Javascript --}}
    {{-- begin::Global Javascript Bundle(used by all pages) --}}
    <script src="{{ asset('themes/admin/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('themes/admin/js/scripts.bundle.js') }}"></script>
    {{-- end::Global Javascript Bundle --}}
    {{-- end::Javascript --}}
</body>
{{-- end::Body --}}

</html>
