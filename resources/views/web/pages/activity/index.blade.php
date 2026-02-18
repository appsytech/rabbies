@extends('web.layouts.main')
@section('title', 'Appsytech Non Profit Organization')

@section('content')

<!-- Hero Section Start -->
<div class="breadcrumb-wrapper fix bg-cover" style="background-image: url(assets/img/inner-page/breadcrumb.png);">
    <div class="container">
        <div class="page-heading">
            <div class="breadcrumb-sub-title">
                <h1 class="wow fadeInUp" data-wow-delay=".3s">Activity</h1>
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
                    Activity
                </li>
            </ul>
        </div>
    </div>
</div>

<!-- Activity Section Start -->
<section class="donation-section-2 section-padding fix">
    <div class="container">
        <div class="donation-wrapper-2">
            <div class="row g-4">
                @if ($data['activities']->isNotEmpty())
                @foreach ($data['activities'] as $activity)
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                    <div class="donation-card-item-2 mt-0">
                        <div class="left-shape">
                            <img src="{{ asset('assets/img/home-1/donation/shape-1.png') }}" alt="img">
                        </div>
                        <div class="donation-image">
                            <img src="{{ asset('storage/' . $activity->images) }}" alt="img">
                            <div class="news-layer-wrapper">
                                <div class="news-layer-image" style="background-image: url('{{ asset('storage/' . $activity->images) }}');"></div>
                                <div class="news-layer-image" style="background-image: url('{{ asset('storage/' . $activity->images) }}');"></div>
                                <div class="news-layer-image" style="background-image: url('{{ asset('storage/' . $activity->images) }}');"></div>
                                <div class="news-layer-image" style="background-image: url('{{ asset('storage/' . $activity->images) }}');"></div>
                            </div>
                        </div>
                        <div class="donation-content">
                            <h4>
                                <a href="{{ route('web.activity.show', encrypt($activity->id)) }}">{{ $activity->title }}</a>
                            </h4>
                            <!-- <div class="pro-items">
                                <div class="progress">
                                    <div class="progress-value style-two"></div>
                                </div>
                            </div> -->
                            <ul class="donate-list">
                                <li>
                                    Author - {{ $activity->author }}
                                </li>
                                <li>
                                    <span>Date - {{ \Illuminate\Support\Carbon::parse($activity->created_at)->format('Y-m-d') }}</span>
                                </li>
                            </ul>
                            <a href="{{ route('web.activity.show', encrypt($activity->id)) }}" class="theme-btn style-2">See More <i class="fa-solid fa-arrow-right-long"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif

            </div>
        </div>

        {{ $data['activities']->links('pagination::bootstrap-5') }}
    </div>
</section>

@endsection