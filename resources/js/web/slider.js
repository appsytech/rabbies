import Swiper from "swiper";
import { Navigation, Pagination, Autoplay } from "swiper/modules";

const progressCircle = document.querySelector(".autoplay-progress svg");
const progressContent = document.querySelector(".autoplay-progress span");

/*=================================
Hero Section Slider
===================================*/
new Swiper(".mySwiper", {
    modules: [Navigation, Pagination],
    loop: true,
    spaceBetween: 16,

    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },

    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
});

/*=================================
Message Section Slider
===================================*/
var swiper = new Swiper(".mySwiper2", {
    modules: [Navigation, Pagination, Autoplay],
    loop: true,
    slidesPerView: 1,
    spaceBetween: 0,
    navigation: {
        nextEl: ".swiper-scnd-button-next",
        prevEl: ".swiper-scnd-button-prev",
    },
    pagination: {
        el: ".swiper-scnd-pagination",
        clickable: true,
    },
    autoplay: {
        delay: 3000,
        disableOnInteraction: false,
    },
    on: {
        autoplayTimeLeft(s, time, progress) {
            progressCircle.style.setProperty("--progress", 1 - progress);
            progressContent.textContent = `${Math.ceil(time / 1000)}s`;
        },
    },
});

/*=================================
Review Section Slider
===================================*/
new Swiper(".mySwiper3", {
    modules: [Navigation, Pagination, Autoplay],
    loop: true,
    spaceBetween: 10,
    slidesPerView: 1,
    breakpoints: {
        768: {
            slidesPerView: 2, // md
        },
        1024: {
            slidesPerView: 3, // lg
        },
    },

    autoplay: {
        delay: 3000,
        disableOnInteraction: false,
    },

    pagination: {
        el: ".swiper-thrd-pagination",
        clickable: true,
    },
});

/*=================================
Review Section Slider
===================================*/
new Swiper(".mySwiper-teachers-cards", {
    modules: [Navigation, Pagination, Autoplay],
    loop: true,
    spaceBetween: 10,
    slidesPerView: 1,
    breakpoints: {
        768: {
            slidesPerView: 2, // md
        },
        1024: {
            slidesPerView: 4, // lg
        },
    },

    autoplay: {
        delay: 3000,
        disableOnInteraction: false,
    },

    pagination: {
        el: ".swiper-teacher-pagination",
        clickable: true,
    },
});
