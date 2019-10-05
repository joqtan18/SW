<?php 
$detalle = DB::table('detalleventas')
                ->join('productos','productos.prod_id','detalleventas.dv_idproducto')
                ->where('detalleventas.dv_idventa','=',$ven->ven_id)
                ->get();
?>
<div class="modal fade" id="modal-info-{{$ven->ven_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-tittle">Detalle de Venta</h5>
      </div>
      <div class="modal-body">
        <label for="" class="form-control">Cliente: {{$ven->cli_apellidos.', '.$ven->cli_nombres}}</label>
        <label for="" class="form-control">Fecha: {{$ven->ven_fecha}}</label>
        <table class="table table-bordered">
            <thead>
                <th>Producto</th>
                <th class="text-center">Cantidad</th>
                <th class="text-center">Precio</th>
                <th class="text-center">Total</th>
            </thead>
            <tbody>
                @foreach($detalle as $dt)
                    <tr>
                        <td>{{$dt->prod_nombre}}</td>
                        <td class="text-center">{{$dt->dv_cantidad}}</td>
                        <td class="text-center">S/. {{$dt->prod_precio}}</td>
                        <td class="text-center">S/. {{$dt->dv_total}}</td>
                    </tr>
                @endforeach
                    <tr>
                        <td colspan="3"></td>
                        <td class="text-center">S/. {{$ven->ven_total}}</td>
                    </tr>
            </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
