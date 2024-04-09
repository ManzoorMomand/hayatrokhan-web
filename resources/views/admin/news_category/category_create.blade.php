@extends('admin.layout.app')

@section('heading', ' advertisement')

@section('main_content')

@section('button')
<a href="{{ route('admin_news_category_show')}}" class="btn btn-primary"><i class="fas fa-eye"></i> view</a>
@endsection

<div class="section-body">
<form action="{{ route('admin_news_category_store')}}" method="post" enctype="multipart/form-data">
    @csrf

                    <div class="row">

                        <div class="col-6">
                            <div class="card">
                                <div class="card-body">
                                
                       
                                         <div class="form-group mb-3">
                                            <label>Category Name</label>
                                                <input type="text" class="form-control" 
                                                name="news_category_name" value=" " >
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