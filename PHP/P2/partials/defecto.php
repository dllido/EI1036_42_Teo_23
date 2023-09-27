<main>
	<h1>Algo no ha ido bien</h1>
	<p>Vuelve a intentarlo con otra opción </p>

<?php 
if (isset($data["error"])) {
        print ("<h2>Error: ".$data["error"]."</h2>");
       }
?>

</main>