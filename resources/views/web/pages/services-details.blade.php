@extends('web.layouts.main')
@section('title', 'Appsytech Non Profit Organization')

@section('content')

<!-- Hero Section Start -->
<div class="breadcrumb-wrapper fix bg-cover" style="background-image: url('{{ asset('assets/img/inner-page/breadcrumb.png') }} ');">
    <div class="container">
        <div class="page-heading">
            <div class="breadcrumb-sub-title">
                <h1 class="wow fadeInUp" data-wow-delay=".3s">Our Services Detiles</h1>
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
                    Our Services Detiles
                </li>
            </ul>
        </div>
    </div>
</div>

@php
$service = $data['service'];
@endphp

<!-- services-details Section Start -->
<section class="causes-details-section section-padding fix">
    <div class="container">
        <div class="causes-details-wrapper">
            <div class="row g-4">
                <div class="col-lg-7">
                    <div class="causes-details-post">
                        <div class="details-image">
                            @isset($service->images1)
                            <img src="{{ asset('storage/' .  $service->images1) }}" alt="img">
                            @endisset
                        </div>
                        <div class="details-content">
                            <ul class="cause-list">
                                <li>
                                    <i class="fa-regular fa-calendar"></i>
                                    {{ \Illuminate\Support\Carbon::parse($service->created_at)->format('Y-m-d') }}
                                </li>
                                <li>
                                    <i class="fa-regular fa-location-dot"></i>
                                    {{ $service->location ?? '' }}
                                </li>
                            </ul>
                            <h2>
                                {{ $service->title  ?? '' }}
                            </h2>
                            <p>
                                {{ $service->description ?? '' }}
                            </p>
                            @isset($service->mission_description)
                            <h3>
                                Our Mission
                            </h3>
                            <p class="mt-3">
                                {{ $service->mission_description ?? '' }}
                            </p>
                            @endisset
                            <!-- <div class="cause-lis-items">
                                <ul class="list-item">
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <g clip-path="url(#clip0_28048_230)">
                                                <path
                                                    d="M23.3145 3.2813C22.9614 2.92762 22.3886 2.92701 22.0355 3.2798L11.1843 14.1024L7.26917 9.85022C6.93087 9.483 6.3589 9.45919 5.99107 9.79744C5.62353 10.1357 5.6 10.708 5.93829 11.0755L10.4911 16.02C10.6578 16.2012 10.8912 16.3064 11.1372 16.3115C11.1438 16.3118 11.1502 16.3118 11.1565 16.3118C11.3956 16.3118 11.6256 16.2168 11.7951 16.048L23.3127 4.56056C23.6667 4.20783 23.6673 3.63497 23.3145 3.2813Z"
                                                    fill="#0B4E3D" />
                                                <path
                                                    d="M23.0955 11.0955C22.5959 11.0955 22.191 11.5004 22.191 12C22.191 17.6195 17.6195 22.191 12 22.191C6.38081 22.191 1.80905 17.6195 1.80905 12C1.80905 6.38081 6.38081 1.80905 12 1.80905C12.4996 1.80905 12.9045 1.40414 12.9045 0.904547C12.9045 0.404906 12.4996 0 12 0C5.38312 0 0 5.38312 0 12C0 18.6166 5.38312 24 12 24C18.6166 24 24 18.6166 24 12C24 11.5004 23.5951 11.0955 23.0955 11.0955Z"
                                                    fill="#0B4E3D" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_28048_230">
                                                    <rect width="24" height="24" fill="white" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                        Emergency Animal Rescue
                                    </li>
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <g clip-path="url(#clip0_28048_230)">
                                                <path
                                                    d="M23.3145 3.2813C22.9614 2.92762 22.3886 2.92701 22.0355 3.2798L11.1843 14.1024L7.26917 9.85022C6.93087 9.483 6.3589 9.45919 5.99107 9.79744C5.62353 10.1357 5.6 10.708 5.93829 11.0755L10.4911 16.02C10.6578 16.2012 10.8912 16.3064 11.1372 16.3115C11.1438 16.3118 11.1502 16.3118 11.1565 16.3118C11.3956 16.3118 11.6256 16.2168 11.7951 16.048L23.3127 4.56056C23.6667 4.20783 23.6673 3.63497 23.3145 3.2813Z"
                                                    fill="#0B4E3D" />
                                                <path
                                                    d="M23.0955 11.0955C22.5959 11.0955 22.191 11.5004 22.191 12C22.191 17.6195 17.6195 22.191 12 22.191C6.38081 22.191 1.80905 17.6195 1.80905 12C1.80905 6.38081 6.38081 1.80905 12 1.80905C12.4996 1.80905 12.9045 1.40414 12.9045 0.904547C12.9045 0.404906 12.4996 0 12 0C5.38312 0 0 5.38312 0 12C0 18.6166 5.38312 24 12 24C18.6166 24 24 18.6166 24 12C24 11.5004 23.5951 11.0955 23.0955 11.0955Z"
                                                    fill="#0B4E3D" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip01_28048_230">
                                                    <rect width="24" height="24" fill="white" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                        Veterinary Treatment
                                    </li>
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <g clip-path="url(#clip0_28048_230)">
                                                <path
                                                    d="M23.3145 3.2813C22.9614 2.92762 22.3886 2.92701 22.0355 3.2798L11.1843 14.1024L7.26917 9.85022C6.93087 9.483 6.3589 9.45919 5.99107 9.79744C5.62353 10.1357 5.6 10.708 5.93829 11.0755L10.4911 16.02C10.6578 16.2012 10.8912 16.3064 11.1372 16.3115C11.1438 16.3118 11.1502 16.3118 11.1565 16.3118C11.3956 16.3118 11.6256 16.2168 11.7951 16.048L23.3127 4.56056C23.6667 4.20783 23.6673 3.63497 23.3145 3.2813Z"
                                                    fill="#0B4E3D" />
                                                <path
                                                    d="M23.0955 11.0955C22.5959 11.0955 22.191 11.5004 22.191 12C22.191 17.6195 17.6195 22.191 12 22.191C6.38081 22.191 1.80905 17.6195 1.80905 12C1.80905 6.38081 6.38081 1.80905 12 1.80905C12.4996 1.80905 12.9045 1.40414 12.9045 0.904547C12.9045 0.404906 12.4996 0 12 0C5.38312 0 0 5.38312 0 12C0 18.6166 5.38312 24 12 24C18.6166 24 24 18.6166 24 12C24 11.5004 23.5951 11.0955 23.0955 11.0955Z"
                                                    fill="#0B4E3D" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip02_28048_230">
                                                    <rect width="24" height="24" fill="white" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                        Daily Feeding Programs
                                    </li>
                                </ul>
                                <ul class="list-item">
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <g clip-path="url(#clip0_28048_230)">
                                                <path
                                                    d="M23.3145 3.2813C22.9614 2.92762 22.3886 2.92701 22.0355 3.2798L11.1843 14.1024L7.26917 9.85022C6.93087 9.483 6.3589 9.45919 5.99107 9.79744C5.62353 10.1357 5.6 10.708 5.93829 11.0755L10.4911 16.02C10.6578 16.2012 10.8912 16.3064 11.1372 16.3115C11.1438 16.3118 11.1502 16.3118 11.1565 16.3118C11.3956 16.3118 11.6256 16.2168 11.7951 16.048L23.3127 4.56056C23.6667 4.20783 23.6673 3.63497 23.3145 3.2813Z"
                                                    fill="#0B4E3D" />
                                                <path
                                                    d="M23.0955 11.0955C22.5959 11.0955 22.191 11.5004 22.191 12C22.191 17.6195 17.6195 22.191 12 22.191C6.38081 22.191 1.80905 17.6195 1.80905 12C1.80905 6.38081 6.38081 1.80905 12 1.80905C12.4996 1.80905 12.9045 1.40414 12.9045 0.904547C12.9045 0.404906 12.4996 0 12 0C5.38312 0 0 5.38312 0 12C0 18.6166 5.38312 24 12 24C18.6166 24 24 18.6166 24 12C24 11.5004 23.5951 11.0955 23.0955 11.0955Z"
                                                    fill="#0B4E3D" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip03_28048_230">
                                                    <rect width="24" height="24" fill="white" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                        Student Volunteer Training
                                    </li>
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <g clip-path="url(#clip0_28048_230)">
                                                <path
                                                    d="M23.3145 3.2813C22.9614 2.92762 22.3886 2.92701 22.0355 3.2798L11.1843 14.1024L7.26917 9.85022C6.93087 9.483 6.3589 9.45919 5.99107 9.79744C5.62353 10.1357 5.6 10.708 5.93829 11.0755L10.4911 16.02C10.6578 16.2012 10.8912 16.3064 11.1372 16.3115C11.1438 16.3118 11.1502 16.3118 11.1565 16.3118C11.3956 16.3118 11.6256 16.2168 11.7951 16.048L23.3127 4.56056C23.6667 4.20783 23.6673 3.63497 23.3145 3.2813Z"
                                                    fill="#0B4E3D" />
                                                <path
                                                    d="M23.0955 11.0955C22.5959 11.0955 22.191 11.5004 22.191 12C22.191 17.6195 17.6195 22.191 12 22.191C6.38081 22.191 1.80905 17.6195 1.80905 12C1.80905 6.38081 6.38081 1.80905 12 1.80905C12.4996 1.80905 12.9045 1.40414 12.9045 0.904547C12.9045 0.404906 12.4996 0 12 0C5.38312 0 0 5.38312 0 12C0 18.6166 5.38312 24 12 24C18.6166 24 24 18.6166 24 12C24 11.5004 23.5951 11.0955 23.0955 11.0955Z"
                                                    fill="#0B4E3D" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip04_28048_230">
                                                    <rect width="24" height="24" fill="white" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                        Adoption & Rehabilitation
                                    </li>
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <g clip-path="url(#clip0_28048_230)">
                                                <path
                                                    d="M23.3145 3.2813C22.9614 2.92762 22.3886 2.92701 22.0355 3.2798L11.1843 14.1024L7.26917 9.85022C6.93087 9.483 6.3589 9.45919 5.99107 9.79744C5.62353 10.1357 5.6 10.708 5.93829 11.0755L10.4911 16.02C10.6578 16.2012 10.8912 16.3064 11.1372 16.3115C11.1438 16.3118 11.1502 16.3118 11.1565 16.3118C11.3956 16.3118 11.6256 16.2168 11.7951 16.048L23.3127 4.56056C23.6667 4.20783 23.6673 3.63497 23.3145 3.2813Z"
                                                    fill="#0B4E3D" />
                                                <path
                                                    d="M23.0955 11.0955C22.5959 11.0955 22.191 11.5004 22.191 12C22.191 17.6195 17.6195 22.191 12 22.191C6.38081 22.191 1.80905 17.6195 1.80905 12C1.80905 6.38081 6.38081 1.80905 12 1.80905C12.4996 1.80905 12.9045 1.40414 12.9045 0.904547C12.9045 0.404906 12.4996 0 12 0C5.38312 0 0 5.38312 0 12C0 18.6166 5.38312 24 12 24C18.6166 24 24 18.6166 24 12C24 11.5004 23.5951 11.0955 23.0955 11.0955Z"
                                                    fill="#0B4E3D" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip05_28048_230">
                                                    <rect width="24" height="24" fill="white" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                        Awareness Campaigns
                                    </li>
                                </ul>
                            </div> -->
                            <div class="row g-4">

                                @isset($service->images2)
                                <div class="col-lg-6">
                                    <div class="cause-thumb">
                                        <img src="{{ asset('storage/' . $service->images2) }}" alt="img">
                                    </div>
                                </div>
                                @endisset

                                @isset($service->images3)
                                <div class="col-lg-6">
                                    <div class="cause-thumb">
                                        <img src="{{ asset('storage/' . $service->images3) }}" alt="img">
                                    </div>
                                </div>
                                @endisset

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="causes-details-sideber">
                        <!-- <div class="causes-details-sideber-box">
                            <h4>Our Services</h4>
                            <ul class="donation-list">
                                <li>
                                    <a href="services-details.html">Animal Rescue</a> <span>(150+)</span>
                                </li>
                                <li>
                                    <a href="services-details.html">Medical Treatment</a> <span>(200+)</span>
                                </li>
                                <li>
                                    <a href="services-details.html">Feeding Program</a> <span>(500+)</span>
                                </li>
                                <li>
                                    <a href="services-details.html">Vaccinations</a> <span>(300+)</span>
                                </li>
                                <li>
                                    <a href="services-details.html">Sterilization</a> <span>(180+)</span>
                                </li>
                                <li>
                                    <a href="services-details.html">Shelter Care</a> <span>(100+)</span>
                                </li>
                                <li>
                                    <a href="services-details.html">Adoption Drive</a> <span>(75+)</span>
                                </li>
                            </ul>
                        </div> -->
                        <h4 class="text">Recent Services </h4>
                        <div class="details-post-area">

                            @if($data['relatedServices']->isNotEmpty())
                            @foreach($data['relatedServices'] as $service)
                            <div class="details-items">
                                <div class="details-thumb">
                                    <img src="{{ asset('storage/' . $service->icon) }}" alt="img">
                                </div>
                                <div class="details-content">
                                    <h5>
                                        <a href="donation-details.html">
                                            {{ $service->title ?? '' }}
                                        </a>
                                    </h5>
                                    <ul>
                                        <li>
                                            {{ \Illuminate\Support\Carbon::parse($service->created_at)->format('Y-m-d') }} . By {{ $service->created_by ?? '' }}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            @endforeach
                            @endif

                        </div>
                        <!-- <div class="contact-bg bg-cover"
                            style="background-image: url(assets/img/inner-page/services-details/bg.jpg);">
                            <div class="donation-contact-content">
                                <div class="shape">
                                    <img src="assets/img/inner-page/services-details/shape.png" alt="">
                                </div>
                                <h6>Every Life Matters</h6>
                                <h2>
                                    Join Us in Saving & Caring for Animals
                                </h2>
                                <a href="contact.html" class="theme-btn border-btn">Become A Volunteer <i
                                        class="fa-solid fa-arrow-right-long"></i></a>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection