@extends('plantilla.plantilla')
@section('contenido')
<div class="mb-4">
    <h1>Modificar Producto</h1>
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
<form action="{{url('producto/'.$producto->prod_id)}}" method="POST" class="my-3">
    @method('PATCH')
    {{ csrf_field() }}
    <div class="row">
    <div class="form-group col-md-3">
        <label for="">Categoria *</label>
        <select name="cat_id" id="" class="form-control">
            @foreach ($categorias as $cat)
                @if ($cat->cat_id == $producto->cat_id)
                <option value="{{$cat->cat_id}}" selected>{{$cat->cat_nombre}}</option> 
                @endif
            @endforeach
        </select>
        </div>
        <div class="col-xl-5 col-md-6">
            <div class="form-group">
                <label for="">Nombre *</label>
                <input type="text" name="prod_nombre" class="form-control" maxlength="50" pattern="[A-Za-z A-Za-z]+" readonly value="{{$producto->prod_nombre}}">
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="form-group">
                <label for="">Abreviatura del Producto *</label>
                <input type="text" name="prod_slug" class="form-control" pattern="[a-z]+" readonly title="Ingresar todo en minuscula y junto.   e.j: galletaoreo" maxlength="50" value="{{$producto->prod_slug}}">
            </div>
        </div>
        <div class="col-xl-5 col-md-6">
            <div class="form-group">
                <label for="">Descripcion *</label>
                <input type="text" name="prod_descripcion" class="form-control" maxlength="50" onkeypress="return letrasynumeros(event)" onKeyUp="pierdeFoco(this)"  required value="{{$producto->prod_descripcion}}">
            </div>
        </div>
        <div class="col-xl-5 col-md-6">
            <div class="form-group">
                <label for="">Descripcion Corta del Producto *</label>
                <input type="text" name="prod_extract" class="form-control" maxlength="50" onkeypress="return letrasynumeros(event)" onKeyUp="pierdeFoco(this)" required value="{{$producto->prod_extract}}">
            </div>
        </div>
        <div class="col-xl-2 col-md-3">
            <div class="form-group">
                <label for="">Precio *</label>
                <input type="text" name="prod_precio" id="precio" class="form-control" onkeypress="return solonumeros(event)"  maxlength="9" required value="{{$producto->prod_precio}}" >
            </div>
        </div>
        <div class="col-xl-5 col-md-6">
            <div class="form-group">
                <label for="">Imagen *</label>
                <input type="url" name="prod_imagen" class="form-control" maxlength="2000" readonly value="{{$producto->prod_imagen}}">
            </div>
        </div>
        <div class="col-xl-2 col-md-3">
            <div class="form-group">
                <label for="">Stock *</label>
                <input type="text" name="prod_stock" id="stock" class="form-control" maxlength="4" onKeyPress="return soloNumeros(event)" onKeyUp="pierdeFoco(this)" required value="{{$producto->prod_stock}}" >
            </div>
        </div>
        <div class="col-xl-12 my-4">
            <div class="form-group">
                <input type="submit" value="Modificar" class="btn btn-warning">
                <a href="{{url('producto')}}" class="btn btn-danger">Cancelar</a>
            </div>
        </div>
    </div>
</form>
<script >
    function el(el) {
  return document.getElementById(el);
}

el('precio').addEventListener('input',function() {
  var val = this.value;
  this.value = val.replace(/\-/,'');
}); 
    function el(el) {
  return document.getElementById(el);
}

el('stock').addEventListener('input',function() {
  var val = this.value;
  this.value = val.replace(/\D|\-/,'');
}); 

///////////////////
    function letrasynumeros(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " áéíóúabcdefghijklmnñopqrstuvwxyz0123456789";
       especiales = "8-37-39-46";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }
////////////////////////
    function solonumeros(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = "0123456789.";
       especiales = "8-37-39-46";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }
////////////////////
function soloNumeros(e) {
   var key = window.Event ? e.which : e.keyCode;
   return ((key >= 48 && key <= 57) ||(key==8))
 }
 
 function pierdeFoco(e){
    var valor = e.value.replace(/^0*/, '');
    e.value = valor;
 }
</script>
@endsection
