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
<table id="tableDepartament" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
  <thead>
    <tr>

      <th>Placa</th>
      <th>Data da Foto</th>
      <th>Ano</th>
      <th>Mês</th>
      <th>Dia</th>
      <th>Hora</th>
      <th>Minutos</th>

    </tr>
  </thead>
  <tbody>

    @foreach($Retornopagina as $Retornopagina)
    <tr>
      <td>{{ $Retornopagina->placa }}</td>
      <td>{{ $Retornopagina->datafoto }}</td>
      <td>{{ $Retornopagina->ANO }}</td>
      <td>{{ $Retornopagina->MES }}</td>
      <td>{{ $Retornopagina->DIA }}</td>
      <td>{{ $Retornopagina->HORA }}</td>
      <td>{{ $Retornopagina->MIN }}</td>

    </tr>
    @endforeach
</table>






@stop