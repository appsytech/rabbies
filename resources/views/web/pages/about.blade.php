@extends('web.layouts.main')
@section('title', 'Appsytech Non Profit Organization')

@section('content')
<!-- Hero Section Start -->
<div class="breadcrumb-wrapper fix bg-cover" style="background-image: url(assets/img/inner-page/breadcrumb.png);">
    <div class="container">
        <div class="page-heading">
            <div class="breadcrumb-sub-title">
                <h1 class="wow fadeInUp" data-wow-delay=".3s">About Us</h1>
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
                    About Us
                </li>
            </ul>
        </div>
    </div>
</div>

<!-- About Section Start -->
<section class="about-section section-padding fix">
    <div class="container">
        <div class="about-wrapper-2">
            <div class="row g-4">
                <div class="col-lg-8">
                    <div class="about-left-item">
                        <div class="section-title style-2 mb-0">
                            <span class="sub-title wow fadeInUp">About Us</span>
                            <h2 class="wow fadeInUp" data-wow-delay=".3s">
                                <span>S</span>aving lives one paw at a time through student compassion <br> and dedicated care.
                            </h2>
                        </div>
                        <p class="text wow fadeInUp" data-wow-delay=".5s">
                            We are a university-based animal welfare organization where passionate student volunteers rescue, treat, and care for street animals. Through hands-on training and compassionate action, we're building a generation of responsible animal advocates.
                        </p>
                        <div class="about-image wow img-custom-anim-left" data-wow-duration="1.3s" data-wow-delay="0.3s">
                            <img src="assets/img/home-1/about/01.jpg" alt="img">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="about-right-item">
                        <div class="about-image wow img-custom-anim-right" data-wow-duration="1.3s" data-wow-delay="0.3s">
                            <img src="assets/img/home-1/about/02.jpg" alt="img">
                        </div>
                        <div class="about-icon-main-item">
                            <div class="about-icon-item">
                                <div class="icon-item wow fadeInUp" data-wow-delay=".3s">
                                    <div class="icon">
                                        <img src="assets/img/home-1/icon/01.svg" alt="img">
                                    </div>
                                    <div class="content">
                                        <h5>Daily Feeding</h5>
                                        <p>
                                            Providing nutritious meals to street animals daily.
                                        </p>
                                    </div>
                                </div>
                                <div class="icon-item wow fadeInUp" data-wow-delay=".5s">
                                    <div class="icon">
                                        <img src="assets/img/home-1/icon/01.svg" alt="img">
                                    </div>
                                    <div class="content">
                                        <h5>Medical Care</h5>
                                        <p>
                                            Emergency treatment and veterinary support.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="about-icon-item mb-0">
                                <div class="icon-item wow fadeInUp" data-wow-delay=".3s">
                                    <div class="icon">
                                        <img src="assets/img/home-1/icon/03.svg" alt="img">
                                    </div>
                                    <div class="content">
                                        <h5>Rescue Operations</h5>
                                        <p>
                                            24/7 emergency rescue for injured animals.
                                        </p>
                                    </div>
                                </div>
                                <div class="icon-item wow fadeInUp" data-wow-delay=".5s">
                                    <div class="icon">
                                        <img src="assets/img/home-1/icon/04.svg" alt="img">
                                    </div>
                                    <div class="content">
                                        <h5>Student Training</h5>
                                        <p>
                                            Empowering youth with animal care skills.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Team Section Start -->
