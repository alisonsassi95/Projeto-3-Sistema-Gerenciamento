@extends('adminlte::page')

@section('title', 'IDPlate - Reconhecimento e Controle')

@section('content')

<div class="box box-primary">
 <div class="box-header with-border">
    <h3 class="box-title">Cadastro de Veículos</h3>
 </div>
    <div role="form">
        <div class="box-body">
            @include('sweet::alert')
                    <form action="{{route('plates.save')}}" method="post">
                    {{ csrf_field() }}
                        
                        <div class="form-group">
                            <label for="people_id">código Proprietário</label>
                            <input  readOnly = "true" type="text" name="people_id" value= "{{ $people->id}}" class="form-control" placeholder="Código Proprietário">
                        </div>

                        <div class="form-group">
                            <label for="name">Nome Proprietário</label>
                            <input  readOnly = "true" type="text" name="name" value= "{{ $people->name}}" class="form-control" placeholder="Nome Proprietário">
                        </div>

                        <div class="form-group col-md-4 {{$errors->has('plate') ? 'has-error' : '' }}">
                            <label for="plate">Placa</label>
                            <input type="text" name="plate" id = "plate" class="form-control" placeholder="Placa do Veícuo" onkeydown="upperCaseF(this)">
                        @if($errors->has('plate'))
                        <span class="help-block">
                            <strong>{{$errors->first('plate')}}</strong>
                        </span>
                        @endif
                        </div>
                        
                        <div class="form-group col-md-4 {{$errors->has('Veic_color') ? 'has-error' : '' }}">
                            <label for="Veic_color">Cor do veículo</label>
                            <input type="text" name="Veic_color" id = "Veic_color" class="form-control" placeholder="Cor do Veícuo">
                        @if($errors->has('Veic_color'))
                        <span class="help-block">
                            <strong>{{$errors->first('Veic_color')}}</strong>
                        </span>
                        @endif
                        </div>

                        <div class="form-group col-md-4 {{$errors->has('Veic_model') ? 'has-error' : '' }}">
                            <label for="Veic_model">Modelo do veículo</label>
                            <input type="text" name="Veic_model" id = "Veic_model" class="form-control" placeholder="Modelo do Veícuo">
                        @if($errors->has('Veic_model'))
                        <span class="help-block">
                            <strong>{{$errors->first('Veic_model')}}</strong>
                        </span>
                        @endif
                        </div>

                        <div class="form-group col-md-12 {{$errors->has('Veic_description') ? 'has-error' : '' }}">
                            <label for="Veic_description">Observaçao do veículo</label>
                            <input type="textarea" name="Veic_description" class="form-control" placeholder="Veic_descriptionervação">
                            @if($errors->has('Veic_description'))
                        <span class="help-block">
                            <strong>{{$errors->first('Veic_description')}}</strong>
                        </span>
                        @endif
                        </div>
                        
                        <br>
                        <button class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Adicionar</button>
                        </div>

                        @if (Session::has('message'))
                        <div class="alert alert-info">{{ Session::get('message') }}</div>
                        @endif
                    </form>
            </div>
        </div>
    </div>

@stop
