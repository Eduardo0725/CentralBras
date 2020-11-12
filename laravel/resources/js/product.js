document.querySelector('#carouselImgs label').click();

document.querySelectorAll('#box>input').forEach(input => input.addEventListener('change', e => {
    let img = document.querySelector('#carouselImgs label:nth-child(' + (parseInt(e.target.value) + 1) + ') img').src;
    document.querySelector('#imgFirst').src = img;
}));

document.querySelector('#mainImg>div>div>div>label:last-of-type').addEventListener('click', e => {
    let classHeart = e.target.getAttribute('class');
    e.target.removeAttribute('class');

    if (classHeart == 'heartEnabled')
        e.target.setAttribute('class', 'heartDisabled');

    if (classHeart == 'heartDisabled')
        e.target.setAttribute('class', 'heartEnabled');
});
