@extends('web.layouts.main')
@section('title', 'Appsytech Non Profit Organization')

@section('content')

<style>
    .map-wrapper {
        border-radius: 20px;
        overflow: hidden;
        border: 1px solid #d9e8dd;
        box-shadow: 0 4px 40px rgba(21, 42, 30, 0.08);
        height: 100%;
        min-height: 560px;
        position: relative;
    }

    .map-wrapper iframe {
        width: 100%;
        height: 100%;
        min-height: 560px;
        display: block;
        border: 0;
        filter: saturate(0.85) contrast(1.05);
    }

    .map-badge {
        position: absolute;
        bottom: 20px;
        left: 20px;
        background: #152a1e;
        color: #ffffff;
        border-radius: 12px;
        padding: 12px 18px;
        display: flex;
        align-items: center;
        gap: 10px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.25);
        z-index: 2;
    }

    .map-badge-icon {
        width: 36px;
        height: 36px;
        border-radius: 8px;
        background: #e8a020;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #152a1e;
        font-size: 16px;
    }

    .map-badge-text {
        font-size: 13px;
        font-weight: 500;
        line-height: 1.4;
    }

    .map-badge-text strong {
        display: block;
        font-size: 14px;
        font-weight: 700;
    }
</style>
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
                <!-- <div class="col-lg-4">
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
                </div> -->

                <div class="col-lg-6">
                    <div class="from-fill-up-box">
                        <h4>
                            Fill Up The From
                        </h4>
                        <form action="{{ route('inquiry.store') }}" class="ajax-form" id="contact-form" method="POST">
                            @csrf
                            <div class="row g-4">
                                <div class="col-lg-12">
                                    <div class="form-clt">
                                        <input type="text" name="full_name" required id="name2" placeholder="Your Name">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-clt">
                                        <input type="text" name="email" required id="email" placeholder="Enter Your Email">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-clt">
                                        <input type="text" name="phone_number" id="number" placeholder="Phone Number">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-clt">
                                        <input type="text" name="subject" id="address" placeholder="Enter Your Subject">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-clt">
                                        <textarea name="message" id="message" required placeholder="Type your message"></textarea>
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


                <div class="col-lg-6">
                    <div class="map-wrapper">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d114245.00097849038!2d85.23637609443359!3d27.70895784221439!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb198a307baabf%3A0xb96f1e4c44c49988!2sKathmandu%2C%20Nepal!5e0!3m2!1sen!2sus!4v1700000000000!5m2!1sen!2sus"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"
                            title="Our Location Map">
                        </iframe>

                        <!-- Floating badge -->
                        <div class="map-badge">
                            <div class="map-badge-icon"><i class="fa-solid fa-map-pin"></i></div>
                            <div class="map-badge-text">
                                <strong>Kathmandu, Nepal</strong>
                                Our Head Office
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection