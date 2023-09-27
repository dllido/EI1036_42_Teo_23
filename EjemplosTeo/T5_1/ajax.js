function transferComplete(evt,updateNode,url_src) {
    console.log("The transfer is complete.");
    console.log(url_src);
    updateNode.innerHTML=evt.target.responseText;
    // Vuelve a cargar el manejador de eventos del form.
    enviaForm();
}
function updateProgress (oEvent) {
    if (oEvent.lengthComputable) {
        var percentComplete = oEvent.loaded / oEvent.total;
        console.log("Progress:"+percentComplete);
    } else {// Tamaño total desconocido
        console.log("Progressing:")
    }
}
function transferFailed(evt) {
    console.log("An error occurred while transferring the file.");
}
function transferCanceled(evt) {
    console.log("The transfer has been canceled by the user.");
}

function sendFailed(evt) {
    console.log("An error occurred while transferring the file.");
}
// Envia con Ajax el formulario de la página si existe y devuelve un json que muestra en la pantalla

function EnviaAjax(url_src,updateNode,data){
    var Ajax1=new XMLHttpRequest();
    Ajax1.addEventListener("progress", function (event){updateProgress(event)});
    Ajax1.addEventListener("load", function (event){transferComplete(event,updateNode,url_src)});
    Ajax1.addEventListener("error", transferFailed);
    Ajax1.addEventListener("abort", transferCanceled);
    Ajax1.upload.addEventListener("error", sendFailed);
    Ajax1.open("POST",url_src+"&tipo=json");
    //Ajax1.setRequestHeader('Content-Type', 'application/json')
    Ajax1.send(data);
}

//Envia con AJAX todos los enlaces del nav y la respuesta la pone en la etiqueta main

function cargaAjax(url_src,updateNode){
    var Ajax1=new XMLHttpRequest();
    Ajax1.addEventListener("progress",updateProgress);
    Ajax1.addEventListener("load", function (event){transferComplete(event,updateNode,url_src)})
    Ajax1.addEventListener("error", transferFailed);
    Ajax1.addEventListener("abort", transferCanceled);
    Ajax1.open("GET",url_src+"&tipo=phtml");
    Ajax1.send();
}


// Activa evento formulario para realizar llamada  POST en Ajax
function enviaForm(){
    if (document.forms.length>0){
        document.forms[0].addEventListener("submit",function (event)
           {event.preventDefault();
           var data = new FormData(event.target);
           EnviaAjax(event.target.getAttribute("action"),document.querySelector('main'),data);
           })
    }
}

// Activa los hiperenlaces del menu de navegación  para realizar llamadas en Ajax
function detectores()
{   //Envia con AJAX todos los enlaces del nav y la respuesta la pone en la etiqueta main
    enlaces=document.querySelectorAll("nav a");
    for (let  enlace of enlaces){
        enlace.addEventListener("click",function (event)
            {event.preventDefault();
            cargaAjax(event.target.getAttribute
                      ("href"),document.querySelector('main'));
            });}
    enviaForm();
   }








const http = (function () {
							 // API Library
							 return {
							 get: function (url, payload) {
							 return _ajax('GET', url, payload);
							 },
							 post: function (url, payload) {
							 return _ajax('POST', url, payload);
							 },
							 put: function (url, payload) {
							 return _ajax('PUT', url, payload);
							 },
							 delete: function (url, payload) {
							 return _ajax('DELETE', url, payload);
							 }
							 };
							 
							 // Call AJAX
							 function _ajax(method, url, payload) {
							 return new Promise(function (resolve, reject) {
																	const xhr = new XMLHttpRequest(url);
																	const uri = _getUri(url, method, payload);
																	
																	xhr.open(method, uri);
																	xhr.send();
																	xhr.onload = onload;
																	xhr.onerror = onerror
																	
																	function onload() {
																	if (this.status == 200) {
																	resolve(this.response);
																	} else {
																	reject(this.statusText);
																	}
																	};
																	
																	function onerror() {
																	reject(this.statusText);
																	}
																	});
							 }
							 
							 // Convert Payload Object in a Uri String
							 // _getUri :: (String, String, Object) -> String
							 function _getUri(url, method, payload) {
							 let uri = url;
							 
							 if (payload && (method === 'POST' || method === 'PUT')) {
							 uri += '?';
							 let argcount = 0;
							 
							 for (var key in payload) {
							 if (payload.hasOwnProperty(key)) {
							 if (argcount++) {
							 uri += '&';
							 }
							 uri += encodeURIComponent(key) + '=' + encodeURIComponent(payload[key]);
							 }
							 }
							 }
							 
							 return uri;
							 }
							 })();





document.addEventListener("DOMContentLoaded", function (){detectores()});
