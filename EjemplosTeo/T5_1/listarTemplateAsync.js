var respuesta={"plantilla":"listarTemplate.html","datos":[{"id":"1","nombre":"pepe","apellido":null,"email":null,"clave":null},{"id":"2","nombre":"pepe","apellido":null,"email":null,"clave":null},{"id":"3","nombre":"","apellido":null,"email":null,"clave":null},{"id":"4","nombre":"joseva","apellido":null,"email":null,"clave":null},{"id":"5","nombre":"LOLA","apellido":null,"email":null,"clave":null},{"id":"6","nombre":"paco","apellido":null,"email":null,"clave":null},{"id":"7","nombre":"user1","apellido":null,"email":null,"clave":null},{"id":"8","nombre":"pl","apellido":null,"email":null,"clave":null},{"id":"9","nombre":"plll","apellido":null,"email":null,"clave":null}]};
alert (respuesta.plantilla);
var datos=respuesta.datos;


if (document.querySelector('template').content) {
	
		// Instantiate the table with the existing HTML tbody and the row with the template
	var t = document.querySelector('#productrow');
	var tb = document.getElementsByTagName("tbody");
	var clone;
	
	td = t.content.querySelectorAll("td");
	for  (var i = 0; i < datos.length; i++){
		
		td[0].textContent =datos[i].id;
		td[1].textContent = datos[i].nombre;
		
		clone = document.importNode(t.content, true);
		tb[0].appendChild(clone);
		
	}};

