@extends('web.layouts.main')
@section('title', 'Appsytech Non Profit Organization')

@section('content')

<!-- Hero Section Start -->
<section class="hero-section-1">
    <div class="arrow-button">
        <button class="array-prev">
            <i class="fa-light fa-chevron-left"></i>
        </button>
        <button class="array-next">
            <i class="fa-light fa-chevron-right"></i>
        </button>
    </div>
    <div class="swiper hero-slider">
        <div class="swiper-wrapper">

            @if ($data['sliders']->isNotEmpty())
            @foreach ($data['sliders'] as $slider)
            @php
            $jumpRoutes = [
            'ABOUT' => route('web.about-us'),
            'ACTIVITY' => route('web.activity.index'),
            'PUBLICATION' => route('web.publication.index'),

            ];

            $jumpTexts = [
            'ABOUT' => 'About Us',
            'ACTIVITY' => 'Activities',
            'PUBLICATION' => 'Publication',
            ];

            $jumpUrl = $jumpRoutes[$slider->jump_type] ?? '#';
            @endphp
            <div class="swiper-slide">
                <div class="hero-1">
                    <div class="shape">
                        <img src="assets/img/home-1/hero/shape.png" alt="img">
                    </div>
                    <div class="hero-bg bg-cover" style="background-image: url('{{ asset('storage/' . $slider->images) }}');">
                    </div>
                    <div class="container hero-height">
                        <div class="row g-4 justify-content-center">
                            <div class="col-lg-10">
                                <div class="hero-content">
                                    <h6 data-animation="fadeInUp" data-delay="1.3s">{{ $slider->type ?? '' }}</h6>
                                    <h1 data-animation="fadeInUp" data-delay="1.5s">
                                        {{ $slider->title ?? '' }}
                                    </h1>
                                    <p data-animation="fadeInUp" data-delay="1.3s">
                                        {!! $slider->description ?? '' !!}
                                    </p>
                                    <div class="hero-button" data-animation="fadeInUp" data-delay="1.5s">
                                        <a href="{{ $jumpUrl }}" class="theme-btn">{{ $jumpTexts[$slider->jump_type] ?? 'Join with us' }} <i class="fa-solid fa-arrow-right-long"></i></a>
                                        <a href="{{ route('web.about-us') }}" class="theme-btn border-btn">About Our Program <i class="fa-solid fa-arrow-right-long"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @endif

            <!-- <div class="swiper-slide">
                <div class="hero-1">
                    <div class="shape">
                        <img src="assets/img/home-1/hero/shape.png" alt="img">
                    </div>
                    <div class="hero-bg bg-cover" style="background-image: url(assets/img/home-1/hero/hero-bg-2.jpg);">
                    </div>
                    <div class="container hero-height">
                        <div class="row g-4 justify-content-center">
                            <div class="col-lg-10">
                                <div class="hero-content">
                                    <h6 data-animation="fadeInUp" data-delay="1.3s">Rescue • Care • Protect</h6>
                                    <h1 data-animation="fadeInUp" data-delay="1.5s">
                                        Building a Compassionate Future Through Education
                                    </h1>
                                    <p data-animation="fadeInUp" data-delay="1.3s">
                                        From rescuing injured animals to providing medical care and shelter, our university volunteers stand for kindness and action. Join us in making a difference.
                                    </p>
                                    <div class="hero-button" data-animation="fadeInUp" data-delay="1.5s">
                                        <a href="{{ route('web.contact') }}" class="theme-btn">Get Involved <i class="fa-solid fa-arrow-right-long"></i></a>
                                        <a href="#" class="theme-btn border-btn">View Gallery <i class="fa-solid fa-arrow-right-long"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="swiper-slide">
                <div class="hero-1">
                    <div class="shape">
                        <img src="assets/img/home-1/hero/shape.png" alt="img">
                    </div>
                    <div class="hero-bg bg-cover" style="background-image: url(assets/img/home-1/hero/hero-bg-3.jpg);">
                    </div>
                    <div class="container hero-height">
                        <div class="row g-4 justify-content-center">
                            <div class="col-lg-10">
                                <div class="hero-content">
                                    <h6 data-animation="fadeInUp" data-delay="1.3s">Student Volunteer Program</h6>
                                    <h1 data-animation="fadeInUp" data-delay="1.5s">
                                        Young Minds Caring for Voiceless Souls
                                    </h1>
                                    <p data-animation="fadeInUp" data-delay="1.3s">
                                        Students and faculty actively participate in animal rescue, feeding drives, and shelter support. Together we build compassion, responsibility, and real-world impact.</p>
                                    <div class="hero-button" data-animation="fadeInUp" data-delay="1.5s">
                                        <a href="{{ route('web.contact') }}" class="theme-btn">Become a Volunteer <i class="fa-solid fa-arrow-right-long"></i></a>
                                        <a href="/" class="theme-btn border-btn">Our Activities <i class="fa-solid fa-arrow-right-long"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</section>

