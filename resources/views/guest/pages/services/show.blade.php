@extends('guest.layouts.app')

@section('title')
    {{ $service->name }}
@endsection

@section('content')
    {{-- ====== Page title area Start ====== --}}
    <section class="page-title-area">
        <div class="container">
            <div class="page-title-content text-center">
                <h1 class="page-title">{{ $service->name }}</h1>
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

    {{-- ====== Service Details Start ====== --}}
    <section class="service-details-area p-t-130 p-b-130">
        <div class="container">
            <div class="service-details-content">
                <h2 class="service-title">{{ $service->name }}</h2>

                <p class="m-b-30">{!! $service->description !!}</p>

            </div>
            <span class="pricing-table m-t-30">
                <div class="plan-cost">
                    <span class="price">{{ Akaunting\Money\Money::IDR($service->price_idr ?? 0) }}</span>
                    @switch($service->bill_type)
                        @case('Tahunan')
                            <span class="plan-type">/ Tahun</span>
                        @break

                        @case('Bulanan')
                            <span class="plan-type">/ Bulan</span>
                        @break

                        @default
                        @break
                    @endswitch
                </div>
            </span>
        </div>
    </section>
    {{-- ====== Service Details End ====== --}}
@endsection
