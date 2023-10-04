<?php
error_reporting(-1);
try {
   echo 1+'s340';
}
catch(ErrorException $e){
   echo "got $e";
}
function prueba1()
{
   global $a; // no recomendamos
   try {
      echo ("5+$a") . "\n";
      $GLOBALS['b']=5*$a;

   } catch (Exception $e) {
      print("ddd");
   }
   print "2222";
}
$a = 'Hola';
$b =" Adios";
print_r($GLOBALS);
$GLOBALS['b']=5*$a;
$a = '12345';

// This works:
 echo "qwe{$a}rty"; 
//prueba1();

//print_r($GLOBALS);
print($b);

?>