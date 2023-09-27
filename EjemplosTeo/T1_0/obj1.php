<?php
class Foo
{
  public function printItem($string)
  {
  echo 'Foo: ' . $string . '<p>';
  }
  
  public function printPHP()
  {
  echo 'PHP is great.' . '<p>';
  }
}

class bar extends Foo
{
  public function printItem($string)
  {
  echo 'Bar: ' . $string . '<p>';
  }
}

$foo = new Foo();
$bar = new Bar();
$foo->printItem('baz'); // Salida: 'Foo: baz'
$foo->printPHP();       // Salida: 'PHP is great' 
$bar->printItem('baz'); // Salida: 'Bar: baz'
$bar->printPHP();       // Salida: 'PHP is great'

?>
