<?php



$file = fopen('./sales_2008-2011.csv', 'r'); 
$filetxt = fopen('file.txt', 'w'); 


$campos=array("product","country","date","quantity","amount","card","Cust_ID");

$datos=[];
$row = fgetcsv($file);
print_r($row);
while ($row = fgetcsv($file)) {  
   
   $v=[];
   for ($i=1;$i<count($campos);$i++) 
     {$v[$campos[$i]]=$row[$i];}
   
   if (!array_key_exists($row[0], $datos))
     $datos[$row[0]]=array($v);
   else 
    {$datos[$row[0]][]=$v;
      print("22");
    }
}

print_r( $datos["prod_2"][1]);
fclose($filetxt);
$file = 'file.json';
file_put_contents($file, json_encode($datos));
?>