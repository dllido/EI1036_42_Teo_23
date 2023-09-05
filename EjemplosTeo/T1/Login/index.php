<?php //control_form.php
  
  /**
   * * Descripción: Programa Aprender PHP
   * *
   * * Descripción extensa: Iremos añadiendo cosas complejas en PHP.
   * *
   * * @author  Lola <dllido@uji.es>
   * * @copyright 2017 Lola
   * * @license http://www.fsf.org/licensing/licenses/gpl.txt GPL 2 or later
   * * @version 1
   * * @link http://dllido.al.nisu.org/P0/holaMundo.php
   * */
  require_once('./core/db_model.php');
  require_once('./core/view.php');
  $central="./phtml/main.phtml";
  $action=="";
  $data=array();
  $BaseDatos=new DBModel();
  session_start();
  
  
  //Si no hay acción se muestra página principal.
  if (isset($_REQUEST['action']) ){
    $action=$_REQUEST['action'];
    //Autorización
    //Excepto para página principal y las acciones  login y loguear  vamos a solicitar autorización y mostrar  la página de solicitud de login.
    if (isset($_SESSION['activo']) && $_SESSION['activo']==1 )
      {
      //Proceso autentificar
      
      switch ($action) {
          
        case "listar":
          $BaseDatos->query = "
          SELECT      *
          FROM        users
          ";
          
          
          $result=$BaseDatos->get_results_from_query();
          echo("resultados listado:");
          var_dump($result);
          break;
        case "salir":
          session_destroy ();
          $data["error"]="Fin Sessión";
          break;
        default:
          $data["error"]="Acción no permitida: $action usuario autentificado";
          
          
      }}
    
    
    
    //Proceso autentificar e iniciar sessión.
    else{
      switch ($action) {
        case "login":
          $central= "./phtml/formLogin.phtml";
          break;
        case "loguear":
          
          $BaseDatos->query = "
          SELECT      nombre,apellido,clave
          FROM        users
          WHERE       nombre = ? and clave=?
          ";
          
          
          $result=$BaseDatos->get_results_from_query(array($_REQUEST['user'],$_REQUEST['passwd']));
          if (count($result)==1) {$_SESSION['activo']=1;$_SESSION['usuario']="Sr./Sra ".$result[0]['nombre']."  ".$result[0]['apellido']; $data["error"]="Session iniciada ".$_SESSION['usuario'];}
          else{$data['error']= 'usuario no valido'; $central= "./phtml/formLogin.phtml";}
          
          break;
          
        default:
          $data["error"]="Modulo no permitido $action y usuario no autentificado";
          
          
      }}}
  
  var_dump($data);
  retornarVista($central,$data);
  ?>
