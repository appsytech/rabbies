@extends('web.layouts.main')
@section('title', 'Appsytech Non Profit Organization')

@section('content')


<!-- Hero Section Start -->
<div class="breadcrumb-wrapper fix bg-cover" style="background-image: url(assets/img/inner-page/breadcrumb.png);">
    <div class="container">
        <div class="page-heading">
            <div class="breadcrumb-sub-title">
                <h1 class="wow fadeInUp" data-wow-delay=".3s">Admin Details</h1>
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
                    Admin Details
                </li>
            </ul>
        </div>
    </div>
</div>

@php
$admin = $data['admin'];
@endphp

<!-- MAIN SECTION -->
<section class="team-detail-section-main">
    <div class="container">
        <div class="row gap-4 gap-md-0">

            <div class="col-lg-4 col-md-5">

                <!-- Member Card -->
                <div class="member-card">
                    <div class="photo-wrap">
                        @isset($admin->profile_image)
                        <img src="{{ asset('storage/' . $admin->profile_image) }}" alt="Member Photo" />
                        @endisset

                        <h2>No image</h2>

                        @isset($admin->position)
                        <span class="badge-role">{{ $admin->position ?? '' }}</span>
                        @endisset
                    </div>
                    <div class="member-info">
                        <div class="member-name">{{ $admin->name ?? '' }}</div>
                        <div class="member-position">{{ $admin->position ?? '' }}</div>
                        <div class="divider"></div>

                        <!-- Email -->
                        <div class="contact-item">
                            <div class="icon-wrap">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <div>
                                <small>Email</small><br>
                                <a href="mailto:{{ $admin->email }}">
                                    {{ $admin->email ?? '' }}
                                </a>
                            </div>
                        </div>

                        <!-- Phone -->
                        @isset($admin->phone)
                        <div class="contact-item">
                            <div class="icon-wrap">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div>
                                <small>Phone</small><br>
                                <a href="tel:{{ $admin->phone }}">
                                    {{ $admin->phone ?? '' }}
                                </a>
                            </div>
                        </div>
                        @endisset

                        <div class="contact-item">
                            <div class="icon-wrap">
                                <i class="fa fa-calendar">
                                </i>
                            </div>
                            <div>
                                <small>Joined</small>
                                <br>
                                {{ $admin->created_at ?? '' }}
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-lg-8 col-md-7">
                <div class="content-wrap">

                    <div class="section-tag">About This Member</div>
                    <div>
                        {!! $admin->description ?? '' !!}
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection