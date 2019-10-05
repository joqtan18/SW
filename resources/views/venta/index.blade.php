@extends('plantilla.plantilla')
@section('contenido')
<div class="mb-4">
    <div class="row">
        <div class="col-xl-6">
            <a href="{{url('ventas/create')}}" class="btn btn-primary">Nueva Venta</a>
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
        <h6 class="m-0 font-weight-bold text-primary">Ventas</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <th>Fecha</th>
                    <th>Cliente</th>
                    <th>Total</th>
                    <th>Opciones</th>
                </thead>
                <tbody>
                    @foreach($ventas as $ven)
                    <tr>
                        <td>{{$ven->ven_fecha}}</td>
                        <td>{{$ven->cli_apellidos.','.$ven->cli_nombres}}</td>
                        <td>S/. {{$ven->ven_total}}</td>
                        <td>
                          <a data-toggle="modal" data-target="#modal-info-{{$ven->ven_id}}" class="btn btn-warning btn-sm" href="">Detalles</a>
                            @include('venta.detalle')
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
