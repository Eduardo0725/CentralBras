/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 6);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./node_modules/vanilla-masker/build/vanilla-masker.min.js":
/*!*****************************************************************!*\
  !*** ./node_modules/vanilla-masker/build/vanilla-masker.min.js ***!
  \*****************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var __WEBPACK_AMD_DEFINE_FACTORY__, __WEBPACK_AMD_DEFINE_RESULT__;!function(a,b){ true?!(__WEBPACK_AMD_DEFINE_FACTORY__ = (b),
				__WEBPACK_AMD_DEFINE_RESULT__ = (typeof __WEBPACK_AMD_DEFINE_FACTORY__ === 'function' ?
				(__WEBPACK_AMD_DEFINE_FACTORY__.call(exports, __webpack_require__, exports, module)) :
				__WEBPACK_AMD_DEFINE_FACTORY__),
				__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__)):undefined}(this,function(){var a=[9,16,17,18,36,37,38,39,40,91,92,93],b=function(b){for(var c=0,d=a.length;c<d;c++)if(b==a[c])return!1;return!0},c=function(a){return a=a||{},a={delimiter:a.delimiter||".",lastOutput:a.lastOutput,precision:a.hasOwnProperty("precision")?a.precision:2,separator:a.separator||",",showSignal:a.showSignal,suffixUnit:a.suffixUnit&&" "+a.suffixUnit.replace(/[\s]/g,"")||"",unit:a.unit&&a.unit.replace(/[\s]/g,"")+" "||"",zeroCents:a.zeroCents},a.moneyPrecision=a.zeroCents?0:a.precision,a},d=function(a,b,c){for(;b<a.length;b++)"9"!==a[b]&&"A"!==a[b]&&"S"!==a[b]||(a[b]=c);return a},e=function(a){this.elements=a};e.prototype.unbindElementToMask=function(){for(var a=0,b=this.elements.length;a<b;a++)this.elements[a].lastOutput="",this.elements[a].onkeyup=!1,this.elements[a].onkeydown=!1,this.elements[a].value.length&&(this.elements[a].value=this.elements[a].value.replace(/\D/g,""))},e.prototype.bindElementToMask=function(a){for(var c=this,d=function(d){d=d||window.event;var e=d.target||d.srcElement;b(d.keyCode)&&setTimeout(function(){c.opts.lastOutput=e.lastOutput,e.value=f[a](e.value,c.opts),e.lastOutput=e.value,e.setSelectionRange&&c.opts.suffixUnit&&e.setSelectionRange(e.value.length,e.value.length-c.opts.suffixUnit.length)},0)},e=0,g=this.elements.length;e<g;e++)this.elements[e].lastOutput="",this.elements[e].onkeyup=d,this.elements[e].value.length&&(this.elements[e].value=f[a](this.elements[e].value,this.opts))},e.prototype.maskMoney=function(a){this.opts=c(a),this.bindElementToMask("toMoney")},e.prototype.maskNumber=function(){this.opts={},this.bindElementToMask("toNumber")},e.prototype.maskAlphaNum=function(){this.opts={},this.bindElementToMask("toAlphaNumeric")},e.prototype.maskPattern=function(a){this.opts={pattern:a},this.bindElementToMask("toPattern")},e.prototype.unMask=function(){this.unbindElementToMask()};var f=function(a){if(!a)throw new Error("VanillaMasker: There is no element to bind.");var b="length"in a?a.length?a:[]:[a];return new e(b)};return f.toMoney=function(a,b){if(b=c(b),b.zeroCents){b.lastOutput=b.lastOutput||"";var d="("+b.separator+"[0]{0,"+b.precision+"})",e=new RegExp(d,"g"),f=a.toString().replace(/[\D]/g,"").length||0,g=b.lastOutput.toString().replace(/[\D]/g,"").length||0;a=a.toString().replace(e,""),f<g&&(a=a.slice(0,a.length-1))}var h=a.toString().replace(/[\D]/g,""),i=new RegExp("^(0|\\"+b.delimiter+")"),j=new RegExp("(\\"+b.separator+")$"),k=h.substr(0,h.length-b.moneyPrecision),l=k.substr(0,k.length%3),m=new Array(b.precision+1).join("0");k=k.substr(k.length%3,k.length);for(var n=0,o=k.length;n<o;n++)n%3==0&&(l+=b.delimiter),l+=k[n];l=l.replace(i,""),l=l.length?l:"0";var p="";if(!0===b.showSignal&&(p=a<0||a.startsWith&&a.startsWith("-")?"-":""),!b.zeroCents){var q=h.length-b.precision,r=h.substr(q,b.precision),s=r.length;m=(m+r).slice(-(b.precision>s?b.precision:s))}return(b.unit+p+l+b.separator+m).replace(j,"")+b.suffixUnit},f.toPattern=function(a,b){var c,e="object"==typeof b?b.pattern:b,f=e.replace(/\W/g,""),g=e.split(""),h=a.toString().replace(/\W/g,""),i=h.replace(/\W/g,""),j=0,k=g.length,l="object"==typeof b?b.placeholder:void 0;for(c=0;c<k;c++){if(j>=h.length){if(f.length==i.length)return g.join("");if(void 0!==l&&f.length>i.length)return d(g,c,l).join("");break}if("9"===g[c]&&h[j].match(/[0-9]/)||"A"===g[c]&&h[j].match(/[a-zA-Z]/)||"S"===g[c]&&h[j].match(/[0-9a-zA-Z]/))g[c]=h[j++];else if("9"===g[c]||"A"===g[c]||"S"===g[c])return void 0!==l?d(g,c,l).join(""):g.slice(0,c).join("")}return g.join("").substr(0,c)},f.toNumber=function(a){return a.toString().replace(/(?!^-)[^0-9]/g,"")},f.toAlphaNumeric=function(a){return a.toString().replace(/[^a-z0-9 ]+/i,"")},f});

/***/ }),

