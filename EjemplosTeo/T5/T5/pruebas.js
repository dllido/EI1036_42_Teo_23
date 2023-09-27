//DEFINICIÓN VARIABLES

a=5
console.log(a);
var b=8;
typeof (c);

//EJEMPLO 1


function getMonthName(mo) {
    mo = mo - 1; // Adjust month number for array index (1 = Jan, 12 = Dec)
    var months = ["Jan","Feb","Mar","Apr","May","Jun","Jul", "Aug","Sep","Oct","Nov","Dec"];
    if (months[mo]) { return months[mo];  }
		else { throw "InvalidMonth";} //  Lanzamos una excepción.
}
myMonth=5;
try { // statements to try
    monthName = getMonthName(myMonth); // function could throw exception
    console.log(monthName);
   }
catch (e) {
    monthName = "unknown";
    console.log(e); // pass exception object to error handler -> your own function
}

//EJEMPLO 2
function grado() {
	function titulo(name) {
		return "Dr. " + name; }
	return titulo; //una funcion!
}
var phd = grado();
console.log (phd("Turing")); //phd is una funcion!


//EJEMPLO 3

function Primera(p1, p2) {
	p1(p2);
}

	// Función Literal
var Segunda = function (m1) {
	console.log(m1 / 10);
};
	// Pasando la Función Segunda como parámetro de Primera
Primera(Segunda, 20 );


//EJEMLPLO 4
var f1=function(x,y)
{
	var s=x+y;
	return s;
}
console.log(f1(4,6));
var f2=f1;
console.log(f2(3,3));


//Objetos CON MÉTODOS


function datos ()   
 { console.log(this.name,this.age);
  }

function Persona(nombre,edad)
{this.name=nombre;
this.age=edad;
this.datos= datos;}

Autor=new Persona("Jose Benito","33");
Autor.datos();



function Person(nombre,edad)
{this.name=nombre;
	this.age=edad;
	this.datos= function(){console.log(this.name,this.age)};}

Autora=new Person("Josefina Benito","33");
Autora.datos();



