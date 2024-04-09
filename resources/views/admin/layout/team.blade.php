<!-- ======= Chefs Section ======= -->
<link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

<section id="chefs" class="chefs section-bg">
  <div class="container" data-aos="fade-up">

    <div class="section-header">
      <h2>Chefs</h2>
      <p>Our <span>Professional</span> Chefs</p>
    </div>

    <div class="row gy-4">
      <!-- Loop through team members here -->
      @php $lastSixPhotos = $photos->slice(-6)->reverse(); @endphp
      @foreach($lastSixPhotos as $data)
      <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
        <div class="chef-member">
          <div class="member-img">
            <img src="{{ asset('uploads/'.$data->photo) }}" class="img-fluid" alt="Team Member Image">
            <!-- Social links for team member can be added here -->
          </div>
          <div class="member-info">
            <h4>{{ $data->caption }}</h4>
            <span>Position</span>
            <!-- Short details about team member can be added here -->
          </div>
        </div>
      </div>
      @endforeach
      <!-- End Loop -->

    </div>

  </div>
</section><!-- End Chefs Section -->
