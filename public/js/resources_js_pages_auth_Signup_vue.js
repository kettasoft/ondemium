"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_pages_auth_Signup_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/auth/Signup.vue?vue&type=script&setup=true&lang=js&":
/*!************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/auth/Signup.vue?vue&type=script&setup=true&lang=js& ***!
  \************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.esm.js");
function _typeof(obj) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, _typeof(obj); }
function _regeneratorRuntime() { "use strict"; /*! regenerator-runtime -- Copyright (c) 2014-present, Facebook, Inc. -- license (MIT): https://github.com/facebook/regenerator/blob/main/LICENSE */ _regeneratorRuntime = function _regeneratorRuntime() { return exports; }; var exports = {}, Op = Object.prototype, hasOwn = Op.hasOwnProperty, defineProperty = Object.defineProperty || function (obj, key, desc) { obj[key] = desc.value; }, $Symbol = "function" == typeof Symbol ? Symbol : {}, iteratorSymbol = $Symbol.iterator || "@@iterator", asyncIteratorSymbol = $Symbol.asyncIterator || "@@asyncIterator", toStringTagSymbol = $Symbol.toStringTag || "@@toStringTag"; function define(obj, key, value) { return Object.defineProperty(obj, key, { value: value, enumerable: !0, configurable: !0, writable: !0 }), obj[key]; } try { define({}, ""); } catch (err) { define = function define(obj, key, value) { return obj[key] = value; }; } function wrap(innerFn, outerFn, self, tryLocsList) { var protoGenerator = outerFn && outerFn.prototype instanceof Generator ? outerFn : Generator, generator = Object.create(protoGenerator.prototype), context = new Context(tryLocsList || []); return defineProperty(generator, "_invoke", { value: makeInvokeMethod(innerFn, self, context) }), generator; } function tryCatch(fn, obj, arg) { try { return { type: "normal", arg: fn.call(obj, arg) }; } catch (err) { return { type: "throw", arg: err }; } } exports.wrap = wrap; var ContinueSentinel = {}; function Generator() {} function GeneratorFunction() {} function GeneratorFunctionPrototype() {} var IteratorPrototype = {}; define(IteratorPrototype, iteratorSymbol, function () { return this; }); var getProto = Object.getPrototypeOf, NativeIteratorPrototype = getProto && getProto(getProto(values([]))); NativeIteratorPrototype && NativeIteratorPrototype !== Op && hasOwn.call(NativeIteratorPrototype, iteratorSymbol) && (IteratorPrototype = NativeIteratorPrototype); var Gp = GeneratorFunctionPrototype.prototype = Generator.prototype = Object.create(IteratorPrototype); function defineIteratorMethods(prototype) { ["next", "throw", "return"].forEach(function (method) { define(prototype, method, function (arg) { return this._invoke(method, arg); }); }); } function AsyncIterator(generator, PromiseImpl) { function invoke(method, arg, resolve, reject) { var record = tryCatch(generator[method], generator, arg); if ("throw" !== record.type) { var result = record.arg, value = result.value; return value && "object" == _typeof(value) && hasOwn.call(value, "__await") ? PromiseImpl.resolve(value.__await).then(function (value) { invoke("next", value, resolve, reject); }, function (err) { invoke("throw", err, resolve, reject); }) : PromiseImpl.resolve(value).then(function (unwrapped) { result.value = unwrapped, resolve(result); }, function (error) { return invoke("throw", error, resolve, reject); }); } reject(record.arg); } var previousPromise; defineProperty(this, "_invoke", { value: function value(method, arg) { function callInvokeWithMethodAndArg() { return new PromiseImpl(function (resolve, reject) { invoke(method, arg, resolve, reject); }); } return previousPromise = previousPromise ? previousPromise.then(callInvokeWithMethodAndArg, callInvokeWithMethodAndArg) : callInvokeWithMethodAndArg(); } }); } function makeInvokeMethod(innerFn, self, context) { var state = "suspendedStart"; return function (method, arg) { if ("executing" === state) throw new Error("Generator is already running"); if ("completed" === state) { if ("throw" === method) throw arg; return doneResult(); } for (context.method = method, context.arg = arg;;) { var delegate = context.delegate; if (delegate) { var delegateResult = maybeInvokeDelegate(delegate, context); if (delegateResult) { if (delegateResult === ContinueSentinel) continue; return delegateResult; } } if ("next" === context.method) context.sent = context._sent = context.arg;else if ("throw" === context.method) { if ("suspendedStart" === state) throw state = "completed", context.arg; context.dispatchException(context.arg); } else "return" === context.method && context.abrupt("return", context.arg); state = "executing"; var record = tryCatch(innerFn, self, context); if ("normal" === record.type) { if (state = context.done ? "completed" : "suspendedYield", record.arg === ContinueSentinel) continue; return { value: record.arg, done: context.done }; } "throw" === record.type && (state = "completed", context.method = "throw", context.arg = record.arg); } }; } function maybeInvokeDelegate(delegate, context) { var methodName = context.method, method = delegate.iterator[methodName]; if (undefined === method) return context.delegate = null, "throw" === methodName && delegate.iterator["return"] && (context.method = "return", context.arg = undefined, maybeInvokeDelegate(delegate, context), "throw" === context.method) || "return" !== methodName && (context.method = "throw", context.arg = new TypeError("The iterator does not provide a '" + methodName + "' method")), ContinueSentinel; var record = tryCatch(method, delegate.iterator, context.arg); if ("throw" === record.type) return context.method = "throw", context.arg = record.arg, context.delegate = null, ContinueSentinel; var info = record.arg; return info ? info.done ? (context[delegate.resultName] = info.value, context.next = delegate.nextLoc, "return" !== context.method && (context.method = "next", context.arg = undefined), context.delegate = null, ContinueSentinel) : info : (context.method = "throw", context.arg = new TypeError("iterator result is not an object"), context.delegate = null, ContinueSentinel); } function pushTryEntry(locs) { var entry = { tryLoc: locs[0] }; 1 in locs && (entry.catchLoc = locs[1]), 2 in locs && (entry.finallyLoc = locs[2], entry.afterLoc = locs[3]), this.tryEntries.push(entry); } function resetTryEntry(entry) { var record = entry.completion || {}; record.type = "normal", delete record.arg, entry.completion = record; } function Context(tryLocsList) { this.tryEntries = [{ tryLoc: "root" }], tryLocsList.forEach(pushTryEntry, this), this.reset(!0); } function values(iterable) { if (iterable) { var iteratorMethod = iterable[iteratorSymbol]; if (iteratorMethod) return iteratorMethod.call(iterable); if ("function" == typeof iterable.next) return iterable; if (!isNaN(iterable.length)) { var i = -1, next = function next() { for (; ++i < iterable.length;) if (hasOwn.call(iterable, i)) return next.value = iterable[i], next.done = !1, next; return next.value = undefined, next.done = !0, next; }; return next.next = next; } } return { next: doneResult }; } function doneResult() { return { value: undefined, done: !0 }; } return GeneratorFunction.prototype = GeneratorFunctionPrototype, defineProperty(Gp, "constructor", { value: GeneratorFunctionPrototype, configurable: !0 }), defineProperty(GeneratorFunctionPrototype, "constructor", { value: GeneratorFunction, configurable: !0 }), GeneratorFunction.displayName = define(GeneratorFunctionPrototype, toStringTagSymbol, "GeneratorFunction"), exports.isGeneratorFunction = function (genFun) { var ctor = "function" == typeof genFun && genFun.constructor; return !!ctor && (ctor === GeneratorFunction || "GeneratorFunction" === (ctor.displayName || ctor.name)); }, exports.mark = function (genFun) { return Object.setPrototypeOf ? Object.setPrototypeOf(genFun, GeneratorFunctionPrototype) : (genFun.__proto__ = GeneratorFunctionPrototype, define(genFun, toStringTagSymbol, "GeneratorFunction")), genFun.prototype = Object.create(Gp), genFun; }, exports.awrap = function (arg) { return { __await: arg }; }, defineIteratorMethods(AsyncIterator.prototype), define(AsyncIterator.prototype, asyncIteratorSymbol, function () { return this; }), exports.AsyncIterator = AsyncIterator, exports.async = function (innerFn, outerFn, self, tryLocsList, PromiseImpl) { void 0 === PromiseImpl && (PromiseImpl = Promise); var iter = new AsyncIterator(wrap(innerFn, outerFn, self, tryLocsList), PromiseImpl); return exports.isGeneratorFunction(outerFn) ? iter : iter.next().then(function (result) { return result.done ? result.value : iter.next(); }); }, defineIteratorMethods(Gp), define(Gp, toStringTagSymbol, "Generator"), define(Gp, iteratorSymbol, function () { return this; }), define(Gp, "toString", function () { return "[object Generator]"; }), exports.keys = function (val) { var object = Object(val), keys = []; for (var key in object) keys.push(key); return keys.reverse(), function next() { for (; keys.length;) { var key = keys.pop(); if (key in object) return next.value = key, next.done = !1, next; } return next.done = !0, next; }; }, exports.values = values, Context.prototype = { constructor: Context, reset: function reset(skipTempReset) { if (this.prev = 0, this.next = 0, this.sent = this._sent = undefined, this.done = !1, this.delegate = null, this.method = "next", this.arg = undefined, this.tryEntries.forEach(resetTryEntry), !skipTempReset) for (var name in this) "t" === name.charAt(0) && hasOwn.call(this, name) && !isNaN(+name.slice(1)) && (this[name] = undefined); }, stop: function stop() { this.done = !0; var rootRecord = this.tryEntries[0].completion; if ("throw" === rootRecord.type) throw rootRecord.arg; return this.rval; }, dispatchException: function dispatchException(exception) { if (this.done) throw exception; var context = this; function handle(loc, caught) { return record.type = "throw", record.arg = exception, context.next = loc, caught && (context.method = "next", context.arg = undefined), !!caught; } for (var i = this.tryEntries.length - 1; i >= 0; --i) { var entry = this.tryEntries[i], record = entry.completion; if ("root" === entry.tryLoc) return handle("end"); if (entry.tryLoc <= this.prev) { var hasCatch = hasOwn.call(entry, "catchLoc"), hasFinally = hasOwn.call(entry, "finallyLoc"); if (hasCatch && hasFinally) { if (this.prev < entry.catchLoc) return handle(entry.catchLoc, !0); if (this.prev < entry.finallyLoc) return handle(entry.finallyLoc); } else if (hasCatch) { if (this.prev < entry.catchLoc) return handle(entry.catchLoc, !0); } else { if (!hasFinally) throw new Error("try statement without catch or finally"); if (this.prev < entry.finallyLoc) return handle(entry.finallyLoc); } } } }, abrupt: function abrupt(type, arg) { for (var i = this.tryEntries.length - 1; i >= 0; --i) { var entry = this.tryEntries[i]; if (entry.tryLoc <= this.prev && hasOwn.call(entry, "finallyLoc") && this.prev < entry.finallyLoc) { var finallyEntry = entry; break; } } finallyEntry && ("break" === type || "continue" === type) && finallyEntry.tryLoc <= arg && arg <= finallyEntry.finallyLoc && (finallyEntry = null); var record = finallyEntry ? finallyEntry.completion : {}; return record.type = type, record.arg = arg, finallyEntry ? (this.method = "next", this.next = finallyEntry.finallyLoc, ContinueSentinel) : this.complete(record); }, complete: function complete(record, afterLoc) { if ("throw" === record.type) throw record.arg; return "break" === record.type || "continue" === record.type ? this.next = record.arg : "return" === record.type ? (this.rval = this.arg = record.arg, this.method = "return", this.next = "end") : "normal" === record.type && afterLoc && (this.next = afterLoc), ContinueSentinel; }, finish: function finish(finallyLoc) { for (var i = this.tryEntries.length - 1; i >= 0; --i) { var entry = this.tryEntries[i]; if (entry.finallyLoc === finallyLoc) return this.complete(entry.completion, entry.afterLoc), resetTryEntry(entry), ContinueSentinel; } }, "catch": function _catch(tryLoc) { for (var i = this.tryEntries.length - 1; i >= 0; --i) { var entry = this.tryEntries[i]; if (entry.tryLoc === tryLoc) { var record = entry.completion; if ("throw" === record.type) { var thrown = record.arg; resetTryEntry(entry); } return thrown; } } throw new Error("illegal catch attempt"); }, delegateYield: function delegateYield(iterable, resultName, nextLoc) { return this.delegate = { iterator: values(iterable), resultName: resultName, nextLoc: nextLoc }, "next" === this.method && (this.arg = undefined), ContinueSentinel; } }, exports; }
function asyncGeneratorStep(gen, resolve, reject, _next, _throw, key, arg) { try { var info = gen[key](arg); var value = info.value; } catch (error) { reject(error); return; } if (info.done) { resolve(value); } else { Promise.resolve(value).then(_next, _throw); } }
function _asyncToGenerator(fn) { return function () { var self = this, args = arguments; return new Promise(function (resolve, reject) { var gen = fn.apply(self, args); function _next(value) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "next", value); } function _throw(err) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "throw", err); } _next(undefined); }); }; }

