<?php

session_start();
print "<h1>Inicio Sesión:</h1>";
print "<p>Cookies:</p>";
print_r($_COOKIE);
print "<p>Session:".session_name()."</p>";
print_r($_SESSION);
if (!isset($_SESSION["activo"])) {
    $_SESSION["activo"] = 1;
    print "<h2>Hola</h2>";
    $_SESSION["usuario"] = "visitante";
    $_SESSION["visita"]=0;
} else {
    echo "<H2>bienvenido de nuevo ", $_SESSION["usuario"],"</H2>";
    $_SESSION["visita"]=1+$_SESSION["visita"];
}
print "<p>Final:</p>";
print "<p>Cookies:</p>";
print_r($_COOKIE);
print "<p>Session:".session_name()."</p>";
print_r($_SESSION);
?>