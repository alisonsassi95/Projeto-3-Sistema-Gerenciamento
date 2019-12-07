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

      <th>Janeiro</th>
      <th>Fevereiro</th>
      <th>Março</th>
      <th>Abril</th>
      <th>Maio</th>
      <th>Junho</th>
      <th>Julho</th>
      <th>Agosto</th>
      <th>Setembro</th>
      <th>Outubro</th>
      <th>Novembro</th>
      <th>Dezembro</th>
           
    </tr>
  </thead>
  <tbody>

    <tr>
      <td>{{$janeiro}}</td>
      <td>{{$fevereiro}}</td>
      <td>{{$marco}}</td>
      <td>{{$abril}}</td>
      <td>{{$maio}}</td>
      <td>{{$junho}}</td>
      <td>{{$julho}}</td>
      <td>{{$agosto}}</td>
      <td>{{$setembro}}</td>
      <td>{{$outubro}}</td>
      <td>{{$novembro}}</td>
      <td>{{$dezembro}}</td>
    </tr>
</table>






@stop