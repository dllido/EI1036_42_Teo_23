<?php
print "<p>Cookies:</</p>";
var_dump($_COOKIE);
setcookie("TestCookieError", 'PruebaALXXXX');  /* expira en 10 segundos */
// Initialize the session.
// If you are using session_name("something"), don't forget it now!
print "<p>Cookies:</p>";
var_dump($_COOKIE);
?>