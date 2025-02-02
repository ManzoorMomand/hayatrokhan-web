@extends('admin.layout.app')

@section('heading', 'Home Category')

@section('main_content')
@section('button')
<a href="{{ route('admin_d_category_create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Add</a>
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
                                                <th>Category Name</th>
                                                <th>Order</th>

                                                <th>Show On menu</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($categories as $row)
                                                <tr>
                                                <td>{{$loop->iteration}}</td>
                                           
                                                <td>{{$row->category_name}}</td>
                                                <td>{{$row->category_order}}</td>

                                                <td>{{$row->show_on_menu}}</td>
                                                <td class="pt_10 pb_10">
                                                <a href="{{ route('admin_d_Category_edit' ,$row->id)}}" class="btn btn-primary">Edit</a>
                                                <a href="{{ route('admin_d_Category_delete' ,$row->id)}}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>
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