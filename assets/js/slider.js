document.addEventListener('DOMContentLoaded', function () {

    const slides = document.querySelectorAll('.hero-slide');

    const nextBtn = document.querySelector('.hero-next');

    const prevBtn = document.querySelector('.hero-prev');

    if (!slides.length) {
        return;
    }

    let current = 0;

    let autoplay;

    function showSlide(index) {

        slides.forEach(function (slide) {

            slide.classList.remove('active');

        });

        current = index;

        if (current >= slides.length) {
            current = 0;
        }

        if (current < 0) {
            current = slides.length - 1;
        }

        slides[current].classList.add('active');

    }

    function nextSlide() {

        showSlide(current + 1);

    }

    function prevSlide() {

        showSlide(current - 1);

    }

    function startAutoplay() {

        clearInterval(autoplay);

        autoplay = setInterval(function () {

            nextSlide();

        }, 5000);

    }

    if (nextBtn) {

        nextBtn.addEventListener('click', function () {

            nextSlide();

            startAutoplay();

        });

    }

    if (prevBtn) {

        prevBtn.addEventListener('click', function () {

            prevSlide();

            startAutoplay();

        });

    }

    showSlide(0);

    startAutoplay();

});