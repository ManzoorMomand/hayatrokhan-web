@extends('front.layout.app')

@section('main_content')
<div class="page-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2>gallery</h2>
                        <nav class="breadcrumb-container">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page"></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="page-content">
            <div class="container">
                <div class="photo-gallery">
                    <div class="row">
                        @foreach($photos as $data)
                       
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="photo-thumb">
                                <img src="{{ asset('uploads/'.$data->photo) }}" alt="">
                                <div class="bg"></div>
                                <div class="icon">
                                    <a href="" class="magnific"><i class="fas fa-plus"></i></a>
                                </div>
                            </div>
                            <div class="photo-caption">
                                <a href="">{{$data->caption}}</a>
                            </div>
                            <div class="photo-date">
                            
                                    @php
                                    $ts = strtotime($data->updated_at);
                                    $updated_date = date("Y-F-d", $ts);
                                    @endphp
                                  
                                <i class="fas fa-calendar-alt">{{ $updated_date }}</i> 
                            </div>
                        </div>
                        @endforeach
        
                        <div class="col-md-12">
                        {{ $photos->links() }}
                        </div>
        
                    </div>
                </div>
            </div>
        </div>

@endsection
