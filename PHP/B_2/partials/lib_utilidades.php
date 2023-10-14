<?php

/**
 * * Descripción: Utilidades para portal.php
 * *
 * * Descripción extensa: Iremos añadiendo funciones que se requieran para usar en el controlador.
 * *
 * * @author  Lola <dllido@uji.es> 
 * * @copyright 2023 Lola
 * * @license http://www.fsf.org/licensing/licenses/gpl.txt GPL 2 or later
 * * @version 1
 * * 
 **/

#ini_set('display_errors', 1);

function importar_dades_csv($nomFitxer)
{
   $fichero = fopen($nomFitxer, 'r');
   $diccionario = array();

   $keys = fgetcsv($fichero);

   while ($fila = fgetcsv($fichero)) {
      $product = array();
      for ($i = 1; $i < count($fila); $i++) {
         $product[$keys[$i]] = $fila[$i];
      }
      $diccionario[$fila[0]] = $product;
   }
   return $diccionario;
}

function importar_dades0($nomFitxer)
{
   $fichero = fopen($nomFitxer, 'r');
   $diccionario = array();
   $keys = fgetcsv($fichero);
   while ($fila = fgetcsv($fichero)) {
      if (!isset($diccionario[$fila[0]])) {
         $diccionario[$fila[0]] = array();
      }
      $product = array();
      for ($i = 1; $i < count($fila); $i++) {
         $product[$keys[$i]] = $fila[$i];
      }
      $diccionario[$fila[0]][] = $product;
   }
   return $diccionario;
}


function guarda_dades($diccionario, $filename)
{
   file_put_contents($filename, json_encode($diccionario));
}

function carregar_dades($nomFitxer)
{
   if (file_exists($nomFitxer)) {
      $json = file_get_contents($nomFitxer);
      $json_data = json_Decode($json, true);
   } else
      $json_data = array();
   return $json_data;
}

function autentificacion_ok($nomFitxer, $user, $passwd)
{ /* que carregue el fitxer users.csv  i comprove que existeix una fila amb $_REQUEST[“user”=user_id  y $_REQUEST[ “passwd”]
  */

   $dic = importar_dades_csv($nomFitxer);
   if (isset($dic[$user]) and $dic[$user]["user_passwd"] == $passwd) {
      $_SESSION["user"] = $user;
      $_SESSION["user_name"] = $dic[$user]["user_name"];
      $_SESSION["user_role"] = $dic[$user]["user_role"];
      return true;
   }
   return False;
}
function autentificado()
{
   if (isset($_SESSION["user_role"]))
      return $_SESSION["user_role"];
   return False;
}
/*
$nomFitxer = '../recursos/seguro/users.csv';
$dic = importar_dades0($nomFitxer);
print(autentificacion_ok($nomFitxer, "admin1", "admin1"));
print_r($_SESSION);
print(autentificado());
guarda_dades($dic, "fitxer.json");
$dic = carregar_dades("fitxer.json");
print_r($dic);
*/
?>