/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/admin/searchUsers.js":
/*!*******************************************!*\
  !*** ./resources/js/admin/searchUsers.js ***!
  \*******************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "addSearchUsersFunctionality": () => (/* binding */ addSearchUsersFunctionality)
/* harmony export */ });
/* harmony import */ var _app_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../app.js */ "./resources/js/app.js");
function _typeof(obj) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, _typeof(obj); }
function _createForOfIteratorHelper(o, allowArrayLike) { var it = typeof Symbol !== "undefined" && o[Symbol.iterator] || o["@@iterator"]; if (!it) { if (Array.isArray(o) || (it = _unsupportedIterableToArray(o)) || allowArrayLike && o && typeof o.length === "number") { if (it) o = it; var i = 0; var F = function F() {}; return { s: F, n: function n() { if (i >= o.length) return { done: true }; return { done: false, value: o[i++] }; }, e: function e(_e) { throw _e; }, f: F }; } throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); } var normalCompletion = true, didErr = false, err; return { s: function s() { it = it.call(o); }, n: function n() { var step = it.next(); normalCompletion = step.done; return step; }, e: function e(_e2) { didErr = true; err = _e2; }, f: function f() { try { if (!normalCompletion && it["return"] != null) it["return"](); } finally { if (didErr) throw err; } } }; }
function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }
function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }
function _regeneratorRuntime() { "use strict"; /*! regenerator-runtime -- Copyright (c) 2014-present, Facebook, Inc. -- license (MIT): https://github.com/facebook/regenerator/blob/main/LICENSE */ _regeneratorRuntime = function _regeneratorRuntime() { return exports; }; var exports = {}, Op = Object.prototype, hasOwn = Op.hasOwnProperty, defineProperty = Object.defineProperty || function (obj, key, desc) { obj[key] = desc.value; }, $Symbol = "function" == typeof Symbol ? Symbol : {}, iteratorSymbol = $Symbol.iterator || "@@iterator", asyncIteratorSymbol = $Symbol.asyncIterator || "@@asyncIterator", toStringTagSymbol = $Symbol.toStringTag || "@@toStringTag"; function define(obj, key, value) { return Object.defineProperty(obj, key, { value: value, enumerable: !0, configurable: !0, writable: !0 }), obj[key]; } try { define({}, ""); } catch (err) { define = function define(obj, key, value) { return obj[key] = value; }; } function wrap(innerFn, outerFn, self, tryLocsList) { var protoGenerator = outerFn && outerFn.prototype instanceof Generator ? outerFn : Generator, generator = Object.create(protoGenerator.prototype), context = new Context(tryLocsList || []); return defineProperty(generator, "_invoke", { value: makeInvokeMethod(innerFn, self, context) }), generator; } function tryCatch(fn, obj, arg) { try { return { type: "normal", arg: fn.call(obj, arg) }; } catch (err) { return { type: "throw", arg: err }; } } exports.wrap = wrap; var ContinueSentinel = {}; function Generator() {} function GeneratorFunction() {} function GeneratorFunctionPrototype() {} var IteratorPrototype = {}; define(IteratorPrototype, iteratorSymbol, function () { return this; }); var getProto = Object.getPrototypeOf, NativeIteratorPrototype = getProto && getProto(getProto(values([]))); NativeIteratorPrototype && NativeIteratorPrototype !== Op && hasOwn.call(NativeIteratorPrototype, iteratorSymbol) && (IteratorPrototype = NativeIteratorPrototype); var Gp = GeneratorFunctionPrototype.prototype = Generator.prototype = Object.create(IteratorPrototype); function defineIteratorMethods(prototype) { ["next", "throw", "return"].forEach(function (method) { define(prototype, method, function (arg) { return this._invoke(method, arg); }); }); } function AsyncIterator(generator, PromiseImpl) { function invoke(method, arg, resolve, reject) { var record = tryCatch(generator[method], generator, arg); if ("throw" !== record.type) { var result = record.arg, value = result.value; return value && "object" == _typeof(value) && hasOwn.call(value, "__await") ? PromiseImpl.resolve(value.__await).then(function (value) { invoke("next", value, resolve, reject); }, function (err) { invoke("throw", err, resolve, reject); }) : PromiseImpl.resolve(value).then(function (unwrapped) { result.value = unwrapped, resolve(result); }, function (error) { return invoke("throw", error, resolve, reject); }); } reject(record.arg); } var previousPromise; defineProperty(this, "_invoke", { value: function value(method, arg) { function callInvokeWithMethodAndArg() { return new PromiseImpl(function (resolve, reject) { invoke(method, arg, resolve, reject); }); } return previousPromise = previousPromise ? previousPromise.then(callInvokeWithMethodAndArg, callInvokeWithMethodAndArg) : callInvokeWithMethodAndArg(); } }); } function makeInvokeMethod(innerFn, self, context) { var state = "suspendedStart"; return function (method, arg) { if ("executing" === state) throw new Error("Generator is already running"); if ("completed" === state) { if ("throw" === method) throw arg; return doneResult(); } for (context.method = method, context.arg = arg;;) { var delegate = context.delegate; if (delegate) { var delegateResult = maybeInvokeDelegate(delegate, context); if (delegateResult) { if (delegateResult === ContinueSentinel) continue; return delegateResult; } } if ("next" === context.method) context.sent = context._sent = context.arg;else if ("throw" === context.method) { if ("suspendedStart" === state) throw state = "completed", context.arg; context.dispatchException(context.arg); } else "return" === context.method && context.abrupt("return", context.arg); state = "executing"; var record = tryCatch(innerFn, self, context); if ("normal" === record.type) { if (state = context.done ? "completed" : "suspendedYield", record.arg === ContinueSentinel) continue; return { value: record.arg, done: context.done }; } "throw" === record.type && (state = "completed", context.method = "throw", context.arg = record.arg); } }; } function maybeInvokeDelegate(delegate, context) { var methodName = context.method, method = delegate.iterator[methodName]; if (undefined === method) return context.delegate = null, "throw" === methodName && delegate.iterator["return"] && (context.method = "return", context.arg = undefined, maybeInvokeDelegate(delegate, context), "throw" === context.method) || "return" !== methodName && (context.method = "throw", context.arg = new TypeError("The iterator does not provide a '" + methodName + "' method")), ContinueSentinel; var record = tryCatch(method, delegate.iterator, context.arg); if ("throw" === record.type) return context.method = "throw", context.arg = record.arg, context.delegate = null, ContinueSentinel; var info = record.arg; return info ? info.done ? (context[delegate.resultName] = info.value, context.next = delegate.nextLoc, "return" !== context.method && (context.method = "next", context.arg = undefined), context.delegate = null, ContinueSentinel) : info : (context.method = "throw", context.arg = new TypeError("iterator result is not an object"), context.delegate = null, ContinueSentinel); } function pushTryEntry(locs) { var entry = { tryLoc: locs[0] }; 1 in locs && (entry.catchLoc = locs[1]), 2 in locs && (entry.finallyLoc = locs[2], entry.afterLoc = locs[3]), this.tryEntries.push(entry); } function resetTryEntry(entry) { var record = entry.completion || {}; record.type = "normal", delete record.arg, entry.completion = record; } function Context(tryLocsList) { this.tryEntries = [{ tryLoc: "root" }], tryLocsList.forEach(pushTryEntry, this), this.reset(!0); } function values(iterable) { if (iterable) { var iteratorMethod = iterable[iteratorSymbol]; if (iteratorMethod) return iteratorMethod.call(iterable); if ("function" == typeof iterable.next) return iterable; if (!isNaN(iterable.length)) { var i = -1, next = function next() { for (; ++i < iterable.length;) { if (hasOwn.call(iterable, i)) return next.value = iterable[i], next.done = !1, next; } return next.value = undefined, next.done = !0, next; }; return next.next = next; } } return { next: doneResult }; } function doneResult() { return { value: undefined, done: !0 }; } return GeneratorFunction.prototype = GeneratorFunctionPrototype, defineProperty(Gp, "constructor", { value: GeneratorFunctionPrototype, configurable: !0 }), defineProperty(GeneratorFunctionPrototype, "constructor", { value: GeneratorFunction, configurable: !0 }), GeneratorFunction.displayName = define(GeneratorFunctionPrototype, toStringTagSymbol, "GeneratorFunction"), exports.isGeneratorFunction = function (genFun) { var ctor = "function" == typeof genFun && genFun.constructor; return !!ctor && (ctor === GeneratorFunction || "GeneratorFunction" === (ctor.displayName || ctor.name)); }, exports.mark = function (genFun) { return Object.setPrototypeOf ? Object.setPrototypeOf(genFun, GeneratorFunctionPrototype) : (genFun.__proto__ = GeneratorFunctionPrototype, define(genFun, toStringTagSymbol, "GeneratorFunction")), genFun.prototype = Object.create(Gp), genFun; }, exports.awrap = function (arg) { return { __await: arg }; }, defineIteratorMethods(AsyncIterator.prototype), define(AsyncIterator.prototype, asyncIteratorSymbol, function () { return this; }), exports.AsyncIterator = AsyncIterator, exports.async = function (innerFn, outerFn, self, tryLocsList, PromiseImpl) { void 0 === PromiseImpl && (PromiseImpl = Promise); var iter = new AsyncIterator(wrap(innerFn, outerFn, self, tryLocsList), PromiseImpl); return exports.isGeneratorFunction(outerFn) ? iter : iter.next().then(function (result) { return result.done ? result.value : iter.next(); }); }, defineIteratorMethods(Gp), define(Gp, toStringTagSymbol, "Generator"), define(Gp, iteratorSymbol, function () { return this; }), define(Gp, "toString", function () { return "[object Generator]"; }), exports.keys = function (val) { var object = Object(val), keys = []; for (var key in object) { keys.push(key); } return keys.reverse(), function next() { for (; keys.length;) { var key = keys.pop(); if (key in object) return next.value = key, next.done = !1, next; } return next.done = !0, next; }; }, exports.values = values, Context.prototype = { constructor: Context, reset: function reset(skipTempReset) { if (this.prev = 0, this.next = 0, this.sent = this._sent = undefined, this.done = !1, this.delegate = null, this.method = "next", this.arg = undefined, this.tryEntries.forEach(resetTryEntry), !skipTempReset) for (var name in this) { "t" === name.charAt(0) && hasOwn.call(this, name) && !isNaN(+name.slice(1)) && (this[name] = undefined); } }, stop: function stop() { this.done = !0; var rootRecord = this.tryEntries[0].completion; if ("throw" === rootRecord.type) throw rootRecord.arg; return this.rval; }, dispatchException: function dispatchException(exception) { if (this.done) throw exception; var context = this; function handle(loc, caught) { return record.type = "throw", record.arg = exception, context.next = loc, caught && (context.method = "next", context.arg = undefined), !!caught; } for (var i = this.tryEntries.length - 1; i >= 0; --i) { var entry = this.tryEntries[i], record = entry.completion; if ("root" === entry.tryLoc) return handle("end"); if (entry.tryLoc <= this.prev) { var hasCatch = hasOwn.call(entry, "catchLoc"), hasFinally = hasOwn.call(entry, "finallyLoc"); if (hasCatch && hasFinally) { if (this.prev < entry.catchLoc) return handle(entry.catchLoc, !0); if (this.prev < entry.finallyLoc) return handle(entry.finallyLoc); } else if (hasCatch) { if (this.prev < entry.catchLoc) return handle(entry.catchLoc, !0); } else { if (!hasFinally) throw new Error("try statement without catch or finally"); if (this.prev < entry.finallyLoc) return handle(entry.finallyLoc); } } } }, abrupt: function abrupt(type, arg) { for (var i = this.tryEntries.length - 1; i >= 0; --i) { var entry = this.tryEntries[i]; if (entry.tryLoc <= this.prev && hasOwn.call(entry, "finallyLoc") && this.prev < entry.finallyLoc) { var finallyEntry = entry; break; } } finallyEntry && ("break" === type || "continue" === type) && finallyEntry.tryLoc <= arg && arg <= finallyEntry.finallyLoc && (finallyEntry = null); var record = finallyEntry ? finallyEntry.completion : {}; return record.type = type, record.arg = arg, finallyEntry ? (this.method = "next", this.next = finallyEntry.finallyLoc, ContinueSentinel) : this.complete(record); }, complete: function complete(record, afterLoc) { if ("throw" === record.type) throw record.arg; return "break" === record.type || "continue" === record.type ? this.next = record.arg : "return" === record.type ? (this.rval = this.arg = record.arg, this.method = "return", this.next = "end") : "normal" === record.type && afterLoc && (this.next = afterLoc), ContinueSentinel; }, finish: function finish(finallyLoc) { for (var i = this.tryEntries.length - 1; i >= 0; --i) { var entry = this.tryEntries[i]; if (entry.finallyLoc === finallyLoc) return this.complete(entry.completion, entry.afterLoc), resetTryEntry(entry), ContinueSentinel; } }, "catch": function _catch(tryLoc) { for (var i = this.tryEntries.length - 1; i >= 0; --i) { var entry = this.tryEntries[i]; if (entry.tryLoc === tryLoc) { var record = entry.completion; if ("throw" === record.type) { var thrown = record.arg; resetTryEntry(entry); } return thrown; } } throw new Error("illegal catch attempt"); }, delegateYield: function delegateYield(iterable, resultName, nextLoc) { return this.delegate = { iterator: values(iterable), resultName: resultName, nextLoc: nextLoc }, "next" === this.method && (this.arg = undefined), ContinueSentinel; } }, exports; }
function asyncGeneratorStep(gen, resolve, reject, _next, _throw, key, arg) { try { var info = gen[key](arg); var value = info.value; } catch (error) { reject(error); return; } if (info.done) { resolve(value); } else { Promise.resolve(value).then(_next, _throw); } }
function _asyncToGenerator(fn) { return function () { var self = this, args = arguments; return new Promise(function (resolve, reject) { var gen = fn.apply(self, args); function _next(value) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "next", value); } function _throw(err) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "throw", err); } _next(undefined); }); }; }

