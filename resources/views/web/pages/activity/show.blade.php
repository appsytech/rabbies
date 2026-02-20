@extends('web.layouts.main')
@section('title', 'Appsytech Non Profit Organization')

@section('content')


<!-- Hero Section Start -->
<div class="breadcrumb-wrapper fix bg-cover" style="background-image: url(assets/img/inner-page/breadcrumb.png);">
    <div class="container">
        <div class="page-heading">
            <div class="breadcrumb-sub-title">
                <h1 class="wow fadeInUp" data-wow-delay=".3s">Activity Details</h1>
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
                    Activity Details
                </li>
            </ul>
        </div>
    </div>
</div>

<!-- Activity-Details Section Start -->
<section class="event-details-section section-padding fix">
    <div class="container">
        <div class="event-details-wrapper">
            <div class="row g-4">
                <div class="col-lg-8 col-12">
                    <div class="event-details-post">
                        <div class="event-details-image">
                            <img src="{{ asset('storage/' . $data['activity']->images) }}" alt="img">
                        </div>
                        <div class="event-details-content">
                            <h3>{{ $data['activity']->title }}</h3>
                            <ul class="event-list">
                                <!-- <li>
                                    <i class="fa-regular fa-location-dot"></i>
                                    New york, USA
                                </li>
                                <li>
                                    <i class="fa-regular fa-calendar-days"></i>
                                    22, Nov 2023
                                </li>
                                <li>
                                    <i class="fa-regular fa-clock"></i>
                                    09:00 PM
                                </li> -->
                            </ul>
                            <p>
                                {{ $data['activity']->description }}
                            </p>

                            <!-- <div class="row g-4">
                                <div class="col-lg-6">
                                    <div class="details-thumb">
                                        <img src="{{ asset('assets/img/inner-page/event-details/details-2.jpg') }}" alt="img">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="details-thumb">
                                        <img src="{{ asset('assets/img/inner-page/event-details/details-3.jpg') }}" alt="img">
                                    </div>
                                </div>
                            </div> -->
                            <!-- <p class="mt-4">
                                The is ipsum dolor sit amet consectetur adipiscing elit. Fusce eleifend porta arcu In
                                hac habitasse the is platea augue thelorem turpoi dictumst. In lacus libero faucibus at
                                malesuada sagittis placerat eros sed istincidunt augue ac ante rutrum sed the is sodales
                                augue consequat.
                            </p> -->
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
                                <h4>Recent Activities</h4>
                            </div>
                            <div class="recent-post-area">
                                @if($data['relatedActivities']->isNotEmpty())
                                @foreach($data['relatedActivities'] as $activity)
                                <div class="recent-items">
                                    <div class="recent-thumb">
                                        <img src="{{ asset('storage/' . $activity->images) }}" alt="img">
                                    </div>
                                    <div class="recent-content">
                                        <h6>
                                            <a href="{{ route('web.activity.show', encrypt($activity->id)) }}">
                                                {{ $activity->title  ?? '' }}
                                            </a>
                                        </h6>
                                        <ul>
                                            <li>
                                                {{ \Illuminate\Support\Carbon::parse($activity->created_at)->format('Y-m-d') }}
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