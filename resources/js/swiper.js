// import Swiper JS
import Swiper from 'swiper';

import { Autoplay, FreeMode, Pagination, Zoom } from 'swiper/modules';


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
        },
        768: {
            slidesPerView: 4,
        },
        1024: {
            slidesPerView: 5,
        },
    }
});
