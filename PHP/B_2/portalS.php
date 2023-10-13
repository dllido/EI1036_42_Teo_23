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

require_once(dirname(__FILE__) . "/session.php");
require_once(dirname(__FILE__) . "/partials/header1.php");
require_once(dirname(__FILE__) . "/partials/menu1.php");


require_once(dirname(__FILE__) . "/partials/lib_utilidades.php");

$action = (array_key_exists('action', $_REQUEST)) ? $_REQUEST["action"] : "home";
$rol = autentificado();

if (isset($_REQUEST["proceso"]))
{switch ($_REQUEST["proceso"]){
   case "logear":
      $central = "/partials/login_form.php";
      break;
   case "auten":
      if (autentificacion_ok("../recursos/seguro/users.csv", $_REQUEST($user), $_REQUEST($passwd)))

         print('<div id="login"> Hola: $Session["user name"]<a="?proceso=log_out"> Salir </a></div>');
      else
         $central = "/partials/login_form.php";
      $error_msg = "Error autentificación";

      break;
}}

switch ($action) {
   case "home":
      $central = "/partials/home.php";
      break;
   case "logear":
         $central = "/partials/login_form.php";
         break;
   case "log_out":
      unset($_SESSION);
      $_SESSION=array();
      $central = "/partials/home.php";
   case "auten":
         print_r($_REQUEST);
         print_r("333");
         echo dirname(__FILE__)."/recursos/seguro/users.csv"  ;
         print $_REQUEST("user");
         print  $_REQUEST("passwd");
         if (autentificacion_ok(dirname(__FILE__)."/recursos/seguro/users.csv", $_REQUEST("user"), $_REQUEST("passwd")))
            print('<div id="login"> Hola: '.$_SESSION["user name"].'<a="?proceso=log_out"> Salir </a></div>');
         else
            $central = "/partials/login_form.php";
         $error_msg = "Error autentificación";
   
         break;
   case "form_register":
      $central = "/partials/form_cursos.php";
      break;

   case "registrar":

      $bus = "?action=form_register";

      $rol = autentificado();
      if ($rol == "admin") {
         if ((substr($_SERVER['HTTP_REFERER'], -1 * strlen($bus))) != $bus) {
            $error_msg = "Acceso directo no permitido";
            $central = "/partials/form_register.php";
         } else {

            $filename = dirname(__FILE__) . "/recursos/cursos.json";
            $diccionario = carregar_dades($filename);
            print_r($_REQUEST);
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
               var_dump($diccionario);
               $central = "/partials/listar.php";
            }
         }
      } else {
         $error_msg = "No tienes permisos";
         $central = "/partials/error.php";
      }

      break;
   case "listar":

      $filename = dirname(__FILE__) . "/recursos/cursos.json";
      $diccionario = carregar_dades($filename);
      var_dump($diccionario);
      $central = "/partials/listar.php";
      break;
   default:
      $error_msg = "Accion no permitida";
      $central = "/partials/error.php";
}

if ($rol)
   print('<div id="login"> Hola: $Session["user name"]<a href="?action=log_out"> Salir </a></div>');
else
   print('<div id="login"> <a href="?action=logear"> Entrar </a></div>');

if (isset($error_msg))
   require_once(dirname(__FILE__) . "/partials/error.php");

require_once(dirname(__FILE__) . $central);
require_once(dirname(__FILE__) . "/partials/footer.php");





?>