// import VueCookies from 'vue-cookies';

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  __name: 'Signup',
  setup: function setup(__props) {
    var _this = this;
    var form = (0,vue__WEBPACK_IMPORTED_MODULE_0__.reactive)({
      first_name: '',
      last_name: '',
      gender: 'Select your gender',
      date_birth: '',
      phone: '',
      country_code: '',
      password: ''
    });
    var errors = (0,vue__WEBPACK_IMPORTED_MODULE_0__.ref)('');
    var login = /*#__PURE__*/function () {
      var _ref = _asyncToGenerator( /*#__PURE__*/_regeneratorRuntime().mark(function _callee() {
        return _regeneratorRuntime().wrap(function _callee$(_context) {
          while (1) switch (_context.prev = _context.next) {
            case 0:
              axios.post('/api/user/auth/signup', form).then(function (response) {
                if (response.data.success) {
                  var token = response.data.data.token;
                  $cookies.set('XSRF_TOKEN', token);
                  _this.$router.push('Home');
                } else if (errors.value) {
                  errors.value = response.data.data;
                } else {
                  errors.value = {};
                }
              })["catch"](function (error) {
                console.log(errors);
                if (error.response.status === 402) {
                  var Toast = Vue.swal.mixin({
                    toast: true,
                    position: 'bottom-end',
                    showConfirmButton: false,
                    timer: 5000,
                    timerProgressBar: true,
                    didOpen: function didOpen(toast) {
                      toast.addEventListener('mouseenter', Vue.swal.stopTimer);
                      toast.addEventListener('mouseleave', Vue.swal.resumeTimer);
                    }
                  });
                  Toast.fire({
                    icon: 'error',
                    title: 'Phone number or password incorrect'
                  });
                }
              });
            case 1:
            case "end":
              return _context.stop();
          }
        }, _callee);
      }));
      return function login() {
        return _ref.apply(this, arguments);
      };
    }();
    return {
      __sfc: true,
      form: form,
      errors: errors,
      login: login
    };
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/lib/loaders/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/auth/Signup.vue?vue&type=template&id=41792d26&":
/*!************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/lib/loaders/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/auth/Signup.vue?vue&type=template&id=41792d26& ***!
  \************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render),
/* harmony export */   "staticRenderFns": () => (/* binding */ staticRenderFns)
/* harmony export */ });
var render = function render() {
  var _vm = this,
    _c = _vm._self._c,
    _setup = _vm._self._setupProxy;
  return _c("section", {
    staticClass: "vh-100",
    staticStyle: {
      "background-color": "rgb(245, 245, 245)"
    }
  }, [_c("div", {
    staticClass: "container h-100"
  }, [_c("div", {
    staticClass: "row d-flex justify-content-center align-items-center h-100"
  }, [_c("div", {
    staticClass: "col-lg-12 col-xl-5"
  }, [_c("div", {
    staticClass: "card text-black m-auto",
    staticStyle: {
      "border-radius": "24px",
      width: "456px"
    }
  }, [_c("div", {
    staticClass: "card-body py-5"
  }, [_c("div", {
    staticClass: "row justify-content-center"
  }, [_c("div", {
    staticClass: "col-md-10 col-lg-6 col-xl-12 order-2 order-lg-1"
  }, [_vm._m(0), _vm._v(" "), _c("form", {
    staticClass: "mx-1",
    on: {
      submit: function submit($event) {
        $event.preventDefault();
        return _setup.login.apply(null, arguments);
      }
    }
  }, [_c("div", {
    staticClass: "d-flex flex-row align-items-center mb-3"
  }, [_c("div", {
    staticClass: "form-outline flex-fill me-1"
  }, [_c("input", {
    directives: [{
      name: "model",
      rawName: "v-model",
      value: _setup.form.first_name,
      expression: "form.first_name"
    }],
    staticClass: "form-control form-control-lg",
    attrs: {
      type: "text",
      placeholder: "First name",
      id: "first_name"
    },
    domProps: {
      value: _setup.form.first_name
    },
    on: {
      input: function input($event) {
        if ($event.target.composing) return;
        _vm.$set(_setup.form, "first_name", $event.target.value);
      }
    }
  }), _vm._v(" "), _setup.errors.first_name ? _c("span", {
    staticClass: "text-danger"
  }, [_vm._v(_vm._s(_setup.errors.first_name[0]))]) : _vm._e()]), _vm._v(" "), _c("div", {
    staticClass: "form-outline flex-fill ms-1"
  }, [_c("input", {
    directives: [{
      name: "model",
      rawName: "v-model",
      value: _setup.form.last_name,
      expression: "form.last_name"
    }],
    staticClass: "form-control form-control-lg",
    attrs: {
      type: "text",
      placeholder: "Last name?",
      id: "last_name"
    },
    domProps: {
      value: _setup.form.last_name
    },
    on: {
      input: function input($event) {
        if ($event.target.composing) return;
        _vm.$set(_setup.form, "last_name", $event.target.value);
      }
    }
  }), _vm._v(" "), _setup.errors.last_name ? _c("span", {
    staticClass: "text-danger"
  }, [_vm._v(_vm._s(_setup.errors.last_name[0]))]) : _vm._e()])]), _vm._v(" "), _c("div", {
    staticClass: "d-flex flex-row align-items-center mb-3"
  }, [_c("div", {
    staticClass: "form-outline flex-fill me-1 col-9"
  }, [_c("input", {
    directives: [{
      name: "model",
      rawName: "v-model",
      value: _setup.form.phone,
      expression: "form.phone"
    }],
    staticClass: "form-control form-control-lg",
    attrs: {
      type: "text",
      placeholder: "Enter phone",
      id: "phone"
    },
    domProps: {
      value: _setup.form.phone
    },
    on: {
      input: function input($event) {
        if ($event.target.composing) return;
        _vm.$set(_setup.form, "phone", $event.target.value);
      }
    }
  }), _vm._v(" "), _setup.errors.phone ? _c("span", {
    staticClass: "text-danger"
  }, [_vm._v("\n                        " + _vm._s(_setup.errors.phone[0]) + "\n                      ")]) : _vm._e()]), _vm._v(" "), _c("div", {
    staticClass: "form-outline flex-fill ms-1 mb-0 col-3"
  }, [_c("input", {
    directives: [{
      name: "model",
      rawName: "v-model",
      value: _setup.form.country_code,
      expression: "form.country_code"
    }],
    staticClass: "form-control form-control-lg",
    attrs: {
      type: "text",
      placeholder: "Postal code",
      id: "postal_code"
    },
    domProps: {
      value: _setup.form.country_code
    },
    on: {
      input: function input($event) {
        if ($event.target.composing) return;
        _vm.$set(_setup.form, "country_code", $event.target.value);
      }
    }
  }), _vm._v(" "), _setup.errors.country_code ? _c("span", {
    staticClass: "text-danger"
  }, [_vm._v("\n                        " + _vm._s(_setup.errors.country_code[0]) + "\n                      ")]) : _vm._e()])]), _vm._v(" "), _c("div", {
    staticClass: "d-flex flex-row align-items-center mb-3"
  }, [_c("div", {
    staticClass: "form-outline flex-fill mb-0"
  }, [_c("select", {
    directives: [{
      name: "model",
      rawName: "v-model",
      value: _setup.form.gender,
      expression: "form.gender"
    }],
    staticClass: "form-select form-control-lg",
    on: {
      change: function change($event) {
        var $$selectedVal = Array.prototype.filter.call($event.target.options, function (o) {
          return o.selected;
        }).map(function (o) {
          var val = "_value" in o ? o._value : o.value;
          return val;
        });
        _vm.$set(_setup.form, "gender", $event.target.multiple ? $$selectedVal : $$selectedVal[0]);
      }
    }
  }, [_c("option", {
    attrs: {
      value: "male"
    }
  }, [_vm._v("Male")]), _vm._v(" "), _c("option", {
    attrs: {
      value: "female"
    }
  }, [_vm._v("Female")])]), _vm._v(" "), _setup.errors.gender ? _c("span", {
    staticClass: "text-danger"
  }, [_vm._v(_vm._s(_setup.errors.gender[0]))]) : _vm._e()])]), _vm._v(" "), _c("div", {
    staticClass: "d-flex flex-row align-items-center mb-3"
  }, [_c("div", {
    staticClass: "form-outline flex-fill mb-0"
  }, [_c("input", {
    directives: [{
      name: "model",
      rawName: "v-model",
      value: _setup.form.date_birth,
      expression: "form.date_birth"
    }],
    staticClass: "form-control form-control-lg",
    attrs: {
      type: "date",
      placeholder: "Date of birth",
      id: "date_birth"
    },
    domProps: {
      value: _setup.form.date_birth
    },
    on: {
      input: function input($event) {
        if ($event.target.composing) return;
        _vm.$set(_setup.form, "date_birth", $event.target.value);
      }
    }
  }), _vm._v(" "), _setup.errors.date_birth ? _c("span", {
    staticClass: "text-danger"
  }, [_vm._v(_vm._s(_setup.errors.date_birth[0]))]) : _vm._e()])]), _vm._v(" "), _c("div", {
    staticClass: "d-flex flex-row align-items-center mb-3"
  }, [_c("div", {
    staticClass: "form-outline flex-fill mb-0"
  }, [_c("input", {
    directives: [{
      name: "model",
      rawName: "v-model",
      value: _setup.form.password,
      expression: "form.password"
    }],
    staticClass: "form-control form-control-lg",
    attrs: {
      type: "password",
      placeholder: "Enter password",
      id: "password"
    },
    domProps: {
      value: _setup.form.password
    },
    on: {
      input: function input($event) {
        if ($event.target.composing) return;
        _vm.$set(_setup.form, "password", $event.target.value);
      }
    }
  }), _vm._v(" "), _setup.errors.password ? _c("span", {
    staticClass: "text-danger"
  }, [_vm._v(_vm._s(_setup.errors.password[0]))]) : _vm._e()])]), _vm._v(" "), _vm._m(1), _vm._v(" "), _vm._m(2), _vm._v(" "), _c("div", {
    staticClass: "sc-dwsnSq dovPMe",
    attrs: {
      "data-automation": "already-member"
    }
  }, [_vm._v("Already a member?")])])])])])])])])])]);
};
var staticRenderFns = [function () {
  var _vm = this,
    _c = _vm._self._c,
    _setup = _vm._self._setupProxy;
  return _c("div", {
    staticClass: "d-flex flex-column text-center"
  }, [_c("p", {
    staticClass: "title text-center h2 fw-bold mb-2 mx-1 mx-md-4"
  }, [_vm._v("\n                    Sign Up to Ondemium\n                  ")]), _vm._v(" "), _c("div", {
    staticClass: "sub-title"
  }, [_vm._v("\n                    dasdsada\n                  ")])]);
}, function () {
  var _vm = this,
    _c = _vm._self._c,
    _setup = _vm._self._setupProxy;
  return _c("div", {
    staticClass: "d-flex justify-content-center"
  }, [_c("button", {
    staticClass: "btn bUezPs",
    attrs: {
      type: "submit"
    }
  }, [_vm._v("Continue")])]);
}, function () {
  var _vm = this,
    _c = _vm._self._c,
    _setup = _vm._self._setupProxy;
  return _c("div", {
    staticClass: "hint"
  }, [_vm._v("\n                By joining and creating an account, you agree to BlockSite collecting information about your use of the product in order to improve and personalize our service, and using personal information you provide solely for customer support purposes, all according to our \n                "), _c("a", {
    attrs: {
      href: "/privacy",
      target: "_blank"
    }
  }, [_vm._v("Privacy Policy")]), _vm._v(" and "), _c("a", {
    staticClass: "sc-kTLmzF gPVaEe",
    attrs: {
      href: "/terms",
      target: "_blank"
    }
  }, [_vm._v("\n                Terms of Use")]), _vm._v(".")]);
}];
render._withStripped = true;


