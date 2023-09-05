<?php
  $json ='[{"id_fruta":"1","nombre_fruta":"Manzana","cantidad":"5"},
    {"id_fruta":"2","nombre_fruta":"Platano","cantidad":"3"}]';
  $arrayF = json_decode($json);
  print_r($arrayF);
  //OBTENER UN DATO DIRECTAMENTE DEL ARRAY.
  print_r($arrayF[0]->nombre_fruta);
  //RECORRER Y RECUPERAR VALORES JSON CON FOREACH.
  foreach($arrayF as $obj){
    $id_fruta = $obj->id_fruta;
    $nombre_fruta = $obj->nombre_fruta;
    $cantidad = $obj->cantidad;
    echo "<br>\n".$id_fruta." ".$nombre_fruta." ".$cantidad;
  } 
    ?>
