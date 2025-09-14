@php
    $appSetting = App\Models\AppSetting::first();
@endphp

@extends('guest.layouts.app')

@section('title')
    Struktur Organisasi
@endsection

@section('content')
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

    {{-- ====== Start Team Loop ====== --}}
    <section class="team-member-area section-half-dots-pattern-fixed p-t-130 p-b-100">
        <div class="container">
            {{-- <div class="row justify-content-center">
                <div class="col-xl-5 col-lg-6">
                    <div class="text-center common-heading tagline-boxed m-b-60">
                        <span class="tagline">Creative Team</span>
                        <h2 class="title">We Have Professional Creative Team </h2>
                    </div>
                </div>
            </div> --}}

            <div class="row team-members justify-content-center">
                @foreach ($teams as $team)
                    <div class="col-xl-3 col-md-6">
                        <div class="trainer-item wow fadeInUp" data-wow-delay="0.2s">
                            <div class="image">
                                @isset($team->image)
                                    <img src="{{ asset('storage/team/images/' . $team->id . '/' . $team->image) }}"
                                        alt="{{ $team->name }}" />
                                @else
                                    <img src="{{ asset('themes/admin/media/avatars/blank.png') }}" alt="{{ $team->name }}" />
                                @endisset
                            </div>
                            <div class="content">
                                <h5>{{ $team->name }}</h5>
                                <span>{{ $team->level }}</span>
                                <ul class="social-links custom-ul">
                                    @isset($team->facebook_url)
                                        <li class="facebook"><a href="{{ $team->facebook_url }}" target="_blank"><i
                                                    class="fab fa-facebook-f"></i></a></li>
                                    @endisset
                                    @isset($team->twitter_url)
                                        <li class="twitter"><a href="{{ $team->twitter_url }}" target="_blank"><i
                                                    class="fab fa-twitter"></i></a></li>
                                    @endisset
                                    @isset($team->instagram_url)
                                        <li class="instagram"><a href="{{ $team->instagram_url }}" target="_blank"><i
                                                    class="fab fa-instagram"></i></a></li>
                                    @endisset
                                    @isset($team->linkedin_url)
                                        <li class="linkedin"><a href="{{ $team->linkedin_url }}" target="_blank"><i
                                                    class="fab fa-linkedin"></i></a></li>
                                    @endisset
                                    @isset($team->google_scholar_url)
                                        <li class="instagram"><a href="{{ $team->google_scholar_url }}" target="_blank"><img
                                                    src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c7/Google_Scholar_logo.svg/1200px-Google_Scholar_logo.svg.png"
                                                    width="20"></a></li>
                                    @endisset
                                    @isset($team->scopus_url)
                                        <li class="instagram"><a href="{{ $team->scopus_url }}" target="_blank"><img
                                                    src="https://ieeeaccess.ieee.org/wp-content/uploads/2014/10/scopus-transparent.png"
                                                    width="20"></a></li>
                                    @endisset
                                    @isset($team->sinta_url)
                                        <li class="instagram"><a href="{{ $team->sinta_url }}" target="_blank"><img
                                                    src="https://sinta.kemdikbud.go.id/public/assets/img/brand_sinta.png"
                                                    width="20"></a></li>
                                    @endisset
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    {{-- ====== End Team Loop ====== --}}
@endsection
