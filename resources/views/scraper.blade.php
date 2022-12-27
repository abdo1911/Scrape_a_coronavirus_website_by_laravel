
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Laravel_Project3_Scraper</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>

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

        body {
            font-family: "Lato", sans-serif;
        }
        .sidenav {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #111;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
        }
        .sidenav a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 15px;
            color: #818181;
            display: block;
            transition: 0.3s;
        }
        .sidenav a:hover {
            color: #f1f1f1;
        }
        .sidenav .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }
        #main {
            transition: margin-left .10s;
            padding: 16px;
        }
        @media screen and (max-height: 450px) {
            .sidenav {padding-top: 15px;}
            .sidenav a {font-size: 18px;}
        }

        #myVideo {
            position: fixed;
            right: 0;
            bottom: 0;
            min-width: 100%;
            min-height: 100%;
        }
        .content {
            position: fixed;
            upper: 0;
            padding: 20px;
        }


    </style>
</head>
<body>

<video autoplay muted loop id="myVideo">
    <source src="back2.mp4" type="video/mp4">
    Your browser does not support HTML5 video.
</video>


<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="{{route('scraper.store')}}">Fetch Data</a>
    <a href="{{route('scraper.information')}}">Information</a>
    <a href="{{route('scraper.max_cases')}}">Maximum Coronavirus</a>
    <a href="{{route('scraper.max_death')}}">Maximum Death</a>
    <a href="{{route('scraper.max_recovered')}}">Maximum Recovered</a>
    <a href="{{route('Chart.indexx')}}">Coronavirus Cases Chart</a>
    <a href="{{route('Chart.indexx1')}}">Deaths Chart</a>
    <a href="{{route('Chart.indexx2')}}">Recovered Chart</a>
    <a href="{{route('comment')}}">Comment</a>
    <a href="{{route('showComment')}}">Review Comments</a>
</div>

<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
        document.getElementById("main").style.marginLeft = "250px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("main").style.marginLeft= "0";
    }
</script>

<div class="content">
    <span style="font-size:30px;color: #00bf8f;cursor:pointer" onclick="openNav()">&#9776; open</span>
</div>

    {{--<a class="btn btn-primary" href=""></a>--}}
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 mt-5 wrapper">
                {{$i=0}};
                @foreach($data as $key => $value)
                    {{$current=$arr[$i++]}}
                     <div class="card text-center mt-4">
                        <h5 class="card-header">{{$key}}</h5>
                        <div class="card-body">
                            <p class="card-text">{{$value}}
                                @if($current>0)
                                    <span style="color: #00bf8f; font-size: large;font-weight: bold "> + {{$current}}</span>
                                @else
                                    <span style="color: red; font-size: large ; font-weight: bold "> - {{$current}}</span>
                                @endif
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</body>
</html>
