@extends('guest.layouts.app')

@section('title')
    {{ $gallery->name }}
@endsection

@section('content')
    {{-- ====== Page title area Start ====== --}}
    <section class="page-title-area">
        <div class="container">
            <div class="text-center page-title-content">
                <h1 class="page-title">{{ $gallery->name }}</h1>
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

    {{-- ====== Portfolio Area Start ====== --}}
    <section class="portfolio-section p-t-130 p-b-130">
        <div class="container">
            <div class="row justify-content-center">
                <div class="order-first col-12">
                    <div class="portfolio-thumb">
                        <img src="{{ asset('storage/admin/galleries/' . $gallery->id . '/' . $gallery->image) }}"
                            alt="Image">
                    </div>
                </div>
                <div class="col-lg-4 col-md-11 order-lg-last">

                </div>
                <div class="col-lg-8 col-md-11">
                    <div class="portfolio-details-content m-t-60 wow fadeInUp">
                        <h2 class="portfolio-title">{{ $gallery->name }}</h2>
                        <p class="m-b-30">
                            {!! $gallery->description !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- ====== Portfolio Area End ====== --}}
@endsection

@section('page_metas')
    <meta name="keywords" content="{{ $gallery->keywords }}">
@endsection
