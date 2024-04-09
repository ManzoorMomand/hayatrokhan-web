@extends('front.layout.app')

@section('main_content')

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    table {
      border-collapse: collapse;
      width: 100%;
    }

    th, td {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }

    th {
      background-color: #f2f2f2;
    }

    .icon {
      width: 20px;
      height: 20px;
    }

    .limited-width {
      max-width: 200px;
    }
  </style>

  <div class="page-top">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2>{{ $sub_category_data->sub_category_name }}</h2>
          <nav class="breadcrumb-container">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{ $sub_category_data->sub_category_name }}</li>
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
            <a href="{{ route('download_subcategory_pdf', ['id' => $sub_category_data->id]) }}" class="btn btn-primary">Download PDF</a>
            <table>
              <thead>
                <tr>
                  <th>PRODUCT IMAGE</th>
                  <th>PRODUCT</th>
                  <th>THERAPEUTIC GROUP</th>
                  <th>PRESENTATION</th>
                  <th>TARGET SPECIES</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($post_data as $item)
                  <tr>
                    <td>
                      <img src="{{ asset('uploads/' . $item->post_photo) }}" alt="Post Image" style="width: 180px; height: 100px;">
                    </td>
                    <td class="limited-width">
                      <a href="{{ route('post_detail', $item->id) }}">{{ $item->post_title }}</a>
                    </td>
                    <td>
                      <span class="badge bg-info">{{ $sub_category_data->sub_category_name }}</span>
                    </td>
                    <td>
                      <p>{!! nl2br($item->post_detail) !!}</p>
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
      </div>
    </div>
  </div>

@endsection
