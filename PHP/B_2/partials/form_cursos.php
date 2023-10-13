<h1>Formulario de inscripción Cursos</h1>
<form method="post" action="?action=registrar">

    <label for="nombre" >Nombre: </label>
    <input type="text" id="nombre" name="curso"><br/>

    <label for="desc" >descripción: </label>
    <input type="text" id="dec" name="desc"><br/>

    <label for="num_max" >num_max </label>
    <input type="text" id="num_max" name="num_max"><br/>
    <label for="mat" >mat</label>
    <input type="text" id="mat" name="mat"><br/>
    
    <label for="precio">Precio: </label>
    <input type="float" id="precio" name="preu"><br/>
    <input type="submit" value="Enviar">
	<input type="reset" value="Deshacer">
</form>