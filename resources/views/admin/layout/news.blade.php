<div class="home-content">
    <div class="container">
        <div class="row">
            <!-- Main Content (about content moved to the left) -->
            <div class="col-lg-8 col-md-6">
                <div class="about-content">
                    <br>
                    <br>
                    <h3>{{ $latest_news->post_title }}</h3>
                    
                    @php
                    $imagePath = public_path('uploads/' . $latest_news->post_photo);
                    $imageSize = getimagesize($imagePath);
                    @endphp

                    <img src="{{ asset('uploads/' . $latest_news->post_photo) }}" alt="{{ $latest_news->post_title }}" width="{{ $imageSize[0] }}" height="{{ $imageSize[1] }}">
                    
                    <div class="about-description">
                        <p>
                            <span id="limited-content">
                                {!! substr(strip_tags($latest_news->post_detail), 0, 300) !!} <!-- Display the first 300 characters -->
                            </span>
                            <span id="full-content" style="display: none;">
                                {!! $latest_news->post_detail !!}
                            </span>
                            <a href="javascript:void(0);" id="read-more-link" onclick="toggleContent();">Read More</a>
                        </p>
                    </div>
                </div>
                <div class="recent-posts-gallery">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="news-heading">
                                    <h2 style="color: #007bff; position: relative;">
                                        Recent Products
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function toggleContent() {
        var limitedContent = document.getElementById('limited-content');
        var fullContent = document.getElementById('full-content');
        var readMoreLink = document.getElementById('read-more-link');
        
        if (fullContent.style.display === 'none') {
            limitedContent.style.display = 'none';
            fullContent.style.display = 'inline';
            readMoreLink.innerHTML = 'Read Less';
        } else {
            limitedContent.style.display = 'inline';
            fullContent.style.display = 'none';
            readMoreLink.innerHTML = 'Read More';
        }
    }
</script>
