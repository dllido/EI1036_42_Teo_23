
<main>
	<h1>Gestión de Actividades </h1>
	<form class="fom_usuario" action="?action=registrar" method="POST">
		<legend>Datos básicos</legend>
		<label for="nombre">Nombre</label>
		<br/>
		<input type="text" name="nombre" class="item_requerid" size="20" maxlength="25" value="<?php print $nombre ?>"
		 placeholder="Actividad1" />
		<br/>
		<label for="descripcion">Descripción</label>
		<br/>
		<input type="text" name="descripcion" class="item_requerid" size="20" maxlength="25" value="<?php print $descripcion ?>"
		 placeholder="Descripción Actividad" />
		<br/>
		<input type="submit" value="Enviar">
		<input type="reset" value="Deshacer">
	</form>
</main>