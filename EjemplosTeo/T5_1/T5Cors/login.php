<?php
header('Access-Control-Allow-Origin: *'); 
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
						<script type="text/javascript" src="login.js" async defer ></script>
			</head>
<body>
	<div id="error">
		<h1>¿Se han producido errores?  </h1>
		<h2 id="errores"> </h2>
	</div>
	<ul>
		<li>
			<a href="?">Home</a>
		</li>
		<li>
			<a href="?peticion=blog">Blog</a>
		</li>
		<li>
			<a href="?peticion=tienda">Tiendas</a>
		</li>
		<li>
			<a href="?modulo=user&peticion=leer">Sobre nosotros</a>
		</li>
		<li>
			<a href="?peticion=form_opi">Opina</a>
		</li>
	</ul>

<ul id="todoItems">
</ul>
	<div id="central">
<h1>Entrar</h1>

<form method="post" id="form_log" action="login.php">
	<p>
	<label for="Nombre">login: </label>
	<input
		type="text"
		name="user"
		placeholder="Maria"
		pattern="[a-zA-Z]{3,15}"
		title="Sólo letras"
		required >
		</p><p>
		
			<label for="Contraseña:">Contraseña: </label>
			<input
				type=""password""
				name="passwd"
				>
			</p><p>
			<input name="Enviar"
				type="submit"
			>
	</form>
</div>
</body>
</html>
