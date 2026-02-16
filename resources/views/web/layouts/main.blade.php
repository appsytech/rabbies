<!DOCTYPE html>
<html lang="en">
<!--<< Header Area >>-->

<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Pixel-plus">
    <meta name="description" content="Appsytech - Non Profit NGO">
    <!-- ======== Page title ============ -->
    <title>@yield('title') </title>

    <!--<< Favcion >>-->
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.svg') }}">
    <!--<< Bootstrap min.css >>-->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <!--<< All Min Css >>-->
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}">
    <!--<< Animate.css >>-->
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <!--<< Magnific Popup.css >>-->
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <!--<< MeanMenu.css >>-->
    <link rel="stylesheet" href="{{ asset('assets/css/meanmenu.css') }}">
    <!--<< Swiper Bundle.css >>-->
    <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.min.css') }}">
    <!--<< Nice Select.css >>-->
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}">
    <!--<< Main.css >>-->
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">


    <style>
        .download-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #0e3b2e;
            color: #fff;
            padding: 9px 21px;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .download-btn i {
            font-size: 14px;
        }

        .download-btn:hover {
            background: #fdb913;
            color: #000;
        }
    </style>

</head>

<body>
    <!-- Preloader Start -->
    <div id="preloader" class="preloader">
        <div class="animation-preloader">
            <div class="spinner">
            </div>
            <div class="txt-loading">
                <span data-text-preloader="A" class="letters-loading">
                    A
                </span>
                <span data-text-preloader="B" class="letters-loading">
                    P
                </span>
                <span data-text-preloader="H" class="letters-loading">
                    P
                </span>
                <span data-text-preloader="I" class="letters-loading">
                    S
                </span>
                <span data-text-preloader="N" class="letters-loading">
                    Y
                </span>
                <span data-text-preloader="G" class="letters-loading">
                    TE
                </span>
                <span data-text-preloader="O" class="letters-loading">
                    CH
                </span>
            </div>
            <p class="text-center">Loading</p>
        </div>
        <div class="loader">
            <div class="row">
                <div class="col-3 loader-section section-left">
                    <div class="bg"></div>
                </div>
                <div class="col-3 loader-section section-left">
                    <div class="bg"></div>
                </div>
                <div class="col-3 loader-section section-right">
                    <div class="bg"></div>
                </div>
                <div class="col-3 loader-section section-right">
                    <div class="bg"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Back To Top Start -->
    <button id="back-top" class="back-to-top show" style="background-color: red;">
        <i class="fa-regular fa-arrow-up"></i>
    </button>

    <!-- MouseCursor Start -->
    <div class="mouseCursor cursor-outer"></div>
    <div class="mouseCursor cursor-inner"></div>

    <!-- Header-Top Start -->
    <div class="header-top-section">
        <div class="container-fluid">
            <div class="header-top-wrapper">
                <div class="icon-items">
                    <div class="icon">
                        <i class="fa-regular fa-location-dot"></i>
                    </div>
                    <div class="content">
                        <span>Locate Address</span>
                        <h5>
                            Kathmandu,Nepal
                        </h5>
                    </div>
                </div>
                <div class="icon-items">
                    <div class="icon">
                        <i class="fa-solid fa-phone-volume"></i>
                    </div>
                    <div class="content">
                        <span>Call Us any time</span>
                        <h5>
                            <a href="tel:++9779815418601">+9779815418601</a>
                        </h5>
                    </div>
                </div>
                <div class="icon-items">
                    <div class="icon">
                        <i class="fa-regular fa-envelope"></i>
                    </div>
                    <div class="content">
                        <span>Email</span>
                        <h4>
                            <a href="mailto:info@appsytech.com">info@appsytech.com</a>
                        </h4>
                    </div>
                </div>
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
    </div>

    <!-- Offcanvas Area Start -->
    <div class="fix-area">
        <div class="offcanvas__info">
            <div class="offcanvas__wrapper">
                <div class="offcanvas__content">
                    <div class="offcanvas__top mb-5 d-flex justify-content-between align-items-center">
                        <div class="offcanvas__logo">
                            <a href="/">
                                <img src="assets/img/logo/black-logo.png" alt="logo-img">
                            </a>
                        </div>
                        <div class="offcanvas__close">
                            <button>
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <p class="text d-none d-xl-block">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sint porro neque, rem beatae rerum illo ea odio nisi dolor maiores.
                    </p>
                    <div class="mobile-menu fix mb-3"></div>
                    <div class="offcanvas__contact d-xl-block">
                        <h4 class="d-xl-block">Contact Info</h4>
                        <ul class="d-xl-block">
                            <li class="d-flex align-items-center">
                                <div class="offcanvas__contact-icon">
                                    <i class="fal fa-map-marker-alt"></i>
                                </div>
                                <div class="offcanvas__contact-text">
                                    <a target="_blank" href="#">Patna, Bihar</a>
                                </div>
                            </li>
                            <li class="d-flex align-items-center">
                                <div class="offcanvas__contact-icon mr-15">
                                    <i class="fal fa-envelope"></i>
                                </div>
                                <div class="offcanvas__contact-text">
                                    <a href="mailto:info@abhingo.com"><span class="mailto:info@abhingo.com">info@abhingo.com</span></a>
                                </div>
                            </li>
                            <li class="d-flex align-items-center">
                                <div class="offcanvas__contact-icon mr-15">
                                    <i class="fal fa-clock"></i>
                                </div>
                                <div class="offcanvas__contact-text">
                                    <a target="_blank" href="#">Mod-friday, 09am -05pm</a>
                                </div>
                            </li>
                            <li class="d-flex align-items-center">
                                <div class="offcanvas__contact-icon mr-15">
                                    <i class="far fa-phone"></i>
                                </div>
                                <div class="offcanvas__contact-text">
                                    <a href="tel:+918340138097">+918340138097</a>
                                </div>
                            </li>
                        </ul>
                        <div class="social-icon d-flex align-items-center">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M18.244 2.25h3.308l-7.227 8.26L22.75 21.75h-6.57l-5.145-6.7-5.873 6.7H1.854l7.73-8.835L1.25 2.25h6.736l4.654 6.1z" />
                                </svg>
                            </a>

                            <a href="#"><i class="fab fa-youtube"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="offcanvas__overlay"></div>

    <!-- Header Section Start -->
    <header id="header-sticky" class="header-1">
        <div class="container-fluid">
            <div class="mega-menu-wrapper">
                <div class="header-main">
                    <div class="header-left">
                        <div class="logo">
                            <a href="{{ route('web.homepage') }}" class="header-logo">
                                <img src="{{ asset('assets/img/logo/black-logo.png') }}" alt="logo-img">
                            </a>
                        </div>
                    </div>
                    <div class="mean__menu-wrapper">
                        <div class="main-menu">
                            <nav id="mobile-menu">
                                <ul>
                                    <li class="has-dropdown active menu-thumb">
                                        <a href="{{ route('web.homepage') }}">
                                            Home
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('web.about-us') }}">About Us</a>
                                    </li>
                                    <li class="has-dropdown">
                                        <a href="{{ route('web.activity.index') }}">
                                            Activity
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('web.publication.index') }}">
                                            Publication
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('web.contact') }}">Contact Us</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="header-right d-flex justify-content-end align-items-center">
                        <a href="#" class="main-header__search search-toggler">
                            <i class="fa-regular fa-magnifying-glass"></i>
                        </a>
                        <div class="header-button">
                            <a href="#" class="theme-btn">
                                Explore Now <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                        <div class="header__hamburger d-xl-none my-auto">
                            <div class="sidebar__toggle">
                                <i class="fas fa-bars"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Search Area Start -->
    <div class="search-popup">
        <div class="search-popup__overlay search-toggler"></div>
        <div class="search-popup__content">
            <form role="search" method="get" class="search-popup__form" action="#">
                <input type="text" id="search" name="search" placeholder="Search Here...">
                <button type="submit" aria-label="search submit" class="search-btn">
                    <span><i class="fa-regular fa-magnifying-glass"></i></span>
                </button>
            </form>
        </div>
    </div>


    @yield('content')



    <!-- Footer Section Start -->
    <footer class="footer-section header-bg fix">
        <div class="container">
            <div class="footer-widget-wrapper">
                <div class="row g-4 justify-content-between">
                    <div class="col-6 col-md-6 col-lg-2 wow fadeInUp" data-wow-delay=".2s">
                        <div class="single-footer-widget">
                            <div class="wid-title">
                                <h3>Quick Links</h3>
                            </div>
                            <ul class="list-area">
                                <li>
                                    <a href="{{ route('web.about-us') }}">
                                        <i class="fa-solid fa-chevrons-right"></i>
                                        About US
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('web.contact') }}">
                                        <i class="fa-solid fa-chevrons-right"></i>
                                        Contact
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa-solid fa-chevrons-right"></i>
                                        Gallery
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa-solid fa-chevrons-right"></i>
                                        FAQ
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('web.blog.index') }}">
                                        <i class="fa-solid fa-chevrons-right"></i>
                                        Blog
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-6 col-md-6 col-lg-3 ps-lg-5 wow fadeInUp" data-wow-delay=".4s">
                        <div class="single-footer-widget">
                            <div class="wid-title">
                                <h3>Explore Now</h3>
                            </div>
                            <ul class="list-area">
                                <li>
                                    <a href="#">
                                        <i class="fa-solid fa-chevrons-right"></i>
                                        Volunteers
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa-solid fa-chevrons-right"></i>
                                        Publication
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('web.activity.index') }}">
                                        <i class="fa-solid fa-chevrons-right"></i>
                                        Activity
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa-solid fa-chevrons-right"></i>
                                        Gallary
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- <div class="col-6 col-md-6 col-lg-2 wow fadeInUp" data-wow-delay=".6s">
                            <div class="single-footer-widget">
                                <div class="wid-title">
                                    <h3>Supports</h3>
                                </div>
                                <ul class="list-area">
                                    <li>
                                        <a href="donation-details.html">
                                            <i class="fa-solid fa-chevrons-right"></i>
                                            Domination
                                        </a>
                                    </li>
                                    <li>
                                        <a href="news.html">
                                            <i class="fa-solid fa-chevrons-right"></i>
                                           Forums
                                        </a>
                                    </li>
                                    <li>
                                        <a href="faq.html">
                                            <i class="fa-solid fa-chevrons-right"></i>
                                            Faq
                                        </a>
                                    </li>
                                    <li>
                                        <a href="contact.html">
                                            <i class="fa-solid fa-chevrons-right"></i>
                                            Support Policy
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div> -->
                    <div class="col-xl-5 col-md-6 col-lg-5 ps-lg-5 wow fadeInUp" data-wow-delay=".8s">
                        <div class="single-footer-widget">
                            <div class="wid-title">
                                <h3>Newsletter</h3>
                            </div>
                            <div class="footer-newsletter">
                                <p>
                                    Charity not only helps to reduce suffering but also fosters a sense of unity and shared responsibility in society.
                                </p>
                                <form action="#">
                                    <div class="form-clt">
                                        <input type="text" name="email" id="email" placeholder="Enter Your Email">
                                        <button type="submit" class="theme-btn">
                                            Subscribe Now
                                        </button>
                                    </div>
                                </form>
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
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="footer-wrapper">
                    <p>Copyright & Design By <span>@AbhiNGO</span></p>
                    <ul class="footer-bottom-list">
                        <li>
                            <a href="#">Faq</a>
                        </li>
                        <li>
                            <a href="{{ route('web.contact') }}">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!--<< All JS Plugins >>-->
    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
    <!--<< Viewport Js >>-->
    <script src="{{ asset('assets/js/viewport.jquery.js') }}"></script>
    <!--<< Bootstrap Js >>-->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <!--<< nice-selec Js >>-->
    <script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
    <!--<< Waypoints Js >>-->
    <script src="{{ asset('assets/js/jquery.waypoints.js') }}"></script>
    <!--<< Counterup Js >>-->
    <script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
    <!--<< Swiper Slider Js >>-->
    <script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
    <!--<< MeanMenu Js >>-->
    <script src="{{ asset('assets/js/jquery.meanmenu.min.js') }}"></script>
    <!--<< Magnific Popup Js >>-->
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <!--<< Wow Animation Js >>-->
    <script src="{{ asset('assets/js/wow.min.js') }}"></script>
    <!--<< Main js >>-->
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>