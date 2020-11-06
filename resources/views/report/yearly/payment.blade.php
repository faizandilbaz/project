@extends('layout/layout')

<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([

          ['Days', 'Sales'],
@foreach($report as $report)
    ['{{$report->date}}',  {{$report->amount}}],
    @endforeach

        ]);

        var options = {
          title: 'Monthly Sales',
          
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  
  @section('content')


    <div class="container mt-5 mt-container widget-content widget-content-area container-fluid">

    
    
    
    
        <div class="card-body">

            <div id="curve_chart" style="width: 900px; height: 500px"></div>
            
            
        </div>
    
    
    </div>
  
  
@endsection


@section('scripts')


@endsection