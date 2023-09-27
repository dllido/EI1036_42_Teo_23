<?php
#include(dirname(__FILE__)."/../../../wp-config.php");

/** The name of the database */
define('DB_NAME', 'ei1036_42');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', '127.0.0.1:3306' );

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

function crearTablaActividades($pdo,$table)
{
   try {
      //Crea tabla si no existe
      $query = "CREATE TABLE IF NOT EXISTS  $table (
               actividad_id SERIAL PRIMARY KEY, 
               nombre CHAR(50) NOT NULL,
               descripcion CHAR(250) NOT NULL, 
               localizacion CHAR(50) NOT NULL,
               fecha DATE NOT NULL,
               hora TIME NOT NULL,
               foto_file VARCHAR(135),
               usuario CHAR(40) NOT NULL);";

      $pdo->exec($query);
   } catch (PDOException $e) {
      echo "Failed to get DB handle: " . $e->getMessage() . "\n";
      exit;
   }
}

function consultar($pdo,$table) {
   $query = "SELECT     * FROM       $table "; 
   $consult = $pdo->prepare($query);
   $a=$consult->execute(array());
   if (1>$a)echo "InCorrectoConsulta";
   return ($consult->fetchAll(PDO::FETCH_ASSOC)); 
 
}

function anyadir($pdo,$table)
{
   try {
      $valores=["actividad1","Largo actividad1"];
      $query = "INSERT INTO    $table (nombre,descripcion) VALUES (?,?)";
      $consult = $pdo->prepare($query);
      $a=$consult->execute($valores); 
      if (1>$a)echo "InCorrecto";
      $datos=consultar($pdo,$table);
      print_r($datos);
      }
      catch (PDOException $e) {
          echo "Failed to get DB handle: " . $e->getMessage() . "\n";
          exit;
        }
}

function listar($pdo,$table)
{
    
    $rows=consultar($pdo,$table);
    if (is_array($rows)) {
        /* Creamos un listado como una tabla HTML*/
        print '<table><thead>';
        foreach ( array_keys($rows[0])as $key) {
            echo "<th>", $key,"</th>";
        }
        print "</thead>";
        foreach ($rows as $row) {
            print "<tr>";
            foreach ($row as $key => $val) {
                echo "<td>", $val, "</td>";
            }
            echo '<td><a href="?action=modificar&id=', $row["id"],'"><button class="button">Modificar</button></a><br/>';
            echo '<a href="?action=borrar&id=', $row["id"],'"><button class="button borrar">Borrar</button></a></td>';
            print "</tr>";
        }
        print "</table>";
    }
}

/* Consultas 
 $query = "INSERT INTO    $table (?) VALUES (?,?)";
 $query = "DELETE   FROM   $table WHERE actividad_id =(?)";
 $query = "SELECT     * FROM       $table "; 
  
 */
$table="dllido_actividades";
$pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
crearTablaActividades($pdo,$table);
anyadir($pdo,$table);
listar($pdo,$table);
?>