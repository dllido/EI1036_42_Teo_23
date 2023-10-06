<?php
// server should keep session data for AT LEAST 1 hour
ini_set('session.gc_maxlifetime', 480);

// each client should remember their session id for EXACTLY 1 hour
session_set_cookie_params(80);


//Mostrar posibles errores 
ini_set('display_errors', 1);
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
    $now = time();
    if (isset($_SESSION['discard_after']) && $now > $_SESSION['discard_after']) {
        // this session has worn out its welcome; kill it and start a brand new one
        session_unset();
        session_destroy();
        session_start();
        print("<h4>Has permanecido demasiado tiempo inactivo<h4>");
    }

    // either new or old, it should live at most for another hour
    $_SESSION['discard_after'] = $now + 30;
}
print "<p>Final:</p>";
print "<p>Cookies:</p>";
print_r($_COOKIE);
print "<p>Session:".session_name()."</p>";
print_r($_SESSION);
?>