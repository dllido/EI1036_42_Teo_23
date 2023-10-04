<?php
// Initialize the session.
// If you are using session_name("something"), don't forget it now!
print "Cookies";
var_dump($_COOKIE);
print "Session";
var_dump($_SESSION);
session_start();
print("session_name:" . sessionName());
print "Cookies";
var_dump($_COOKIE);
var_dump($_SESSION);
var_dump($_GLOBALS);

if (!isset($_SESSION["activo"])) {
    $_SESSION = array();
    setcookie(session_name(), '', time() + 10);
    $_SESSION["activo"] = 1;
    print "<h2>Hola</h2>";
    $_SESSION["usuario"] = "visitante";
} else {
    if ($_SESSION['last_action'] < time() - 60 /* be a little tolerant here */) {
        session_destroy();
    } // destroy the session and quit

    print "<h2>bienvenido de nuevo visitante\n</H2>";
}
print "Session";
var_dump($_SESSION);
print "Cookies";
var_dump($_COOKIE);
?>