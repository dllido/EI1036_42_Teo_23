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

ini_set('display_errors', 1);
require_once(dirname(__FILE__) . "/session.php");
require_once(dirname(__FILE__) . "/partials/header1.php");
require_once(dirname(__FILE__) . "/partials/menu1.php");


require_once(dirname(__FILE__) . "/partials/lib_utilidades.php");


if (array_key_exists('action', $_REQUEST)) {
   $bus = $_SERVER["SERVER_NAME"];

   
   if (array_key_exists('HTTP_REFERER', $_SERVER) and (strpos($_SERVER['HTTP_REFERER'], $bus)<0)) {
      $error_msg = "Acceso directo no permitido";

      $action = "home";
   } else
     {
      $action = $_REQUEST["action"];}
} else {
   $action = "home";
}
$rol = autentificado();
switch ($action) {
   case "home":
      $central = "/partials/home.php";
      break;
   case "logear":
      $central = "/partials/form_login.php";
      break;
   case "log_out":
      unset($_SESSION);
      session_destroy();
      $rol = False;

      $central = "/partials/home.php";
      break;
   case "auten":
      if (!autentificacion_ok(dirname(__FILE__) . "/recursos/seguro/users.csv", $_REQUEST["user"], $_REQUEST["passwd"])) {
         $central = "/partials/form_login.php";
         $error_msg = "Error autentificación";
      } else {
         $rol = $_SESSION["user_role"];
         $central = "/partials/home.php";
      }
      break;
   case "form_register":
      if ($rol != "admin") {
         $error_msg = "No tienes permisos";
         $central = "/partials/home.php";
      } else
         $central = "/partials/form_cursos.php";
      break;

   case "registrar":

      $bus = "?action=form_register";
      if ($rol == "admin") {

         $filename = dirname(__FILE__) . "/recursos/cursos.json";
         $diccionario = carregar_dades($filename);
         if (!isset($_REQUEST["curso"])) {
            $error_msg = "Datos no validos";
            $central = "/partials/form_cursos.php";
         } else {
            # codi, descripció, nombre alumnes màxim, nombre places vacants i els seus preus
            $datos = ["desc", "num_max", "mat", "preu"];
            if (!isset($diccionario[$_REQUEST["curso"]])) {
               $diccionario[$_REQUEST["curso"]] = array();

            }
            foreach ($datos as $i) {
               $diccionario[$_REQUEST["curso"]][$i] = $_REQUEST[$i];
            }
            guarda_dades($diccionario, $filename);

            $central = "/partials/listar.php";
         }}
         else { $error_msg = "No tienes permisos";
            $central = "/partials/home.php";}
      


      break;
   case "borrar":
      if ($rol == "admin") {
         $filename = dirname(__FILE__) . "/recursos/cursos.json";
         $diccionario = carregar_dades($filename);
         if (!isset($_REQUEST["curso"])) {
            $error_msg = "No se ha podido realizar la acción";
            $central = "/partials/home.php";
         } else {
            unset($diccionario[$_REQUEST["curso"]]);
            guarda_dades($diccionario, $filename);
            $central = "/partials/listar.php";
         }
      } else {
         $error_msg = "No tienes permisos";
         $central = "/partials/home.php";
      }
      break;
   case "modify":
      if ($rol == "admin") {
         $filename = dirname(__FILE__) . "/recursos/cursos.json";
         $diccionario = carregar_dades($filename);
   
         $central = "/partials/modificar.php";
      } else {
         $error_msg = "No tienes permisos";
         $central = "/partials/home.php";
      }
         break;
   case "list":

      $filename = dirname(__FILE__) . "/recursos/cursos.json";
      $diccionario = carregar_dades($filename);

      $central = "/partials/listar.php";
      break;
   default:
      $error_msg = "Accion no permitida";
      $central = "/partials/home.php";
}

if ($rol)
   print('<div id="login"> Hola: ' . $_SESSION["user_name"] . '<a href="?action=log_out"> Salir </a></div>');
else
   print('<div id="login"> <a href="?action=logear"> Entrar </a></div>');

if (isset($error_msg))
   require_once(dirname(__FILE__) . "/partials/error.php");

require_once(dirname(__FILE__) . $central);
require_once(dirname(__FILE__) . "/partials/footer.php");
?>