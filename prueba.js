function isDinnerTime() {
  return new Promise(function (resolve, reject) {
    setTimeout(function () {
      const now = new Date();
      if (now.getHours() >= 22) {
        resolve("yes");
      } else {
        reject("no");
      }}, 1000);
  });
}
isDinnerTime()
  .then((data) => console.log("success: " + data))
  .catch((data) => console.log("error: " + data));

function exitoCallback(resultado) {
   console.log("Archivo de audio disponible en la URL " + resultado);
 }
 
 function falloCallback(error) {
   console.log("Error generando archivo de audio " + error);
 }
 
 crearArchivoAudioAsync(audioConfig, exitoCallback, falloCallback);



horacomer= new Promise(function (resolve, reject) {
   setTimeout(function () {
     const now = new Date();
     if (now.getHours() >= 22) {
       resolve("yes");
     } else {
       reject("no");
     }}, 1000);})

hora_comer

resolver=function(a){console.log(a);return 1}
rechazar=function(){console.log('no');return -1}
resol=new Promise((resolver, rechazar) => {
   console.log("Inicial");
   return(resolver("ok"));
 })
