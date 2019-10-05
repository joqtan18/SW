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
        <h6 class="m-0 font-weight-bold text-primary">stock</h6>
    </div>
	<div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <th>Codigo</th>
                    <th>codigo Categoria</th>
                    <th>Nombre</th>
                    <th>Stock</th>
                    <th>Accione</th>
                </thead>
                <tbody>
                    @foreach($stock as $prod)
                    <tr>
                        <td>{{$prod->prod_id}}</td>   
                        <td>{{$prod->cat_nombre}}</td>                      
                        <td>{{$prod->prod_nombre}}</td>
                        <td>{{$prod->prod_stock}}</td>
                        <td><a href="{{url('stock')}}">ACTUALIZAR</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    
@endsection

