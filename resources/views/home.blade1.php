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
        <h3 class="box-title">Responsive Hover Table</h3>

        <div class="box-tools">
          <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
            <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

            <div class="input-group-btn">
              <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
            </div>
          </div>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
          <tr>
            <th>ID</th>
            <th>User</th>
            <th>Date</th>
            <th>Status</th>
            <th>Reason</th>
          </tr>
          <tr>
            <td>183</td>
            <td>John Doe</td>
            <td>11-7-2014</td>
            <td><span class="label label-success">Approved</span></td>
            <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
          </tr>
          <tr>
            <td>219</td>
            <td>Alexander Pierce</td>
            <td>11-7-2014</td>
            <td><span class="label label-warning">Pending</span></td>
            <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
          </tr>
          <tr>
            <td>657</td>
            <td>Bob Doe</td>
            <td>11-7-2014</td>
            <td><span class="label label-primary">Approved</span></td>
            <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
          </tr>
          <tr>
            <td>175</td>
            <td>Mike Doe</td>
            <td>11-7-2014</td>
            <td><span class="label label-danger">Denied</span></td>
            <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
          </tr>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
</div>
</section>
<!-- /.content -->


<!-- ------------- Tabela Placas de Pessoas ------------ -->
<h1>Tabela Placas de Pessoas  </h1>
<table id="tableDepartament" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
  <thead>
    <tr>

      <th>Nome</th>
      <th>Modelo do Veiculo</th>
      <th>Placa</th>

    </tr>
  </thead>
  <tbody>

    @foreach($PlatePeoples as $PlatePeoples)
    <tr>
      <td>{{ $PlatePeoples->Nome }}</td>
      <td>{{ $PlatePeoples->Modelo }}</td>
      <td>{{ $PlatePeoples->Placa }}</td>
    </tr>
    @endforeach
</table>

<!-- FIM de Tabela Placas de Pessoas -->
<!-- ------------- Tabela de Notícias ------------ -->
<h1>Tabela de Notícias  </h1>
<table id="tableDepartament" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
  <thead>
    <tr>

      <th>Titulo</th>
      <th>Descrição</th>
      <th>Prioridade</th>

    </tr>
  </thead>
  <tbody>

    @foreach($notices as $notices)
    <tr>
      <td>{{ $notices->title }}</td>
      <td>{{ $notices->description }}</td>
      <td>{{ $notices->status }}</td>

    </tr>
    @endforeach
</table>

<!-- FIM de Tabela de Notícias -->

<!-- ------------- Tabela de Placa POR PESSOA ------------ -->
<h1>Tabela de Placa POR PESSOA (por onde passei?) </h1>
<table id="tableDepartament" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
  <thead>
    <tr>

      <th>Placa</th>
      <th>Data do Dia</th>
      <th>Local</th>

    </tr>
  </thead>
  <tbody>

    @foreach($PeoplesPlatePersonal as $PeoplesPlatePersonal)
    <tr>
      <td>{{ $PeoplesPlatePersonal->placa }}</td>
      <td>{{ $PeoplesPlatePersonal->DataDia }}</td>
      <td>{{ $PeoplesPlatePersonal->Device }}</td>

    </tr>
    @endforeach
</table>

<!-- FIM de Tabela de Notícias -->



@stop