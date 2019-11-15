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

    
                        <div class=" form-group col-md-2" value="{{ old('birthdate') }}">
                            <label for="date_end">Data de término</label>
                            <input type="date" name="date_end" value="{{$notices->date_end}}" class="form-control" placeholder="Data de termino">
                        </div>


                        <div class="form-group col-md-2">
                            <label for="title">titulo</label>
                            <input type="text" value="{{$notices->title}}" name="title" class="form-control" placeholder="Titulo">
                        </div>

                        <div  class="form-group col-md-2">
                            <label for="description">Descrição</label>
                            <input type="text"  name ='description' value="{{$notices->description}}" class="form-control" value='' id="description" ></select>

                        </div>
                        
                        <button class=" form-group btn btn-primary" >Salvar</button>
                    </form>

                    @if (Session::has('message'))
                    <div class="alert alert-info">{{ Session::get('message') }}</div>
                    @endif

        </div>
    </div>
</div>
                  
@stop


 