<!DOCTYPE html>
<html>

<head>
   <meta charset="utf-8">
   <title>Web page parsing</title>
</head>

<body>
   <div>
      <h1>Web page parsing</h1>
      <p>This is an example Web page.</p>
   </div>
   <?php
   $fil = array('rojo' => 101, 'verde' => 51, 'azul' => 255);
   $filas = [$fil, $fil, $fil];

   print "<table>";
   #foreach($fila as  $filas) {
   $fila = array(
      "one" => 1,
      "two" => 2,
      "three" => 3,
      "seventeen" => 17
   );


   print "<tr>";
   print "<td>key</td><td>val</td>";
   foreach ($fila as $key => $val) {
      print "<td>" . $key . "</td><td>" . $val . "</td>";
   }
   print "</tr>";
   print "</table>";

   ?>


   <iframe width="400" height="215" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/place/Buenos+Aires,+CABA,+Argentina/@-34.603695,-58.381569,46065m/data=!3m1!1e3!4m5!3m4!1s0x95bcca3b4ef90cbd:0xa0b3812e88e88e87!8m2!3d-34.6036844!4d-58.3815591?hl=es-419
">
   </iframe>




</body>

</html>