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


/* Thanh trượt */
let currentIndex = 0;
function moveSlide(direction) {
    const track = document.getElementById('track');
    const groups = document.querySelectorAll('.featured-group');
    
    currentIndex += direction;
    
    if (currentIndex < 0) currentIndex = groups.length - 1;
    if (currentIndex >= groups.length) currentIndex = 0;
    
    track.style.transform = `translateX(-${currentIndex * 900}px)`;
}

