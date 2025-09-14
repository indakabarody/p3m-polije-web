@php
    $appSetting = App\Models\AppSetting::first();
@endphp

@extends('guest.layouts.app')

@section('title')
    Layanan
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

    {{-- ===== Shop Area Start ===== --}}
    <section class="shop-area p-t-130 p-b-130">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="prduct-items-wrap">
                        <div class="row justify-content-center">
                            @foreach ($services as $service)
                                <div class="col-xl-4 col-md-6">
                                    <div class="product-item wow fadeInUp" data-wow-delay="0.4s">
                                        @if ($service)
                                        @endif
                                        {{-- <span class="badge">New</span> --}}
                                        @if ($service->image != null)
                                            <div class="image">
                                                <img src="{{ asset('storage/admin/services/' . $service->id . '/' . $service->image) }}"
                                                    alt="Image">
                                                <a href="{{ route('services.show', $service->slug) }}" class="cart-btn">lihat layanan</a>
                                            </div>
                                        @endif
                                        <div class="content">
                                            <h6><a
                                                    href="{{ route('services.show', $service->slug) }}">{{ $service->name }}</a>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        {{-- <ul class="flex-wrap shop-pagination justify-content-center m-t-30 wow fadeInUp custom-ul"
                            data-wow-delay="0.2s">
                            <li class="page-item disabled">
                                <span class="page-link"><i class="fas fa-angle-double-left"></i></span>
                            </li>
                            <li class="page-item active">
                                <span class="page-link">
                                    01
                                    <span class="sr-only">(current)</span>
                                </span>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">02</a></li>
                            <li class="page-item"><a class="page-link" href="#">03</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#"><i class="fas fa-angle-double-right"></i></a>
                            </li>
                        </ul> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- ===== Shop Area End ===== --}}
@endsection
