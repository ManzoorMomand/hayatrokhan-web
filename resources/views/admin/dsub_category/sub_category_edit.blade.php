@extends('admin.layout.app')

@section('heading', ' Edit')

@section('main_content')

@section('button')
<a href="{{ route('admin_d_sub_category_show')}}" class="btn btn-primary"><i class="fas fa-eye"></i> view</a>
@endsection

<div class="section-body">
<form action="{{ route('admin_d_sub_Category_update',$sub_category->id)}}" method="post" enctype="multipart/form-data">
    @csrf

                    <div class="row">

                        <div class="col-6">
                            <div class="card">
                                <div class="card-body">
                                
                                <div class="form-group mb-3">
                                            <label>Existing Photo</label>
                                            <div>
                                                <img src="{{asset('uploads/' .$sub_category->post_photo) }}" alt="" style="width: 100px;">
                                            </div>
                                     </div>
                                            <div class="form-group mb-3">
                                            <label>Post Photo</label>
                                        
                                               <div> <input type="file" name="post_photo">
                                                </div>
                                            </div>
                                         <div class="form-group mb-3">
                                            <label>Category Name</label>
                                                <input type="text" class="form-control" 
                                                name="d_sub_category_name" value="{{$sub_category->d_sub_category_name}}" >
                                            </div>
                                                                                  
                                     <div class="form-group mb-3">
                                            <label>Show on Menu</label>
                                            <select name="show_on_menu" class="form-control">
                                                <option value="Show"@if($sub_category->show_on_menu =='Show')
                                                     selected @endif>Show</option>
                                                <option value="Hide"@if($sub_category->show_on_menu =='Hide') 
                                                    selected @endif>Hide</option>
                                            </select>
                                     </div>
                                          
                                     <div class="form-group mb-3">
                                            <label>Show on Home</label>
                                            <select name="show_on_home" class="form-control">
                                                <option value="Show" @if($sub_category->show_on_home =='Show') 
                                                    selected @endif>Show</option>
                                                <option value="Hide" @if($sub_category->show_on_home =='Hide') 
                                                    selected @endif>Hide</option>
                                            </select>
                                     </div>
                                     <div class="form-group mb-3">
                                            <label>Category Order</label>
                                                <input type="text" class="form-control" 
                                                name="sub_category_order" value="{{$sub_category->sub_category_order}}" >
                                            </div>
                                      
                                            <div class="form-group mb-3">
                                            <label>Select Category </label>
                                            <select name="d_category_id" class ="form-control">
                                            @foreach($categories as $row)
                                            <option value="{{$row->id}}"@if($sub_category->d_category_id == $row->id) 
                                                selected @endif> {{$row->category_name}}

                                            </option>
                                            @endforeach
                                            </select>
                                            </div>
                                      
                                </div>
                            </div>
                        </div>

                       
                        
                    </div>
                    <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </form>
                </div>
@endsection