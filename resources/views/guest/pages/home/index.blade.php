@extends('guest.layouts.app')

@section('title')
    Beranda
@endsection

@section('content')
    {{-- ====== Start Hero Area ====== --}}
    <section class="hero-area-v2">
        <div class="hero-content-wrapper">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-center">
                    <div class="col-xl-5 col-lg-6 col-md-8">
                        <div class="hero-content">
                            <span class="title-tag wow fadeInDown" data-wow-delay="0.1s">
                                @if ($appSetting != null)
                                    {{ $appSetting->highlight_text }}
                                @endif
                            </span>
                            <h1 class="hero-title wow fadeInUp" data-wow-delay="0.3s">
                                @if ($appSetting != null)
                                    {{ $appSetting->header_text }}
                                @endif
                            </h1>
                            <span class="title-tag wow fadeInDown" data-wow-delay="0.2s">
                                @if ($appSetting != null)
                                    {{ $appSetting->subheader_text }}
                                @endif
                            </span>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-6 col-md-10">
                        <div class="text-center hero-img preview-blob-image with-floating-icon wow fadeInUp"
                            data-wow-delay="0.4s">
                            <img src="{{ asset('images/illustrations/hero-blob.png') }}" alt="Image">

                            <div class="floating-icons">
                                <img src="{{ asset('themes/guest/img/particle/thumbs-up-white.png') }}" alt="Icon"
                                    class="icon-1 animate-float-bob-y">
                                <img src="{{ asset('themes/guest/img/particle/announcement-mic-white.png') }}"
                                    alt="Icon" class="icon-2 animate-float-bob-x">
                                <img src="{{ asset('themes/guest/img/particle/paper-plane-white.png') }}" alt="Icon"
                                    class="icon-3 animate-float-bob-x">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- ====== End Hero Area ====== --}}
@endsection
