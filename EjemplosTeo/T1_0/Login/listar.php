<?php
    require_once("./phtml/header.phtml");
    require_once("./phtml/menu.phtml");
    print "<p>Petición Formulario GET: ".$_GET["peticion"]."</p>";
    print "_REQUEST:";
    print_r ($GLOBALS[_REQUEST]);
    print "<p> Listado variables globales</p>";
    var_dump ($GLOBALS);
    require_once("./phtml/footer.phtml");
?>