/***/ }),

/***/ "./node_modules/laravel-mix/node_modules/css-loader/dist/cjs.js??clonedRuleSet-13.use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-13.use[2]!./node_modules/sass-loader/dist/cjs.js??clonedRuleSet-13.use[3]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/auth/Signup.vue?vue&type=style&index=0&id=41792d26&lang=scss&":
/*!*****************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/laravel-mix/node_modules/css-loader/dist/cjs.js??clonedRuleSet-13.use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-13.use[2]!./node_modules/sass-loader/dist/cjs.js??clonedRuleSet-13.use[3]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/auth/Signup.vue?vue&type=style&index=0&id=41792d26&lang=scss& ***!
  \*****************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_laravel_mix_node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../../node_modules/laravel-mix/node_modules/css-loader/dist/runtime/api.js */ "./node_modules/laravel-mix/node_modules/css-loader/dist/runtime/api.js");
/* harmony import */ var _node_modules_laravel_mix_node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_laravel_mix_node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0__);
// Imports

var ___CSS_LOADER_EXPORT___ = _node_modules_laravel_mix_node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0___default()(function(i){return i[1]});
// Module
___CSS_LOADER_EXPORT___.push([module.id, ".avatar {\n  width: 100px;\n  height: 100px;\n  background: #bdbdbd;\n  margin: auto;\n  margin: 20px auto;\n  margin-top: 0;\n  border-radius: 50%;\n  display: flex;\n  align-items: center;\n  justify-content: center;\n  font-size: 3rem;\n}\n.card {\n  box-shadow: rgba(96, 97, 112, 0.16) 0px 4px 8px 0px, rgba(40, 41, 61, 0.04) 0px 0px 2px 0px;\n}\n.subTitle {\n  font-size: 14px;\n  font-weight: 500;\n  color: rgb(166, 166, 166);\n  margin-bottom: 12px;\n}\n.rEpxu {\n  display: flex;\n  flex-direction: row;\n  justify-content: space-between;\n  align-items: center;\n  margin-top: 12px;\n  width: 100%;\n  height: 40px;\n  border-radius: 8px;\n  background-color: rgb(242, 242, 242);\n  cursor: pointer;\n  padding: 15px;\n  box-sizing: border-box;\n  border: 1px solid rgb(245, 245, 245);\n  transition: background-color 0.3s linear 0s;\n}\n.rEpxu .koIxbT {\n  width: 23px;\n  height: 23px;\n}\n.rEpxu .dlobOK {\n  font-size: 14px;\n  font-weight: bold;\n  color: rgb(115, 115, 115);\n}\n.hnonof {\n  font-size: 14px;\n  font-weight: 500;\n  color: rgb(166, 173, 201);\n  text-align: center;\n  margin: 16px 0px;\n}\n.bUezPs {\n  display: flex;\n  justify-content: center;\n  align-items: center;\n  background-color: rgb(60, 193, 150);\n  border-radius: 8px;\n  padding: 8px 24px;\n  font-weight: bold;\n  font-size: 14px;\n  line-height: 16px;\n  min-height: 40px;\n  width: 100%;\n  color: rgb(255, 255, 255);\n  cursor: pointer;\n  box-sizing: border-box;\n  text-align: center;\n  transition: background-color 0.3s linear 0s;\n}\n.bzbroT {\n  display: flex;\n  flex-flow: row wrap;\n  width: 100%;\n  justify-content: center;\n  -moz-column-gap: 12px;\n       column-gap: 12px;\n}\n.dkudpE {\n  font-size: 14px;\n  font-weight: 500;\n  color: rgb(33, 33, 33);\n  align-self: flex-start;\n  margin-top: 24px;\n  cursor: pointer;\n  text-decoration: underline;\n}\n.hint {\n  font-size: 11px;\n  color: rgb(166, 166, 166);\n  margin-top: 24px;\n}\n.hint a {\n  font-size: 11px;\n  font-weight: 500;\n  text-align: center;\n  color: rgb(33, 33, 33);\n  cursor: pointer;\n  text-decoration: underline;\n}\n.dovPMe {\n  font-size: 14px;\n  font-weight: 500;\n  text-align: center;\n  color: rgb(33, 33, 33);\n  text-decoration: underline;\n  margin-top: 24px;\n  cursor: pointer;\n}", ""]);
// Exports
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (___CSS_LOADER_EXPORT___);


