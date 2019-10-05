@extends('plantilla.plantilla')
@section('contenido')
<div class="mb-4">
    <h1>Registrar Producto</h1>
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
<form action="{{url('producto')}}" method="POST" class="my-3">
    @method('POST')
    {{ csrf_field() }}
    <div class="row">
    <div class="form-group col-md-3">
        <label for="">Categoria *</label>
        <select name="cat_id" id="" class="form-control">
            <option value="" hidden>----Seleccione----</option>
            @foreach($categorias as $cat)
             <option value="{{$cat->cat_id}}">{{$cat->cat_nombre}}</option>
            @endforeach
           </select>
        </div>
        <div class="col-xl-5 col-md-6">
            <div class="form-group">
                <label for="">Nombre *</label>
                <input type="text" name="prod_nombre" class="form-control" maxlength="50" pattern="[A-Za-z A-Za-z]+" onkeypress="return soloLetras(event)"  required value="{{old('prod_nombre')}}">
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="form-group">
                <label for="">Abreviatura del Producto *</label>
                <input type="text" name="prod_slug" class="form-control" maxlength="50" pattern="[a-z]+" onkeypress="return soloLetras(event)" title="Ingresar todo en minuscula y junto.   e.j: galletaoreo" required value="{{old('prod_nombre')}}">
            </div>
        </div>
        <div class="col-xl-5 col-md-6">
            <div class="form-group">
                <label for="">Descripcion *</label>
                <input type="text" name="prod_descripcion" class="form-control" onkeypress="return letrasynumeros(event)" maxlength="50" onKeyUp="pierdeFoco(this)" required value="{{old('prod_nombre')}}">
            </div>
        </div>
        <div class="col-xl-5 col-md-6">
            <div class="form-group">
                <label for="">Descripcion Corta del Producto *</label>
                <input type="text" name="prod_extract" class="form-control" maxlength="50" pattern="[A-Za-z A-Za-z]+" onkeypress="return letrasynumeros(event)" onKeyUp="pierdeFoco(this)" required value="{{old('prod_nombre')}}">
            </div>
        </div>
        <div class="col-xl-2 col-md-3">
            <div class="form-group">
                <label for="">Precio *</label>
                <input type="text" name="prod_precio" id="precio" class="form-control"  maxlength="9" onkeypress="return solonumeros(event)" required value="{{old('prod_precio')}}" >
            </div>
        </div>
        <div class="col-xl-5 col-md-6">
            <div class="form-group">
                <label for="">Imagen *</label>
                <input type="URL" name="prod_imagen" class="form-control" maxlength="2000" onKeyUp="pierdeFoco(this)" required value="{{old('prod_imagen')}}">
            </div>
        </div>
        <div class="col-xl-2 col-md-3">
            <div class="form-group">
                <label for="">Stock *</label>
                <input type="text" name="prod_stock" id="stock" class="form-control" maxlength="4" onKeyPress="return soloNumeros(event)" onKeyUp="pierdeFoco(this)" required value="{{old('prod_stock')}}" >
            </div>
        </div>
        <div class="col-xl-12 my-4">
            <div class="form-group">
                <input type="submit" value="Registrar" class="btn btn-primary">
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
///////////////////////////////////////////////////////
    function el(el) {
  return document.getElementById(el);
}

el('stock').addEventListener('input',function() {
  var val = this.value;
  this.value = val.replace(/\D|\-/,'');
}); 
//////////////////////////////////////////////////////
function el(el) {
  return document.getElementById(el);
}
//////////////////////////////////////////////////////
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
//////////////////////////////////////////////////////
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
/////////////////////////////////////////////////////
    function soloLetras(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
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
//////////////////////////////////////////////////////
function limpia() {
    var val = document.getElementById("borrado").value;
    var tam = val.length;
    for(i = 0; i < tam; i++) {
        if(!isNaN(val[i]))
            document.getElementById("borrado").value = '';
    }
}

//////////////////////////////////////////////////////
function soloNumeros(e) {
   var key = window.Event ? e.which : e.keyCode;
   return ((key >= 48 && key <= 57) ||(key==8))
 }
 
 function pierdeFoco(e){
    var valor = e.value.replace(/^0*/, '');
    e.value = valor;
 }
 ////////////////////////////////////////////////////
</script>



@endsection
