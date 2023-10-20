
  <legend>Listado  Cursos</legend>
 <ul>
  	<?php foreach ($diccionario as $dato=> $datos) {?>
    <form method="POST" ="?action=registrar">
    <tr><td>
    <input type="text" id="nombre" name="curso" value=<?php print ($dato)?> readonly>
    </td><td>
    <input type="submit" value="Modificar">
    </td><td>
	
            <a href="?action=borrar&curso=<?php print ($dato)?>" > Borrar </a>
            </td>
            </tr>
    </form>
    <?php }?>
