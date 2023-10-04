<?php
session_start();
print "<p>Cookies:</p>";
var_dump($_COOKIE);
$sn=session_name()
print("<p>Session: $sn </p>");
var_dump($_SESSION);
if (!isset($_SESSION["activo"])) {
    $_SESSION = array();
    $_SESSION["activo"] = 1;
    print "<h2>Hola</h2>";
    $_SESSION["usuario"] = "visitante";
} else {
    echo "<H2>bienvenido de nuevo ", $_SESSION["usuario"], "</H2>";
}
print "<p>SessionF:</p>";
var_dump($_SESSION);
?>