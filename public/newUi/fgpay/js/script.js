var swiper = new Swiper(".mySwiper7", {
        loop: true,
        spaceBetween: 50,
        centeredSlides: true,
        Mousewheel: false,
        slidesPerView: "auto",
        direction: "vertical",
        speed: 2500,
        effect: null,
        loopedSlides : 20,
        autoplay: {
            stopOnLastSlide: false,
            waitForTransition: false,
            delay: 0,
            disableOnInteraction: false,
            stopOnSlide: false,
            autoplayDisableOnInteraction: false,
        },
});


var swiper = new Swiper(".mySwiper2", {
    loop: true,
    slidesPerView: "auto",
    spaceBetween: 20,
    grabCursor: true,
    centeredSlides: true,
    autoplay: {
        delay: 8000,
        disableOnInteraction: false,
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});



//  chenge show acardeon


var acc0 = document.getElementById("accordion1");
var icoop0 = document.getElementById("iconacaopen1");

var acc2 = document.getElementById("accordion2");
var icoop2 = document.getElementById("iconacaopen2");

var acc3 = document.getElementById("accordion3");
var icoop3 = document.getElementById("iconacaopen3");

    acc0.addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
        panel.style.display = "none";
        icoop0.classList.remove("rotate");
    } else {
        panel.style.display = "block";
        icoop0.classList.add("rotate");
    }
    });

    acc2.addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
        panel.style.display = "none";
        icoop2.classList.remove("rotate");
    } else {
        panel.style.display = "block";
        icoop2.classList.add("rotate");
    }
    });

    acc3.addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
        panel.style.display = "none";
        icoop3.classList.remove("rotate");
    } else {
        panel.style.display = "block";
        icoop3.classList.add("rotate");
    }
    });