<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>lista de clientes </title>
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
		<H1 class="m-0 font-weight-bold text-primary" ><center>  LISTA DE CLIENTES</center> </H1>
		<table class="table table-hover table-bordered table-sm" id="dataTable" width="100%" cellspacing="0"  >
			<thead>
				<tr>
					<th >DNI</th>
					<th>Apellidos</th>
					<th>Nombres</th>
					<th>Email</th>		
				</tr>
			</thead>
			<tbody>
				@foreach($cliente as $cli)
					<tr>
					<td>{{$cli->cli_dni}}</td>
		            <td>{{$cli->cli_apellidos}}</td>
		            <td>{{$cli->cli_nombres}}</td>
		            <td>{{$cli->cli_email}}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</body>
</html>