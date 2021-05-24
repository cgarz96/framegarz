<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
{{--var_dump($usuarios)--}}

	@foreach ($usuarios as $usuario)
	 {{$usuario->nombre}}
	@endforeach
</body>
</html>