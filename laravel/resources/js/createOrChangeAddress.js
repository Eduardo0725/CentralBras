const button = document.querySelector('#saveAddressForm .buttonConcluded button');

var loading = false;

document.getElementById('saveAddressForm').onsubmit = function (event) {
    event.preventDefault();

    if (loading == true)
        return;

    loading = true;

    const elements = {
        cep: document.querySelector("#saveAddressForm .cep").value,
        state: document.querySelector("#saveAddressForm .state").value,
        city: document.querySelector("#saveAddressForm .city").value,
        street: document.querySelector("#saveAddressForm .street").value,
        numberHome: document.querySelector("#saveAddressForm .numberHome").value,
        additionalData: document.querySelector("#saveAddressForm .additionalData").value ?? ' ',
        phone: document.querySelector("#saveAddressForm .phone").value
    }

    for (element in elements) {
        if (!elements[element])
            return alert('Preencha todos os campos obrigatórios');
    }

    fetch('/address', {
        method: 'POST',
        body: new FormData(this)
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
}
