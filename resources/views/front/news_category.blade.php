@extends('front.layout.app')

@section('main_content')
<div class="page-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ $selectedCategory->news_category_name }}</h2>
                <nav class="breadcrumb-container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $selectedCategory->news_category_name }}</li>
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
            <div class="category-page">
                <a href="{{ route('download_subcategory_pdf') }}" class="btn btn-primary">Download PDF</a>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Author</th>
                            <th>Icons</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($post_data as $item)
                            <tr>
                                <td>
                                    <img src="{{ asset('uploads/' . $item->post_photo) }}" alt="Post Image"
                                        style="width: 180px; height: 100px;">
                                </td>
                                <td>
                                    <a href="{{ route('post_detail', $item->id) }}">{{ $item->post_title }}</a>
                                </td>
                                <td>
                                    <span class="badge bg-success">{{ $sub_category_data->sub_category_name }}</span>
                                </td>
                                <td>
                                    @if ($item->author_id == 0)
                                        @php
                                            $user_data = \App\Models\Admin::where('id', $item->admin_id)->first();
                                        @endphp
                                        @if ($user_data)
                                            <a href="">{{ $user_data->name }}</a>
                                        @endif
                                    @endif
                                </td>
                                <td>
                                    @foreach ($item->icons as $icon)
                                        <img src="{{ $icon }}" alt="Icon" class="icon">
                                    @endforeach
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
            <div class="col-lg-4 col-md-6 sidebar-col">
                @include('front.layout.sidebar')
            </div>
        </div>
    </div>
</div>
@endsection


