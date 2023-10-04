<?php
$session_name("MiprimeraSesi");
session_start();
print "<p>Cookies:</p>";
var_dump($_COOKIE);
print ("<p>Session:".session_name()."</p>");
var_dump($_SESSION);
if (!isset($_SESSION["activo"])) {
    $_SESSION["activo"] = 1;
    print "<h2>Hola</h2>";
    $_SESSION["usuario"] = "visitante";
} else {
    echo "<H2>bienvenido de nuevo ", $_SESSION["usuario"],"</H2>";
}
print "<p>SessionF:</p>";
var_dump($_SESSION);
var_dump($_COOKIE);
?>