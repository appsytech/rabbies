@extends('web.layouts.main')
@section('title', 'Appsytech Non Profit Organization')

@section('content')
<!-- Hero Section Start -->
<div class="breadcrumb-wrapper fix bg-cover" style="background-image: url(assets/img/inner-page/breadcrumb.png);">
    <div class="container">
        <div class="page-heading">
            <div class="breadcrumb-sub-title">
                <h1 class="wow fadeInUp" data-wow-delay=".3s">Contact Us</h1>
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
                    Contact Us
                </li>
            </ul>
        </div>
    </div>
</div>

<!-- Contact Section Start -->
<div class="contact-us-section-2 section-padding fix">
    <div class="container">
        <div class="contact-us-wrapper-2">
            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="contact-us-box">
                        <div class="icon">
                            <i class="fa-solid fa-phone"></i>
                        </div>
                        <div class="contact-us-content">
                            <span>Phone No</span>
                            <h5>
                                <a href="tel:+918340138097">+91 8340138097</a> <br>
                                <a href="tel:+918340138097">+91 8340138097</a>
                            </h5>
                        </div>
                    </div>
                    <div class="contact-us-box">
                        <div class="icon">
                            <i class="fa-solid fa-location-dot"></i>
                        </div>
                        <div class="contact-us-content">
                            <span>Location</span>
                            <h5>
                                2nd RPS More <br> Patna, Bihar, India
                            </h5>
                        </div>
                    </div>
                    <div class="contact-us-box mb-0">
                        <div class="icon">
                            <i class="fa-solid fa-square-chevron-down"></i>
                        </div>
                        <div class="contact-us-content">
                            <span>Email Address</span>
                            <h5>
                                <a href="mailto:example@email.com">example@email.com</a> <br>
                                <a href="mailto:abhi@email.com">abhi@email.com</a>
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="from-fill-up-box">
                        <h4>
                            Fill Up The From
                        </h4>
                        <form action="#" id="contact-form" method="POST">
                            <div class="row g-4">
                                <div class="col-lg-12">
                                    <div class="form-clt">
                                        <input type="text" name="name" id="name2" placeholder="Your Name">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-clt">
                                        <input type="text" name="email" id="email" placeholder="Enter Your Email">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-clt">
                                        <input type="text" name="number" id="number" placeholder="Phone Number">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-clt">
                                        <input type="text" name="address" id="address" placeholder="Your Address">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-clt">
                                        <textarea name="message" id="message" placeholder="Type your message"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <button type="submit" class="theme-btn ">
                                        Get A Quote <i class="fa-solid fa-arrow-right-long"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection