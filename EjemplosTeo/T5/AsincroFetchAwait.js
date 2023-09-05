async function cargaAsincro(src_url, lugar) {
   try {
   const response = await fetch(src_url);
   const respuestaHTML = await response.text()
   if (response.status !== 200) {
     console.log('Looks like there was a problem. Status Code: ' +
       response.status);
   } else {
     lugar.innerHTML = respuestaHTML;
     nodoScript = lugar.querySelector("script");
     if (null != nodoScript) {
       let myScript = document.createElement('script');
       myScript.textContent = nodoScript.innerHTML;
       document.head.appendChild(myScript);
       (nodoScript.parentNode).removeChild(nodoScript);
     }
   }

 }
 catch(err) {
   console.log('Fetch Error :-S', err);
   return false;
 }
 return true;
 }

 function detectores() {
   lugar = document.querySelector("#divi");
   enlace = document.querySelector("nav a");
   enlace.addEventListener("click", function (event) {
     if (cargaAsincro(event.target.href, lugar) != true) {
       event.preventDefault()
     }
   });
 }

 detectores()
