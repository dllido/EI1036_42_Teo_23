function mostrarFoto(file, imagen) {
   var reader = new FileReader();
   reader.addEventListener("load", function () {
      imagen.src = reader.result;
   });
   reader.readAsDataURL(file);
}

function asyncCall() {
   var myImage = document.querySelector('#mi_imagen');
   fetch('https://upload.wikimedia.org/wikipedia/commons/7/77/Delete_key1.jpg')
      .then(function (response) {
         if (!response.ok) { throw new Error(response.statusText); }
         response.blob().then(function(data) {
            var objectURL = URL.createObjectURL(data);
            myImage.src = objectURL;
          });
        
      })
      .catch(function (error) {
         console.log(error);
      })
}






// envia formulario
function enviaForm(evento) {

   evento.preventDefault();
   let url = evento.target.getAttribute("action")
   let data = new FormData(evento.target);
   let init = {
      url: url,
      method: 'post',
      body: data
   };
   let request0 = new Request(url, init);

   fetch(request0)
      .then(function (response) {
         if (!response.ok) { throw new Error(response.statusText); }
         response.text().then(function(data) {
         document.body.innerHTML = data;
         console.log('Correcto devuelvo:', data);
      })})
      .catch(function (error) { console.log(error); })

}


asyncCall();
var myImage = document.querySelector('#mi_imagen');
var fichero = document.querySelector('#fichero');
fichero.addEventListener("change", function (event) {
   mostrarFoto(this.files[0], myImage);
})
if (document.forms.length > 0) {
   document.forms[0].addEventListener("submit", function (event) {
      enviaForm(event);
   })
}