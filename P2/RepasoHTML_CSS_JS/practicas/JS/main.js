// Esto es un comentario de una linea //

/* esto es un comentario 
de varias lineas*/
//-----------------------------------------------------
//alerta
//alert("Hola que tal, soy  una alerta")
//-----------------------------------------------------
//VARIABLES
var nombre="Reta Ravelo Edgar Jesus";
let nombre2='Rodolfo el Reno';
let edad=18;
let estatura=1.70;
let logico=true;

//MOSTRAR EN CONSOLA
console.log("Hola estoy en consola");
console.log("Hola tengo: "+edad+" Años");

//MOSTRAR EN PANTALLA
document.write("Hola estoy en la pantalla <br>");
document.write("<h2>Hola tengo: "+edad+" años</h2>");

//MOSTRAR EN PANTALLA getElementById
let datos=document.getElementById("informacion");

datos.innerHTML="Hola este es el contenido de innerHTML";
datos.innerHTML+="<hr><h3>Hola este es el contenido de innerHTML</h3>";
datos.innerHTML+="<hr><h3> Mido: "+estatura+" metros </h3>";
datos.innerHTML+=`
    <br>
    <hr>
    <h1>
        Hola soy contenido de innerHTML mi nombre es: ${nombre}
        <br> y mi estatura es ${estatura}
    </h1>`;
//CONDICIONALES
if (estatura>=18)
    datos.innerHTML+=`
    <hr>
        soy mayor de edad
    <hr>`;
else
    datos.innerHTML+=`
    <h1>
    soy menor de edad
    <h1>`;

    // CICLOS
    for(let i=1;i<=5;i++)
        {
            datos.innerHTML+=`<hr><h3>El numero es ${i}</h3>`;
        }
            
    let i=1;
    while (i<=5)
        {
            datos.innerHTML+=`<hr><h3>El numero es ${i}</h3>`;
            i++;
        }
            
    // i=1;
    // do
    //     {
    //             datos.innerHTML+=`<hr><h3> Do El numero es ${i}</h3>`;
    //     }
    //         while (i<=5);

//FUNCIONES

//1.-Funcion que no recibe parametros y no regresa parametros
function suma1()
{
    let n1=3;
    let n2=2;
    let suma=n1+n2;
    datos.innerHTML+=`<hr><h3>El resultado de la suma es: ${suma}</h3>`;
}

suma1();
//2.-Funcion que no recibe parametros y regresa valor
function suma2()
{
    let n1=3;
    let n2=2;
    let suma=n1+n2;
    return suma;
}
let sum=suma2();
datos.innerHTML+=`<hr><h3>El resultado de la suma2 es: ${sum}</h3>`;

//3.-Funcon que recibe parametros y no regresa valor
function suma3(numero1,numero2)
{
    let n1=numero1;
    let n2=numero2;
    let suma=n1+n2;
    datos.innerHTML+=`<hr><h3>El resultado de la suma3 es: ${suma}</h3>`;
}
suma3(3,4);

//4.-Funcion que recibe parametros y regresa valor
function suma4(numero1,numero2)
{
    let n1=numero1;
    let n2=numero2;
    let suma=n1+n2;
    return suma;
}
let sumaa=suma4(3,4);
datos.innerHTML+=`<hr><h3>El resultado de la suma4 es: ${sumaa}</h3>`;

//ARREGLOS

let animales=[];
animales[0]="Perro";
animales[1]="Gato";
animales[2]="Aves";

let animales2=["Tigre", "Leon", "Elefante"];

for(let i=0; i<animales.length;i++)
{
    datos.innerHTML+=`<hr><h3> El animal es: ${animales[i]}</h3>`;
}

animales2.forEach(element => {
    datos.innerHTML+=`<hr><h1>El animal es: ${element}</h1>`;
})