/***/ }),

/***/ "./node_modules/style-loader/dist/cjs.js!./node_modules/laravel-mix/node_modules/css-loader/dist/cjs.js??clonedRuleSet-13.use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-13.use[2]!./node_modules/sass-loader/dist/cjs.js??clonedRuleSet-13.use[3]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/auth/Signup.vue?vue&type=style&index=0&id=41792d26&lang=scss&":
/*!*********************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader/dist/cjs.js!./node_modules/laravel-mix/node_modules/css-loader/dist/cjs.js??clonedRuleSet-13.use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-13.use[2]!./node_modules/sass-loader/dist/cjs.js??clonedRuleSet-13.use[3]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/auth/Signup.vue?vue&type=style&index=0&id=41792d26&lang=scss& ***!
  \*********************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! !../../../../node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js */ "./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js");
/* harmony import */ var _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _node_modules_laravel_mix_node_modules_css_loader_dist_cjs_js_clonedRuleSet_13_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_13_use_2_node_modules_sass_loader_dist_cjs_js_clonedRuleSet_13_use_3_node_modules_vue_loader_lib_index_js_vue_loader_options_Signup_vue_vue_type_style_index_0_id_41792d26_lang_scss___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! !!../../../../node_modules/laravel-mix/node_modules/css-loader/dist/cjs.js??clonedRuleSet-13.use[1]!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-13.use[2]!../../../../node_modules/sass-loader/dist/cjs.js??clonedRuleSet-13.use[3]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./Signup.vue?vue&type=style&index=0&id=41792d26&lang=scss& */ "./node_modules/laravel-mix/node_modules/css-loader/dist/cjs.js??clonedRuleSet-13.use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-13.use[2]!./node_modules/sass-loader/dist/cjs.js??clonedRuleSet-13.use[3]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/auth/Signup.vue?vue&type=style&index=0&id=41792d26&lang=scss&");

            

