@extends('adminlte::page')

@section('title', 'AdminLTE')
@section('content')
 
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
