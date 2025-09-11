import { animate } from "motion";

const DEFAULT_ONCE = true;
const DEFAULT_DELAY = 0;
const duration = 0.9;


function attachAnimation(el)
{
    let animation = checkAnimation(el.getAttribute("data-motion"));

    let config = {
        delay: el.getAttribute("data-delay") || DEFAULT_DELAY,
        duration: el.getAttribute("data-duration") || duration,
        once: el.getAttribute("data-once") || DEFAULT_ONCE,
        easing: [0.6, -0.05, 0.01, 0.99]
    }

    animate(
        el,
        animation.animate,
        config
    )

    return () => animate(el, animation.initial);
}



// let config = {
//     delay: element.getAttribute("data-delay") || DEFAULT_DELAY,
//     duration: element.getAttribute("data-duration") || duration,
//     once: element.getAttribute("data-once") || DEFAULT_ONCE,
//     easing: [0.6, -0.05, 0.01, 0.99]
// }

// animate(
//     element,
//     { opacity: [0,1], x: [-100, 0] },
//     config
// )

// return () => animate(element, { opacity: 0, x: -100 }, config)


// @generate me an animations list
const FADE_LEFT = {
    initial: { opacity: 0, x: -100 },
    animate: { opacity: [0, 1], x: [-100, 0] }
}

const FADE_RIGHT = {
    initial: { opacity: 0, x: 100 },
    animate: { opacity: [0, 1], x: [100, 0] }
}

const FADE_UP = {
    initial: { opacity: 0, y: -100 },
    animate: { opacity: [0, 1], y: [-100, 0] }
}

const FADE_DOWN = {
    initial: { opacity: 0, y: 100 },
    animate: { opacity: [0, 1], y: [100, 0] }
}

const FADE_IN = {
    initial: { opacity: 0 },
    animate: { opacity: [0, 1] }
}

const SCALE_IN = {
    initial: { opacity: 0, scale: 0.8 },
    animate: { opacity: [0, 1], scale: [0.8, 1] }
}

const SCALE_UP = {
    initial: { opacity: 0, scale: 1.2 },
    animate: { opacity: [0, 1], scale: [1.2, 1] }
}


function checkAnimation(slug){
    switch (slug) {
        case "fade-up":
            return FADE_UP;
        case "fade-in":
            return FADE_IN;
        case "scale-in":
            return SCALE_IN;
        case "scale-up":
            return SCALE_UP;
        case "fade-down":
            return FADE_DOWN;
        case "fade-left":
            return FADE_LEFT;
        case "fade-right":
            return FADE_RIGHT;
        default:
            return FADE_IN;
    }
}

export default attachAnimation;

