import "iconify-icon";
import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
import { ScrollSmoother } from "gsap/ScrollSmoother";

const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);
Element.prototype.$ = Element.prototype.querySelector;
Element.prototype.$$ = Element.prototype.querySelectorAll;
EventTarget.prototype.on = EventTarget.prototype.addEventListener;
EventTarget.prototype.off = EventTarget.prototype.removeEventListener;

gsap.registerPlugin(ScrollTrigger, ScrollSmoother);

let smoother = ScrollSmoother.create({
    wrapper: "#smooth-wrapper",
    content: "#smooth-content",
    smooth: 1.5,
});

const minWidth1280px = window.matchMedia("(width >= 1280px)");

if (minWidth1280px.matches) {
    ScrollTrigger.create({
        trigger: "#aside",
        endTrigger: "#smooth-content",
        start: "top top",
        end: "bottom bottom",
        pin: true,
    });
}

// window.on("resize", function () { 

// })


$$(".header-link").forEach((link) => {
    link.addEventListener("click", function (e) {
        e.preventDefault();
        const target = link.getAttribute("href");
        smoother.scrollTo(target, true, "top top");
    })
})

const mobileMenu = $("#mobile-menu") as HTMLDialogElement;

$("#mobile-menu-btn")?.on("click", function () {
    mobileMenu.showModal();
});

mobileMenu.on("click", function () {
    mobileMenu.classList.add("closing");
    setTimeout(() => {
        mobileMenu.classList.remove("closing");
        mobileMenu.close();
    }, 500);
});

mobileMenu.firstElementChild?.on("click", function (e) {
    e.stopPropagation();
});

mobileMenu.$("#mobile-menu-close-btn")?.on("click",function(){
    mobileMenu.click();
});