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
/******/ 	return __webpack_require__(__webpack_require__.s = 7);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/config.js":
/*!********************************!*\
  !*** ./resources/js/config.js ***!
  \********************************/
/*! no static exports found */
/***/ (function(module, exports) {

var content = document.querySelector("#content");

function addDivAlterProperties() {
  var title = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : '';
  var nameInput = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : '';
  var placeholder = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : '';
  var valueInitial = arguments.length > 3 && arguments[3] !== undefined ? arguments[3] : '';
  var idInput = arguments.length > 4 && arguments[4] !== undefined ? arguments[4] : '';
  var route = arguments.length > 5 && arguments[5] !== undefined ? arguments[5] : '';
  var html = "\n            <div class=\"alterProps\">\n                <form class=\"boxDefault flexColumn\" action=\"".concat(route, "\">\n                    <div class=\"flexRow headerTitleAndClose\">\n                        <h2>").concat(title, "</h2>\n                        <a onclick=\"removeDiv('.alterProps')\">\n                            <img class=\"imgClose\" src=\"{{ asset('images/icons/close.svg') }}\" alt=\"close\">\n                        </a>\n                    </div>\n                    <div class=\"flexRow\">\n                        <input\n                        class=\"inputText\"\n                        type=\"text\"\n                        name=\"").concat(nameInput, "\"\n                        id=\"").concat(idInput, "\"\n                        placeholder=\"").concat(placeholder, "\"\n                        value=\"").concat(valueInitial, "\"\n                        >\n                        <button class=\"buttonDefault buttonGreen\" type=\"submit\">\n                            Conclu\xEDdo\n                        </button>\n                    </div>\n                </form>\n            </div>\n            ");
  content.innerHTML += html;
}

function addDivAddOrAlterAddress() {
  var title = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : '';
  var route = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : '';
  var html = "\n        <div class=\"addOrAlterAddress\">\n            <form class=\"boxDefault flexColumn\" action=\"".concat(route, "\">\n                <div class=\"flexRow headerTitleAndClose\">\n                    <h2>").concat(title, "</h2>\n                    <a onclick=\"removeDiv('.addOrAlterAddress')\">\n                        <img class=\"imgClose\" src=\"{{ asset('images/icons/close.svg') }}\" alt=\"close\">\n                    </a>\n                </div>\n\n                <input\n                class=\"inputText\"\n                type=\"text\"\n                name=\"cep\"\n                placeholder=\"CEP\"\n                >\n\n                <div class=\"flexRow\">\n                    <input\n                    class=\"inputText\"\n                    type=\"text\"\n                    name=\"state\"\n                    placeholder=\"Estado\"\n                    >\n                    <input\n                    class=\"inputText\"\n                    type=\"text\"\n                    name=\"city\"\n                    placeholder=\"Cidade\"\n                    >\n                </div>\n\n                <div class=\"flexRow\">\n                    <input\n                    class=\"inputText\"\n                    type=\"text\"\n                    name=\"street\"\n                    placeholder=\"Rua\"\n                    >\n                    <input\n                    class=\"inputText\"\n                    type=\"text\"\n                    name=\"numberHome\"\n                    placeholder=\"N\xFAmero\"\n                    >\n                </div>\n\n                <div class=\"additionalData flexRow\">\n                    <div class=\"flexColumn\">\n                        <input\n                        class=\"inputText\"\n                        type=\"text\"\n                        name=\"additionalData\"\n                        placeholder=\"Dados adicionais (opcional)\"\n                        >\n                        <div class=\"homeOrWork flexColumn\">\n                            <p>Este \xE9 o seu trabalho ou sua casa?</p>\n                            <div class=\"flexRow\">\n                                <input\n                                type=\"radio\"\n                                id=\"work\"\n                                name=\"workOrHome\"\n                                >\n                                <label for=\"work\">\n                                    Trabalho\n                                </label>\n\n                                <input\n                                type=\"radio\"\n                                id=\"home\"\n                                name=\"workOrHome\"\n                                >\n                                <label for=\"home\">\n                                    Casa\n                                </label>\n                            </div>\n                        </div>\n                    </div>\n\n                    <div class=\"flexColumn\">\n                        <input\n                        class=\"inputText\"\n                        type=\"text\"\n                        name=\"phone\"\n                        placeholder=\"Telefone de contato\"\n                        >\n                        <p>\n                            A transportadora ligar\xE1 para este n\xFAmero, caso tenha algum problema com o envio.\n                        </p>\n                    </div>\n                </div>\n                <div class=\"buttonConcluded\">\n                    <button class=\"buttonDefault buttonGreen\" type=\"submit\">\n                        Conclu\xEDdo\n                    </button>\n                </div>\n            </form>\n        </div>\n    ");
  content.innerHTML += html;
}

function removeDiv(query) {
  document.querySelector(query).remove();
}

/***/ }),

/***/ 7:
/*!**************************************!*\
  !*** multi ./resources/js/config.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\Users\Eduardo\www\centralbras\laravel\resources\js\config.js */"./resources/js/config.js");


/***/ })

/******/ });