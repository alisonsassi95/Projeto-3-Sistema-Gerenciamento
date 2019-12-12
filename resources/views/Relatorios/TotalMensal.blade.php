@extends('adminlte::page')

@section('title', 'AdminLTE')
@section('content')

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.css" type="text/css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" type="text/css" rel="stylesheet">
 
<div class="row">
  <div class="col-xs-12" style="margin-top: 0%">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Detecções por Mês</h3>
          <canvas id="myChart"></canvas>
          <script>
          var ctx = document.getElementById('myChart').getContext('2d');
          var chart = new Chart(ctx, {
          // The type of chart we want to create
          type: 'bar',

          // The data for our dataset
          data: {
              labels: [
                @foreach($relatMensal as $x)
                '{{$x->mes}}',
                @endforeach
              ],
              datasets: [{
                  label: 'Total',
                  backgroundColor: 'rgb(255,136,0)',
                  borderColor: 'rgb(255,136,0)',
                  data: [@foreach($relatMensal as $x) {{$x->total}}, @endforeach ]
              }]
          },

          // Configuration options go here
          options: {}
          });

          </script>
      </div>
    </div> 
  </div> 
</div>
        
@stop
