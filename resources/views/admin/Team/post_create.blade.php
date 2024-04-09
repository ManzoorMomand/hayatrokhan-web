@extends('admin.layout.app')

@section('heading', 'Admin Team')

@section('main_content')

@section('button')
<a href="{{ route('admin_team_show_ajax') }}" class="btn btn-primary"><i class="fas fa-eye"></i> View</a>
@endsection

<div class="section-body">
    <form action="{{ route('admin_team_store_ajax') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label>Post Title</label>
                            <input type="text" class="form-control" name="post_title" value="">
                        </div>
                        
                        <div class="form-group mb-3">
                            <label>Post Details</label>
                            <div id="post-container" class="form-group mb-3">
                                <textarea name="post_detail" class="form-control snote" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        
                        <div class="form-group mb-3">
                            <label>Post Photo</label>
                            <div><input type="file" name="post_photo"></div>
                        </div>

                       
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>

<script src="https://cdn.tiny.cloud/1/YOUR_API_KEY/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: 'textarea.snote',
        plugins: 'image',
        toolbar: 'image',
        images_upload_url: '/uploads', // Your image upload route
        images_upload_handler: function (blobInfo, success, failure) {
            // Your image upload logic here
            var formData = new FormData();
            formData.append('file', blobInfo.blob(), blobInfo.filename());

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                url: '/your-image-upload-route',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    // Handle success
                    success(response.location); // Assuming 'location' is the image URL returned by your server
                },
                error: function (err) {
                    // Handle error
                    failure('Image upload failed: ' + err.statusText);
                }
            });
        }
    });
</script>
@endsection
