<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="website-menu">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: Blue Orchid;">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="{{ route('all_news') }}">News</a>
                                </li>
                                @foreach($global_categories as $item)
                                  <li class="nav-item">
    <a class="nav-link" href="{{ route('products.show.subcategories', $item->category_name) }}">
        {{ $item->category_name }}
    </a>
</li>

                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown-{{ $item->id }}">
                                            @foreach ($item->rSubCategory as $row)
                                                <li><a class="dropdown-item" href="{{ route('category', $row->id) }}">{{ $row->sub_category_name }}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endforeach
                                   <li class="nav-item dropdown">
<!--    <a class="nav-link dropdown-toggle" href="#" id="dropdownDistributor" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
<!--        Distributions-->
<!--    </a>-->
<!--    <ul class="dropdown-menu" aria-labelledby="dropdownDistributor">-->
<!--        @foreach($global_d_categories as $item)-->
<!--            <li class="nav-item dropdown">-->
<!--                <a class="nav-link dropdown-toggle" href="{{ route('distributor.show.subcategories', $item->category_name) }}" id="navbarDropdown-{{ $item->id }}" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
<!--                    <span style="color: black;">-->
<!--                        {{ $item->category_name }}-->
<!--                    </span>-->
<!--                </a>-->
                <!-- ... rest of your dropdown menu ... -->
<!--            </li>-->
<!--        @endforeach-->
<!--    </ul>-->
<!--</li>-->
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="{{ route('team') }}">Team</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="{{ route('about') }}">About Us</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Your content goes here -->

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>

</html>
