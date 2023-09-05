
function cargarTemplate(datos) {
  if (document.querySelector("#plantilla0").content) {
    // Instantiate the table with the existing HTML tbody and the row with the template
    var t = document.querySelector("#plantilla0");
    var clone;

    td = t.content.querySelectorAll("td");
    var tb = document.getElementsByTagName("tbody");
    var clone;

    for (var i = 0; i < datos.length; i++) {
      td[0].textContent = datos[i].title.rendered;
      td[1].innerHTML = datos[i].content.rendered;
      clone = document.importNode(t.content, true);
      tb[0].appendChild(clone);
    }
  }
}

document
  .querySelector("#listarCosas")
  .addEventListener("click", function (event) {
    event.preventDefault();
    var myInit = { method: "GET" };
    var myRequest = new Request(event.target.href, myInit);
    fetch(myRequest)
      .then(function (response) {
        if (response.status == 200) return response.json();
        else throw new Error("Something went wrong on api server!");
      })
      .then(function (response) {
        console.debug(response);
        cargarTemplate(response);
      })
      .catch(function (error) {
        console.error(error);
      });
  });
