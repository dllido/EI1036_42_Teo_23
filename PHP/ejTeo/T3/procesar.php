<?php
print "Adivina adivinanza<br>\n";
var_dump($_REQUEST);
print_r("<p>variables por método post solo<p>");
var_dump($_POST);
print $_REQUEST["pais"];
print $_REQUEST["name"];
foreach ($_REQUEST["idiomas"] as $idioma)
   print("$idioma<BR>\n");
?>