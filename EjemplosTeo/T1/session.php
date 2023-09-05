<?php
https://www.php.net/manual/es/book.session.php
//Start our session.
session_start();

$nombre= session_name();
var_dump($GLOBALS);
print ("<p>Session:$nombre</p>");
print_r($_SESSION);
echo $B;
print ("</br>Cookies</br>");
print_r($_COOKIE);

//Expire the session if user is inactive for x seconds

expireAfterSeconds = 15;

//Check to see if our "last action" session
//variable has been set.
if(isset($_SESSION['last_action'])){
    
    //Figure out how many seconds have passed
    //since the user was last active.
    $secondsInactive = time() - $_SESSION['last_action'];
    print "<h2>Bienvenido de nuevo usuario\n</H2>";
    //Check to see if they have been inactive for too long.
    if($secondsInactive >= $expireAfterSeconds){
        //User has been inactive for too long.
        //Kill their session.
        session_unset();
        session_destroy();
        print "<h2>Reactivamos tu sesión</H2>";
    }
    
}
else
    if (!isset($_SESSION["activo"])) {
        $_SESSION = array(); #inicializo la variable
        $_SESSION["activo"] = 1;
        print "<h2>Hola</h2>";
        $_SESSION["usuario"] = "visitante";
        print "<h2>Activamos Sesión\n</H2>";
    } 
    else {
       
        print "<h2>Bienvenido visitante\n</H2>";
    }
//Assign the current timestamp as the user's
//latest activity
$_SESSION['last_action'] = time();
print "<p>SessionF:</p>";
var_dump($_SESSION);