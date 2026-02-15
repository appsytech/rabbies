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
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                    <div class="donation-card-item-2 mt-0">
                        <div class="left-shape">
                            <img src="assets/img/home-1/donation/shape-1.png" alt="img">
                        </div>
                        <div class="donation-image">
                            <img src="assets/img/home-1/donation/01.jpg" alt="img">
                            <div class="news-layer-wrapper">
                                <div class="news-layer-image" style="background-image: url('assets/img/home-1/donation/01.jpg');"></div>
                                <div class="news-layer-image" style="background-image: url('assets/img/home-1/donation/01.jpg');"></div>
                                <div class="news-layer-image" style="background-image: url('assets/img/home-1/donation/01.jpg');"></div>
                                <div class="news-layer-image" style="background-image: url('assets/img/home-1/donation/01.jpg');"></div>
                            </div>
                        </div>
                        <div class="donation-content">
                            <h4>
                                <a href="{{ route('web.activity.show') }}">Emergency Animal Rescue & Medical Care</a>
                            </h4>
                            <div class="pro-items">
                                <div class="progress">
                                    <div class="progress-value style-two"></div>
                                </div>
                            </div>
                            <ul class="donate-list">
                                <li>
                                    Author - Rescue Team
                                </li>
                                <li>
                                    <span>Date - 20/01/2026</span>
                                </li>
                            </ul>
                            <a href="{{ route('web.activity.show') }}" class="theme-btn style-2">See More <i class="fa-solid fa-arrow-right-long"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".5s">
                    <div class="donation-card-item-2 mt-0">
                        <div class="left-shape">
                            <img src="assets/img/home-1/donation/shape-2.png" alt="img">
                        </div>
                        <div class="donation-image">
                            <img src="assets/img/home-1/donation/02.jpg" alt="img">
                            <div class="news-layer-wrapper">
                                <div class="news-layer-image" style="background-image: url('assets/img/home-1/donation/02.jpg');"></div>
                                <div class="news-layer-image" style="background-image: url('assets/img/home-1/donation/02.jpg');"></div>
                                <div class="news-layer-image" style="background-image: url('assets/img/home-1/donation/02.jpg');"></div>
                                <div class="news-layer-image" style="background-image: url('assets/img/home-1/donation/02.jpg');"></div>
                            </div>
                        </div>
                        <div class="donation-content">
                            <h4>
                                <a href="{{ route('web.activity.show') }}">Student Volunteer Training Program</a>
                            </h4>
                            <div class="pro-items style-2">
                                <div class="progress">
                                    <div class="progress-value style-two"></div>
                                </div>
                            </div>
                            <ul class="donate-list">
                                <li>
                                    Author - Training Coordinator
                                </li>
                                <li>
                                    <span>Date - 25/01/2026</span>
                                </li>
                            </ul>
                            <a href="{{ route('web.activity.show') }}" class="theme-btn">See More <i class="fa-solid fa-arrow-right-long"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".7s">
                    <div class="donation-card-item-2 mt-0">
                        <div class="left-shape">
                            <img src="assets/img/home-1/donation/shape-3.png" alt="img">
                        </div>
                        <div class="donation-image">
                            <img src="assets/img/home-1/donation/02.jpg" alt="img">
                            <div class="news-layer-wrapper">
                                <div class="news-layer-image" style="background-image: url('assets/img/home-1/donation/02.jpg');"></div>
                                <div class="news-layer-image" style="background-image: url('assets/img/home-1/donation/02.jpg');"></div>
                                <div class="news-layer-image" style="background-image: url('assets/img/home-1/donation/02.jpg');"></div>
                                <div class="news-layer-image" style="background-image: url('assets/img/home-1/donation/02.jpg');"></div>
                            </div>
                        </div>
                        <div class="donation-content">
                            <h4>
                                <a href="{{ route('web.activity.show') }}">Daily Feeding & Nutrition Support</a>
                            </h4>
                            <div class="pro-items style-3">
                                <div class="progress">
                                    <div class="progress-value style-two"></div>
                                </div>
                            </div>
                            <ul class="donate-list">
                                <li>
                                    Author - Feeding Team
                                </li>
                                <li>
                                    <span>Date - 28/01/2026</span>
                                </li>
                            </ul>
                            <a href="{{ route('web.activity.show') }}" class="theme-btn style-3">See More <i class="fa-solid fa-arrow-right-long"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                    <div class="donation-card-item-2 mt-0">
                        <div class="left-shape">
                            <img src="assets/img/home-1/donation/shape-3.png" alt="img">
                        </div>
                        <div class="donation-image">
                            <img src="assets/img/home-1/donation/01.jpg" alt="img">
                            <div class="news-layer-wrapper">
                                <div class="news-layer-image" style="background-image: url('assets/img/home-1/donation/01.jpg');"></div>
                                <div class="news-layer-image" style="background-image: url('assets/img/home-1/donation/01.jpg');"></div>
                                <div class="news-layer-image" style="background-image: url('assets/img/home-1/donation/01.jpg');"></div>
                                <div class="news-layer-image" style="background-image: url('assets/img/home-1/donation/01.jpg');"></div>
                            </div>
                        </div>
                        <div class="donation-content">
                            <h4>
                                <a href="{{ route('web.activity.show') }}">Free Vaccination & Sterilization Camp</a>
                            </h4>
                            <div class="pro-items style-3">
                                <div class="progress">
                                    <div class="progress-value style-two"></div>
                                </div>
                            </div>
                            <ul class="donate-list">
                                <li>
                                    Author - Medical Team
                                </li>
                                <li>
                                    <span>Date - 22/01/2026</span>
                                </li>
                            </ul>
                            <a href="{{ route('web.activity.show') }}" class="theme-btn style-3">See More <i class="fa-solid fa-arrow-right-long"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".5s">
                    <div class="donation-card-item-2 mt-0">
                        <div class="left-shape">
                            <img src="assets/img/home-1/donation/shape-2.png" alt="img">
                        </div>
                        <div class="donation-image">
                            <img src="assets/img/home-1/donation/02.jpg" alt="img">
                            <div class="news-layer-wrapper">
                                <div class="news-layer-image" style="background-image: url('assets/img/home-1/donation/02.jpg');"></div>
                                <div class="news-layer-image" style="background-image: url('assets/img/home-1/donation/02.jpg');"></div>
                                <div class="news-layer-image" style="background-image: url('assets/img/home-1/donation/02.jpg');"></div>
                                <div class="news-layer-image" style="background-image: url('assets/img/home-1/donation/02.jpg');"></div>
                            </div>
                        </div>
                        <div class="donation-content">
                            <h4>
                                <a href="{{ route('web.activity.show') }}">Animal Shelter & Rehabilitation Center</a>
                            </h4>
                            <div class="pro-items style-2">
                                <div class="progress">
                                    <div class="progress-value style-two"></div>
                                </div>
                            </div>
                            <ul class="donate-list">
                                <li>
                                    Author - Shelter Manager
                                </li>
                                <li>
                                    <span>Date - 18/01/2026</span>
                                </li>
                            </ul>
                            <a href="{{ route('web.activity.show') }}" class="theme-btn">See More <i class="fa-solid fa-arrow-right-long"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".7s">
                    <div class="donation-card-item-2 mt-0">
                        <div class="left-shape">
                            <img src="assets/img/home-1/donation/shape-1.png" alt="img">
                        </div>
                        <div class="donation-image">
                            <img src="assets/img/home-1/donation/01.jpg" alt="img">
                            <div class="news-layer-wrapper">
                                <div class="news-layer-image" style="background-image: url('assets/img/home-1/donation/02.jpg');"></div>
                                <div class="news-layer-image" style="background-image: url('assets/img/home-1/donation/02.jpg');"></div>
                                <div class="news-layer-image" style="background-image: url('assets/img/home-1/donation/02.jpg');"></div>
                                <div class="news-layer-image" style="background-image: url('assets/img/home-1/donation/02.jpg');"></div>
                            </div>
                        </div>
                        <div class="donation-content">
                            <h4>
                                <a href="{{ route('web.activity.show') }}">Adoption Drive – Give Them A Home</a>
                            </h4>
                            <div class="pro-items">
                                <div class="progress">
                                    <div class="progress-value style-two"></div>
                                </div>
                            </div>
                            <ul class="donate-list">
                                <li>
                                    Author - Adoption Team
                                </li>
                                <li>
                                    <span>Date - 30/01/2026</span>
                                </li>
                            </ul>
                            <a href="{{ route('web.activity.show') }}" class="theme-btn style-2">See More <i class="fa-solid fa-arrow-right-long"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection