@extends('admin.layout.app')

@section('heading', ' advertisement')

@section('main_content')

@section('button')
<a href="{{ route('admin_d_category_show')}}" class="btn btn-primary"><i class="fas fa-eye"></i> view</a>
@endsection

<div class="section-body">
<form action="{{ route('admin_d_Category_update',$category->id)}}" method="post" enctype="multipart/form-data">
    @csrf

                    <div class="row">

                        <div class="col-6">
                            <div class="card">
                                <div class="card-body">
                                
                       
                                         <div class="form-group mb-3">
                                            <label>Category Name</label>
                                                <input type="text" class="form-control" 
                                                name="category_name" value="{{$category->category_name}}" >
                                            </div>
                                            
                                        <div class="form-group mb-3">
                                            <label>Show on Menu</label>
                                            <select name="show_on_menu" class="form-control">
                                                <option value="Show"@if($category->show_on_menu =='Show') 
                                                    selected @endif>Show</option>
                                                <option value="Hide"@if($category->show_on_menu =='Hide') 
                                                    selected @endif>Hide</option>
                                            </select>
                                     </div>
                                     <div class="form-group mb-3">
                                            <label>Category Order</label>
                                                <input type="text" class="form-control" 
                                                name="category_order" value="{{$category->category_order}}" >
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