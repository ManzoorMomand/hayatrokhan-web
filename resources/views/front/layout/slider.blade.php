<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>


<style>
    /* Set a fixed height for the carousel */
    #carouselExampleControls {
        height: 400px; /* Adjust the height as needed */
    }

    /* Set max-width for the images to control their size */
    #carouselExampleControls img {
        max-width: 100%;
        height: auto;
    }

    /* Center the text within the carousel caption */
    .carousel-caption {
        text-align: center;
        .carousel-image {
            height: 300px; /* Set the fixed height you want */
            object-fit: cover; /* Adjust this property as needed (cover, contain, fill, etc.) */
        }
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-md-3">
            <!-- Left image -->
            <img src="{{ asset('poultry.jpeg') }}" alt="" style="width: 300px; height: 150px;">
        </div>

        <div class="col-md-6">
            <!-- Slider container -->
            <div class="slider-container">
                <div class="slider">
                    @foreach($sliders as $key => $slide)
                    <div class="slide {{ $key === 0 ? 'active' : '' }}">
                        <img src="{{ asset('uploads/'.$slide->photo) }}" alt="{{ $slide->caption }}">
                        <div class="slide-text">
                            <h3>{{ $slide->caption }}</h3>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="pagination-dots">
                    @foreach($sliders as $key => $slide)
                    <div class="dot {{ $key === 0 ? 'active' : '' }}"></div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <!-- Right image -->
            <img src="{{ asset('preview.png') }}" alt="" style="width: 350px; height: 150px;">
        </div>
    </div>
</div>


<style>
/* Add CSS for the smaller-sized slider and pagination dots */
.slider-container {
    position: relative;
    max-width: 600px; /* Set your desired maximum width */
    margin: 0 auto;
    overflow: hidden;
}

.slider {
    display: flex;
    transition: transform 0.5s ease-in-out;
    height: 200px; /* Set your desired height */
    
}

.slide {
    flex: 0 0 100%;
    position: relative;
    max-height: 200px; /* Set your desired maximum slide height */
}

.slide img {
    width: 100%;
    height: 100%;
    max-height: 200px; /* Set your desired maximum image height */
}

.slide-text {
    position: absolute;
    bottom: 10px;
    left: 10px;
    background: rgba(0, 0, 0, 0.5);
    padding: 5px 10px;
    color: #fff;
    border-radius: 5px;
}

.pagination-dots {
    position: absolute;
    bottom: 10px;
    left: 10px;
    text-align: left;
}

.dot {
    width: 12px;
    height: 12px;
    background-color: #ccc;
    border-radius: 50%;
    display: inline-block;
    margin-right: 5px;
    cursor: pointer;
}

.dot.active {
    background-color: #333;
}
</style>

<script>
$(document).ready(function() {
    const slider = $(".slider");
    const slides = $(".slide");
    const dots = $(".dot");
    let currentIndex = 0;

    function goToSlide(index) {
        slider.css("transform", `translateX(-${index * 100}%)`);
        currentIndex = index;
        updateDots();
    }

    function updateDots() {
        dots.removeClass("active");
        dots.eq(currentIndex).addClass("active");
    }

    function autoChangeSlide() {
        setInterval(function() {
            let nextIndex = currentIndex + 1;
            if (nextIndex >= slides.length) {
                nextIndex = 0;
            }
            goToSlide(nextIndex);
        }, 2000); // Change slide every 2 seconds
    }

    autoChangeSlide(); // Start automatic slide change

    // Initialize dots
    updateDots();
});
</script>


