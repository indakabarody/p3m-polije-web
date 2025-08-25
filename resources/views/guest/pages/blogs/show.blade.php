@php
    $appSetting = App\Models\AppSetting::first();
@endphp

@extends('guest.layouts.app')

@section('title')
    {{ $blog->title }}
@endsection

@section('content')
    <!--====== Start Blog Standard Loop ======-->
    <section class="blog-area p-t-130 p-b-130">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <!-- Blog Content -->
                    <div class="blog-details-content p-r-40 p-r-lg-0">
                        @isset($blog->thumbnail)
                            <div class="post-thumbnail">
                                <img src="{{ asset('storage/admin/blog-thumbnails/' . $blog->admin_id . '/' . $blog->thumbnail) }}"
                                    alt="{{ $blog->title }}">
                            </div>
                        @endisset

                        <div class="post-content">
                            <ul class="post-meta">
                                <li><a href="#" class="post-meta"><i
                                            class="far fa-user"></i>{{ $blog->admin->name }}</a></li>
                                <li><a href="#" class="post-meta"><i
                                            class="far fa-calendar-alt"></i>{{ $blog->created_at->format('d F Y') }}</a>
                                </li>
                            </ul>
                            <h3 class="post-title">
                                <a href="#">{{ $blog->title }}</a>
                            </h3>

                            {!! $blog->content !!}

                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog-sidebar m-t-md-80">
                        <div class="widget latest-post-widget">
                            <h4 class="widget-title">Postingan Terbaru</h4>
                            <div class="popular-posts-wrapper">
                                @foreach ($blogs as $blog)
                                    <div class="popular-posts-item">
                                        @isset($blog->thumbnail)
                                            <div class="popular-posts-thumbnail">
                                                <a href="{{ route('blogs.show', $blog->slug) }}">
                                                    <img src="{{ asset('storage/admin/blog-thumbnails/' . $blog->admin_id . '/' . $blog->thumbnail) }}"
                                                        alt="{{ $blog->title }}">
                                                </a>
                                            </div>
                                        @endisset
                                        <div class="popular-posts-item-content">
                                            <h5 class="popular-posts-title"><a
                                                    href="{{ route('blogs.show', $blog->slug) }}">{{ $blog->title }}</a></h5>
                                            <a href="#" class="posts-date"><i class="far fa-calendar-alt"></i>
                                                {{ $blog->created_at->format('d F Y') }}</a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== End Blog Standard Loop ======-->
@endsection