var searchUsers = /*#__PURE__*/function () {
  var _ref = _asyncToGenerator( /*#__PURE__*/_regeneratorRuntime().mark(function _callee(query, maxItems) {
    var params, response, jsonResponse;
    return _regeneratorRuntime().wrap(function _callee$(_context) {
      while (1) {
        switch (_context.prev = _context.next) {
          case 0:
            params = {
              query: query,
              maxItems: maxItems
            };
            _context.next = 3;
            return (0,_app_js__WEBPACK_IMPORTED_MODULE_0__.sendRequest)('/api/search/users', {
              method: 'GET',
              params: params
            });
          case 3:
            response = _context.sent;
            _context.next = 6;
            return response.json();
          case 6:
            jsonResponse = _context.sent;
            return _context.abrupt("return", jsonResponse);
          case 8:
          case "end":
            return _context.stop();
        }
      }
    }, _callee);
  }));
  return function searchUsers(_x, _x2) {
    return _ref.apply(this, arguments);
  };
}();
var deleteUserResults = function deleteUserResults() {
  var lista = document.querySelector('section.user-results');
  lista.innerHTML = '';
  lista.style.display = 'hidden';
};
var preencherLista = function preencherLista(users) {
  var lista = document.querySelector('section.user-results');
  var _iterator = _createForOfIteratorHelper(users),
    _step;
  try {
    for (_iterator.s(); !(_step = _iterator.n()).done;) {
      var user = _step.value;
      var userItem = "\n            <article class=\"user-card\" user-id=".concat(user.id, ">\n            <p>").concat(user.name, "</p>\n            <p>").concat(user.username, "</p>\n            </article>\n            ");
      lista.innerHTML += userItem;
    }
  } catch (err) {
    _iterator.e(err);
  } finally {
    _iterator.f();
  }
  var userCards = document.querySelectorAll('article.user-card');
  var _iterator2 = _createForOfIteratorHelper(userCards),
    _step2;
  try {
    var _loop = function _loop() {
      var card = _step2.value;
      card.addEventListener('click', function () {
        var userId = card.getAttribute('user-id');
        window.location = window.location.origin + '/user/' + userId;
      });
    };
    for (_iterator2.s(); !(_step2 = _iterator2.n()).done;) {
      _loop();
    }
  } catch (err) {
    _iterator2.e(err);
  } finally {
    _iterator2.f();
  }
  lista.style.display = 'block';
};
var addSearchUsersFunctionality = /*#__PURE__*/function () {
  var _ref2 = _asyncToGenerator( /*#__PURE__*/_regeneratorRuntime().mark(function _callee3() {
    var queryInput;
    return _regeneratorRuntime().wrap(function _callee3$(_context3) {
      while (1) {
        switch (_context3.prev = _context3.next) {
          case 0:
            console.log("Adding Event");
            queryInput = document.querySelector('input.search-user');
            if (queryInput) {
              queryInput.addEventListener('input', /*#__PURE__*/_asyncToGenerator( /*#__PURE__*/_regeneratorRuntime().mark(function _callee2() {
                var maxItems, result;
                return _regeneratorRuntime().wrap(function _callee2$(_context2) {
                  while (1) {
                    switch (_context2.prev = _context2.next) {
                      case 0:
                        console.log("Estou A receber Texto");
                        maxItems = 10;
                        deleteUserResults();
                        if (!(queryInput.value != '')) {
                          _context2.next = 8;
                          break;
                        }
                        _context2.next = 6;
                        return searchUsers(queryInput.value, maxItems);
                      case 6:
                        result = _context2.sent;
                        preencherLista(result);
                      case 8:
                      case "end":
                        return _context2.stop();
                    }
                  }
                }, _callee2);
              })));
            } else {
              console.log('Não Encontrei os Butoes ');
            }
          case 3:
          case "end":
            return _context3.stop();
        }
      }
    }, _callee3);
  }));
  return function addSearchUsersFunctionality() {
    return _ref2.apply(this, arguments);
  };
}();

