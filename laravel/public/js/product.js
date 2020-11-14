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

document.querySelectorAll('.boxOfNumbers').forEach(boxOfNumbers => {
    let childrens = boxOfNumbers.children[1].children;

    childrens[0].addEventListener('click', () => {
        let input = childrens[1].value;
        if (input > 1)
        childrens[1].value = parseInt(input) - 1;
    });

    childrens[2].addEventListener('click', () => {
        let input = childrens[1].value;
        childrens[1].value = parseInt(input) + 1;
    });
});

for (let index = 0; index <= 1; index++) {
    let side = (index == 0) ? 'left' : 'right';
    document.querySelectorAll('label.' + side).forEach(label => 
        label.addEventListener('click', e => {
            let doc = document.querySelector('div.carousel#' + e.path[2].id + ' span.contents');
            let num = (parseInt(doc.getAttribute('number')) + ((side == 'left') ? 240 : -240));

            doc.style = 'left:' + num + 'px;';

            doc.removeAttribute('number');
            doc.setAttribute('number', num);

            document.querySelector('label.left.' + e.path[2].id).style = (num == 0) ? '' : 'display: block;';
            document.querySelector('label.right.' + e.path[2].id).style = (num > -2880) ? '' : 'display: none;';
        })
    );
}
