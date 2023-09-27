<?php //control_form.php
  
  /**
   * * Descripción: Autentificar y crear sessión PHP
   * *
   * *
   * * @author  Lola <dllido@uji.es>
   * * @copyright 2017 Lola
   * * @license http://www.fsf.org/licensing/licenses/gpl.txt GPL 2 or later
   * * @version 1
   * */
	session_start();
	if ($_SESSION['activo']==1){
		 $data["error"]="Ya autentificado. Cierro sessión";
		session_destroy();
	}
	
    //Proceso autentificar e iniciar sessión.
	if ($_REQUEST['user']== "admin" && $_REQUEST['passwd']=="admin")
	
          {$_SESSION['activo']=1;
						$_SESSION['usuario']="admin";
						$_SESSION['rol']="gestor";
						$data["datos"]= '{usuario:"admininstrador"}';
					}
	else {
          $data["error"]="Usuario no autentificado";

      }
  
  echo json_encode($data);
  ?>
