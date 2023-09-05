async function asyncCall() {
   var myImage = document.querySelector('#mi_imagen');
   const response = await fetch('https://upload.wikimedia.org/wikipedia/commons/7/77/Delete_key1.jpg');
   const imgblob = await response.blob()
   var objectURL = URL.createObjectURL(imgblob);
   myImage.src = objectURL;
}



asyncCall();




// envia formulario
async function enviaForm(evento) {
   try {
      evento.preventDefault();
      let url = evento.target.getAttribute("action")
      let data = new FormData(evento.target);
      let init = {
         url: url,
         method: 'post',
         body: data
      };
      let request0 = new Request(url, init);

      const response = await fetch(request0);

      if (!response.ok) {
         throw Error(response.statusText);
      }
      const result = await response.text();
      console.log('Correcto devuelvo:', result);
   } catch (error) {
      console.log(error);
   }

}
if (document.forms.length > 0) {
   document.forms[0].addEventListener("submit", function (event) {
      enviaForm(event);
   })
}