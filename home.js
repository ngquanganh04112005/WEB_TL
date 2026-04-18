/* Menu */
function toggleMenu() {
    const menu = document.getElementById("menu");
    const arrow = document.querySelector(".arrow");

    if (menu.style.display === "block") {
        menu.style.display = "none";
        arrow.classList.remove("rotate");
    } else {
        menu.style.display = "block";
        arrow.classList.add("rotate");
    }
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

