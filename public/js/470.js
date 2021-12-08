"use strict";(self.webpackChunk=self.webpackChunk||[]).push([[470],{29:(e,t,n)=>{n.d(t,{Z:()=>o});var a=n(3645),l=n.n(a)()((function(e){return e[1]}));l.push([e.id,".slide-fade-enter-active[data-v-c65b1b26]{transition:all .8s ease}.slide-fade-leave-active[data-v-c65b1b26]{transition:all .3s cubic-bezier(1,.5,.8,1)}.slide-fade-enter-from[data-v-c65b1b26],.slide-fade-leave-to[data-v-c65b1b26]{opacity:0;transform:translateX(10px)}",""]);const o=l},3665:(e,t,n)=>{n.d(t,{Z:()=>_});var a=n(6252),l=n(3577),o={key:0},r={class:"inline-flex items-center cursor-pointer"},i={class:"relative"},s={class:"ml-3 text-sm md:text-base xl:text-lg"},u={key:1},d={class:"inline-flex items-center cursor-pointer"},p=["checked"],m={class:"ml-4 text-sm md:text-base xl:text-lg"};const c={emits:["update:modelValue","autosave"],props:{modelValue:{type:Boolean},label:{type:String,default:""},toggler:{type:Boolean}},methods:{change:function(){this.$emit("update:modelValue",!this.modelValue),this.$emit("autosave")},check:function(){this.$emit("update:modelValue",!this.modelValue)}}};const _=(0,n(3744).Z)(c,[["render",function(e,t,n,c,_,g){return n.toggler?((0,a.wg)(),(0,a.iD)("div",o,[(0,a._)("label",r,[(0,a._)("div",i,[(0,a._)("input",{type:"checkbox",class:"hidden",onChange:t[0]||(t[0]=function(){return g.change&&g.change.apply(g,arguments)})},null,32),(0,a._)("div",{class:(0,l.C_)(["w-8 h-5 bg-gray-200 rounded-full shadow-inner transition-all duration-200 ease-in-out",{"bg-bitter-theme-light":n.modelValue}])},null,2),(0,a._)("div",{class:(0,l.C_)(["absolute w-5 h-5 bg-white rounded-full shadow inset-y-0 left-0 transition-all duration-200 ease-in-out transform",{"translate-x-3":n.modelValue}])},null,2)]),(0,a._)("div",s,(0,l.zw)(n.label),1)])])):((0,a.wg)(),(0,a.iD)("div",u,[(0,a._)("label",d,[(0,a._)("input",{type:"checkbox",class:"shadow-xs h-6 w-6 transition-all duration-200 ease-in-out appearance-none color inline-block align-middle border border-gray-400 select-none flex-shrink-0 rounded cursor-pointer focus:outline-none",checked:n.modelValue,onChange:t[1]||(t[1]=function(){return g.change&&g.change.apply(g,arguments)})},null,40,p),(0,a._)("span",m,(0,l.zw)(n.label),1)])]))}]])},9965:(e,t,n)=>{n.d(t,{Z:()=>h});var a=n(6252),l=n(3577),o=n(2262),r={class:"w-full"},i=["for"],s={key:1,class:"flex"},u=["id","name","type","placeholder","pattern","readonly","value"],d={class:"w-auto flex items-center px-2 border-2 border-gray-200 rounded shadow-sm border-l-0 rounded-l-none bg-gray-50"},p={class:"inline-flex items-center"},m=["checked"],c={class:"ml-4 text-lg cursor-pointer whitespace-nowrap"},_=["id","name","type","placeholder","pattern","readonly","value"],g={key:3,class:"text-red-700 mt-2 text-sm"};const h={props:{modelValue:{type:[String,Number,null],default:""},modelCheckbox:{type:Boolean},name:{type:String,required:!0},label:{type:String,default:""},type:{type:String,default:"text"},placeholder:{type:String,default:""},pattern:{type:String,default:""},readonly:{type:Boolean},error:{type:String,default:""},switchLabel:{type:String,default:""}},emits:["autosave","update:modelValue","update:modelCheckbox"],setup:function(e,t){var n=t.expose,h=t.emit,b=(0,o.iH)(null),f=function(e){h("update:modelCheckbox",e.target.checked),h("autosave")};return n({focus:function(){b.value.focus()}}),function(t,n){return(0,a.wg)(),(0,a.iD)("div",r,[e.label?((0,a.wg)(),(0,a.iD)("label",{key:0,class:"form-label",for:e.name},(0,l.zw)(e.label)+" :",9,i)):(0,a.kq)("",!0),e.switchLabel?((0,a.wg)(),(0,a.iD)("div",s,[(0,a._)("input",{id:e.name,name:e.name,ref:function(e,t){t.input=e,b.value=e},onInput:n[0]||(n[0]=function(e){return t.$emit("update:modelValue",t.$refs.input.value)}),onChange:n[1]||(n[1]=function(e){return t.$emit("autosave")}),type:e.type,placeholder:e.placeholder,pattern:e.pattern,readonly:e.readonly,value:e.modelValue,class:(0,l.C_)(["form-input border-r-0 rounded-r-none",{"border-red-400":e.error}])},null,42,u),(0,a._)("div",d,[(0,a._)("label",p,[(0,a._)("input",{type:"checkbox",class:"shadow-xs h-6 w-6 transition-all duration-200 ease-in-out appearance-none color inline-block align-middle border border-gray-400 select-none flex-shrink-0 rounded cursor-pointer focus:outline-none",checked:e.modelCheckbox,onChange:f},null,40,m),(0,a._)("span",c,(0,l.zw)(e.switchLabel),1)])])])):((0,a.wg)(),(0,a.iD)("input",{key:2,id:e.name,name:e.name,ref:function(e,t){t.input=e,b.value=e},onInput:n[2]||(n[2]=function(e){return t.$emit("update:modelValue",t.$refs.input.value)}),onChange:n[3]||(n[3]=function(e){return t.$emit("autosave")}),type:e.type,placeholder:e.placeholder,pattern:e.pattern,readonly:e.readonly,value:e.modelValue,class:(0,l.C_)(["form-input",{"border-red-400 text-red-400":e.error}])},null,42,_)),e.error?((0,a.wg)(),(0,a.iD)("div",g,(0,l.zw)(e.error),1)):(0,a.kq)("",!0)])}}}},6556:(e,t,n)=>{n.d(t,{Z:()=>S});var a=n(6252),l=n(3577),o={class:"w-full"},r=["for"],i={key:1,class:"relative"},s=["id","name","placeholder","disabled","value"],u=(0,a._)("option",{disabled:"",value:""}," Please select ",-1),d={key:0,class:"italic text-yellow-500"},p=["value"],m=["value"],c={key:1,value:"other"},_=(0,a._)("div",{class:"pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700"},[(0,a._)("svg",{class:"fill-current h-4 w-4",xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 20 20"},[(0,a._)("path",{d:"M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"})])],-1),g={key:2,class:"flex"},h={class:"relative w-full"},b=["id","name","placeholder","disabled","value"],f=(0,a._)("option",{disabled:"",value:""}," Please select ",-1),y={key:0,class:"italic text-yellow-500"},v=["value"],V=["value"],x={key:1,value:"other"},w=(0,a._)("div",{class:"pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700"},[(0,a._)("svg",{class:"fill-current h-4 w-4",xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 20 20"},[(0,a._)("path",{d:"M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"})])],-1),k={class:"w-auto flex items-center px-2 border-2 border-gray-200 rounded shadow-sm border-l-0 rounded-l-none bg-gray-50"},A={class:"inline-flex items-center"},U=["checked"],C={class:"ml-4 text-lg cursor-pointer whitespace-nowrap"},D={key:3,class:"text-red-700 mt-2 text-sm"};function W(e){return W="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},W(e)}const O={emits:["autosave","update:modelValue","update:modelCheckbox"],props:{modelValue:{type:[String,Number,null],default:""},modelCheckbox:{type:Boolean},options:{type:Array,required:!0},name:{type:String,required:!0},label:{type:String,default:""},placeholder:{type:String,default:""},disabled:{type:Boolean},errors:{type:Array,default:function(){return[]}},allowOther:{type:Boolean},switchLabel:{type:String,default:""}},computed:{valueOptions:function(){return"object"===W(this.options[0])?[]:this.options},itemOptions:function(){return"object"===W(this.options[0])?this.options:[]}},watch:{modelValue:function(e){"Remove"===e&&(this.$emit("update:modelValue",""),this.$emit("autosave"))}},methods:{change:function(){this.$emit("update:modelValue",this.$refs.input.value),this.$emit("autosave")},check:function(e){this.$emit("update:modelCheckbox",e.target.checked)},setOther:function(e){var t=this;this.$nextTick((function(){t.$refs.input.value=e,t.change()}))}}};const S=(0,n(3744).Z)(O,[["render",function(e,t,n,W,O,S){return(0,a.wg)(),(0,a.iD)("div",o,[n.label?((0,a.wg)(),(0,a.iD)("label",{key:0,class:"form-label",for:n.name},(0,l.zw)(n.label)+" :",9,r)):(0,a.kq)("",!0),n.switchLabel?((0,a.wg)(),(0,a.iD)("div",g,[(0,a._)("div",h,[(0,a._)("select",{id:n.name,name:n.name,ref:"input",placeholder:n.placeholder,disabled:n.disabled,value:n.modelValue,onChange:t[1]||(t[1]=function(){return S.change&&S.change.apply(S,arguments)}),class:(0,l.C_)(["form-input cursor-pointer disabled:cursor-not-allowed border-r-0 rounded-r-none",{"border-red-400":n.errors.length,"bg-gray-400":n.disabled}])},[f,n.modelValue?((0,a.wg)(),(0,a.iD)("option",y," Remove ")):(0,a.kq)("",!0),((0,a.wg)(!0),(0,a.iD)(a.HY,null,(0,a.Ko)(S.itemOptions,(function(e,t){return(0,a.wg)(),(0,a.iD)("option",{key:t,value:e.value},(0,l.zw)(e.label),9,v)})),128)),((0,a.wg)(!0),(0,a.iD)(a.HY,null,(0,a.Ko)(S.valueOptions,(function(e,t){return(0,a.wg)(),(0,a.iD)("option",{key:t,value:e},(0,l.zw)(e),9,V)})),128)),n.allowOther?((0,a.wg)(),(0,a.iD)("option",x," Other ")):(0,a.kq)("",!0)],42,b),w]),(0,a._)("div",k,[(0,a._)("label",A,[(0,a._)("input",{type:"checkbox",class:"shadow-xs h-6 w-6 transition-all duration-200 ease-in-out appearance-none color inline-block align-middle border border-gray-400 select-none flex-shrink-0 rounded cursor-pointer focus:outline-none",checked:n.modelCheckbox,onChange:t[2]||(t[2]=function(){return S.check&&S.check.apply(S,arguments)})},null,40,U),(0,a._)("span",C,(0,l.zw)(n.switchLabel),1)])])])):((0,a.wg)(),(0,a.iD)("div",i,[(0,a._)("select",{id:n.name,name:n.name,ref:"input",placeholder:n.placeholder,disabled:n.disabled,value:n.modelValue,onChange:t[0]||(t[0]=function(){return S.change&&S.change.apply(S,arguments)}),class:(0,l.C_)(["form-input cursor-pointer disabled:cursor-not-allowed border-r-0",{"border-red-400":n.errors.length,"bg-gray-400":n.disabled}])},[u,n.modelValue?((0,a.wg)(),(0,a.iD)("option",d," Remove ")):(0,a.kq)("",!0),((0,a.wg)(!0),(0,a.iD)(a.HY,null,(0,a.Ko)(S.itemOptions,(function(e,t){return(0,a.wg)(),(0,a.iD)("option",{key:t,value:e.value},(0,l.zw)(e.label),9,p)})),128)),((0,a.wg)(!0),(0,a.iD)(a.HY,null,(0,a.Ko)(S.valueOptions,(function(e,t){return(0,a.wg)(),(0,a.iD)("option",{key:t,value:e},(0,l.zw)(e),9,m)})),128)),n.allowOther?((0,a.wg)(),(0,a.iD)("option",c," Other ")):(0,a.kq)("",!0)],42,s),_])),n.errors.length?((0,a.wg)(),(0,a.iD)("div",D,(0,l.zw)(n.errors[0]),1)):(0,a.kq)("",!0)])}]])},7183:(e,t,n)=>{n.d(t,{Z:()=>p});var a=n(6252),l=n(3577),o={class:"flex items-center"},r={class:"w-1/6 flex justify-center"},i={class:"w-5/6 lg:text-lg"},s={class:"font-bold"},u={class:"text-gray-700 text-sm lg:text-lg font-light mt-2"};const d={components:{Icon:n(7618).Z},props:{type:{type:String,default:"info"},title:{type:String,default:"What's up!"},message:{type:String,default:"Hello world"}}};const p=(0,n(3744).Z)(d,[["render",function(e,t,n,d,p,m){var c=(0,a.up)("icon");return(0,a.wg)(),(0,a.iD)("div",{role:"alert",class:(0,l.C_)(["border-t-4 rounded-b px-4 py-3 shadow-sm bg-gray-100",{"border-red-400":"danger"==n.type,"text-red-400":"danger"==n.type,"border-yellow-400":"warning"==n.type,"text-yellow-400":"warning"==n.type,"border-green-400":"success"==n.type,"text-green-400":"success"==n.type,"border-blue-400":"info"==n.type,"text-blue-400":"info"==n.type}])},[(0,a._)("div",o,[(0,a._)("div",r,[(0,a.Wm)(c,{class:"w-6 h-6 md:w-10 md:h-10 lg:w-16 lg:h-16",name:"info-circle"})]),(0,a._)("div",i,[(0,a._)("p",s,(0,l.zw)(n.title),1),(0,a._)("p",u,(0,l.zw)(n.message),1)])])],2)}]])},1470:(e,t,n)=>{n.r(t),n.d(t,{default:()=>me});var a=n(6252),l=n(9963),o=n(3577),r=function(e){return(0,a.dD)("data-v-c65b1b26"),e=e(),(0,a.Cn)(),e},i={class:"md:pb-12"},s={class:"font-semibold text-2xl text-gray-400"},u=(0,a.Uk)(" Procedures / "),d=(0,a.Uk)(" Acute HD / "),p=(0,a.Uk)(" Adelbert Mohr / "),m=(0,a.Uk)(" Friday, 29 Jan 2021 "),c=r((function(){return(0,a._)("hr",{class:"my-4 border-b-2 border-bitter-theme-light"},null,-1)})),_=r((function(){return(0,a._)("h2",{class:"form-label italic mt-6 md:mt-12 xl:mt-24"}," Reservation data ",-1)})),g=r((function(){return(0,a._)("hr",{class:"my-4 border-b border-thick-theme-light"},null,-1)})),h={class:"grid gap-2 md:gap-4 md:grid-cols-2 xl:gap-8 2xl:grid-cols-4"},b=r((function(){return(0,a._)("h2",{class:"form-label italic mt-6 md:mt-12 xl:mt-24"}," Prescription ",-1)})),f=r((function(){return(0,a._)("hr",{class:"my-4 border-b border-thick-theme-light"},null,-1)})),y={class:"grid gap-2 md:gap-4 md:grid-cols-2 xl:gap-8 2xl:grid-cols-4"},v=r((function(){return(0,a._)("hr",{class:"border border-dashed my-2 md:my-4 xl:my-8"},null,-1)})),V={class:"grid gap-2 md:gap-4 md:grid-cols-2 xl:gap-8 2xl:grid-cols-4 my-2 md:my-4 xl:my-8"},x={key:0,class:"grid gap-2 md:gap-4 md:grid-cols-2 xl:gap-8 2xl:grid-cols-4 my-2 md:my-4 xl:my-8"},w={key:1},k={class:"grid gap-2 md:gap-4 md:grid-cols-2 xl:gap-8 2xl:grid-cols-4 my-2 md:my-4 xl:my-8"},A={key:2,class:"grid gap-2 md:gap-4 md:grid-cols-2 xl:gap-8 2xl:grid-cols-4 my-2 md:my-4 xl:my-8"},U={key:3,class:"grid gap-2 md:gap-4 md:grid-cols-2 xl:gap-8 2xl:grid-cols-4 my-2 md:my-4 xl:my-8"},C={key:4,class:"grid gap-2 md:gap-4 md:grid-cols-2 xl:gap-8 2xl:grid-cols-4 my-2 md:my-4 xl:my-8"},D={key:5,class:"grid gap-2 md:gap-4 xl:gap-8 my-2 md:my-4 xl:my-8"},W=r((function(){return(0,a._)("hr",{class:"border border-dashed my-2 md:my-4 xl:my-8"},null,-1)})),O={class:"grid gap-2 md:gap-4 md:grid-cols-2 xl:gap-8 2xl:grid-cols-4"},S=r((function(){return(0,a._)("hr",{class:"border border-dashed my-2 md:my-4 xl:my-8"},null,-1)})),z=r((function(){return(0,a._)("label",{class:"form-label"},"transfustion :",-1)})),K={class:"grid gap-2 md:gap-4 md:grid-cols-2 xl:gap-8 2xl:grid-cols-4"},L=r((function(){return(0,a._)("hr",{class:"border border-dashed my-2 md:my-4 xl:my-8"},null,-1)})),T={class:"grid gap-2 md:gap-4 md:grid-cols-2 xl:gap-8 2xl:grid-cols-4"},I=r((function(){return(0,a._)("hr",{class:"border border-dashed my-2 md:my-4 xl:my-8"},null,-1)})),q=r((function(){return(0,a._)("label",{class:"form-label"},"monitoring :",-1)})),N={class:"grid gap-2 md:gap-4 md:grid-cols-2 xl:gap-8 2xl:grid-cols-4"},P=r((function(){return(0,a._)("hr",{class:"border border-dashed my-2 md:my-4 xl:my-8"},null,-1)})),F=r((function(){return(0,a._)("h2",{class:"form-label italic mt-6 md:mt-12 xl:mt-24"}," Pre-Dialysis Labs Request ",-1)})),H=r((function(){return(0,a._)("hr",{class:"my-4 border-b border-thick-theme-light"},null,-1)})),M={key:0,class:"form-label mb-2 md:mb-4 xl:mb-8"},B={class:"italic font-extralight text-dark-theme-light"},E={class:"grid grid-cols-2 gap-2 md:gap-4 xl:gap-8 xl:grid-cols-4"},R=r((function(){return(0,a._)("hr",{class:"border border-dashed my-2 md:my-4 xl:my-8"},null,-1)})),$={class:"grid gap-2 md:gap-4 md:grid-cols-2 xl:gap-8 2xl:grid-cols-4"},Z=r((function(){return(0,a._)("h2",{class:"form-label italic mt-6 md:mt-12 xl:mt-24"}," Pre-Dialysis Treatments Request ",-1)})),G=r((function(){return(0,a._)("hr",{class:"my-4 border-b border-thick-theme-light"},null,-1)})),X=r((function(){return(0,a._)("h2",{class:"form-label italic mt-6 md:mt-12 xl:mt-24"}," post-Dialysis Treatments Request ",-1)})),Y=r((function(){return(0,a._)("hr",{class:"my-4 border-b border-thick-theme-light"},null,-1)})),j={key:0},J=r((function(){return(0,a._)("label",{class:"form-label"},"DLC/PC lock solution",-1)})),Q={class:"grid gap-2 md:gap-4 md:grid-cols-2 xl:gap-8 2xl:grid-cols-4"},ee=r((function(){return(0,a._)("hr",{class:"border border-dashed my-2 md:my-4 xl:my-8"},null,-1)})),te={class:"grid gap-2 md:gap-4 md:grid-cols-2 xl:gap-8 2xl:grid-cols-4"};var ne=n(3665),ae=n(9965),le=n(6556),oe=n(5748),re=n(7183);const ie={layout:oe.Z,components:{FormCheckbox:ne.Z,FormInput:ae.Z,FormSelect:le.Z,Alert:re.Z},computed:{anticoagulantOtherThanHeparin:function(){if(!this.prescription.anticoagulant)return!1;var e=this.prescription.anticoagulant.toLowerCase();return e.includes("enoxaparin")||e.includes("nadroparin")||e.includes("tinzaparin")},anticoagulantDoseOptions:function(){if(!this.prescription.anticoagulant)return[];var e=this.prescription.anticoagulant.toLowerCase();return e.includes("enoxaparin")?this.config.anticoagulantDoseOptions.enoxaparin:e.includes("nadroparin")?this.config.anticoagulantDoseOptions.nadroparin:e.includes("tinzaparin")?this.config.anticoagulantDoseOptions.tinzaparin:[]}},watch:{"prescription.anticoagulant":function(e){this.prescription.anticoagulant_dose="","heparin"===e.toLowerCase()&&(this.prescription.heparin_loading="",this.prescription.heparin_loading_unit="",this.prescription.heparin_maintenance="",this.prescription.heparin_maintenance_unit="")}},data:function(){return{order:{patient_hn:"50164826",patient_name:"Adelbert Mohr",required_date_formatted:"Friday, 5",an:"57584629"},prescription:{ward:"ไตเทียม",dialysis_type:"HD - 4 hours",dialyzer:"",dialysate:"",dialysate_flow:"",reverse_flow:!1,blood_flow:"",dialysate_temperature:"",anticoagulant:"",anticoagulant_none_drip_via_peripheral_iv:!1,anticoagulant_none_nss_200ml_flush_q_hour:!1,heparin_loading_dose:"",heparin_maintenance_dose:"",enoxaparin_dose:"",fondaparinux_bolus_dose:"",tinzaparin_dose:"",anticoagulant_other:"",ultrafiltration:"",dry_weight:"",glucose_50_percent_iv_volume:"",glucose_50_percent_iv_at:"",albumin_20_percent_prime_100ml:"",nutrition_iv_type:"",nutrition_iv_volume:"",prc_volume:"",ffp_volume:"",platelet_volume:"",transfusion_other:"",inotrope:"",o2_rx:"",monitoring_EKG:!1,monitoring_observe_chest_pain:!1,monitoring_observe_neuro_sign:!1,monitoring_BP_map_greater_than_65mmhg:!1,monitoring_other:"",access_type:"",access_site_coagulant:"",spacial:""},labs:{CBC:!1,Hct:!1,BUN:!1,Cr:!1,Na:!1,K:!1,Cl:!1,HCO3:!1,Total_calcium:!1,Phosphate:!1,iPTH:!1,Alb:!1,Glob:!1,TB:!1,DB:!1,AST:!1,ALT:!1,ALP:!1,GGT:!1,PT:!1,INR:!1,APTT:!1,APTT_ratio:!1,Anti_Xa:!1,Iron_study:!1,Ferritin:!1,crossmatch:"",others:""},pre_treatments:"",post_treatment_heparin:"",post_treatment_heparin_dose:"",post_treatment_citrate:"",post_treatment_citrate_dose:"",post_treatment_antibiotic:"",post_treatment_antibiotic_dose:"",post_treatment_ESA:"",post_treatment_ESA_dose:"",post_treatment_iron_iv:"",post_treatment_iron_iv_dose:"",config:{dialyzerOptions:["SF130E","SF150E","SF170E","SF190E","Rexeed 13L","Rexeed 15L","Rexeed 18L","FB170U","FB190U","FB210U","HF80S"],dialysateOptions:["None: Ca 0, K 0, Mg 0, glucose 0","Ca 3.5, K 2, Mg 1, glucose 100: AA 101","Ca 2.0, K 2, Mg 1, glucose 100: AA 201","Ca 2.5, K 2, Mg 1, glucose 100: AA 251","Ca 3.0, K 2, Mg 1, glucose 100: AA 301","Ca 3.5, K 3, Mg 1, glucose 100: AA 101 K3","Ca 2.0, K 3, Mg 1, glucose 100: AA 201 K3","Ca 2.5, K 3, Mg 1, glucose 100: AA 251 K3","Ca 3.0, K 3, Mg 1, glucose 100: AA 301 K3","Ca 3.5, K 2, Mg 0.7, glucose 100: AA 101","Ca 2.0, K 2, Mg 0.7, glucose 100: AA 201","Ca 2.5, K 2, Mg 0.7, glucose 100: AA 251","Ca 3.0, K 2, Mg 0.7, glucose 100: AA 301","Ca 3.5, K 3, Mg 0.7, glucose 100: AA 101 K3","Ca 2.0, K 3, Mg 0.7, glucose 100: AA 201 K3","Ca 2.5, K 3, Mg 0.7, glucose 100: AA 251 K3","Ca 3.0, K 3, Mg 0.7, glucose 100: AA 301 K3"],bloodFlowOptions:[150,200,250,300,350,400,500],dialysateFlowOptions:[150,200,250,300,350,400,500],sessionLengthOptions:[2,3,4,5,6,7,8],dialysateTemperatureOptions:[35.5,36,36.5,37],sodiumProfileOptions:["None","No.1","No.2","No.3","No.4","No.5","No.6"],anticoagulantOptions:[{value:"None",label:"None"},{value:"Heparin",label:"Heparin"},{value:"Enoxaparin",label:"Enoxaparin (Clexane®, Levenox®)"},{value:"Fondaparinux",label:"Fondaparinux"},{value:"Tinzaparin",label:"Tinzaparin (Innohep)"},{value:"Other",label:"Other"}],anticoagulantLoadingOptions:[0,500,1e3,1500,2e3,40,60,80],anticoagulantLoadingUnitOptions:["units","mg"],anticoagulantMaintenanceOptions:[0,250,500,1e3],anticoagulantMaintenanceUnitOptions:["units","mg"],anticoagulantDoseOptions:{enoxaparin:[{value:30,label:"30 mg (0.3 ml)"},{value:40,label:"40 mg (0.4 ml)"},{value:60,label:"60 mg (0.5 ml)"},{value:80,label:"80 mg (0.8 ml)"}],nadroparin:[{value:.3,label:"0.3 ml (2,850 IUAXa)"},{value:.4,label:"0.4 ml (3,800 IUAXa)"},{value:.6,label:"0.6 ml (5,700 IUAXa)"},{value:.8,label:"0.8 ml (7,600 IUAXa)"}],tinzaparin:[{value:.25,label:"0.25 ml (2,850 IUAXa)"},{value:.35,label:"0.35 ml (3,500 IUAXa)"},{value:.45,label:"0.45 ml (4,500 IUAXa)"}]},NSSFlush:["100 ml q 30 min","100 ml q 60 min","200 ml q 30 min","200 ml q 60 min"],glucoseIVAtOptions:[{value:1,label:"At 1 hour"},{value:2,label:"At 2 hour"},{value:3,label:"At 3 hour"},{value:4,label:"At 4 hour"}],o2RxOptions:["None","O2 canula","O2 mask with bag","Nasal high flow","NIV","Ventilator"],monitors:[{name:"monitoring_EKG",label:"EKG"},{name:"monitoring_observe_chest_pain",label:"Observe chest pain"},{name:"monitoring_observe_neuro_sign",label:"Observe neuro sign"},{name:"monitoring_BP_map_greater_than_65mmhg",label:"BP MAP > 65 mmHg"}],ekgOptions:["No","Monitoring"],accessTypeOptions:["DLC","Perm cath","AVF","AVG"],accessSiteOptionsAV:["Rt arm","Lt arm","Rt leg","Lt leg"],accessSiteOptionsNonAV:["Rt IJV","Lt IJV","Rt Femoral vain","Lt Femoral vain","Rt SCV","Lt SCV"],labSets:[{name:"",labs:["CBC","Hct","BUN","Cr"]},{name:"Electrolyte",labs:["Na","K","Cl","HCO3"]},{name:"",labs:["Total calcium","Phosphate","iPTH"]},{name:"LFT",labs:["Alb","Glob","TB","DB","AST","ALT","ALP","GGT"]},{name:"Coagulogram",labs:["PT","INR","APTT","APTT ratio","Anti Xa"]},{name:"",labs:["Iron study","Ferritin"]}],validators:[{name:"heparin_loading_dose",min:250,max:2e3,type:"integer"},{name:"heparin_maintenance_dose",min:0,max:1500,type:"integer"},{name:"enoxaparin_dose",min:.3,max:.8,type:"float"},{name:"tinzaparin_dose",min:1500,max:3500,type:"interger"},{name:"ultrafiltration",min:0,max:4e3,type:"interger"},{name:"glucose_50_percent_iv_volume",min:50,max:100,type:"interger"}]},errors:{heparin_loading_dose:[],heparin_maintenance_dose:[],enoxaparin_dose:[],tinzaparin_dose:[],ultrafiltration:[],glucose_50_percent_iv_volume:[]}}},methods:{validate:function(e){var t=this.config.validators.filter((function(t){return t.name===e}))[0],n="integer"==t.type?parseInt(this.prescription[e]):parseFloat(this.prescription[e]);n<t.min||n>t.max?(this.errors[e][0]="Data could not be saved. Accept range [".concat(t.min,", ").concat(t.max,"]."),console.log("".concat(e," invalid"))):this.errors[e]=[]}}};var se=n(3379),ue=n.n(se),de=n(29),pe={insert:"head",singleton:!1};ue()(de.Z,pe);de.Z.locals;const me=(0,n(3744).Z)(ie,[["render",function(e,t,n,r,ne,ae){var le=(0,a.up)("inertia-link"),oe=(0,a.up)("form-input"),re=(0,a.up)("form-select"),ie=(0,a.up)("form-checkbox"),se=(0,a.up)("alert");return(0,a.wg)(),(0,a.iD)("div",i,[(0,a._)("h1",s,[(0,a.Wm)(le,{class:"text-bitter-theme-light",href:"".concat(e.$page.props.app.baseUrl,"/prototypes/ProceduresIndex")},{default:(0,a.w5)((function(){return[u]})),_:1},8,["href"]),(0,a.Wm)(le,{class:"text-dark-theme-light",href:"".concat(e.$page.props.app.baseUrl,"/prototypes/AcuteHDIndex")},{default:(0,a.w5)((function(){return[d]})),_:1},8,["href"]),(0,a.Wm)(le,{class:"text-thick-theme-light",href:"".concat(e.$page.props.app.baseUrl,"/prototypes/AcuteHDCaseEdit")},{default:(0,a.w5)((function(){return[p]})),_:1},8,["href"]),m]),c,_,g,(0,a._)("div",h,[(0,a.Wm)(oe,{modelValue:ne.order.patient_hn,"onUpdate:modelValue":t[0]||(t[0]=function(e){return ne.order.patient_hn=e}),name:"patient_hn",label:"hn",readonly:!0},null,8,["modelValue"]),(0,a.Wm)(oe,{modelValue:ne.order.patient_name,"onUpdate:modelValue":t[1]||(t[1]=function(e){return ne.order.patient_name=e}),name:"patient_name",label:"name",readonly:!0},null,8,["modelValue"]),(0,a.Wm)(oe,{modelValue:ne.order.required_date_formatted,"onUpdate:modelValue":t[2]||(t[2]=function(e){return ne.order.required_date_formatted=e}),name:"required_date_formatted",label:"required date",readonly:!0},null,8,["modelValue"]),(0,a.Wm)(oe,{modelValue:ne.prescription.ward,"onUpdate:modelValue":t[3]||(t[3]=function(e){return ne.prescription.ward=e}),name:"ward",label:"ward",readonly:!0},null,8,["modelValue"]),(0,a.Wm)(oe,{modelValue:ne.prescription.dialysis_type,"onUpdate:modelValue":t[4]||(t[4]=function(e){return ne.prescription.dialysis_type=e}),name:"dialysis_type",label:"dialysis type",readonly:!0},null,8,["modelValue"]),(0,a.Wm)(oe,{modelValue:ne.order.an,"onUpdate:modelValue":t[5]||(t[5]=function(e){return ne.order.an=e}),name:"an",label:"an",readonly:!0},null,8,["modelValue"])]),b,f,(0,a._)("div",y,[(0,a.Wm)(re,{label:"access type",modelValue:ne.prescription.access_type,"onUpdate:modelValue":t[6]||(t[6]=function(e){return ne.prescription.access_type=e}),name:"access_type",options:ne.config.accessTypeOptions},null,8,["modelValue","options"]),(0,a.Wm)(re,{label:"access site coagulant",modelValue:ne.prescription.access_site_coagulant,"onUpdate:modelValue":t[7]||(t[7]=function(e){return ne.prescription.access_site_coagulant=e}),name:"access_site_coagulant",options:ne.prescription.access_type.startsWith("AV")?ne.config.accessSiteOptionsAV:ne.config.accessSiteOptionsNonAV,disabled:!ne.prescription.access_type},null,8,["modelValue","options","disabled"]),(0,a.Wm)(re,{modelValue:ne.prescription.dialyzer,"onUpdate:modelValue":t[8]||(t[8]=function(e){return ne.prescription.dialyzer=e}),name:"dialyzer",label:"dialyzer",options:ne.config.dialyzerOptions},null,8,["modelValue","options"]),(0,a.Wm)(re,{modelValue:ne.prescription.dialysate,"onUpdate:modelValue":t[9]||(t[9]=function(e){return ne.prescription.dialysate=e}),name:"dialysate",label:"dialysate",options:ne.config.dialysateOptions},null,8,["modelValue","options"]),(0,a.Wm)(oe,{"model-value":ne.prescription.dialysate_flow,"onUpdate:model-value":t[10]||(t[10]=function(e){return ne.prescription.dialysate_flow=e}),"model-chackbox":ne.prescription.reverse_flow,"onUpdate:model-chackbox":t[11]||(t[11]=function(e){return ne.prescription.reverse_flow=e}),type:"number",pattern:"\\d*",name:"dialysate_flow",label:"dialysate flow (ml/min)","switch-label":"Reverse flow"},null,8,["model-value","model-chackbox"]),(0,a.Wm)(oe,{modelValue:ne.prescription.blood_flow,"onUpdate:modelValue":t[12]||(t[12]=function(e){return ne.prescription.blood_flow=e}),type:"number",pattern:"\\d*",name:"blood_flow",label:"blood flow (ml/min)"},null,8,["modelValue"]),(0,a.Wm)(oe,{modelValue:ne.prescription.dialysate_temperature,"onUpdate:modelValue":t[13]||(t[13]=function(e){return ne.prescription.dialysate_temperature=e}),type:"number",name:"dialysate_temperature",label:"dialysate temperature (℃)"},null,8,["modelValue"])]),v,(0,a._)("div",V,[(0,a.Wm)(re,{modelValue:ne.prescription.anticoagulant,"onUpdate:modelValue":t[14]||(t[14]=function(e){return ne.prescription.anticoagulant=e}),name:"anticoagulant",label:"anticoagulant",options:ne.config.anticoagulantOptions},null,8,["modelValue","options"])]),(0,a.Wm)(l.uT,{name:"slide-fade"},{default:(0,a.w5)((function(){return["None"==ne.prescription.anticoagulant?((0,a.wg)(),(0,a.iD)("div",x,[(0,a.Wm)(ie,{label:"anticoagulant drip via peripheral IV",name:"anticoagulant_none_drip_via_peripheral_iv",modelValue:ne.prescription.anticoagulant_none_drip_via_peripheral_iv,"onUpdate:modelValue":t[15]||(t[15]=function(e){return ne.prescription.anticoagulant_none_drip_via_peripheral_iv=e})},null,8,["modelValue"]),(0,a.Wm)(ie,{label:"NSS 200 ml flush q 1 hour",name:"anticoagulant_none_nss_200ml_flush_q_hour",modelValue:ne.prescription.anticoagulant_none_nss_200ml_flush_q_hour,"onUpdate:modelValue":t[16]||(t[16]=function(e){return ne.prescription.anticoagulant_none_nss_200ml_flush_q_hour=e})},null,8,["modelValue"])])):"Heparin"==ne.prescription.anticoagulant?((0,a.wg)(),(0,a.iD)("div",w,[(0,a._)("div",k,[(0,a.Wm)(oe,{label:"loading dose (iu)",name:"heparin_loading_dose",modelValue:ne.prescription.heparin_loading_dose,"onUpdate:modelValue":t[17]||(t[17]=function(e){return ne.prescription.heparin_loading_dose=e}),type:"number",pattern:"\\d*",onAutosave:t[18]||(t[18]=function(e){return ae.validate("heparin_loading_dose")}),errors:ne.errors.heparin_loading_dose,placeholder:"[250, 2000] IU"},null,8,["modelValue","errors"]),(0,a.Wm)(oe,{label:"maintenance dose (iu/hour)",name:"heparin_maintenance_dose",modelValue:ne.prescription.heparin_maintenance_dose,"onUpdate:modelValue":t[19]||(t[19]=function(e){return ne.prescription.heparin_maintenance_dose=e}),type:"number",pattern:"\\d*",onAutosave:t[20]||(t[20]=function(e){return ae.validate("heparin_maintenance_dose")}),errors:ne.errors.heparin_maintenance_dose,placeholder:"[0, 1500] IU/Hour"},null,8,["modelValue","errors"])]),(0,a.Wm)(se,{title:"Duration of maintenance (hours)",message:"DLC/PC uses duration of dialysis. AVF/AVG uses duration of dialysis - 1."})])):"Enoxaparin"==ne.prescription.anticoagulant?((0,a.wg)(),(0,a.iD)("div",A,[(0,a.Wm)(oe,{label:"dose (ml)",name:"enoxaparin_dose",modelValue:ne.prescription.enoxaparin_dose,"onUpdate:modelValue":t[21]||(t[21]=function(e){return ne.prescription.enoxaparin_dose=e}),type:"number",onAutosave:t[22]||(t[22]=function(e){return ae.validate("enoxaparin_dose")}),errors:ne.errors.enoxaparin_dose,placeholder:"[0.3, 0.8] ml"},null,8,["modelValue","errors"])])):"Fondaparinux"==ne.prescription.anticoagulant?((0,a.wg)(),(0,a.iD)("div",U,[(0,a.Wm)(re,{label:"bolus dose (iu)",name:"fondaparinux_bolus_dose",modelValue:ne.prescription.fondaparinux_bolus_dose,"onUpdate:modelValue":t[23]||(t[23]=function(e){return ne.prescription.fondaparinux_bolus_dose=e}),options:["500","750"]},null,8,["modelValue"])])):"Tinzaparin"==ne.prescription.anticoagulant?((0,a.wg)(),(0,a.iD)("div",C,[(0,a.Wm)(oe,{label:"dose (iu)",name:"tinzaparin_dose",modelValue:ne.prescription.tinzaparin_dose,"onUpdate:modelValue":t[24]||(t[24]=function(e){return ne.prescription.tinzaparin_dose=e}),type:"number",pattern:"\\d*",onAutosave:t[25]||(t[25]=function(e){return ae.validate("tinzaparin_dose")}),errors:ne.errors.tinzaparin_dose,placeholder:"[1500, 3500] IU"},null,8,["modelValue","errors"])])):"Other"==ne.prescription.anticoagulant?((0,a.wg)(),(0,a.iD)("div",D,[(0,a.Wm)(oe,{name:"anticoagulant_other",modelValue:ne.prescription.anticoagulant_other,"onUpdate:modelValue":t[26]||(t[26]=function(e){return ne.prescription.anticoagulant_other=e}),placeholder:"please specify"},null,8,["modelValue"])])):(0,a.kq)("",!0)]})),_:1}),W,(0,a._)("div",O,[(0,a.Wm)(oe,{pattern:"\\d*",label:"uf (ml.)",modelValue:ne.prescription.ultrafiltration,"onUpdate:modelValue":t[27]||(t[27]=function(e){return ne.prescription.ultrafiltration=e}),name:"ultrafiltration",type:"number",onAutosave:t[28]||(t[28]=function(e){return ae.validate("ultrafiltration")}),errors:ne.errors.ultrafiltration,placeholder:"[0, 4000] ml"},null,8,["modelValue","errors"]),(0,a.Wm)(oe,{label:"dry weight (kg.)",modelValue:ne.prescription.dry_weight,"onUpdate:modelValue":t[29]||(t[29]=function(e){return ne.prescription.dry_weight=e}),name:"dry_weight",type:"number"},null,8,["modelValue"]),(0,a.Wm)(oe,{label:"50% Glucose IV volume (ml)",modelValue:ne.prescription.glucose_50_percent_iv_volume,"onUpdate:modelValue":t[30]||(t[30]=function(e){return ne.prescription.glucose_50_percent_iv_volume=e}),name:"glucose_50_percent_iv_volume",pattern:"\\d*",type:"number",onAutosave:t[31]||(t[31]=function(e){return ae.validate("glucose_50_percent_iv_volume")}),errors:ne.errors.glucose_50_percent_iv_volume,placeholder:"[50, 100] ml"},null,8,["modelValue","errors"]),(0,a.Wm)(re,{label:"50% glucose iv at",modelValue:ne.prescription.glucose_50_percent_iv_at,"onUpdate:modelValue":t[32]||(t[32]=function(e){return ne.prescription.glucose_50_percent_iv_at=e}),name:"glucose_50_percent_iv_at",options:ne.config.glucoseIVAtOptions},null,8,["modelValue","options"]),(0,a.Wm)(re,{label:"20% albumin prime 100 ml",modelValue:ne.prescription.albumin_20_percent_prime_100ml,"onUpdate:modelValue":t[33]||(t[33]=function(e){return ne.prescription.albumin_20_percent_prime_100ml=e}),name:"albumin_20_percent_prime_100ml",options:["Yes","No"]},null,8,["modelValue"]),(0,a.Wm)(oe,{label:"nutrition iv type",modelValue:ne.prescription.nutrition_iv_type,"onUpdate:modelValue":t[34]||(t[34]=function(e){return ne.prescription.nutrition_iv_type=e}),name:"nutrition_iv_type"},null,8,["modelValue"]),(0,a.Wm)(oe,{label:"nutrition iv volume (ml)",modelValue:ne.prescription.nutrition_iv_volume,"onUpdate:modelValue":t[35]||(t[35]=function(e){return ne.prescription.nutrition_iv_volume=e}),name:"nutrition_iv_volume",type:"number",pattern:"\\d*"},null,8,["modelValue"])]),S,z,(0,a._)("div",K,[(0,a.Wm)(oe,{label:"prc volume (unit)",name:"prc_volume",modelValue:ne.prescription.prc_volume,"onUpdate:modelValue":t[36]||(t[36]=function(e){return ne.prescription.prc_volume=e}),type:"number"},null,8,["modelValue"]),(0,a.Wm)(oe,{label:"ffp volume (ml)",name:"ffp_volume",modelValue:ne.prescription.ffp_volume,"onUpdate:modelValue":t[37]||(t[37]=function(e){return ne.prescription.ffp_volume=e}),type:"number",pattern:"\\d*"},null,8,["modelValue"]),(0,a.Wm)(oe,{label:"platelet volume (unit)",name:"platelet_volume",modelValue:ne.prescription.platelet_volume,"onUpdate:modelValue":t[38]||(t[38]=function(e){return ne.prescription.platelet_volume=e}),type:"number"},null,8,["modelValue"]),(0,a.Wm)(oe,{label:"other",name:"transfusion_other",modelValue:ne.prescription.transfusion_other,"onUpdate:modelValue":t[39]||(t[39]=function(e){return ne.prescription.transfusion_other=e})},null,8,["modelValue"])]),L,(0,a._)("div",T,[(0,a.Wm)(re,{label:"inotrope",modelValue:ne.prescription.inotrope,"onUpdate:modelValue":t[40]||(t[40]=function(e){return ne.prescription.inotrope=e}),name:"inotrope",options:["Yes","No"]},null,8,["modelValue"]),(0,a.Wm)(re,{label:"o2 rx",modelValue:ne.prescription.o2_rx,"onUpdate:modelValue":t[41]||(t[41]=function(e){return ne.prescription.o2_rx=e}),name:"o2_rx",options:ne.config.o2RxOptions},null,8,["modelValue","options"])]),I,q,(0,a._)("div",N,[((0,a.wg)(!0),(0,a.iD)(a.HY,null,(0,a.Ko)(ne.config.monitors,(function(e,t){return(0,a.wg)(),(0,a.j4)(ie,{key:t,label:e.label,name:e.name,modelValue:ne.prescription[e.name],"onUpdate:modelValue":function(t){return ne.prescription[e.name]=t}},null,8,["label","name","modelValue","onUpdate:modelValue"])})),128)),(0,a.Wm)(oe,{label:"other",name:"monitoring_other",modelValue:ne.prescription.monitoring_other,"onUpdate:modelValue":t[42]||(t[42]=function(e){return ne.prescription.monitoring_other=e})},null,8,["modelValue"])]),P,(0,a.Wm)(oe,{class:"mt-2 md:bt-4 xl:mt-8",label:"spacial order",name:"spacial",modelValue:ne.prescription.spacial,"onUpdate:modelValue":t[43]||(t[43]=function(e){return ne.prescription.spacial=e})},null,8,["modelValue"]),F,H,((0,a.wg)(!0),(0,a.iD)(a.HY,null,(0,a.Ko)(ne.config.labSets,(function(e,t){return(0,a.wg)(),(0,a.iD)("div",{key:t},[e.name?((0,a.wg)(),(0,a.iD)("label",M,[(0,a._)("span",B,(0,o.zw)(e.name),1)])):(0,a.kq)("",!0),(0,a._)("div",E,[((0,a.wg)(!0),(0,a.iD)(a.HY,null,(0,a.Ko)(e.labs,(function(e,t){return(0,a.wg)(),(0,a.j4)(ie,{key:t,label:e,name:e,modelValue:ne.labs[e.replaceAll(" ","_")],"onUpdate:modelValue":function(t){return ne.labs[e.replaceAll(" ","_")]=t}},null,8,["label","name","modelValue","onUpdate:modelValue"])})),128))]),R])})),128)),(0,a._)("div",$,[(0,a.Wm)(oe,{label:"crossmatch",name:"lab_crossmatch",placeholder:"please specify",modelValue:ne.labs.crossmatch,"onUpdate:modelValue":t[44]||(t[44]=function(e){return ne.labs.crossmatch=e})},null,8,["modelValue"]),(0,a.Wm)(oe,{label:"others",name:"lab_others",modelValue:ne.labs.others,"onUpdate:modelValue":t[45]||(t[45]=function(e){return ne.labs.others=e})},null,8,["modelValue"])]),Z,G,(0,a.Wm)(oe,{class:"mt-2 md:bt-4 xl:mt-8",name:"pre_treatments",modelValue:ne.pre_treatments,"onUpdate:modelValue":t[46]||(t[46]=function(e){return ne.pre_treatments=e})},null,8,["modelValue"]),X,Y,"Perm cath"==ne.prescription.access_type||"DLC"==ne.prescription.access_type?((0,a.wg)(),(0,a.iD)("div",j,[J,(0,a._)("div",Q,[(0,a.Wm)(oe,{label:"heparin",name:"post_treatment_heparin",modelValue:ne.post_treatment_heparin,"onUpdate:modelValue":t[47]||(t[47]=function(e){return ne.post_treatment_heparin=e})},null,8,["modelValue"]),(0,a.Wm)(oe,{label:"heparin dose",name:"post_treatment_heparin_dose",modelValue:ne.post_treatment_heparin_dose,"onUpdate:modelValue":t[48]||(t[48]=function(e){return ne.post_treatment_heparin_dose=e})},null,8,["modelValue"]),(0,a.Wm)(oe,{label:"citrate",name:"post_treatment_citrate",modelValue:ne.post_treatment_citrate,"onUpdate:modelValue":t[49]||(t[49]=function(e){return ne.post_treatment_citrate=e})},null,8,["modelValue"]),(0,a.Wm)(oe,{label:"citrate dose",name:"post_treatment_citrate_dose",modelValue:ne.post_treatment_citrate_dose,"onUpdate:modelValue":t[50]||(t[50]=function(e){return ne.post_treatment_citrate_dose=e})},null,8,["modelValue"]),(0,a.Wm)(oe,{label:"antibiotic",name:"post_treatment_antibiotic",modelValue:ne.post_treatment_antibiotic,"onUpdate:modelValue":t[51]||(t[51]=function(e){return ne.post_treatment_antibiotic=e})},null,8,["modelValue"]),(0,a.Wm)(oe,{label:"antibiotic dose",name:"post_treatment_antibiotic_dose",modelValue:ne.post_treatment_antibiotic_dose,"onUpdate:modelValue":t[52]||(t[52]=function(e){return ne.post_treatment_antibiotic_dose=e})},null,8,["modelValue"])]),ee])):(0,a.kq)("",!0),(0,a._)("div",te,[(0,a.Wm)(oe,{label:"ESA",name:"post_treatment_ESA",modelValue:ne.post_treatment_ESA,"onUpdate:modelValue":t[53]||(t[53]=function(e){return ne.post_treatment_ESA=e})},null,8,["modelValue"]),(0,a.Wm)(oe,{label:"ESA dose",name:"post_treatment_ESA_dose",modelValue:ne.post_treatment_ESA_dose,"onUpdate:modelValue":t[54]||(t[54]=function(e){return ne.post_treatment_ESA_dose=e})},null,8,["modelValue"]),(0,a.Wm)(oe,{label:"Iron iv",name:"post_treatment_iron_iv",modelValue:ne.post_treatment_iron_iv,"onUpdate:modelValue":t[55]||(t[55]=function(e){return ne.post_treatment_iron_iv=e})},null,8,["modelValue"]),(0,a.Wm)(oe,{label:"Iron iv dose",name:"post_treatment_iron_iv_dose",modelValue:ne.post_treatment_iron_iv_dose,"onUpdate:modelValue":t[56]||(t[56]=function(e){return ne.post_treatment_iron_iv_dose=e})},null,8,["modelValue"])])])}],["__scopeId","data-v-c65b1b26"]])}}]);