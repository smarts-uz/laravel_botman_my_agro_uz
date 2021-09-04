! function(t) {
    function e(r) {
        if (n[r]) return n[r].exports;
        var o = n[r] = {
            i: r,
            l: !1,
            exports: {}
        };
        return t[r].call(o.exports, o, o.exports, e), o.l = !0, o.exports
    }
    var n = {};
    e.m = t, e.c = n, e.d = function(t, n, r) {
        e.o(t, n) || Object.defineProperty(t, n, {
            configurable: !1,
            enumerable: !0,
            get: r
        })
    }, e.n = function(t) {
        var n = t && t.__esModule ? function() {
            return t.default
        } : function() {
            return t
        };
        return e.d(n, "a", n), n
    }, e.o = function(t, e) {
        return Object.prototype.hasOwnProperty.call(t, e)
    }, e.p = "/", e(e.s = 38)
}([function(t, e, n) {
    "use strict";

    function r(t) {
        return "[object Array]" === C.call(t)
    }

    function o(t) {
        return "[object ArrayBuffer]" === C.call(t)
    }

    function i(t) {
        return "undefined" != typeof FormData && t instanceof FormData
    }

    function a(t) {
        return "undefined" != typeof ArrayBuffer && ArrayBuffer.isView ? ArrayBuffer.isView(t) : t && t.buffer && t.buffer instanceof ArrayBuffer
    }

    function s(t) {
        return "string" == typeof t
    }

    function c(t) {
        return "number" == typeof t
    }

    function u(t) {
        return void 0 === t
    }

    function p(t) {
        return null !== t && "object" == typeof t
    }

    function l(t) {
        return "[object Date]" === C.call(t)
    }

    function f(t) {
        return "[object File]" === C.call(t)
    }

    function d(t) {
        return "[object Blob]" === C.call(t)
    }

    function h(t) {
        return "[object Function]" === C.call(t)
    }

    function m(t) {
        return p(t) && h(t.pipe)
    }

    function y(t) {
        return "undefined" != typeof URLSearchParams && t instanceof URLSearchParams
    }

    function v(t) {
        return t.replace(/^\s*/, "").replace(/\s*$/, "")
    }

    function b() {
        return ("undefined" == typeof navigator || "ReactNative" !== navigator.product) && ("undefined" != typeof window && "undefined" != typeof document)
    }

    function g(t, e) {
        if (null !== t && void 0 !== t)
            if ("object" != typeof t && (t = [t]), r(t))
                for (var n = 0, o = t.length; o > n; n++) e.call(null, t[n], n, t);
            else
                for (var i in t) Object.prototype.hasOwnProperty.call(t, i) && e.call(null, t[i], i, t)
    }

    function _() {
        function t(t, n) {
            e[n] = "object" == typeof e[n] && "object" == typeof t ? _(e[n], t) : t
        }
        for (var e = {}, n = 0, r = arguments.length; r > n; n++) g(arguments[n], t);
        return e
    }

    function x(t, e, n) {
        return g(e, function(e, r) {
            t[r] = n && "function" == typeof e ? w(e, n) : e
        }), t
    }
    var w = n(3),
        O = n(12),
        C = Object.prototype.toString;
    t.exports = {
        isArray: r,
        isArrayBuffer: o,
        isBuffer: O,
        isFormData: i,
        isArrayBufferView: a,
        isString: s,
        isNumber: c,
        isObject: p,
        isUndefined: u,
        isDate: l,
        isFile: f,
        isBlob: d,
        isFunction: h,
        isStream: m,
        isURLSearchParams: y,
        isStandardBrowserEnv: b,
        forEach: g,
        merge: _,
        extend: x,
        trim: v
    }
}, function(t, e, n) {
    "use strict";

    function r() {}

    function o(t, e) {
        var n, o, i, a, s = D;
        for (a = arguments.length; a-- > 2;) k.push(arguments[a]);
        for (e && null != e.children && (k.length || k.push(e.children), delete e.children); k.length;)
            if ((o = k.pop()) && void 0 !== o.pop)
                for (a = o.length; a--;) k.push(o[a]);
            else "boolean" == typeof o && (o = null), (i = "function" != typeof t) && (null == o ? o = "" : "number" == typeof o ? o += "" : "string" != typeof o && (i = !1)), i && n ? s[s.length - 1] += o : s === D ? s = [o] : s.push(o), n = i;
        var c = new r;
        return c.nodeName = t, c.children = s, c.attributes = null == e ? void 0 : e, c.key = null == e ? void 0 : e.key, void 0 !== E.vnode && E.vnode(c), c
    }

    function i(t, e) {
        for (var n in e) t[n] = e[n];
        return t
    }

    function a(t) {
        !t._dirty && (t._dirty = !0) && 1 == H.push(t) && (E.debounceRendering || U)(s)
    }

    function s() {
        var t, e = H;
        for (H = []; t = e.pop();) t._dirty && M(t)
    }

    function c(t, e, n) {
        return "string" == typeof e || "number" == typeof e ? void 0 !== t.splitText : "string" == typeof e.nodeName ? !t._componentConstructor && u(t, e.nodeName) : n || t._componentConstructor === e.nodeName
    }

    function u(t, e) {
        return t.normalizedNodeName === e || t.nodeName.toLowerCase() === e.toLowerCase()
    }

    function p(t) {
        var e = i({}, t.attributes);
        e.children = t.children;
        var n = t.nodeName.defaultProps;
        if (void 0 !== n)
            for (var r in n) void 0 === e[r] && (e[r] = n[r]);
        return e
    }

    function l(t, e) {
        var n = e ? document.createElementNS("http://www.w3.org/2000/svg", t) : document.createElement(t);
        return n.normalizedNodeName = t, n
    }

    function f(t) {
        var e = t.parentNode;
        e && e.removeChild(t)
    }

    function d(t, e, n, r, o) {
        if ("className" === e && (e = "class"), "key" === e);
        else if ("ref" === e) n && n(null), r && r(t);
        else if ("class" !== e || o)
            if ("style" === e) {
                if (r && "string" != typeof r && "string" != typeof n || (t.style.cssText = r || ""), r && "object" == typeof r) {
                    if ("string" != typeof n)
                        for (var i in n) i in r || (t.style[i] = "");
                    for (var i in r) t.style[i] = "number" == typeof r[i] && !1 === B.test(i) ? r[i] + "px" : r[i]
                }
            } else if ("dangerouslySetInnerHTML" === e) r && (t.innerHTML = r.__html || "");
        else if ("o" == e[0] && "n" == e[1]) {
            var a = e !== (e = e.replace(/Capture$/, ""));
            e = e.toLowerCase().substring(2), r ? n || t.addEventListener(e, m, a) : t.removeEventListener(e, m, a), (t._listeners || (t._listeners = {}))[e] = r
        } else if ("list" !== e && "type" !== e && !o && e in t) h(t, e, null == r ? "" : r), null != r && !1 !== r || t.removeAttribute(e);
        else {
            var s = o && e !== (e = e.replace(/^xlink\:?/, ""));
            null == r || !1 === r ? s ? t.removeAttributeNS("http://www.w3.org/1999/xlink", e.toLowerCase()) : t.removeAttribute(e) : "function" != typeof r && (s ? t.setAttributeNS("http://www.w3.org/1999/xlink", e.toLowerCase(), r) : t.setAttribute(e, r))
        } else t.className = r || ""
    }

    function h(t, e, n) {
        try {
            t[e] = n
        } catch (t) {}
    }

    function m(t) {
        return this._listeners[t.type](E.event && E.event(t) || t)
    }

    function y() {
        for (var t; t = R.pop();) E.afterMount && E.afterMount(t), t.componentDidMount && t.componentDidMount()
    }

    function v(t, e, n, r, o, i) {
        L++ || (q = null != o && void 0 !== o.ownerSVGElement, I = null != t && !("__preactattr_" in t));
        var a = b(t, e, n, r, i);
        return o && a.parentNode !== o && o.appendChild(a), --L || (I = !1, i || y()), a
    }

    function b(t, e, n, r, o) {
        var i = t,
            a = q;
        if (null != e && "boolean" != typeof e || (e = ""), "string" == typeof e || "number" == typeof e) return t && void 0 !== t.splitText && t.parentNode && (!t._component || o) ? t.nodeValue != e && (t.nodeValue = e) : (i = document.createTextNode(e), t && (t.parentNode && t.parentNode.replaceChild(i, t), _(t, !0))), i.__preactattr_ = !0, i;
        var s = e.nodeName;
        if ("function" == typeof s) return N(t, e, n, r);
        if (q = "svg" === s || "foreignObject" !== s && q, s += "", (!t || !u(t, s)) && (i = l(s, q), t)) {
            for (; t.firstChild;) i.appendChild(t.firstChild);
            t.parentNode && t.parentNode.replaceChild(i, t), _(t, !0)
        }
        var c = i.firstChild,
            p = i.__preactattr_,
            f = e.children;
        if (null == p) {
            p = i.__preactattr_ = {};
            for (var d = i.attributes, h = d.length; h--;) p[d[h].name] = d[h].value
        }
        return !I && f && 1 === f.length && "string" == typeof f[0] && null != c && void 0 !== c.splitText && null == c.nextSibling ? c.nodeValue != f[0] && (c.nodeValue = f[0]) : (f && f.length || null != c) && g(i, f, n, r, I || null != p.dangerouslySetInnerHTML), w(i, e.attributes, p), q = a, i
    }

    function g(t, e, n, r, o) {
        var i, a, s, u, p, l = t.childNodes,
            d = [],
            h = {},
            m = 0,
            y = 0,
            v = l.length,
            g = 0,
            x = e ? e.length : 0;
        if (0 !== v)
            for (var w = 0; v > w; w++) {
                var O = l[w],
                    C = O.__preactattr_,
                    T = x && C ? O._component ? O._component.__key : C.key : null;
                null != T ? (m++, h[T] = O) : (C || (void 0 !== O.splitText ? !o || O.nodeValue.trim() : o)) && (d[g++] = O)
            }
        if (0 !== x)
            for (var w = 0; x > w; w++) {
                u = e[w], p = null;
                var T = u.key;
                if (null != T) m && void 0 !== h[T] && (p = h[T], h[T] = void 0, m--);
                else if (!p && g > y)
                    for (i = y; g > i; i++)
                        if (void 0 !== d[i] && c(a = d[i], u, o)) {
                            p = a, d[i] = void 0, i === g - 1 && g--, i === y && y++;
                            break
                        } p = b(p, u, n, r), s = l[w], p && p !== t && p !== s && (null == s ? t.appendChild(p) : p === s.nextSibling ? f(s) : t.insertBefore(p, s))
            }
        if (m)
            for (var w in h) void 0 !== h[w] && _(h[w], !1);
        for (; g >= y;) void 0 !== (p = d[g--]) && _(p, !1)
    }

    function _(t, e) {
        var n = t._component;
        n ? S(n) : (null != t.__preactattr_ && t.__preactattr_.ref && t.__preactattr_.ref(null), !1 !== e && null != t.__preactattr_ || f(t), x(t))
    }

    function x(t) {
        for (t = t.lastChild; t;) {
            var e = t.previousSibling;
            _(t, !0), t = e
        }
    }

    function w(t, e, n) {
        var r;
        for (r in n) e && null != e[r] || null == n[r] || d(t, r, n[r], n[r] = void 0, q);
        for (r in e) "children" === r || "innerHTML" === r || r in n && e[r] === ("value" === r || "checked" === r ? t[r] : n[r]) || d(t, r, n[r], n[r] = e[r], q)
    }

    function O(t) {
        var e = t.constructor.name;
        (F[e] || (F[e] = [])).push(t)
    }

    function C(t, e, n) {
        var r, o = F[t.name];
        if (t.prototype && t.prototype.render ? (r = new t(e, n), A.call(r, e, n)) : (r = new A(e, n), r.constructor = t, r.render = T), o)
            for (var i = o.length; i--;)
                if (o[i].constructor === t) {
                    r.nextBase = o[i].nextBase, o.splice(i, 1);
                    break
                } return r
    }

    function T(t, e, n) {
        return this.constructor(t, n)
    }

    function j(t, e, n, r, o) {
        t._disable || (t._disable = !0, (t.__ref = e.ref) && delete e.ref, (t.__key = e.key) && delete e.key, !t.base || o ? t.componentWillMount && t.componentWillMount() : t.componentWillReceiveProps && t.componentWillReceiveProps(e, r), r && r !== t.context && (t.prevContext || (t.prevContext = t.context), t.context = r), t.prevProps || (t.prevProps = t.props), t.props = e, t._disable = !1, 0 !== n && (1 !== n && !1 === E.syncComponentUpdates && t.base ? a(t) : M(t, 1, o)), t.__ref && t.__ref(t))
    }

    function M(t, e, n, r) {
        if (!t._disable) {
            var o, a, s, c = t.props,
                u = t.state,
                l = t.context,
                f = t.prevProps || c,
                d = t.prevState || u,
                h = t.prevContext || l,
                m = t.base,
                b = t.nextBase,
                g = m || b,
                x = t._component,
                w = !1;
            if (m && (t.props = f, t.state = d, t.context = h, 2 !== e && t.shouldComponentUpdate && !1 === t.shouldComponentUpdate(c, u, l) ? w = !0 : t.componentWillUpdate && t.componentWillUpdate(c, u, l), t.props = c, t.state = u, t.context = l), t.prevProps = t.prevState = t.prevContext = t.nextBase = null, t._dirty = !1, !w) {
                o = t.render(c, u, l), t.getChildContext && (l = i(i({}, l), t.getChildContext()));
                var O, T, N = o && o.nodeName;
                if ("function" == typeof N) {
                    var A = p(o);
                    a = x, a && a.constructor === N && A.key == a.__key ? j(a, A, 1, l, !1) : (O = a, t._component = a = C(N, A, l), a.nextBase = a.nextBase || b, a._parentComponent = t, j(a, A, 0, l, !1), M(a, 1, n, !0)), T = a.base
                } else s = g, O = x, O && (s = t._component = null), (g || 1 === e) && (s && (s._component = null), T = v(s, o, l, n || !m, g && g.parentNode, !0));
                if (g && T !== g && a !== x) {
                    var P = g.parentNode;
                    P && T !== P && (P.replaceChild(T, g), O || (g._component = null, _(g, !1)))
                }
                if (O && S(O), t.base = T, T && !r) {
                    for (var k = t, D = t; D = D._parentComponent;)(k = D).base = T;
                    T._component = k, T._componentConstructor = k.constructor
                }
            }
            if (!m || n ? R.unshift(t) : w || (t.componentDidUpdate && t.componentDidUpdate(f, d, h), E.afterUpdate && E.afterUpdate(t)), null != t._renderCallbacks)
                for (; t._renderCallbacks.length;) t._renderCallbacks.pop().call(t);
            L || r || y()
        }
    }

    function N(t, e, n, r) {
        for (var o = t && t._component, i = o, a = t, s = o && t._componentConstructor === e.nodeName, c = s, u = p(e); o && !c && (o = o._parentComponent);) c = o.constructor === e.nodeName;
        return o && c && (!r || o._component) ? (j(o, u, 3, n, r), t = o.base) : (i && !s && (S(i), t = a = null), o = C(e.nodeName, u, n), t && !o.nextBase && (o.nextBase = t, a = null), j(o, u, 1, n, r), t = o.base, a && t !== a && (a._component = null, _(a, !1))), t
    }

    function S(t) {
        E.beforeUnmount && E.beforeUnmount(t);
        var e = t.base;
        t._disable = !0, t.componentWillUnmount && t.componentWillUnmount(), t.base = null;
        var n = t._component;
        n ? S(n) : e && (e.__preactattr_ && e.__preactattr_.ref && e.__preactattr_.ref(null), t.nextBase = e, f(e), O(t), x(e)), t.__ref && t.__ref(null)
    }

    function A(t, e) {
        this._dirty = !0, this.context = e, this.props = t, this.state = this.state || {}
    }

    function P(t, e, n) {
        return v(n, t, {}, !1, e, !1)
    }
    n.d(e, "b", function() {
        return o
    }), n.d(e, "a", function() {
        return A
    }), n.d(e, "c", function() {
        return P
    });
    var E = {},
        k = [],
        D = [],
        U = "function" == typeof Promise ? Promise.resolve().then.bind(Promise.resolve()) : setTimeout,
        B = /acit|ex(?:s|g|n|p|$)|rph|ows|mnc|ntw|ine[ch]|zoo|^ord/i,
        H = [],
        R = [],
        L = 0,
        q = !1,
        I = !1,
        F = {};
    i(A.prototype, {
        setState: function(t, e) {
            var n = this.state;
            this.prevState || (this.prevState = i({}, n)), i(n, "function" == typeof t ? t(n, this.props) : t), e && (this._renderCallbacks = this._renderCallbacks || []).push(e), a(this)
        },
        forceUpdate: function(t) {
            t && (this._renderCallbacks = this._renderCallbacks || []).push(t), M(this, 2)
        },
        render: function() {}
    })
}, function(t, e, n) {
    "use strict";

    function r(t, e) {
        !o.isUndefined(t) && o.isUndefined(t["Content-Type"]) && (t["Content-Type"] = e)
    }
    var o = n(0),
        i = n(14),
        a = {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        s = {
            adapter: function() {
                var t;
                return "undefined" != typeof XMLHttpRequest ? t = n(4) : "undefined" != typeof process && (t = n(4)), t
            }(),
            transformRequest: [function(t, e) {
                return i(e, "Content-Type"), o.isFormData(t) || o.isArrayBuffer(t) || o.isBuffer(t) || o.isStream(t) || o.isFile(t) || o.isBlob(t) ? t : o.isArrayBufferView(t) ? t.buffer : o.isURLSearchParams(t) ? (r(e, "application/x-www-form-urlencoded;charset=utf-8"), "" + t) : o.isObject(t) ? (r(e, "application/json;charset=utf-8"), JSON.stringify(t)) : t
            }],
            transformResponse: [function(t) {
                if ("string" == typeof t) try {
                    t = JSON.parse(t)
                } catch (t) {}
                return t
            }],
            timeout: 0,
            xsrfCookieName: "XSRF-TOKEN",
            xsrfHeaderName: "X-XSRF-TOKEN",
            maxContentLength: -1,
            validateStatus: function(t) {
                return t >= 200 && 300 > t
            }
        };
    s.headers = {
        common: {
            Accept: "application/json, text/plain, */*"
        }
    }, o.forEach(["delete", "get", "head"], function(t) {
        s.headers[t] = {}
    }), o.forEach(["post", "put", "patch"], function(t) {
        s.headers[t] = o.merge(a)
    }), t.exports = s
}, function(t) {
    "use strict";
    t.exports = function(t, e) {
        return function() {
            for (var n = Array(arguments.length), r = 0; n.length > r; r++) n[r] = arguments[r];
            return t.apply(e, n)
        }
    }
}, function(t, e, n) {
    "use strict";
    var r = n(0),
        o = n(15),
        i = n(17),
        a = n(18),
        s = n(19),
        c = n(5),
        u = "undefined" != typeof window && window.btoa && window.btoa.bind(window) || n(20);
    t.exports = function(t) {
        return new Promise(function(e, p) {
            var l = t.data,
                f = t.headers;
            r.isFormData(l) && delete f["Content-Type"];
            var d = new XMLHttpRequest,
                h = "onreadystatechange",
                m = !1;
            if ("undefined" == typeof window || !window.XDomainRequest || "withCredentials" in d || s(t.url) || (d = new window.XDomainRequest, h = "onload", m = !0, d.onprogress = function() {}, d.ontimeout = function() {}), t.auth) {
                f.Authorization = "Basic " + u((t.auth.username || "") + ":" + (t.auth.password || ""))
            }
            if (d.open(t.method.toUpperCase(), i(t.url, t.params, t.paramsSerializer), !0), d.timeout = t.timeout, d[h] = function() {
                    if (d && (4 === d.readyState || m) && (0 !== d.status || d.responseURL && 0 === d.responseURL.indexOf("file:"))) {
                        var n = "getAllResponseHeaders" in d ? a(d.getAllResponseHeaders()) : null;
                        o(e, p, {
                            data: t.responseType && "text" !== t.responseType ? d.response : d.responseText,
                            status: 1223 === d.status ? 204 : d.status,
                            statusText: 1223 === d.status ? "No Content" : d.statusText,
                            headers: n,
                            config: t,
                            request: d
                        }), d = null
                    }
                }, d.onerror = function() {
                    p(c("Network Error", t, null, d)), d = null
                }, d.ontimeout = function() {
                    p(c("timeout of " + t.timeout + "ms exceeded", t, "ECONNABORTED", d)), d = null
                }, r.isStandardBrowserEnv()) {
                var y = n(21),
                    v = (t.withCredentials || s(t.url)) && t.xsrfCookieName ? y.read(t.xsrfCookieName) : void 0;
                v && (f[t.xsrfHeaderName] = v)
            }
            if ("setRequestHeader" in d && r.forEach(f, function(t, e) {
                    void 0 === l && "content-type" === e.toLowerCase() ? delete f[e] : d.setRequestHeader(e, t)
                }), t.withCredentials && (d.withCredentials = !0), t.responseType) try {
                d.responseType = t.responseType
            } catch (e) {
                if ("json" !== t.responseType) throw e
            }
            "function" == typeof t.onDownloadProgress && d.addEventListener("progress", t.onDownloadProgress), "function" == typeof t.onUploadProgress && d.upload && d.upload.addEventListener("progress", t.onUploadProgress), t.cancelToken && t.cancelToken.promise.then(function(t) {
                d && (d.abort(), p(t), d = null)
            }), void 0 === l && (l = null), d.send(l)
        })
    }
}, function(t, e, n) {
    "use strict";
    var r = n(16);
    t.exports = function(t, e, n, o, i) {
        var a = Error(t);
        return r(a, e, n, o, i)
    }
}, function(t) {
    "use strict";
    t.exports = function(t) {
        return !(!t || !t.__CANCEL__)
    }
}, function(t) {
    "use strict";

    function e(t) {
        this.message = t
    }
    e.prototype.toString = function() {
        return "Cancel" + (this.message ? ": " + this.message : "")
    }, e.prototype.__CANCEL__ = !0, t.exports = e
}, function(t, e, n) {
    "use strict";
    var r = n(1),
        o = this && this.__extends || function() {
            var t = Object.setPrototypeOf || {
                __proto__: []
            }
            instanceof Array && function(t, e) {
                t.__proto__ = e
            } || function(t, e) {
                for (var n in e) e.hasOwnProperty(n) && (t[n] = e[n])
            };
            return function(e, n) {
                function r() {
                    this.constructor = e
                }
                t(e, n), e.prototype = null === n ? Object.create(n) : (r.prototype = n.prototype, new r)
            }
        }();
    e.a = function(t) {
        function e() {
            var e = t.call(this) || this;
            return e.onVisibilityChange = function() {}, e.state = {
                visible: !1,
                visibilityChanged: !1,
                attachmentsVisible: !0
            }, e
        }
        return o(e, t), e.prototype.componentDidMount = function() {
            var t = this;
            setTimeout(function() {
                t.state.visible = !0, t.state.visibilityChanged = !0, t.onVisibilityChange(), t.props.onVisibilityChange(t.props.message, t.state)
            }, this.props.timeout || 0)
        }, e
    }(r.a)
}, function(t, e, n) {
    "use strict";
    n.d(e, "a", function() {
        return a
    });
    var r = n(10),
        o = n.n(r),
        i = function() {
            function t() {
                var t = this;
                this.callAPI = function(e, n, r, i, a) {
                    void 0 === n && (n = !1), void 0 === r && (r = null);
                    var s = new FormData,
                        c = {
                            driver: "web",
                            userId: t.userId,
                            message: e,
                            attachment: r,
                            interactive: n ? "1" : "0"
                        };
                    Object.keys(c).forEach(function(t) {
                        return s.append(t, c[t])
                    }), o.a.post(t.chatServer, s).then(function(t) {
                        var e = t.data.messages || [];
                        i && e.forEach(function(t) {
                            i(t)
                        }), a && a(t.data)
                    })
                }
            }
            return t.prototype.setUserId = function(t) {
                this.userId = t
            }, t.prototype.setChatServer = function(t) {
                this.chatServer = t
            }, t
        }(),
        a = new i
}, function(t, e, n) {
    t.exports = n(11)
}, function(t, e, n) {
    "use strict";

    function r(t) {
        var e = new a(t),
            n = i(a.prototype.request, e);
        return o.extend(n, a.prototype, e), o.extend(n, e), n
    }
    var o = n(0),
        i = n(3),
        a = n(13),
        s = n(2),
        c = r(s);
    c.Axios = a, c.create = function(t) {
        return r(o.merge(s, t))
    }, c.Cancel = n(7), c.CancelToken = n(27), c.isCancel = n(6), c.all = function(t) {
        return Promise.all(t)
    }, c.spread = n(28), t.exports = c, t.exports.default = c
}, function(t) {
    function e(t) {
        return !!t.constructor && "function" == typeof t.constructor.isBuffer && t.constructor.isBuffer(t)
    }

    function n(t) {
        return "function" == typeof t.readFloatLE && "function" == typeof t.slice && e(t.slice(0, 0))
    }
    t.exports = function(t) {
        return null != t && (e(t) || n(t) || !!t._isBuffer)
    }
}, function(t, e, n) {
    "use strict";

    function r(t) {
        this.defaults = t, this.interceptors = {
            request: new a,
            response: new a
        }
    }
    var o = n(2),
        i = n(0),
        a = n(22),
        s = n(23);
    r.prototype.request = function(t) {
        "string" == typeof t && (t = i.merge({
            url: arguments[0]
        }, arguments[1])), t = i.merge(o, {
            method: "get"
        }, this.defaults, t), t.method = t.method.toLowerCase();
        var e = [s, void 0],
            n = Promise.resolve(t);
        for (this.interceptors.request.forEach(function(t) {
                e.unshift(t.fulfilled, t.rejected)
            }), this.interceptors.response.forEach(function(t) {
                e.push(t.fulfilled, t.rejected)
            }); e.length;) n = n.then(e.shift(), e.shift());
        return n
    }, i.forEach(["delete", "get", "head", "options"], function(t) {
        r.prototype[t] = function(e, n) {
            return this.request(i.merge(n || {}, {
                method: t,
                url: e
            }))
        }
    }), i.forEach(["post", "put", "patch"], function(t) {
        r.prototype[t] = function(e, n, r) {
            return this.request(i.merge(r || {}, {
                method: t,
                url: e,
                data: n
            }))
        }
    }), t.exports = r
}, function(t, e, n) {
    "use strict";
    var r = n(0);
    t.exports = function(t, e) {
        r.forEach(t, function(n, r) {
            r !== e && r.toUpperCase() === e.toUpperCase() && (t[e] = n, delete t[r])
        })
    }
}, function(t, e, n) {
    "use strict";
    var r = n(5);
    t.exports = function(t, e, n) {
        var o = n.config.validateStatus;
        n.status && o && !o(n.status) ? e(r("Request failed with status code " + n.status, n.config, null, n.request, n)) : t(n)
    }
}, function(t) {
    "use strict";
    t.exports = function(t, e, n, r, o) {
        return t.config = e, n && (t.code = n), t.request = r, t.response = o, t
    }
}, function(t, e, n) {
    "use strict";

    function r(t) {
        return encodeURIComponent(t).replace(/%40/gi, "@").replace(/%3A/gi, ":").replace(/%24/g, "$").replace(/%2C/gi, ",").replace(/%20/g, "+").replace(/%5B/gi, "[").replace(/%5D/gi, "]")
    }
    var o = n(0);
    t.exports = function(t, e, n) {
        if (!e) return t;
        var i;
        if (n) i = n(e);
        else if (o.isURLSearchParams(e)) i = "" + e;
        else {
            var a = [];
            o.forEach(e, function(t, e) {
                null !== t && void 0 !== t && (o.isArray(t) ? e += "[]" : t = [t], o.forEach(t, function(t) {
                    o.isDate(t) ? t = t.toISOString() : o.isObject(t) && (t = JSON.stringify(t)), a.push(r(e) + "=" + r(t))
                }))
            }), i = a.join("&")
        }
        return i && (t += (-1 === t.indexOf("?") ? "?" : "&") + i), t
    }
}, function(t, e, n) {
    "use strict";
    var r = n(0),
        o = ["age", "authorization", "content-length", "content-type", "etag", "expires", "from", "host", "if-modified-since", "if-unmodified-since", "last-modified", "location", "max-forwards", "proxy-authorization", "referer", "retry-after", "user-agent"];
    t.exports = function(t) {
        var e, n, i, a = {};
        return t ? (r.forEach(t.split("\n"), function(t) {
            if (i = t.indexOf(":"), e = r.trim(t.substr(0, i)).toLowerCase(), n = r.trim(t.substr(i + 1)), e) {
                if (a[e] && o.indexOf(e) >= 0) return;
                a[e] = "set-cookie" === e ? (a[e] ? a[e] : []).concat([n]) : a[e] ? a[e] + ", " + n : n
            }
        }), a) : a
    }
}, function(t, e, n) {
    "use strict";
    var r = n(0);
    t.exports = r.isStandardBrowserEnv() ? function() {
        function t(t) {
            var e = t;
            return n && (o.setAttribute("href", e), e = o.href), o.setAttribute("href", e), {
                href: o.href,
                protocol: o.protocol ? o.protocol.replace(/:$/, "") : "",
                host: o.host,
                search: o.search ? o.search.replace(/^\?/, "") : "",
                hash: o.hash ? o.hash.replace(/^#/, "") : "",
                hostname: o.hostname,
                port: o.port,
                pathname: "/" === o.pathname.charAt(0) ? o.pathname : "/" + o.pathname
            }
        }
        var e, n = /(msie|trident)/i.test(navigator.userAgent),
            o = document.createElement("a");
        return e = t(window.location.href),
            function(n) {
                var o = r.isString(n) ? t(n) : n;
                return o.protocol === e.protocol && o.host === e.host
            }
    }() : function() {
        return function() {
            return !0
        }
    }()
}, function(t) {
    "use strict";

    function e() {
        this.message = "String contains an invalid character"
    }

    function n(t) {
        for (var n, o, i = t + "", a = "", s = 0, c = r; i.charAt(0 | s) || (c = "=", s % 1); a += c.charAt(63 & n >> 8 - s % 1 * 8)) {
            if ((o = i.charCodeAt(s += .75)) > 255) throw new e;
            n = n << 8 | o
        }
        return a
    }
    var r = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=";
    e.prototype = Error(), e.prototype.code = 5, e.prototype.name = "InvalidCharacterError", t.exports = n
}, function(t, e, n) {
    "use strict";
    var r = n(0);
    t.exports = r.isStandardBrowserEnv() ? function() {
        return {
            write: function(t, e, n, o, i, a) {
                var s = [];
                s.push(t + "=" + encodeURIComponent(e)), r.isNumber(n) && s.push("expires=" + new Date(n).toGMTString()), r.isString(o) && s.push("path=" + o), r.isString(i) && s.push("domain=" + i), !0 === a && s.push("secure"), document.cookie = s.join("; ")
            },
            read: function(t) {
                var e = document.cookie.match(RegExp("(^|;\\s*)(" + t + ")=([^;]*)"));
                return e ? decodeURIComponent(e[3]) : null
            },
            remove: function(t) {
                this.write(t, "", Date.now() - 864e5)
            }
        }
    }() : function() {
        return {
            write: function() {},
            read: function() {
                return null
            },
            remove: function() {}
        }
    }()
}, function(t, e, n) {
    "use strict";

    function r() {
        this.handlers = []
    }
    var o = n(0);
    r.prototype.use = function(t, e) {
        return this.handlers.push({
            fulfilled: t,
            rejected: e
        }), this.handlers.length - 1
    }, r.prototype.eject = function(t) {
        this.handlers[t] && (this.handlers[t] = null)
    }, r.prototype.forEach = function(t) {
        o.forEach(this.handlers, function(e) {
            null !== e && t(e)
        })
    }, t.exports = r
}, function(t, e, n) {
    "use strict";

    function r(t) {
        t.cancelToken && t.cancelToken.throwIfRequested()
    }
    var o = n(0),
        i = n(24),
        a = n(6),
        s = n(2),
        c = n(25),
        u = n(26);
    t.exports = function(t) {
        return r(t), t.baseURL && !c(t.url) && (t.url = u(t.baseURL, t.url)), t.headers = t.headers || {}, t.data = i(t.data, t.headers, t.transformRequest), t.headers = o.merge(t.headers.common || {}, t.headers[t.method] || {}, t.headers || {}), o.forEach(["delete", "get", "head", "post", "put", "patch", "common"], function(e) {
            delete t.headers[e]
        }), (t.adapter || s.adapter)(t).then(function(e) {
            return r(t), e.data = i(e.data, e.headers, t.transformResponse), e
        }, function(e) {
            return a(e) || (r(t), e && e.response && (e.response.data = i(e.response.data, e.response.headers, t.transformResponse))), Promise.reject(e)
        })
    }
}, function(t, e, n) {
    "use strict";
    var r = n(0);
    t.exports = function(t, e, n) {
        return r.forEach(n, function(n) {
            t = n(t, e)
        }), t
    }
}, function(t) {
    "use strict";
    t.exports = function(t) {
        return /^([a-z][a-z\d\+\-\.]*:)?\/\//i.test(t)
    }
}, function(t) {
    "use strict";
    t.exports = function(t, e) {
        return e ? t.replace(/\/+$/, "") + "/" + e.replace(/^\/+/, "") : t
    }
}, function(t, e, n) {
    "use strict";

    function r(t) {
        if ("function" != typeof t) throw new TypeError("executor must be a function.");
        var e;
        this.promise = new Promise(function(t) {
            e = t
        });
        var n = this;
        t(function(t) {
            n.reason || (n.reason = new o(t), e(n.reason))
        })
    }
    var o = n(7);
    r.prototype.throwIfRequested = function() {
        if (this.reason) throw this.reason
    }, r.source = function() {
        var t;
        return {
            token: new r(function(e) {
                t = e
            }),
            cancel: t
        }
    }, t.exports = r
}, function(t) {
    "use strict";
    t.exports = function(t) {
        return function(e) {
            return t.apply(null, e)
        }
    }
}, , , , , , , , , , function(t, e, n) {
    "use strict";

    function r() {
        var t = document.createElement("div");
            

        t.id = "botmanChatRoot", document.getElementsByTagName("body")[0].appendChild(t), Object(a.c)(Object(a.b)(s.a, {
            userId: o(),
            conf: c
        }), t)
    }

    function o() {
        return c.userId || i()
    }

    function i() {
        return Math.random().toString(36).substr(2, 6)
    }
    Object.defineProperty(e, "__esModule", {
        value: !0
    });
    var a = n(1),
        s = n(39);
    window.attachEvent ? window.attachEvent("onload", r) : window.addEventListener("load", r, !1);
    var c = {},
        u = function(t) {
            t = t.replace(/[[]/, "\\[").replace(/[]]/, "\\]");
            var e = RegExp("[\\?&]" + t + "=([^&#]*)"),
                n = e.exec(location.search);
            return null === n ? "" : decodeURIComponent(n[1].replace(/\+/g, " "))
        }("conf");
    if (u) try {
        c = JSON.parse(u)
    } catch (t) {}
}, function(t, e, n) {
    "use strict";
    var r = n(1),
        o = n(40),
        i = n(9),
        a = this && this.__extends || function() {
            var t = Object.setPrototypeOf || {
                __proto__: []
            }
            instanceof Array && function(t, e) {
                t.__proto__ = e
            } || function(t, e) {
                for (var n in e) e.hasOwnProperty(n) && (t[n] = e[n])
            };
            return function(e, n) {
                function r() {
                    this.constructor = e
                }
                t(e, n), e.prototype = null === n ? Object.create(n) : (r.prototype = n.prototype, new r)
            }
        }();
    e.a = function(t) {
        function e(n) {
            var r = t.call(this, n) || this;
            return r.handleKeyPress = function(t) {
                13 === t.keyCode && r.input.value.replace(/\s/g, "") && (r.say(r.input.value), r.input.value = "")
            }, r.handleSendClick = function() {
                r.say(r.textarea.value), r.textarea.value = ""
            }, r.writeToMessages = function(t) {
                void 0 === t.time && (t.time = (new Date).toJSON()), void 0 === t.visible && (t.visible = !1), void 0 === t.timeout && (t.timeout = 0), void 0 === t.id && (t.id = e.generateUuid()), null === t.attachment && (t.attachment = {}), r.state.messages.push(t), r.setState({
                    messages: r.state.messages
                }), t.additionalParameters && t.additionalParameters.replyType && r.setState({
                    replyType: t.additionalParameters.replyType
                })
            }, r.botman = i.a, r.botman.setUserId(r.props.userId), r.botman.setChatServer(r.props.conf.chatServer), r.state.messages = [], r.state.replyType = s.Text, r
        }
        return a(e, t), e.prototype.componentDidMount = function() {
            var t = this;
            !this.state.messages.length && this.props.conf.introMessage && this.writeToMessages({
                text: this.props.conf.introMessage,
                type: "text",
                from: "chatbot"
            }), window.addEventListener("message", function(e) {
                try {
                    t[e.data.method].apply(t, e.data.params)
                } catch (t) {}
            })
        }, e.prototype.sayAsBot = function(t) {
            this.writeToMessages({
                text: t,
                type: "text",
                from: "chatbot"
            })
        }, e.prototype.say = function(t, e) {
            var n = this;
            void 0 === e && (e = !0);
            var r = {
                text: t,
                type: "text",
                from: "visitor"
            };
            this.botman.callAPI(r.text, !1, null, function(t) {
                t.from = "chatbot", n.writeToMessages(t)
            }), e && this.writeToMessages(r)
        }, e.prototype.whisper = function(t) {
            this.say(t, !1)
        }, e.prototype.render = function(t, e) {
            var n = this;
            return Object(r.b)("div", null, Object(r.b)("div", {
                id: "messageArea"
            }, Object(r.b)(o.a, {
                messages: e.messages,
                conf: this.props.conf,
                messageHandler: this.writeToMessages
            })), this.state.replyType === s.Text ? Object(r.b)("input", {
                id: "userText",
                class: "textarea",
                type: "text",
                placeholder: this.props.conf.placeholderText,
                ref: function(t) {
                    n.input = t
                },
                onKeyPress: this.handleKeyPress,
                autofocus: !0
            }) : "", this.state.replyType === s.TextArea ? Object(r.b)("div", null, Object(r.b)("svg", {
                xmlns: "http://www.w3.org/2000/svg",
                x: "0px",
                y: "0px",
                onClick: this.handleSendClick,
                style: "cursor: pointer; position: absolute; width: 25px; bottom: 19px; right: 16px; z-index: 1000",
                viewBox: "0 0 535.5 535.5"
            }, Object(r.b)("g", null, Object(r.b)("g", {
                id: "send"
            }, Object(r.b)("polygon", {
                points: "0,497.25 535.5,267.75 0,38.25 0,216.75 382.5,267.75 0,318.75"
            })))), Object(r.b)("textarea", {
                id: "userText",
                class: "textarea",
                placeholder: this.props.conf.placeholderText,
                ref: function(t) {
                    n.textarea = t
                },
                autofocus: !0
            })) : "", Object(r.b)("a", {
                class: "banner",
                href: this.props.conf.aboutLink,
                target: "_blank"
            }, "AboutIcon" === this.props.conf.aboutText ? Object(r.b)("svg", {
                style: "position: absolute; width: 14px; bottom: 6px; right: 6px;",
                fill: "#EEEEEE",
                xmlns: "http://www.w3.org/2000/svg",
                viewBox: "0 0 1536 1792"
            }, Object(r.b)("path", {
                d: "M1024 1376v-160q0-14-9-23t-23-9h-96v-512q0-14-9-23t-23-9h-320q-14 0-23 9t-9 23v160q0 14 9 23t23 9h96v320h-96q-14 0-23 9t-9 23v160q0 14 9 23t23 9h448q14 0 23-9t9-23zm-128-896v-160q0-14-9-23t-23-9h-192q-14 0-23 9t-9 23v160q0 14 9 23t23 9h192q14 0 23-9t9-23zm640 416q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z"
            })) : this.props.conf.aboutText))
        }, e.generateUuid = function() {
            var t, e = "";
            for (t = 0; 32 > t; t += 1) switch (t) {
                case 8:
                case 20:
                    e += "-", e += (16 * Math.random() | 0).toString(16);
                    break;
                case 12:
                    e += "-", e += "4";
                    break;
                case 16:
                    e += "-", e += (4 * Math.random() | 8).toString(16);
                    break;
                default:
                    e += (16 * Math.random() | 0).toString(16)
            }
            return e
        }, e
    }(r.a);
    var s;
    ! function(t) {
        t.Text = "text", t.TextArea = "textarea"
    }(s || (s = {}))
}, function(t, e, n) {
    "use strict";
    var r = n(1),
        o = n(41),
        i = this && this.__extends || function() {
            var t = Object.setPrototypeOf || {
                __proto__: []
            }
            instanceof Array && function(t, e) {
                t.__proto__ = e
            } || function(t, e) {
                for (var n in e) e.hasOwnProperty(n) && (t[n] = e[n])
            };
            return function(e, n) {
                function r() {
                    this.constructor = e
                }
                t(e, n), e.prototype = null === n ? Object.create(n) : (r.prototype = n.prototype, new r)
            }
        }();
    e.a = function(t) {
        function e() {
            return null !== t && t.apply(this, arguments) || this
        }
        return i(e, t), e.prototype.render = function(t) {
            var e = "height:" + (t.conf.wrapperHeight - 60) + "px;",
                n = 0;
            return Object(r.b)("ol", {
                class: "chat",
                style: e
            }, t.messages.map(function(e) {
                var i = Object(r.b)(o.a, {
                    message: e,
                    calculatedTimeout: n,
                    messageHandler: t.messageHandler,
                    conf: t.conf
                });
                return n += 1e3 * e.timeout, i
            }))
        }, e
    }(r.a)
}, function(t, e, n) {
    "use strict";
    var r = n(1),
        o = n(42),
        i = (n.n(o), n(43)),
        a = n(44),
        s = n(45),
        c = n(46),
        u = n(47),
        p = this && this.__extends || function() {
            var t = Object.setPrototypeOf || {
                __proto__: []
            }
            instanceof Array && function(t, e) {
                t.__proto__ = e
            } || function(t, e) {
                for (var n in e) e.hasOwnProperty(n) && (t[n] = e[n])
            };
            return function(e, n) {
                function r() {
                    this.constructor = e
                }
                t(e, n), e.prototype = null === n ? Object.create(n) : (r.prototype = n.prototype, new r)
            }
        }(),
        l = {
            actions: a.a,
            buttons: u.a,
            list: c.a,
            text: i.a,
            typing_indicator: s.a
        };
    e.a = function(t) {
        function e() {
            var e = null !== t && t.apply(this, arguments) || this;
            return e.scrollToBottom = function() {
                var t = document.getElementById("messageArea");
                t.scrollTop = t.scrollHeight
            }, e.messageVisibilityChange = function(t, n) {
                var r = e.props.message;
                r.id === t.id && r.visible !== n.visible && (r.visible = n.visible, r.timeout = 0, e.forceUpdate())
            }, e
        }
        return p(e, t), e.prototype.componentDidMount = function() {
            this.scrollToBottom()
        }, e.prototype.componentDidUpdate = function() {
            this.scrollToBottom()
        }, e.prototype.render = function(t) {
            var e = new Date,
                n = t.message,
                a = new Date(n.time),
                s = l[n.type] || i.a,
                c = this.props,
                u = c.messageHandler,
                p = c.conf,
                f = "";
            !1 !== n.visible && !1 !== n.visibilityChanged || (f += "display:none");
            var d = t.calculatedTimeout;
            return Object(r.b)("li", {
                "data-message-id": n.id,
                class: n.from,
                style: f
            }, Object(r.b)("div", {
                class: "msg"
            }, Object(r.b)(s, {
                onVisibilityChange: this.messageVisibilityChange,
                message: n,
                timeout: d,
                messageHandler: u,
                conf: p
            }), t.conf.displayMessageTime ? Object(r.b)("div", {
                class: "time"
            }, 864e5 > e.getMilliseconds() - a.getMilliseconds() ? o(a, t.conf.timeFormat) : o(a, t.conf.dateTimeFormat)) : ""))
        }, e
    }(r.a)
}, function(t, e, n) {
    var r;
    ! function() {
        "use strict";

        function o(t, e) {
            for (t += "", e = e || 2; e > t.length;) t = "0" + t;
            return t
        }

        function i(t) {
            var e = new Date(t.getFullYear(), t.getMonth(), t.getDate());
            e.setDate(e.getDate() - (e.getDay() + 6) % 7 + 3);
            var n = new Date(e.getFullYear(), 0, 4);
            n.setDate(n.getDate() - (n.getDay() + 6) % 7 + 3);
            var r = e.getTimezoneOffset() - n.getTimezoneOffset();
            e.setHours(e.getHours() - r);
            var o = (e - n) / 6048e5;
            return 1 + Math.floor(o)
        }

        function a(t) {
            var e = t.getDay();
            return 0 === e && (e = 7), e
        }

        function s(t) {
            return null === t ? "null" : void 0 === t ? "undefined" : "object" != typeof t ? typeof t : Array.isArray(t) ? "array" : {}.toString.call(t).slice(8, -1).toLowerCase()
        }
        var c = function() {
            var t = /d{1,4}|m{1,4}|yy(?:yy)?|([HhMsTt])\1?|[LloSZWN]|"[^"]*"|'[^']*'/g,
                e = /\b(?:[PMCEA][SDP]T|(?:Pacific|Mountain|Central|Eastern|Atlantic) (?:Standard|Daylight|Prevailing) Time|(?:GMT|UTC)(?:[-+]\d{4})?)\b/g,
                n = /[^-+\dA-Z]/g;
            return function(r, u, p, l) {
                if (1 !== arguments.length || "string" !== s(r) || /\d/.test(r) || (u = r, r = void 0), r = r || new Date, r instanceof Date || (r = new Date(r)), isNaN(r)) throw TypeError("Invalid date");
                u = (c.masks[u] || u || c.masks.default) + "";
                var f = u.slice(0, 4);
                "UTC:" !== f && "GMT:" !== f || (u = u.slice(4), p = !0, "GMT:" === f && (l = !0));
                var d = p ? "getUTC" : "get",
                    h = r[d + "Date"](),
                    m = r[d + "Day"](),
                    y = r[d + "Month"](),
                    v = r[d + "FullYear"](),
                    b = r[d + "Hours"](),
                    g = r[d + "Minutes"](),
                    _ = r[d + "Seconds"](),
                    x = r[d + "Milliseconds"](),
                    w = p ? 0 : r.getTimezoneOffset(),
                    O = i(r),
                    C = a(r),
                    T = {
                        d: h,
                        dd: o(h),
                        ddd: c.i18n.dayNames[m],
                        dddd: c.i18n.dayNames[m + 7],
                        m: y + 1,
                        mm: o(y + 1),
                        mmm: c.i18n.monthNames[y],
                        mmmm: c.i18n.monthNames[y + 12],
                        yy: (v + "").slice(2),
                        yyyy: v,
                        h: b % 12 || 12,
                        hh: o(b % 12 || 12),
                        H: b,
                        HH: o(b),
                        M: g,
                        MM: o(g),
                        s: _,
                        ss: o(_),
                        l: o(x, 3),
                        L: o(Math.round(x / 10)),
                        t: 12 > b ? c.i18n.timeNames[0] : c.i18n.timeNames[1],
                        tt: 12 > b ? c.i18n.timeNames[2] : c.i18n.timeNames[3],
                        T: 12 > b ? c.i18n.timeNames[4] : c.i18n.timeNames[5],
                        TT: 12 > b ? c.i18n.timeNames[6] : c.i18n.timeNames[7],
                        Z: l ? "GMT" : p ? "UTC" : ((r + "").match(e) || [""]).pop().replace(n, ""),
                        o: (w > 0 ? "-" : "+") + o(100 * Math.floor(Math.abs(w) / 60) + Math.abs(w) % 60, 4),
                        S: ["th", "st", "nd", "rd"][h % 10 > 3 ? 0 : (h % 100 - h % 10 != 10) * h % 10],
                        W: O,
                        N: C
                    };
                return u.replace(t, function(t) {
                    return t in T ? T[t] : t.slice(1, t.length - 1)
                })
            }
        }();
        c.masks = {
            default: "ddd mmm dd yyyy HH:MM:ss",
            shortDate: "m/d/yy",
            mediumDate: "mmm d, yyyy",
            longDate: "mmmm d, yyyy",
            fullDate: "dddd, mmmm d, yyyy",
            shortTime: "h:MM TT",
            mediumTime: "h:MM:ss TT",
            longTime: "h:MM:ss TT Z",
            isoDate: "yyyy-mm-dd",
            isoTime: "HH:MM:ss",
            isoDateTime: "yyyy-mm-dd'T'HH:MM:sso",
            isoUtcDateTime: "UTC:yyyy-mm-dd'T'HH:MM:ss'Z'",
            expiresHeaderFormat: "ddd, dd mmm yyyy HH:MM:ss Z"
        }, c.i18n = {
            dayNames: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
            monthNames: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
            timeNames: ["a", "p", "am", "pm", "A", "P", "AM", "PM"]
        }, void 0 !== (r = function() {
            return c
        }.call(e, n, e, t)) && (t.exports = r)
    }()
}, function(t, e, n) {
    "use strict";
    var r = n(1),
        o = n(8),
        i = this && this.__extends || function() {
            var t = Object.setPrototypeOf || {
                __proto__: []
            }
            instanceof Array && function(t, e) {
                t.__proto__ = e
            } || function(t, e) {
                for (var n in e) e.hasOwnProperty(n) && (t[n] = e[n])
            };
            return function(e, n) {
                function r() {
                    this.constructor = e
                }
                t(e, n), e.prototype = null === n ? Object.create(n) : (r.prototype = n.prototype, new r)
            }
        }();
    e.a = function(t) {
        function e() {
            return null !== t && t.apply(this, arguments) || this
        }
        return i(e, t), e.prototype.render = function(t) {
            var e = t.message,
                n = e.attachment,
                o = {
                    __html: e.text
                };
            return Object(r.b)("div", null, Object(r.b)("p", {
                dangerouslySetInnerHTML: o
            }), n && "image" === n.type ? Object(r.b)("img", {
                src: n.url,
                style: "max-width: 100%;"
            }) : "", n && "audio" === n.type ? Object(r.b)("audio", {
                controls: !0,
                autoPlay: !1,
                style: "max-width: 100%;"
            }, Object(r.b)("source", {
                src: n.url,
                type: "audio/mp3"
            })) : "", n && "video" === n.type ? Object(r.b)("video", {
                height: t.conf.videoHeight,
                controls: !0,
                autoPlay: !1,
                style: "max-width: 100%;"
            }, Object(r.b)("source", {
                src: n.url,
                type: "video/mp4"
            })) : "")
        }, e
    }(o.a)
}, function(t, e, n) {
    "use strict";
    var r = n(1),
        o = n(9),
        i = n(8),
        a = this && this.__extends || function() {
            var t = Object.setPrototypeOf || {
                __proto__: []
            }
            instanceof Array && function(t, e) {
                t.__proto__ = e
            } || function(t, e) {
                for (var n in e) e.hasOwnProperty(n) && (t[n] = e[n])
            };
            return function(e, n) {
                function r() {
                    this.constructor = e
                }
                t(e, n), e.prototype = null === n ? Object.create(n) : (r.prototype = n.prototype, new r)
            }
        }();
    e.a = function(t) {
        function e() {
            return null !== t && t.apply(this, arguments) || this
        }
        return a(e, t), e.prototype.render = function(t) {
            var e = this,
                n = t.message,
                o = n.actions.map(function(t) {
                    return Object(r.b)("div", {
                        class: "btn",
                        onClick: function() {
                            return e.performAction(t)
                        }
                    }, t.text)
                });
            return Object(r.b)("div", null, n.text && Object(r.b)("div", null, n.text), this.state.attachmentsVisible ? Object(r.b)("div", null, o) : "")
        }, e.prototype.performAction = function(t) {
            var e = this;
            o.a.callAPI(t.value, !0, null, function(t) {
                e.state.attachmentsVisible = !1, e.props.messageHandler({
                    text: t.text,
                    type: t.type,
                    timeout: t.timeout,
                    actions: t.actions,
                    attachment: t.attachment,
                    additionalParameters: t.additionalParameters,
                    from: "chatbot"
                })
            }, null)
        }, e
    }(i.a)
}, function(t, e, n) {
    "use strict";
    var r = n(1),
        o = n(8),
        i = this && this.__extends || function() {
            var t = Object.setPrototypeOf || {
                __proto__: []
            }
            instanceof Array && function(t, e) {
                t.__proto__ = e
            } || function(t, e) {
                for (var n in e) e.hasOwnProperty(n) && (t[n] = e[n])
            };
            return function(e, n) {
                function r() {
                    this.constructor = e
                }
                t(e, n), e.prototype = null === n ? Object.create(n) : (r.prototype = n.prototype, new r)
            }
        }();
    e.a = function(t) {
        function e() {
            var e = null !== t && t.apply(this, arguments) || this;
            return e.onVisibilityChange = function() {
                setTimeout(function() {
                    e.state.visible = !1, e.props.onVisibilityChange(e.props.message, e.state)
                }, 1e3 * e.props.message.timeout)
            }, e
        }
        return i(e, t), e.prototype.render = function() {
            return Object(r.b)("div", {
                class: "loading-dots"
            }, Object(r.b)("span", {
                class: "dot"
            }), Object(r.b)("span", {
                class: "dot"
            }), Object(r.b)("span", {
                class: "dot"
            }))
        }, e
    }(o.a)
}, function(t, e, n) {
    "use strict";
    var r = n(1),
        o = n(9),
        i = n(8),
        a = this && this.__extends || function() {
            var t = Object.setPrototypeOf || {
                __proto__: []
            }
            instanceof Array && function(t, e) {
                t.__proto__ = e
            } || function(t, e) {
                for (var n in e) e.hasOwnProperty(n) && (t[n] = e[n])
            };
            return function(e, n) {
                function r() {
                    this.constructor = e
                }
                t(e, n), e.prototype = null === n ? Object.create(n) : (r.prototype = n.prototype, new r)
            }
        }();
    e.a = function(t) {
        function e() {
            return null !== t && t.apply(this, arguments) || this
        }
        return a(e, t), e.prototype.getButton = function(t) {
            var e = this;
            return "postback" === t.type ? Object(r.b)("div", {
                class: "btn",
                onClick: function() {
                    return e.performAction(t)
                }
            }, t.title) : "web_url" === t.type ? Object(r.b)("a", {
                class: "btn",
                href: t.url,
                target: "_blank"
            }, t.title) : void 0
        }, e.prototype.render = function(t) {
            var e = this,
                n = t.message,
                o = n.globalButtons.map(function(t) {
                    return e.getButton(t)
                }),
                i = n.elements.map(function(t) {
                    var n = t.buttons.map(function(t) {
                        return e.getButton(t)
                    });
                    return Object(r.b)("div", {
                        style: {
                            minWidth: "200px"
                        }
                    }, Object(r.b)("img", {
                        src: t.image_url
                    }), Object(r.b)("p", null, t.title), Object(r.b)("p", null, t.subtitle), n)
                });
            return Object(r.b)("div", null, Object(r.b)("div", {
                style: {
                    overflowX: "scroll",
                    display: "flex"
                }
            }, i), o)
        }, e.prototype.performAction = function(t) {
            var e = this;
            o.a.callAPI(t.payload, !0, null, function(t) {
                e.props.messageHandler({
                    text: t.text,
                    type: t.type,
                    actions: t.actions,
                    attachment: t.attachment,
                    additionalParameters: t.additionalParameters,
                    from: "chatbot"
                })
            }, null)
        }, e
    }(i.a)
}, function(t, e, n) {
    "use strict";
    var r = n(1),
        o = n(9),
        i = n(8),
        a = this && this.__extends || function() {
            var t = Object.setPrototypeOf || {
                __proto__: []
            }
            instanceof Array && function(t, e) {
                t.__proto__ = e
            } || function(t, e) {
                for (var n in e) e.hasOwnProperty(n) && (t[n] = e[n])
            };
            return function(e, n) {
                function r() {
                    this.constructor = e
                }
                t(e, n), e.prototype = null === n ? Object.create(n) : (r.prototype = n.prototype, new r)
            }
        }();
    e.a = function(t) {
        function e() {
            return null !== t && t.apply(this, arguments) || this
        }
        return a(e, t), e.prototype.render = function(t) {
            var e = this,
                n = t.message,
                o = n.buttons.map(function(t) {
                    return "postback" === t.type ? Object(r.b)("div", {
                        class: "btn",
                        onClick: function() {
                            return e.performAction(t)
                        }
                    }, t.title) : "web_url" === t.type ? Object(r.b)("a", {
                        class: "btn",
                        href: t.url,
                        target: "_blank"
                    }, t.title) : void 0
                });
            return Object(r.b)("div", null, n.text, this.state.attachmentsVisible ? o : "")
        }, e.prototype.performAction = function(t) {
            var e = this;
            o.a.callAPI(t.payload, !0, null, function(t) {
                e.state.attachmentsVisible = !1, e.props.messageHandler({
                    text: t.text,
                    type: t.type,
                    actions: t.actions,
                    attachment: t.attachment,
                    additionalParameters: t.additionalParameters,
                    from: "chatbot"
                })
            }, null)
        }, e
    }(i.a)
}]);
