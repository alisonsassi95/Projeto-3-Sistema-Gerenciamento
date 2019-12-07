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
        <h3 class="box-title">Avisos Cadastrados</h3>
<table id="tableDepartament" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
  <thead>
    <tr>

      <th>Titulo</th>
      <th>Descrição</th>
      <th>Prioridade</th>

    </tr>
  </thead>
  <tbody>

    @foreach($Retornopagina as $Retornopagina)
    <tr>
      <td>{{ $Retornopagina->title }}</td>
      <td>{{ $Retornopagina->description }}</td>
      <td>{{ $Retornopagina->status }}</td>

    </tr>
    @endforeach
</table>

@stop