var options = {};

options.insert = "head";
options.singleton = false;

var update = _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0___default()(_node_modules_laravel_mix_node_modules_css_loader_dist_cjs_js_clonedRuleSet_13_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_13_use_2_node_modules_sass_loader_dist_cjs_js_clonedRuleSet_13_use_3_node_modules_vue_loader_lib_index_js_vue_loader_options_Signup_vue_vue_type_style_index_0_id_41792d26_lang_scss___WEBPACK_IMPORTED_MODULE_1__["default"], options);



/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_laravel_mix_node_modules_css_loader_dist_cjs_js_clonedRuleSet_13_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_13_use_2_node_modules_sass_loader_dist_cjs_js_clonedRuleSet_13_use_3_node_modules_vue_loader_lib_index_js_vue_loader_options_Signup_vue_vue_type_style_index_0_id_41792d26_lang_scss___WEBPACK_IMPORTED_MODULE_1__["default"].locals || {});

/***/ }),

/***/ "./resources/js/pages/auth/Signup.vue":
/*!********************************************!*\
  !*** ./resources/js/pages/auth/Signup.vue ***!
  \********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _Signup_vue_vue_type_template_id_41792d26___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Signup.vue?vue&type=template&id=41792d26& */ "./resources/js/pages/auth/Signup.vue?vue&type=template&id=41792d26&");
