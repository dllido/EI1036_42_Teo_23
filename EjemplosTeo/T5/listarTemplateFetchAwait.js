//var respuesta={"plantilla":"listarTemplate.html","datos":[{"id":"1","nombre":"pepe","apellido":null,"email":null,"clave":null},{"id":"2","nombre":"pepe","apellido":null,"email":null,"clave":null},{"id":"3","nombre":"","apellido":null,"email":null,"clave":null},{"id":"4","nombre":"joseva","apellido":null,"email":null,"clave":null},{"id":"5","nombre":"LOLA","apellido":null,"email":null,"clave":null},{"id":"6","nombre":"paco","apellido":null,"email":null,"clave":null},{"id":"7","nombre":"user1","apellido":null,"email":null,"clave":null},{"id":"8","nombre":"pl","apellido":null,"email":null,"clave":null},{"id":"9","nombre":"plll","apellido":null,"email":null,"clave":null}]};


var myInit = {
	method: 'GET'
};


function cargarTemplate(datos) {
	if (document.querySelector('template').content) {

		// Instantiate the table with the existing HTML tbody and the row with the template
		var t = document.querySelector('#productrow');
		var tb = document.getElementsByTagName("tbody");
		var clone;
		td = t.content.querySelectorAll("td");
		for (var i = 0; i < datos.length; i++) {
			td[0].textContent = datos[i].person_eid;
			td[1].textContent = datos[i].nombre;
			clone = document.importNode(t.content, true);
			tb[0].appendChild(clone);

		}
	}
}


async function llamarTemplate(url_template, data) {
	var myRequest = new Request(url_template,);
	try {
		const response = await fetch(myRequest,myInit);
		const respuestaHTML = 	await response.text()


		if (response.status == 200) {
			document.querySelector('#plantilla').innerHTML = respuestaHTML;
			cargarTemplate(data);

		} else throw new Error('Something went wrong on api server!');

	} catch (error) {
		console.log(error);
	};
}


document.querySelector('#listar').addEventListener("click", async function (event) {
	event.preventDefault();
	try {
	
		const response = await fetch(event.target.href,myInit);
		const respuestaJson = await response.json();
		if (response.status != 200) {
			 throw new Error('Something went wrong on api server!');}
		
		llamarTemplate(respuestaJson.plantilla, respuestaJson.datos);

	} catch (error) {
		console.log(error);
	};
});