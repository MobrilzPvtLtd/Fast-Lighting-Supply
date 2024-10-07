<div class="box">
    <div class="box-body clearfix">
        <div class="form-group">
            <label for="title" class="control-label text-left">
                {{ trans('blog::attributes.posts.title') }}

                <span class="text-red">*</span>
            </label>

            <input type="text" name="title" id="title" class="form-control" x-model="form.title" autofocus>

            <template x-if="errors.has('title')">
                <span class="help-block text-red" x-text="errors.get('title')"></span>
            </template>
        </div>

        <div class="form-group">
            <label for="icon" class="control-label text-left">
                {{ trans('Icon') }}
                <span class="text-red">*</span>
            </label>

            <input type="file" name="icon" id="icon" class="form-control" x-model="form.icon" autofocus>

            <template x-if="errors.has('icon')">
                <span class="help-block text-red" x-text="errors.get('icon')"></span>
            </template>
        </div>

        <div class="form-group">
            <label for="description" class="control-label text-left" @click="focusDescriptionField">
                {{ trans('blog::attributes.posts.description') }}

                <span class="text-red">*</span>
            </label>

            <textarea name="description" id="description" class="form-control wysiwyg" rows="4">
            </textarea>

            <template x-if="errors.has('description')">
                <span class="help-block text-red" x-text="errors.get('description')"></span>
            </template>
        </div>

        <div class="form-group">
            <label for="is_active" class="control-label text-left">
                {{ trans('Status') }}
            </label>
            <select name="is_active" id="is_active" class="form-control wysiwyg">
                <option value="1">Active</option>
                <option value="0">InActive</option>
            </select>

        </div>
        <button type="submit" class="btn btn-primary">
            {{ trans('admin::admin.buttons.save') }}
        </button>
    </div>
</div>
