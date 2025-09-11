import { inView, animate } from "motion";
import attachAnimation from "./animation";


let elements = [];





const selector =  document.querySelectorAll('[data-motion]');
if(selector.length > 0){
    inView(selector, (element) => {

        return attachAnimation(element);

        // let animation = checkAnimation(el.getAttribute("data-motion"));

        // console.log(animation);


        // // initial state
        // animate(el, animation.initial);

        // animate(el, animation.animate);

        // return () => animate(el, animation.exit, {
        //     delay: parseFloat(config.delay),
        //     duration: parseFloat(config.duration)
        // });
    });
}

