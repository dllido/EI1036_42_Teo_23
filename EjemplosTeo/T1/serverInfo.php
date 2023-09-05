<?php

//session_start();
$uji="https://xmlrpc.uji.es/lsmSSO-83/lsmanage.php?";
$scr="http://".$_SERVER['HTTP_HOST'].$_SERVER['SCRIPT_NAME'];
$ret=urlencode("$scr?");
$da=unserialize(file_get_contents($uji,$url));
print_r($da);
print ("Primero debes &lt;a href=\"$uji?reto=$ret\">autenticarte en la UJI&lt;/a>");
if ($url=$_GET['reto_auth']) {
	        $da=unserialize(file_get_contents($uji,$url));
		   // $_SESSION['login']=$da['login'];
			        header("Location: $scr");
		    die();
		  }
/*    if (!$us=$_SESSION['login'])
	          die("Primero debes &lt;a href=\"$uji?reto=$ret\">autenticarte en la UJI&lt;/a>");
        echo "Has entrado como $us";
*/  

print_r ("GET");
print_r ($_GET);
print_r ("REQUEST1");
    
print_r ($_REQUEST);
    print_r ("GLOBALS");
print_r ($GLOBALS);
    print_r ("$_COOKIE");
print_r ($_COOKIE);
    print_r ("$_server");
print_r ($_SERVER);

?>
