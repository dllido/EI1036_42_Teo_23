<?php

/*esto es un comentario 
que termina aqui*/

//Esto es otro comentario de sólo una linea


//constante
const PI=2.1416;

//Variables
$a=2;
$b=2;
echo "Hola Mundo";
echo $b;
$c=$a+$b;
$d=$a.$b;
echo $d;
echo "$c";
echo '$c';
echo PI*3;

//Funciones

function concatenar($a)
{

$a="bienvenida/o";
echo $a;
echo "aui";
}
concatenar("oo");


$lista=array(1,2,3,4,5);

for ($i=0;$i<count($lista);$i++)
 echo $lista[$i];

$lista=array();
$lista[]=1;
print_r($lista);

//diccionarios

$grants=array('read'=>'1','write'=>'2');
echo $grants['read'],"\n";
print_r ($grants);  //muestra listas
var_dump ($grants);  //muestra tipos complejos
foreach($grants as $val => $n)
{echo $val,"-",$n,"\n";}

if ($a=='hola') echo "1";
else echo "2\n";
$a="3";
switch ( $a){
case "1":echo "1\n";break;
case "2":echo "2\n";break;
default:echo "3\n";break;
}	



$color = array ('rojo'=>101, 'verde'=>51, 'azul'=>255);

print ($color['rojo']); // No olvidar las comillas
echo "\n";
var_dump(array_keys($color));


print_r ($_POST);
print_r ($_GET);
print_r ($_REQUEST);

print_r ($_GLOBALS);
print_r ($_COOKIE);
print_r ($_SERVER);
?>
