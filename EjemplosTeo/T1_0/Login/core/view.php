<?php
function retornarVista($central, $data=array()) {
  require_once("./phtml/header.phtml");
  require_once("./phtml/menu.phtml");
  if (count($data['error'])>1){require_once("./phtml/error.phtml");}
  require_once($central);
  require_once("./phtml/footer.phtml");
	
}
?>

