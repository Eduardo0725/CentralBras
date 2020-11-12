function inputHandlerMask(masks, max, event) {
	let c = event.target;
	let v = c.value.replace(/\D/g, '');
	let m = c.value.length > max ? 1 : 0;
	VMasker(c).unMask();
	VMasker(c).maskPattern(masks[m]);
    c.value = VMasker.toPattern(v, masks[m]);
}

function mask(queryPhone, queryCpf){
    var telMask = ['(99) 9999-9999', '(99) 99999-9999'];
    var tel = document.querySelector(queryPhone);
    VMasker(tel).maskPattern(telMask[0]);
    tel.addEventListener('input', inputHandlerMask.bind(undefined, telMask, 14), false);

    var docMask = ['999.999.999-999', '99.999.999/9999-99'];
    var doc = document.querySelector(queryCpf);
    VMasker(doc).maskPattern(docMask[0]);
    doc.addEventListener('input', inputHandlerMask.bind(undefined, docMask, 14), false);
}