/***/ }),

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "createPopUp": () => (/* binding */ createPopUp),
/* harmony export */   "sendRequest": () => (/* binding */ sendRequest)
/* harmony export */ });
function _typeof(obj) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, _typeof(obj); }
function _regeneratorRuntime() { "use strict"; /*! regenerator-runtime -- Copyright (c) 2014-present, Facebook, Inc. -- license (MIT): https://github.com/facebook/regenerator/blob/main/LICENSE */ _regeneratorRuntime = function _regeneratorRuntime() { return exports; }; var exports = {}, Op = Object.prototype, hasOwn = Op.hasOwnProperty, defineProperty = Object.defineProperty || function (obj, key, desc) { obj[key] = desc.value; }, $Symbol = "function" == typeof Symbol ? Symbol : {}, iteratorSymbol = $Symbol.iterator || "@@iterator", asyncIteratorSymbol = $Symbol.asyncIterator || "@@asyncIterator", toStringTagSymbol = $Symbol.toStringTag || "@@toStringTag"; function define(obj, key, value) { return Object.defineProperty(obj, key, { value: value, enumerable: !0, configurable: !0, writable: !0 }), obj[key]; } try { define({}, ""); } catch (err) { define = function define(obj, key, value) { return obj[key] = value; }; } function wrap(innerFn, outerFn, self, tryLocsList) { var protoGenerator = outerFn && outerFn.prototype instanceof Generator ? outerFn : Generator, generator = Object.create(protoGenerator.prototype), context = new Context(tryLocsList || []); return defineProperty(generator, "_invoke", { value: makeInvokeMethod(innerFn, self, context) }), generator; } function tryCatch(fn, obj, arg) { try { return { type: "normal", arg: fn.call(obj, arg) }; } catch (err) { return { type: "throw", arg: err }; } } exports.wrap = wrap; var ContinueSentinel = {}; function Generator() {} function GeneratorFunction() {} function GeneratorFunctionPrototype() {} var IteratorPrototype = {}; define(IteratorPrototype, iteratorSymbol, function () { return this; }); var getProto = Object.getPrototypeOf, NativeIteratorPrototype = getProto && getProto(getProto(values([]))); NativeIteratorPrototype && NativeIteratorPrototype !== Op && hasOwn.call(NativeIteratorPrototype, iteratorSymbol) && (IteratorPrototype = NativeIteratorPrototype); var Gp = GeneratorFunctionPrototype.prototype = Generator.prototype = Object.create(IteratorPrototype); function defineIteratorMethods(prototype) { ["next", "throw", "return"].forEach(function (method) { define(prototype, method, function (arg) { return this._invoke(method, arg); }); }); } function AsyncIterator(generator, PromiseImpl) { function invoke(method, arg, resolve, reject) { var record = tryCatch(generator[method], generator, arg); if ("throw" !== record.type) { var result = record.arg, value = result.value; return value && "object" == _typeof(value) && hasOwn.call(value, "__await") ? PromiseImpl.resolve(value.__await).then(function (value) { invoke("next", value, resolve, reject); }, function (err) { invoke("throw", err, resolve, reject); }) : PromiseImpl.resolve(value).then(function (unwrapped) { result.value = unwrapped, resolve(result); }, function (error) { return invoke("throw", error, resolve, reject); }); } reject(record.arg); } var previousPromise; defineProperty(this, "_invoke", { value: function value(method, arg) { function callInvokeWithMethodAndArg() { return new PromiseImpl(function (resolve, reject) { invoke(method, arg, resolve, reject); }); } return previousPromise = previousPromise ? previousPromise.then(callInvokeWithMethodAndArg, callInvokeWithMethodAndArg) : callInvokeWithMethodAndArg(); } }); } function makeInvokeMethod(innerFn, self, context) { var state = "suspendedStart"; return function (method, arg) { if ("executing" === state) throw new Error("Generator is already running"); if ("completed" === state) { if ("throw" === method) throw arg; return doneResult(); } for (context.method = method, context.arg = arg;;) { var delegate = context.delegate; if (delegate) { var delegateResult = maybeInvokeDelegate(delegate, context); if (delegateResult) { if (delegateResult === ContinueSentinel) continue; return delegateResult; } } if ("next" === context.method) context.sent = context._sent = context.arg;else if ("throw" === context.method) { if ("suspendedStart" === state) throw state = "completed", context.arg; context.dispatchException(context.arg); } else "return" === context.method && context.abrupt("return", context.arg); state = "executing"; var record = tryCatch(innerFn, self, context); if ("normal" === record.type) { if (state = context.done ? "completed" : "suspendedYield", record.arg === ContinueSentinel) continue; return { value: record.arg, done: context.done }; } "throw" === record.type && (state = "completed", context.method = "throw", context.arg = record.arg); } }; } function maybeInvokeDelegate(delegate, context) { var methodName = context.method, method = delegate.iterator[methodName]; if (undefined === method) return context.delegate = null, "throw" === methodName && delegate.iterator["return"] && (context.method = "return", context.arg = undefined, maybeInvokeDelegate(delegate, context), "throw" === context.method) || "return" !== methodName && (context.method = "throw", context.arg = new TypeError("The iterator does not provide a '" + methodName + "' method")), ContinueSentinel; var record = tryCatch(method, delegate.iterator, context.arg); if ("throw" === record.type) return context.method = "throw", context.arg = record.arg, context.delegate = null, ContinueSentinel; var info = record.arg; return info ? info.done ? (context[delegate.resultName] = info.value, context.next = delegate.nextLoc, "return" !== context.method && (context.method = "next", context.arg = undefined), context.delegate = null, ContinueSentinel) : info : (context.method = "throw", context.arg = new TypeError("iterator result is not an object"), context.delegate = null, ContinueSentinel); } function pushTryEntry(locs) { var entry = { tryLoc: locs[0] }; 1 in locs && (entry.catchLoc = locs[1]), 2 in locs && (entry.finallyLoc = locs[2], entry.afterLoc = locs[3]), this.tryEntries.push(entry); } function resetTryEntry(entry) { var record = entry.completion || {}; record.type = "normal", delete record.arg, entry.completion = record; } function Context(tryLocsList) { this.tryEntries = [{ tryLoc: "root" }], tryLocsList.forEach(pushTryEntry, this), this.reset(!0); } function values(iterable) { if (iterable) { var iteratorMethod = iterable[iteratorSymbol]; if (iteratorMethod) return iteratorMethod.call(iterable); if ("function" == typeof iterable.next) return iterable; if (!isNaN(iterable.length)) { var i = -1, next = function next() { for (; ++i < iterable.length;) { if (hasOwn.call(iterable, i)) return next.value = iterable[i], next.done = !1, next; } return next.value = undefined, next.done = !0, next; }; return next.next = next; } } return { next: doneResult }; } function doneResult() { return { value: undefined, done: !0 }; } return GeneratorFunction.prototype = GeneratorFunctionPrototype, defineProperty(Gp, "constructor", { value: GeneratorFunctionPrototype, configurable: !0 }), defineProperty(GeneratorFunctionPrototype, "constructor", { value: GeneratorFunction, configurable: !0 }), GeneratorFunction.displayName = define(GeneratorFunctionPrototype, toStringTagSymbol, "GeneratorFunction"), exports.isGeneratorFunction = function (genFun) { var ctor = "function" == typeof genFun && genFun.constructor; return !!ctor && (ctor === GeneratorFunction || "GeneratorFunction" === (ctor.displayName || ctor.name)); }, exports.mark = function (genFun) { return Object.setPrototypeOf ? Object.setPrototypeOf(genFun, GeneratorFunctionPrototype) : (genFun.__proto__ = GeneratorFunctionPrototype, define(genFun, toStringTagSymbol, "GeneratorFunction")), genFun.prototype = Object.create(Gp), genFun; }, exports.awrap = function (arg) { return { __await: arg }; }, defineIteratorMethods(AsyncIterator.prototype), define(AsyncIterator.prototype, asyncIteratorSymbol, function () { return this; }), exports.AsyncIterator = AsyncIterator, exports.async = function (innerFn, outerFn, self, tryLocsList, PromiseImpl) { void 0 === PromiseImpl && (PromiseImpl = Promise); var iter = new AsyncIterator(wrap(innerFn, outerFn, self, tryLocsList), PromiseImpl); return exports.isGeneratorFunction(outerFn) ? iter : iter.next().then(function (result) { return result.done ? result.value : iter.next(); }); }, defineIteratorMethods(Gp), define(Gp, toStringTagSymbol, "Generator"), define(Gp, iteratorSymbol, function () { return this; }), define(Gp, "toString", function () { return "[object Generator]"; }), exports.keys = function (val) { var object = Object(val), keys = []; for (var key in object) { keys.push(key); } return keys.reverse(), function next() { for (; keys.length;) { var key = keys.pop(); if (key in object) return next.value = key, next.done = !1, next; } return next.done = !0, next; }; }, exports.values = values, Context.prototype = { constructor: Context, reset: function reset(skipTempReset) { if (this.prev = 0, this.next = 0, this.sent = this._sent = undefined, this.done = !1, this.delegate = null, this.method = "next", this.arg = undefined, this.tryEntries.forEach(resetTryEntry), !skipTempReset) for (var name in this) { "t" === name.charAt(0) && hasOwn.call(this, name) && !isNaN(+name.slice(1)) && (this[name] = undefined); } }, stop: function stop() { this.done = !0; var rootRecord = this.tryEntries[0].completion; if ("throw" === rootRecord.type) throw rootRecord.arg; return this.rval; }, dispatchException: function dispatchException(exception) { if (this.done) throw exception; var context = this; function handle(loc, caught) { return record.type = "throw", record.arg = exception, context.next = loc, caught && (context.method = "next", context.arg = undefined), !!caught; } for (var i = this.tryEntries.length - 1; i >= 0; --i) { var entry = this.tryEntries[i], record = entry.completion; if ("root" === entry.tryLoc) return handle("end"); if (entry.tryLoc <= this.prev) { var hasCatch = hasOwn.call(entry, "catchLoc"), hasFinally = hasOwn.call(entry, "finallyLoc"); if (hasCatch && hasFinally) { if (this.prev < entry.catchLoc) return handle(entry.catchLoc, !0); if (this.prev < entry.finallyLoc) return handle(entry.finallyLoc); } else if (hasCatch) { if (this.prev < entry.catchLoc) return handle(entry.catchLoc, !0); } else { if (!hasFinally) throw new Error("try statement without catch or finally"); if (this.prev < entry.finallyLoc) return handle(entry.finallyLoc); } } } }, abrupt: function abrupt(type, arg) { for (var i = this.tryEntries.length - 1; i >= 0; --i) { var entry = this.tryEntries[i]; if (entry.tryLoc <= this.prev && hasOwn.call(entry, "finallyLoc") && this.prev < entry.finallyLoc) { var finallyEntry = entry; break; } } finallyEntry && ("break" === type || "continue" === type) && finallyEntry.tryLoc <= arg && arg <= finallyEntry.finallyLoc && (finallyEntry = null); var record = finallyEntry ? finallyEntry.completion : {}; return record.type = type, record.arg = arg, finallyEntry ? (this.method = "next", this.next = finallyEntry.finallyLoc, ContinueSentinel) : this.complete(record); }, complete: function complete(record, afterLoc) { if ("throw" === record.type) throw record.arg; return "break" === record.type || "continue" === record.type ? this.next = record.arg : "return" === record.type ? (this.rval = this.arg = record.arg, this.method = "return", this.next = "end") : "normal" === record.type && afterLoc && (this.next = afterLoc), ContinueSentinel; }, finish: function finish(finallyLoc) { for (var i = this.tryEntries.length - 1; i >= 0; --i) { var entry = this.tryEntries[i]; if (entry.finallyLoc === finallyLoc) return this.complete(entry.completion, entry.afterLoc), resetTryEntry(entry), ContinueSentinel; } }, "catch": function _catch(tryLoc) { for (var i = this.tryEntries.length - 1; i >= 0; --i) { var entry = this.tryEntries[i]; if (entry.tryLoc === tryLoc) { var record = entry.completion; if ("throw" === record.type) { var thrown = record.arg; resetTryEntry(entry); } return thrown; } } throw new Error("illegal catch attempt"); }, delegateYield: function delegateYield(iterable, resultName, nextLoc) { return this.delegate = { iterator: values(iterable), resultName: resultName, nextLoc: nextLoc }, "next" === this.method && (this.arg = undefined), ContinueSentinel; } }, exports; }
function asyncGeneratorStep(gen, resolve, reject, _next, _throw, key, arg) { try { var info = gen[key](arg); var value = info.value; } catch (error) { reject(error); return; } if (info.done) { resolve(value); } else { Promise.resolve(value).then(_next, _throw); } }
function _asyncToGenerator(fn) { return function () { var self = this, args = arguments; return new Promise(function (resolve, reject) { var gen = fn.apply(self, args); function _next(value) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "next", value); } function _throw(err) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "throw", err); } _next(undefined); }); }; }
window.SERVER = "http://localhost:8000";
var sendRequest = /*#__PURE__*/function () {
  var _ref = _asyncToGenerator( /*#__PURE__*/_regeneratorRuntime().mark(function _callee(url, options) {
    var fullUrl, response;
    return _regeneratorRuntime().wrap(function _callee$(_context) {
      while (1) {
        switch (_context.prev = _context.next) {
          case 0:
            fullUrl = new URL(window.SERVER + url);
            if (options.method === "GET" && options.params != undefined) {
              fullUrl.search = new URLSearchParams(options.params).toString();
            }
            _context.next = 4;
            return fetch(fullUrl, options);
          case 4:
            response = _context.sent;
            return _context.abrupt("return", response);
          case 6:
          case "end":
            return _context.stop();
        }
      }
    }, _callee);
  }));
  return function sendRequest(_x, _x2) {
    return _ref.apply(this, arguments);
  };
}();

