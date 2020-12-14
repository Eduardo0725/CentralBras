const content = document.querySelector("#content");

function addDivAlterProperties(route = '', method = 'POST', title = '', name = '', placeholder = '', valueInitial = '', id = '') {
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

    form.appendChild(methodInput);
    form.appendChild(headerTitleAndClose);
    form.appendChild(div);

    alterProps.appendChild(form);

    content.appendChild(alterProps);
}

function removeDiv(query) {
    document.querySelector(query).remove();
}
