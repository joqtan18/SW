@extends('plantilla.plantilla')
@section('contenido')

    <div class="mb-4">
    <div class="row">
        <div class="col-xl-6">
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
        <h6 class="m-0 font-weight-bold text-primary">Reporte de Clientes</h6>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table >
                <thead>
                    <th> </th>
                </thead>
                <tbody>
                    <tr>
                        <td><a href="{{route('cliente.pdf')}}" target="_blank" class="btn btn-danger btn-sm"><i class="fa fa-file-pdf"> DESCARGAR PDF </i></a>     </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
        <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Reporte de Productos</h6>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table >
                <thead>
                    <th> </th>
                </thead>
                <tbody>
                    <tr>
                        <td><a href="{{route('producto.pdf')}}" target="_blank" class="btn btn-danger btn-sm"><i class="fa fa-file-pdf"> DESCARGAR PDF </i></a>     </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
            <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Reporte de Stock</h6>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table >
                <thead>
                    <th> </th>
                </thead>
                <tbody>
                    <tr>
                        <td><a href="" target="_blank" class="btn btn-danger btn-sm"><i class="fa fa-file-pdf"> DESCARGAR PDF </i></a>     </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
            <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Reporte de Ventas </h6>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table >
                <thead>
                    <th> </th>
                </thead>
                <tbody>
                    <tr>
                        <td><a href="{{route('venta.pdf')}}" target="_blank" class="btn btn-danger btn-sm"><i class="fa fa-file-pdf"> DESCARGAR PDF </i></a>     </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
            <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Reporte de</h6>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table >
                <thead>
                    <th> </th>
                </thead>
                <tbody>
                    <tr>
                        <td><a href="" target="_blank" class="btn btn-danger btn-sm"><i class="fa fa-file-pdf"> DESCARGAR PDF </i></a>     </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
            <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Reporte de </h6>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table >
                <thead>
                    <th> </th>
                </thead>
                <tbody>
                    <tr>
                        <td><a href="" target="_blank" class="btn btn-danger btn-sm"><i class="fa fa-file-pdf"> DESCARGAR PDF </i></a>     </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection