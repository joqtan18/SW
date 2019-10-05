<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>lista de  Ventas</title>
	<meta name="viewport" content="">
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">



</head>
<body>
	<div class="header-wrapper">
      <div >
        <img src="{{asset('img/logo.jpg')}}">
      </div>
    </div>
	<div >
		<H1 class="m-0 font-weight-bold text-primary" ><center>  LISTA DE VENTAS </center> </H1>
		<table class="table table-hover table-bordered table-sm" id="dataTable" width="100%" cellspacing="0"  >
			<thead>
				<tr>
					<th >Codigo de Cliente</th>
					<th>Total de Pago</th>
					<th>Fecha </th>	
				</tr>
			</thead>
			<tbody>
				@foreach($venta as $ven)
					<tr>
					<td>{{$ven->ven_idcliente}}</td>
		            <td>S/. {{$ven->ven_total}}</td>
		            <td>{{$ven->ven_fecha}}</td>
					</tr>
				@endforeach				
			</tbody>
		</table>
	</div>
</body>
</html>