import{n as i}from"./main-6df0f167-v4.1.3.js";import"./axios-4d564c32-v4.1.3.js";import"./jquery-nice-select-87330d3b-v4.1.3.js";import"./slick-animation-74f0897d-v4.1.3.js";import"./vue-54e7c309-v4.1.3.js";import"./vue-toast-notification-c20261c2-v4.1.3.js";import"./blueimp-md5-133dffcb-v4.1.3.js";import"./v-click-outside-cf236486-v4.1.3.js";import"./lodash-c051e7b9-v4.1.3.js";import"./dateformat-e6697b77-v4.1.3.js";import"./nouislider-11f82a7e-v4.1.3.js";import"./drift-zoom-5d80d4dd-v4.1.3.js";import"./glightbox-bc387313-v4.1.3.js";const n={props:{totalPage:Number,currentPage:Number,rangeMax:{type:Number,default:3}},mounted(){this.currentPage>this.totalPage&&this.$emit("page-changed",this.totalPage)},computed:{rangeFirstPage(){return this.currentPage===1?1:this.currentPage===this.totalPage?this.totalPage-this.rangeMax<0?1:this.totalPage-this.rangeMax+1:this.currentPage-1},rangeLastPage(){return Math.min(this.rangeFirstPage+this.rangeMax-1,this.totalPage)},range(){let e=[];for(let t=this.rangeFirstPage;t<=this.rangeLastPage;t+=1)e.push(t);return e},hasFirst(){return this.currentPage===1},hasLast(){return this.currentPage===this.totalPage}},methods:{prev(){this.$emit("page-changed",this.currentPage-1)},next(){this.$emit("page-changed",this.currentPage+1)},goto(e){this.currentPage!==e&&this.$emit("page-changed",e)},hasActive(e){return e===this.currentPage}}};var r=function(){var t=this,a=t._self._c;return a("ul",{staticClass:"pagination"},[a("li",{staticClass:"page-item",class:{disabled:t.hasFirst}},[a("button",{staticClass:"page-link",attrs:{disabled:t.hasFirst},on:{click:t.prev}},[a("i",{staticClass:"las la-angle-left"})])]),a("li",{directives:[{name:"show",rawName:"v-show",value:t.rangeFirstPage!==1,expression:"rangeFirstPage !== 1"}],staticClass:"page-item"},[a("button",{staticClass:"page-link",on:{click:function(s){return t.goto(1)}}},[t._v("1")])]),a("li",{directives:[{name:"show",rawName:"v-show",value:t.rangeFirstPage===3,expression:"rangeFirstPage === 3"}],staticClass:"page-item"},[a("button",{staticClass:"page-link",on:{click:function(s){return t.goto(2)}}},[t._v("2")])]),a("li",{directives:[{name:"show",rawName:"v-show",value:t.rangeFirstPage!==1&&t.rangeFirstPage!==2&&t.rangeFirstPage!==3,expression:`
            rangeFirstPage !== 1 &&
            rangeFirstPage !== 2 &&
            rangeFirstPage !== 3
        `}],staticClass:"page-item disabled"},[a("span",{staticClass:"page-link"},[t._v("...")])]),t._l(t.range,function(s){return a("li",{key:s,staticClass:"page-item",class:{active:t.hasActive(s)}},[a("button",{staticClass:"page-link",on:{click:function(o){return t.goto(s)}}},[t._v(" "+t._s(s)+" ")])])}),a("li",{directives:[{name:"show",rawName:"v-show",value:t.rangeLastPage!==t.totalPage&&t.rangeLastPage!==t.totalPage-1&&t.rangeLastPage!==t.totalPage-2,expression:`
            rangeLastPage !== totalPage &&
            rangeLastPage !== totalPage - 1 &&
            rangeLastPage !== totalPage - 2
        `}],staticClass:"page-item disabled"},[a("span",{staticClass:"page-link"},[t._v("...")])]),a("li",{directives:[{name:"show",rawName:"v-show",value:t.rangeLastPage===t.totalPage-2,expression:"rangeLastPage === totalPage - 2"}],staticClass:"page-item"},[a("button",{staticClass:"page-link",on:{click:function(s){return t.goto(t.totalPage-1)}}},[t._v(" "+t._s(t.totalPage-1)+" ")])]),t.rangeLastPage!==t.totalPage?a("li",{staticClass:"page-item"},[a("button",{staticClass:"page-link",on:{click:function(s){return t.goto(t.totalPage)}}},[t._v(" "+t._s(t.totalPage)+" ")])]):t._e(),a("li",{staticClass:"page-item",class:{disabled:t.hasLast}},[a("button",{staticClass:"page-link",class:{disabled:t.hasLast},on:{click:t.next}},[a("i",{staticClass:"las la-angle-right"})])])],2)},g=[],l=i(n,r,g,!1,null,null,null,null);const b=l.exports;export{b as default};