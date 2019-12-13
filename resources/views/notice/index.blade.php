@extends('adminlte::page')

@section('title', 'Cadastro de Avisos')

@section('content')

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Cadastro de Avisos</h3>
        @include('sweet::alert')
    </div>

    <div class="panel-body">

        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif

        <table id="tableDepartament" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
            <thead>
                <tr>

                    <th>Title</th>
                    <th>Description</th>
                    <th>Data Inicial</th>
                    <th>Data Final</th>
                    <th>Status</th>


                </tr>
            </thead>
            <tbody>

                @foreach($notices as $notice)
                <tr>
                    <td>{{ $notice->title }}</td>
                    <td>{{ $notice->description }}</td>
                    <td>{{ date('d/m/Y', strtotime($notice->date_start)) }}</td>
                    <td>{{ date('d/m/Y', strtotime($notice->date_end ))}}</td>
                    <td>{{ $notice->status }}</td>
                    <td>


                        <a class="btn btn-default" href="{{route('notice.edit',$notice->id)}}"> <i class="glyphicon glyphicon-edit"></i> Editar</a>
                        <a class="btn btn-danger" href="javascript:(confirm('Deletar esse registro?') ? window.location.href='{{route('notice.delete',$notice->id)}}' : false)"><i class="glyphicon glyphicon-trash"></i> Deletar</a>

                    </td>
                </tr>
                @endforeach
        </table>

        <div align="center">
        </div>
        <a class="btn btn-primary" href="{{route('notice.add')}}"><i class="glyphicon glyphicon-plus"></i> Adicionar</a>
    </div>
</div>
</div>

@stop