// Pop Up
var createPopUp = function createPopUp(type, title, text) {
  var popUp = document.createElement('article');
  popUp.classList.add('tu-do-popup');
  popUp.setAttribute('opening', '');
  var header = document.createElement('header');
  header.setAttribute(type, '');
  var titleP = document.createElement('p');
  titleP.textContent = title;
  header.appendChild(titleP);
  var closeButton = document.createElement('button');
  closeButton.textContent = 'X';
  header.appendChild(closeButton);
  var content = document.createElement('section');
  var headerSection = document.createElement('section');
  var p = document.createElement('p');
  p.textContent = text;
  var closePopUp = function closePopUp(popup) {
    popUp.removeAttribute('opening');
    popUp.setAttribute('closing', '');
    popUp.addEventListener('animationend', function () {
      popUp.removeAttribute('closing');
      popUp.classList.add('closed');
    }, {
      once: true
    });
  };
  closeButton.addEventListener('click', closePopUp);
  popUp.addEventListener('animationend', function () {
    setTimeout(closePopUp, 5 * 1000);
  });
  content.appendChild(p);
  popUp.appendChild(header);
  popUp.appendChild(content);
  return popUp;
};

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other modules in the chunk.
(() => {
/*!************************************!*\
  !*** ./resources/js/admin/bans.js ***!
  \************************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _app_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../app.js */ "./resources/js/app.js");
/* harmony import */ var _searchUsers_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./searchUsers.js */ "./resources/js/admin/searchUsers.js");
function _typeof(obj) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, _typeof(obj); }
function _regeneratorRuntime() { "use strict"; /*! regenerator-runtime -- Copyright (c) 2014-present, Facebook, Inc. -- license (MIT): https://github.com/facebook/regenerator/blob/main/LICENSE */ _regeneratorRuntime = function _regeneratorRuntime() { return exports; }; var exports = {}, Op = Object.prototype, hasOwn = Op.hasOwnProperty, defineProperty = Object.defineProperty || function (obj, key, desc) { obj[key] = desc.value; }, $Symbol = "function" == typeof Symbol ? Symbol : {}, iteratorSymbol = $Symbol.iterator || "@@iterator", asyncIteratorSymbol = $Symbol.asyncIterator || "@@asyncIterator", toStringTagSymbol = $Symbol.toStringTag || "@@toStringTag"; function define(obj, key, value) { return Object.defineProperty(obj, key, { value: value, enumerable: !0, configurable: !0, writable: !0 }), obj[key]; } try { define({}, ""); } catch (err) { define = function define(obj, key, value) { return obj[key] = value; }; } function wrap(innerFn, outerFn, self, tryLocsList) { var protoGenerator = outerFn && outerFn.prototype instanceof Generator ? outerFn : Generator, generator = Object.create(protoGenerator.prototype), context = new Context(tryLocsList || []); return defineProperty(generator, "_invoke", { value: makeInvokeMethod(innerFn, self, context) }), generator; } function tryCatch(fn, obj, arg) { try { return { type: "normal", arg: fn.call(obj, arg) }; } catch (err) { return { type: "throw", arg: err }; } } exports.wrap = wrap; var ContinueSentinel = {}; function Generator() {} function GeneratorFunction() {} function GeneratorFunctionPrototype() {} var IteratorPrototype = {}; define(IteratorPrototype, iteratorSymbol, function () { return this; }); var getProto = Object.getPrototypeOf, NativeIteratorPrototype = getProto && getProto(getProto(values([]))); NativeIteratorPrototype && NativeIteratorPrototype !== Op && hasOwn.call(NativeIteratorPrototype, iteratorSymbol) && (IteratorPrototype = NativeIteratorPrototype); var Gp = GeneratorFunctionPrototype.prototype = Generator.prototype = Object.create(IteratorPrototype); function defineIteratorMethods(prototype) { ["next", "throw", "return"].forEach(function (method) { define(prototype, method, function (arg) { return this._invoke(method, arg); }); }); } function AsyncIterator(generator, PromiseImpl) { function invoke(method, arg, resolve, reject) { var record = tryCatch(generator[method], generator, arg); if ("throw" !== record.type) { var result = record.arg, value = result.value; return value && "object" == _typeof(value) && hasOwn.call(value, "__await") ? PromiseImpl.resolve(value.__await).then(function (value) { invoke("next", value, resolve, reject); }, function (err) { invoke("throw", err, resolve, reject); }) : PromiseImpl.resolve(value).then(function (unwrapped) { result.value = unwrapped, resolve(result); }, function (error) { return invoke("throw", error, resolve, reject); }); } reject(record.arg); } var previousPromise; defineProperty(this, "_invoke", { value: function value(method, arg) { function callInvokeWithMethodAndArg() { return new PromiseImpl(function (resolve, reject) { invoke(method, arg, resolve, reject); }); } return previousPromise = previousPromise ? previousPromise.then(callInvokeWithMethodAndArg, callInvokeWithMethodAndArg) : callInvokeWithMethodAndArg(); } }); } function makeInvokeMethod(innerFn, self, context) { var state = "suspendedStart"; return function (method, arg) { if ("executing" === state) throw new Error("Generator is already running"); if ("completed" === state) { if ("throw" === method) throw arg; return doneResult(); } for (context.method = method, context.arg = arg;;) { var delegate = context.delegate; if (delegate) { var delegateResult = maybeInvokeDelegate(delegate, context); if (delegateResult) { if (delegateResult === ContinueSentinel) continue; return delegateResult; } } if ("next" === context.method) context.sent = context._sent = context.arg;else if ("throw" === context.method) { if ("suspendedStart" === state) throw state = "completed", context.arg; context.dispatchException(context.arg); } else "return" === context.method && context.abrupt("return", context.arg); state = "executing"; var record = tryCatch(innerFn, self, context); if ("normal" === record.type) { if (state = context.done ? "completed" : "suspendedYield", record.arg === ContinueSentinel) continue; return { value: record.arg, done: context.done }; } "throw" === record.type && (state = "completed", context.method = "throw", context.arg = record.arg); } }; } function maybeInvokeDelegate(delegate, context) { var methodName = context.method, method = delegate.iterator[methodName]; if (undefined === method) return context.delegate = null, "throw" === methodName && delegate.iterator["return"] && (context.method = "return", context.arg = undefined, maybeInvokeDelegate(delegate, context), "throw" === context.method) || "return" !== methodName && (context.method = "throw", context.arg = new TypeError("The iterator does not provide a '" + methodName + "' method")), ContinueSentinel; var record = tryCatch(method, delegate.iterator, context.arg); if ("throw" === record.type) return context.method = "throw", context.arg = record.arg, context.delegate = null, ContinueSentinel; var info = record.arg; return info ? info.done ? (context[delegate.resultName] = info.value, context.next = delegate.nextLoc, "return" !== context.method && (context.method = "next", context.arg = undefined), context.delegate = null, ContinueSentinel) : info : (context.method = "throw", context.arg = new TypeError("iterator result is not an object"), context.delegate = null, ContinueSentinel); } function pushTryEntry(locs) { var entry = { tryLoc: locs[0] }; 1 in locs && (entry.catchLoc = locs[1]), 2 in locs && (entry.finallyLoc = locs[2], entry.afterLoc = locs[3]), this.tryEntries.push(entry); } function resetTryEntry(entry) { var record = entry.completion || {}; record.type = "normal", delete record.arg, entry.completion = record; } function Context(tryLocsList) { this.tryEntries = [{ tryLoc: "root" }], tryLocsList.forEach(pushTryEntry, this), this.reset(!0); } function values(iterable) { if (iterable) { var iteratorMethod = iterable[iteratorSymbol]; if (iteratorMethod) return iteratorMethod.call(iterable); if ("function" == typeof iterable.next) return iterable; if (!isNaN(iterable.length)) { var i = -1, next = function next() { for (; ++i < iterable.length;) { if (hasOwn.call(iterable, i)) return next.value = iterable[i], next.done = !1, next; } return next.value = undefined, next.done = !0, next; }; return next.next = next; } } return { next: doneResult }; } function doneResult() { return { value: undefined, done: !0 }; } return GeneratorFunction.prototype = GeneratorFunctionPrototype, defineProperty(Gp, "constructor", { value: GeneratorFunctionPrototype, configurable: !0 }), defineProperty(GeneratorFunctionPrototype, "constructor", { value: GeneratorFunction, configurable: !0 }), GeneratorFunction.displayName = define(GeneratorFunctionPrototype, toStringTagSymbol, "GeneratorFunction"), exports.isGeneratorFunction = function (genFun) { var ctor = "function" == typeof genFun && genFun.constructor; return !!ctor && (ctor === GeneratorFunction || "GeneratorFunction" === (ctor.displayName || ctor.name)); }, exports.mark = function (genFun) { return Object.setPrototypeOf ? Object.setPrototypeOf(genFun, GeneratorFunctionPrototype) : (genFun.__proto__ = GeneratorFunctionPrototype, define(genFun, toStringTagSymbol, "GeneratorFunction")), genFun.prototype = Object.create(Gp), genFun; }, exports.awrap = function (arg) { return { __await: arg }; }, defineIteratorMethods(AsyncIterator.prototype), define(AsyncIterator.prototype, asyncIteratorSymbol, function () { return this; }), exports.AsyncIterator = AsyncIterator, exports.async = function (innerFn, outerFn, self, tryLocsList, PromiseImpl) { void 0 === PromiseImpl && (PromiseImpl = Promise); var iter = new AsyncIterator(wrap(innerFn, outerFn, self, tryLocsList), PromiseImpl); return exports.isGeneratorFunction(outerFn) ? iter : iter.next().then(function (result) { return result.done ? result.value : iter.next(); }); }, defineIteratorMethods(Gp), define(Gp, toStringTagSymbol, "Generator"), define(Gp, iteratorSymbol, function () { return this; }), define(Gp, "toString", function () { return "[object Generator]"; }), exports.keys = function (val) { var object = Object(val), keys = []; for (var key in object) { keys.push(key); } return keys.reverse(), function next() { for (; keys.length;) { var key = keys.pop(); if (key in object) return next.value = key, next.done = !1, next; } return next.done = !0, next; }; }, exports.values = values, Context.prototype = { constructor: Context, reset: function reset(skipTempReset) { if (this.prev = 0, this.next = 0, this.sent = this._sent = undefined, this.done = !1, this.delegate = null, this.method = "next", this.arg = undefined, this.tryEntries.forEach(resetTryEntry), !skipTempReset) for (var name in this) { "t" === name.charAt(0) && hasOwn.call(this, name) && !isNaN(+name.slice(1)) && (this[name] = undefined); } }, stop: function stop() { this.done = !0; var rootRecord = this.tryEntries[0].completion; if ("throw" === rootRecord.type) throw rootRecord.arg; return this.rval; }, dispatchException: function dispatchException(exception) { if (this.done) throw exception; var context = this; function handle(loc, caught) { return record.type = "throw", record.arg = exception, context.next = loc, caught && (context.method = "next", context.arg = undefined), !!caught; } for (var i = this.tryEntries.length - 1; i >= 0; --i) { var entry = this.tryEntries[i], record = entry.completion; if ("root" === entry.tryLoc) return handle("end"); if (entry.tryLoc <= this.prev) { var hasCatch = hasOwn.call(entry, "catchLoc"), hasFinally = hasOwn.call(entry, "finallyLoc"); if (hasCatch && hasFinally) { if (this.prev < entry.catchLoc) return handle(entry.catchLoc, !0); if (this.prev < entry.finallyLoc) return handle(entry.finallyLoc); } else if (hasCatch) { if (this.prev < entry.catchLoc) return handle(entry.catchLoc, !0); } else { if (!hasFinally) throw new Error("try statement without catch or finally"); if (this.prev < entry.finallyLoc) return handle(entry.finallyLoc); } } } }, abrupt: function abrupt(type, arg) { for (var i = this.tryEntries.length - 1; i >= 0; --i) { var entry = this.tryEntries[i]; if (entry.tryLoc <= this.prev && hasOwn.call(entry, "finallyLoc") && this.prev < entry.finallyLoc) { var finallyEntry = entry; break; } } finallyEntry && ("break" === type || "continue" === type) && finallyEntry.tryLoc <= arg && arg <= finallyEntry.finallyLoc && (finallyEntry = null); var record = finallyEntry ? finallyEntry.completion : {}; return record.type = type, record.arg = arg, finallyEntry ? (this.method = "next", this.next = finallyEntry.finallyLoc, ContinueSentinel) : this.complete(record); }, complete: function complete(record, afterLoc) { if ("throw" === record.type) throw record.arg; return "break" === record.type || "continue" === record.type ? this.next = record.arg : "return" === record.type ? (this.rval = this.arg = record.arg, this.method = "return", this.next = "end") : "normal" === record.type && afterLoc && (this.next = afterLoc), ContinueSentinel; }, finish: function finish(finallyLoc) { for (var i = this.tryEntries.length - 1; i >= 0; --i) { var entry = this.tryEntries[i]; if (entry.finallyLoc === finallyLoc) return this.complete(entry.completion, entry.afterLoc), resetTryEntry(entry), ContinueSentinel; } }, "catch": function _catch(tryLoc) { for (var i = this.tryEntries.length - 1; i >= 0; --i) { var entry = this.tryEntries[i]; if (entry.tryLoc === tryLoc) { var record = entry.completion; if ("throw" === record.type) { var thrown = record.arg; resetTryEntry(entry); } return thrown; } } throw new Error("illegal catch attempt"); }, delegateYield: function delegateYield(iterable, resultName, nextLoc) { return this.delegate = { iterator: values(iterable), resultName: resultName, nextLoc: nextLoc }, "next" === this.method && (this.arg = undefined), ContinueSentinel; } }, exports; }
function asyncGeneratorStep(gen, resolve, reject, _next, _throw, key, arg) { try { var info = gen[key](arg); var value = info.value; } catch (error) { reject(error); return; } if (info.done) { resolve(value); } else { Promise.resolve(value).then(_next, _throw); } }
function _asyncToGenerator(fn) { return function () { var self = this, args = arguments; return new Promise(function (resolve, reject) { var gen = fn.apply(self, args); function _next(value) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "next", value); } function _throw(err) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "throw", err); } _next(undefined); }); }; }



