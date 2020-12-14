var loading = false;

function createElement(tag, attributesObject = {}, value = null) {
    const element = document.createElement(tag);

    for (attribute in attributesObject)
        element.setAttribute(attribute, attributesObject[attribute]);

    if(value)
        element.innerText = value;

    return element;
}
