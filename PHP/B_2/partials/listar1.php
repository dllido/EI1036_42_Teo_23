
  <legend>Listado usuarios</legend>
 <ul>
  	<?php foreach ($diccionario as $dato=> $datos) {?>
    <form method="POST" ="?action=registrar">
    <tr><td>
    <input type="text" id="nombre" name="curso" value=<?php print ($dato)?> >
</td><td>
    <input type="text" id="desc" name="desc" value=<?php print ($diccionario[$dato]['desc'])?> >
    </td><td>
    <input type="text" id="num_max" name="num_max" value=<?php print ($diccionario[$dato]['num_max'])?> >
    </td><td>
    <input type="text" id="mat" name="mat" value=<?php print ($diccionario[$dato]['mat'])?> >
    </td><td>
    <input type="float" id="precio" name="preu" value=<?php  print ($diccionario[$dato]['preu'])?> > </br>
    </td><td>
    <input type="submit" value="Enviar">
    </td><td>
	
            <a href="?action=borrar&curso=<?php print ($dato)?>" >Borrar </a>
            </td><td>
            <a href="?action=modificar&curso<?php print($dato)?>" >Modificar</a>
            </td><td>
            </tr>
    </form>
    <?php }?>
