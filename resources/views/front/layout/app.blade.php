<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>Hayat Rokhan LTD</title>
    <link rel="icon" type="image/png" href="{{ asset('uploads/' . $global_setting_data->favicon) }}">


    @include('front.layout.styles')
</head>
<body>
<div class="top">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <ul>
                    <li class="email-text">info@hayatrokhan.com</li>
                </ul>
            </div>
            <div class="col-md-6">
                <ul class="right">
                    <li class="menu"><a href="{{ route('contact') }}">Contact</a></li>
                    <li class="menu"><a href="{{ route('admin_login') }}">Login</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="heading-area">
    <div class="container">
        <div class="row">
            <div class="col-md-8 d-flex align-items-center">
                <div class="logo">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('uploads/' . $global_setting_data->logo) }}" alt="" class="rotate-image img-fluid" width="70" height="140">
                    </a>
                </div>
    <h1 style="color: #000000; letter-spacing: 6px; font-weight: bold;">
    <span style="color: #00cc00;">HAYAT</span>
    <span style="color: #cc0000;"> ROKHAN </span>
    <span style="color: #000000;">LTD</span>
</h1>


            </div>
        </div>
    </div>
</div>

@include('front.layout.nav')

@yield('main_content')

@include('front.layout.scripts_footer')

</body>

</html>
