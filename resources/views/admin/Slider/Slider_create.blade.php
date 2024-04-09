@extends('admin.layout.app')

@section('heading', ' slider')

@section('main_content')

@section('button')
<a href="{{ route('admin_slider_show')}}" class="btn btn-primary"><i class="fas fa-eye"></i> view</a>
@endsection

<div class="section-body">
<form action="{{ route('admin_slider_store')}}" method="post" enctype="multipart/form-data">
    @csrf

                    <div class="row">

                        <div class="col-6">
                            <div class="card">
                                <div class="card-body">
                                
                       
                                         <div class="form-group mb-3">
                                            <label>Slider</label>
                                               <div> <input type="file" 
                                                name="photo"  >
                                                </div>
                                            </div>
                                            
                                      
                                     <div class="form-group mb-3">
                                            <label>Caption</label>
                                                <input type="text" class="form-control" 
                                                name="caption" value=" " >
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