@extends('adminlte::page')

@section('title', 'Cadastro de Avisos')

@section('content')

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Cadastro de Notificação</h3>
    </div>
    <div role="form">
        <div class="box-body">
            @include('sweet::alert')
            <form action="{{ route('notice.save') }}" method="post">
                {{ csrf_field() }}

                <div class="form-group col-md-8 ">
                    <label for="title">Título</label>
                    <input type="text" name="title" class="form-control" placeholder="Título do Aviso">
                </div>
        </div>

        <div class="form-group col-md-12">
            <label for="description">Descrição</label>
            <input type="textarea" name="description" class="form-control" placeholder="Descrição">
        </div>
        <div class=" form-group col-md-2" value="{{ old('birthdate') }}">
            <label for="date_end">Data de término</label>
            <input type="date" name="date_end" class="form-control" placeholder="Data de termino">
        </div>
        <div class=" form-group col-md-2" value="{{ old('birthdate') }}">
            <label for="date_start">Data de inicio</label>
            <input type="date" name="date_start" class="form-control" placeholder="Data de inicio">
        </div>
        <br>
        <button class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Adicionar</button>
    </div>

    @if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
    </form>
</div>


@stop