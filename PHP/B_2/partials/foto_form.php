<h1>Foto </h1>
<form class="fom_usuario" action="?action=foto_upload" method="POST" enctype="multipart/form-data">
   <label for="name">Nombre</label>
   <input type="text" name="name" id="name_foto" class="item_requerid" size="20" maxlength="25”>
     <br/>
     <label for=" upload">Selecciona una imagen</label>
   <input type="file" accept="image/*" name="foto_cliente" id="upload">
   <br />
   <input type="submit" value="Enviar">
   <input type="reset" value="Deshacer">
</form>