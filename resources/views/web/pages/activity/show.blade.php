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
                <div class="col-lg-4">
                    <div class="event-main-sideber">
                        <!-- <div class="event-sideber-box">
                            <div class="client-image">
                                <img src="assets/img/inner-page/event-details/user.png" alt="img">
                            </div>
                            <div class="user-content">
                                <h5>Dianne Russell</h5>
                                <span>Medical Assistant</span>
                                <p>
                                    Adipiscing sed do tempor incididunt ut labore et dolore magna aliqua. Ut enim minim dolor in reprehenderit.
                                </p>
                                <div class="social-icon">
                                    <a href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M18.244 2.25h3.308l-7.227 8.26L22.75 21.75h-6.57l-5.145-6.7-5.873 6.7H1.854l7.73-8.835L1.25 2.25h6.736l4.654 6.1z" />
                                        </svg>
                                    </a>

                                    <a href="#"><i class="fa-brands fa-whatsapp"></i></a>
                                    <a href="#"><i class="fa-brands fa-instagram"></i></a>
                                    <a href="#"><i class="fa-brands fa-youtube"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="event-info-box">
                            <h3>Event Info</h3>
                            <div class="info-item">
                                <div class="icon">
                                    <i class="fa-regular fa-location-dot"></i>
                                </div>
                                <div class="content">
                                    <h6>Location:</h6>
                                    <span>3891 Ranchview California 62639</span>
                                </div>
                            </div>
                            <div class="info-item">
                                <div class="icon">
                                    <i class="fa-regular fa-clock"></i>
                                </div>
                                <div class="content">
                                    <h6>Event Time:</h6>
                                    <span>09:00 PM - 04:00 AM</span>
                                </div>
                            </div>
                            <div class="info-item mb-0">
                                <div class="icon">
                                    <i class="fa-regular fa-calendar-days"></i>
                                </div>
                                <div class="content">
                                    <h6>Event Date:</h6>
                                    <span>Event Date:</span>
                                </div>
                            </div>
                        </div> -->
                        <div class="event-contact-box">
                            <div class="icon">
                                <i class="fa-regular fa-phone"></i>
                            </div>
                            <h5>Need Help? Call Here</h5>
                            <h6>
                                <a href="tel:+16336547896">+163 3654 7896</a>
                            </h6>
                            <a href="#" class="theme-btn">BOOK NOW <i class="fa-solid fa-arrow-right-long"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection