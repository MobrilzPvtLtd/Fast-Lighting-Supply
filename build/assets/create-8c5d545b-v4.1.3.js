import{V as i}from"./vue-54e7c309-v4.1.3.js";import{V as e}from"./VariationMixin-4d7c3d27-v4.1.3.js";import{t as s}from"./Toaster-0e61aeab-v4.1.3.js";import"./vuedraggable-1a30bdc7-v4.1.3.js";import"./blueimp-md5-133dffcb-v4.1.3.js";import"./sortablejs-7fdbdc04-v4.1.3.js";import"./Errors-2af62d8a-v4.1.3.js";import"./@melloware-f365a888-v4.1.3.js";import"./vue-toast-notification-c20261c2-v4.1.3.js";new i({el:"#app",mixins:[e],created(){this.setFormDefaultData()},mounted(){this.focusInitialField()},methods:{setFormDefaultData(){this.form={uid:this.uid(),type:"",values:[{uid:this.uid(),image:{id:null,path:null}}]}},focusInitialField(){this.$nextTick(()=>{$("#name").trigger("focus")})},submit(){this.formSubmitting=!0,$.ajax({type:"POST",url:route("admin.variations.store"),data:this.transformData(this.form),dataType:"json",success:t=>{s(t.message,{type:"success"}),this.resetForm(),this.errors.reset()}}).catch(t=>{s(t.responseJSON.message,{type:"default"}),this.errors.reset(),this.errors.record(t.responseJSON.errors),this.focusFirstErrorField(this.$refs.form.elements)}).always(()=>{this.formSubmitting=!1})}}});