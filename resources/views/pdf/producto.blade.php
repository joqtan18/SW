<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>lista de Productos </title>
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
		<H1 class="m-0 font-weight-bold text-primary" ><center>  LISTA DE PRODUCTOS</center> </H1>
		<table class="table table-hover table-bordered table-sm" id="dataTable" width="100%" cellspacing="0"  >
			<thead>
				<tr>
					<th>Codigo</th>
					<th>Nombre</th>
					<th>Precio</th>
					<th>Stock</th>		
				</tr>
			</thead>
			<tbody>
				@foreach($producto as $prod)
					<tr>
					<td>{{$prod->prod_id}}</td>
		            <td>{{$prod->prod_nombre}}</td>
		            <td>{{$prod->prod_precio}}</td>
		            <td>{{$prod->prod_stock}}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</body>
</html>