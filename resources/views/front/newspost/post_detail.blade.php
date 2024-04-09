@extends('front.layout.app')

@section('main_content')
<div class="page-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{$post_detail->post_title}}</h2>
                <nav class="breadcrumb-container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('news_detail',$post_detail->news_category_id)}}">{{$post_detail->newsCategory->news_category_name}}</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="container">
        <div class="row">
          
            <!-- Main Content (about content moved to the left) -->
            <div class="col-lg-8 col-md-6">
                <div class="featured-photo">
                    <img src="{{asset('uploads/'.$post_detail->post_photo)}}" alt="">
                </div>
                <div class="sub">
                    <div class="item">
                        <b><i class="fas fa-user"></i></b>
                        @if ($user_data->author_id == 0)
                            @php
                            $userData = \App\Models\Admin::where('id', $user_data->admin_id)->first();
                            @endphp
                        @else
                            @php
                            $userData = \App\Models\Author::where('id', $user_data->author_id)->first();
                            @endphp
                        @endif

                        @if ($userData)
                            <a href="">{{$userData->name}}</a>
                        @else
                            User
                        @endif
                    </div>
                    <div class="thumbnail">
                        <b><i class="fas fa-edit"></i></b>
                        <a href="{{ route('category',$post_detail->news_category_id)}}">{{ $post_detail->newsCategory->news_category_name}}</a>
                    </div>
                    <div class="item">
                        <b><i class="fas fa-clock"></i></b>
                        @php
                        $ts = strtotime($post_detail->updated_at);
                        $updated_date = date('d F, Y',$ts);
                        @endphp
                        {{$updated_date}}
                    </div>
                  
                </div>
                <div class="main-text">
                    {!! $post_detail->post_detail !!}
                </div>
            </div>
              <!-- Sidebar (moved to the right) -->
              <div class="col-lg-4 col-md-6 sidebar-col">
                @include('front.layout.sidebar')
            </div>

        </div>
        
    </div>
</div>
@endsection
