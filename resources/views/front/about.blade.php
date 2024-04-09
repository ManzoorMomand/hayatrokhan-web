@extends('front.layout.app')

@section('main_content')

<div class="page-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center mb-4">About Us</h2>
                <nav class="breadcrumb-container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $page_data->about_title }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="container">
        <div class="row">
            <!-- Main Content (About text and description moved to the left) -->
            <div class="col-lg-8 col-md-12">
                <div class="about-text">
                    <h3 class="mb-3">HAYAT ROKHAN Ltd</h3>
                    {!! $page_data->about_detail !!}
                </div>
            </div>

            <!-- Sidebar (moved to the right) -->
            <div class="col-lg-4 col-md-12 mt-4 mt-lg-0">
                @include('front.layout.sidebar')
            </div>
        </div>
    </div>
</div>

@endsection
