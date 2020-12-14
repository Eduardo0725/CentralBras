document.querySelectorAll('.carousel').forEach(function (carousel) {
    carousel.addEventListener('click', function (event) {
        let carouselCards = this.children[1].children[1];
        let offsetWidth = carouselCards.offsetWidth - 100;
        let carouselControllers = this.children[0];
        let side = event.target.dataset.carousel_side;

        let sides = {
            left: - offsetWidth,
            right: offsetWidth
        }

        if (!side || !sides[side]) return;

        let result = carouselCards.scrollLeft += sides[side];

        if (result < 0)
            carouselCards.scrollLeft = 0;

        if (result < 240) {
            carouselControllers.children[0].style = 'visibility:hidden;';
        } else if (result > carouselCards.scrollWidth - offsetWidth) {
            carouselControllers.children[1].style = 'visibility:hidden;';
        } else {
            carouselControllers.children[0].style = null;
            carouselControllers.children[1].style = null;
        }
    })
});