<!-- About Section Start -->
<section class="about-section section-padding fix">
    <div class="container">
        <div class="about-wrapper-2">
            <div class="row g-4">
                <div class="col-lg-8">
                    <div class="about-left-item">
                        <div class="section-title style-2 mb-0">
                            <span class="sub-title wow fadeInUp">About Our Initiative</span>
                            <h2 class="wow fadeInUp" data-wow-delay=".3s">
                                <a href="{{ route('web.about-us') }}">{{ $data['aboutus']->title ?? '' }}</a>
                            </h2>
                        </div>
                        <p class="text wow fadeInUp" data-wow-delay=".5s">
                            {!! \Illuminate\Support\Str::words(strip_tags($data['aboutus']->description), 20, '...') !!}

                        </p>
                        @isset($data['aboutus']->images2)
                        <div class="about-image wow img-custom-anim-left" data-wow-duration="1.3s" data-wow-delay="0.3s">
                            <img src="{{ asset('storage/' . $data['aboutus']->images2) }}" alt="img">
                        </div>
                        @endisset
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="about-right-item">
                        @isset($data['aboutus']->images1)
                        <div class="about-image wow img-custom-anim-right" data-wow-duration="1.3s" data-wow-delay="0.3s">
                            <img src="{{ asset('storage/' . $data['aboutus']->images1) }}" alt="img">
                        </div>
                        @endisset


                        <div class="about-icon-main-item">
                            @if($data['aboutFeatures']->isNotEmpty())
                            @foreach($data['aboutFeatures']->chunk(2) as $chunk)
                            <div class="about-icon-item">
                                @foreach($chunk as $feature)
                                <div class="icon-item wow fadeInUp" data-wow-delay=".3s">
                                    <div class="icon">
                                        <img src="{{ asset('storage/'. $feature->icon) }}" alt="img">
                                    </div>
                                    <div class="content">
                                        <h5>{{ $feature->title ?? '' }}</h5>
                                        <p>
                                            {!! \Illuminate\Support\Str::words(strip_tags($feature->description), 10, '...') !!}

                                        </p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            @endforeach
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Service Section Start -->
<section class="causes-section section-padding fix bg-cover" style="background-image: url(assets/img/home-1/service/bg.jpg);">
    <div class="shape">
        <img src="assets/img/home-1/service/shape.png" alt="img">
    </div>
    <div class="container">
        <div class="section-title text-center">
            <span class="sub-title wow fadeInUp">Our Services</span>
            <h2 class="wow fadeInUp" data-wow-delay=".3s">
                <span>S</span>upporting animals through student volunteers <br> and compassionate community action
            </h2>
        </div>
        <div class="swiper service-slider">
            <div class="swiper-wrapper">

                @if($data['services']->isNotEmpty())

                @foreach($data['services'] ?? [] as $service)

                <div class="swiper-slide">
                    <div class="causes-box-item">
                        <div class="icon">
                            <img src="{{ asset('storage/' . $service->icon) }}" alt="img">
                        </div>
                        <div class="content">
                            <h3>
                                <a href="{{ route('web.service.show', encrypt($service->id)) }}">{{ $service->title ?? '' }}</a>
                            </h3>
                            <p>

                                {!! \Illuminate\Support\Str::words(strip_tags($service->description), 10, '...') !!}

                            </p>
                            <a href="{{ route('web.service.show', encrypt($service->id)) }}" class="theme-btn">Learn More <i class="fa-solid fa-arrow-right-long"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif

            </div>
        </div>
        <div class="swiper-dot">
            <div class="dot"></div>
        </div>
    </div>
</section>

