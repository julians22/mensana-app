// import Swiper JS
import Swiper from 'swiper';

import { Autoplay, Controller, EffectFade, FreeMode, Navigation, Pagination, Thumbs, Zoom } from 'swiper/modules';


const home__swiper = new Swiper('.home__swiper', {
    modules: [Pagination],
    // Optional parameters
    slidesPerView: 1,
    pagination: {
        el: '.home__swiper .swiper-pagination',
        clickable: true,
    },
});

// Featured Products Swiper
// Show 5 slide on desktop
// 4 slide on tablet
// 1 slide on mobile
const home__product_swiper = new Swiper('.home__product_swiper', {
    modules: [Pagination, Autoplay],
    // Optional parameters
    slidesPerView: 1,
    pagination: {
        el: '.featured-products .swiper-pagination',
        clickable: true,
    },
    autoHeight: true,
    spaceBetween: 30,
    breakpoints: {
        640: {
            slidesPerView: 1,
            slidesPerGroup: 1
        },
        1024: {
            slidesPerView: 5,
            slidesPerGroup: 3
        },
    }
});

// Milestone Swiper (Thumbnail)
// Show 3 slides on desktop
const milestone__thumbnail_swiper = new Swiper('.thumbnail_milestone__swiper', {
    modules: [],
    // Optional parameters
    slidesPerView: 1,
    autoHeight: true,
    spaceBetween: 30,
    pagination: false,
    watchSlidesProgress: true,
    centeredSlides: true,
    breakpoints: {
        640: {
            slidesPerView: 1,
        },
        768: {
            slidesPerView: 2,
        },
        1024: {
            slidesPerView: 3,
        },
    },
});

// Milestone Swiper (Galery)
// Show 3 slides on desktop
const milestone__swiper = new Swiper('.milestone__swiper', {
    modules: [Pagination, Thumbs],
    // Optional parameters
    slidesPerView: 1,
    autoHeight: true,
    centeredSlides: true,
    spaceBetween: 30,
    watchSlidesProgress: true,
    pagination: {
        el: '.milestone__swiper-pagination',
        clickable: true,
    },
    breakpoints: {
        640: {
            slidesPerView: 1,
        },
        768: {
            slidesPerView: 2,
        },
        1024: {
            slidesPerView: 3,
        },
    },
    thumbs: {
        swiper: milestone__thumbnail_swiper,
        slideThumbActiveClass: 'milestone__thumbnail--active',
    }
});

const article_text_swiper = new Swiper('.article_text_swiper', {
    slidesPerView: 1,
    allowSlideNext: false,
    allowSlidePrev: false,
    allowTouchMove: false
});

const article_image_swiper = new Swiper('.article_image_swiper', {
    modules: [Controller, Navigation, Pagination],
    watchSlidesProgress: true,
    slidesPerView: 1,
    controller: {
        by: "slide",
        control: article_text_swiper
    },
    navigation: {
        prevEl: ".article_image_swiper .swiper-button-prev",
        nextEl: ".article_image_swiper .swiper-button-next"
    },
    pagination: {
        el: '.article_image_swiper__pagination.swiper-pagination',
        clickable: true,
    }
});

