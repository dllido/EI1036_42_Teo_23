function cargarDatos(datos) {
  document.querySelector("#errores").innerHTML = "";
  if (datos.error) {
    document.querySelector("#errores").innerHTML = datos.error;
  } else {
    document.querySelector("#central").innerHTML = "Bienvenido";
  }
}

document
  .querySelector("#form_log")
  .addEventListener("submit", function (event) {
    event.preventDefault();
    var myInit = { method: "POST", body: new FormData(event.target) };
    var myRequest = new Request(event.target.action, myInit);
    fetch(myRequest)
      .then(function (response) {
        if (response.status == 200) return response.json();
        else throw new Error("Something went wrong on api server!");
      })
      .then(function (response) {
        console.debug(response);
        cargarDatos(response);
      })
      .catch(function (error) {
        console.error(error);
      });
  });
