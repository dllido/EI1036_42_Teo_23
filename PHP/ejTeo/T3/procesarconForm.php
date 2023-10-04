<!DOCTYPE html>
<html>
<!--**
 * * Descripción: Procesa formulario 0
 * *
 * * 
 * * @author  Lola <dllido@uji.es>
 * * @version 1
 * *  * * -->
<head>
	<meta charset="UTF-8">
	<title>Bienvenido </title>
	<META name="Author" content="dllido">
</head>


<body>
<form action="?" method=”GET”>
		<label> Configuración</label>
		<input TYPE="radio" NAME="conf" VALUE="S" CHECKED>Si
		<input TYPE="radio" NAME="conf" VALUE="N">No
<p>
		<input type=”submit” value="Enviar">
  </form>
  <p>
<?php
print "Adivina adivinanza<br\>\n";	

if (isset($_REQUEST["conf"])) 
  {$conf= $_REQUEST["conf"];
  if ($conf=="S") print "<p>\nBien , has ganado<p>";
  else print "<p>\n Continua intentandolo<p>";

  }


var_dump($_REQUEST);
?>
</body>
</html>
