for (let index = 0; index <= 1; index++) {
    let side = (index == 0) ? 'left' : 'right';
    document.querySelectorAll('label.' + side).forEach(label => {
        let result = label.addEventListener('click', e => {
            let doc = document.querySelector('div.carousel#' + e.path[2].id + ' span.contents');
            let num = (parseInt(doc.getAttribute('number')) + ((side == 'left') ? 240 : -240));

            doc.style = 'left:' + num + 'px;';

            doc.removeAttribute('number');
            doc.setAttribute('number', num);

            console.log(doc.getAttribute('number'));
            console.log('teste: ' + e.path[2].id);

            document.querySelector('label.left.' + e.path[2].id).style = (num == 0) ? '' : 'display: block;';
            document.querySelector('label.right.' + e.path[2].id).style = (num > -2880) ? '' : 'display: none;';
        })
    });
}
