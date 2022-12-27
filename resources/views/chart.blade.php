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
<center><h1 style="color:red;">Highcharts in Laravel 8 Coronavirus Cases</h1></center>

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
    let cases_daily=[];

    cases.forEach((v,i)=>{
        created_at[i]=(v.created_at);
        cases_daily[i]=parseInt(v.Coronavirus_Cases.replace(/,/g, ''), 10);
    })
    console.log(cases,created_at,cases_daily)
    Highcharts.chart('container', {
        title: {
            text: 'Coronavirus Cases'
        },
        subtitle: {
            text: 'Bo2loZ'
        },
        xAxis: {
            categories: created_at
        },
        yAxis: {
            title: {
                text: 'Number of New Coronavirus Cases'
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
            name: 'New Coronavirus Cases',
            data: cases_daily
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
