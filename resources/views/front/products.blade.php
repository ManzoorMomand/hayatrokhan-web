@extends('front.layout.app')

@section('main_content')
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 4px; /* Adjusted padding for smaller size */
        }

        th {
            background-color: #f2f2f2;
        }

        .subcategory-image {
            max-width: 80px; /* Smaller image size */
            max-height: 80px; /* Smaller image size */
        }

        .subcategory-name {
            font-size: 16px; /* Adjusted font size for smaller text */
            display: flex;
            align-items: center;
        }

        .syringe-icon {
            color: #0453dc;
            font-size: 20px; /* Adjusted font size for the syringe icon */
            margin-left: 4px; /* Adjusted margin for spacing */
        }
    </style>

    <div class="page-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav class="breadcrumb-container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $distributorCategory->category_name }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-10">
                    <div class="category-page">
                        <h1>{{ $distributorCategory->category_name }}</h1>

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Subcategory Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($subcategories as $subcategory)
                                        <tr>
                                            <td>
                                                <a href="{{ route('category', $subcategory->id) }}">
                                                    <img src="{{ asset('uploads/' . $subcategory->post_photo) }}" alt="Post Image" class="subcategory-image">
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{ route('category', $subcategory->id) }}" class="subcategory-name">
                                                   <strong>{{ $subcategory->sub_category_name }}</strong>
                                                    <i class="fa fa-syringe syringe-icon"></i>
                                                    <i class="fa-duotone fa-cow fa" ></i>                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="2">No subcategories found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
