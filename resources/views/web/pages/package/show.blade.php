@extends('web.layouts.main')
@section('title', 'Appsytech Non Profit Organization')

@section('content')


<!-- Hero Section Start -->
<div class="breadcrumb-wrapper fix bg-cover" style="background-image: url(assets/img/inner-page/breadcrumb.png);">
    <div class="container">
        <div class="page-heading">
            <div class="breadcrumb-sub-title">
                <h1 class="wow fadeInUp" data-wow-delay=".3s">Package Details</h1>
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
                    Package Details
                </li>
            </ul>
        </div>
    </div>
</div>

@php
$package = $data['package'];
@endphp


<!-- News Section Start -->
<section class="news-details-section section-padding fix">
    <div class="container">
        <div class="news-details-wrapper">
            <div class="row g-4">
                <div class="col-lg-8 col-12">
                    <div class="news-details-post">
                        <div class="news-details-image">
                            <img src="{{ asset('storage/' . $package->image) }}" alt="img">
                        </div>
                        <div class="news-details-content">
                            <ul class="date-list">
                                <li>
                                    <i class="fa-solid fa-calendar-days"></i>
                                    {{ \Illuminate\Support\Carbon::parse($package->created_at)->format('Y-m-d') }}
                                </li>
                                <!-- <li>
                                    <i class="fa-regular fa-location-dot"></i>
                                    University Campus, Animal Welfare Center
                                </li> -->



                            </ul>
                            <p>
                                {{ $package->content ?? '' }}
                            </p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="main-sideber">
                        <!-- <div class="single-sidebar-widget">
                            <div class="wid-title">
                                <h4>Search</h4>
                            </div>
                            <div class="search-widget">
                                <form action="#">
                                    <input type="text" placeholder="Search here">
                                    <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                                </form>
                            </div>
                        </div> -->
                        <div class="single-sidebar-widget">
                            <div class="wid-title">
                                <h4>Recent Packages</h4>
                            </div>
                            <div class="recent-post-area">
                                @if($data['relatedPackages']->isNotEmpty())
                                @foreach($data['relatedPackages'] as $package)
                                <div class="recent-items">
                                    <div class="recent-thumb">
                                        <img src="{{ asset('storage/' . $package->image) }}" alt="img">
                                    </div>
                                    <div class="recent-content">
                                        <h6>
                                            <a href="{{ route('web.package.show', encrypt($package->id)) }}">
                                                {{ $package->title  ?? '' }}
                                            </a>
                                        </h6>
                                        <ul>
                                            <li>
                                                {{ \Illuminate\Support\Carbon::parse($package->created_at)->format('Y-m-d') }}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                @endforeach
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection