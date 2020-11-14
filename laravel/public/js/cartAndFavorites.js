document.querySelectorAll('.boxOfNumbers').forEach(boxOfNumbers => {
    let childrens = boxOfNumbers.children[1].children;

    childrens[0].addEventListener('click', () => {
        let input = childrens[1].value;
        if (input > 1)
        childrens[1].value = parseInt(input) - 1;
    });

    childrens[2].addEventListener('click', () => {
        let input = childrens[1].value;
        childrens[1].value = parseInt(input) + 1;
    });
});
