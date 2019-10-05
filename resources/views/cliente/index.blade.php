@extends('plantilla.plantilla')
@section('contenido')
<div class="mb-4">
    <div class="row">
        <div class="col-xl-6">
            <a href="{{url('cliente/create')}}" class="btn btn-primary">Registrar Cliente</a>
            
        </div>
        <div class="col-xl-6">
            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif
        </div>
    </div>
</div>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Clientes</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <th>DNI</th>
                    <th>Apellidos</th>
                    <th>Nombres</th>
                    <th>Email</th>
                    <th>Dirección</th>
                    <th>Opciones</th>
                </thead>
                <tbody>
                    @foreach($clientes as $cli)
                    <tr>
                        <td>{{$cli->cli_dni}}</td>
                        <td>{{$cli->cli_apellidos}}</td>
                        <td>{{$cli->cli_nombres}}</td>
                        <td>{{$cli->cli_email}}</td>
                        <td>{{$cli->cli_direccion}}</td>
                        <td>
                        <a href="{{url('cliente/'.$cli->cli_id.'/edit')}}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> </a> 
                        <a data-toggle="modal" data-target="#modal-delete-{{$cli->cli_id}}" class="btn btn-danger btn-sm" href=""><i class="fa fa-trash" ></i></a>
                        @include('cliente.delete')
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
