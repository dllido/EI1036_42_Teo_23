<?php

include($_SERVER['DOCUMENT_ROOT']."/wp-config.php");
header('Content-type: application/json');
try{
$pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);

$result = $pdo->prepare("SELECT * FROM A_GrupoCliente");
$result->execute();
$datos = $result->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($datos);
}
catch (Exception $e) {
   echo 'Excepción capturada: ',  $e->getMessage(), "\n";
   echo $_SERVER['DOCUMENT_ROOT']."/wp-config.php";
   echo "error";
}
?>
