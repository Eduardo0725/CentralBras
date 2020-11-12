const pagseguro = {
    data: document.querySelector('#pagseguroData'),
    input: document.querySelector('#pagseguro'),
    button: document.querySelector('#buttonPagSeguro'),
    div: document.querySelector('.pagseguro'),
    email: document.querySelector('#pagseguroData .email'),
    token: document.querySelector('#pagseguroData .token'),
}

var loading = false;

pagseguro.div.addEventListener('click', () => {
    if (loading || pagseguro.input.checked)
        return;

    loading = true;

    fetch(`${URIApi}/waysToGetPaid`)
        .then(res => res.json())
        .then(res => res.waysToGetPaid.PagSeguro == true ? pagseguro.input.checked = true : pagseguro.data
            .style.display = 'flex');

    loading = false;
});

pagseguro.button.addEventListener('click', () => {
    if (loading)
        return;

    loading = true;

    const {
        email,
        token
    } = pagseguro;

    if (!email.value || !token.value)
        return alert('Preencha todos os campos.');

    fetch(`${URIApi}/waysToGetPaid`, {
        method: 'POST',
        headers: new Headers({
            "Content-Type": "application/json"
        }),
        body: JSON.stringify({
            email: email.value,
            token: token.value
        })
    })
        .then(({
            status
        }) => {
            if (status === 200 || status === 201) {
                pagseguro.input.checked = true;
                return pagseguro.data.style.display = 'none';
            }
            throw new Error(status);
        })
        .catch(err => {
            console.error(err);
            alert(
                "Erro na requisição, verifique a sua conexão com a internet ou tente novamente mais tarde."
            );
        })

    loading = false;
});
