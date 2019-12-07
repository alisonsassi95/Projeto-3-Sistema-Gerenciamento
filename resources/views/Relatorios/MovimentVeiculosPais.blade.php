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

      <th>Brasil</th>
      <th>Argentina</th>
      <th>Outros</th>      
    

    </tr>
  </thead>
  <tbody>

    <tr>
      <td>{{$br}}</td>
      <td>{{$ar}}</td>
      <td>{{$outros}}</td>
    </tr>
</table>






@stop