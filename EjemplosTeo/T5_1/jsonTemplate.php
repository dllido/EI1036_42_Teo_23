<?php
	
	require_once('../../../privHtml/db0.php');
  $pdo= new PDO ("mysql:host=$db_host;dbname=$db_name","$db_user","$db_pass");
	$action="listar";
	if (isset($_REQUEST['action']) ){
		$action=$_REQUEST["action"];}
		
		switch ($action) {
			case "listar":
				header('Content-type: application/json');
				$result= $pdo->prepare("SELECT * FROM usuarios  ");
				$result->execute();
				$datos= $result->fetchAll(PDO::FETCH_ASSOC);
				$salida=array(plantilla=>"listarTemplate.html","datos"=>$datos);
				$dat= json_encode($datos);
				$salida="{\"plantilla\":\"listarTemplate.html\",\"datos\":$dat}";
				echo $salida;
				break;
			default:
				
				require_once('listarTemplate.html');
		
	}

	
?>