<section class="team-section fix">
    <div class="container">
        <div class="section-title text-center">
            <span class="sub-title wow fadeInUp">Our Volunteers</span>
            <h2 class="wow fadeInUp" data-wow-delay=".3s">
                <span>M</span>eet Our Dedicated Volunteers
            </h2>
        </div>
        <div class="row">
            <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".2s">
                <div class="team-card-items">
                    <div class="team-image">
                        <img src="assets/img/home-1/team/01.jpg" alt="img">
                    </div>
                    <div class="team-content">
                        <h5>
                            <a href="volounteer-details.html">Priya Sharma</a>
                        </h5>
                        <p>Rescue Team Lead</p>
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
            <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".4s">
                <div class="team-card-items">
                    <div class="team-image">
                        <img src="assets/img/home-1/team/02.jpg" alt="img">
                    </div>
                    <div class="team-content">
                        <h5>
                            <a href="volounteer-details.html">Rahul Kumar</a>
                        </h5>
                        <p>Medical Support Volunteer</p>
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
            <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".6s">
                <div class="team-card-items">
                    <div class="team-image">
                        <img src="assets/img/home-1/team/03.jpg" alt="img">
                    </div>
                    <div class="team-content">
                        <h5>
                            <a href="volounteer-details.html">Anjali Singh</a>
                        </h5>
                        <p>Feeding Program Coordinator</p>
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
            <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".8s">
                <div class="team-card-items">
                    <div class="team-image">
                        <img src="assets/img/home-1/team/04.jpg" alt="img">
                    </div>
                    <div class="team-content">
                        <h5>
                            <a href="volounteer-details.html">Arjun Patel</a>
                        </h5>
                        <p>Awareness Campaign Manager</p>
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
            <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".2s">
                <div class="team-card-items">
                    <div class="team-image">
                        <img src="assets/img/home-1/team/01.jpg" alt="img">
                    </div>
                    <div class="team-content">
                        <h5>
                            <a href="volounteer-details.html">Sneha Verma</a>
                        </h5>
                        <p>Adoption Counselor</p>
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
            <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".4s">
                <div class="team-card-items">
                    <div class="team-image">
                        <img src="assets/img/home-1/team/02.jpg" alt="img">
                    </div>
                    <div class="team-content">
                        <h5>
                            <a href="volounteer-details.html">Vikram Joshi</a>
                        </h5>
                        <p>Veterinary Assistant</p>
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
            <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".6s">
                <div class="team-card-items">
                    <div class="team-image">
                        <img src="assets/img/home-1/team/03.jpg" alt="img">
                    </div>
                    <div class="team-content">
                        <h5>
                            <a href="volounteer-details.html">Riya Gupta</a>
                        </h5>
                        <p>Social Media Manager</p>
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
            <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".8s">
                <div class="team-card-items">
                    <div class="team-image">
                        <img src="assets/img/home-1/team/04.jpg" alt="img">
                    </div>
                    <div class="team-content">
                        <h5>
                            <a href="volounteer-details.html">Aditya Mehta</a>
                        </h5>
                        <p>Fundraising Coordinator</p>
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
            <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".2s">
                <div class="team-card-items">
                    <div class="team-image">
                        <img src="assets/img/home-1/team/01.jpg" alt="img">
                    </div>
                    <div class="team-content">
                        <h5>
                            <a href="volounteer-details.html">Kavya Rao</a>
                        </h5>
                        <p>Shelter Manager</p>
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
            <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".4s">
                <div class="team-card-items">
                    <div class="team-image">
                        <img src="assets/img/home-1/team/02.jpg" alt="img">
                    </div>
                    <div class="team-content">
                        <h5>
                            <a href="volounteer-details.html">Rohan Desai</a>
                        </h5>
                        <p>Training Coordinator</p>
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
            <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".6s">
                <div class="team-card-items">
                    <div class="team-image">
                        <img src="assets/img/home-1/team/03.jpg" alt="img">
                    </div>
                    <div class="team-content">
                        <h5>
                            <a href="volounteer-details.html">Meera Nair</a>
                        </h5>
                        <p>Community Outreach Lead</p>
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
            <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".8s">
                <div class="team-card-items">
                    <div class="team-image">
                        <img src="assets/img/home-1/team/04.jpg" alt="img">
                    </div>
                    <div class="team-content">
                        <h5>
                            <a href="volounteer-details.html">Karan Sharma</a>
                        </h5>
                        <p>Event Organizer</p>
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
        </div>
    </div>