<!-- Activities Section Start -->
<section class="donation-section section-padding fix">
    <div class="container">
        <div class="section-title-area">
            <div class="section-title">
                <span class="sub-title wow fadeInUp">Lets See Recent Activities</span>
                <h2 class="wow fadeInUp" data-wow-delay=".3s">
                    <span>S</span>ee You Impact Transparent <br> Recent Causes
                </h2>
            </div>
            <a href="{{ route('web.activity.index') }}" class="theme-btn">See More <i class="fa-solid fa-arrow-right-long"></i></a>
        </div>
        <div class="donation-wrapper">
            <div class="row">
                @if ($data['activities']->isNotEmpty())
                @foreach ($data['activities'] as $activity)
                <div class="col-lg-6 wow fadeInUp" data-wow-delay=".2s">
                    <div class="donation-card-item">
                        <div class="donation-image">
                            <img src="{{ asset('storage/' . $activity->images) }}" alt="img">
                            <div class="right-shape">
                                <img src="assets/img/home-1/donation/shape.png" alt="img">
                            </div>
                        </div>
                        <div class="donation-content">
                            <h4>
                                <a href="{{ route('web.activity.show', encrypt($activity->id)) }}">{{ $activity->title }}</a>
                            </h4>
                            <p>
                                {!! \Illuminate\Support\Str::words(strip_tags($activity->description), 20, '...') !!}

                            </p>
                            <!-- <div class="pro-items">
                                        <div class="progress">
                                            <div class="progress-value style-two"></div>
                                        </div>
                                    </div> -->
                            <ul class="donate-list">
                                <li>
                                    <span>Author :</span> {{ $activity->author ?? '' }}
                                </li>
                                <li>
                                    <span>Date:</span> {{ \Illuminate\Support\Carbon::parse($activity->created_at)->format('Y/m/d') }}
                                </li>
                            </ul>
                            <a href="{{ route('web.activity.show', encrypt($activity->id)) }}" class="theme-btn">See more <i class="fa-solid fa-arrow-right-long"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif


            </div>
        </div>
    </div>
</section>

<!-- Gallary Section Start -->
<section class="project-section fix">
    <div class="container">
        <div class="section-title text-center">
            <span class="sub-title wow fadeInUp">Complete Gallary</span>
            <h2 class="wow fadeInUp" data-wow-delay=".3s">
                <span>O</span>ur Recent Compiled <span>G</span>allery
            </h2>
        </div>
    </div>
    @if($data['galleries']->isNotEmpty())

    @php
    $chunks = $data['galleries']->split(2);

    $firstGallerySliders = $chunks->get(0, collect());
    $scndGallerySliders = $chunks->get(1, collect());
    @endphp

    <div class="swiper project-slider">
        <div class="swiper-wrapper slide-transtion">

            @foreach($firstGallerySliders ?? [] as $firstGallery)

            @php
            $filePath = $firstGallery->image_path;
            $extension = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));

            $imageExtensions = ['jpg', 'jpeg', 'png', 'webp', 'gif'];
            $videoExtensions = ['mp4', 'webm', 'ogg'];
            @endphp

            <div class="swiper-slide brand-slide-element">
                <div class="project-card-item">
                    <div class="project-image">
                        @if(in_array($extension, $imageExtensions))
                        <img src="{{'storage/'. $filePath}}" alt="img" class="gallery-image">
                        @elseif(in_array($extension, $videoExtensions))
                        <video class="gallery-image" controls>
                            <source src="{{ asset('storage/' . $filePath) }}" type="video/{{ $extension }}">
                            Your browser does not support the video tag.
                        </video>
                        @endif
                        <div class="shape-image">
                            <img src="{{ asset('assets/img/home-1/project/shape.png') }}" alt="img">
                        </div>
                        <div class="project-content">
                            <div class="content">
                                <h3>
                                    <a href="#" class="gallery-trigger">{{ $firstGallery->title ?? '' }}</a>
                                </h3>
                                <h5>
                                    {!! \Illuminate\Support\Str::words(strip_tags($firstGallery->description), 4, '...') !!}

                                </h5>
                            </div>
                            <a href="#" class="arrow-icon gallery-trigger"><i class="fa-solid fa-arrow-right-long"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>

    <div dir="rtl" class="swiper project-slider-2">
        <div class="swiper-wrapper slide-transtion">
            @foreach($scndGallerySliders ?? [] as $scndGallery)

            @php
            $filePath = $scndGallery->image_path;
            $extension = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));

            $imageExtensions = ['jpg', 'jpeg', 'png', 'webp', 'gif'];
            $videoExtensions = ['mp4', 'webm', 'ogg'];
            @endphp

            <div class="swiper-slide brand-slide-element">
                <div class="project-card-item">
                    <div class="project-image">
                        @if(in_array($extension, $imageExtensions))
                        <img src="{{'storage/'. $filePath}}" alt="img" class="gallery-image">
                        @elseif(in_array($extension, $videoExtensions))
                        <video class="gallery-image" controls>
                            <source src="{{ asset('storage/' . $filePath) }}" type="video/{{ $extension }}">
                            Your browser does not support the video tag.
                        </video>
                        @endif
                        <div class="shape-image">
                            <img src="{{ asset('assets/img/home-1/project/shape.png') }}" alt="img">
                        </div>
                        <div class="project-content style-2">
                            <div class="content">
                                <h3>
                                    <a href="#" class="gallery-trigger">{{ $scndGallery->title ?? '' }}</a>
                                </h3>
                                <h5>
                                    {!! \Illuminate\Support\Str::words(strip_tags($scndGallery->description), 4, '...') !!}

                                </h5>
                            </div>
                            <a href="#" class="arrow-icon gallery-trigger"><i class="fa-solid fa-arrow-right-long"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
    @endif
