<?php
ini_set('display_errors', 1);


function prueba1()
{
   global $a; // no recomendamos
   try {
      echo ("5+$a") . "\n";
      $GLOBALS['b'] = 5 * $a;

   } catch (Exception $e) {
      print("ddd");
   }
   print "2222";
}
$a = 'Hola';
$b = " Adios";
print_r($GLOBALS);
//prueba1();
print_r($GLOBALS);

$GLOBALS['b'] = "Fin";
print($b);

$a = '12345';
// This works:
echo "qwe{$a}rty";
// This fails:
echo "qwe$arty";
$b = 5 + $a;
print(gettype($b));
?>