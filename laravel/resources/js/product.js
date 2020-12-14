var favorite = document.querySelector('.heartDisabled');

if (!favorite)
    favorite = document.querySelector('.heartEnabled');

document.querySelector('#mainImg .favoriteAndShare').addEventListener('click', function (event) {
    let classHeart = event.target.getAttribute('class');

    let idProduct = document.querySelector('#idProduct').value;

    if (classHeart == 'productIcon heartDisabled')
        axios.post('/favorite/' + idProduct)
            .then(({ status }) => status === 201 && favorite.setAttribute('class', 'productIcon heartEnabled'))
            .catch(console.error);

    if (classHeart == 'productIcon heartEnabled')
        axios.delete('/favorite/' + idProduct)
            .then(({ status }) => status === 200 && favorite.setAttribute('class', 'productIcon heartDisabled'))
            .catch(console.error);
});
