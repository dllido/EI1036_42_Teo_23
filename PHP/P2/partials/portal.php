<?php
    //view_form.php

/**
 * * Descripción: Controlador principal
 * *
 * * Descripción extensa: Iremos añadiendo cosas complejas en PHP.
 * *
 * * @author  Lola <dllido@uji.es> <fulanito@example.com>
 * * @copyright 2018 Lola
 * * @license http://www.fsf.org/licensing/licenses/gpl.txt GPL 2 or later
 * * @version 2

 * */

//echo $_SERVER['DOCUMENT_ROOT']."/partials/footer.php";
if (isset($_REQUEST['action'])) $action = $_REQUEST["action"];
else $action = "home";


switch ($action) {
    case "home":
        $nombre="";
        $descripcion="";
        $central = "/partials/home.php";
        break;
    case "registro":
        $nombre="";
        $descripcion="";
        $central = "/partials/centralForm.php";
        break;
    case "registrar":
            echo "Nombre:",$_REQUEST["nombre"];
            echo "Descripción:",$_REQUEST["descripcion"];
            $nombre=$_REQUEST["nombre"];
            $descripcion=$_REQUEST["descripcion"];
            $central = "/partials/centralForm.php";
            break;
    case "envioFichero":
        $nombrefichero=$_FILES["foto_cliente"]['name'];
        $destino=dirname(__FILE__)."/../img/ficherosClientes/";
        if (!move_uploaded_file($_FILES["foto_cliente"]['tmp_name'],$destino.$nombrefichero)) {
            $data["error"] ="Failed to create file: $nombrefichero";
            }
        else $data["error"] = "Fichero subido con éxito";
        $central = "/partials/defecto.php";
        break;
    case "listar":
        $central = "/partials/listar.php";
    default:
        $data["error"] = "Accion No permitida";
        $central = "/partials/defecto.php";
}


include(dirname(__FILE__)."/../partials/header.php");
include(dirname(__FILE__)."/../partials/menu.php");
include(dirname(__FILE__).$central);
var_dump($GLOBALS);
include(dirname(__FILE__)."/../partials/footer.php");
?>