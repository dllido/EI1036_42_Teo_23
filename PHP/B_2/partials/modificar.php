
  <legend>Listado  Cursos</legend>
 <ul>
  	<?php foreach ($diccionario as $dato=> $datos) {?>
    <form method="POST" ="?action=registrar">
    <tr><td>
    <input type="text" id="nombre" name="curso" value=<?php print ($dato)?> readonly>
    </td><td>
    <input type="submit" value="Enviar">
    </td><td>
	
            <a href="?action=borrar&curso=<?php print ($dato)?>" > Borrar </a>
            </td><td>
            <a href="?action=modificar&curso<?php print($dato)?>" > Modificar </a>
            </td><td>
            </tr>
    </form>
    <?php }?>
