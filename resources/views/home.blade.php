@extends('front.layout.app')
@section('main_content')
<br>
@include('front.layout.slider')

<!-- Bootstrap Bundle with Popper.js -->

   
<hr>

<div class="recent-posts-gallery">
 <div class="container">
     <div class="row">
         <div class="col-md-12">
             <div class="news-heading">
                 <h2 style="color: #007bff; position: relative;"> News</h2>
             </div>
         </div>
     </div>

     <section class="section">
  <div class="row">
    <div class="col-lg-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">HAYAT ROKHAN Ltd</h5>

          <!-- Default Accordion -->
          <div class="accordion" id="accordionExample">
            <div class="accordion-item">
            
              <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <strong>HAYAT ROKHAN Ltd.</strong> 
Hayat Rokhan Ltd is a dynamic and highly-respected leader in the field of veterinary services and animal health solutions. 
Our unwavering commitment to delivering top-quality care, innovative products, and cutting-edge technology has firmly established us as a trusted and prominent name in the industry. This comprehensive profile provides insight into Hayat Rokhan Ltd and our dedication to promoting animal welfare and excellence in healthcare. At Hayat Rokhan Ltd, our 
mission is to serve as a trusted importer of premier brand products from the world's leading companies
                </div>
                <a href="#" class="btn btn-primary disabled" role="button">
  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
  Loading...
</a>
              </div>
            </div>
 

          </div><!-- End Default Accordion Example -->
        </div>
      </div>
    </div>



  </div>
</section>




     <!-- Add a horizontal line after the first row -->
     <hr>
 </div>
</div>
<div class="home-content">
    <div class="container">
        <div class="row">
            <!-- Main Content (about content moved to the left) -->
            <div class="col-lg-8 col-md-8">
                @if (count($latest_news) > 0)
                <div class="row">
                    @foreach($latest_news as $news)
                    <div class="col-md-4">
                        <div class="card news-card">
                            <a href="{{ route('new_detail', $news->id) }}">
                                @if ($news->post_photo)
                                    @php
                                        $imagePath = public_path('uploads/' . $news->post_photo);
                                        $imageSize = getimagesize($imagePath);
                                    @endphp
                                    <img class="card-img-top" src="{{ asset('uploads/' . $news->post_photo) }}" alt="{{ $news->post_title }}" style="height: 200px; width: 100%;">
                                    <div class="card-body">
                                        <h5 class="card-title text-truncate" style="max-height: 3rem;">{{ $news->post_title }}</h5>
                                        <a href="{{ route('new_detail', $news->id) }}" class="btn btn-primary">Read More</a>
                                    </div>
                                @else
                                    <div class="card-body">
                                        <h5 class="card-title text-truncate" style="max-height: 3rem;">{{ $news->post_title }}</h5>
                                        <a href="{{ route('new_detail', $news->id) }}" class="btn btn-primary">Read More</a>
                                    </div>
                                @endif
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <p>No latest news available.</p>
                @endif
                <style>
                .news-card {
                    border: 1px solid #ccc;
                    margin: 10px;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
                    transition: box-shadow 0.3s;
                    max-width: 200%;
                }

                .news-card:hover {
                    box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
                }

                .card-title {
                    font-size: 1.2rem;
                    font-weight: bold;
                    white-space: nowrap;
                    overflow: hidden;
                    text-overflow: ellipsis;
                }

                .btn {
                    background-color: #007BFF;
                    color: #fff;
                }

                .btn:hover {
                    background-color: #0056b3;
                }
                </style>
             <hr>
             
                <div class="recent-posts-gallery">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="news-heading">
                    <h2 style="color: #007bff; position: relative;">Recent Products</h2>
                </div>
            </div>
        </div>
        <!-- Add a horizontal line after the first row -->
        <hr>
    </div>
</div>

