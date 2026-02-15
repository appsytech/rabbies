@extends('web.layouts.main')
@section('title', 'Appsytech Non Profit Organization')

@section('content')

<!-- Hero Section Start -->
<div class="breadcrumb-wrapper fix bg-cover" style="background-image: url(assets/img/inner-page/breadcrumb.png);">
    <div class="container">
        <div class="page-heading">
            <div class="breadcrumb-sub-title">
                <h1 class="wow fadeInUp" data-wow-delay=".3s">Blog Grid</h1>
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
                    Blog Grid
                </li>
            </ul>
        </div>
    </div>
</div>

<!-- News Section Start -->
<section class="news-section section-padding fix">
    <div class="container">
        <div class="row g-4">
            <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                <div class="news-card-items mt-0">
                    <div class="news-image">
                        <img src="assets/img/home-1/news/01.jpg" alt="img">
                        <div class="news-layer-wrapper">
                            <div class="news-layer-image" style="background-image: url('assets/img/home-1/news/01.jpg');"></div>
                            <div class="news-layer-image" style="background-image: url('assets/img/home-1/news/01.jpg');"></div>
                            <div class="news-layer-image" style="background-image: url('assets/img/home-1/news/01.jpg');"></div>
                            <div class="news-layer-image" style="background-image: url('assets/img/home-1/news/01.jpg');"></div>
                        </div>
                        <div class="bottom-shape">
                            <img src="assets/img/home-1/news/shape.png" alt="img">
                        </div>
                    </div>
                    <div class="news-content">
                        <ul class="news-meta">
                            <li>
                                <i class="fa-regular fa-user"></i>
                                By : Rescue Team
                            </li>
                            <li>
                                <i class="fa-regular fa-comment"></i>
                                45 Comments
                            </li>
                        </ul>
                        <h4>
                            <a href="{{ route('web.blog.show') }}">
                                Successful Night Rescue: 15 Street Dogs Saved
                            </a>
                        </h4>
                        <a href="{{ route('web.blog.show') }}" class="link-btn">Read More <i class="fa-solid fa-arrow-right-long"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".5s">
                <div class="news-card-items mt-0">
                    <div class="news-image">
                        <img src="assets/img/home-1/news/07.jpg" alt="img">
                        <div class="news-layer-wrapper">
                            <div class="news-layer-image" style="background-image: url('assets/img/home-1/news/07.jpg');"></div>
                            <div class="news-layer-image" style="background-image: url('assets/img/home-1/news/07.jpg');"></div>
                            <div class="news-layer-image" style="background-image: url('assets/img/home-1/news/07.jpg');"></div>
                            <div class="news-layer-image" style="background-image: url('assets/img/home-1/news/07.jpg');"></div>
                        </div>
                        <div class="bottom-shape">
                            <img src="assets/img/home-1/news/shape.png" alt="img">
                        </div>
                    </div>
                    <div class="news-content">
                        <ul class="news-meta">
                            <li>
                                <i class="fa-regular fa-user"></i>
                                By : Medical Team
                            </li>
                            <li>
                                <i class="fa-regular fa-comment"></i>
                                32 Comments
                            </li>
                        </ul>
                        <h4>
                            <a href="{{ route('web.blog.show') }}">
                                Free Vaccination Camp: 100+ Animals Treated
                            </a>
                        </h4>
                        <a href="{{ route('web.blog.show') }}" class="link-btn">Read More <i class="fa-solid fa-arrow-right-long"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".7s">
                <div class="news-card-items mt-0">
                    <div class="news-image">
                        <img src="assets/img/home-1/news/03.jpg" alt="img">
                        <div class="news-layer-wrapper">
                            <div class="news-layer-image" style="background-image: url('assets/img/home-1/news/03.jpg');"></div>
                            <div class="news-layer-image" style="background-image: url('assets/img/home-1/news/03.jpg');"></div>
                            <div class="news-layer-image" style="background-image: url('assets/img/home-1/news/03.jpg');"></div>
                            <div class="news-layer-image" style="background-image: url('assets/img/home-1/news/03.jpg');"></div>
                        </div>
                        <div class="bottom-shape">
                            <img src="assets/img/home-1/news/shape.png" alt="img">
                        </div>
                    </div>
                    <div class="news-content">
                        <ul class="news-meta">
                            <li>
                                <i class="fa-regular fa-user"></i>
                                By : Training Team
                            </li>
                            <li>
                                <i class="fa-regular fa-comment"></i>
                                28 Comments
                            </li>
                        </ul>
                        <h4>
                            <a href="{{ route('web.blog.show') }}">
                                50 New Student Volunteers Join Our Mission
                            </a>
                        </h4>
                        <a href="{{ route('web.blog.show') }}" class="link-btn">Read More <i class="fa-solid fa-arrow-right-long"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                <div class="news-card-items mt-0">
                    <div class="news-image">
                        <img src="assets/img/home-1/news/04.jpg" alt="img">
                        <div class="news-layer-wrapper">
                            <div class="news-layer-image" style="background-image: url('assets/img/home-1/news/04.jpg');"></div>
                            <div class="news-layer-image" style="background-image: url('assets/img/home-1/news/04.jpg');"></div>
                            <div class="news-layer-image" style="background-image: url('assets/img/home-1/news/04.jpg');"></div>
                            <div class="news-layer-image" style="background-image: url('assets/img/home-1/news/04.jpg');"></div>
                        </div>
                        <div class="bottom-shape">
                            <img src="assets/img/home-1/news/shape.png" alt="img">
                        </div>
                    </div>
                    <div class="news-content">
                        <ul class="news-meta">
                            <li>
                                <i class="fa-regular fa-user"></i>
                                By : Adoption Team
                            </li>
                            <li>
                                <i class="fa-regular fa-comment"></i>
                                56 Comments
                            </li>
                        </ul>
                        <h4>
                            <a href="{{ route('web.blog.show') }}">
                                Heartwarming Adoption Stories That Changed Lives
                            </a>
                        </h4>
                        <a href="{{ route('web.blog.show') }}" class="link-btn">Read More <i class="fa-solid fa-arrow-right-long"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".5s">
                <div class="news-card-items mt-0">
                    <div class="news-image">
                        <img src="assets/img/home-1/news/05.jpg" alt="img">
                        <div class="news-layer-wrapper">
                            <div class="news-layer-image" style="background-image: url('assets/img/home-1/news/05.jpg');"></div>
                            <div class="news-layer-image" style="background-image: url('assets/img/home-1/news/05.jpg');"></div>
                            <div class="news-layer-image" style="background-image: url('assets/img/home-1/news/05.jpg');"></div>
                            <div class="news-layer-image" style="background-image: url('assets/img/home-1/news/05.jpg');"></div>
                        </div>
                        <div class="bottom-shape">
                            <img src="assets/img/home-1/news/shape.png" alt="img">
                        </div>
                    </div>
                    <div class="news-content">
                        <ul class="news-meta">
                            <li>
                                <i class="fa-regular fa-user"></i>
                                By : Feeding Team
                            </li>
                            <li>
                                <i class="fa-regular fa-comment"></i>
                                38 Comments
                            </li>
                        </ul>
                        <h4>
                            <a href="{{ route('web.blog.show') }}">
                                Daily Feeding Drive Reaches 500+ Street Animals
                            </a>
                        </h4>
                        <a href="{{ route('web.blog.show') }}" class="link-btn">Read More <i class="fa-solid fa-arrow-right-long"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".7s">
                <div class="news-card-items mt-0">
                    <div class="news-image">
                        <img src="assets/img/home-1/news/06.jpg" alt="img">
                        <div class="news-layer-wrapper">
                            <div class="news-layer-image" style="background-image: url('assets/img/home-1/news/06.jpg');"></div>
                            <div class="news-layer-image" style="background-image: url('assets/img/home-1/news/06.jpg');"></div>
                            <div class="news-layer-image" style="background-image: url('assets/img/home-1/news/06.jpg');"></div>
                            <div class="news-layer-image" style="background-image: url('assets/img/home-1/news/06.jpg');"></div>
                        </div>
                        <div class="bottom-shape">
                            <img src="assets/img/home-1/news/shape.png" alt="img">
                        </div>
                    </div>
                    <div class="news-content">
                        <ul class="news-meta">
                            <li>
                                <i class="fa-regular fa-user"></i>
                                By : Awareness Team
                            </li>
                            <li>
                                <i class="fa-regular fa-comment"></i>
                                42 Comments
                            </li>
                        </ul>
                        <h4>
                            <a href="{{ route('web.blog.show') }}">
                                Community Awareness Campaign: Be Their Voice
                            </a>
                        </h4>
                        <a href="{{ route('web.blog.show') }}" class="link-btn">Read More <i class="fa-solid fa-arrow-right-long"></i></a>
                    </div>
                </div>
            </div>
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