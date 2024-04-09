@extends('front.layout.app')

@section('main_content')
<div class="page-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="breadcrumb-container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="container">
        <div class="row">
           
            <div class="col-lg-8 col-md-6">
                <div class="row">
                    @foreach ($allNews as $news)
                    <!-- Main Content (about content moved to the left) -->
                    <div class="col-md-4 mb-4">
                        <div class="featured-post">
                            <a href="{{ route('new_detail', $news->id) }}"> <!-- Added anchor tag here -->
                                <div class="featured-photo">
                                    <img src="{{ asset('uploads/' . $news->post_photo) }}" alt="{{ $news->post_title }}">
                                </div>
                                <div class="post-details">
                                    <h3><a href="{{ route('new_detail', $news->id) }}">{{ $news->post_title }}</a></h3> <!-- Added anchor tag here -->
                                    <div class="author">
                                        <b><i class="fas fa-user"></i></b>
                                        @php
                                        if ($news->author_id == 0) {
                                            $userData = \App\Models\Admin::where('id', $news->admin_id)->first();
                                        } else {
                                            $userData = \App\Models\Author::where('id', $news->author_id)->first();
                                        }
                                        @endphp

                                        @if ($userData)
                                            <a href="">{{ $userData->name }}</a>
                                        @else
                                            User
                                        @endif
                                    </div>
                                    <div class="category">
                                        <b><i class="fas fa-edit"></i></b>
                                        <a href="{{ route('category', $news->news_category_id) }}">{{ $news->newsCategory->news_category_name }}</a>
                                    </div>
                                    <div class="date">
                                        <b><i class="fas fa-clock"></i></b>
                                        @php
                                        $ts = strtotime($news->updated_at);
                                        $updated_date = date('d F, Y', $ts);
                                        @endphp
                                        {{ $updated_date }}
                                    </div>
                                   
                                </div>
                                
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-4 col-md-6 sidebar-col">
                @include('front.layout.sidebar')
            </div>
        </div>
    </div>
</div>
@endsection
