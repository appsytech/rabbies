@extends('web.layouts.main')
@section('title', 'Appsytech Non Profit Organization')

@section('content')

<!-- Hero Section Start -->
<div class="breadcrumb-wrapper fix bg-cover" style="background-image: url(assets/img/inner-page/breadcrumb.png);">
    <div class="container">
        <div class="page-heading">
            <div class="breadcrumb-sub-title">
                <h1 class="wow fadeInUp" data-wow-delay=".3s">Publication Grid</h1>
            </div>
            <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".5s">
                <li>
                    <a href="{{ route('web.homepage') }}">
                        Home
                    </a>
                </li>
                <li>
                    <i class="fa-solid fa-chevron-right"></i>
                </li>
                <li>
                    Publication
                </li>
            </ul>
        </div>
    </div>
</div>

<!-- News Section Start -->
<section class="news-section section-padding fix">
    <div class="container">
        <div class="row g-4">
            @if ($data['publications']->isNotEmpty())
            @foreach ($data['publications'] as $publication)
            <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                <div class="news-card-items mt-0">
                    <div class="news-image">
                        <img src="{{ asset('storage/' . $publication->thumbnail) }}" alt="img">
                        <div class="news-layer-wrapper">
                            <div class="news-layer-image" style="background-image: url('{{ asset('storage/' . $publication->thumbnail) }}');"></div>
                            <div class="news-layer-image" style="background-image: url('{{ asset('storage/' . $publication->thumbnail) }}');"></div>
                            <div class="news-layer-image" style="background-image: url('{{ asset('storage/' . $publication->thumbnail) }}');"></div>
                            <div class="news-layer-image" style="background-image: url('{{ asset('storage/' . $publication->thumbnail) }}');"></div>
                        </div>
                        <div class="bottom-shape">
                            <img src="{{ asset('assets/img/home-1/news/shape.png') }}" alt="img">
                        </div>
                    </div>
                    <div class="news-content">
                        <ul class="news-meta">
                            <li>
                                <i class="fa-regular fa-user"></i>
                                By : {{ $publication->author ?? ''}}
                            </li>
                            <!-- <li>
                                <i class="fa-regular fa-comment"></i>
                                45 Comments
                            </li> -->
                        </ul>
                        <h4>
                            <a href="{{ route('web.blog.show') }}">
                                {{ $publication->title ?? '' }}
                            </a>
                        </h4>
                        <a href="{{ route('web.publication.show', encrypt($publication->id)) }}" class="link-btn">Read More <i class="fa-solid fa-arrow-right-long"></i></a>
                        @isset($publication->document)
                        <div class="mt-3">
                            <a href="{{ asset('storage/' . $publication->document) }}"
                                download
                                class="download-btn">
                                Download File
                            </a>
                        </div>
                        @endisset
                    </div>
                </div>
            </div>
            @endforeach
            @endif

        </div>
        <div class="page-nav-wrap text-center">
            <ul>
                <li><a class="page-numbers style-2" href="#"><i class="fa-solid fa-arrow-left"></i></a></li>
                <li class="active"><a class="page-numbers" href="#">01</a></li>
                <li><a class="page-numbers" href="#">02</a></li>
                <li><a class="page-numbers" href="#">03</a></li>
                <li><a class="page-numbers style-2" href="#"><i class="fa-solid fa-arrow-right"></i></a></li>
            </ul>
        </div>
    </div>
</section>

@endsection