/* harmony import */ var _Signup_vue_vue_type_script_setup_true_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Signup.vue?vue&type=script&setup=true&lang=js& */ "./resources/js/pages/auth/Signup.vue?vue&type=script&setup=true&lang=js&");
/* harmony import */ var _Signup_vue_vue_type_style_index_0_id_41792d26_lang_scss___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./Signup.vue?vue&type=style&index=0&id=41792d26&lang=scss& */ "./resources/js/pages/auth/Signup.vue?vue&type=style&index=0&id=41792d26&lang=scss&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! !../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");



;


/* normalize component */

var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _Signup_vue_vue_type_script_setup_true_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Signup_vue_vue_type_template_id_41792d26___WEBPACK_IMPORTED_MODULE_0__.render,
  _Signup_vue_vue_type_template_id_41792d26___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/pages/auth/Signup.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/pages/auth/Signup.vue?vue&type=script&setup=true&lang=js&":
/*!********************************************************************************!*\
  !*** ./resources/js/pages/auth/Signup.vue?vue&type=script&setup=true&lang=js& ***!
  \********************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Signup_vue_vue_type_script_setup_true_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./Signup.vue?vue&type=script&setup=true&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/auth/Signup.vue?vue&type=script&setup=true&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Signup_vue_vue_type_script_setup_true_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/pages/auth/Signup.vue?vue&type=template&id=41792d26&":
/*!***************************************************************************!*\
  !*** ./resources/js/pages/auth/Signup.vue?vue&type=template&id=41792d26& ***!
  \***************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_lib_loaders_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_lib_index_js_vue_loader_options_Signup_vue_vue_type_template_id_41792d26___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_lib_loaders_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_lib_index_js_vue_loader_options_Signup_vue_vue_type_template_id_41792d26___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_lib_loaders_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_lib_index_js_vue_loader_options_Signup_vue_vue_type_template_id_41792d26___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??ruleSet[1].rules[2]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./Signup.vue?vue&type=template&id=41792d26& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/lib/loaders/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/auth/Signup.vue?vue&type=template&id=41792d26&");


/***/ }),

