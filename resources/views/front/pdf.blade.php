<!-- resources/views/invoice.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice - Veterinary Medical Products</title>
    <style>
        /* Add your styles here */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        header {
            background-color: #add8e6 ;
            color: #ffffff;
            text-align: center;
            padding: 1rem;
        }

        h1 {
            margin: 0;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        .icon {
            width: 20px;
            height: 20px;
        }

        .limited-width {
            max-width: 200px;
        }

        .page-content {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <header>
        <h1>HayatRokhan - Veterinary Medical Products</h1>
        <div class="columns">
            <h5>HAYAT ROKHAN LTD </h5>
            <p>
            Afghanistan Jalalabad city <br>
             office no 2 Haji Mahmood Market</p>
            <div>
            <img src="http://www.mistav.com.tr/en/wp-content/uploads/2019/03/01-tavuk.png" alt="Tavuk" class="icon">
          <img src="http://www.mistav.com.tr/en/wp-content/uploads/2019/03/02-hindi.png" alt="Hindi" class="icon">
          <img src="http://www.mistav.com.tr/en/wp-content/uploads/2019/03/03-dana.png" alt="Sığır" class="icon">
          <img src="http://www.mistav.com.tr/en/wp-content/uploads/2019/03/04-buzagi.png" alt="Buzağı" class="icon">
          <img src="http://www.mistav.com.tr/en/wp-content/uploads/2019/12/12-domuz.png" alt="Domuz" class="icon">
            </div>
      
          </div>
    </header>

    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-10">
                    <div class="category-page">
                        <table>
                            <thead>
                                <tr>
                                    <th>PRODUCT</th>
                                    <th>THERAPEUTIC GROUP</th>
                                    <th>PRESENTATION</th>
                                    <th>TARGET SPECIES</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($postData as $item)
                                <tr>
                                    <td class="limited-width">
                                        <a href="{{ route('post_detail', $item->id) }}">{{ $item->post_title }}</a>
                                    </td>
                                    <td>
                                        <span class="badge bg-info">{{ $subCategoryData->sub_category_name }}</span>
                                    </td>
                                    <td>
                                        <p>{!! nl2br($item->post_detail) !!}</p>
                                    </td>
                                    <td>
                                        @foreach ($item->icons as $icon)
                                            <img src="{{ $icon }}" alt="Icon" class="icon">
                                        @endforeach
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
