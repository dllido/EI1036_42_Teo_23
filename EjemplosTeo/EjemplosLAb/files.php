<?php


$list = array(
   array('a1', 'a2', 'a3', 'a4'),
   array('123', '456', '789', '343'),
   array('aaa', 'bbb', 'ccc', 'dddd'),
);


$fp = fopen('file.csv', 'w');
foreach ($list as $fields) {
   fputcsv($fp, $fields);
}


fclose($fp);
$file = fopen('file.csv', 'r');
$filetxt = fopen('file.txt', 'w');
$datos = array();
while ($row = fgetcsv($file)) {
   $fila = "$row[0]-$row[1]-$row[2]-$row[3]\n";
   $datos[$row[0]] =[];
   for ($i=1;$i<count($row);$i++) 
      $datos[$row[0]][] = $row[$i];
   fwrite($filetxt, $fila);
}
fclose($filetxt);
var_dump($datos);
$file = 'file.json';
file_put_contents($file, json_encode($datos));
?>