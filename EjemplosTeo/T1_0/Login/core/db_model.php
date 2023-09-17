<?php
  
  class DBModel {
    
     private static $db_host = 'localhost';
     private static $db_user = 'xxxx';
     private static $db_pass = 'xxxx';
     private static $db_name = 'xxxx';

    public $query;
    private $rows = array();
    protected $conn;
    public $mensaje = '';
    
   /* # métodos abstractos para crud(create,read,update,delete) que eredaran las clases
    abstract protected function create();
    abstract protected function read();
    abstract protected function update($datos);
    abstract protected function delete();
    abstract protected function readAll();
    */
    # los siguientesbase de datos
    private function open_connection() {
      try{
        require_once($_SERVER['DOCUMENT_ROOT']."/../privHtml/db.php");
        //new PDO ("mysql:host=slef::$db_host;dbname=$db_name","$db_user","$db_pass");
        $this->conn= new PDO( "mysql:host=".self::$db_host.";dbname=".self::$db_name,self::$db_user, self::$db_pass );
      }catch(PDOExeption $e){
        die($e->getMessage());
      }
    }
    # Desconectar la base de datos
    private function close_connection() {
      unset ($this->conn);
      
    }
    # Ejecutar un query simple del tipo INSERT, DELETE, UPDATE
   function execute_single_query() {
      try{
        $this->open_connection();
        $this->conn->exec($this->query);
        $this->close_connection();
      } catch(PDOExeption $e){
        $this->mensaje =getMessage();}
    }
    # Traer resultados de una consulta en un Array
     function get_results_from_query($data_db=array()) {
      $this->open_connection();
      #echo $this->query,$data;
      try{
        $consult=$this->conn->prepare($this->query);
        $consult->execute($data_db);
        var_dump($consult);
        var_dump($data_db);
        
        $this->rows=$consult->fetchAll(PDO::FETCH_ASSOC);
      }catch(PDOExeption $e){
        echo $e->getMessage();
        die($e->getMessage());
      }
      $this->close_connection();
      return  $this->rows;
    }
  }
  
  
  
  ?>
