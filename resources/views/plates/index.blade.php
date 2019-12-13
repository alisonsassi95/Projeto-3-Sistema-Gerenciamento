@extends('adminlte::page')

@section('title', 'IDPlate - Reconhecimento e Controle')

@section('content')

<div class="box box-primary">
        <div class="box-header with-border">
           <h3 class="box-title">Consulta</h3>
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
                                    <th>Dono</th>
                                    <th>Placa</th>
                                    <th>Cor do Veiculo</th>
                                    <th>Modelo do Veiculo</th>
                                    <th>Descrição do Veiculo</th>
                                    <th>Ação</th>
                                  
                                </tr>
                              </thead>
                          <tbody>
                              
                              @foreach($plates as $plates)
                              <tr>
                                <td>{{ $plates->people_id }}</td>
                                <td>{{ $plates->plate }}</td>
                                <td>{{ $plates->Veic_color }}</td>
                                <td>{{ $plates->Veic_model }}</td>
                                <td>{{ $plates->Veic_description }}</td>
                                <td>

                                    <a class="btn btn-default" href="{{route('plates.edit',$plates->id)}}"> <i class="glyphicon glyphicon-edit"></i > Editar</a>
                                    <a class="btn btn-danger" href="javascript:(confirm('Deletar esse registro?') ? window.location.href='{{route('plates.delete',$plates->id)}}' : false)"><i class="glyphicon glyphicon-trash"></i > Deletar</a>
                                    <a class="btn btn-primary" href="{{route('User.load',$plates->id)}}"><i class="glyphicon glyphicon-user"></i > Criar Usuario</a>
                                        
                                </td>
                              </tr>
                            @endforeach
                    </table>


                    <a class="btn btn-primary" href="{{route('plates.add')}}"><i class="glyphicon glyphicon-plus"></i> Adicionar</a>
                </div>
            </div>
</div>

@stop

