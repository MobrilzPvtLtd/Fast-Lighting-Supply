const e={data(){return{show:!1}},mounted(){setTimeout(()=>{this.show=!0})},methods:{accept(){this.show=!1,axios.delete(route("storefront.cookie_bar.destroy"))}}};export{e as default};
