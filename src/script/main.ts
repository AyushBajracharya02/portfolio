import "iconify-icon";
import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
import { ScrollSmoother } from "gsap/ScrollSmoother";

// const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);
Element.prototype.$ = Element.prototype.querySelector;
Element.prototype.$$ = Element.prototype.querySelectorAll;

gsap.registerPlugin(ScrollTrigger, ScrollSmoother);

let smoother = ScrollSmoother.create({
    wrapper: "#smooth-wrapper",
    content: "#smooth-content",
    smooth: 1.5,
});

ScrollTrigger.create({
    trigger: "#aside",
    endTrigger: "#smooth-content",
    start: "top top",
    end: "bottom bottom",
    pin: true,
})

$$(".header-link").forEach((link) => {
    link.addEventListener("click", function (e) {
        e.preventDefault();
        const target = link.getAttribute("href");
        smoother.scrollTo(target, true, "top top");
    })
})