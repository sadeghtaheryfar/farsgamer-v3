//  sliders

var swiper2 = new Swiper(".mySwiper2", {
    slidesPerView: "auto",
    spaceBetween: 0,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
});

var swiper3 = new Swiper(".mySwiper3", {
    slidesPerView: "auto",
    spaceBetween: 20,
});



var swiper = new Swiper(".mySwiper", {
    loop: true,
    slidesPerView: "auto",
    spaceBetween: 20,
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