</section>

<!-- Faq Section Start -->
<section class="faq-section section-padding fix">
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
                                        How Can I Volunteer For Animal Rescue?
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>
                                            Join our university-based team by registering through our website. We provide complete training in animal handling, rescue techniques, and first aid before you start volunteering.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item wow fadeInUp" data-wow-delay=".5s">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        What Services Do You Provide For Animals?
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show"
                                    aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>
                                            We provide emergency rescue, veterinary treatment, daily feeding, vaccinations, sterilization, shelter care, and adoption services for street and rescued animals.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item wow fadeInUp" data-wow-delay=".3s">
                                <h2 class="accordion-header" id="headingthree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapsethree" aria-expanded="false"
                                        aria-controls="collapsethree">
                                        How Can I Report An Injured Animal?
                                    </button>
                                </h2>
                                <div id="collapsethree" class="accordion-collapse collapse"
                                    aria-labelledby="headingthree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>
                                            Contact our 24/7 emergency helpline or send us the location via WhatsApp. Our rescue team will respond immediately to help the injured animal.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item wow fadeInUp" data-wow-delay=".5s">
                                <h2 class="accordion-header" id="headingfour">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapsefour" aria-expanded="false"
                                        aria-controls="collapsefour">
                                        Can I Adopt A Rescued Animal?
                                    </button>
                                </h2>
                                <div id="collapsefour" class="accordion-collapse collapse" aria-labelledby="headingfour"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>
                                            Yes! We have many rescued animals ready for adoption. Visit our shelter or check our social media for available pets. Our team will guide you through the adoption process.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item mb-0 wow fadeInUp" data-wow-delay=".3s">
                                <h2 class="accordion-header" id="headingfive">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapsefive" aria-expanded="false"
                                        aria-controls="collapsefive">
                                        Do You Need Only University Students?
                                    </button>
                                </h2>
                                <div id="collapsefive" class="accordion-collapse collapse" aria-labelledby="headingfive"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>
                                            While we're university-based, we welcome anyone passionate about animal welfare. Students get priority for hands-on training, but community members can support through donations and awareness campaigns.
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
                            <span class="sub-title wow fadeInUp">Common Questions</span>
                            <h2 class="wow fadeInUp" data-wow-delay=".3s">
                                <span>E</span>xplore our FAQs for quick and helpful guidance
                            </h2>
                        </div>
                        <p class="text wow fadeInUp" data-wow-delay=".5s">
                            Our student-led animal welfare initiative is dedicated to rescuing and caring for street animals. We believe every life matters and through education and action, we're making a real difference in our community.
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
</section>

<!-- Testimonial Section Start -->
<section class="testimonial-section section-padding pt-0 fix">
    <div class="container">
        <div class="section-title">
            <span class="sub-title wow fadeInUp">Success Stories</span>
            <h2 class="wow fadeInUp" data-wow-delay=".3s">
                <span>W</span>hat People Say About Our Work
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
                                            These amazing student volunteers rescued my injured dog from the street and provided complete medical treatment. Today, he's healthy and happy. Their dedication and compassion toward animals is truly inspiring. I'm forever grateful for their selfless service!
                                        </p>
                                        <h3>Amit Verma</h3>
                                        <span>Pet Owner & Supporter</span>
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
                                            I adopted my cat from this wonderful organization. The volunteers not only rescued and treated her, but also helped me through the entire adoption process. Their commitment to animal welfare is remarkable and every animal deserves such care!
                                        </p>
                                        <h3>Priya Reddy</h3>
                                        <span>Animal Adopter</span>
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
                                            Being part of this volunteer team has been life-changing. The training and hands-on experience have taught me so much about animal care and compassion. Together, we're making a real difference in our community, one rescue at a time!
                                        </p>
                                        <h3>Rahul Singh</h3>
                                        <span>Student Volunteer</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h6>Total Animals Rescued This Year > <span>500+</span></h6>
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
</section>

@endsection