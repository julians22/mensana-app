import './bootstrap';

// Swiper Scripts
import './swiper';

import './motions/index';


const imgShadowWrapper = document.querySelector('.img__shadowable_wrapper')
const imgShadowable = imgShadowWrapper?.querySelector('.img__shadowable');

// if element exist, create new image at the bottom
if (imgShadowable) {
    const newImg = document.createElement('img');
    newImg.src = imgShadowable.src;
    newImg.alt = imgShadowable.alt;
    newImg.classList.add('img__shadowable', 'shadow');

    imgShadowWrapper.appendChild(newImg);
}