/***/ "./resources/js/pages/auth/Signup.vue?vue&type=style&index=0&id=41792d26&lang=scss&":
/*!******************************************************************************************!*\
  !*** ./resources/js/pages/auth/Signup.vue?vue&type=style&index=0&id=41792d26&lang=scss& ***!
  \******************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_laravel_mix_node_modules_css_loader_dist_cjs_js_clonedRuleSet_13_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_13_use_2_node_modules_sass_loader_dist_cjs_js_clonedRuleSet_13_use_3_node_modules_vue_loader_lib_index_js_vue_loader_options_Signup_vue_vue_type_style_index_0_id_41792d26_lang_scss___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/style-loader/dist/cjs.js!../../../../node_modules/laravel-mix/node_modules/css-loader/dist/cjs.js??clonedRuleSet-13.use[1]!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-13.use[2]!../../../../node_modules/sass-loader/dist/cjs.js??clonedRuleSet-13.use[3]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./Signup.vue?vue&type=style&index=0&id=41792d26&lang=scss& */ "./node_modules/style-loader/dist/cjs.js!./node_modules/laravel-mix/node_modules/css-loader/dist/cjs.js??clonedRuleSet-13.use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-13.use[2]!./node_modules/sass-loader/dist/cjs.js??clonedRuleSet-13.use[3]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/auth/Signup.vue?vue&type=style&index=0&id=41792d26&lang=scss&");


/***/ })

}]);