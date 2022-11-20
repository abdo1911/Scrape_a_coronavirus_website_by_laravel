
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Laravel_Project3_Scraper</title>

    <style>
        body {
            /*background-color: lightblue;*/
            background-image: url(back2.jpg);
        }
        .wrapper > .card:first-child .card-header{
            background-color: orange;
            color: white;
        }
        .wrapper > .card:nth-child(2) .card-header{
            background-color: red;
            color: white;
        }
        .wrapper > .card:nth-child(3) .card-header{
            background-color: green;
            color: white;
        }
    </style>
</head>
<body>
    <a class="btn btn-primary" href="{{route('scraper.store')}}">Fetch Data</a>
    <a class="btn btn-primary" href="{{route('scraper.information')}}">Information</a>
    <a class="btn btn-primary" href="{{route('scraper.max_cases')}}">Maximum Coronavirus Cases</a>
    <a class="btn btn-primary" href="{{route('scraper.max_death')}}">Maximum Death</a>
    <a class="btn btn-primary" href="{{route('scraper.max_recovered')}}">Maximum Recovered</a>
    <a class="btn btn-primary" href="{{route('Chart.indexx')}}">Coronavirus Cases Chart</a>
    <a class="btn btn-primary" href="{{route('Chart.indexx1')}}">Deaths Chart</a>
    <a class="btn btn-primary" href="{{route('Chart.indexx2')}}">Recovered Chart</a>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 mt-5 wrapper">
                @foreach($data as $key => $value)
                     <div class="card text-center mt-4">
                        <h5 class="card-header">{{$key}}</h5>
                        <div class="card-body">
                            <p class="card-text">{{$value}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</body>
</html>
