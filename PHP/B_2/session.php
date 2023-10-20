<?php

// server should keep session data for AT LEAST 1 hour
ini_set('session.gc_maxlifetime', 480);

// each client should remember their session id for EXACTLY 1 hour
session_set_cookie_params(480);



session_start();

if (!isset($_SESSION["activo"])) {
    $_SESSION["activo"] = 1;
    $_SESSION["visita"]=0;
    $_SESSION["visitado"]=[];

} else {
    #echo "<H2>bienvenido de nuevo </H2>";
    $_SESSION["visita"]=1+$_SESSION["visita"];
    $_SESSION["visitado"][]=$_SERVER['REQUEST_URI'];
    $now = time();
    if (isset($_SESSION['discard_after']) && $now > $_SESSION['discard_after']) {
        // this session has worn out its welcome; kill it and start a brand new one
        session_unset();
        session_destroy();
        session_start();
        #print("<h4>Has permanecido demasiado tiempo inactivo<h4>");
    }

    // either new or old, it should live at most for another hour
    $_SESSION['discard_after'] = $now + 300;
}
//Eliminar cuando funcione bien:
print_r($_SESSION)
?>