<?php //control_form.php

/**
 * * Descripción: Autentificar y crear sesión PHP
 * *
 * *
 * * @author  Lola <dllido@uji.es>
 * * @copyright 2017 Lola
 * * @license http://www.fsf.org/licensing/licenses/gpl.txt GPL 2 or later
 * * @version 1
 * */
session_start();
require_once(dirname(__FILE__) . "/partials/lib_utilidades.php");


switch ($_REQUEST["action"]) {
    case "login":
        $central = "/partials/form_login.php";
        if (isset($_SESSION["user_name"])) session_destroy();
        require_once(dirname(__FILE__).$central);
        break;
    case "auten":
         if (!autentificacion_ok(dirname(__FILE__) . "/recursos/seguro/users.csv", $_REQUEST["user"], $_REQUEST["passwd"])) {
            $central = "/partials/form_login.php";
            
            require_once(dirname(__FILE__).$central);
            echo " </br>login/passwd no correcto";

        } else {
            $rol = $_SESSION["user_role"];
            var_dump($_SESSION);
            
        }
        break;
    }


?>