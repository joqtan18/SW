@extends('plantilla.plantilla')
@section('contenido')
<div class="mb-4">
    <div class="row">
        <div class="col-xl-6">
            <a href="{{url('producto/create')}}" class="btn btn-primary">Registrar Producto</a>
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
        <h6 class="m-0 font-weight-bold text-primary">Productos</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <th>Categoria</th>
                    <th>Nombre</th>
                    <th>Slug</th>
                    <th>Descripcion</th>
                    <th>Extract</th>
                    <th>Precio</th>
                    <th>imagen</th>
                    <th>Stock</th>
                    <th>Visibilidad</th>
                    <th>Opciones</th>
                </thead>
                <tbody>
                    @foreach($productos as $prod)
                    <tr>
                        <td>{{$prod->cat_nombre}}</td>
                        <td>{{$prod->prod_nombre}}</td>
                        <td>{{$prod->prod_slug}}</td>
                        <td>{{$prod->prod_descripcion}}</td>
                        <td>{{$prod->prod_extract}}</td>
                        <td>S/. {{$prod->prod_precio}}</td>
                        <td> <img src="{{$prod->prod_imagen}}" height="35px"> </td>
                        <td>{{$prod->prod_stock}}</td>
                        <td class="text-center">
                            @if ($prod->prod_visible === 1)
                                <a href="{{url('visibilidad/'.$prod->prod_id)}}" class="btn btn-light">Ocultar</a>
                            @elseif($prod->prod_visible === 0)
                                <a href="{{url('visibilidad/'.$prod->prod_id)}}" class="btn btn-info">Publicar</a>
                            @endif
                        </td>
                        <td>
                          <a href="{{url('producto/'.$prod->prod_id.'/edit')}}" class="btn btn-sm btn-warning"> <i class="fa fa-edit"></i> </a>
                          <a data-toggle="modal" data-target="#modal-delete-{{$prod->prod_id}}" class="btn btn-danger btn-sm" href=""> <i class="fa fa-trash" ></i></a>
                        @include('producto.delete')
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
