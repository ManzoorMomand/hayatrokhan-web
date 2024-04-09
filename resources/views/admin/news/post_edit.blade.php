@extends('admin.layout.app')

@section('heading', ' News')

@section('main_content')

@section('button')
<a href="{{ route('admin_news_show_ajax')}}" class="btn btn-primary"><i class="fas fa-eye"></i> view</a>
@endsection
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<div class="section-body">
<form action="{{ route('admin_news_update_ajax',$post->id)}}" method="post" enctype="multipart/form-data">
    @csrf

                    <div class="row">

                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                         <div class="form-group mb-3">
                                            <label>Post Title</label>
                                                <input type="text" class="form-control" 
                                                name="post_title" value="{{$post->post_title }}" >
                                            </div>
                                            <div class="form-group mb-3">
                                            <label>Post Details</label>
                                            <textarea name="post_detail" class="form-control snote" cols="30" 
                                            rows="10" >{{$post->post_detail }}
                                            </textarea>
                                            </div>
                             
                                            <div class="form-group mb-3">
                                            <label>Existing Photo</label>
                                            <div>
                                                <img src="{{asset('uploads/' .$post->post_photo) }}" alt="" style="width: 100px;">
                                            </div>
                                     </div>
                                            <div class="form-group mb-3">
                                            <label>Post Photo</label>
                                        
                                               <div> <input type="file" name="post_photo">
                                                </div>
                                            </div>
                                            <div class="form-group mb-3">
                                            <label>News_category</label>
                                               <select name="news_category_id" class="form-control">
                                                @foreach($sub_categories as $item)
                                                <option value="{{$item->id}}" @if($item->id == $post->news_category_id) selected @endif>
                                                    {{$item->news_category_name}} 
                                                </option>
                                                    @endforeach
                                               </select>
                                            </div>
                                            

                                           
                       
                        
                    </div>
                    <div class="form-group">
                                            <button type="submit" class="btn btn-primary">update</button>
                                        </div>
                                    </form>
                </div>

              
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const updateButton = document.getElementById('updateButton');
        const postForm = document.getElementById('postForm');

        updateButton.addEventListener('click', function () {
            axios.post(postForm.action, new FormData(postForm))
                .then(function (response) {
                    // Handle the response (e.g., show success message)
                    alert('Data updated successfully');
                    // You can redirect the user or perform other actions here if needed.
                })
                .catch(function (error) {
                    // Handle errors (e.g., validation errors)
                    if (error.response && error.response.data.errors) {
                        const errors = error.response.data.errors;
                        // Display validation errors to the user, e.g., by highlighting fields with errors.
                    } else {
                        // Handle other types of errors
                        alert('An error occurred while updating data.');
                    }
                });
        });
    });
</script>


                @endsection