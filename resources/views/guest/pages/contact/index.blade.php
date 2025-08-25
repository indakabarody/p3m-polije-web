@php
    $appSetting = App\Models\AppSetting::first();
@endphp

@extends('guest.layouts.app')

@section('title')
    Kontak P3M
@endsection

@section('content')
    {{-- Start Search From --}}
    <div class="modal fade search-area" id="search-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form>
                    <input type="text" placeholder="Search here...">
                    <button class="search-btn"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>
    </div>
    {{-- End Search From --}}

    {{-- ====== Page title area Start ====== --}}
    <section class="page-title-area">
        <div class="container">
            <div class="text-center page-title-content">
                <h1 class="page-title">@yield('title')</h1>
            </div>
        </div>
        <div class="page-title-effect d-none d-md-block">
            <img class="particle-1 animate-zoom-fade" src="{{ asset('themes/guest/img/particle/particle-1.png') }}"
                alt="particle One">
            <img class="particle-2 animate-rotate-me" src="{{ asset('themes/guest/img/particle/particle-2.png') }}"
                alt="particle Two">
            <img class="particle-3 animate-float-bob-x" src="{{ asset('themes/guest/img/particle/particle-3.png') }}"
                alt="particle Three">
            <img class="particle-4 animate-float-bob-y" src="{{ asset('themes/guest/img/particle/particle-4.png') }}"
                alt="particle Four">
            <img class="particle-5 animate-float-bob-y" src="{{ asset('themes/guest/img/particle/particle-5.png') }}"
                alt="particle Five">
        </div>
    </section>
    {{-- ====== Page title area End ====== --}}

    {{-- ====== Start Contact Area ====== --}}
    <section class="blog-area p-t-130 p-b-130">
        <div class="container">
            <div class="row justify-content-lg-start justify-content-center">
                <div class="col-xl-4 col-lg-5 col-md-7 col-sm-10">
                    <div class="contact-info-boxes-v2">
                        @if ($appSetting != null && $appSetting->company_address != null)
                            <div class="contact-info-box m-b-30 wow fadeInUp" data-wow-delay="0.3s">
                                <div class="icon icon-gradient-1">
                                    <i class="fal fa-map-marker-alt"></i>
                                </div>
                                <div class="info-body">
                                    <h5 class="title">Alamat</h5>
                                    <p>{{ $appSetting->company_address }}</p>
                                </div>
                            </div>
                        @endif

                        @if ($appSetting != null && $appSetting->company_email != null)
                            <div class="contact-info-box m-b-30 wow fadeInUp" data-wow-delay="0.4s">
                                <div class="icon icon-gradient-2">
                                    <i class="fal fa-envelope-open-text"></i>
                                </div>
                                <div class="info-body">
                                    <h5 class="title">Email</h5>
                                    <p><a
                                            href="mailto:{{ $appSetting->company_email }}">{{ $appSetting->company_email }}</a>
                                    </p>
                                </div>
                            </div>
                        @endif

                        @if ($appSetting != null && $appSetting->company_phone != null)
                            <div class="contact-info-box wow fadeInUp" data-wow-delay="0.5s">
                                <div class="icon icon-gradient-3">
                                    <i class="fal fa-phone"></i>
                                </div>
                                <div class="info-body">
                                    <h5 class="title">Telp</h5>
                                    <p><a href="tel:{{ $appSetting->company_phone }}">{{ $appSetting->company_phone }}</a>
                                    </p>
                                    {{-- <p><a href="tel:+8563214">+8563214</a></p> --}}
                                </div>
                            </div>
                        @endif

                    </div>
                </div>
                @if ($appSetting != null && $appSetting->company_google_maps_iframe != null)
                    <div class="col-lg-7 offset-xl-1 col-md-12">
                        <div class="contact-map">
                            {!! $appSetting->company_google_maps_iframe !!}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
    {{-- ====== End Contact Area ====== --}}
@endsection
