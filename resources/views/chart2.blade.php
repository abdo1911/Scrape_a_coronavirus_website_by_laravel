<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <title>Laravel 8 Highcharts Demo</title>
    <style>
        #myVideo {
            position: fixed;
            right: 0;
            bottom: 0;
            min-width: 100%;
            min-height: 100%;
        }
    </style>
</head>

<body>
<video autoplay muted loop id="myVideo">
    <source src="back2.mp4" type="video/mp4">
    Your browser does not support HTML5 video.
</video>

<center><h1 style="color:red;">Highcharts in Laravel 8 Recovered</h1></center>

<div id="container"></div>
    <style>
        body {
            background-color: lightblue;
        }
    </style>
</body>

<script src="https://code.highcharts.com/highcharts.js"></script>

<script type="text/javascript">
    const cases = <?php echo json_encode($cases)?>;
    let created_at=[];
    let Recovered_daily=[];

    cases.forEach((v,i)=>{
        created_at[i]=(v.created_at);
        Recovered_daily[i]=parseInt(v.Recovered.replace(/,/g, ''), 10);
    })
    console.log(cases,created_at,Recovered_daily)
    Highcharts.chart('container', {
        title: {
            text: 'Recovered Cases'
        },
        subtitle: {
            text: 'Bo2loZ'
        },
        xAxis: {
            categories: created_at
        },
        yAxis: {
            title: {
                text: 'Number of New Recovered'
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },
        plotOptions: {
            series: {
                allowPointSelect: true
            }
        },
        series: [{
            name: 'New Recovered',
            data: Recovered_daily
        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
    });

</script>

</html>
