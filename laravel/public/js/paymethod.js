function pattern(query, reSet, reClass = '', uppercase = false, maxLenght = -1) {
    document.querySelector(query).onkeypress = function (e) {
        let key = e.key;
        if (key.search(new RegExp(reSet, reClass)) == -1)
            return false;

    }
}

pattern('.paymethod1 div input[name=numberOfCard]', '[0-9]');
pattern('.paymethod1 div input[name=holderNameOfCard]', '[a-z ]', 'i');
pattern('.paymethod1 div input[name=monthOfValidity]', '[0-9]');
pattern('.paymethod1 div input[name=yearOfValidity]', '[0-9]');
pattern('.paymethod1 div input[name=cvv]', '[0-9]');
pattern('.paymethod1 div input[name=cardHoldersCPF]', '[0-9]');
pattern('.paymethod1 div input[name=cep]', '[0-9]');
pattern('.paymethod1 div input[name=state]', '[^0-9!@#$%¨&*)(<>?;:/\\|\'\"{}´`~.,^]', 'i');
pattern('.paymethod1 div input[name=city]', '[^0-9!@#$%¨&*)(<>?;:/\\|\'\"{}´`~.,^]', 'i');
pattern('.paymethod1 div input[name=neighborhood]', '[^0-9!@#$%¨&*)(<>?;:/\\|\'\"{}´`~.,^]', 'i');
pattern('.paymethod1 div input[name=street]', '[a-z0-9]', 'i');
pattern('.paymethod1 div input[name=number]', '[a-z0-9]', 'i');
pattern('.paymethod1 div input[name=complement]', '[^0-9!@#$%¨&*)(<>?;:/\\|\'\"{}´`~.,^]', 'i');

document.querySelector('.paymethod1 div input[name=dateOfBirth]').addEventListener('change', function (e) {
    let doc = document.querySelector('.paymethod1 div input[name=dateOfBirth]');

    if (doc.getAttribute('empty'))
        doc.setAttribute('empty', 'false');
});
