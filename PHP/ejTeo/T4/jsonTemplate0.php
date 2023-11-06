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
			echo json_encode($datos);
			break;
		default:
			require_once('listarTemplate.html');
	}
	?>