/* section opened when page is visited */
openBans();

/* main tabs navigation */
var tabs = document.getElementsByClassName('tab');
Array.from(tabs).forEach(function (e) {
  e.addEventListener('click', function (e) {
    if (e.currentTarget.classList.contains('selected')) {
      /* its already selected, do nothing */
      return;
    }
    var selected = document.getElementsByClassName('selected');
    Array.from(selected).forEach(function (s) {
      s.className = s.className.replace(' selected', '');
    });
    e.currentTarget.className += ' selected';
    if (e.currentTarget.id == 'tab-user') {
      var subtab_bans = document.createElement('button');
      var subtab_create = document.createElement('button');
      var subtab_search = document.createElement('button');
      subtab_bans.classList.add('sub-tab');
      subtab_bans.classList.add('selected');
      subtab_bans.id = "sub-tab-bans";
      subtab_bans.innerHTML = '<i class="fa-solid fa-ban"></i> Banned Users';
      subtab_create.classList.add('sub-tab');
      subtab_create.innerHTML = '<i class="fa-solid fa-plus"></i> Create User';
      subtab_create.id = "sub-tab-createuser";
      subtab_search.classList.add('sub-tab');
      subtab_search.innerHTML = '<i class="fa-solid fa-search"></i> Search User';
      subtab_search.id = "sub-tab-searchuser";
      var sub_tabs = document.getElementById('sub-tabs');
      sub_tabs.innerHTML = '';
      sub_tabs.appendChild(subtab_bans);
      sub_tabs.appendChild(subtab_create);
      sub_tabs.appendChild(subtab_search);
      openBans();
    } else if (e.currentTarget.id == 'tab-project') {
      var _subtab_search = document.createElement('button');
      _subtab_search.classList.add('sub-tab');
      _subtab_search.classList.add('selected');
      _subtab_search.innerHTML = '<i class="fa-solid fa-search"></i> Search Project';
      _subtab_search.id = "sub-tab-searchproject";
      var _sub_tabs = document.getElementById('sub-tabs');
      _sub_tabs.innerHTML = '';
      _sub_tabs.appendChild(_subtab_search);
      openSearchProject();
    }
    subTabsNav();
  });
});
subTabsNav();

