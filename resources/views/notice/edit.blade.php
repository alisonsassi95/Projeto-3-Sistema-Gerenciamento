@extends('adminlte::page')

@section('title', 'Editar Avisos')

@section('content')

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Editar avisos</h3>
    </div>
    <div role="form">
        <div class="box-body">
            @include('sweet::alert')
            <form action="{{ route('notice.update', $notices->id) }}" method="post">
                {{ csrf_field() }}

                <input type="hidden" name="_method" value="put">

                <div class=" form-group col-md-2" value="{{ old('date_start') }}">
                    <label for="date_start">Data de Inicio</label>
                    <input type="date" name="date_start" value="{{$notices->date_start}}" class="form-control" placeholder="Data de Inicio">
                </div>

                <div class=" form-group col-md-2" value="{{ old('date_end') }}">
                    <label for="date_end">Data de término</label>
                    <input type="date" name="date_end" value="{{$notices->date_end}}" class="form-control" placeholder="Data de termino">
                </div>


                <div class="form-group col-md-2">
                    <label for="title">titulo</label>
                    <input type="text" value="{{$notices->title}}" name="title" class="form-control" placeholder="Titulo">
                </div>

                <div class="form-group col-md-2">
                    <label for="description">Descrição</label>
                    <input type="text" name='description' value="{{$notices->description}}" class="form-control" value='' id="description"></select>

                </div>
                <div class="form-group col-md-12">
                    <label for="status">Tipo</label>
                    <div required name="status" class="auto-control" value="{{$notices->status}}" required autofocus>
                        <select class="form-control" id="status" name="status">
                            @if($notices->status == '3')
                            <option value="{{ $notices->status }}">Alta</option>
                            <option value="2">Média</option>
                            <option value="1">Baixa</option>
                            @endif
                            @if($notices->status == '2')
                            <option value="{{ $notices->status }}">Média</option>
                            <option value="3">Alta</option>
                            <option value="1">Baixa</option>
                            @endif
                            @if($notices->status == '1')
                            <option value="{{ $notices->status }}">Baixa</option>
                            <option value="2">Média</option>
                            <option value="3">Alta</option>
                            @endif
                        </select>
                    </div>
                </div>
                <button class=" form-group btn btn-primary">Salvar</button>
            </form>

            @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
            @endif

        </div>
    </div>
</div>

@stop