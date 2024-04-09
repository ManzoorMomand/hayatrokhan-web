<!-- ======= Chefs Section ======= -->
<link href="{{asset('assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

  <link href="{{asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('assets/css/main.css')}}" rel="stylesheet">

<!-- ======= Testimonials Section ======= -->
<!-- ======= Testimonials Section ======= -->
<!-- ======= Testimonials Section ======= -->
<section id="testimonials" class="testimonials section-bg">
    <div class="container" data-aos="fade-up">
        <div class="text-center"> <!-- Center the heading -->
            <h2>Our Team</h2>
        </div>

        <div class="slides-1 swiper" data-aos="fade-up" data-aos-delay="100">
            <div class="swiper-wrapper">

                @foreach($team as $key => $slide)
                <div class="swiper-slide">
                    <div class="testimonial-item">
                        <div class="row gy-4 justify-content-center">
                            <div class="col-lg-2 text-center">
                                <img src="{{ asset('uploads/' . $slide->post_photo) }}" class="img-fluid testimonial-img" alt="{{ $slide->testimonial_author }}">
                            </div>
                            <div class="col-lg-6">
                                <div class="testimonial-content">
                                <h3>{{ $slide->post_title }}</h3>
                                    <p>
                                        <i class="bi bi-quote quote-icon-left"></i>
                                        {!! $slide->post_detail !!}
                                        <i class="bi bi-quote quote-icon-right"></i>
                                    </p>
                                 
                                   
                                    <div class="stars">
                                        <!-- Stars can go here -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End testimonial item -->
                @endforeach

            </div>
            <div class="swiper-pagination"></div>
        </div>

    </div>
</section>


  <section id="gallery" class="gallery section-bg">
    <div class="container" data-aos="fade-up">
        <div class="section-header">
            <h2>Gallery</h2>
            <p>Check <span>Our Gallery</span></p>
        </div>

        <div class="gallery-slider swiper">
            <div class="swiper-wrapper align-items-center">
                @php $lastSixPhotos = $photos->slice(-6)->reverse(); @endphp
                @foreach($lastSixPhotos as $data)
                <div class="swiper-slide">
                    <a class="glightbox" data-gallery="images-gallery" href="{{ asset('uploads/'.$data->photo) }}">
                        <img src="{{ asset('uploads/'.$data->photo) }}" class="img-fluid" alt="">
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>


  <script src="{{asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
  <script src="{{asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>

  <script src="{{asset('assets/js/main.js')}}"></script>