<div class="col-lg-12 col-md-12">
    @if (count($global_recent_news_data) > 0)
    <div class="row">
        @foreach($global_recent_news_data as $item)
            @if ($loop->iteration <= 3) <!-- Display the first 3 items -->
                <div class="col-md-4">
                    <div class="card news-card">
                        <a href="{{ route('post_detail', $item->id) }}">
                            @if ($item->post_photo)
                                @php
                                    $imagePath = public_path('uploads/' . $item->post_photo);
                                    $imageSize = getimagesize($imagePath);
                                @endphp
                                <img class="card-img-top" src="{{ asset('uploads/' . $item->post_photo) }}" alt="{{ $item->post_title }}" style="height: 200px; width: 100%;">
                                <div class="card-body">
                                    <h5 class="card-title text-truncate" style="max-height: 3rem;">{{ $item->post_title }}</h5>
                                    <a href="{{ route('post_detail', $item->id) }}" class="btn btn-primary">Read More</a>
                                </div>
                            @else
                                <div class="card-body">
                                    <h5 class="card-title text-truncate" style="max-height: 3rem;">{{ $item->post_title }}</h5>
                                    <a href="{{ route('post_detail', $item->id) }}" class="btn btn-primary">Read More</a>
                                </div>
                            @endif
                        </a>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
    @else
    <p>No recent products available.</p>
    @endif
</div>

<style>
.news-card {
    border: 1px solid #ccc;
    margin: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    transition: box-shadow 0.3s;
    max-width: 200%;
}

.news-card:hover {
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
}

.card-title {
    font-size: 1.2rem;
    font-weight: bold;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.btn {
    background-color: #007BFF;
    color: #fff;
}

.btn:hover {
    background-color: #0056b3;
}
</style>

<style>
    .photo-thumb {
        position: relative;
        overflow: hidden;
    }

    .photo-thumb img {
        width: 100%;
        height: auto;
        transition: transform 0.3s;
    }

    .image-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.7);
        color: #fff;
        text-align: center;
        opacity: 0;
        transition: opacity 0.3s;
    }

    .photo-thumb:hover .image-overlay {
        opacity: 1;
    }

    .image-title {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 16px;
        font-weight: bold;
    }

    .photo-thumb .image-overlay a {
        display: block;
        width: 100%;
        height: 100%;
        position: absolute;
    }
</style>

<div class="page-content">
    <div class="container">
        <div class="photo-gallery">
            <a class="dropdown-item" href="{{ route('photo') }}">
                <h2 style="color: #007bff; position: relative;">
                    View More Products
                    <span style="position: absolute; bottom: -5px; left: 0; width: 100%; height: 2px; background-color: blue;"></span>
                </h2>
            </a>
            <div class="row">
                @php $recentNews = $global_recent_news_data->take(3); @endphp
                @foreach($recentNews as $item)
                    <div class="col-lg-4 col-md-4 col-sm-6 mb-4">
                        <div class="photo-thumb">
                            <a href="{{ route('post_detail', $item->id) }}" class="image-link">
                                <img src="{{ asset('uploads/'.$item->post_photo) }}" alt="{{ $item->post_title }}" width="200" height="200">
                                <div class="image-overlay">
                                    <a href="{{ route('post_detail', $item->id) }}">
                                        <div class="image-title">{{ $item->post_title }}</div>
                                    </a>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    var imageLinks = document.querySelectorAll(".image-link");
                    imageLinks.forEach(function(link) {
                        link.addEventListener("click", function(event) {
                            event.preventDefault();
                            // Your logic for handling the click event
                        });
                    });
                });
            </script>
        </div>
    </div>
</div>




            </div>
            <div class="col-lg-4 col-md-6 sidebar-col">
                <br>
                @include('front.layout.sidebar')
            </div>
        </div>
    </div>
</div>
@include('front.layout.gallery')

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var categoryDropdown = document.getElementById("category");
        categoryDropdown.addEventListener("change", function() {
            var categoryId = this.value;
            if (categoryId) {
                // Your AJAX request logic here
            }
        });
    });
</script>
@endsection
