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
        <h3 class="box-title">Quantidade de Clientes Cadastrados</h3>
<table id="tableDepartament" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
  <thead>
    <tr>

      <th>Identificação Cliente</th>
      <th>Nome</th>
      <th>Placa</th>
      <th>Carro</th>
      <th>Data de Cadastro</th>      
    

    </tr>
  </thead>
  <tbody>
    @foreach($Retornopagina as $Retornopagina)
    <tr>
      <td>{{ $Retornopagina->id }}</td>
      <td>{{ $Retornopagina->nome }}</td>
      <td>{{ $Retornopagina->placa }}</td>
      <td>{{ $Retornopagina->carro }}</td>
      <td>{{ $Retornopagina->data_cadastro }}</td>
    </tr>
    @endforeach
    
</table>






@stop