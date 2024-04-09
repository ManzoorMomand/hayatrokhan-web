<style>
    .footer-menu {
        padding: 20px 0;
        color: #fff;
    }

    .footer-menu a {
        color: #fff;
        text-decoration: none;
        margin-right: 20px;
        font-size: 16px;
        transition: color 0.3s;
    }

    .footer-menu a:hover {
        color: #ffcc00;
    }

    .footer-menu nav {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .footer-menu nav a:last-child {
        margin-right: 0;
    }

    /* Style the white icons */
    .white-icon {
        color: white;
        font-size: 18px;
    }

    /* Add white border to social media icons */
    .social-media-icons .icon-link {
        display: inline-block;
        border: 2px solid white;
        border-radius: 50%;
        padding: 5px;
        margin-right: 10px;
        transition: border-color 0.3s, color 0.3s;
        font-size: 18px;
    }

    /* Change border color and icon color on hover */
    .social-media-icons .icon-link:hover {
        border-color: white;
        color: white;
    }

    /* Footer Styles */
    .footer {
        background-color: #007bff;
        color: white;
        padding: 20px 0;
        text-align: center;
    }
</style>

<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="list-item">
                    <h2 class="heading">Purchase Officer:</h2>
                    <div class="right">
                        <strong>Purchase Officer:  <i class="fas fa-shopping-cart fa-lg"></i> </strong> </br>
                     <i class="fas fa-user fa-lg"></i> : Mr .BATOOR TABAN

                        <!--Contact Person: BATOOR TABAN-->
                    <p><i class="fas fa-envelope fa-lg"></i> Email: <a href="mailto:info@hayatrokhan.com" style="font-size: 14px;">info@hayatrokhan.com</a></p>
                                         <a href="https://wa.me/93773536366" target="_blank"><i class="fab fa-whatsapp fa-2x"></i> +93 (0) 773 536 366</a>



                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="item">
                    <h2 class="heading">Sales Officer</h2>
           <strong>Sales Officer::  <i class="fas fa-shopping-cart fa-lg"></i> </strong> </br>
                                         <i class="fas fa-user fa-lg"></i> : Mr.MANZOOR MOMAND
 <p><i class="fas fa-envelope fa-lg"></i> Email:<a href="mailto:hayatrokhan@gmail.com" style="font-size: 13px;">hayatrokhan@gmail.com</a></p>
                     <a href="https://wa.me/93728886888" target="_blank"><i class="fab fa-whatsapp fa-2x"></i> +93 (0) 728 886 888</a>


                    <ul class="social">
                        @foreach($global_social_item_data as $item)
                        <li>
                            <a href="{{$item->url}}" target="_blank" class="icon-link">
                                <i class="{{$item->icon}} white-icon"></i>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                
                </div>
            </div>
            <div class="col-md-3">
                <div class="social-media-icons">
                    <a href="https://www.facebook.com/HayatRokhanLtd" target="_blank" class="icon-link">
                        <i class="fab fa-facebook white-icon"></i>
                    </a>
                    <a href="#" target="_blank" class="icon-link">
                        <i class="fab fa-youtube white-icon"></i>
                    </a>
                    <a href="https://www.linkedin.com/in/hayat-rokhan-ltd-veterinary-medicines-importing-company-768b93240?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app"
                        target="_blank" class="icon-link">
                        <i class="fab fa-linkedin white-icon"></i>
                    </a>
                 <a href="https://wa.me/93773536366" target="_blank" class="icon-link"><i class="fab fa-whatsapp fa-1x"></i></a>


                </div>
                <hr>
                    <div class="list-item">
             <strong>Address:</strong><i class="fas fa-map-marker-alt fa-lg"></i> 2601 HAJI SHAH MAHMOOD MARKET 2nd FLOOR OFFICE 1,2

                        2nd Region, Jalalabad, Afghanistan  
                        
                    </div>
            </div>
            <div class="col-md-3">
                <div class="footer-menu">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <nav>
                                    <a href="{{ route('home') }}">Home</a>
                                    <a href="{{ route('all_news') }}">News</a>
                                     @foreach($global_categories as $item)
                                        <a href="{{ route('products.show.subcategories', $item->category_name) }}">
        {{ $item->category_name }}</a>
                                    @endforeach
                                    <a href="{{ route('team') }}">Team</a>
                                    <a href="{{ route('about') }}">About</a>
                                </nav>
                            </div>
                            
                        </div>
                        
                    </div>
                </div>
                <hr>
                <a href="/iletisim/">
                                <img src="{{ asset('uploads/' . $global_setting_data->logo) }}" alt="" class="rotate-image" width="200" height="200">
                            </a>
            </div>
        </div>
        <style>
    @keyframes flagWave {
        0% {
            transform: rotate(0deg);
        }
        25% {
            transform: rotate(10deg);
        }
        50% {
            transform: rotate(0deg);
        }
        75% {
            transform: rotate(-10deg);
        }
        100% {
            transform: rotate(0deg);
        }
    }

    .rotate-image {
        animation: flagWave 2s infinite; /* Adjust the duration as needed */
        transform-origin: 50% 50%;
    }
</style>

    </div>
</div>

