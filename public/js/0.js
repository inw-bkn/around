(self.webpackChunk=self.webpackChunk||[]).push([[0],{784:(e,t,o)=>{"use strict";o.d(t,{Z:()=>l});var n=o(3645),a=o.n(n)()((function(e){return e[1]}));a.push([e.id,".fade-appear-enter-active[data-v-bc5148d0]{-webkit-animation:fade-appear-bc5148d0 .2s;animation:fade-appear-bc5148d0 .2s}.fade-appear-leave-active[data-v-bc5148d0]{animation:fade-appear-bc5148d0 .2s reverse}@-webkit-keyframes fade-appear-bc5148d0{0%{transform:scale(.9);opacity:0}to{transform:scale(1);opacity:1}}@keyframes fade-appear-bc5148d0{0%{transform:scale(.9);opacity:0}to{transform:scale(1);opacity:1}}.fade-appear-above-enter-active[data-v-bc5148d0]{-webkit-animation:fade-appear-above-bc5148d0 .2s;animation:fade-appear-above-bc5148d0 .2s}.fade-appear-above-leave-active[data-v-bc5148d0]{animation:fade-appear-above-bc5148d0 .2s reverse}@-webkit-keyframes fade-appear-above-bc5148d0{0%{transform:scale(.9);transform:translateY(0);opacity:0}to{transform:scale(1);transform:translateY(-120%);opacity:1}}@keyframes fade-appear-above-bc5148d0{0%{transform:scale(.9);transform:translateY(0);opacity:0}to{transform:scale(1);transform:translateY(-120%);opacity:1}}",""]);const l=a},9469:(e,t,o)=>{"use strict";o.d(t,{Z:()=>l});var n=o(3645),a=o.n(n)()((function(e){return e[1]}));a.push([e.id,".slide-fade-enter-active[data-v-fe6453c8]{transition:all .8s ease}.slide-fade-leave-active[data-v-fe6453c8]{transition:all .3s cubic-bezier(1,.5,.8,1)}.slide-fade-enter-from[data-v-fe6453c8],.slide-fade-leave-to[data-v-fe6453c8]{transform:translateX(10px);opacity:0}",""]);const l=a},3645:e=>{"use strict";e.exports=function(e){var t=[];return t.toString=function(){return this.map((function(t){var o=e(t);return t[2]?"@media ".concat(t[2]," {").concat(o,"}"):o})).join("")},t.i=function(e,o,n){"string"==typeof e&&(e=[[null,e,""]]);var a={};if(n)for(var l=0;l<this.length;l++){var r=this[l][0];null!=r&&(a[r]=!0)}for(var i=0;i<e.length;i++){var c=[].concat(e[i]);n&&a[c[0]]||(o&&(c[2]?c[2]="".concat(o," and ").concat(c[2]):c[2]=o),t.push(c))}},t}},3379:(e,t,o)=>{"use strict";var n,a=function(){return void 0===n&&(n=Boolean(window&&document&&document.all&&!window.atob)),n},l=function(){var e={};return function(t){if(void 0===e[t]){var o=document.querySelector(t);if(window.HTMLIFrameElement&&o instanceof window.HTMLIFrameElement)try{o=o.contentDocument.head}catch(e){o=null}e[t]=o}return e[t]}}(),r=[];function i(e){for(var t=-1,o=0;o<r.length;o++)if(r[o].identifier===e){t=o;break}return t}function c(e,t){for(var o={},n=[],a=0;a<e.length;a++){var l=e[a],c=t.base?l[0]+t.base:l[0],s=o[c]||0,u="".concat(c," ").concat(s);o[c]=s+1;var d=i(u),p={css:l[1],media:l[2],sourceMap:l[3]};-1!==d?(r[d].references++,r[d].updater(p)):r.push({identifier:u,updater:g(p,t),references:1}),n.push(u)}return n}function s(e){var t=document.createElement("style"),n=e.attributes||{};if(void 0===n.nonce){var a=o.nc;a&&(n.nonce=a)}if(Object.keys(n).forEach((function(e){t.setAttribute(e,n[e])})),"function"==typeof e.insert)e.insert(t);else{var r=l(e.insert||"head");if(!r)throw new Error("Couldn't find a style target. This probably means that the value for the 'insert' parameter is invalid.");r.appendChild(t)}return t}var u,d=(u=[],function(e,t){return u[e]=t,u.filter(Boolean).join("\n")});function p(e,t,o,n){var a=o?"":n.media?"@media ".concat(n.media," {").concat(n.css,"}"):n.css;if(e.styleSheet)e.styleSheet.cssText=d(t,a);else{var l=document.createTextNode(a),r=e.childNodes;r[t]&&e.removeChild(r[t]),r.length?e.insertBefore(l,r[t]):e.appendChild(l)}}function m(e,t,o){var n=o.css,a=o.media,l=o.sourceMap;if(a?e.setAttribute("media",a):e.removeAttribute("media"),l&&"undefined"!=typeof btoa&&(n+="\n/*# sourceMappingURL=data:application/json;base64,".concat(btoa(unescape(encodeURIComponent(JSON.stringify(l))))," */")),e.styleSheet)e.styleSheet.cssText=n;else{for(;e.firstChild;)e.removeChild(e.firstChild);e.appendChild(document.createTextNode(n))}}var f=null,h=0;function g(e,t){var o,n,a;if(t.singleton){var l=h++;o=f||(f=s(t)),n=p.bind(null,o,l,!1),a=p.bind(null,o,l,!0)}else o=s(t),n=m.bind(null,o,t),a=function(){!function(e){if(null===e.parentNode)return!1;e.parentNode.removeChild(e)}(o)};return n(e),function(t){if(t){if(t.css===e.css&&t.media===e.media&&t.sourceMap===e.sourceMap)return;n(e=t)}else a()}}e.exports=function(e,t){(t=t||{}).singleton||"boolean"==typeof t.singleton||(t.singleton=a());var o=c(e=e||[],t);return function(e){if(e=e||[],"[object Array]"===Object.prototype.toString.call(e)){for(var n=0;n<o.length;n++){var a=i(o[n]);r[a].references--}for(var l=c(e,t),s=0;s<o.length;s++){var u=i(o[s]);0===r[u].references&&(r[u].updater(),r.splice(u,1))}o=l}}}},4675:(e,t,o)=>{"use strict";o.d(t,{Z:()=>R});var n=o(5166),a=(0,n.createVNode)("div",{id:"portal"},null,-1),l={class:"md:h-screen md:flex md:flex-col"},r={class:"md:flex md:flex-shrink-0 sticky top-0 z-30"},i={class:"bg-dark-theme-light text-white md:flex-shrink-0 md:w-56 px-4 py-2 flex items-center justify-between md:justify-center"},c=(0,n.createVNode)("span",{class:"font-lobster font-bold text-lg md:text-4xl"},"@round.",-1),s={class:"text-soft-theme-light text-sm md:hidden"},u=(0,n.createVNode)("svg",{class:"w-6 h-6",xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 512 512"},[(0,n.createVNode)("path",{fill:"currentColor",d:"M464 256H48a48 48 0 0 0 0 96h416a48 48 0 0 0 0-96zm16 128H32a16 16 0 0 0-16 16v16a64 64 0 0 0 64 64h352a64 64 0 0 0 64-64v-16a16 16 0 0 0-16-16zM58.64 224h394.72c34.57 0 54.62-43.9 34.82-75.88C448 83.2 359.55 32.1 256 32c-103.54.1-192 51.2-232.18 116.11C4 180.09 24.07 224 58.64 224zM384 112a16 16 0 1 1-16 16 16 16 0 0 1 16-16zM256 80a16 16 0 1 1-16 16 16 16 0 0 1 16-16zm-128 32a16 16 0 1 1-16 16 16 16 0 0 1 16-16z"})],-1),d={class:"hidden md:flex w-full font-semibold text-dark-theme-light bg-alt-theme-light border-b sticky top-0 z-30 p-4 md:py-0 md:px-12 justify-between items-center"},p={class:"mt-1 mr-4"},m={class:"flex items-center cursor-pointer select-none group"},f={class:"group-hover:text-yellow-500 focus:text-yellow-500 mr-1 whitespace-no-wrap"},h={class:"mt-2 py-2 shadow-xl bg-thick-theme-light text-white cursor-pointer rounded text-sm"},g=(0,n.createTextVNode)(" Preferences "),V=(0,n.createTextVNode)(" Logout "),b={class:"p-4"},v={class:"inline-block py-1 text-white"},y=(0,n.createTextVNode)(" Preferences "),_=(0,n.createTextVNode)(" Logout "),k=(0,n.createVNode)("hr",{class:"my-4"},null,-1),N={class:"md:flex md:flex-grow md:overflow-hidden"},w={class:"w-full p-4 md:overflow-y-auto lg:p-8 xl:py-8 xl:px-10","scroll-region":""};var x=(0,n.withScopeId)("data-v-bc5148d0");(0,n.pushScopeId)("data-v-bc5148d0");var C={class:"relative inline-block text-left",ref:"dropdown"};(0,n.popScopeId)();var B=x((function(e,t,o,a,l,r){return(0,n.openBlock)(),(0,n.createBlock)("div",C,[l.show?((0,n.openBlock)(),(0,n.createBlock)("div",{key:0,class:"fixed inset-0 bg-black bg-opacity-25 z-10",onClick:t[1]||(t[1]=function(e){return l.show=!1})})):(0,n.createCommentVNode)("",!0),(0,n.createVNode)("button",{onClick:t[2]||(t[2]=function(){return r.toggle&&r.toggle.apply(r,arguments)}),type:"button"},[(0,n.renderSlot)(e.$slots,"default")]),(0,n.createVNode)(n.Transition,{name:l.dropup?"fade-appear-above":"fade-appear"},{default:x((function(){return[l.show?((0,n.openBlock)(),(0,n.createBlock)("div",{key:0,class:["origin-top-right absolute right-0 w-auto rounded-md shadow-lg z-20",{" -translate-y-full":l.dropup}]},[(0,n.createVNode)("div",{onClick:t[3]||(t[3]=(0,n.withModifiers)((function(e){return l.show=!o.autoClose}),["stop"]))},[(0,n.renderSlot)(e.$slots,"dropdown")])],2)):(0,n.createCommentVNode)("",!0)]})),_:1},8,["name"])],512)}));const S={props:{autoClose:{type:Boolean,default:!0}},setup:function(){var e=this,t=function(t){27===t.keyCode&&(e.show=!1)};document.addEventListener("keydown",t),(0,n.onUnmounted)((function(){return window.removeEventListener("keydown",t)}))},data:function(){return{show:!1,dropup:!1,dropupThreshold:.8}},methods:{toggle:function(){this.show||(this.dropup=this.$refs.dropdown.offsetTop/(window.innerHeight+window.scrollY)>this.dropupThreshold),this.show=!this.show}}};var U=o(3379),z=o.n(U),O=o(784),A={insert:"head",singleton:!1};z()(O.Z,A);O.Z.locals;S.render=B,S.__scopeId="data-v-bc5148d0";const M=S;var L={key:0,viewBox:"0 0 320 512"},F=(0,n.createVNode)("path",{fill:"currentColor",d:"M143 256.3L7 120.3c-9.4-9.4-9.4-24.6 0-33.9l22.6-22.6c9.4-9.4 24.6-9.4 33.9 0l96.4 96.4 96.4-96.4c9.4-9.4 24.6-9.4 33.9 0L313 86.3c9.4 9.4 9.4 24.6 0 33.9l-136 136c-9.4 9.5-24.6 9.5-34 .1zm34 192l136-136c9.4-9.4 9.4-24.6 0-33.9l-22.6-22.6c-9.4-9.4-24.6-9.4-33.9 0L160 352.1l-96.4-96.4c-9.4-9.4-24.6-9.4-33.9 0L7 278.3c-9.4 9.4-9.4 24.6 0 33.9l136 136c9.4 9.5 24.6 9.5 34 .1z"},null,-1),T={key:1,viewBox:"0 0 448 512"},I=(0,n.createVNode)("path",{fill:"currentColor",d:"M277.37 11.98C261.08 4.47 243.11 0 224 0c-53.69 0-99.5 33.13-118.51 80h81.19l90.69-68.02zM342.51 80c-7.9-19.47-20.67-36.2-36.49-49.52L239.99 80h102.52zM224 256c70.69 0 128-57.31 128-128 0-5.48-.95-10.7-1.61-16H97.61c-.67 5.3-1.61 10.52-1.61 16 0 70.69 57.31 128 128 128zM80 299.7V512h128.26l-98.45-221.52A132.835 132.835 0 0 0 80 299.7zM0 464c0 26.51 21.49 48 48 48V320.24C18.88 344.89 0 381.26 0 422.4V464zm256-48h-55.38l42.67 96H256c26.47 0 48-21.53 48-48s-21.53-48-48-48zm57.6-128h-16.71c-22.24 10.18-46.88 16-72.89 16s-50.65-5.82-72.89-16h-7.37l42.67 96H256c44.11 0 80 35.89 80 80 0 18.08-6.26 34.59-16.41 48H400c26.51 0 48-21.49 48-48v-41.6c0-74.23-60.17-134.4-134.4-134.4z"},null,-1),D={key:2,viewBox:"0 0 576 512"},H=(0,n.createVNode)("path",{fill:"currentColor",d:"M288 115L69.47 307.71c-1.62 1.46-3.69 2.14-5.47 3.35V496a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V311.1c-1.7-1.16-3.72-1.82-5.26-3.2zm96 261a8 8 0 0 1-8 8h-56v56a8 8 0 0 1-8 8h-48a8 8 0 0 1-8-8v-56h-56a8 8 0 0 1-8-8v-48a8 8 0 0 1 8-8h56v-56a8 8 0 0 1 8-8h48a8 8 0 0 1 8 8v56h56a8 8 0 0 1 8 8zm186.69-139.72l-255.94-226a39.85 39.85 0 0 0-53.45 0l-256 226a16 16 0 0 0-1.21 22.6L25.5 282.7a16 16 0 0 0 22.6 1.21L277.42 81.63a16 16 0 0 1 21.17 0L527.91 283.9a16 16 0 0 0 22.6-1.21l21.4-23.82a16 16 0 0 0-1.22-22.59z"},null,-1),P={key:3,viewBox:"0 0 640 512"},$=(0,n.createVNode)("path",{fill:"currentColor",d:"M528 224H272c-8.8 0-16 7.2-16 16v144H64V144c0-8.8-7.2-16-16-16H16c-8.8 0-16 7.2-16 16v352c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16v-48h512v48c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V336c0-61.9-50.1-112-112-112zM136 96h126.1l27.6 55.2c5.9 11.8 22.7 11.8 28.6 0L368 51.8 390.1 96H512c8.8 0 16-7.2 16-16s-7.2-16-16-16H409.9L382.3 8.8C376.4-3 359.6-3 353.7 8.8L304 108.2l-19.9-39.8c-1.4-2.7-4.1-4.4-7.2-4.4H136c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8zm24 256c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64z"},null,-1);const K={props:{name:{type:String,required:!0}},render:function(e,t,o,a,l,r){return"double-down"===o.name?((0,n.openBlock)(),(0,n.createBlock)("svg",L,[F])):"patient"===o.name?((0,n.openBlock)(),(0,n.createBlock)("svg",T,[I])):"clinic"===o.name?((0,n.openBlock)(),(0,n.createBlock)("svg",D,[H])):"procedure"===o.name?((0,n.openBlock)(),(0,n.createBlock)("svg",P,[$])):(0,n.createCommentVNode)("",!0)}};var q={class:"mb-4"};const Y={components:{Icon:K},props:{url:{type:String,default:""}},methods:{isUrl:function(){for(var e=this,t=arguments.length,o=new Array(t),n=0;n<t;n++)o[n]=arguments[n];return""===o[0]?""===this.url:o.filter((function(t){return e.url.startsWith(t)})).length}},render:function(e,t,o,a,l,r){var i=(0,n.resolveComponent)("icon"),c=(0,n.resolveComponent)("inertia-link");return(0,n.openBlock)(),(0,n.createBlock)("div",null,[(0,n.createVNode)("div",q,[((0,n.openBlock)(!0),(0,n.createBlock)(n.Fragment,null,(0,n.renderList)(e.$page.props.user.mainMenuLinks,(function(t,o){return(0,n.openBlock)(),(0,n.createBlock)(c,{class:"flex items-center group py-2",href:"".concat(e.$page.props.app.baseUrl,"/").concat(t.route),key:o},{default:(0,n.withCtx)((function(){return[(0,n.createVNode)(i,{name:t.icon,class:["w-4 h-4 mr-2",r.isUrl(t.route)?"text-white":"text-soft-theme-light group-hover:text-white"]},null,8,["name","class"]),(0,n.createVNode)("div",{class:r.isUrl(t.route)?"text-white":"text-soft-theme-light group-hover:text-white"},(0,n.toDisplayString)(t.label),3)]})),_:2},1032,["href"])})),128))])])}},E={components:{Dropdown:M,Icon:K,MainMenu:Y},watch:{"$page.props.flash":{immediate:!0,deep:!0,handler:function(){document.title=this.$page.props.flash.title}}},data:function(){return{mobileMenuVisible:!1}},setup:function(){var e=Date.now(),t=document.querySelector("meta[name=base-url]").content+"/session-timeout",o=parseInt(document.querySelector("meta[name=session-lifetime-seconds]").content);window.addEventListener("focus",(function(){Date.now()-e>o&&axios.post(t).then((function(){return e=Date.now()})).catch((function(){return location.reload()}))}))},methods:{url:function(){return location.pathname.substr(1)}},render:function(e,t,o,x,C,B){var S=(0,n.resolveComponent)("inertia-link"),U=(0,n.resolveComponent)("icon"),z=(0,n.resolveComponent)("dropdown"),O=(0,n.resolveComponent)("main-menu");return(0,n.openBlock)(),(0,n.createBlock)("div",null,[a,(0,n.createVNode)("div",l,[(0,n.createVNode)("div",r,[(0,n.createVNode)("div",i,[(0,n.createVNode)(S,{class:" inline-block",href:"".concat(e.$page.props.app.baseUrl,"/home")},{default:(0,n.withCtx)((function(){return[c]})),_:1},8,["href"]),(0,n.createVNode)("div",s,(0,n.toDisplayString)(e.$page.props.flash.title),1),(0,n.createVNode)("button",{class:["md:hidden transition-all duration-300 ease-out transform",{"scale-y-90 text-yellow-200":C.mobileMenuVisible}],onClick:t[1]||(t[1]=function(e){return C.mobileMenuVisible=!C.mobileMenuVisible})},[u],2)]),(0,n.createVNode)("div",d,[(0,n.createVNode)("div",p,(0,n.toDisplayString)(e.$page.props.flash.title),1),(0,n.createVNode)(z,null,{default:(0,n.withCtx)((function(){return[(0,n.createVNode)("div",m,[(0,n.createVNode)("div",f,[(0,n.createVNode)("span",null,(0,n.toDisplayString)(e.$page.props.user.name),1)]),(0,n.createVNode)(U,{class:"w-4 h-4 group-hover:text-yellow-500 focus:text-yellow-500",name:"double-down"})])]})),dropdown:(0,n.withCtx)((function(){return[(0,n.createVNode)("div",h,[(0,n.createVNode)(S,{class:"block px-6 py-2 hover:bg-dark-theme-light hover:text-soft-theme-light",href:"".concat(e.$page.props.app.baseUrl,"/preferences")},{default:(0,n.withCtx)((function(){return[g]})),_:1},8,["href"]),(0,n.createVNode)(S,{class:"w-full font-semibold text-left px-6 py-2 hover:bg-dark-theme-light hover:text-soft-theme-light",href:"".concat(e.$page.props.app.baseUrl,"/logout"),method:"post",as:"button",type:"button"},{default:(0,n.withCtx)((function(){return[V]})),_:1},8,["href"])])]})),_:1})]),(0,n.createVNode)("div",{class:["h-4/5 mx-1 md:hidden block fixed bottom-0 inset-x-0 overflow-y-scroll text-soft-theme-light bg-thick-theme-light rounded-tl-xl rounded-tr-xl transition-transform transform duration-300 ease-in-out",{"translate-y-full":!C.mobileMenuVisible}]},[(0,n.createVNode)("div",b,[(0,n.createVNode)("div",{class:"flex flex-col text-center justify-center",onClick:t[2]||(t[2]=function(e){return C.mobileMenuVisible=!1})},[(0,n.createVNode)("span",v,(0,n.toDisplayString)(e.$page.props.user.name),1),(0,n.createVNode)(S,{class:"block py-1",href:"".concat(e.$page.props.app.baseUrl,"/preferences")},{default:(0,n.withCtx)((function(){return[y]})),_:1},8,["href"]),(0,n.createVNode)(S,{class:"block py-1",href:"".concat(e.$page.props.app.baseUrl,"/logout"),method:"post",as:"button",type:"button"},{default:(0,n.withCtx)((function(){return[_]})),_:1},8,["href"])]),k,(0,n.createVNode)(O,{onClick:t[3]||(t[3]=function(e){return C.mobileMenuVisible=!1}),url:B.url()},null,8,["url"])])],2)]),(0,n.createVNode)("div",N,[(0,n.createVNode)(O,{url:B.url(),class:"hidden md:block bg-thick-theme-light flex-shrink-0 w-56 p-12 overflow-y-auto"},null,8,["url"]),(0,n.createVNode)("div",w,[(0,n.renderSlot)(e.$slots,"default")])])])])}},R=E},1e3:(e,t,o)=>{"use strict";o.r(t),o.d(t,{default:()=>P});var n=o(5166),a=(0,n.withScopeId)("data-v-fe6453c8");(0,n.pushScopeId)("data-v-fe6453c8");var l=(0,n.createVNode)("div",{class:""},[(0,n.createVNode)("h2",{class:"form-label italic"}," Reservation data "),(0,n.createVNode)("hr",{class:"my-4 border-b-2 border-yellow-400"})],-1),r={class:"grid gap-2 md:grid md:gap-4 md:grid-cols-2 xl:gap-8 xl:grid-cols-4"},i=(0,n.createVNode)("div",{class:"mt-6 md:mt-12 xl:mt-24"},[(0,n.createVNode)("h2",{class:"form-label italic"}," Prescription "),(0,n.createVNode)("hr",{class:"my-4 border-b-2 border-yellow-400"})],-1),c={class:"grid gap-2 md:grid md:gap-4 md:grid-cols-2 xl:gap-8 xl:grid-cols-4"},s=(0,n.createVNode)("div",{class:"mt-6 md:mt-12 xl:mt-24"},[(0,n.createVNode)("h2",{class:"form-label italic"}," Pre-Dialysis Labs Request "),(0,n.createVNode)("hr",{class:"my-4 border-b-2 border-yellow-400"})],-1),u={class:"grid grid-cols-2 gap-2 md:gap-4 xl:gap-8 xl:grid-cols-4"},d=(0,n.createVNode)("div",{class:"mt-6 md:mt-12 xl:mt-24"},[(0,n.createVNode)("h2",{class:"form-label italic"}," Pre-Dialysis Treatments Request "),(0,n.createVNode)("hr",{class:"my-4 border-b-2 border-yellow-400"})],-1);(0,n.popScopeId)();var p=a((function(e,t,o,p,m,f){var h=(0,n.resolveComponent)("form-input"),g=(0,n.resolveComponent)("form-select"),V=(0,n.resolveComponent)("form-checkbox");return(0,n.openBlock)(),(0,n.createBlock)("div",null,[l,(0,n.createVNode)("div",r,[(0,n.createVNode)(h,{modelValue:m.order.patient_hn,"onUpdate:modelValue":t[1]||(t[1]=function(e){return m.order.patient_hn=e}),name:"patient_hn",label:"hn",readonly:!0},null,8,["modelValue"]),(0,n.createVNode)(h,{modelValue:m.order.patient_name,"onUpdate:modelValue":t[2]||(t[2]=function(e){return m.order.patient_name=e}),name:"patient_name",label:"name",readonly:!0},null,8,["modelValue"]),(0,n.createVNode)(h,{modelValue:m.order.required_date_formatted,"onUpdate:modelValue":t[3]||(t[3]=function(e){return m.order.required_date_formatted=e}),name:"required_date_formatted",label:"required date",readonly:!0},null,8,["modelValue"]),(0,n.createVNode)(h,{modelValue:m.prescription.ward,"onUpdate:modelValue":t[4]||(t[4]=function(e){return m.prescription.ward=e}),name:"ward",label:"ward",readonly:!0},null,8,["modelValue"]),(0,n.createVNode)(h,{modelValue:m.prescription.dialysis_type,"onUpdate:modelValue":t[5]||(t[5]=function(e){return m.prescription.dialysis_type=e}),name:"dialysis_type",label:"dialysis type",readonly:!0},null,8,["modelValue"]),(0,n.createVNode)(h,{modelValue:m.order.an,"onUpdate:modelValue":t[6]||(t[6]=function(e){return m.order.an=e}),name:"an",label:"an",readonly:!0},null,8,["modelValue"])]),i,(0,n.createVNode)("div",c,[(0,n.createVNode)(g,{modelValue:m.prescription.dialyzer,"onUpdate:modelValue":t[7]||(t[7]=function(e){return m.prescription.dialyzer=e}),name:"dialyzer",label:"dialyzer",options:m.config.dialyzerOptions},null,8,["modelValue","options"]),(0,n.createVNode)(g,{modelValue:m.prescription.dialyzate,"onUpdate:modelValue":t[8]||(t[8]=function(e){return m.prescription.dialyzate=e}),name:"dialyzate",label:"dialyzate",options:m.config.dialyzateOptions},null,8,["modelValue","options"]),(0,n.createVNode)(g,{modelValue:m.prescription.dialyzate_flow,"onUpdate:modelValue":t[9]||(t[9]=function(e){return m.prescription.dialyzate_flow=e}),name:"dialyzate_flow",label:"dialyzate flow (ml/min)",options:m.config.dialyzateFlowOptions},null,8,["modelValue","options"]),(0,n.createVNode)(g,{modelValue:m.prescription.blood_flow,"onUpdate:modelValue":t[10]||(t[10]=function(e){return m.prescription.blood_flow=e}),name:"blood_flow",label:"blood flow (ml/min)",options:m.config.bloodFlowOptions},null,8,["modelValue","options"]),(0,n.createVNode)(g,{modelValue:m.prescription.dialyzate_temperature,"onUpdate:modelValue":t[11]||(t[11]=function(e){return m.prescription.dialyzate_temperature=e}),name:"dialyzate_temperature",label:"dialyzate temperature (℃)",options:m.config.dialyzateTemperatureOptions},null,8,["modelValue","options"]),(0,n.createVNode)(g,{modelValue:m.prescription.sodium_profile,"onUpdate:modelValue":t[12]||(t[12]=function(e){return m.prescription.sodium_profile=e}),name:"sodium_profile",label:"sodium profile",options:m.config.sodiumProfileOptions},null,8,["modelValue","options"]),(0,n.createVNode)(g,{modelValue:m.prescription.anticoagulant,"onUpdate:modelValue":t[13]||(t[13]=function(e){return m.prescription.anticoagulant=e}),name:"anticoagulant",label:"anticoagulant",options:m.config.anticoagulantOptions},null,8,["modelValue","options"]),(0,n.createVNode)(n.TransitionGroup,{name:"slide-fade"},{default:a((function(){return["Heparin"==m.prescription.anticoagulant?((0,n.openBlock)(),(0,n.createBlock)(g,{key:0,modelValue:m.prescription.heparin_loading,"onUpdate:modelValue":t[14]||(t[14]=function(e){return m.prescription.heparin_loading=e}),name:"heparin_loading",label:"heparin loading",options:m.config.anticoagulantLoadingOptions},null,8,["modelValue","options"])):(0,n.createCommentVNode)("",!0),"Heparin"==m.prescription.anticoagulant?((0,n.openBlock)(),(0,n.createBlock)(g,{key:1,modelValue:m.prescription.heparin_loading_unit,"onUpdate:modelValue":t[15]||(t[15]=function(e){return m.prescription.heparin_loading_unit=e}),name:"heparin_loading_unit",label:"heparin loading unit",options:m.config.anticoagulantLoadingUnitOptions},null,8,["modelValue","options"])):(0,n.createCommentVNode)("",!0),"Heparin"==m.prescription.anticoagulant?((0,n.openBlock)(),(0,n.createBlock)(g,{key:2,modelValue:m.prescription.heparin_maintenance,"onUpdate:modelValue":t[16]||(t[16]=function(e){return m.prescription.heparin_maintenance=e}),name:"heparin_maintenance",label:"heparin maintenance",options:m.config.anticoagulantMaintenanceOptions},null,8,["modelValue","options"])):(0,n.createCommentVNode)("",!0),"Heparin"==m.prescription.anticoagulant?((0,n.openBlock)(),(0,n.createBlock)(g,{key:3,modelValue:m.prescription.heparin_maintenance_unit,"onUpdate:modelValue":t[17]||(t[17]=function(e){return m.prescription.heparin_maintenance_unit=e}),name:"heparin_maintenance_unit",label:"heparin maintenance unit",options:m.config.anticoagulantMaintenanceUnitOptions},null,8,["modelValue","options"])):(0,n.createCommentVNode)("",!0),(0,n.withDirectives)((0,n.createVNode)(h,{modelValue:m.prescription.anticoagulant_dose,"onUpdate:modelValue":t[18]||(t[18]=function(e){return m.prescription.anticoagulant_dose=e}),name:"anticoagulant_dose",label:"anticoagulant dose",type:"number"},null,8,["modelValue"]),[[n.vShow,"Citrate"==m.prescription.anticoagulant]]),"Other"==m.prescription.anticoagulant?((0,n.openBlock)(),(0,n.createBlock)(h,{key:4,modelValue:m.prescription.anticoagulant_dose,"onUpdate:modelValue":t[19]||(t[19]=function(e){return m.prescription.anticoagulant_dose=e}),name:"anticoagulant_dose",label:"anticoagulant dose",placeholder:"type anticoagulant and dose here"},null,8,["modelValue"])):(0,n.createCommentVNode)("",!0),"None"==m.prescription.anticoagulant?((0,n.openBlock)(),(0,n.createBlock)(g,{key:5,modelValue:m.prescription.nss_flush,"onUpdate:modelValue":t[20]||(t[20]=function(e){return m.prescription.nss_flush=e}),name:"nss_flush",label:"nss flush (optional)",options:m.config.NSSFlush},null,8,["modelValue","options"])):(0,n.createCommentVNode)("",!0)]})),_:1}),(0,n.createVNode)(h,{pattern:"\\d*",label:"uf (ml.)",modelValue:m.prescription.ultrafiltration,"onUpdate:modelValue":t[21]||(t[21]=function(e){return m.prescription.ultrafiltration=e}),name:"ultrafiltration",type:"number"},null,8,["modelValue"]),(0,n.createVNode)(h,{label:"dry weight (kg.)",modelValue:m.prescription.dry_weight,"onUpdate:modelValue":t[22]||(t[22]=function(e){return m.prescription.dry_weight=e}),name:"dry_weight",type:"number"},null,8,["modelValue"]),(0,n.createVNode)(g,{label:"50% Glucose 50 cc IV",modelValue:m.prescription.glucose_iv,"onUpdate:modelValue":t[23]||(t[23]=function(e){return m.prescription.glucose_iv=e}),name:"glucose_iv",options:m.config.glucoseIVOptions},null,8,["modelValue","options"]),(0,n.createVNode)(g,{label:"nutrition iv",modelValue:m.prescription.nutrition_iv,"onUpdate:modelValue":t[24]||(t[24]=function(e){return m.prescription.nutrition_iv=e}),name:"nutrition_iv",options:m.config.nutritionIVOptions},null,8,["modelValue","options"]),(0,n.createVNode)(g,{label:"transfustion",modelValue:m.prescription.transfustion,"onUpdate:modelValue":t[25]||(t[25]=function(e){return m.prescription.transfustion=e}),name:":transfustion",options:["Yes","No"]},null,8,["modelValue"]),(0,n.createVNode)(n.TransitionGroup,{name:"slide-fade"},{default:a((function(){return["Yes"==m.prescription.transfustion?((0,n.openBlock)(),(0,n.createBlock)(g,{key:0,name:"prc",label:"prc",modelValue:m.prescription.prc,"onUpdate:modelValue":t[26]||(t[26]=function(e){return m.prescription.prc=e}),options:m.config.prcOptions},null,8,["modelValue","options"])):(0,n.createCommentVNode)("",!0),"Yes"==m.prescription.transfustion?((0,n.openBlock)(),(0,n.createBlock)(g,{key:1,name:"ffp",label:"ffp",modelValue:m.prescription.ffp,"onUpdate:modelValue":t[27]||(t[27]=function(e){return m.prescription.ffp=e}),options:m.config.ffpOptions},null,8,["modelValue","options"])):(0,n.createCommentVNode)("",!0),"Yes"==m.prescription.transfustion?((0,n.openBlock)(),(0,n.createBlock)(g,{key:2,name:"platelet",label:"platelet",modelValue:m.prescription.platelet,"onUpdate:modelValue":t[28]||(t[28]=function(e){return m.prescription.platelet=e}),options:m.config.plateletOptions},null,8,["modelValue","options"])):(0,n.createCommentVNode)("",!0)]})),_:1}),(0,n.createVNode)(g,{label:"inotrope",modelValue:m.prescription.inotrope,"onUpdate:modelValue":t[29]||(t[29]=function(e){return m.prescription.inotrope=e}),name:"inotrope",options:m.config.inotropeOptions},null,8,["modelValue","options"]),(0,n.createVNode)(g,{label:"o2 rx",modelValue:m.prescription.o2_rx,"onUpdate:modelValue":t[30]||(t[30]=function(e){return m.prescription.o2_rx=e}),name:"o2_rx",options:["Yes","No"]},null,8,["modelValue"]),(0,n.createVNode)(h,{label:"cannula l/min (optional)",modelValue:m.prescription.cannula_rate,"onUpdate:modelValue":t[31]||(t[31]=function(e){return m.prescription.cannula_rate=e}),name:"cannula_rate"},null,8,["modelValue"]),(0,n.createVNode)(g,{label:"ekg",modelValue:m.prescription.ekg,"onUpdate:modelValue":t[32]||(t[32]=function(e){return m.prescription.ekg=e}),name:"ekg",options:m.config.ekgOptions},null,8,["modelValue","options"]),(0,n.createVNode)(g,{label:"access type",modelValue:m.prescription.access_type,"onUpdate:modelValue":t[33]||(t[33]=function(e){return m.prescription.access_type=e}),name:"access_type",options:m.config.accessTypeOptions},null,8,["modelValue","options"]),(0,n.createVNode)(g,{label:"access site coagulant",modelValue:m.prescription.access_site_coagulant,"onUpdate:modelValue":t[34]||(t[34]=function(e){return m.prescription.access_site_coagulant=e}),name:"access_site_coagulant",options:m.config.accessSiteOptions},null,8,["modelValue","options"]),(0,n.createVNode)(g,{label:"Observe chest pain",modelValue:m.prescription.observe_chest_pain,"onUpdate:modelValue":t[35]||(t[35]=function(e){return m.prescription.observe_chest_pain=e}),name:"observe_chest_pain",options:["Yes","No"]},null,8,["modelValue"]),(0,n.createVNode)(g,{label:"Observe neuro sign",modelValue:m.prescription.observe_neuro_sign,"onUpdate:modelValue":t[36]||(t[36]=function(e){return m.prescription.observe_neuro_sign=e}),name:"observe_neuro_sign",options:["Yes","No"]},null,8,["modelValue"]),(0,n.createVNode)(g,{label:"Keep MAP > 65 mmHg",modelValue:m.prescription.maintain_MAP_over_65,"onUpdate:modelValue":t[37]||(t[37]=function(e){return m.prescription.maintain_MAP_over_65=e}),name:"maintain_MAP_over_65",options:["Yes","No"]},null,8,["modelValue"]),(0,n.createVNode)(g,{label:"Prime 20%  albumin 100 cc",modelValue:m.prescription.prime_20percent_albumin_100cc,"onUpdate:modelValue":t[38]||(t[38]=function(e){return m.prescription.prime_20percent_albumin_100cc=e}),name:"prime_20percent_albumin_100cc",options:["Yes","No"]},null,8,["modelValue"])]),(0,n.createVNode)(h,{class:"mt-2 md:bt-4 xl:mt-8",label:"spacial order",name:"spacial",modelValue:m.prescription.spacial,"onUpdate:modelValue":t[39]||(t[39]=function(e){return m.prescription.spacial=e})},null,8,["modelValue"]),s,(0,n.createVNode)("div",u,[((0,n.openBlock)(!0),(0,n.createBlock)(n.Fragment,null,(0,n.renderList)(m.config.labs,(function(e,t){return(0,n.openBlock)(),(0,n.createBlock)(V,{key:t,label:e,name:e,modelValue:m.labs[e],"onUpdate:modelValue":function(t){return m.labs[e]=t}},null,8,["label","name","modelValue","onUpdate:modelValue"])})),128))]),d,(0,n.createVNode)(h,{class:"mt-2 md:bt-4 xl:mt-8",name:"treatments",modelValue:m.treatments,"onUpdate:modelValue":t[40]||(t[40]=function(e){return m.treatments=e})},null,8,["modelValue"])])})),m={key:0},f={class:"inline-flex items-center cursor-pointer"},h={class:"relative"},g={class:"ml-3 text-lg"},V={key:1},b={class:"inline-flex items-center cursor-pointer"},v={class:"ml-4 text-lg"};const y={emits:["update:modelValue","autosave"],props:{modelValue:{type:Boolean},label:{type:String,default:""},toggler:{type:Boolean}},methods:{change:function(){this.$emit("update:modelValue",!this.modelValue),this.$emit("autosave")},check:function(){this.$emit("update:modelValue",!this.modelValue)}},render:function(e,t,o,a,l,r){return o.toggler?((0,n.openBlock)(),(0,n.createBlock)("div",m,[(0,n.createVNode)("label",f,[(0,n.createVNode)("div",h,[(0,n.createVNode)("input",{type:"checkbox",class:"hidden",onChange:t[1]||(t[1]=function(){return r.change&&r.change.apply(r,arguments)})},null,32),(0,n.createVNode)("div",{class:["w-8 h-5 bg-gray-400 rounded-full shadow-inner transition-all duration-200 ease-in-out",{"bg-blue-500":o.modelValue}]},null,2),(0,n.createVNode)("div",{class:["absolute w-5 h-5 bg-white rounded-full shadow inset-y-0 left-0 transition-all duration-200 ease-in-out transform",{"translate-x-3":o.modelValue}]},null,2)]),(0,n.createVNode)("div",g,(0,n.toDisplayString)(o.label),1)])])):((0,n.openBlock)(),(0,n.createBlock)("div",V,[(0,n.createVNode)("label",b,[(0,n.createVNode)("input",{type:"checkbox",class:"shadow-xs h-6 w-6 transition-all duration-200 ease-in-out appearance-none color inline-block align-middle border border-gray-400 select-none flex-shrink-0 rounded cursor-pointer focus:outline-none",checked:o.modelValue,onChange:t[2]||(t[2]=function(){return r.change&&r.change.apply(r,arguments)})},null,40,["checked"]),(0,n.createVNode)("span",v,(0,n.toDisplayString)(o.label),1)])]))}},_=y;var k={class:"w-full"},N={key:1,class:"text-red-700 mt-2 text-sm"};const w={emits:["autosave","update:modelValue"],props:{modelValue:{type:String,required:!0},name:{type:String,required:!0},label:{type:String,default:""},type:{type:String,default:"text"},placeholder:{type:String,default:""},pattern:{type:String,default:""},readonly:{type:Boolean},errors:{type:Array,default:function(){return[]}}},methods:{focus:function(){this.$refs.input.focus()}},render:function(e,t,o,a,l,r){return(0,n.openBlock)(),(0,n.createBlock)("div",k,[o.label?((0,n.openBlock)(),(0,n.createBlock)("label",{key:0,class:"form-label",for:o.name},(0,n.toDisplayString)(o.label)+" :",9,["for"])):(0,n.createCommentVNode)("",!0),(0,n.createVNode)("input",{id:o.name,name:o.name,ref:"input",onInput:t[1]||(t[1]=function(t){return e.$emit("update:modelValue",e.$refs.input.value)}),onChange:t[2]||(t[2]=function(t){return e.$emit("autosave")}),type:o.type,placeholder:o.placeholder,pattern:o.pattern,readonly:o.readonly,value:o.modelValue,class:["form-input",{"border-red-400":o.errors.length}]},null,42,["id","name","type","placeholder","pattern","readonly","value"]),o.errors.length?((0,n.openBlock)(),(0,n.createBlock)("div",N,(0,n.toDisplayString)(o.errors[0]),1)):(0,n.createCommentVNode)("",!0)])}},x=w;var C={class:"w-full"},B={class:"relative"},S=(0,n.createVNode)("option",{disabled:"",value:""}," Please select ",-1),U={key:0,class:"italic text-yellow-500"},z=(0,n.createVNode)("div",{class:"pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700"},[(0,n.createVNode)("svg",{class:"fill-current h-4 w-4",xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 20 20"},[(0,n.createVNode)("path",{d:"M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"})])],-1),O={key:1,class:"text-red-700 mt-2 text-sm"};function A(e){return(A="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e})(e)}const M={emits:["update:modelValue","autosave"],props:{modelValue:{type:String,required:!0},options:{type:Array,required:!0},name:{type:String,required:!0},label:{type:String,default:""},placeholder:{type:String,default:""},disabled:{type:Boolean},errors:{type:Array,default:function(){return[]}}},computed:{valueOptions:function(){return"object"===A(this.options[0])?[]:this.options},itemOptions:function(){return"object"===A(this.options[0])?this.options:[]}},watch:{modelValue:function(e){"Remove"===e&&(this.$emit("update:modelValue",""),this.$emit("autosave"))}},methods:{change:function(){this.$emit("update:modelValue",this.$refs.input.value),console.log(this.$refs.input.value+" selected"),this.$emit("autosave")}},render:function(e,t,o,a,l,r){return(0,n.openBlock)(),(0,n.createBlock)("div",C,[o.label?((0,n.openBlock)(),(0,n.createBlock)("label",{key:0,class:"form-label",for:o.name},(0,n.toDisplayString)(o.label)+" :",9,["for"])):(0,n.createCommentVNode)("",!0),(0,n.createVNode)("div",B,[(0,n.createVNode)("select",{id:o.name,name:o.name,ref:"input",placeholder:o.placeholder,disabled:o.disabled,value:o.modelValue,onChange:t[1]||(t[1]=function(){return r.change&&r.change.apply(r,arguments)}),class:["form-input cursor-pointer disabled:cursor-not-allowed",{"border-red-400":o.errors.length,"bg-gray-400":o.disabled}]},[S,o.modelValue?((0,n.openBlock)(),(0,n.createBlock)("option",U," Remove ")):(0,n.createCommentVNode)("",!0),((0,n.openBlock)(!0),(0,n.createBlock)(n.Fragment,null,(0,n.renderList)(r.itemOptions,(function(e,t){return(0,n.openBlock)(),(0,n.createBlock)("option",{key:t,value:e.value},(0,n.toDisplayString)(e.label),9,["value"])})),128)),((0,n.openBlock)(!0),(0,n.createBlock)(n.Fragment,null,(0,n.renderList)(r.valueOptions,(function(e,t){return(0,n.openBlock)(),(0,n.createBlock)("option",{key:t,value:e},(0,n.toDisplayString)(e),9,["value"])})),128))],42,["id","name","placeholder","disabled","value"]),z]),o.errors.length?((0,n.openBlock)(),(0,n.createBlock)("div",O,(0,n.toDisplayString)(o.errors[0]),1)):(0,n.createCommentVNode)("",!0)])}},L=M;const F={layout:o(4675).Z,components:{FormCheckbox:_,FormInput:x,FormSelect:L},computed:{anticoagulantOtherThanHeparin:function(){if(!this.prescription.anticoagulant)return!1;var e=this.prescription.anticoagulant.toLowerCase();return e.includes("enoxaparin")||e.includes("nadroparin")||e.includes("tinzaparin")},anticoagulantDoseOptions:function(){if(!this.prescription.anticoagulant)return[];var e=this.prescription.anticoagulant.toLowerCase();return e.includes("enoxaparin")?this.config.anticoagulantDoseOptions.enoxaparin:e.includes("nadroparin")?this.config.anticoagulantDoseOptions.nadroparin:e.includes("tinzaparin")?this.config.anticoagulantDoseOptions.tinzaparin:[]}},watch:{"prescription.anticoagulant":function(e){this.prescription.anticoagulant_dose="","heparin"===e.toLowerCase()&&(this.prescription.heparin_loading="",this.prescription.heparin_loading_unit="",this.prescription.heparin_maintenance="",this.prescription.heparin_maintenance_unit="")}},data:function(){return{order:{patient_hn:"50164826",patient_name:"Ronald Duck",required_date_formatted:"Friday, 29",an:"57584629"},prescription:{ward:"ไตเทียม",dialysis_type:"HD",dialyzer:"",dialyzate:"",dialyzate_flow:"",blood_flow:"",session_length:"",dialyzate_temperature:"",sodium_profile:"",anticoagulant:"",heparin_loading:"",heparin_loading_unit:"",heparin_maintenance:"",heparin_maintenance_unit:"",anticoagulant_dose:"",nss_flush:"",ultrafiltration:"",dry_weight:"",glucose_iv:"",nutrition_iv:"",transfustion:"",prc:"",ffp:"",platelet:"",inotrope:"",o2_rx:"",cannula_rate:"",ekg:"",access_type:"",access_site_coagulant:"",observe_chest_pain:"",observe_neuro_sign:"",maintain_MAP_over_65:"",prime_20percent_albumin_100cc:"",spacial:""},labs:{CBC:!1,BUN:!1,Cr:!1,Electrolyte:!1,Ca:!1,PO4:!1,Albumin:!1,LFT:!1,PT:!1,PTT:!1,"request PRC":!1,iPTH:!1,"Iron study":!1,Ferritin:!1},treatments:"",config:{dialyzerOptions:["APS-1050","APS-650","APS-900","PS-15","F100","HDF100s","HF80S/HF80","FB170U","FB190U","FB210U","Pureflux 190H","pureflux210","pureflux210h","SF130","SF130E","SF150E","SF170E","SF190E"],dialyzateOptions:["None: Ca 0, K 0, Mg 0, glucose 0","Ca 3.5, K 2, Mg 1, glucose 100: AA 101","Ca 2.0, K 2, Mg 1, glucose 100: AA 201","Ca 2.5, K 2, Mg 1, glucose 100: AA 251","Ca 3.0, K 2, Mg 1, glucose 100: AA 301","Ca 3.5, K 3, Mg 1, glucose 100: AA 101 K3","Ca 2.0, K 3, Mg 1, glucose 100: AA 201 K3","Ca 2.5, K 3, Mg 1, glucose 100: AA 251 K3","Ca 3.0, K 3, Mg 1, glucose 100: AA 301 K3","Ca 3.5, K 2, Mg 0.7, glucose 100: AA 101","Ca 2.0, K 2, Mg 0.7, glucose 100: AA 201","Ca 2.5, K 2, Mg 0.7, glucose 100: AA 251","Ca 3.0, K 2, Mg 0.7, glucose 100: AA 301","Ca 3.5, K 3, Mg 0.7, glucose 100: AA 101 K3","Ca 2.0, K 3, Mg 0.7, glucose 100: AA 201 K3","Ca 2.5, K 3, Mg 0.7, glucose 100: AA 251 K3","Ca 3.0, K 3, Mg 0.7, glucose 100: AA 301 K3"],bloodFlowOptions:[150,200,250,300,350,400,500],dialyzateFlowOptions:[150,200,250,300,350,400,500],sessionLengthOptions:[2,3,4,5,6,7,8],dialyzateTemperatureOptions:[35.5,36,36.5,37],sodiumProfileOptions:["None","No.1","No.2","No.3","No.4","No.5","No.6"],anticoagulantOptions:[{value:"None",label:"None"},{value:"Heparin",label:"Heparin"},{value:"Enoxaparin",label:"Enoxaparin (Clexane®, Levenox®)"},{value:"Nadroparin",label:"Nadroparin (Fraxiparine) "},{value:"Tinzaparin",label:"Tinzaparin (Innohep)"},{value:"Citrate",label:"Citrate"},{value:"Other",label:"Other"}],anticoagulantLoadingOptions:[0,500,1e3,1500,2e3,40,60,80],anticoagulantLoadingUnitOptions:["units","mg"],anticoagulantMaintenanceOptions:[0,250,500,1e3],anticoagulantMaintenanceUnitOptions:["units","mg"],anticoagulantDoseOptions:{enoxaparin:[{value:30,label:"30 mg (0.3 ml)"},{value:40,label:"40 mg (0.4 ml)"},{value:60,label:"60 mg (0.5 ml)"},{value:80,label:"80 mg (0.8 ml)"}],nadroparin:[{value:.3,label:"0.3 ml (2,850 IUAXa)"},{value:.4,label:"0.4 ml (3,800 IUAXa)"},{value:.6,label:"0.6 ml (5,700 IUAXa)"},{value:.8,label:"0.8 ml (7,600 IUAXa)"}],tinzaparin:[{value:.25,label:"0.25 ml (2,850 IUAXa)"},{value:.35,label:"0.35 ml (3,500 IUAXa)"},{value:.45,label:"0.45 ml (4,500 IUAXa)"}]},NSSFlush:["100 ml q 30 min","100 ml q 60 min","200 ml q 30 min","200 ml q 60 min"],glucoseIVOptions:["No","Yes"],nutritionIVOptions:["No","Yes"],prcOptions:["No","Yes"],ffpOptions:["No","Yes"],plateletOptions:["No","Yes"],inotropeOptions:["None","Norepinephrine","Dopamine","Dobutamine"],ekgOptions:["No","Monitoring"],accessTypeOptions:["DLC","Perm cath","AVF","AVG"],accessSiteOptions:["RtIJ","LtIJ","RtFem","LtFem","Rt forearm","Lt forearm","Rt arm","Lt arm","Rt SCV","Lt SCV"],labs:["CBC","BUN","Cr","Electrolyte","Ca","PO4","Albumin","LFT","PT","PTT","request PRC","iPTH","Iron study","Ferritin"]}}}};var T=o(3379),I=o.n(T),D=o(9469),H={insert:"head",singleton:!1};I()(D.Z,H);D.Z.locals;F.render=p,F.__scopeId="data-v-fe6453c8";const P=F}}]);