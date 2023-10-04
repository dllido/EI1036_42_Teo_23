<?php
#https://www.php.net/manual/es/function.setcookie.php
setcookie("TestCookie0", 'PruebaALXXXX', time()+10);  /* expira en 10 segundos */
setcookie("TestCookieEterna", 'Prueba');  /* expira en 10 segundos */
print "<p>Cookies:</p>";
print_r($_COOKIE);
?>