</section>

<!-- Fullscreen Image Modal -->
<div id="imageModal" class="image-modal">
    <span class="image-modal-close">&times;</span>
    <img class="image-modal-content" id="fullscreenImage">
</div>

<!-- Fullscreen Image Modal -->
<div id="imageModal" class="image-modal">
    <span class="image-modal-close">&times;</span>
    <img class="image-modal-content" id="fullscreenImage">
</div>

<!-- Team Section Start -->
<section class="team-section section-padding fix ">
    <div class="container">

        <div class="section-title text-center">
            <span class="sub-title wow fadeInUp">Team Members</span>
            <h2 class="wow fadeInUp" data-wow-delay=".3s">
                <span>M</span>eet Our Team Member
            </h2>
        </div>

        <div class="swiper team-slider">
            <div class="swiper-wrapper">

                @if ($data['admins']->isNotEmpty())
                @foreach ($data['admins'] as $index => $admin)
                <div class="swiper-slide">
                    <div class="team-card-items">
                        <a href="{{ route('web.admin.show', encrypt($admin->id)) }}" class="team-image d-block">
                            @if(isset($admin->profile_image))
                            <img src="{{ asset('storage/' . $admin->profile_image) }}" alt="">
                            @else
                            <img src="{{ asset('assets/img/home-1/team/01.jpg') }}" alt="">
                            @endif

                        </a>
                        <div class="team-content">
                            <h5><a href="{{ route('web.admin.show', encrypt($admin->id)) }}">{{ $admin->name ?? '' }}</a></h5>
                            <p>
                                {{ $admin->position ?? '' }}
                            </p>
                            <p>
                                {!! \Illuminate\Support\Str::words(strip_tags($admin->description), 4, '...') !!}
                            </p>
                            <div class="social-icon">
                                <a href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M18.244 2.25h3.308l-7.227 8.26L22.75 21.75h-6.57l-5.145-6.7-5.873 6.7H1.854l7.73-8.835L1.25 2.25h6.736l4.654 6.1z" />
                                    </svg>
                                </a>

                                <a href="#"><i class="fa-brands fa-whatsapp"></i></a>
                                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                                <a href="#"><i class="fas fa-paper-plane"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach
                @endif
            </div>

            <div class="swiper-dot">
                <div class="dot"></div>
            </div>

        </div>
    </div>
</section>

<!-- Testimonial Section Start -->

