<?php
$session_name("MiprimeraSesi");
session_start();
print "<p>Cookies:</p>";
print_r($_COOKIE);
print ("<p>Session:".session_name()."</p>");
print_r($_SESSION);
if (!isset($_SESSION["activo"])) {
    $_SESSION["activo"] = 1;
    print "<h2>Hola</h2>";
    $_SESSION["usuario"] = "visitante";
    setcookie(session_name(), '', time() + 10);
} else {
    if ($_SESSION['last_action'] < time() - 60 /* be a little tolerant here */) {
        session_destroy();}
    echo "<H2>bienvenido de nuevo ", $_SESSION["usuario"],"</H2>";
}
print "<p>SessionF:</p>";
print_r($_SESSION);
print_r($_COOKIE);
?>
