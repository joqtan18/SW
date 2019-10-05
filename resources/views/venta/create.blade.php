<?php

            
?>
@extends('plantilla.plantilla')
@section('contenido')
<div class="mb-4">
    <h1>Nueva Venta</h1>
    @if (count($errors)>0)
      <div class="alert alert-danger">
        <p>Corregir los siguientes campos:</p>
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
    @endif
</div>
<form action="{{url('ventas')}}" method="post">
  @method('POST')
  {{ csrf_field() }}
    <div class="row">
        <div class="col-xl-8">
            <div class="form-group">
                <label>Cliente *</label>
                <select name="ven_idcliente" class="form-control selectpicker" data-live-search="true" required>
                  <option value="" hidden>--- Seleccione ---</option>
                  @foreach($clientes as $cli)
                    <option value="{{$cli->cli_id}}">{{$cli->cli_dni.' - '.$cli->cli_apellidos.', '.$cli->cli_nombres}}</option>
                  @endforeach
                </select>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="form-group">
                <label>Fecha *</label>
                <input type="date" name="ven_fecha" value="<?php echo date('Y-m-d'); ?>" class="form-control" required readonly>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="form-group">
                <label>Productos *</label>
                <select name="" id="cbxproductos" class="form-control selectpicker" data-live-search="true" required>
                  <option value="" hidden>--- Seleccione ---</option>
                  @foreach($productos as $prod)
                    <option value="{{$prod->prod_id}}_{{$prod->prod_precio}}_{{$prod->prod_stock}}">{{$prod->prod_nombre}}</option>
                  @endforeach
                </select>
            </div>
        </div>
        <div class="col-xl-2">
            <div class="form-group">
                <label>Cantidad *</label>
                <input type="number" class="form-control" id="prodcantidad">
            </div>
        </div>
        <div class="col-xl-2">
            <div class="form-group">
                <label>Stock *</label>
                <input type="number" class="form-control" id="prodstock" readonly>
            </div>
        </div>
        <div class="col-xl-2">
            <div class="form-group">
                <label>Precio Venta *</label>
                <input type="number" class="form-control" id="prodprecio" readonly>
            </div>
        </div>
        <div class="col-xl-2 align-self-center">
            <div class="form-group">
                <button type="button" class="btn btn-sm btn-primary" name="button" id="btnadd">Agregar</button>
            </div>
        </div>
        <table class="table" id="detalles">
          <thead>
            <th>Opciones</th>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>SubTotal</th>
          </thead>
          <tfoot>
            <th>TOTAL</th>
            <th></th>
            <th></th>
            <th></th>
            <th><h4 id="total">S/. 0.00</h4><input type="hidden" name="ven_total" id="total_venta"></th>
          </tfoot>
        </table>
        <div class="col-xl-12 my-4">
            <div class="form-group">
                <input type="submit" class="btn btn-primary" id="guardar" value="Rgistrar Venta">
                <a href="{{url('ventas')}}" class="btn btn-danger" id="cancelar">Cancelar</a>
            </div>
        </div>
    </div>
</form>
@endsection
@section('scripts')
<script>
  $(document).ready(function() {
    $('#btnadd').click(function() {
      agregar();
    });
  });

  var cont = 0;
  total = 0;
  subtotal = [];

  $("#guardar").hide();
  $("#cancelar").hide();

  $("#cbxproductos").change(mostrarvalores);

  function mostrarvalores() {
    datos = document.getElementById('cbxproductos').value.split('_');
    $("#prodprecio").val(datos[1]);
    $("#prodstock").val(datos[2]);
  }

  function agregar(){
    datos = document.getElementById('cbxproductos').value.split('_');
    idproducto = datos[0];
    producto = $("#cbxproductos option:selected").text();
    cantidad = $("#prodcantidad").val();
    precio = $("#prodprecio").val();
    stock = $("#prodstock").val();
    if(idproducto!="" && cantidad!="" && cantidad>0 && precio!=""){
      if(stock >= cantidad){
        subtotal[cont] = (cantidad * precio);
        total = total+subtotal[cont];
        var fila = '<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+
                    cont+');">X</button></td><td><input type="hidden" name="idproducto[]" value="'+
                    idproducto+'">'+producto+'</td><td><input type="number" class="form-control" name="cantidad[]" value="'+
                    cantidad+'"></td><td><input type="number" class="form-control" name="precio[]" value="'+
                    precio+'"></td><td><input type="text" class="form-control" readonly name="total[]" value="'+
                    subtotal[cont]+'"></td></tr>';
        cont++;
        limpiar();
        $('#total').html("S/. " + total);
        $('#total_venta').val(total);
        evaluar();
        $('#detalles').append(fila);
      }else{
        alert('La Cantidad a vender supera al stock');
      }
    }else{
      alert('Error al ingresar el producto');
    }

  }

  function limpiar() {
    $("#prodcantidad").val("");
    $("#prodprecio").val("");
    $("#prodstock").val("");
  }

  function evaluar(){
    if(total>0){
      $("#guardar").show();
      $("#cancelar").show();
    }else{
      $("#guardar").hide();
      $("#cancelar").hide();
    }
  }

  function eliminar(index) {
    total = total-subtotal[index];
    $("#total").html("S/. " + total);
    $("#total_venta").val(total);
    $("#fila" + index).remove();
    evaluar();
  }

</script>
@endsection