<!-- <section class="testimonial-section section-padding fix">
            <div class="container">
                 <div class="section-title">
                    <span class="sub-title wow fadeInUp">Testimonials</span>
                    <h2 class="wow fadeInUp" data-wow-delay=".3s">
                        <span>W</span>hat People Say About Charity.
                    </h2>
                </div>
                <div class="testimonial-wrapper">
                    <div class="row g-4">
                        <div class="col-lg-5 wow slideInLeft" data-wow-delay="100ms" data-wow-duration="2500ms">
                            <div class="testimonial-image">
                                <img src="assets/img/home-1/testimonial/01.jpg" alt="img">
                                <div class="shape">
                                    <img src="assets/img/home-1/testimonial/shape.png" alt="img">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="testimonial-content">
                                <div class="swiper testimonial-slider">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="content">
                                                <div class="star">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                </div>
                                                <p>
                                                    Overall, I cannot recommend The Gourmet Bistro highly enough. If you're looking for a restaurant that serves delicious, beautifully presented dishes with impeccable service, look no further. I will definitely be returning soon to try more of their culinary delights”
                                                </p>
                                                <h3>Jonny Ananta</h3>
                                                <span>Regular Customer’s</span>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="content">
                                                <div class="star">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                </div>
                                                <p>
                                                    Overall, I cannot recommend The Gourmet Bistro highly enough. If you're looking for a restaurant that serves delicious, beautifully presented dishes with impeccable service, look no further. I will definitely be returning soon to try more of their culinary delights”
                                                </p>
                                                <h3>Jonny Ananta</h3>
                                                <span>Regular Customer’s</span>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="content">
                                                <div class="star">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                </div>
                                                <p>
                                                    Overall, I cannot recommend The Gourmet Bistro highly enough. If you're looking for a restaurant that serves delicious, beautifully presented dishes with impeccable service, look no further. I will definitely be returning soon to try more of their culinary delights”
                                                </p>
                                                <h3>Jonny Ananta</h3>
                                                <span>Regular Customer’s</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h6>Total raising money in this year > <span>$4,50,000</span></h6>
                                <div class="swiper brand-slider">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="brand-image text-center">
                                                <img src="assets/img/home-1/brand/01.png" alt="img">
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="brand-image text-center">
                                                <img src="assets/img/home-1/brand/02.png" alt="img">
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="brand-image text-center">
                                                <img src="assets/img/home-1/brand/03.png" alt="img">
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="brand-image text-center">
                                                <img src="assets/img/home-1/brand/04.png" alt="img">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         </section> -->

<!-- Counter Section Start -->

<div class="counter-section fix section-bg-1">
    <div class="right-shape">
        <img src="assets/img/home-1/feature/shape-2.png" alt="img">
    </div>
    <div class="container">
        <div class="counter-wrapper">
            <div class="row g-4 align-items-center">
                <div class="col-lg-6">
                    <div class="counter-image">
                        <img src="assets/img/home-1/feature/01.jpg" alt="img">
                        <div class="shape">
                            <img src="assets/img/home-1/feature/shape-1.png" alt="img">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="counter-content">
                        <div class="section-title mb-0">
                            <span class="sub-title wow fadeInUp">Numbers</span>
                            <h2 class="sec-title">
                                <span>W</span>e Always Help The <br> Needy Peoply
                            </h2>
                        </div>
                        <p class="text wow fadeInUp" data-wow-delay=".3s">
                            Charity helps to reduce suffering but also fosters a sense of unity and shared responsibility in difference in someone's life.
                        </p>
                        <div class="counter-main-item">
                            <div class="counter-item wow fadeInUp" data-wow-delay=".5s">
                                <div class="content style-2">
                                    <h2><span class="count">35</span>k</h2>
                                    <p>Team Suppor</p>
                                </div>
                                <div class="content">
                                    <h2><span class="count">1</span>k+</h2>
                                    <p>Successful Camaigns</p>
                                </div>
                            </div>
                            <div class="counter-item style-border wow fadeInUp" data-wow-delay=".3s">
                                <div class="content">
                                    <h2><span class="count">15</span>k+</h2>
                                    <p>Incredible Volunteers</p>
                                </div>
                                <div class="content style-2">
                                    <h2><span class="count">400</span>+</h2>
                                    <p>Monthly Donor</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Faq Section Start -->
