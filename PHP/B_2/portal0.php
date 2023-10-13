<?php
/**
 * * Descripción: Controlador principal
 * *
 * * Descripción extensa: Iremos añadiendo cosas complejas en PHP.
 * *
 * * @author  Lola <dllido@uji.es> <fulanito@example.com>
 * * @copyright 2018 Lola
 * * @license http://www.fsf.org/licensing/licenses/gpl.txt GPL 2 or later
 * * @version 2
 * * Si la URL tiene este esquema http://xxxx/portal0?action=fregistro
 * * mostrara el formulario de registro. Si no hay nada la página principal.
 **/


    $action = (array_key_exists('action', $_REQUEST)) ? $_REQUEST["action"] : "home";


    switch ($action) {
        case "home":
            $central = "/partials/home.php";
            break;
        case "form_register":
            $central = "/partials/form_register.php";
            break;
        default:
            $central = "/partials/error.php";
    }

    require_once(dirname(__FILE__)."/partials/header.php");
    require_once(dirname(__FILE__)."/partials/menu.php");
    require_once(dirname(__FILE__).$central);
    echo "<br />",$action,"<br />",dirname(__FILE__),"<br />";
    require_once(dirname(__FILE__)."/partials/footer.php");
?>