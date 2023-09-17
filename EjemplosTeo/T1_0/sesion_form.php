<?php
session_start();
var_dump($_SESSION);
if (!isset($_SESSION["activo"]) )
{
	$_SESSION["cont"]=0;
	$_SESSION["nombre"]=$_REQUEST["nombre"];
	$_SESSION["activo"];}
else {
	$_SESSION["cont"]=$_SESSION["cont"];
	
}

?>
<!DOCTYPE html>
<!--**
 * * Descripci�n: Cabecera portal Programa Aprender PHP
 * *
 * * Descripci�n extensa: Pagina web dividida en 4 ficheros.
 * *
 * * @author  Lola <dllido@uji.es>
 * * @version 1
 * * @link http://dllido@al.nisu.org/P0/holaMundo.php
 * * -->
<html>
<head>
	<meta charset="UTF-8">
	<title>Bienvenido a la web de ACCE</title>
    <META name="Author" content="AlumnoXXX">
	<link rel="stylesheet" href="./css/estilo.css" type="text/css">
</head>

	
	<body>
			<header>
				<img src="./img/Logo-ACCE.gif" id="logo" alt="logo"/>
				<p id="eslogan">Asociaci�n de Consumidores de Comercio Electr�nico</p>
			</header>
	
	


			<nav>
				<ul>
					<li>
						<a href="controlForm.php">Home</a>
					</li>
					<li>
						<a href="?registrar.html">Registrar</a>
					</li>
					<li>
						<a href="?peticion=autentificar">SORPRESA!!!</a>
					</li>
					<li>
						<a href="listar.php?peticion=listar">Listar</a>
					</li>
					<li>
						<a href="holaMundo.php">HolaMundo</a>
					</li>
				</ul>
			</nav>

<main>

<h1>Gestion de Usuarios </h1>
 <form class="fom_usuario" action="controlForm.php" method="POST">
   <fieldset>
  <legend>Datos b�sicos</legend>
  <label for="nombre">Nombre</label> <br/>
  <input type="text" name="nombre" class="item_requerid" size="20" maxlength="25" value="<?php $_SESSION["nombre"] ?>" placeholder="Miguel" />
  <br/>
  <label for="apellidos">Apellidos</label> <br/>
  <input type="text" name="apellido" class="item_requerid" size="20" maxlength="25"  value="<?php $_SESSION["cont"] ?>" placeholder="Cervantes" /> <br/>
  </fieldset>
  <input type="submit" value="Enviar">
  <input type="reset" value="Deshacer">       
 </form>
 </main>

			<footer>
                <img src="https://licensebuttons.net/l/by-sa/3.0/88x31.png" height="31px"/>
                <time datetime="2018-09-18">2018</time>.</p>
                <address>
             	 <p class= "izq"> Written by <a href="mailto:webmaster@example.com" rev="author">Jon Doe</a>.</p>
                 <p class= "der"> Visit us at:Box 564, Disneyland, USA </p>
				</address> 
			</footer>
	</body>
</html>
