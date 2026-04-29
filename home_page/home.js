function toggleMenu() {
    const menu = document.getElementById("menu");
    const arrow = document.querySelector(".arrow");
    
    menu.classList.toggle("active");
    arrow.classList.toggle("rotate");
}


var swiper = new Swiper(".mySwiper", {
    loop: true,
    autoplay: {
        delay: 4000,
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
    // Hiệu ứng chuyển cảnh mượt (tùy chọn)
    effect: 'fade',
    fadeEffect: {
        crossFade: true
    },
});

