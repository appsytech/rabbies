@extends('web.layouts.main')
@section('title', 'Appsytech Non Profit Organization')

@section('content')


<!-- Hero Section Start -->
<div class="breadcrumb-wrapper fix bg-cover" style="background-image: url(assets/img/inner-page/breadcrumb.png);">
    <div class="container">
        <div class="page-heading">
            <div class="breadcrumb-sub-title">
                <h1 class="wow fadeInUp" data-wow-delay=".3s">Blog Details</h1>
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
                    Blog Details
                </li>
            </ul>
        </div>
    </div>
</div>

<!-- News Section Start -->
<section class="news-details-section section-padding fix">
    <div class="container">
        <div class="news-details-wrapper">
            <div class="row g-4">
                <div class="col-lg-8 col-12">
                    <div class="news-details-post">
                        <div class="news-details-image">
                            <img src="assets/img/inner-page/blog-details/details-1.jpg" alt="img">
                        </div>
                        <div class="news-details-content">
                            <ul class="date-list">
                                <li>
                                    <i class="fa-solid fa-calendar-days"></i>
                                    28 January 2026
                                </li>
                                <li>
                                    <i class="fa-regular fa-location-dot"></i>
                                    University Campus, Animal Welfare Center
                                </li>
                            </ul>
                            <p>
                                Our university-based animal welfare organization is dedicated to rescuing, treating, and caring for street animals and abandoned pets. Through the compassion and commitment of our student volunteers, we provide emergency rescue services, veterinary care, daily feeding programs, and a safe shelter for animals in need.
                            </p>
                            <p class="mt-3">
                                Every day, our trained volunteers work tirelessly to make a difference in the lives of voiceless creatures. From midnight rescue operations to providing first aid and medical treatment, we're building a community where every animal matters and compassion leads to action.
                            </p>
                            <div class="sideber">
                                <h5>
                                    "Saving one animal won't change the world, but it will change the world for that one animal. Our mission is to create a compassionate society where no street animal suffers alone."
                                </h5>
                            </div>
                            <h3>Our Mission & Impact</h3>
                            <p class="mt-3">
                                We believe in empowering youth through hands-on animal welfare training. Our student volunteers learn essential skills in animal handling, emergency rescue, veterinary assistance, and community outreach. By combining education with action, we're not just saving animals today – we're creating responsible leaders for tomorrow.
                            </p>
                            <div class="news-details-list-items">
                                <ul class="list-item">
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                            <path d="M9.22996 17.7227C9.17691 17.7227 9.12443 17.7117 9.07583 17.6905C9.02722 17.6692 8.98354 17.6381 8.94754 17.5991L1.33265 9.36203C1.28189 9.30712 1.24824 9.2386 1.23581 9.16485C1.22339 9.09111 1.23273 9.01534 1.2627 8.94683C1.29267 8.87831 1.34196 8.82002 1.40455 8.77908C1.46713 8.73815 1.54029 8.71634 1.61508 8.71634H5.28046C5.33549 8.71635 5.38988 8.72816 5.43997 8.75098C5.49005 8.7738 5.53465 8.80709 5.57077 8.84861L8.11569 11.7765C8.39073 11.1885 8.92315 10.2096 9.85746 9.01676C11.2387 7.2533 13.8078 4.6598 18.2034 2.31857C18.2883 2.27333 18.3872 2.26159 18.4804 2.28566C18.5736 2.30974 18.6543 2.36789 18.7068 2.44862C18.7592 2.52935 18.7794 2.6268 18.7635 2.72172C18.7475 2.81665 18.6966 2.90215 18.6207 2.96134C18.6039 2.97446 16.9092 4.30907 14.9587 6.75365C13.1636 9.00326 10.7774 12.6817 9.60319 17.4306C9.58256 17.514 9.53459 17.5881 9.46692 17.6411C9.39925 17.6941 9.31579 17.7229 9.22984 17.7229L9.22996 17.7227Z" fill="#FFC107" />
                                        </svg>
                                        Emergency Animal Rescue
                                    </li>
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                            <path d="M9.22996 17.7227C9.17691 17.7227 9.12443 17.7117 9.07583 17.6905C9.02722 17.6692 8.98354 17.6381 8.94754 17.5991L1.33265 9.36203C1.28189 9.30712 1.24824 9.2386 1.23581 9.16485C1.22339 9.09111 1.23273 9.01534 1.2627 8.94683C1.29267 8.87831 1.34196 8.82002 1.40455 8.77908C1.46713 8.73815 1.54029 8.71634 1.61508 8.71634H5.28046C5.33549 8.71635 5.38988 8.72816 5.43997 8.75098C5.49005 8.7738 5.53465 8.80709 5.57077 8.84861L8.11569 11.7765C8.39073 11.1885 8.92315 10.2096 9.85746 9.01676C11.2387 7.2533 13.8078 4.6598 18.2034 2.31857C18.2883 2.27333 18.3872 2.26159 18.4804 2.28566C18.5736 2.30974 18.6543 2.36789 18.7068 2.44862C18.7592 2.52935 18.7794 2.6268 18.7635 2.72172C18.7475 2.81665 18.6966 2.90215 18.6207 2.96134C18.6039 2.97446 16.9092 4.30907 14.9587 6.75365C13.1636 9.00326 10.7774 12.6817 9.60319 17.4306C9.58256 17.514 9.53459 17.5881 9.46692 17.6411C9.39925 17.6941 9.31579 17.7229 9.22984 17.7229L9.22996 17.7227Z" fill="#FFC107" />
                                        </svg>
                                        Veterinary Treatment & Care
                                    </li>
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                            <path d="M9.22996 17.7227C9.17691 17.7227 9.12443 17.7117 9.07583 17.6905C9.02722 17.6692 8.98354 17.6381 8.94754 17.5991L1.33265 9.36203C1.28189 9.30712 1.24824 9.2386 1.23581 9.16485C1.22339 9.09111 1.23273 9.01534 1.2627 8.94683C1.29267 8.87831 1.34196 8.82002 1.40455 8.77908C1.46713 8.73815 1.54029 8.71634 1.61508 8.71634H5.28046C5.33549 8.71635 5.38988 8.72816 5.43997 8.75098C5.49005 8.7738 5.53465 8.80709 5.57077 8.84861L8.11569 11.7765C8.39073 11.1885 8.92315 10.2096 9.85746 9.01676C11.2387 7.2533 13.8078 4.6598 18.2034 2.31857C18.2883 2.27333 18.3872 2.26159 18.4804 2.28566C18.5736 2.30974 18.6543 2.36789 18.7068 2.44862C18.7592 2.52935 18.7794 2.6268 18.7635 2.72172C18.7475 2.81665 18.6966 2.90215 18.6207 2.96134C18.6039 2.97446 16.9092 4.30907 14.9587 6.75365C13.1636 9.00326 10.7774 12.6817 9.60319 17.4306C9.58256 17.514 9.53459 17.5881 9.46692 17.6411C9.39925 17.6941 9.31579 17.7229 9.22984 17.7229L9.22996 17.7227Z" fill="#FFC107" />
                                        </svg>
                                        Student Volunteer Training
                                    </li>
                                </ul>
                                <ul class="list-item">
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                            <path d="M9.22996 17.7227C9.17691 17.7227 9.12443 17.7117 9.07583 17.6905C9.02722 17.6692 8.98354 17.6381 8.94754 17.5991L1.33265 9.36203C1.28189 9.30712 1.24824 9.2386 1.23581 9.16485C1.22339 9.09111 1.23273 9.01534 1.2627 8.94683C1.29267 8.87831 1.34196 8.82002 1.40455 8.77908C1.46713 8.73815 1.54029 8.71634 1.61508 8.71634H5.28046C5.33549 8.71635 5.38988 8.72816 5.43997 8.75098C5.49005 8.7738 5.53465 8.80709 5.57077 8.84861L8.11569 11.7765C8.39073 11.1885 8.92315 10.2096 9.85746 9.01676C11.2387 7.2533 13.8078 4.6598 18.2034 2.31857C18.2883 2.27333 18.3872 2.26159 18.4804 2.28566C18.5736 2.30974 18.6543 2.36789 18.7068 2.44862C18.7592 2.52935 18.7794 2.6268 18.7635 2.72172C18.7475 2.81665 18.6966 2.90215 18.6207 2.96134C18.6039 2.97446 16.9092 4.30907 14.9587 6.75365C13.1636 9.00326 10.7774 12.6817 9.60319 17.4306C9.58256 17.514 9.53459 17.5881 9.46692 17.6411C9.39925 17.6941 9.31579 17.7229 9.22984 17.7229L9.22996 17.7227Z" fill="#FFC107" />
                                        </svg>
                                        Daily Feeding Programs
                                    </li>
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                            <path d="M9.22996 17.7227C9.17691 17.7227 9.12443 17.7117 9.07583 17.6905C9.02722 17.6692 8.98354 17.6381 8.94754 17.5991L1.33265 9.36203C1.28189 9.30712 1.24824 9.2386 1.23581 9.16485C1.22339 9.09111 1.23273 9.01534 1.2627 8.94683C1.29267 8.87831 1.34196 8.82002 1.40455 8.77908C1.46713 8.73815 1.54029 8.71634 1.61508 8.71634H5.28046C5.33549 8.71635 5.38988 8.72816 5.43997 8.75098C5.49005 8.7738 5.53465 8.80709 5.57077 8.84861L8.11569 11.7765C8.39073 11.1885 8.92315 10.2096 9.85746 9.01676C11.2387 7.2533 13.8078 4.6598 18.2034 2.31857C18.2883 2.27333 18.3872 2.26159 18.4804 2.28566C18.5736 2.30974 18.6543 2.36789 18.7068 2.44862C18.7592 2.52935 18.7794 2.6268 18.7635 2.72172C18.7475 2.81665 18.6966 2.90215 18.6207 2.96134C18.6039 2.97446 16.9092 4.30907 14.9587 6.75365C13.1636 9.00326 10.7774 12.6817 9.60319 17.4306C9.58256 17.514 9.53459 17.5881 9.46692 17.6411C9.39925 17.6941 9.31579 17.7229 9.22984 17.7229L9.22996 17.7227Z" fill="#FFC107" />
                                        </svg>
                                        Adoption & Rehabilitation
                                    </li>
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                            <path d="M9.22996 17.7227C9.17691 17.7227 9.12443 17.7117 9.07583 17.6905C9.02722 17.6692 8.98354 17.6381 8.94754 17.5991L1.33265 9.36203C1.28189 9.30712 1.24824 9.2386 1.23581 9.16485C1.22339 9.09111 1.23273 9.01534 1.2627 8.94683C1.29267 8.87831 1.34196 8.82002 1.40455 8.77908C1.46713 8.73815 1.54029 8.71634 1.61508 8.71634H5.28046C5.33549 8.71635 5.38988 8.72816 5.43997 8.75098C5.49005 8.7738 5.53465 8.80709 5.57077 8.84861L8.11569 11.7765C8.39073 11.1885 8.92315 10.2096 9.85746 9.01676C11.2387 7.2533 13.8078 4.6598 18.2034 2.31857C18.2883 2.27333 18.3872 2.26159 18.4804 2.28566C18.5736 2.30974 18.6543 2.36789 18.7068 2.44862C18.7592 2.52935 18.7794 2.6268 18.7635 2.72172C18.7475 2.81665 18.6966 2.90215 18.6207 2.96134C18.6039 2.97446 16.9092 4.30907 14.9587 6.75365C13.1636 9.00326 10.7774 12.6817 9.60319 17.4306C9.58256 17.514 9.53459 17.5881 9.46692 17.6411C9.39925 17.6941 9.31579 17.7229 9.22984 17.7229L9.22996 17.7227Z" fill="#FFC107" />
                                        </svg>
                                        Community Awareness
                                    </li>
                                </ul>
                            </div>
                            <div class="row g-4">
                                <div class="col-lg-6">
                                    <div class="news-thumb">
                                        <img src="assets/img/inner-page/blog-details/details-2.jpg" alt="img">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="news-thumb">
                                        <img src="assets/img/inner-page/blog-details/details-3.jpg" alt="img">
                                    </div>
                                </div>
                            </div>
                            <div class="row tag-share-wrap mt-4 mb-5">
                                <div class="col-lg-8 col-12">
                                    <div class="tagcloud">
                                        <span>Tags:</span>
                                        <a href="{{ route('web.blog.show') }}">animal rescue</a>
                                        <a href="{{ route('web.blog.show') }}">volunteers</a>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-12 mt-3 mt-lg-0 text-lg-end">
                                    <div class="social-share">
                                        <a href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M18.244 2.25h3.308l-7.227 8.26L22.75 21.75h-6.57l-5.145-6.7-5.873 6.7H1.854l7.73-8.835L1.25 2.25h6.736l4.654 6.1z" />
                                            </svg>
                                        </a>

                                        <a href="#"><i class="fa-brands fa-youtube"></i></a>
                                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="main-sideber">
                        <div class="single-sidebar-widget">
                            <div class="wid-title">
                                <h4>Search</h4>
                            </div>
                            <div class="search-widget">
                                <form action="#">
                                    <input type="text" placeholder="Search here">
                                    <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                                </form>
                            </div>
                        </div>
                        <div class="single-sidebar-widget">
                            <div class="wid-title">
                                <h4>Recent Activities</h4>
                            </div>
                            <div class="recent-post-area">
                                <div class="recent-items">
                                    <div class="recent-thumb">
                                        <img src="assets/img/inner-page/blog-details/post-1.jpg" alt="img">
                                    </div>
                                    <div class="recent-content">
                                        <h6>
                                            <a href="{{ route('web.blog.show') }}">
                                                Successful Rescue of 15 Street Dogs
                                            </a>
                                        </h6>
                                        <ul>
                                            <li>
                                                January 20, 2026
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="recent-items">
                                    <div class="recent-thumb">
                                        <img src="assets/img/inner-page/blog-details/post-2.jpg" alt="img">
                                    </div>
                                    <div class="recent-content">
                                        <h6>
                                            <a href="{{ route('web.blog.show') }}">
                                                Free Vaccination Camp for 100+ Animals
                                            </a>
                                        </h6>
                                        <ul>
                                            <li>
                                                January 18, 2026
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="recent-items">
                                    <div class="recent-thumb">
                                        <img src="assets/img/inner-page/blog-details/post-3.jpg" alt="img">
                                    </div>
                                    <div class="recent-content">
                                        <h6>
                                            <a href="{{ route('web.blog.show') }}">
                                                New Student Volunteers Join Our Team
                                            </a>
                                        </h6>
                                        <ul>
                                            <li>
                                                January 15, 2026
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="recent-items">
                                    <div class="recent-thumb">
                                        <img src="assets/img/inner-page/blog-details/post-1.jpg" alt="img">
                                    </div>
                                    <div class="recent-content">
                                        <h6>
                                            <a href="{{ route('web.blog.show') }}">
                                                Successful Rescue of 15 Street Dogs
                                            </a>
                                        </h6>
                                        <ul>
                                            <li>
                                                January 20, 2026
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="recent-items">
                                    <div class="recent-thumb">
                                        <img src="assets/img/inner-page/blog-details/post-2.jpg" alt="img">
                                    </div>
                                    <div class="recent-content">
                                        <h6>
                                            <a href="{{ route('web.blog.show') }}">
                                                Free Vaccination Camp for 100+ Animals
                                            </a>
                                        </h6>
                                        <ul>
                                            <li>
                                                January 18, 2026
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="recent-items">
                                    <div class="recent-thumb">
                                        <img src="assets/img/inner-page/blog-details/post-3.jpg" alt="img">
                                    </div>
                                    <div class="recent-content">
                                        <h6>
                                            <a href="{{ route('web.blog.show') }}">
                                                New Student Volunteers Join Our Team
                                            </a>
                                        </h6>
                                        <ul>
                                            <li>
                                                January 15, 2026
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single-sidebar-widget mb-0">
                            <div class="wid-title">
                                <h4>Popular Tags</h4>
                            </div>
                            <div class="news-widget-categories">
                                <div class="tagcloud">
                                    <a href="{{ route('web.blog.show') }}">animal rescue</a>
                                    <a href="{{ route('web.blog.show') }}">volunteers</a>
                                    <a href="{{ route('web.blog.show') }}">veterinary</a>
                                    <a href="{{ route('web.blog.show') }}">feeding</a>
                                    <a href="{{ route('web.blog.show') }}">adoption</a>
                                    <a href="{{ route('web.blog.show') }}">sterilization</a>
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