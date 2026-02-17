import "./events";
import AOS from "aos";
import "./slider";

AOS.init({
    duration: 800,
    easing: "ease-out-cubic",
    once: true,
    offset: 120,
});

const scrollTopBtn = document.getElementById("scrollToTop");

window.addEventListener("scroll", () => {
    scrollTopBtn.classList.toggle("hidden", window.scrollY === 0);
});

scrollTopBtn.addEventListener("click", () => {
    window.scrollTo({ top: 0, behavior: "smooth" });
});
