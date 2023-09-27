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
<p>
<?php
print "Adivina adivinanza<br>\n";	
if ($_REQUEST) $conf= $_REQUEST["conf"];
else {
   $A=stream_get_contents(STDIN);
   $conf=$A;
  }
print_r ("<br>\n".$conf);
if ($conf=="S") print "<br>\nBien , has ganado";
else print "<br>\n Continua intentandolo";

var_dump($_REQUEST)

?>
</body>
</html>