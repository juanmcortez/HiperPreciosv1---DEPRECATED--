(self["webpackChunk"] = self["webpackChunk"] || []).push([["/js/hiperprecios"],{

/***/ "./resources/js/bootstrap.js":
/*!***********************************!*\
  !*** ./resources/js/bootstrap.js ***!
  \***********************************/
/***/ (() => {

// window._ = require('lodash');

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */
// window.axios = require('axios');
// window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */
// import Echo from 'laravel-echo';
// window.Pusher = require('pusher-js');
// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     forceTLS: true
// });

/***/ }),

/***/ "./resources/js/hiperprecios.js":
/*!**************************************!*\
  !*** ./resources/js/hiperprecios.js ***!
  \**************************************/
/***/ ((__unused_webpack_module, __unused_webpack_exports, __webpack_require__) => {

__webpack_require__(/*! ./bootstrap */ "./resources/js/bootstrap.js");

__webpack_require__(/*! alpinejs */ "./node_modules/alpinejs/dist/module.esm.js");
/*require('apexcharts');

import ApexCharts from 'apexcharts';

var patientsevolution = new ApexCharts(document.querySelector("#patientsevolution"), patientsevolutionoptions);
var patientsgender = new ApexCharts(document.querySelector("#patientsgender"), patientsgenderoptions);
var patientsagegroups = new ApexCharts(document.querySelector("#patientsagegroups"), patientsagegroupsoptions);

patientsevolution.render();
patientsgender.render();
patientsagegroups.render();*/

/***/ }),

/***/ "./resources/sass/theme.scss":
/*!***********************************!*\
  !*** ./resources/sass/theme.scss ***!
  \***********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/sass/theme_print.scss":
/*!*****************************************!*\
  !*** ./resources/sass/theme_print.scss ***!
  \*****************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/css/hiperprecios.css":
/*!****************************************!*\
  !*** ./resources/css/hiperprecios.css ***!
  \****************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

},
/******/ __webpack_require__ => { // webpackRuntimeModules
/******/ var __webpack_exec__ = (moduleId) => (__webpack_require__(__webpack_require__.s = moduleId))
/******/ __webpack_require__.O(0, ["css/hiperprecios","css/theme_print","css/theme","/js/vendor"], () => (__webpack_exec__("./resources/js/hiperprecios.js"), __webpack_exec__("./resources/sass/theme.scss"), __webpack_exec__("./resources/sass/theme_print.scss"), __webpack_exec__("./resources/css/hiperprecios.css")));
/******/ var __webpack_exports__ = __webpack_require__.O();
/******/ }
]);