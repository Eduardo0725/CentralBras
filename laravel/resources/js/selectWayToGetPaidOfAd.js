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

    fetch('/waysToGetPaid/check/pagseguro', {
        headers: {
            Accept: 'application/json'
        }
    })
        .then(res => res.json())
        .then(res => res.pagseguro == true ? pagseguro.input.checked = true : pagseguro.data.style.display = 'flex')
        .catch(err => {
            console.log(err)
            alert('Erro na requisição, tente novamente mais tarde.')
        });

    loading = false;
});

document.getElementById('createPagseguro').onsubmit = function(event) {
    event.preventDefault();

    if (loading)
        return;

    loading = true;

    const { email, token } = pagseguro;

    if (!email.value || !token.value)
        return alert('Preencha todos os campos.');

    fetch('/waysToGetPaid', {
        method: 'POST',
        headers: {
            Accept: "application/json"
        },
        body: new FormData(this)
    })
        .then(({ status }) => {
            if (status === 200 || status === 201) {
                pagseguro.input.checked = true;
                return pagseguro.data.style.display = 'none';
            }
            throw new Error(status);
        })
        .catch(err => {
            console.error(err);
            alert("Erro na requisição, verifique a sua conexão com a internet ou tente novamente mais tarde.");
        });

    loading = false;
};
