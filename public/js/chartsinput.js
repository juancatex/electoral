
/*
* Licensed to the Apache Software Foundation (ASF) under one
* or more contributor license agreements.  See the NOTICE file
* distributed with this work for additional information
* regarding copyright ownership.  The ASF licenses this file
* to you under the Apache License, Version 2.0 (the
* "License"); you may not use this file except in compliance
* with the License.  You may obtain a copy of the License at
*
*   http://www.apache.org/licenses/LICENSE-2.0
*
* Unless required by applicable law or agreed to in writing,
* software distributed under the License is distributed on an
* "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY
* KIND, either express or implied.  See the License for the
* specific language governing permissions and limitations
* under the License.
*/

(function () {

    var baseUrl = window.AMD_BASE_URL || '../';
    var sourceMap = window.AMD_ENABLE_SOURCE_MAP;
    // `true` by default for debugging.
    sourceMap == null && (sourceMap = true);

    var params = {};
    var parts = location.search.slice(1).split('&');
    for (var i = 0; i < parts.length; ++i) {
        var kv = parts[i].split('=');
        params[kv[0]] = kv[1];
    }
    // Set default renderer in dev mode from hash.
    if (params.__RENDERER__) {
        window.__ECHARTS__DEFAULT__RENDERER__ = params.__RENDERER__;
    }
    if (params.__USE_DIRTY_RECT__) {
        window.__ECHARTS__DEFAULT__USE_DIRTY_RECT__ = params.__USE_DIRTY_RECT__ === 'true';
    }

    // Set echarts source code.
    var ecDistPath;
    if (params.__ECDIST__) {
        ecDistPath = ({
            'webpack-req-ec': '../echarts-boilerplate/echarts-webpack/dist/webpack-req-ec',
            'webpack-req-eclibec': '../echarts-boilerplate/echarts-webpack/dist/webpack-req-eclibec',
            'webpackold-req-ec': '../echarts-boilerplate/echarts-webpackold/dist/webpackold-req-ec',
            'webpackold-req-eclibec': '../echarts-boilerplate/echarts-webpackold/dist/webpackold-req-eclibec'
        })[params.__ECDIST__];
        if (!ecDistPath && params.__ECDIST__.match(/[0-9.]/)) {
            // Version number
            ecDistPath = 'test/runTest/tmp/__version__/' + params.__ECDIST__ + '/echarts';
        }
    }
    if (!ecDistPath) {
        ecDistPath = 'dist/echarts';
    }

    if (typeof require !== 'undefined') {
        require.config({
            baseUrl: baseUrl,
            paths: {
                'echarts': ecDistPath,
                'zrender': 'node_modules/zrender/dist/zrender',
                'ecStat': 'test/lib/ecStat.min',
                'ecSimpleTransform': 'test/lib/ecSimpleTransform',
                'ecSimpleOptionPlayer': 'test/lib/ecSimpleOptionPlayer',
                // 'ecStat': 'http://localhost:8001/echarts/echarts-stat/dist/ecStat',
                'geoJson': '../geoData/geoJson',
                'theme': 'theme',
                'data': 'test/data',
                'map': 'test/data/map',
                'extension': 'dist/extension',
            }
            // urlArgs will prevent break point on init in debug tool.
            // urlArgs: '_v_=' + (+new Date())
        });
    }

    if (typeof requireES !== 'undefined') {
        requireES.config({
            baseUrl: baseUrl,
            paths: {
                'echarts': './',
                'zrender': 'node_modules/zrender',
                'geoJson': 'geoData/geoJson',
                'theme': 'theme',
                'data': 'test/data',
                'map': 'test/data/map',
                'extension': 'extension'
            },
            // urlArgs: '_v_=' + (+new Date()),
            sourceMap: sourceMap
        });
    }

    // Not let scrollbar affect page size.
    // It will AFFECT interaction in the automatic testing.
    if (typeof MutationObserver !== 'undefined') {
        // Must be set as soon as possible(before chart is created)
        var observer = new MutationObserver(function() {
            if (document.body) {
                document.body.style.cssText = 'overflow:overlay!important';
                observer.disconnect();
            }
        });
        observer.observe(document.documentElement, {childList: true});
    };

    // It is not a good solution.
    // Do not need it any more:

    // Mount bundle version print.
    // if (typeof require !== 'undefined') {
    //     var originalRequire = require;
    //     window.require = function (deps, cb) {
    //         var newCb = function () {
    //             if (deps && deps instanceof Array) {
    //                 printBundleVersion(deps, [].slice.call(arguments));
    //             }
    //             cb && cb.apply(this, arguments);
    //         };
    //         return originalRequire.call(this, deps, newCb);
    //     };
    // }

    // function printBundleVersion(bundleIds, bundles) {
    //     var content = [];
    //     for (var i = 0; i < bundleIds.length; i++) {
    //         var bundle = bundles[i];
    //         var bundleVersion = bundle && bundle.bundleVersion;
    //         if (bundleVersion) {
    //             var date = new Date(+bundleVersion);
    //             // Check whether timestamp.
    //             if (!isNaN(+date)) {
    //                 bundleVersion = '<span style="color:yellow">'
    //                     + pad(date.getHours(), 2) + ':'
    //                     + pad(date.getMinutes(), 2) + ':'
    //                     + pad(date.getSeconds(), 2) + '.' + pad(date.getMilliseconds(), 3)
    //                     + '</span>';
    //             }
    //             else {
    //                 bundleVersion = encodeHTML(bundleVersion);
    //             }
    //             content.push(encodeHTML(bundleIds[i]) + '.js: ' + bundleVersion);
    //         }
    //     }

    //     var domId = 'ec-test-bundle-version';
    //     var dom = document.getElementById(domId);
    //     if (!dom) {
    //         dom = document.createElement('div');
    //         dom.setAttribute('id', domId);
    //         dom.style.cssText = [
    //             'background: rgb(52,56,64)',
    //             'color: rgb(215,215,215)',
    //             'position: fixed',
    //             'right: 0',
    //             'top: 0',
    //             'font-size: 10px',
    //             'padding: 1px 3px 1px 3px',
    //             'border-bottom-left-radius: 3px'
    //         ].join(';');
    //         document.body.appendChild(dom);
    //     }
    //     dom.innerHTML += content.join('');
    // }

    // function pad(num, len) {
    //     return ('000000' + num).substr(-len, len);
    // }

    // function encodeHTML(source) {
    //     return String(source)
    //         .replace(/&/g, '&amp;')
    //         .replace(/</g, '&lt;')
    //         .replace(/>/g, '&gt;')
    //         .replace(/"/g, '&quot;')
    //         .replace(/'/g, '&#39;');
    // }

})();
var define,require,esl;!function(n){function e(n,e){function r(n){0===n.indexOf(".")&&i.push(n)}var i=[];if("string"==typeof n?r(n):$(n,function(n){r(n)}),i.length>0)throw new Error("[REQUIRE_FATAL]Relative ID is not allowed in global require: "+i.join(", "));var o=C.waitSeconds;return o&&n instanceof Array&&(D&&clearTimeout(D),D=setTimeout(t,1e3*o)),_(n,e)}function t(){function n(a,u){if(!o[a]&&!l(a,N)){o[a]=1,l(a,L)||r[a]||(r[a]=1,e.push(a));var f=T[a];f?u&&(r[a]||(r[a]=1,e.push(a)),$(f.depMs,function(e){n(e.absId,e.hard)})):i[a]||(i[a]=1,t.push(a))}}var e=[],t=[],r={},i={},o={};for(var a in F)n(a,1);if(e.length||t.length)throw new Error("[MODULE_TIMEOUT]Hang( "+(e.join(", ")||"none")+" ) Miss( "+(t.join(", ")||"none")+" )")}function r(n){$(H,function(e){a(n,e.deps,e.factory)}),H.length=0,u(n)}function i(n,e,t){if(null==t&&(null==e?(t=n,n=null):(t=e,e=null,n instanceof Array&&(e=n,n=null))),null!=t){var r=window.opera;if(!n&&document.attachEvent&&(!r||"[object Opera]"!==r.toString())){var i=S();n=i&&i.getAttribute("data-require-id")}n?a(n,e,t):H[0]={deps:e,factory:t}}}function o(){var n=C.config[this.id];return n&&"object"==typeof n?n:{}}function a(n,e,t){T[n]||(T[n]={id:n,depsDec:e,deps:e||["require","exports","module"],factoryDeps:[],factory:t,exports:{},config:o,state:z,require:w(n),depMs:[],depMkv:{},depRs:[],depPMs:[]})}function u(n){var e=T[n];if(e&&!l(n,B)){var t=e.deps,r=e.factory,i=0;"function"==typeof r&&(i=Math.min(r.length,t.length),!e.depsDec&&r.toString().replace(/(\/\*([\s\S]*?)\*\/|([^:]|^)\/\/(.*)$)/gm,"").replace(/require\(\s*(['"'])([^'"]+)\1\s*\)/g,function(n,e,r){t.push(r)}));var o=[];$(t,function(t,r){var a,u,f=I(t),c=q(f.mod,n);c&&!P[c]?(f.res&&(u={id:t,mod:c,res:f.res},F[c]=1,e.depPMs.push(c),e.depRs.push(u)),a=e.depMkv[c],a||(a={id:f.mod,absId:c,hard:i>r},e.depMs.push(a),e.depMkv[c]=a,o.push(c))):a={absId:c},i>r&&e.factoryDeps.push(u||a)}),e.state=B,s(n),m(o)}}function f(){for(var n in F)c(n),d(n)}function c(n){function e(n){if(!l(n,B))return!1;if(l(n,L)||t[n])return!0;t[n]=1;var r=T[n],i=!0;return $(r.depMs,function(n){return i=e(n.absId)}),i&&$(r.depRs,function(n){return i=!(!n.absId||!l(n.absId,N))}),i&&(r.state=L),i}var t={};e(n)}function s(e){function t(){if(!r&&i.state===L){r=1;var t=1,o=[];if($(i.factoryDeps,function(n){var e=n.absId;return P[e]||(d(e),l(e,N))?void o.push(e):(t=0,!1)}),t){try{var a=p(o,{require:i.require,exports:i.exports,module:i}),u=i.factory,f="function"==typeof u?u.apply(n,a):u;null!=f&&(i.exports=f),i.invokeFactory=null,delete F[e]}catch(c){if(r=0,/^\[MODULE_MISS\]"([^"]+)/.test(c.message)){var s=i.depMkv[RegExp.$1];return void(s&&(s.hard=1))}throw c}g(e)}}}var r,i=T[e];i.invokeFactory=t,$(i.depPMs,function(n){v(n,function(){$(i.depRs,function(t){t.absId||t.mod!==n||(t.absId=q(t.id,e),m([t.absId],f))})})})}function l(n,e){return T[n]&&T[n].state>=e}function d(n){var e=T[n];e&&e.invokeFactory&&e.invokeFactory()}function p(n,e){var t=[];return $(n,function(n,r){t[r]=e[n]||h(n)}),t}function v(n,e){if(l(n,N))return void e();var t=Q[n];t||(t=Q[n]=[]),t.push(e)}function g(n){var e=Q[n]||[],t=T[n];t.state=N;for(var r=e.length;r--;)e[r]();e.length=0,delete Q[n]}function h(n){return l(n,N)?T[n].exports:null}function m(e,t,r,i){function o(){if(!a){var r=1;$(e,function(n){return P[n]?void 0:r=!!l(n,N)}),r&&(a=1,"function"==typeof t&&t.apply(n,p(e,P)))}}if("string"==typeof e){if(d(e),!l(e,N))throw new Error('[MODULE_MISS]"'+e+'" is not exists!');return h(e)}i=i||{};var a=0;e instanceof Array&&(o(),a||($(e,function(n){P[n]||l(n,N)||(v(n,o),i[n]||(n.indexOf("!")>0?b:y)(n,r),u(n))}),f()))}function y(n){function e(){var e=t.readyState;if("undefined"==typeof e||/^(loaded|complete)$/.test(e)){t.onload=t.onreadystatechange=null,t=null,r(n);for(var i in F)u(i);f()}}if(!G[n]&&!T[n]){G[n]=1;var t=document.createElement("script");t.setAttribute("data-require-id",n),t.src=E(n+".js"),t.async=!0,t.readyState?t.onreadystatechange=e:t.onload=e,U(t)}}function b(n,e){function t(e){u.exports=e||!0,g(n)}function i(r){var i=e?T[e].require:_;r.load(a.res,i,t,o.call({id:n}))}if(!T[n]){var a=I(n),u={id:n,state:B};T[n]=u,t.fromText=function(n,e){F[n]=1,new Function(e)(),r(n)},i(h(a.mod))}}function M(n,e){var t=R(n,1,e);return t.sort(j),t}function k(){C.baseUrl=C.baseUrl.replace(/\/$/,"")+"/",J=M(C.paths),V=M(C.map,1),$(V,function(n){n.v=M(n.v)}),K=[],$(C.packages,function(n){var e=n;"string"==typeof n&&(e={name:n.split("/")[0],location:n,main:"main"}),e.location=e.location||e.name,e.main=(e.main||"main").replace(/\.js$/i,""),e.reg=O(e.name),K.push(e)}),K.sort(j),W=M(C.urlArgs,1),X=M(C.noRequests),$(X,function(n){var e=n.v,t={};n.v=t,e instanceof Array||(e=[e]),$(e,function(n){t[n]=1})})}function x(n,e,t){$(e,function(e){return e.reg.test(n)?(t(e.v,e.k,e),!1):void 0})}function E(n){var e=/(\.[a-z0-9]+)$/i,t=/(\?[^#]*)$/,r="",i=n,o="";t.test(n)&&(o=RegExp.$1,n=n.replace(t,"")),e.test(n)&&(r=RegExp.$1,i=n.replace(e,""));var a,u=i;return x(i,J,function(n,e){u=u.replace(e,n),a=1}),a||x(i,K,function(n,e,t){u=u.replace(t.name,t.location)}),/^([a-z]{2,10}:\/)?\//i.test(u)||(u=C.baseUrl+u),u+=r+o,x(i,W,function(n){u+=(u.indexOf("?")>0?"&":"?")+n}),u}function w(n){function e(e,r){if("string"==typeof e)return t[e]||(t[e]=m(q(e,n))),t[e];if(e instanceof Array){var i=[],o=[],a=[];$(e,function(e,t){var r=I(e),u=q(r.mod,n);o.push(u),F[u]=1,r.res?(i.push(u),a[t]=null):a[t]=u});var u={};$(o,function(n){var e;x(n,X,function(n){e=n}),e&&(e["*"]?u[n]=1:$(o,function(t){return e[t]?(u[n]=1,!1):void 0}))}),m(o,function(){$(a,function(t,r){null==t&&(a[r]=q(e[r],n))}),m(a,r,n)},n,u)}}var t={};return e.toUrl=function(e){return E(q(e,n))},e}function q(n,e){if(!n)return"";e=e||"";var t=I(n);if(!t)return n;var r=t.res,i=A(t.mod,e);if($(K,function(n){var e=n.name;return e===i?(i=e+"/"+n.main,!1):void 0}),x(e,V,function(n){x(i,n,function(n,e){i=i.replace(e,n)})}),r){var o=h(i);r=o.normalize?o.normalize(r,function(n){return q(n,e)}):q(r,e),i+="!"+r}return i}function A(n,e){if(0===n.indexOf(".")){var t=e.split("/"),r=n.split("/"),i=t.length-1,o=r.length,a=0,u=0;n:for(var f=0;o>f;f++)switch(r[f]){case"..":if(!(i>a))break n;a++,u++;break;case".":u++;break;default:break n}return t.length=i-a,r=r.slice(u),t.concat(r).join("/")}return n}function I(n){var e=n.split("!");return e[0]?{mod:e[0],res:e[1]}:null}function R(n,e,t){var r=[];for(var i in n)if(n.hasOwnProperty(i)){var o={k:i,v:n[i]};r.push(o),e&&(o.reg="*"===i&&t?/^/:O(i))}return r}function S(){if(Y)return Y;if(Z&&"interactive"===Z.readyState)return Z;for(var n=document.getElementsByTagName("script"),e=n.length;e--;){var t=n[e];if("interactive"===t.readyState)return Z=t,t}}function U(n){Y=n,ee?ne.insertBefore(n,ee):ne.appendChild(n),Y=null}function O(n){return new RegExp("^"+n+"(/|$)")}function $(n,e){if(n instanceof Array)for(var t=0,r=n.length;r>t&&e(n[t],t)!==!1;t++);}function j(n,e){var t=n.k||n.name,r=e.k||e.name;return"*"===r?-1:"*"===t?1:r.length-t.length}var D,T={},F={},z=1,B=2,L=3,N=4,P={require:e,exports:1,module:1},_=w(),C={baseUrl:"./",paths:{},config:{},map:{},packages:[],waitSeconds:0,noRequests:{},urlArgs:{}};e.version="1.8.8",e.loader="esl",e.toUrl=_.toUrl;var H=[];i.amd={};var Q={},G={};e.config=function(n){if(n){for(var e in C){var t=n[e],r=C[e];if(t)if("urlArgs"===e&&"string"==typeof t)C.urlArgs["*"]=t;else if(r instanceof Array)r.push.apply(r,t);else if("object"==typeof r)for(var i in t)r[i]=t[i];else C[e]=t}k()}},k();var J,K,V,W,X,Y,Z,ne=document.getElementsByTagName("head")[0],ee=document.getElementsByTagName("base")[0];ee&&(ne=ee.parentNode),define||(define=i,require||(require=e),esl=e)}(this);

/*
* Licensed to the Apache Software Foundation (ASF) under one
* or more contributor license agreements.  See the NOTICE file
* distributed with this work for additional information
* regarding copyright ownership.  The ASF licenses this file
* to you under the Apache License, Version 2.0 (the
* "License"); you may not use this file except in compliance
* with the License.  You may obtain a copy of the License at
*
*   http://www.apache.org/licenses/LICENSE-2.0
*
* Unless required by applicable law or agreed to in writing,
* software distributed under the License is distributed on an
* "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY
* KIND, either express or implied.  See the License for the
* specific language governing permissions and limitations
* under the License.
*/

(function (context) {

    var DEFAULT_DATA_TABLE_LIMIT = 8;

    var objToString = Object.prototype.toString;
    var TYPED_ARRAY = {
        '[object Int8Array]': 1,
        '[object Uint8Array]': 1,
        '[object Uint8ClampedArray]': 1,
        '[object Int16Array]': 1,
        '[object Uint16Array]': 1,
        '[object Int32Array]': 1,
        '[object Uint32Array]': 1,
        '[object Float32Array]': 1,
        '[object Float64Array]': 1
    };

    var testHelper = {};


    /**
     * @param {Object} opt
     * @param {string|Array.<string>} [opt.title] If array, each item is on a single line.
     *        Can use '**abc**', means <strong>abc</strong>.
     * @param {Option} opt.option
     * @param {Object} [opt.info] info object to display.
     * @param {string} [opt.infoKey='option']
     * @param {Object|Array} [opt.dataTable]
     * @param {Array.<Object|Array>} [opt.dataTables] Multiple dataTables.
     * @param {number} [opt.dataTableLimit=DEFAULT_DATA_TABLE_LIMIT]
     * @param {number} [opt.width]
     * @param {number} [opt.height]
     * @param {boolean} [opt.draggable]
     * @param {boolean} [opt.lazyUpdate]
     * @param {boolean} [opt.notMerge]
     * @param {boolean} [opt.autoResize=true]
     * @param {Array.<Object>|Object} [opt.button] {text: ..., onClick: ...}, or an array of them.
     * @param {Array.<Object>|Object} [opt.buttons] {text: ..., onClick: ...}, or an array of them.
     * @param {boolean} [opt.recordCanvas] 'test/lib/canteen.js' is required.
     */
    testHelper.create = function (echarts, domOrId, opt) {
        var dom = getDom(domOrId);

        if (!dom) {
            return;
        }

        var title = document.createElement('div');
        var left = document.createElement('div');
        var chartContainer = document.createElement('div');
        var buttonsContainer = document.createElement('div');
        var dataTableContainer = document.createElement('div');
        var infoContainer = document.createElement('div');
        var recordCanvasContainer = document.createElement('div');

        title.setAttribute('title', dom.getAttribute('id'));

        title.className = 'test-title';
        dom.className = 'test-chart-block';
        left.className = 'test-chart-block-left';
        chartContainer.className = 'test-chart';
        buttonsContainer.className = 'test-buttons';
        dataTableContainer.className = 'test-data-table';
        infoContainer.className = 'test-info';
        recordCanvasContainer.className = 'record-canvas';

        if (opt.info) {
            dom.className += ' test-chart-block-has-right';
            infoContainer.className += ' test-chart-block-right';
        }

        left.appendChild(recordCanvasContainer);
        left.appendChild(buttonsContainer);
        left.appendChild(dataTableContainer);
        left.appendChild(chartContainer);
        dom.appendChild(infoContainer);
        dom.appendChild(left);
        dom.parentNode.insertBefore(title, dom);

        var chart;

        var optTitle = opt.title;
        if (optTitle) {
            if (optTitle instanceof Array) {
                optTitle = optTitle.join('\n');
            }
            title.innerHTML = '<div class="test-title-inner">'
                + testHelper.encodeHTML(optTitle)
                    .replace(/\*\*([^*]+?)\*\*/g, '<strong>$1</strong>')
                    .replace(/\n/g, '<br>')
                + '</div>';
        }

        if (opt.option) {
            chart = testHelper.createChart(echarts, chartContainer, opt.option, opt, opt.setOptionOpts);
        }

        var dataTables = opt.dataTables;
        if (!dataTables && opt.dataTable) {
            dataTables = [opt.dataTable];
        }
        if (dataTables) {
            var tableHTML = [];
            for (var i = 0; i < dataTables.length; i++) {
                tableHTML.push(createDataTableHTML(dataTables[i], opt));
            }
            dataTableContainer.innerHTML = tableHTML.join('');
        }

        var buttons = opt.buttons || opt.button;
        if (!(buttons instanceof Array)) {
            buttons = buttons ? [buttons] : [];
        }
        if (buttons.length) {
            for (var i = 0; i < buttons.length; i++) {
                var btnDefine = buttons[i];
                if (btnDefine) {
                    var btn = document.createElement('button');
                    btn.innerHTML = testHelper.encodeHTML(btnDefine.name || btnDefine.text || 'button');
                    btn.addEventListener('click', btnDefine.onClick || btnDefine.onclick);
                    buttonsContainer.appendChild(btn);
                }
            }
        }

        if (opt.info) {
            updateInfo(opt.info, opt.infoKey);
        }

        function updateInfo(info, infoKey) {
            infoContainer.innerHTML = createObjectHTML(info, infoKey || 'option');
        }

        initRecordCanvas(opt, chart, recordCanvasContainer);

        chart.__testHelper = {
            updateInfo: updateInfo
        };

        return chart;
    };

    function initRecordCanvas(opt, chart, recordCanvasContainer) {
        if (!opt.recordCanvas) {
            return;
        }
        recordCanvasContainer.innerHTML = ''
            + '<button>Show Canvas Record</button>'
            + '<button>Clear Canvas Record</button>'
            + '<div class="content-area"><textarea></textarea><br><button>Close</button></div>';
        var buttons = recordCanvasContainer.getElementsByTagName('button');
        var canvasRecordButton = buttons[0];
        var clearButton = buttons[1];
        var closeButton = buttons[2];
        var recordArea = recordCanvasContainer.getElementsByTagName('textarea')[0];
        var contentAraa = recordArea.parentNode;
        canvasRecordButton.addEventListener('click', function () {
            var content = [];
            eachCtx(function (zlevel, ctx) {
                content.push('\nLayer zlevel: ' + zlevel, '\n\n');
                if (typeof ctx.stack !== 'function') {
                    alert('Missing: <script src="test/lib/canteen.js"></script>');
                    return;
                }
                var stack = ctx.stack();
                for (var i = 0; i < stack.length; i++) {
                    var line = stack[i];
                    content.push(JSON.stringify(line), ',\n');
                }
            });
            contentAraa.style.display = 'block';
            recordArea.value = content.join('');
        });
        clearButton.addEventListener('click', function () {
            eachCtx(function (zlevel, ctx) {
                ctx.clear();
            });
            recordArea.value = 'Cleared.';
        });
        closeButton.addEventListener('click', function () {
            contentAraa.style.display = 'none';
        });

        function eachCtx(cb) {
            var layers = chart.getZr().painter.getLayers();
            for (var zlevel in layers) {
                if (layers.hasOwnProperty(zlevel)) {
                    var layer = layers[zlevel];
                    var canvas = layer.dom;
                    var ctx = canvas.getContext('2d');
                    cb(zlevel, ctx);
                }
            }
        }
    }

    /**
     * @param {ECharts} echarts
     * @param {HTMLElement|string} domOrId
     * @param {Object} option
     * @param {boolean|number} opt If number, means height
     * @param {boolean} opt.lazyUpdate
     * @param {boolean} opt.notMerge
     * @param {number} opt.width
     * @param {number} opt.height
     * @param {boolean} opt.draggable
     */
    testHelper.createChart = function (echarts, domOrId, option, opt) {
        if (typeof opt === 'number') {
            opt = {height: opt};
        }
        else {
            opt = opt || {};
        }

        var dom = getDom(domOrId);

        if (dom) {
            if (opt.width != null) {
                dom.style.width = opt.width + 'px';
            }
            if (opt.height != null) {
                dom.style.height = opt.height + 'px';
            }

            var chart = echarts.init(dom);

            if (opt.draggable) {
                if (!window.draggable) {
                    throw new Error(
                        'Pleasse add the script in HTML: \n'
                        + '<script src="lib/draggable.js"></script>'
                    );
                }
                window.draggable.init(dom, chart, {throttle: 70});
            }

            option && chart.setOption(option, {
                lazyUpdate: opt.lazyUpdate,
                notMerge: opt.notMerge
            });

            var isAutoResize = opt.autoResize == null ? true : opt.autoResize;
            if (isAutoResize) {
                testHelper.resizable(chart);
            }

            return chart;
        }
    };

    /**
     * @usage
     * ```js
     * testHelper.printAssert(chart, function (assert) {
     *     // If any error thrown here, a "checked: Fail" will be printed on the chart;
     *     // Otherwise, "checked: Pass" will be printed on the chart.
     *     assert(condition1);
     *     assert(condition2);
     *     assert(condition3);
     * });
     * ```
     * `testHelper.printAssert` can be called multiple times for one chart instance.
     * For each call, one result (fail or pass) will be printed.
     *
     * @param chartOrDomId {EChartsInstance | string}
     * @param checkFn {Function} param: a function `assert`.
     */
    testHelper.printAssert = function (chartOrDomId, checkerFn) {
        var hostDOMEl;
        var chart;
        if (typeof chartOrDomId === 'string') {
            hostDOMEl = document.getElementById(chartOrDomId);
        }
        else {
            chart = chartOrDomId;
            hostDOMEl = chartOrDomId.getDom();
        }
        var failErr;
        function assert(cond) {
            if (!cond) {
                throw new Error();
            }
        }
        try {
            checkerFn(assert);
        }
        catch (err) {
            console.error(err);
            failErr = err;
        }
        var printAssertRecord = hostDOMEl.__printAssertRecord || (hostDOMEl.__printAssertRecord = []);

        var resultDom = document.createElement('div');
        resultDom.innerHTML = failErr ? 'checked: Fail' : 'checked: Pass';
        var fontSize = 40;
        resultDom.style.cssText = [
            'position: absolute;',
            'left: 20px;',
            'font-size: ' + fontSize + 'px;',
            'z-index: ' + (failErr ? 99999 : 88888) + ';',
            'color: ' + (failErr ? 'red' : 'green') + ';',
        ].join('');
        printAssertRecord.push(resultDom);
        hostDOMEl.appendChild(resultDom);

        relayoutResult();

        function relayoutResult() {
            var chartHeight = chart ? chart.getHeight() : hostDOMEl.offsetHeight;
            var lineHeight = Math.min(fontSize + 10, (chartHeight - 20) / printAssertRecord.length);
            for (var i = 0; i < printAssertRecord.length; i++) {
                var record = printAssertRecord[i];
                record.style.top = (10 + i * lineHeight) + 'px';
            }
        }
    };


    var _dummyRequestAnimationFrameMounted = false;

    /**
     * Usage:
     * ```js
     * testHelper.controlFrame({pauseAt: 60});
     * // Then load echarts.js (must after controlFrame called)
     * ```
     *
     * @param {Object} [opt]
     * @param {number} [opt.puaseAt] If specified `pauseAt`, auto pause at the frame.
     * @param {Function} [opt.onFrame]
     */
    testHelper.controlFrame = function (opt) {
        opt = opt || {};
        var pauseAt = opt.pauseAt;
        pauseAt == null && (pauseAt = 0);

        var _running = true;
        var _pendingCbList = [];
        var _frameNumber = 0;
        var _mounted = false;

        function getRunBtnText() {
            return _running ? 'pause' : 'run';
        }

        var buttons = [{
            text: getRunBtnText(),
            onclick: function () {
                buttons[0].el.innerHTML = getRunBtnText();
                _running ? pause() : run();
            }
        }, {
            text: 'next frame',
            onclick: nextFrame
        }];

        var btnPanel = document.createElement('div');
        btnPanel.className = 'control-frame-btn-panel'
        var infoEl = document.createElement('div');
        infoEl.className = 'control-frame-info';
        btnPanel.appendChild(infoEl);
        document.body.appendChild(btnPanel);
        for (var i = 0; i < buttons.length; i++) {
            var button = buttons[i];
            var btnEl = button.el = document.createElement('button');
            btnEl.innerHTML = button.text;
            btnEl.addEventListener('click', button.onclick);
            btnPanel.appendChild(btnEl);
        }

        if (_dummyRequestAnimationFrameMounted) {
            throw new Error('Do not support `controlFrame` twice');
        }
        _dummyRequestAnimationFrameMounted = true;
        var raf = window.requestAnimationFrame;
        window.requestAnimationFrame = function (cb) {
            _pendingCbList.push(cb);
            if (_running && !_mounted) {
                _mounted = true;
                raf(nextFrame);
            }
        };

        function run() {
            _running = true;
            nextFrame();
        }

        function pause() {
            _running = false;
        }

        function nextFrame() {
            opt.onFrame && opt.onFrame(_frameNumber);

            if (pauseAt != null && _frameNumber === pauseAt) {
                _running = false;
                pauseAt = null;
            }
            infoEl.innerHTML = 'Frame: ' + _frameNumber + ' ( ' + (_running ? 'Running' : 'Paused') + ' )';
            buttons[0].el.innerHTML = getRunBtnText();

            _mounted = false;
            var pending = _pendingCbList;
            _pendingCbList = [];
            for (var i = 0; i < pending.length; i++) {
                pending[i]();
            }
            _frameNumber++;
        }
    }

    testHelper.resizable = function (chart) {
        var dom = chart.getDom();
        var width = dom.clientWidth;
        var height = dom.clientHeight;
        function resize() {
            var newWidth = dom.clientWidth;
            var newHeight = dom.clientHeight;
            if (width !== newWidth || height !== newHeight) {
                chart.resize();
                width = newWidth;
                height = newHeight;
            }
        }
        if (window.attachEvent) {
            // Use builtin resize in IE
            window.attachEvent('onresize', chart.resize);
        }
        else if (window.addEventListener) {
            window.addEventListener('resize', resize, false);
        }
    };

    // Clean params specified by `cleanList` and seed a param specifid by `newVal` in URL.
    testHelper.setURLParam = function (cleanList, newVal) {
        var params = getParamListFromURL();
        for (var i = params.length - 1; i >= 0; i--) {
            for (var j = 0; j < cleanList.length; j++) {
                if (params[i] === cleanList[j]) {
                    params.splice(i, 1);
                }
            }
        }
        newVal && params.push(newVal);
        params.sort();
        location.search = params.join('&');
    };

    // Whether has param `val` in URL.
    testHelper.hasURLParam = function (val) {
        var params = getParamListFromURL();
        for (var i = params.length - 1; i >= 0; i--) {
            if (params[i] === val) {
                return true;
            }
        }
        return false;
    };

    // Nodejs `path.resolve`.
    testHelper.resolve = function () {
        var resolvedPath = '';
        var resolvedAbsolute;

        for (var i = arguments.length - 1; i >= 0 && !resolvedAbsolute; i--) {
            var path = arguments[i];
            if (path) {
                resolvedPath = path + '/' + resolvedPath;
                resolvedAbsolute = path[0] === '/';
            }
        }

        if (!resolvedAbsolute) {
            throw new Error('At least one absolute path should be input.');
        }

        // Normalize the path
        resolvedPath = normalizePathArray(resolvedPath.split('/'), false).join('/');

        return '/' + resolvedPath;
    };

    testHelper.encodeHTML = function (source) {
        return String(source)
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;')
            .replace(/'/g, '&#39;');
    };

    /**
     * @public
     * @return {string} Current url dir.
     */
    testHelper.dir = function () {
        return location.origin + testHelper.resolve(location.pathname, '..');
    };

    /**
     * Not accurate.
     * @param {*} type
     * @return {string} 'function', 'array', 'typedArray', 'regexp',
     *       'date', 'object', 'boolean', 'number', 'string'
     */
    var getType = testHelper.getType = function (value) {
        var type = typeof value;
        var typeStr = objToString.call(value);

        return !!TYPED_ARRAY[objToString.call(value)]
            ? 'typedArray'
            : typeof type === 'function'
            ? 'function'
            : typeStr === '[object Array]'
            ? 'array'
            : typeStr === '[object Number]'
            ? 'number'
            : typeStr === '[object Boolean]'
            ? 'boolean'
            : typeStr === '[object String]'
            ? 'string'
            : typeStr === '[object RegExp]'
            ? 'regexp'
            : typeStr === '[object Date]'
            ? 'date'
            : !!value && type === 'object'
            ? 'object'
            : null;
    };

    /**
     * JSON.stringify(obj, null, 2) will vertically layout array, which takes too much space.
     * Can print like:
     * [
     *     {name: 'xxx', value: 123},
     *     {name: 'xxx', value: 123},
     *     {name: 'xxx', value: 123}
     * ]
     * {
     *     arr: [33, 44, 55],
     *     str: 'xxx'
     * }
     *
     * @param {*} object
     * @param {opt|string} [opt] If string, means key.
     * @param {string} [opt.key=''] Top level key, if given, print like: 'someKey: [asdf]'
     * @param {string} [opt.objectLineBreak=true]
     * @param {string} [opt.arrayLineBreak=false]
     * @param {string} [opt.indent=4]
     * @param {string} [opt.lineBreak='\n']
     * @param {string} [opt.quotationMark='\'']
     */
    var printObject = testHelper.printObject = function (obj, opt) {
        opt = typeof opt === 'string'
            ? {key: opt}
            : (opt || {});

        var indent = opt.indent != null ? opt.indent : 4;
        var lineBreak = opt.lineBreak != null ? opt.lineBreak : '\n';
        var quotationMark = opt.quotationMark != null ? opt.quotationMark : '\'';

        return doPrint(obj, opt.key, 0).str;

        function doPrint(obj, key, depth) {
            var codeIndent = (new Array(depth * indent + 1)).join(' ');
            var subCodeIndent = (new Array((depth + 1) * indent + 1)).join(' ');
            var hasLineBreak = false;

            var preStr = key != null ? (key + ': ' ) : '';
            var str;

            var objType = getType(obj);

            switch (objType) {
                case 'function':
                    hasLineBreak = true;
                    str = preStr + quotationMark + obj + quotationMark;
                    break;
                case 'regexp':
                case 'date':
                    str = preStr + quotationMark + obj + quotationMark;
                    break;
                case 'array':
                case 'typedArray':
                    hasLineBreak = opt.arrayLineBreak != null ? opt.arrayLineBreak : false;
                    // If no break line in array, print in single line, like [12, 23, 34].
                    // else, each item takes a line.
                    var childBuilder = [];
                    for (var i = 0, len = obj.length; i < len; i++) {
                        var subResult = doPrint(obj[i], null, depth + 1);
                        childBuilder.push(subResult.str);
                        if (subResult.hasLineBreak) {
                            hasLineBreak = true;
                        }
                    }
                    var tail = hasLineBreak ? lineBreak : '';
                    var delimiter = ',' + (hasLineBreak ? (lineBreak + subCodeIndent) : ' ');
                    var subPre = hasLineBreak ? subCodeIndent : '';
                    var endPre = hasLineBreak ? codeIndent : '';
                    str = ''
                        + preStr + '[' + tail
                        + subPre + childBuilder.join(delimiter) + tail
                        + endPre + ']';
                    break;
                case 'object':
                    hasLineBreak = opt.objectLineBreak != null ? opt.objectLineBreak : true;
                    var childBuilder = [];
                    for (var i in obj) {
                        if (obj.hasOwnProperty(i)) {
                            var subResult = doPrint(obj[i], i, depth + 1);
                            childBuilder.push(subResult.str);
                            if (subResult.hasLineBreak) {
                                hasLineBreak = true;
                            }
                        }
                    }
                    str = ''
                        + preStr + '{' + (hasLineBreak ? lineBreak : '')
                        + (childBuilder.length
                            ? (hasLineBreak ? subCodeIndent : '') + childBuilder.join(',' + (hasLineBreak ? lineBreak + subCodeIndent: ' ')) + (hasLineBreak ? lineBreak: '')
                            : ''
                        )
                        + (hasLineBreak ? codeIndent : '') + '}';
                    break;
                case 'boolean':
                case 'number':
                    str = preStr + obj + '';
                    break;
                case 'string':
                    str = JSON.stringify(obj); // escapse \n\r or others.
                    str = preStr + quotationMark + str.slice(1, str.length - 1) + quotationMark;
                    break;
                default:
                    str = preStr + obj + '';
            }

            return {
                str: str,
                hasLineBreak: hasLineBreak
            };
        }
    };

    /**
     * Usage:
     * ```js
     * // Print all elements that has `style.text`:
     * var str = testHelper.stringifyElements(chart, {
     *     attr: ['z', 'z2', 'style.text', 'style.fill', 'style.stroke'],
     *     filter: el => el.style && el.style.text
     * });
     * ```
     *
     * @param {EChart} chart
     * @param {Object} [opt]
     * @param {string|Array.<string>} [opt.attr] Only print the given attrName;
     *        For example: 'z2' or ['z2', 'style.fill', 'style.stroke']
     * @param {function} [opt.filter] print a subtree only if any satisfied node exists.
     *        param: el, return: boolean
     */
    testHelper.stringifyElements = function (chart, opt) {
        if (!chart) {
            return;
        }
        opt = opt || {};
        var attrNameList = opt.attr;
        if (getType(attrNameList) !== 'array') {
            attrNameList = attrNameList ? [attrNameList] : [];
        }

        var zr = chart.getZr();
        var roots = zr.storage.getRoots();
        var plainRoots = [];

        retrieve(roots, plainRoots);

        var elsStr = printObject(plainRoots, {indent: 2});

        return elsStr;

        // Only retrieve the value of the given attrName.
        function retrieve(elList, plainNodes) {
            var anySatisfied = false;
            for (var i = 0; i < elList.length; i++) {
                var el = elList[i];

                var thisElSatisfied = !opt.filter || opt.filter(el);

                var plainNode = {};

                copyElment(plainNode, el);

                var textContent = el.getTextContent();
                if (textContent) {
                    plainNode.textContent = {};
                    copyElment(plainNode.textContent, textContent);
                }

                var thisSubAnySatisfied = false;
                if (el.isGroup) {
                    plainNode.children = [];
                    thisSubAnySatisfied = retrieve(el.childrenRef(), plainNode.children);
                }

                if (thisElSatisfied || thisSubAnySatisfied) {
                    plainNodes.push(plainNode);
                    anySatisfied = true;
                }
            }

            return anySatisfied;
        }

        function copyElment(plainNode, el) {
            for (var i = 0; i < attrNameList.length; i++) {
                var attrName = attrNameList[i];
                var attrParts = attrName.split('.');
                var partsLen = attrParts.length;
                if (!partsLen) {
                    continue;
                }
                var elInner = el;
                var plainInner = plainNode;
                for (var j = 0; j < partsLen - 1 && elInner; j++) {
                    var attr = attrParts[j];
                    elInner = el[attr];
                    if (elInner) {
                        plainInner = plainInner[attr] || (plainInner[attr] = {});
                    }
                }
                var attr = attrParts[partsLen - 1];
                if (elInner && elInner.hasOwnProperty(attr)) {
                    plainInner[attr] = elInner[attr];
                }
            }
        }
    };

    /**
     * Usage:
     * ```js
     * // Print all elements that has `style.text`:
     * testHelper.printElements(chart, {
     *     attr: ['z', 'z2', 'style.text', 'style.fill', 'style.stroke'],
     *     filter: el => el.style && el.style.text
     * });
     * ```
     *
     * @see `stringifyElements`.
     */
    testHelper.printElements = function (chart, opt) {
        var elsStr = testHelper.stringifyElements(chart, opt);
        console.log(elsStr);
    };

    /**
     * Usage:
     * ```js
     * // Print all elements that has `style.text`:
     * testHelper.retrieveElements(chart, {
     *     filter: el => el.style && el.style.text
     * });
     * ```
     *
     * @param {EChart} chart
     * @param {Object} [opt]
     * @param {function} [opt.filter] print a subtree only if any satisfied node exists.
     *        param: el, return: boolean
     * @return {Array.<Element>}
     */
    testHelper.retrieveElements = function (chart, opt) {
        if (!chart) {
            return;
        }
        opt = opt || {};
        var attrNameList = opt.attr;
        if (getType(attrNameList) !== 'array') {
            attrNameList = attrNameList ? [attrNameList] : [];
        }

        var zr = chart.getZr();
        var roots = zr.storage.getRoots();
        var result = [];

        retrieve(roots);

        function retrieve(elList) {
            for (var i = 0; i < elList.length; i++) {
                var el = elList[i];
                if (!opt.filter || opt.filter(el)) {
                    result.push(el);
                }
                if (el.isGroup) {
                    retrieve(el.childrenRef());
                }
            }
        }

        return result;
    };

    // opt: {record: JSON, width: number, height: number}
    testHelper.reproduceCanteen = function (opt) {
        var canvas = document.createElement('canvas');
        canvas.style.width = opt.width + 'px';
        canvas.style.height = opt.height + 'px';
        var dpr = Math.max(window.devicePixelRatio || 1, 1);
        canvas.width = opt.width * dpr;
        canvas.height = opt.height * dpr;

        var ctx = canvas.getContext('2d');
        var record = opt.record;

        for (var i = 0; i < record.length; i++) {
            var line = record[i];
            if (line.attr) {
                if (!line.hasOwnProperty('val')) {
                    alertIllegal(line);
                }
                ctx[line.attr] = line.val;
            }
            else if (line.method) {
                if (!line.hasOwnProperty('arguments')) {
                    alertIllegal(line);
                }
                ctx[line.method].apply(ctx, line.arguments);
            }
            else {
                alertIllegal(line);
            }
        }

        function alertIllegal(line) {
            throw new Error('Illegal line: ' + JSON.stringify(line));
        }

        document.body.appendChild(canvas);
    };

    function createDataTableHTML(data, opt) {
        var sourceFormat = detectSourceFormat(data);
        var dataTableLimit = opt.dataTableLimit || DEFAULT_DATA_TABLE_LIMIT;

        if (!sourceFormat) {
            return '';
        }

        var html = ['<table><tbody>'];

        if (sourceFormat === 'arrayRows') {
            for (var i = 0; i < data.length && i <= dataTableLimit; i++) {
                var line = data[i];
                var htmlLine = ['<tr>'];
                for (var j = 0; j < line.length; j++) {
                    var val = i === dataTableLimit ? '...' : line[j];
                    htmlLine.push('<td>' + testHelper.encodeHTML(val) + '</td>');
                }
                htmlLine.push('</tr>');
                html.push(htmlLine.join(''));
            }
        }
        else if (sourceFormat === 'objectRows') {
            for (var i = 0; i < data.length && i <= dataTableLimit; i++) {
                var line = data[i];
                var htmlLine = ['<tr>'];
                for (var key in line) {
                    if (line.hasOwnProperty(key)) {
                        var keyText = i === dataTableLimit ? '...' : key;
                        htmlLine.push('<td class="test-data-table-key">' + testHelper.encodeHTML(keyText) + '</td>');
                        var val = i === dataTableLimit ? '...' : line[key];
                        htmlLine.push('<td>' + testHelper.encodeHTML(val) + '</td>');
                    }
                }
                htmlLine.push('</tr>');
                html.push(htmlLine.join(''));
            }
        }
        else if (sourceFormat === 'keyedColumns') {
            for (var key in data) {
                var htmlLine = ['<tr>'];
                htmlLine.push('<td class="test-data-table-key">' + testHelper.encodeHTML(key) + '</td>');
                if (data.hasOwnProperty(key)) {
                    var col = data[key] || [];
                    for (var i = 0; i < col.length && i <= dataTableLimit; i++) {
                        var val = i === dataTableLimit ? '...' : col[i];
                        htmlLine.push('<td>' + testHelper.encodeHTML(val) + '</td>');
                    }
                }
                htmlLine.push('</tr>');
                html.push(htmlLine.join(''));
            }
        }

        html.push('</tbody></table>');

        return html.join('');
    }

    function detectSourceFormat(data) {
        if (data.length) {
            for (var i = 0, len = data.length; i < len; i++) {
                var item = data[i];

                if (item == null) {
                    continue;
                }
                else if (item.length) {
                    return 'arrayRows';
                }
                else if (typeof data === 'object') {
                    return 'objectRows';
                }
            }
        }
        else if (typeof data === 'object') {
            return 'keyedColumns';
        }
    }

    function createObjectHTML(obj, key) {
        var html = isObject(obj)
            ? testHelper.encodeHTML(printObject(obj, key))
            : obj
            ? obj.toString()
            : '';

        return [
            '<pre class="test-print-object">',
            html,
            '</pre>'
        ].join('');
    }

    var getDom = testHelper.getDom = function (domOrId) {
        return getType(domOrId) === 'string' ? document.getElementById(domOrId) : domOrId;
    }


    // resolves . and .. elements in a path array with directory names there
    // must be no slashes or device names (c:\) in the array
    // (so also no leading and trailing slashes - it does not distinguish
    // relative and absolute paths)
    function normalizePathArray(parts, allowAboveRoot) {
        var res = [];
        for (var i = 0; i < parts.length; i++) {
            var p = parts[i];

            // ignore empty parts
            if (!p || p === '.') {
                continue;
            }

            if (p === '..') {
                if (res.length && res[res.length - 1] !== '..') {
                    res.pop();
                } else if (allowAboveRoot) {
                    res.push('..');
                }
            } else {
                res.push(p);
            }
        }

        return res;
    }

    function getParamListFromURL() {
        var params = location.search.replace('?', '');
        return params ? params.split('&') : [];
    }

    function isObject(value) {
        // Avoid a V8 JIT bug in Chrome 19-20.
        // See https://code.google.com/p/v8/issues/detail?id=2291 for more details.
        const type = typeof value;
        return type === 'function' || (!!value && type === 'object');
    }

    context.testHelper = testHelper;

})(window);