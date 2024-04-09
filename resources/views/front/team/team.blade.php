@extends('front.layout.app')

@section('main_content')
    <div class="container" data-aos="fade-up">
        <div class="text-center">
            <hr>
            <h2>Our Team</h2>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($team as $member)
                        <tr>
                        <td width="100" height="100">
    <img src="{{ asset('uploads/' . $member->post_photo) }}" alt="{{ $member->testimonial_author }}" width="100">
</td>

                            <td>{{ $member->post_title }}</td>
                            <td>{!! $member->post_detail !!}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

    <script>
        // Your existing script for Swiper and Lightbox goes here
        $(document).ready(function () {
            var swiper1 = new Swiper('.slides-1', {
                slidesPerView: 1,
                spaceBetween: 30,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
            });

            var lightbox = GLightbox({
                selector: '.glightbox',
            });
        });
    </script>
@endsection
