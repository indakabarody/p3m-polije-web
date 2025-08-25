@php
    $appSetting = App\Models\AppSetting::first();
@endphp

@extends('guest.layouts.app')

@section('title')
    Kategori Blog: {{ $blogCategory->name }}
@endsection

@section('content')
    {{-- ====== Page title area Start ====== --}}
    <section class="page-title-area">
        <div class="container">
            <div class="page-title-content text-center">
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

    {{-- ====== Start Blog Standard Loop ====== --}}
    <section class="blog-area p-t-130 p-b-130">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="blog-post-items p-r-40 p-r-lg-0">
                        @foreach ($blogs as $blog)
                            <div class="single-blog-post @empty($blog->thumbnail) no-thumbnail @endempty">
                                @isset($blog->thumbnail)
                                    <div class="post-thumbnail">
                                        <img src="{{ asset('storage/admin/blog-thumbnails/' . $blog->admin_id . '/' . $blog->thumbnail) }}"
                                            alt="{{ $blog->title }}">
                                    </div>
                                @endisset
                                <div class="post-content">
                                    <ul class="post-meta">
                                        <li><a href="#" class="post-meta"><i
                                                    class="far fa-user"></i>{{ $blog->admin->name }}</a>
                                        </li>
                                        <li><a href="#" class="post-meta"><i
                                                    class="far fa-calendar-alt"></i>{{ $blog->created_at->format('d F Y') }}</a>
                                        </li>
                                    </ul>
                                    <h4 class="post-title">
                                        <a href="{{ route('blogs.show', $blog->slug) }}">{{ $blog->title }}</a>
                                    </h4>

                                    <a href="{{ route('blogs.show', $blog->slug) }}" class="post-read-more">Selengkapnya<i
                                            class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{ $blogs->links('pagination::landio') }}
                </div>
            </div>
        </div>
    </section>
    {{-- ====== End Blog Standard Loop ====== --}}
@endsection
