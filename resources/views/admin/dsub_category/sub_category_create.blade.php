@extends('admin.layout.app')

@section('heading', ' SubCategorys')

@section('main_content')

@section('button')
<a href="{{ route('admin_d_sub_category_show')}}" class="btn btn-primary"><i class="fas fa-eye"></i> view</a>
@endsection

<div class="section-body">
<form action="{{ route('admin_d_sub_category_store')}}" method="post" enctype="multipart/form-data">

    @csrf

                    <div class="row">

                        <div class="col-6">
                            <div class="card">
                                <div class="card-body">
                                
                                <div class="form-group mb-3">
                            <label>Post Photo</label>
                            <div><input type="file" name="post_photo"></div>
                        </div>
                                         <div class="form-group mb-3">
                                            <label>Sub Category Name</label>
                                                <input type="text" class="form-control" 
                                                name="d_sub_category_name" value=" " >
                                            </div>
                                            
                                        <div class="form-group mb-3">
                                            <label>Show on Menu</label>
                                            <select name="show_on_menu" class="form-control">
                                                <option value="Show">Show</option>
                                                <option value="Hide">Hide</option>
                                            </select>
                                     </div>
                                       <div class="form-group mb-3">
                                            <label>Show on Home</label>
                                            <select name="show_on_home" class="form-control">
                                                <option value="Show">Show</option>
                                                <option value="Hide">Hide</option>
                                            </select>
                                     </div>
                                     <div class="form-group mb-3">
                                            <label>Sub Category Order</label>
                                                <input type="text" class="form-control" 
                                                name="sub_category_order" value=" " >
                                            </div>
                                      
                                            <div class="form-group mb-3">
                                            <label>Select Category </label>
                                            <select name="d_category_id" class="form-control">
                                            @foreach($sub_categories as $row)
                                            <option value="{{$row->id}}">{{$row->category_name}}

                                            </option>
                                            @endforeach
                                            </select>
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
@endsection