/* sub-tabs navigation */
function subTabsNav() {
  var sub_tabs = document.getElementsByClassName('sub-tab');
  Array.from(sub_tabs).forEach(function (e) {
    e.addEventListener('click', function (e) {
      var selected = document.getElementsByClassName('sub-tab selected');
      Array.from(selected).forEach(function (s) {
        s.className = s.className.replace(' selected', '');
      });
      e.currentTarget.className += ' selected';
      if (e.currentTarget.id == 'sub-tab-bans') {
        openBans();
      } else if (e.currentTarget.id == 'sub-tab-createuser') {
        openCreateUser();
      } else if (e.currentTarget.id == 'sub-tab-searchuser') {
        openSearchUser();
      } else if (e.currentTarget.id == 'sub-tab-searchproject') {
        openSearchProject();
      }
    });
  });
}
function openBans() {
  return _openBans.apply(this, arguments);
}
function _openBans() {
  _openBans = _asyncToGenerator( /*#__PURE__*/_regeneratorRuntime().mark(function _callee4() {
    var content, banButton, url, rawResponse, contents, currDate, key, end_date, _url, userInfo, adminInfo, banItem, user, admin, reason, date, removeBanButton;
    return _regeneratorRuntime().wrap(function _callee4$(_context4) {
      while (1) {
        switch (_context4.prev = _context4.next) {
          case 0:
            content = document.getElementById('tab-content');
            content.innerHTML = '';
            banButton = document.createElement('button');
            banButton.addEventListener('click', /*#__PURE__*/_asyncToGenerator( /*#__PURE__*/_regeneratorRuntime().mark(function _callee2() {
              var url, rawResponse;
              return _regeneratorRuntime().wrap(function _callee2$(_context2) {
                while (1) {
                  switch (_context2.prev = _context2.next) {
                    case 0:
                      url = '/api/user/ban';
                      _context2.next = 3;
                      return (0,_app_js__WEBPACK_IMPORTED_MODULE_0__.sendRequest)(url, {
                        method: 'POST',
                        headers: {
                          'Accept': 'application:json',
                          'Content-Type': 'application:json'
                        },
                        body: JSON.stringify({
                          id_users: 5,
                          id_administrator: 1,
                          end_date: '2024-01-01',
                          reason: 'asdsada'
                        })
                      });
                    case 3:
                      rawResponse = _context2.sent;
                    case 4:
                    case "end":
                      return _context2.stop();
                  }
                }
              }, _callee2);
            })));
            url = '/api/bans';
            _context4.next = 8;
            return (0,_app_js__WEBPACK_IMPORTED_MODULE_0__.sendRequest)(url, {
              method: "GET"
            });
          case 8:
            rawResponse = _context4.sent;
            _context4.next = 11;
            return rawResponse.json();
          case 11:
            contents = _context4.sent;
            currDate = new Date();
            currDate.setHours(0, 0, 0, 0);
            _context4.t0 = _regeneratorRuntime().keys(contents);
          case 15:
            if ((_context4.t1 = _context4.t0()).done) {
              _context4.next = 55;
              break;
            }
            key = _context4.t1.value;
            end_date = new Date(contents[key]['end_date']);
            if (!(end_date.getTime() < currDate.getTime())) {
              _context4.next = 20;
              break;
            }
            return _context4.abrupt("continue", 15);
          case 20:
            _url = '/api/user/' + contents[key]['id_users'] + '/json';
            _context4.next = 23;
            return (0,_app_js__WEBPACK_IMPORTED_MODULE_0__.sendRequest)(_url, {
              method: "GET"
            });
          case 23:
            rawResponse = _context4.sent;
            _context4.next = 26;
            return rawResponse.json();
          case 26:
            userInfo = _context4.sent;
            _url = '/api/admin/' + contents[key]['id_administrator'] + '/json';
            _context4.next = 30;
            return (0,_app_js__WEBPACK_IMPORTED_MODULE_0__.sendRequest)(_url, {
              method: "GET"
            });
          case 30:
            rawResponse = _context4.sent;
            _context4.next = 33;
            return rawResponse.json();
          case 33:
            adminInfo = _context4.sent;
            banItem = document.createElement('article');
            banItem.id = contents[key]['id'];
            user = document.createElement('p');
            user.innerHTML = "\n      User: \n      <a href=\"/user/" + userInfo['user']['id'] + "\">" + userInfo['user']['username'] + "</a>\n    ";
            admin = document.createElement('p');
            admin.innerHTML = "\n      Banned by: \n      <a href=\"/user/" + adminInfo['user']['id'] + "\">" + adminInfo['user']['username'] + "</a>\n    ";
            reason = document.createElement('p');
            reason.innerText = 'Reason: ' + contents[key]['reason'];
            date = document.createElement('p');
            date.innerText = 'Banned until: ' + contents[key]['end_date'];
            removeBanButton = document.createElement('button');
            removeBanButton.innerHTML = '<i class="fa-solid fa-times"></i> Remove Ban';
            removeBanButton.addEventListener('click', /*#__PURE__*/function () {
              var _ref3 = _asyncToGenerator( /*#__PURE__*/_regeneratorRuntime().mark(function _callee3(e) {
                var url;
                return _regeneratorRuntime().wrap(function _callee3$(_context3) {
                  while (1) {
                    switch (_context3.prev = _context3.next) {
                      case 0:
                        console.log(e.currentTarget.parentNode.id);
                        url = '/api/bans';
                        _context3.next = 4;
                        return (0,_app_js__WEBPACK_IMPORTED_MODULE_0__.sendRequest)(url.toString(), {
                          method: 'DELETE',
                          headers: {
                            'Accept': 'application:json',
                            'Content-Type': 'application:json'
                          },
                          body: JSON.stringify({
                            id: e.currentTarget.parentNode.id
                          })
                        });
                      case 4:
                        rawResponse = _context3.sent;
                        openBans();
                      case 6:
                      case "end":
                        return _context3.stop();
                    }
                  }
                }, _callee3);
              }));
              return function (_x) {
                return _ref3.apply(this, arguments);
              };
            }());
            banItem.appendChild(user);
            banItem.appendChild(admin);
            banItem.appendChild(reason);
            banItem.appendChild(date);
            banItem.appendChild(removeBanButton);
            content.appendChild(banItem);
            _context4.next = 15;
            break;
          case 55:
          case "end":
            return _context4.stop();
        }
      }
    }, _callee4);
  }));
  return _openBans.apply(this, arguments);
}
function openCreateUser() {
  var content = document.getElementById('tab-content');

  /* create form */
  var form = document.createElement('form');
  form.setAttribute('action', 'javascript:void(0);');

  /* create labels */
  var labelName = document.createElement('label');
  labelName.setAttribute('for', 'name');
  labelName.innerText = 'Name';
  var labelUsername = document.createElement('label');
  labelUsername.setAttribute('for', 'username');
  labelUsername.innerText = 'Username';
  var labelMail = document.createElement('label');
  labelMail.setAttribute('for', 'email');
  labelMail.innerText = 'E-Mail Address';
  var labelPhone = document.createElement('label');
  labelPhone.setAttribute('for', 'phone_number');
  labelPhone.innerText = 'Phone Number';
  var labelPassword = document.createElement('label');
  labelPassword.setAttribute('for', 'password');
  labelPassword.innerText = 'Password';
  var labelPasswordC = document.createElement('label');
  labelPasswordC.setAttribute('for', 'password-confirm');
  labelPasswordC.innerText = 'Confirm Password';

  /* create inputs */
  var inputName = document.createElement('input');
  inputName.id = 'name';
  inputName.setAttribute('type', 'text');
  inputName.setAttribute('name', 'name');
  inputName.setAttribute('required', 'required');
  inputName.setAttribute('autofocus', 'autofocus');
  var inputUsername = document.createElement('input');
  inputUsername.id = 'username';
  inputUsername.setAttribute('type', 'text');
  inputUsername.setAttribute('name', 'username');
  inputUsername.setAttribute('required', 'required');
  var inputMail = document.createElement('input');
  inputMail.id = 'email';
  inputMail.setAttribute('type', 'email');
  inputMail.setAttribute('name', 'email');
  inputMail.setAttribute('required', 'required');
  var inputPhone = document.createElement('input');
  inputPhone.id = 'phone_number';
  inputPhone.setAttribute('type', 'text');
  inputPhone.setAttribute('name', 'phone_number');
  inputPhone.setAttribute('required', 'required');
  var inputPassword = document.createElement('input');
  inputPassword.id = 'password';
  inputPassword.setAttribute('type', 'password');
  inputPassword.setAttribute('name', 'password');
  inputPassword.setAttribute('required', 'required');
  var inputPasswordC = document.createElement('input');
  inputPasswordC.id = 'password-confirm';
  inputPasswordC.setAttribute('type', 'password');
  inputPasswordC.setAttribute('name', 'password_confirmation');
  inputPasswordC.setAttribute('required', 'required');

  /* error messages */
  var errorName = document.createElement('span');
  errorName.className = 'error';
  errorName.id = 'error-name';
  errorName.style.color = 'red';
  var errorUsername = document.createElement('span');
  errorUsername.className = 'error';
  errorUsername.id = 'error-username';
  errorUsername.style.color = 'red';
  var errorMail = document.createElement('span');
  errorMail.className = 'error';
  errorMail.id = 'error-mail';
  errorMail.style.color = 'red';
  var errorPhone = document.createElement('span');
  errorPhone.className = 'error';
  errorPhone.id = 'error-phone';
  errorPhone.style.color = 'red';
  var errorPassword = document.createElement('span');
  errorPassword.className = 'error';
  errorPassword.id = 'error-password';
  errorPassword.style.color = 'red';

  /* submit button */
  var submit = document.createElement('button');
  submit.setAttribute('type', 'submit');
  submit.innerText = 'Create';

  /* build form */
  form.appendChild(labelName);
  form.appendChild(inputName);
  form.appendChild(errorName);
  form.appendChild(labelUsername);
  form.appendChild(inputUsername);
  form.appendChild(errorUsername);
  form.appendChild(labelMail);
  form.appendChild(inputMail);
  form.appendChild(errorMail);
  form.appendChild(labelPhone);
  form.appendChild(inputPhone);
  form.appendChild(errorPhone);
  form.appendChild(labelPassword);
  form.appendChild(inputPassword);
  form.appendChild(errorPassword);
  form.appendChild(labelPasswordC);
  form.appendChild(inputPasswordC);
  form.appendChild(submit);
  form.addEventListener('submit', /*#__PURE__*/_asyncToGenerator( /*#__PURE__*/_regeneratorRuntime().mark(function _callee() {
    var url, rawResponse, contents, inputs, i, errors, _i, error, p;
    return _regeneratorRuntime().wrap(function _callee$(_context) {
      while (1) {
        switch (_context.prev = _context.next) {
          case 0:
            url = '/api/user';
            _context.next = 3;
            return (0,_app_js__WEBPACK_IMPORTED_MODULE_0__.sendRequest)(url.toString(), {
              method: 'POST',
              headers: {
                'Accept': 'application:json',
                'Content-Type': 'application:json'
              },
              body: JSON.stringify({
                name: inputName.value,
                username: inputUsername.value,
                email: inputMail.value,
                phone_number: inputPhone.value,
                password: inputPassword.value,
                password_confirmation: inputPasswordC.value
              })
            });
          case 3:
            rawResponse = _context.sent;
            _context.next = 6;
            return rawResponse.json();
          case 6:
            contents = _context.sent;
            if (!contents['success']) {
              inputs = document.querySelectorAll('form > input');
              for (i = 0; i < inputs.length; i++) {
                inputs[i].style.borderColor = '#d1d1d1';
              }
              errors = document.querySelectorAll('.error');
              for (_i = 0; _i < errors.length; _i++) {
                errors[_i].innerText = '';
              }
              for (error in contents['error']) {
                if (error == 'name') {
                  errorName = document.getElementById('error-name');
                  document.getElementById('name').style.borderColor = 'red';
                  errorName.textContent = contents['error'][error][0];
                } else if (error == 'username') {
                  errorUsername = document.getElementById('error-username');
                  document.getElementById('username').style.borderColor = 'red';
                  errorUsername.textContent = contents['error'][error][0];
                } else if (error == 'email') {
                  errorMail = document.getElementById('error-mail');
                  document.getElementById('email').style.borderColor = 'red';
                  errorMail.textContent = contents['error'][error][0];
                } else if (error == 'phone_number') {
                  errorPhone = document.getElementById('error-phone');
                  document.getElementById('phone_number').style.borderColor = 'red';
                  errorPhone.textContent = contents['error'][error][0];
                } else if (error == 'password') {
                  errorPassword = document.getElementById('error-password');
                  document.getElementById('password').style.borderColor = 'red';
                  errorPassword.textContent = contents['error'][error][0];
                }
              }
            } else {
              p = document.createElement('p');
              p.innerText = 'Account created with success!';
              content.innerHTML = '';
              content.appendChild(p);
            }
          case 8:
          case "end":
            return _context.stop();
        }
      }
    }, _callee);
  })));
  content.innerHTML = '';
  content.appendChild(form);
}
function openSearchUser() {
  return _openSearchUser.apply(this, arguments);
}
function _openSearchUser() {
  _openSearchUser = _asyncToGenerator( /*#__PURE__*/_regeneratorRuntime().mark(function _callee5() {
    var content;
    return _regeneratorRuntime().wrap(function _callee5$(_context5) {
      while (1) {
        switch (_context5.prev = _context5.next) {
          case 0:
            content = document.getElementById('tab-content');
            content.innerHTML = "<div class=\"search_bar\">\n        <i class=\"fa-solid fa-search\"></i>\n        <input class=\"search-user\" type=\"text\" placeholder=\"Search user...\">\n        </div>\n        <section class=\"user-results\" style=\"display:hidden\"></section>";
            (0,_searchUsers_js__WEBPACK_IMPORTED_MODULE_1__.addSearchUsersFunctionality)();
          case 3:
          case "end":
            return _context5.stop();
        }
      }
    }, _callee5);
  }));
  return _openSearchUser.apply(this, arguments);
}
function openSearchProject() {
  var content = document.getElementById('tab-content');
  content.innerHTML = 'Search Project';
  /* TODO: Search Project content */
}
})();

/******/ })()
;
