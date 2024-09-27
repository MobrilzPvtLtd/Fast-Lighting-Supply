@extends('admin::layout')

@component('admin::components.page.header')
    @slot('title', trans('Bulk Product Import'))

    <li class="active">{{ trans('Bulk Product Import') }}</li>
@endcomponent

@component('admin::components.page.index_table')

<p id="message" style="display:none;color: rgb(12, 161, 12);font-size: 20px;background-color: rgb(199, 235, 199);padding: 10px;border-radius: 10px;margin-bottom: 30px;"></p>

<form class="form-inline" enctype="multipart/form-data" id="uploadFile">
    <label for="file">Upload File</label>
    <div class="form-row">
        <div class="form-group text-center">
            <input type="file" class="form-control" name="csv_file" required>
        </div>
        <div class="form-group text-center">
            <input type="hidden" name="import_type" value="product">
        </div>
        <div class="form-group">
            <div class="col-md-offset-3 col-md-10">
                <button id="submitBtn" class="btn btn-primary">
                    Upload
                </button>
            </div>
        </div>
    </div>
</form>
<p id="csvFileName" style="margin-top: 20px;"></p>
@endcomponent

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script type="module">
    $(document).ready(function() {
        $('#uploadFile').on('submit', function(e) {
            e.preventDefault();

            var formData = new FormData(this);
            $.ajax({
                url: "{{ route('bulk.products.import') }}",
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    $("#submitBtn").prop("disabled", true);
                    $("#submitBtn").text("Loading...");
                },
                success: function(response) {
                    console.log(response);
                    $('#csvFileName').html('File Name: ' + response.filename);

                    if (response.filename) {
                        $('#message').show();
                        $('#message').text(response.message);
                    }
                    $("#submitBtn").prop("disabled", false).text("Submit");
                },
                error: function(xhr) {
                    console.error('Error uploading file:', xhr.responseJSON.message);
                    $('#csvFileName').html('An error occurred: ' + xhr.responseJSON.message).css('color', 'red');

                    $("#submitBtn").prop("disabled", false).text("Submit");
                }
                // complete: function() {
                //     setTimeout(function() {
                //         $('#csvFileName').hide();
                //         $('#message').hide();
                //     }, 10000);
                // }
            });
        });
    });
</script>
@endpush