/***/ "./resources/js/mask.js":
/*!******************************!*\
  !*** ./resources/js/mask.js ***!
  \******************************/
/*! no static exports found */
/***/ (function(module, exports) {

function inputHandlerMask(masks, max, event) {
  var c = event.target;
  var v = c.value.replace(/\D/g, '');
  var m = c.value.length > max ? 1 : 0;
  VMasker(c).unMask();
  VMasker(c).maskPattern(masks[m]);
  c.value = VMasker.toPattern(v, masks[m]);
}

function mask(queryPhone, queryCpf) {
  var telMask = ['(99) 9999-9999', '(99) 99999-9999'];
  var tel = document.querySelector(queryPhone);
  VMasker(tel).maskPattern(telMask[0]);
  tel.addEventListener('input', inputHandlerMask.bind(undefined, telMask, 14), false);
  var docMask = ['999.999.999-999', '99.999.999/9999-99'];
  var doc = document.querySelector(queryCpf);
  VMasker(doc).maskPattern(docMask[0]);
  doc.addEventListener('input', inputHandlerMask.bind(undefined, docMask, 14), false);
}

/***/ }),

/***/ "./resources/js/register.js":
/*!**********************************!*\
  !*** ./resources/js/register.js ***!
  \**********************************/
/*! no static exports found */
/***/ (function(module, exports) {

var password = document.querySelector('input.password');
var repeatPassword = document.querySelector('input.repeatPassword');
var passwordMessage = document.querySelector('p.passwordMessage');
var phone = document.querySelector("input[name='phone']");
var cpf = document.querySelector("input[name='cpf']");
document.querySelectorAll('.box input').forEach(function (input) {
  input.addEventListener('change', function (event) {
    return event.target.classList.forEach(function (inputClass) {
      if (inputClass === 'inputError') {
        input.classList.remove(inputClass);
      }
    });
  });
});

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
};

mask("input[name='phone']", "input[name='cpf']");

/***/ }),

/***/ 6:
/*!*************************************************************************************************************************!*\
  !*** multi ./node_modules/vanilla-masker/build/vanilla-masker.min.js ./resources/js/mask.js ./resources/js/register.js ***!
  \*************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! C:\Users\Eduardo\www\centralbras\laravel\node_modules\vanilla-masker\build\vanilla-masker.min.js */"./node_modules/vanilla-masker/build/vanilla-masker.min.js");
__webpack_require__(/*! C:\Users\Eduardo\www\centralbras\laravel\resources\js\mask.js */"./resources/js/mask.js");
module.exports = __webpack_require__(/*! C:\Users\Eduardo\www\centralbras\laravel\resources\js\register.js */"./resources/js/register.js");


/***/ })

/******/ });