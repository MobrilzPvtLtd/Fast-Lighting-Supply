import{V as i}from"./vue-54e7c309-v4.1.3.js";import{V as e}from"./VariationMixin-4d7c3d27-v4.1.3.js";import{t as r}from"./Toaster-0e61aeab-v4.1.3.js";import"./vuedraggable-1a30bdc7-v4.1.3.js";import"./blueimp-md5-133dffcb-v4.1.3.js";import"./sortablejs-7fdbdc04-v4.1.3.js";import"./Errors-2af62d8a-v4.1.3.js";import"./@melloware-f365a888-v4.1.3.js";import"./vue-toast-notification-c20261c2-v4.1.3.js";new i({el:"#app",mixins:[e],created(){this.form=this.prepareFormData(FleetCart.data.variation)},mounted(){this.initColorPicker()},methods:{prepareFormData(t){return t.uid=this.uid(),t.values.forEach(s=>{s.uid=this.uid()}),t},submit(){this.formSubmitting=!0,$.ajax({type:"PUT",url:route("admin.variations.update",this.form.id),data:this.transformData(this.form),dataType:"json",success:t=>{r(t.message,{type:"success"}),this.errors.reset()}}).catch(t=>{r(t.responseJSON.message,{type:"default"}),this.errors.reset(),this.errors.record(t.responseJSON.errors),this.focusFirstErrorField(this.$refs.form.elements)}).always(()=>{this.formSubmitting=!1})}}});