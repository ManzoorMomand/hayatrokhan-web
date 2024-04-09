<style>
    /* Styles for the about section */
    .about-section {
        background-color: #f8f8f8;
        padding: 20px;
        border: 1px solid #ddd;
        padding-right: 20px;
    }

    /* Styles for the about section title */
    .about-title {
        font-size: 24px;
        color: #333;
        margin-top: 0;
    }

    /* Styles for the about section description */
    .about-description {
        font-size: 16px;
        color: #666;
        line-height: 1.6; /* Adjust line height for better readability */
        overflow: hidden; /* Hide overflowing content */
        max-height: 400px; /* Limit the height to show 10 lines (adjust as needed) */
        text-align: justify; /* Justify text for better alignment */
        padding-right: 10px;
    }

    /* Center the title */
    .about-content {
        text-align: center;
    }

    /* Style for the "Read More" button */
    .read-more-button {
        display: block;
        text-align: center;
        margin-top: 10px;
        cursor: pointer;
        color: #007bff;
        text-decoration: none; /* Remove default link underline */
    }
</style>
<div class="home-content">
    <div class="container">
        <div class="row">
            <!-- Main Content (about content moved to the left) -->
            <div class="col-lg-8 col-md-6">
                <div class="about-content">
                    <br>
                    <br>
                    <h3 class="about-title">{{ $latest_news->post_title }}</h3>
                    @if ($latest_news)
                        @php
                            $imagePath = public_path('uploads/' . $latest_news->post_photo);
                            $imageSize = getimagesize($imagePath);
                        @endphp

                        <img src="{{ asset('uploads/' . $latest_news->post_photo) }}" alt="{{ $latest_news->post_title }}" width="{{ $imageSize[0] }}" height="{{ $imageSize[1] }}">
                        
                        <div class="about-description">
                            <p>{!! nl2br($latest_news->post_detail) !!}</p>
                        </div>
                        <a href="{{ route('new_detail', $latest_news->id) }}" class="read-more-button">Read More</a>
                    @else
                        <p>No latest news available.</p>
                    @endif
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
