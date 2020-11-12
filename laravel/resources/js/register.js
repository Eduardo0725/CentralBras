const password = document.querySelector('input.password');
const repeatPassword = document.querySelector('input.repeatPassword');
const passwordMessage = document.querySelector('p.passwordMessage');
const phone = document.querySelector("input[name='phone']");
const cpf = document.querySelector("input[name='cpf']");

document.querySelectorAll('.box input').forEach(input => {
    input.addEventListener('change', event => event.target.classList.forEach(inputClass => {
        if (inputClass === 'inputError') {
            input.classList.remove(inputClass);
        }
    }));
})

document.getElementById('formRegister').onsubmit = function (event) {
    event.preventDefault();

    if (password.value !== repeatPassword.value || password.value === '') {
        if (password.value === '' || repeatPassword.value === '') {
            passwordMessage.textContent = 'Senha não preenchida';
        } else {
            passwordMessage.textContent = 'As senhas não são iguais';
        }

        password.classList.add('inputError');
        repeatPassword.classList.add('inputError');
        return;
    }

    VMasker(cpf).unMask();
    VMasker(phone).unMask();

    return event.target.submit();
}

mask("input[name='phone']", "input[name='cpf']");
