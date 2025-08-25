@php
    $appSetting = App\Models\AppSetting::first();
@endphp

@extends('guest.layouts.app')

@section('title')
    Galeri
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

    {{-- ====== Portfolio Section Start ====== --}}
    <section class="portfolio-section p-t-130 p-b-100">
        <div class="container">
            <div class="portfolio-items row">
                @foreach ($galleries as $gallery)
                    <div class="col-sm-6">
                        <div class="portfolio-box-two m-b-30">
                            <div class="portfolio-thumb">
                                <a href="{{ route('galleries.show', $gallery->slug) }}"
                                    style="background-image: url({{ asset('storage/admin/galleries/' . $gallery->id . '/' . $gallery->image) }});"></a>
                            </div>
                            <h5 class="title">
                                <a href="{{ route('galleries.show', $gallery->slug) }}">{{ $gallery->name }}</a>
                            </h5>
                            <div class="tags">
                                <a href="#">{{ $gallery->date->format('d F Y') }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    {{-- ====== Portfolio Section End ====== --}}
@endsection
