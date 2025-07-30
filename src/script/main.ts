import "iconify-icon";
import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
import { ScrollSmoother } from "gsap/ScrollSmoother";
import { $, $$ } from "./helpers/DOM-helpers";

gsap.registerPlugin(ScrollTrigger, ScrollSmoother);

let smoother = ScrollSmoother.create({
    wrapper: "#smooth-wrapper",
    content: "#smooth-content",
    smooth: 1.5,
});

const minWidth1280px = window.matchMedia("(width >= 1280px)");

let asideScrollTrigger = ScrollTrigger.create({
    trigger: "#aside",
    endTrigger: "#smooth-content",
    start: "top top",
    end: "bottom bottom",
    pin: true,
});

if (minWidth1280px.matches) {
    asideScrollTrigger.enable();
} else {
    asideScrollTrigger.disable();
}

minWidth1280px.on("change", () => {
    if (minWidth1280px.matches) {
        asideScrollTrigger.enable();
    } else {
        asideScrollTrigger.disable();
    }
});

$$(".scroll-link").forEach((link) => {
    link.addEventListener("click", function (e) {
        e.preventDefault();
        const target = link.getAttribute("href");
        ScrollTrigger.getAll().forEach(t => t.disable());
        smoother.scrollTo(target, true, "top top");
        setTimeout(() => {
            ScrollTrigger.getAll().forEach(t => t.enable());
        }, 1000);
    });
});

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

mobileMenu.$("#mobile-menu-close-btn")?.on("click", function () {
    mobileMenu.click();
});

const headerLinkList = $(".header-link-list") as HTMLUListElement;

if (headerLinkList) {
    const headerLinks = headerLinkList.$$(".header-link") as NodeListOf<HTMLAnchorElement>;
    function setActiveHeaderLink(link: HTMLAnchorElement) {
        headerLinkList.style.setProperty("--top", `${link.offsetTop}px`);
        headerLinks.forEach((l) => l.classList.remove("active"));
        link.classList.add("active");
    }
    headerLinks.forEach((link) => {
        link.on("click", function () {
            setActiveHeaderLink(link);
        });
        if (minWidth1280px.matches) {
            const href = link.getAttribute("href");
            ScrollTrigger.create({
                trigger: href,
                start: "top top",
                onEnter: () => {
                    setActiveHeaderLink(link);
                },
                onEnterBack: () => {
                    setActiveHeaderLink(link);
                }
            });
        }
    });
}