<!-- <section class="faq-section section-padding fix">
    <div class="container">
        <div class="faq-wrapper">
            <div class="row g-4 align-items-center">
                <div class="col-lg-6">
                    <div class="faq-items">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item wow fadeInUp" data-wow-delay=".3s">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        What Is Charity, And Why Is It Important ?
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>
                                            Charity not only helps to reduce suffering but also fosters a sense of unity and shared responsibility in society.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item wow fadeInUp" data-wow-delay=".5s">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        How Can I Get Involved In Charity Work ?
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show"
                                    aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>
                                            Charity not only helps to reduce suffering but also fosters a sense of unity and shared responsibility in society.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item wow fadeInUp" data-wow-delay=".3s">
                                <h2 class="accordion-header" id="headingthree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapsethree" aria-expanded="false"
                                        aria-controls="collapsethree">
                                        Dedication for charitable Donations ?
                                    </button>
                                </h2>
                                <div id="collapsethree" class="accordion-collapse collapse"
                                    aria-labelledby="headingthree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>
                                            Charity not only helps to reduce suffering but also fosters a sense of unity and shared responsibility in society.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item wow fadeInUp" data-wow-delay=".5s">
                                <h2 class="accordion-header" id="headingfour">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapsefour" aria-expanded="false"
                                        aria-controls="collapsefour">
                                        My Donations Are Going To a Charity ?
                                    </button>
                                </h2>
                                <div id="collapsefour" class="accordion-collapse collapse" aria-labelledby="headingfour"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>
                                            Charity not only helps to reduce suffering but also fosters a sense of unity and shared responsibility in society.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item mb-0 wow fadeInUp" data-wow-delay=".3s">
                                <h2 class="accordion-header" id="headingfive">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapsefive" aria-expanded="false"
                                        aria-controls="collapsefive">
                                        Is my donation actually being put to use?
                                    </button>
                                </h2>
                                <div id="collapsefive" class="accordion-collapse collapse" aria-labelledby="headingfive"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>
                                            Charity not only helps to reduce suffering but also fosters a sense of unity and shared responsibility in society.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="faq-content">
                        <div class="section-title mb-0">
                            <span class="sub-title wow fadeInUp">Our Faq</span>
                            <h2 class="wow fadeInUp" data-wow-delay=".3s">
                                <span>E</span>Explore our FAQs for quick and helpful guidance
                            </h2>
                        </div>
                        <p class="text wow fadeInUp" data-wow-delay=".5s">
                            Charity not only helps to reduce suffering but also fosters a sense of unity and shared responsibility in society. It reminds us of the can make it your significant difference in someone's life.
                        </p>
                        <div class="faq-image wow slideInRight" data-wow-delay="100ms" data-wow-duration="2500ms">
                            <img src="assets/img/home-1/faq.jpg" alt="img">
                            <a href="https://www.youtube.com/watch?v=Cn4G2lZ_g2I" class="video-btn ripple video-popup">
                                <i class="fa-solid fa-play"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->

<!-- Publication Section Start -->
<section class="news-section section-padding  fix">
    <div class="container">
        <div class="section-title text-center">
            <span class="sub-title wow fadeInUp">Publications</span>
            <h2 class="wow fadeInUp" data-wow-delay=".3s">
                <span>I</span>nsights from latest Publications
            </h2>
        </div>
        <div class="row">
            @if ($data['publications']->isNotEmpty())
            @foreach ($data['publications'] as $publication)
            <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                <div class="news-card-items">
                    <div class="news-image">
                        <img src="{{ asset('storage/' . $publication->thumbnail) }}" alt="img">
                        <div class="news-layer-wrapper">
                            <div class="news-layer-image" style="background-image: url('{{ asset('storage/' . $publication->thumbnail) }}');"></div>
                            <div class="news-layer-image" style="background-image: url('{{ asset('storage/' . $publication->thumbnail) }}');"></div>
                            <div class="news-layer-image" style="background-image: url('{{ asset('storage/' . $publication->thumbnail) }}');"></div>
                            <div class="news-layer-image" style="background-image: url('{{ asset('storage/' . $publication->thumbnail) }}');"></div>
                        </div>
                        <div class="bottom-shape">
                            <img src="{{ asset('assets/img/home-1/news/shape.png') }}" alt="img">
                        </div>
                    </div>
                    <div class="news-content">
                        <ul class="news-meta">
                            <li>
                                <i class="fa-regular fa-user"></i>
                                By : {{ $publication->author ?? '' }}
                            </li>
                            <!-- <li>
                                <i class="fa-regular fa-comment"></i>
                                By : Comment
                            </li> -->
                        </ul>
                        <h4>
                            <a href="{{ route('web.blog.show') }}">
                                {{ $publication->title ?? '' }}
                            </a>
                        </h4>
                        <p>
                            {!! \Illuminate\Support\Str::words(strip_tags($publication->description), 10, '...') !!}
                        </p>
                        <a href="{{ route('web.blog.show') }}" class="link-btn">Read More <i class="fa-solid fa-arrow-right-long"></i></a>
                        @isset($publication->document)
                        <div class="mt-3">
                            <a href="{{ asset('storage/' . $publication->document) }}"
                                download
                                class="download-btn">
                                Download File
                            </a>
                        </div>
                        @endisset
                    </div>
                </div>
            </div>
            @endforeach
            @endif

        </div>
    </div>
