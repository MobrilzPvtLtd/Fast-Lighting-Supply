import"./bootstrap-d2a70c13-v4.1.3.js";import"./flatpickr-d03fdfa2-v4.1.3.js";import"./mousetrap-87e41666-v4.1.3.js";import{N as c}from"./nprogress-c3d60e2c-v4.1.3.js";import"./datatables.net-bs-edb2e96b-v4.1.3.js";import{D as d}from"./datatables.net-73a12536-v4.1.3.js";import{t as h,k as p,n as f,i as m,s as b,w as g,e as w}from"./functions-ef5266fd-v4.1.3.js";import"./blueimp-md5-133dffcb-v4.1.3.js";import"./jquery-591889e9-v4.1.3.js";$.FleetCart={};$.FleetCart.options={animationSpeed:300,sidebarToggleSelector:"[data-toggle='offcanvas']",sidebarPushMenu:!0,enableBoxRefresh:!0,enableBSToppltip:!0,BSTooltipSelector:"[data-toggle='tooltip']",enableControlTreeView:!0,screenSizes:{xs:480,sm:768,md:992,lg:1200}};$(function(){var r=$.FleetCart.options;v(),$.FleetCart.layout.activate(),r.enableControlTreeView&&$.FleetCart.tree(".sidebar"),r.sidebarPushMenu&&$.FleetCart.pushMenu.activate(r.sidebarToggleSelector),r.enableBSToppltip&&$("body").tooltip({selector:r.BSTooltipSelector,container:"body"})});function v(){$.FleetCart.layout={activate:function(){var r=this;r.fix(),$(window,".wrapper").resize(function(){r.fix()})},fix:function(){var r=$(window).height();$(".wrapper").css("min-height",r+"px")}},$.FleetCart.pushMenu={activate:function(r){var e=$.FleetCart.options.screenSizes;$(document).on("click",r,function(a){if(a.preventDefault(),$(window).outerWidth()>e.md-1){if($("body").hasClass("sidebar-collapse")){$("body").removeClass("sidebar-collapse").trigger("expanded.pushMenu");return}$("body").addClass("sidebar-collapse").trigger("collapsed.pushMenu");return}if($("body").hasClass("sidebar-open")){$("body").removeClass("sidebar-open").removeClass("sidebar-collapse").trigger("collapsed.pushMenu");return}$("body").addClass("sidebar-open").trigger("expanded.pushMenu")}),$(window).on("resize",function(){$(window).outerWidth()>e.md-1||$("body").removeClass("sidebar-collapse")}),$(".content-wrapper").click(function(){$(window).width()<=e.md-1&&$("body").hasClass("sidebar-open")&&$("body").removeClass("sidebar-open")})}},$.FleetCart.tree=function(r){var e=$.FleetCart.options.animationSpeed;$(document).off("click",r+" li a").on("click",r+" li a",function(a){var t=$(this),o=t.next(),i=t.closest(".sidebar-menu").find(".active");o.is(".treeview-menu")&&(t.closest(".sidebar-menu").find(".selected").removeClass("selected"),a.preventDefault()),t.parent().is(".active")?i.toggleClass("closed"):i.addClass("closed"),o.is(".treeview-menu")&&o.is(":visible")&&!$("body").hasClass("sidebar-collapse")?(t.parent().removeClass("selected"),o.slideUp(e)):o.is(".treeview-menu")&&!o.is(":visible")&&(t.parents("ul").first().find("ul:visible").slideUp(e),t.parent().addClass("selected"),o.slideDown(e))})}}(function(r){r.fn.boxRefresh=function(e){var a=r.extend({trigger:".refresh-btn",source:"",onLoadStart:function(n){return n},onLoadDone:function(n){return n}},e),t=r('<div class="overlay"><div class="fa fa-refresh fa-spin"></div></div>');return this.each(function(){if(a.source===""){window.console&&window.console.log("Please specify a source first - boxRefresh()");return}var n=r(this),s=n.find(a.trigger).first();s.on("click",function(l){l.preventDefault(),o(n),n.find(".box-body").load(a.source,function(){i(n)})})});function o(n){n.append(t),a.onLoadStart.call(n)}function i(n){n.find(t).remove(),a.onLoadDone.call(n)}}})(jQuery);(function(r,e,a,t){let o="keypressAction",i={};function n(s,l){this.element=s,this.settings=r.extend({},i,l),this._defaults=i,this._name=o,this.init()}r.extend(n.prototype,{bindKeyToRoute(s,l){Mousetrap.bind([s],k=>(e.location=l,!1))},init(){r.each(this.settings.actions,(s,l)=>{this.bindKeyToRoute(l.key,l.route)})}}),r.fn[o]=function(s){return this.each(function(){r.data(this,`plugin_${o}`)||r.data(this,`plugin_${o}`,new n(this,s))}),this}})(jQuery,window);class C{constructor(){this.selectize(),this.dateTimePicker(),this.changeAccordionTabState(),this.preventChangingCurrentTab(),this.buttonLoading(),this.confirmationModal(),this.tooltip(),this.shortcuts(),this.nprogress(),this.setActiveAccordionTabQueryParam(),this.setDefaultActiveAccordionTabQueryParam(),this.stopDropdownPropagation()}stopDropdownPropagation(){$(".dropdown-menu").on("click",e=>{e.stopPropagation()})}selectize(){let e=$("select.selectize").removeClass("form-control custom-select-black"),a=_.merge({valueField:"id",labelField:"name",searchField:"name",delimiter:",",persist:!0,selectOnTab:!0,hideSelected:!0,allowEmptyOption:!0,onItemAdd(t){this.getItem(t)[0].innerHTML=this.getItem(t)[0].innerHTML.replace(/¦––\s/g,"")},onInitialize(){for(let t in this.options){let o=this.options[t].name,i=this.options[t].id;this.$control.find(`.item[data-value="${i}"]`).html(o.replace(/¦––\s/g,"")+'<a href="javascript:void(0)" class="remove" tabindex="-1">×</a>')}}},...FleetCart.selectize);for(let t of e){t=$(t);let o=!0,i=["remove_button","restore_on_backspace"];t.hasClass("prevent-creation")&&(o=!1,i.remove("restore_on_backspace")),t.selectize(_.merge(a,{create:o,plugins:i}))}}dateTimePicker(e){e=e||$(".datetime-picker"),e=e instanceof jQuery?e:$(e);for(let a of e)$(a).flatpickr({mode:a.hasAttribute("data-range")?"range":"single",enableTime:a.hasAttribute("data-time"),noCalender:a.hasAttribute("data-no-calender"),altInput:!0})}changeAccordionTabState(){$('.accordion-box [data-toggle="tab"]').on("click",e=>{$(e.currentTarget).parent().hasClass("active")||$(".accordion-tab li.active").removeClass("active")})}preventChangingCurrentTab(){$('[data-toggle="tab"]').on("click",e=>{if($(e.currentTarget).parent().hasClass("active"))return!1})}removeSubmitButtonOffsetOn(e,a=null){e=Array.isArray(e)?e:[e],$(a||".accordion-tab li > a").on("click",t=>{e.includes(t.currentTarget.getAttribute("href"))?setTimeout(()=>{$("button[type=submit]").parent().removeClass("col-md-offset-2")},150):setTimeout(()=>{$("button[type=submit]").parent().addClass("col-md-offset-2")},150)})}buttonLoading(){$(document).on("click","[data-loading]",e=>{let a=$(e.currentTarget);a.data("loading-text",a.html()).addClass("btn-loading").button("loading")})}stopButtonLoading(e){e=e instanceof jQuery?e:$(e),e.data("loading-text",e.html()).removeClass("btn-loading").button("reset")}confirmationModal(){let e=$("#confirmation-modal");$("[data-confirm]").on("click",()=>{e.modal("show")}),e.find("form").on("submit",()=>{e.find("button.delete").prop("disabled",!0)}),e.on("hidden.bs.modal",()=>{e.find("button.delete").prop("disabled",!1)}),e.on("shown.bs.modal",()=>{e.find("button.delete").focus()})}tooltip(){$('[data-toggle="tooltip"]').tooltip({trigger:"hover"}).on("click",e=>{$(e.currentTarget).tooltip("hide")})}shortcuts(){Mousetrap.bind("f1",()=>{window.open("https://docs.envaysoft.com/","_blank")}),Mousetrap.bind("?",()=>{$("#keyboard-shortcuts-modal").modal()})}nprogress(){c.configure({showSpinner:!1}),$(document).ajaxStart(()=>c.start()),$(document).ajaxComplete(()=>c.done())}setActiveAccordionTabQueryParam(){$('.accordion-box a[data-toggle="tab"]').on("click",e=>{const a=$(e.currentTarget),t=a.closest("form"),o=`?tab=${a.attr("href").slice(1)}`;t.attr("action",`${t.attr("action").split("?")[0]}${o}`),history.replaceState(null,null,`${window.location.pathname}${o}`)})}setDefaultActiveAccordionTabQueryParam(){const e=$(".accordion-tab li.active a");if(e.length!==0){const a=e.closest("form"),t=`?tab=${e.attr("href").slice(1)}`;a.attr("action",`${a.attr("action")}${t}`),history.replaceState(null,null,`${window.location.pathname}${t}`)}}}class T{appendHiddenInput(e,a,t){$("<input>").attr({type:"hidden",name:a,value:t}).appendTo(e)}appendHiddenInputs(e,a,t){for(let o of t)this.appendHiddenInput(e,a+"[]",o)}removeErrors(){$(".has-error > .help-block").remove(),$(".has-error").removeClass("has-error")}}FleetCart.dataTable={routes:{},selected:{}};let u=null;class y{constructor(e,a,t){this.selector=e,this.element=$(e),FleetCart.dataTable.selected[e]===void 0&&(FleetCart.dataTable.selected[e]=[]),this.initiateDataTable(a,t),this.addErrorHandler(),this.registerTableProcessingPlugin()}initiateDataTable(e,a){let t=this.element.find("th[data-sort]");u=new d(this.element,_.merge({serverSide:!0,processing:!0,ajax:this.route("table",{table:!0}),stateSave:!0,sort:!0,info:!0,filter:!0,lengthChange:!0,paginate:!0,autoWidth:!1,pageLength:20,lengthMenu:[10,20,50,100,200],order:[t.index()!==-1?t.index():1,t.data("sort")||"desc"],initComplete:()=>{this.hasRoute("destroy")&&(this.addTableActions().on("click",()=>this.deleteRows()),this.selectAllRowsEventListener()),(this.hasRoute("show")||this.hasRoute("edit"))&&this.onRowClick(this.redirectToRowPage),a!==void 0&&a.call(this)},rowCallback:(o,i)=>{(this.hasRoute("show")||this.hasRoute("edit"))&&this.makeRowClickable(o,i.id)},drawCallback:()=>{this.element.find(".select-all").prop("checked",!1),setTimeout(()=>{this.selectRowEventListener(),this.checkSelectedCheckboxes(this.constructor.getSelectedIds(this.selector))})},stateSaveParams(o,i){delete i.search}},e))}addTableActions(){let e=`
            <button type="button" class="btn btn-default btn-delete">
                ${trans("admin::admin.buttons.delete")}
            </button>
        `;return $(e).appendTo(this.element.closest(".dt-container").find(".dt-length"))}deleteRows(){let e=this.element.find(".select-row:checked");if(e.length===0)return;let a=$("#confirmation-modal"),t=[];a.modal("show").find("form").on("submit",o=>{o.preventDefault(),a.modal("hide");let i=this.constructor.getRowIds(e);t.length!==0&&_.difference(t,i).length===0||$.ajax({type:"DELETE",url:this.route("destroy",{ids:i.join()}),success:()=>{t=_.flatten(t.concat(i)),this.constructor.setSelectedIds(this.selector,[]),this.constructor.reload(this.element)},error:n=>{error(n.responseJSON.message),t=_.flatten(t.concat(i)),this.constructor.setSelectedIds(this.selector,[]),this.constructor.reload(this.element)}})})}makeRowClickable(e,a){let t=this.hasRoute("show")?"show":"edit",o=this.route(t,{id:a});$(e).addClass("clickable-row").data("href",o)}onRowClick(e){let a="tbody tr.clickable-row td";this.element.find(".select-all").length!==0&&(a+=":not(:first-child)"),this.element.on("click",a,e)}redirectToRowPage(e){window.open($(e.currentTarget).parent().data("href"),e.ctrlKey?"_blank":"_self")}selectAllRowsEventListener(){this.element.find(".select-all").on("change",e=>{this.element.find(".select-row").prop("checked",e.currentTarget.checked)})}selectRowEventListener(){this.element.find(".select-row").on("change",e=>{e.currentTarget.checked?this.appendToSelected(e.currentTarget.value):this.removeFromSelected(e.currentTarget.value)})}appendToSelected(e){e=parseInt(e),FleetCart.dataTable.selected[this.selector].includes(e)||FleetCart.dataTable.selected[this.selector].push(e)}removeFromSelected(e){e=parseInt(e),FleetCart.dataTable.selected[this.selector].remove(e)}checkSelectedCheckboxes(e){let t=this.element.find(".select-row").toArray().filter(o=>e.includes(parseInt(o.value)));$(t).prop("checked",!0)}route(e,a){let t=FleetCart.dataTable.routes[this.selector][e];return typeof t=="string"&&(t={name:t,params:a}),t.params=_.merge(a,t.params),window.route(t.name,t.params)}hasRoute(e){return FleetCart.dataTable.routes[this.selector][e]!==void 0}static setRoutes(e,a){FleetCart.dataTable.routes[e]=a}static setSelectedIds(e,a){FleetCart.dataTable.selected[e]=a}static getSelectedIds(e){return FleetCart.dataTable.selected[e]}static reload(e,a,t=!1){u.ajax.reload(a,t)}static getRowIds(e){return e.toArray().reduce((a,t)=>a.concat(t.value),[])}static removeLengthFields(){$(".dt-length select").remove()}addErrorHandler(){d.ext.errMode=(e,a,t)=>{this.element.html(t)}}registerTableProcessingPlugin(){d.Api.register("processing()",function(e){return this.iterator("table",function(a){a.oApi._fnProcessingDisplay(a,e)})})}}!route().current("admin.products.create")&&!route().current("admin.products.edit")&&!route().current("admin.blog_posts.create")&&!route().current("admin.blog_posts.edit")&&(window.admin=new C);window.form=new T;window.DataTable=y;window.trans=h;window.keypressAction=p;window.notify=f;window.info=m;window.success=b;window.warning=g;window.error=w;$.ajaxSetup({headers:{Authorization:FleetCart.apiToken,"X-CSRF-TOKEN":FleetCart.csrfToken}});