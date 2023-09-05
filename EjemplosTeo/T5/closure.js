function llamaotra1(A){
	console.log(A);
	return "1";
   }
  function llamaotra2(A){
	console.log(eval(A)); 
	return "2";//ejecuta funcion
  }
  function funcionllamada(B){
	console.log(B);
	return 0;
  }
llamaotra1(funcionllamada("Estoy Aqui1"));
llamaotra1('funcionllamada("Estoy Aqui2")');
llamaotra2('funcionllamada("Estoy Aqui3")');