</section>

<!-- News Section Start -->
<!-- <section class="news-section section-padding pt-0 fix">
    <div class="container">
        <div class="section-title text-center">
            <span class="sub-title wow fadeInUp">bLOG & nEWS</span>
            <h2 class="wow fadeInUp" data-wow-delay=".3s">
                <span>I</span>nsights from latest blog
            </h2>
        </div>
        <div class="row">
            <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                <div class="news-card-items">
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
                                By : Admin
                            </li>
                            <li>
                                <i class="fa-regular fa-comment"></i>
                                By : Comment
                            </li>
                        </ul>
                        <h4>
                            <a href="{{ route('web.blog.show') }}">
                                How Education Can Transform a Child’s Future.
                            </a>
                        </h4>
                        <a href="{{ route('web.blog.show') }}" class="link-btn">Read More <i class="fa-solid fa-arrow-right-long"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".5s">
                <div class="news-card-items">
                    <div class="news-image">
                        <img src="assets/img/home-1/news/02.jpg" alt="img">
                        <div class="news-layer-wrapper">
                            <div class="news-layer-image" style="background-image: url('assets/img/home-1/news/02.jpg');"></div>
                            <div class="news-layer-image" style="background-image: url('assets/img/home-1/news/02.jpg');"></div>
                            <div class="news-layer-image" style="background-image: url('assets/img/home-1/news/02.jpg');"></div>
                            <div class="news-layer-image" style="background-image: url('assets/img/home-1/news/02.jpg');"></div>
                        </div>
                        <div class="bottom-shape">
                            <img src="assets/img/home-1/news/shape.png" alt="img">
                        </div>
                    </div>
                    <div class="news-content">
                        <ul class="news-meta">
                            <li>
                                <i class="fa-regular fa-user"></i>
                                By : Admin
                            </li>
                            <li>
                                <i class="fa-regular fa-comment"></i>
                                By : Comment
                            </li>
                        </ul>
                        <h4>
                            <a href="{{ route('web.blog.show') }}">
                                How Education Can Transform a Child’s Future.
                            </a>
                        </h4>
                        <a href="{{ route('web.blog.show') }}" class="link-btn">Read More <i class="fa-solid fa-arrow-right-long"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".7s">
                <div class="news-card-items">
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
                                By : Admin
                            </li>
                            <li>
                                <i class="fa-regular fa-comment"></i>
                                By : Comment
                            </li>
                        </ul>
                        <h4>
                            <a href="{{ route('web.blog.show') }}">
                                How Education Can Transform a Child’s Future.
                            </a>
                        </h4>
                        <a href="{{ route('web.blog.show') }}" class="link-btn">Read More <i class="fa-solid fa-arrow-right-long"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->

<!-- Contact Section Start -->
<section class="contact-section section-padding pb-0">
    <div class="container-fluid">
        <div class="contact-wrapper">
            <div class="row g-4 align-items-end">
                <div class="col-lg-6">
                    <div class="contact-image wow img-custom-anim-left" data-wow-duration="1.3s" data-wow-delay="0.3s">
                        <img src="assets/img/home-1/contact.jpg" alt="img">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contact-content">
                        <div class="logo-image">
                            <a href="/"><img src="assets/img/logo/black-logo.png" alt="img"></a>
                        </div>
                        <div class="section-title mb-0">
                            <h2 class="sec-title text-white">
                                <span>A</span>lways open to more people <br> who what to support easts other
                            </h2>
                        </div>
                        <p class="text wow fadeInUp" data-wow-delay=".3s">
                            Charity not only helps to reduce suffering but also fosters a sense of unity and shared responsibility in society It reminds us of the can make it.
                        </p>
                        <div class="contact-item wow fadeInUp" data-wow-delay=".5s">
                            <a href="{{ route('web.contact') }}" class="theme-btn">Explore More <i class="fa-solid fa-arrow-right-long"></i></a>
                            <h6>
                                <span>Call :</span>
                                <a href="tel: +123 876 234">+123 876 234</a>
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection