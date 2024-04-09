@extends('admin.layout.app')

@section('heading', 'Home Category')

@section('main_content')
@section('button')
<a href="{{ route('admin_d_sub_category_create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Add</a>
@endsection
<div class="section-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="example1">
                                            <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Photo For Menu</th>
                                                <th>Sub Category Name</th>
                                                <th>Category_Name</th>
                                                <th>Category Order</th>
                                                <th>show_on_menu</th>
                                                <th>show_on_home</th>

                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($sub_categories as $row)
                                                <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>
                                        <img src="{{asset('uploads/'.$row->post_photo)}}" alt=""
                                            style="width: 50px; height: auto;">
                                    </td>
                                           
                                                <td>{{$row->d_sub_category_name}}</td>
                                                <td> 
                                                {{ optional($row->rCategory)->category_name }}
                                                                                            </td>
                                                <td>{{$row->sub_category_order}}</td>

                                                <td>{{$row->show_on_menu}}</td>
                                                <td>{{$row->show_on_home}}</td>
                                                <td class="pt_10 pb_10">
                                                <a href="{{ route('admin_d_sub_Category_edit' ,$row->id)}}" class="btn btn-primary">Edit</a>
                                                <a href="{{ route('admin_d_sub_Category_delete' ,$row->id)}}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>
                                                </td>
                                                
                                            </tr>
                                                @endforeach
                                            
                                           
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
@endsection