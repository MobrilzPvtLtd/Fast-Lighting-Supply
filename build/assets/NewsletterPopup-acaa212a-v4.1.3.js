const s={data(){return{email:"",subscribed:!1,subscribing:!1,error:"",disable_popup:!1}},watch:{email(){this.error=""},disable_popup(e){e?this.disableNewsletterPopup():this.enableNewsletterPopup()}},mounted(){setTimeout(()=>{$(".newsletter-wrap").modal("show")},1e3)},methods:{enableNewsletterPopup(){axios.post(route("storefront.newsletter_popup.store"))},disableNewsletterPopup(){axios.delete(route("storefront.newsletter_popup.destroy"))},subscribe(){!this.email||this.subscribed||(this.subscribing=!0,axios.post(route("subscribers.store"),{email:this.email}).then(()=>{this.email="",this.subscribed=!0}).catch(e=>{if(e.response.status===422){this.error=e.response.data.errors.email[0];return}this.error=e.response.data.message}).finally(()=>{this.subscribing=!1}))}}};export{s as default};