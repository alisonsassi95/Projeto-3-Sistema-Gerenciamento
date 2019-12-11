@extends('adminlte::page')

@section('title', 'Home')

@section('content')

<script src="https://cdn.anychart.com/releases/v8/js/anychart-base.min.js?hcode=c11e6e3cfefb406e8ce8d99fa8368d33">
</script>
<script src="https://cdn.anychart.com/releases/v8/js/anychart-ui.min.js?hcode=c11e6e3cfefb406e8ce8d99fa8368d33">
</script>
<script src="https://cdn.anychart.com/releases/v8/js/anychart-exports.min.js?hcode=c11e6e3cfefb406e8ce8d99fa8368d33">
</script>
<link href="https://cdn.anychart.com/releases/v8/css/anychart-ui.min.css?hcode=c11e6e3cfefb406e8ce8d99fa8368d33"
  type="text/css" rel="stylesheet">
<link href="https://cdn.anychart.com/releases/v8/fonts/css/anychart-font.min.css?hcode=c11e6e3cfefb406e8ce8d99fa8368d33"
  type="text/css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="../css/home.css" >


<div class="row">
  <div class="col-xs-20 col-sm-20 col-md-20 col-lg-3">
    <div class="aviso-laranja">AVISOS </div>
    <div class="aviso-azul">
      @foreach($notices as $notices)
        @if ($notices->status == "1")
        <div class="aviso-orange">{{ $notices->title }} <br> {{$notices->description}} </div>

        @elseif ($notices->status == "2")
        <div class="aviso-green">{{ $notices->title }} <br>  {{$notices->description}} </div>

        @elseif($notices->status == "3")
        <div class="aviso-red">{{ $notices->title }} <br> {{$notices->description}} </div>                  
        @endif
            
      @endforeach
    </div>
  </div>

    
  <div class="col-xs-15 col-sm-15 col-md-15 col-lg-6">
    <div class="row">
        <div class="col-xs-15 col-sm-15 col-md-15 col-lg-15">
                        
              <div class="box">
                  <div class="box-hearder">
                    <h3 class="box-title">Minhas Placas Cadastradas</h3>
                      <div class="box-body table-responsive">
                          <table id="tableDepartament" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                              <thead>
                                <tr>
                            
                                  <th>Modelo do Veiculo</th>
                                  <th>Placa</th>
                            
                                </tr>
                              </thead>
                              <tbody>
                            
                                @foreach($PlatePeoples as $PlatePeoples)
                                <tr>
                                  <td>{{ $PlatePeoples->Modelo }}</td>
                                  <td>{{ $PlatePeoples->Placa }}</td>
                                </tr>
                                @endforeach
                            </table>
                       </div>   
                    </div> 

                    <div id="container" style="margin-top: 20%;">
                        <script>
                            anychart.onDocumentReady(function() {
                                // create column chart
                                var chart = anychart.column();
        
                                // turn on chart animation
                                chart.animation(true);
        
                                // set chart title text settings
                                chart.title('Quantidade de Detecções por Dia');
        
                                // create area series with passed data
                                var series = chart.column([
                                    ['DOMINGO', '2'],
                                    ['SEGUNDA', '1'],
                                    ['TERÇA', '2'],
                                    ['QUARTA', '3'],
                                    ['QUINTA', '1'],
                                    ['SEXTA', '2'],
                                    ['SÁBADO', '8'],
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
                                chart.xAxis().title('');
                                chart.yAxis().title('');
        
                                // set container id for the chart
                                chart.container('container');
        
                                // initiate chart drawing
                                chart.draw();
                            });
                        </script>
                      </div>

              </div>                
        </div>      
    </div>
  </div>
    
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
            <div class="row">
                    <div class="passei-laranja">POR ONDE PASSEI</div>
                    <div class="passei-azul" style="font-size: 25px; margin-bottom:30px">
                        <table style="text-align:center;color:#fff; margin-top: 15px; font-size: 15px;">
                            <tbody>
                              @foreach($PeoplesPlatePersonal as $PeoplesPlatePersonal)
                                <tr>

                                  <td>{{ $PeoplesPlatePersonal->placa }}</td>
                                  <td>{{ $PeoplesPlatePersonal->DataDia }}</td>
                                  <td>{{ $PeoplesPlatePersonal->Device }}</td>

                                </tr>
                               @endforeach
                            </tbody>
                          </table>
                    </div>

                        <div class="modal fade" id="modalExemplo1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header" style="background: #FF8800; color:#072955;">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <div style="text-align:center;font-size: 45px;" class="modal-title" id="exampleModalLabel1">POR ONDE PASSEI
                                        </div>
    
                                    </div>
                                    <div class="modal-body" style="background:#072955;color:#fff">
                                        <table style="text-align:center">
                                            <tbody>
                                                <tr>
                                                    <td>UNIJUI</td>
                                                    <td>07/12</td>
                                                    <td>15:06</td>
                                                </tr>
                                                <tr>
                                                    <td>UNIJUI</td>
                                                    <td>07/12</td>
                                                    <td>15:06</td>
                                                </tr>
                                                <tr>
                                                    <td>UNIJUI</td>
                                                    <td>07/12</td>
                                                    <td>15:06</td>
                                                </tr>
                                                <tr>
                                                    <td>UNIJUI</td>
                                                    <td>07/12</td>
                                                    <td>15:06</td>
                                                </tr>
                                                <tr>
                                                    <td>UNIJUI</td>
                                                    <td>07/12</td>
                                                    <td>15:06</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
    
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                    <div class="passei-laranja">ESTACIONAMENTO</div>
                    <div class="passei-azul" style="font-size: 25px; margin-bottom:30px">
                        <div class="valor-est">
                            <h2 style="margin-bottom: -20px "> CRÉDITO:</h1>
                            <h1 style="margin-bottom: 20px ">R$ 122,60</h1>
                            <h5 style="margin-bottom: -3px ">ÚLTIMA VEZ USADO</h5>
                            <p style="font-size: 15px;">09/10/2019 às 16:08 R$5,00
                            </p>
    
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalExemplo2" style="background:#FF8800;color:#072955; border: #FF8800;width:79px;height:25px; border-radius:5px;font-size:10px;">
                                EXTRATO
                            </button>
    
                        </div>
                    </div>
                            <div class="modal fade" id="modalExemplo2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header" style="background: #FF8800; color:#072955;">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <div style="text-align:center;font-size: 45px;" class="modal-title" id="exampleModalLabel2">ESTACIONAMENTO</div>
    
                                        </div>
                                        <div class="modal-body" style="background:#072955;color:#fff">
                                            O QUE VAI AQI
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                <BR>
                <BR>
                <BR>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    
    
                  <div style=" transform: translate(30%, 0%);">
                    <svg xmlns="http://www.w3.org/2000/svg" width="225.216" height="169.852" viewBox="0 0 225.216 169.852">
                      <text id="ID" transform="translate(46.752 135)" fill="#f80" font-size="125"
                        font-family="SegoeUI-Bold, Segoe UI" font-weight="700">
                        <tspan x="0" y="0">ID</tspan>
                      </text>
                      <rect id="Retângulo_8" data-name="Retângulo 8" width="225.216" height="71.888" rx="20"
                        transform="translate(0 83.451)" fill="#072955" />
                      <text id="PLATE" transform="translate(33.179 141.478)" fill="#f80" font-size="49"
                        font-family="SegoeUI-Semibold, Segoe UI" font-weight="600" letter-spacing="0.1em">
                        <tspan x="0" y="0">PLATE</tspan>
                      </text>
                      <text id="SOFTWARE" transform="translate(54.293 97.975)" fill="#04509d" font-size="9"
                        font-family="SegoeUI-Bold, Segoe UI" font-weight="700" letter-spacing="1em">
                        <tspan x="0" y="0">SOFTWARE</tspan>
                      </text>
                      <text id="IDENTIFICADOR_DE_PLACAS" data-name="IDENTIFICADOR DE PLACAS" transform="translate(18.6 167.852)"
                        fill="#04509d" font-size="9" font-family="SegoeUI-Bold, Segoe UI" font-weight="700" letter-spacing="0.25em">
                        <tspan x="0" y="0">IDENTIFICADOR DE PLACAS</tspan>
                      </text>
                    </svg>
        </div>
                </div>

        </div>
    </div>

    @stop