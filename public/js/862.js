(self.webpackChunk=self.webpackChunk||[]).push([[862],{784:(e,t,o)=>{"use strict";o.d(t,{Z:()=>a});var r=o(3645),n=o.n(r)()((function(e){return e[1]}));n.push([e.id,".fade-appear-enter-active[data-v-bc5148d0]{-webkit-animation:fade-appear-bc5148d0 .2s;animation:fade-appear-bc5148d0 .2s}.fade-appear-leave-active[data-v-bc5148d0]{animation:fade-appear-bc5148d0 .2s reverse}@-webkit-keyframes fade-appear-bc5148d0{0%{transform:scale(.9);opacity:0}to{transform:scale(1);opacity:1}}@keyframes fade-appear-bc5148d0{0%{transform:scale(.9);opacity:0}to{transform:scale(1);opacity:1}}.fade-appear-above-enter-active[data-v-bc5148d0]{-webkit-animation:fade-appear-above-bc5148d0 .2s;animation:fade-appear-above-bc5148d0 .2s}.fade-appear-above-leave-active[data-v-bc5148d0]{animation:fade-appear-above-bc5148d0 .2s reverse}@-webkit-keyframes fade-appear-above-bc5148d0{0%{transform:scale(.9);transform:translateY(0);opacity:0}to{transform:scale(1);transform:translateY(-120%);opacity:1}}@keyframes fade-appear-above-bc5148d0{0%{transform:scale(.9);transform:translateY(0);opacity:0}to{transform:scale(1);transform:translateY(-120%);opacity:1}}",""]);const a=n},3645:e=>{"use strict";e.exports=function(e){var t=[];return t.toString=function(){return this.map((function(t){var o=e(t);return t[2]?"@media ".concat(t[2]," {").concat(o,"}"):o})).join("")},t.i=function(e,o,r){"string"==typeof e&&(e=[[null,e,""]]);var n={};if(r)for(var a=0;a<this.length;a++){var c=this[a][0];null!=c&&(n[c]=!0)}for(var l=0;l<e.length;l++){var i=[].concat(e[l]);r&&n[i[0]]||(o&&(i[2]?i[2]="".concat(o," and ").concat(i[2]):i[2]=o),t.push(i))}},t}},3379:(e,t,o)=>{"use strict";var r,n=function(){return void 0===r&&(r=Boolean(window&&document&&document.all&&!window.atob)),r},a=function(){var e={};return function(t){if(void 0===e[t]){var o=document.querySelector(t);if(window.HTMLIFrameElement&&o instanceof window.HTMLIFrameElement)try{o=o.contentDocument.head}catch(e){o=null}e[t]=o}return e[t]}}(),c=[];function l(e){for(var t=-1,o=0;o<c.length;o++)if(c[o].identifier===e){t=o;break}return t}function i(e,t){for(var o={},r=[],n=0;n<e.length;n++){var a=e[n],i=t.base?a[0]+t.base:a[0],s=o[i]||0,d="".concat(i," ").concat(s);o[i]=s+1;var u=l(d),p={css:a[1],media:a[2],sourceMap:a[3]};-1!==u?(c[u].references++,c[u].updater(p)):c.push({identifier:d,updater:v(p,t),references:1}),r.push(d)}return r}function s(e){var t=document.createElement("style"),r=e.attributes||{};if(void 0===r.nonce){var n=o.nc;n&&(r.nonce=n)}if(Object.keys(r).forEach((function(e){t.setAttribute(e,r[e])})),"function"==typeof e.insert)e.insert(t);else{var c=a(e.insert||"head");if(!c)throw new Error("Couldn't find a style target. This probably means that the value for the 'insert' parameter is invalid.");c.appendChild(t)}return t}var d,u=(d=[],function(e,t){return d[e]=t,d.filter(Boolean).join("\n")});function p(e,t,o,r){var n=o?"":r.media?"@media ".concat(r.media," {").concat(r.css,"}"):r.css;if(e.styleSheet)e.styleSheet.cssText=u(t,n);else{var a=document.createTextNode(n),c=e.childNodes;c[t]&&e.removeChild(c[t]),c.length?e.insertBefore(a,c[t]):e.appendChild(a)}}function f(e,t,o){var r=o.css,n=o.media,a=o.sourceMap;if(n?e.setAttribute("media",n):e.removeAttribute("media"),a&&"undefined"!=typeof btoa&&(r+="\n/*# sourceMappingURL=data:application/json;base64,".concat(btoa(unescape(encodeURIComponent(JSON.stringify(a))))," */")),e.styleSheet)e.styleSheet.cssText=r;else{for(;e.firstChild;)e.removeChild(e.firstChild);e.appendChild(document.createTextNode(r))}}var h=null,m=0;function v(e,t){var o,r,n;if(t.singleton){var a=m++;o=h||(h=s(t)),r=p.bind(null,o,a,!1),n=p.bind(null,o,a,!0)}else o=s(t),r=f.bind(null,o,t),n=function(){!function(e){if(null===e.parentNode)return!1;e.parentNode.removeChild(e)}(o)};return r(e),function(t){if(t){if(t.css===e.css&&t.media===e.media&&t.sourceMap===e.sourceMap)return;r(e=t)}else n()}}e.exports=function(e,t){(t=t||{}).singleton||"boolean"==typeof t.singleton||(t.singleton=n());var o=i(e=e||[],t);return function(e){if(e=e||[],"[object Array]"===Object.prototype.toString.call(e)){for(var r=0;r<o.length;r++){var n=l(o[r]);c[n].references--}for(var a=i(e,t),s=0;s<o.length;s++){var d=l(o[s]);0===c[d].references&&(c[d].updater(),c.splice(d,1))}o=a}}}},3528:(e,t,o)=>{"use strict";o.d(t,{Z:()=>p});var r=o(5166),n=(0,r.withScopeId)("data-v-bc5148d0");(0,r.pushScopeId)("data-v-bc5148d0");var a={class:"relative inline-block text-left",ref:"dropdown"};(0,r.popScopeId)();var c=n((function(e,t,o,c,l,i){return(0,r.openBlock)(),(0,r.createBlock)("div",a,[l.show?((0,r.openBlock)(),(0,r.createBlock)("div",{key:0,class:"fixed inset-0 bg-black bg-opacity-25 z-10",onClick:t[1]||(t[1]=function(e){return l.show=!1})})):(0,r.createCommentVNode)("",!0),(0,r.createVNode)("button",{onClick:t[2]||(t[2]=function(){return i.toggle&&i.toggle.apply(i,arguments)}),type:"button"},[(0,r.renderSlot)(e.$slots,"default")]),(0,r.createVNode)(r.Transition,{name:l.dropup?"fade-appear-above":"fade-appear"},{default:n((function(){return[l.show?((0,r.openBlock)(),(0,r.createBlock)("div",{key:0,class:["origin-top-right absolute right-0 w-auto rounded-md shadow-lg z-20",{" -translate-y-full":l.dropup}]},[(0,r.createVNode)("div",{onClick:t[3]||(t[3]=(0,r.withModifiers)((function(e){return l.show=!o.autoClose}),["stop"]))},[(0,r.renderSlot)(e.$slots,"dropdown")])],2)):(0,r.createCommentVNode)("",!0)]})),_:1},8,["name"])],512)}));const l={props:{autoClose:{type:Boolean,default:!0}},setup:function(){var e=this,t=function(t){27===t.keyCode&&(e.show=!1)};document.addEventListener("keydown",t),(0,r.onUnmounted)((function(){return window.removeEventListener("keydown",t)}))},data:function(){return{show:!1,dropup:!1,dropupThreshold:.8}},methods:{toggle:function(){this.show||(this.dropup=this.$refs.dropdown.offsetTop/(window.innerHeight+window.scrollY)>this.dropupThreshold),this.show=!this.show}}};var i=o(3379),s=o.n(i),d=o(784),u={insert:"head",singleton:!1};s()(d.Z,u);d.Z.locals;l.render=c,l.__scopeId="data-v-bc5148d0";const p=l},9875:(e,t,o)=>{"use strict";o.d(t,{Z:()=>w});var r=o(5166),n={key:0,viewBox:"0 0 320 512"},a=(0,r.createVNode)("path",{fill:"currentColor",d:"M143 256.3L7 120.3c-9.4-9.4-9.4-24.6 0-33.9l22.6-22.6c9.4-9.4 24.6-9.4 33.9 0l96.4 96.4 96.4-96.4c9.4-9.4 24.6-9.4 33.9 0L313 86.3c9.4 9.4 9.4 24.6 0 33.9l-136 136c-9.4 9.5-24.6 9.5-34 .1zm34 192l136-136c9.4-9.4 9.4-24.6 0-33.9l-22.6-22.6c-9.4-9.4-24.6-9.4-33.9 0L160 352.1l-96.4-96.4c-9.4-9.4-24.6-9.4-33.9 0L7 278.3c-9.4 9.4-9.4 24.6 0 33.9l136 136c9.4 9.5 24.6 9.5 34 .1z"},null,-1),c={key:1,viewBox:"0 0 448 512"},l=(0,r.createVNode)("path",{fill:"currentColor",d:"M277.37 11.98C261.08 4.47 243.11 0 224 0c-53.69 0-99.5 33.13-118.51 80h81.19l90.69-68.02zM342.51 80c-7.9-19.47-20.67-36.2-36.49-49.52L239.99 80h102.52zM224 256c70.69 0 128-57.31 128-128 0-5.48-.95-10.7-1.61-16H97.61c-.67 5.3-1.61 10.52-1.61 16 0 70.69 57.31 128 128 128zM80 299.7V512h128.26l-98.45-221.52A132.835 132.835 0 0 0 80 299.7zM0 464c0 26.51 21.49 48 48 48V320.24C18.88 344.89 0 381.26 0 422.4V464zm256-48h-55.38l42.67 96H256c26.47 0 48-21.53 48-48s-21.53-48-48-48zm57.6-128h-16.71c-22.24 10.18-46.88 16-72.89 16s-50.65-5.82-72.89-16h-7.37l42.67 96H256c44.11 0 80 35.89 80 80 0 18.08-6.26 34.59-16.41 48H400c26.51 0 48-21.49 48-48v-41.6c0-74.23-60.17-134.4-134.4-134.4z"},null,-1),i={key:2,viewBox:"0 0 576 512"},s=(0,r.createVNode)("path",{fill:"currentColor",d:"M288 115L69.47 307.71c-1.62 1.46-3.69 2.14-5.47 3.35V496a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V311.1c-1.7-1.16-3.72-1.82-5.26-3.2zm96 261a8 8 0 0 1-8 8h-56v56a8 8 0 0 1-8 8h-48a8 8 0 0 1-8-8v-56h-56a8 8 0 0 1-8-8v-48a8 8 0 0 1 8-8h56v-56a8 8 0 0 1 8-8h48a8 8 0 0 1 8 8v56h56a8 8 0 0 1 8 8zm186.69-139.72l-255.94-226a39.85 39.85 0 0 0-53.45 0l-256 226a16 16 0 0 0-1.21 22.6L25.5 282.7a16 16 0 0 0 22.6 1.21L277.42 81.63a16 16 0 0 1 21.17 0L527.91 283.9a16 16 0 0 0 22.6-1.21l21.4-23.82a16 16 0 0 0-1.22-22.59z"},null,-1),d={key:3,viewBox:"0 0 640 512"},u=(0,r.createVNode)("path",{fill:"currentColor",d:"M528 224H272c-8.8 0-16 7.2-16 16v144H64V144c0-8.8-7.2-16-16-16H16c-8.8 0-16 7.2-16 16v352c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16v-48h512v48c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V336c0-61.9-50.1-112-112-112zM136 96h126.1l27.6 55.2c5.9 11.8 22.7 11.8 28.6 0L368 51.8 390.1 96H512c8.8 0 16-7.2 16-16s-7.2-16-16-16H409.9L382.3 8.8C376.4-3 359.6-3 353.7 8.8L304 108.2l-19.9-39.8c-1.4-2.7-4.1-4.4-7.2-4.4H136c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8zm24 256c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64z"},null,-1),p={key:4,viewBox:"0 0 448 512"},f=(0,r.createVNode)("path",{fill:"currentColor",d:"M224.3 273l-136 136c-9.4 9.4-24.6 9.4-33.9 0l-22.6-22.6c-9.4-9.4-9.4-24.6 0-33.9l96.4-96.4-96.4-96.4c-9.4-9.4-9.4-24.6 0-33.9L54.3 103c9.4-9.4 24.6-9.4 33.9 0l136 136c9.5 9.4 9.5 24.6.1 34zm192-34l-136-136c-9.4-9.4-24.6-9.4-33.9 0l-22.6 22.6c-9.4 9.4-9.4 24.6 0 33.9l96.4 96.4-96.4 96.4c-9.4 9.4-9.4 24.6 0 33.9l22.6 22.6c9.4 9.4 24.6 9.4 33.9 0l136-136c9.4-9.2 9.4-24.4 0-33.8z"},null,-1),h={key:5,viewBox:"0 0 352 512"},m=(0,r.createVNode)("path",{fill:"currentColor",d:"M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z"},null,-1),v={key:6,viewBox:"0 0 512 512"},b=(0,r.createVNode)("path",{fill:"currentColor",d:"M256 8C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8zm0 110c23.196 0 42 18.804 42 42s-18.804 42-42 42-42-18.804-42-42 18.804-42 42-42zm56 254c0 6.627-5.373 12-12 12h-88c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h12v-64h-12c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h64c6.627 0 12 5.373 12 12v100h12c6.627 0 12 5.373 12 12v24z"},null,-1);const g={props:{name:{type:String,required:!0}},render:function(e,t,o,g,w,k){return"double-down"===o.name?((0,r.openBlock)(),(0,r.createBlock)("svg",n,[a])):"patient"===o.name?((0,r.openBlock)(),(0,r.createBlock)("svg",c,[l])):"clinic"===o.name?((0,r.openBlock)(),(0,r.createBlock)("svg",i,[s])):"procedure"===o.name?((0,r.openBlock)(),(0,r.createBlock)("svg",d,[u])):"double-right"===o.name?((0,r.openBlock)(),(0,r.createBlock)("svg",p,[f])):"times"===o.name?((0,r.openBlock)(),(0,r.createBlock)("svg",h,[m])):"info-circle"===o.name?((0,r.openBlock)(),(0,r.createBlock)("svg",v,[b])):(0,r.createCommentVNode)("",!0)}},w=g},8078:(e,t,o)=>{"use strict";o.d(t,{Z:()=>S});var r=o(5166),n={class:"md:h-screen md:flex md:flex-col"},a={class:"md:flex md:flex-shrink-0 sticky top-0 z-30"},c={class:"bg-dark-theme-light text-white md:flex-shrink-0 md:w-56 xl:w-64 px-4 py-2 flex items-center justify-between md:justify-center"},l=(0,r.createVNode)("span",{class:"font-lobster font-bold text-lg md:text-4xl"},"@round.",-1),i={class:"text-soft-theme-light text-sm md:hidden"},s=(0,r.createVNode)("svg",{class:"w-6 h-6",xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 512 512"},[(0,r.createVNode)("path",{fill:"currentColor",d:"M464 256H48a48 48 0 0 0 0 96h416a48 48 0 0 0 0-96zm16 128H32a16 16 0 0 0-16 16v16a64 64 0 0 0 64 64h352a64 64 0 0 0 64-64v-16a16 16 0 0 0-16-16zM58.64 224h394.72c34.57 0 54.62-43.9 34.82-75.88C448 83.2 359.55 32.1 256 32c-103.54.1-192 51.2-232.18 116.11C4 180.09 24.07 224 58.64 224zM384 112a16 16 0 1 1-16 16 16 16 0 0 1 16-16zM256 80a16 16 0 1 1-16 16 16 16 0 0 1 16-16zm-128 32a16 16 0 1 1-16 16 16 16 0 0 1 16-16z"})],-1),d={class:"hidden md:flex w-full font-semibold text-dark-theme-light bg-alt-theme-light border-b sticky top-0 z-30 p-4 md:py-0 md:px-12 justify-between items-center"},u={class:"mt-1 mr-4"},p={class:"flex items-center cursor-pointer select-none group"},f={class:"group-hover:text-bitter-theme-light focus:text-bitter-theme-light mr-1 whitespace-no-wrap"},h={class:"mt-2 py-2 shadow-xl bg-thick-theme-light text-white cursor-pointer rounded text-sm"},m=(0,r.createTextVNode)(" Preferences "),v=(0,r.createTextVNode)(" Logout "),b={class:"p-4"},g={class:"inline-block py-1 text-white"},w=(0,r.createTextVNode)(" Preferences "),k=(0,r.createTextVNode)(" Logout "),x=(0,r.createVNode)("hr",{class:"my-4"},null,-1),y={class:"md:flex md:flex-grow md:overflow-hidden"},V={class:"w-full p-4 md:overflow-y-auto md:py-12 lg:px-8 xl:px-10","scroll-region":""};var N=o(3528),C=o(9875),B={class:"mb-4"};const M={components:{Icon:C.Z},props:{url:{type:String,default:""}},methods:{isUrl:function(){for(var e=this,t=arguments.length,o=new Array(t),r=0;r<t;r++)o[r]=arguments[r];return""===o[0]?""===this.url:o.filter((function(t){return e.url.startsWith(t)})).length}},render:function(e,t,o,n,a,c){var l=(0,r.resolveComponent)("icon"),i=(0,r.resolveComponent)("inertia-link");return(0,r.openBlock)(),(0,r.createBlock)("div",null,[(0,r.createVNode)("div",B,[((0,r.openBlock)(!0),(0,r.createBlock)(r.Fragment,null,(0,r.renderList)(e.$page.props.user.mainMenuLinks,(function(t,o){return(0,r.openBlock)(),(0,r.createBlock)(i,{class:"flex items-center group py-2 outline-none",href:"".concat(e.$page.props.app.baseUrl,"/").concat(t.route),key:o},{default:(0,r.withCtx)((function(){return[(0,r.createVNode)(l,{name:t.icon,class:["w-4 h-4 mr-2",c.isUrl(t.route)?"text-white":"text-soft-theme-light group-hover:text-white"]},null,8,["name","class"]),(0,r.createVNode)("div",{class:c.isUrl(t.route)?"text-white":"text-soft-theme-light group-hover:text-white"},(0,r.toDisplayString)(t.label),3)]})),_:2},1032,["href"])})),128))])])}},z=M,L={components:{Dropdown:N.Z,Icon:C.Z,MainMenu:z},watch:{"$page.props.flash":{immediate:!0,deep:!0,handler:function(){document.title=this.$page.props.flash.title}}},data:function(){return{mobileMenuVisible:!1}},setup:function(){var e=Date.now(),t=document.querySelector("meta[name=base-url]").content+"/session-timeout",o=parseInt(document.querySelector("meta[name=session-lifetime-seconds]").content);window.addEventListener("focus",(function(){Date.now()-e>o&&axios.post(t).then((function(){return e=Date.now()})).catch((function(){return location.reload()}))})),(0,r.onMounted)((function(){var e=document.getElementById("page-loading-indicator");e&&e.remove()}))},methods:{url:function(){return location.pathname.substr(1)}},render:function(e,t,o,N,C,B){var M=(0,r.resolveComponent)("inertia-link"),z=(0,r.resolveComponent)("icon"),L=(0,r.resolveComponent)("dropdown"),S=(0,r.resolveComponent)("main-menu");return(0,r.openBlock)(),(0,r.createBlock)("div",null,[(0,r.createVNode)("div",n,[(0,r.createVNode)("div",a,[(0,r.createVNode)("div",c,[(0,r.createVNode)(M,{class:" inline-block",href:"".concat(e.$page.props.app.baseUrl,"/home")},{default:(0,r.withCtx)((function(){return[l]})),_:1},8,["href"]),(0,r.createVNode)("div",i,(0,r.toDisplayString)(e.$page.props.flash.title),1),(0,r.createVNode)("button",{class:["md:hidden transition-all duration-300 ease-out transform",{"scale-y-90 text-yellow-200":C.mobileMenuVisible}],onClick:t[1]||(t[1]=function(e){return C.mobileMenuVisible=!C.mobileMenuVisible})},[s],2)]),(0,r.createVNode)("div",d,[(0,r.createVNode)("div",u,(0,r.toDisplayString)(e.$page.props.flash.title),1),(0,r.createVNode)(L,null,{default:(0,r.withCtx)((function(){return[(0,r.createVNode)("div",p,[(0,r.createVNode)("div",f,[(0,r.createVNode)("span",null,(0,r.toDisplayString)(e.$page.props.user.name),1)]),(0,r.createVNode)(z,{class:"w-4 h-4 group-hover:text-bitter-theme-light focus:text-bitter-theme-light",name:"double-down"})])]})),dropdown:(0,r.withCtx)((function(){return[(0,r.createVNode)("div",h,[(0,r.createVNode)(M,{class:"block px-6 py-2 hover:bg-dark-theme-light hover:text-soft-theme-light",href:"".concat(e.$page.props.app.baseUrl,"/preferences")},{default:(0,r.withCtx)((function(){return[m]})),_:1},8,["href"]),(0,r.createVNode)(M,{class:"w-full font-semibold text-left px-6 py-2 hover:bg-dark-theme-light hover:text-soft-theme-light",href:"".concat(e.$page.props.app.baseUrl,"/logout"),method:"post",as:"button",type:"button"},{default:(0,r.withCtx)((function(){return[v]})),_:1},8,["href"])])]})),_:1})]),(0,r.createVNode)("div",{class:["h-4/5 mx-1 md:hidden block fixed bottom-0 inset-x-0 overflow-y-scroll text-soft-theme-light bg-thick-theme-light rounded-tl-xl rounded-tr-xl transition-transform transform duration-300 ease-in-out",{"translate-y-full":!C.mobileMenuVisible}]},[(0,r.createVNode)("div",b,[(0,r.createVNode)("div",{class:"flex flex-col text-center justify-center",onClick:t[2]||(t[2]=function(e){return C.mobileMenuVisible=!1})},[(0,r.createVNode)("span",g,(0,r.toDisplayString)(e.$page.props.user.name),1),(0,r.createVNode)(M,{class:"block py-1",href:"".concat(e.$page.props.app.baseUrl,"/preferences")},{default:(0,r.withCtx)((function(){return[w]})),_:1},8,["href"]),(0,r.createVNode)(M,{class:"block py-1",href:"".concat(e.$page.props.app.baseUrl,"/logout"),method:"post",as:"button",type:"button"},{default:(0,r.withCtx)((function(){return[k]})),_:1},8,["href"])]),x,(0,r.createVNode)(S,{onClick:t[3]||(t[3]=function(e){return C.mobileMenuVisible=!1}),url:B.url()},null,8,["url"])])],2)]),(0,r.createVNode)("div",y,[(0,r.createVNode)(S,{url:B.url(),class:"hidden md:block bg-thick-theme-light flex-shrink-0 w-56 xl:w-64 py-12 px-6 overflow-y-auto"},null,8,["url"]),(0,r.createVNode)("div",V,[(0,r.renderSlot)(e.$slots,"default")])])])])}},S=L},3862:(e,t,o)=>{"use strict";o.r(t),o.d(t,{default:()=>c});var r=o(5166),n=(0,r.createVNode)("h1",null,"Hello Patients 🤕",-1);const a={layout:o(8078).Z,render:function(e,t,o,a,c,l){return(0,r.openBlock)(),(0,r.createBlock)("div",null,[n])}},c=a}}]);