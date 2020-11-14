const button = document.querySelector('.addOrAlterAddress .buttonConcluded button');

var loading = false;

button.addEventListener('click', (e) => {

    if (loading == true)
        return;

    loading = true;

    const elements = {
        cep: document.querySelector(".addOrAlterAddress .cep").value,
        state: document.querySelector(".addOrAlterAddress .state").value,
        city: document.querySelector(".addOrAlterAddress .city").value,
        street: document.querySelector(".addOrAlterAddress .street").value,
        numberHome: document.querySelector(".addOrAlterAddress .numberHome").value,
        additionalData: document.querySelector(".addOrAlterAddress .additionalData").value ?? ' ',
        workOrHome: document.querySelector(".addOrAlterAddress input[name='workOrHome']:checked").id,
        phone: document.querySelector(".addOrAlterAddress .phone").value
    }

    for (element in elements) {
        if (!elements[element])
            return alert('Preencha todos os campos obrigatórios');
    }

    fetch(`${URIApi}/address`, {
        method: 'POST',
        headers: new Headers({
            "Content-Type": "application/json"
        }),
        body: JSON.stringify(elements)
    })
        .then(({ status }) => {
            if (status === 201 || status === 200)
                return window.location.reload();
            throw new Error(status);
        })
        .catch(err => {
            console.error(err);
            alert('Erro na requisição, verifique a sua conexão com a internet ou tente novamente mais tarde.')
        });

    loading = false;
});
