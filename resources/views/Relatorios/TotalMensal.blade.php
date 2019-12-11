@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
<h1> Olá {{Auth::user()->name}}, seja bem vindo!</h1>
@stop
@section('content')

<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Todos os Movimentos Cadastrados</h3>
        <html>
          <head>
            <script src="https://cdn.anychart.com/releases/v8/js/anychart-base.min.js?hcode=c11e6e3cfefb406e8ce8d99fa8368d33"></script>
            <script src="https://cdn.anychart.com/releases/v8/js/anychart-ui.min.js?hcode=c11e6e3cfefb406e8ce8d99fa8368d33"></script>
            <script src="https://cdn.anychart.com/releases/v8/js/anychart-exports.min.js?hcode=c11e6e3cfefb406e8ce8d99fa8368d33"></script>
            <link href="https://cdn.anychart.com/releases/v8/css/anychart-ui.min.css?hcode=c11e6e3cfefb406e8ce8d99fa8368d33" type="text/css" rel="stylesheet">
            <link href="https://cdn.anychart.com/releases/v8/fonts/css/anychart-font.min.css?hcode=c11e6e3cfefb406e8ce8d99fa8368d33" type="text/css" rel="stylesheet">
            <style type="text/css">
          html, body, #container {
              width: 100%;
              height: 100%;
              margin: 0;
              padding: 0;
          }
          </style>
          </head>
          <body>
            <div id="container"></div>
            <script>
          anychart.onDocumentReady(function () {
              // create column chart
              var chart = anychart.column();
          
              // turn on chart animation
              chart.animation(true);
          
              // set chart title text settings
              chart.title('Total Mensal');
          
              // create area series with passed data
              var series = chart.column([
                  ['Janeiro', {{$janeiro}} ],
                  ['Fevereiro', {{$fevereiro}}],
                  ['Março', {{$marco}}],
                  ['Abril', {{$abril}}],
                  ['Maio', {{$maio}}],
                  ['Junho', {{$junho}}],
                  ['Julho', {{$julho}}],
                  ['Agosto', {{$agosto}}],
                  ['Setembro', {{$setembro}}],
                  ['Outubro', {{$outubro}}],
                  ['Novembro', {{$novembro}}],
                  ['Dezembro', {{$dezembro}}]
                 
              ]);
                        
              // set series tooltip settings
              series.tooltip().titleFormat('{%X}');
          
              series.tooltip()
                      .position('center-top')
                      .anchor('center-bottom')
                      .offsetX(0)
                      .offsetY(5)
                      .format('{%Value}{groupsSeparator: }');
          
              // set scale minimum
              chart.yScale().minimum(0);
          
              // set yAxis labels formatter
              chart.yAxis().labels().format('{%Value}{groupsSeparator: }');
          
              // tooltips position and interactivity settings
              chart.tooltip().positionMode('point');
              chart.interactivity().hoverMode('by-x');
          
              // axes titles
              chart.xAxis().title('Ano de 2019');
              chart.yAxis().title('Qtd Cadastros');
          
              // set container id for the chart
              chart.container('container');
          
              // initiate chart drawing
              chart.draw();
          });
          </script>
          </body>
          </html>
          
@stop