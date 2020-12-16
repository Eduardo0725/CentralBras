const content = document.querySelector("#content");

function addDivAlterProperties(route = '', method = 'POST', csrf = null, title = '', name = '', placeholder = '', valueInitial = '', id = '') {
    let alterProps = createElement('div', { class: 'alterProps' });

    let formMethod = method === 'GET' ? 'GET' : 'POST';

    let form = createElement('form', {
        class: 'boxDefault',
        action: route,
        method: formMethod
    });

    let methodInput = createElement('input', {
        type: 'hidden',
        name: '_method',
        value: method
    });

    let csrfInput = csrf && createElement('input', {
        type: 'hidden',
        name: '_token',
        value: csrf
    });

    let headerTitleAndClose = createElement('div', { class: 'headerTitleAndClose' });
    let h2 = createElement('h2', {}, title);
    let a = createElement('a', { onclick: "removeDiv('.alterProps')" });

    let img = createElement('img', {
        class: 'imgClose',
        src: '/images/icons/close.svg',
        alt: 'close'
    });

    let div = createElement('div');

    let input = createElement('input', {
        class: 'inputText',
        type: 'text',
        name,
        id,
        placeholder,
        value: valueInitial
    });

    let button = createElement('button', {
        class: 'buttonDefault buttonGreen',
        type: 'submit'
    }, 'Concluído');

    a.appendChild(img);

    headerTitleAndClose.appendChild(h2);
    headerTitleAndClose.appendChild(a);

    div.appendChild(input);
    div.appendChild(button);

    if (csrf)
        form.appendChild(csrfInput);

    form.appendChild(methodInput);
    form.appendChild(headerTitleAndClose);
    form.appendChild(div);

    alterProps.appendChild(form);

    content.appendChild(alterProps);
}

function removeDiv(query) {
    document.querySelector(query).remove();
}

document.getElementById('emailAndPasswordForm').onsubmit = function (event) {
    event.preventDefault();

    let email = document.querySelector('.configEmail');
    let password = document.querySelector('.configPassword');
    let passwordRepeat = document.querySelector('.configPasswordRepeat');

    if (password.value === passwordRepeat.value) {
        return this.submit();
    }

    password.classList.add('inputError');
    passwordRepeat.classList.add('inputError');
}

var formPhoto = document.getElementById('formPhoto');

document.getElementById('inputPhoto').addEventListener('change', event => event.target.files.length !== 0 && formPhoto.submit());
