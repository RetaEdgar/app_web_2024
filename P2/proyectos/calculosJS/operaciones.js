function operacion()
{
    let n1, n2, tipoope,resultado,ope;
    n1=parseFloat(document.getElementById("n1").value);
    n2=parseFloat(document.getElementById("n2").value);
    tipoope=document.getElementById("tipo").value;

    if (isNumber (n1) && isNumber(n2) )
    {
        // <--switch se utiliza como el segun -->
        switch (tipoope) {
            case "+": ope = n1 + n2; break;
            case "-": ope = n1 - n2; break;
            case "*": ope = n1 * n2; break;
            case "/": ope = n1 / n2; break;

        }

        resultado = document.getElementById("resultado");
        resultado.innerHTML = `<h2> ${n1} ${tipoope} ${n2} = ${ope}</h2>`
    }
    else
        // resultado=document.getElementById("resultado").innerHTML=`<h2>Ingresa solo numeros</h2>`
        alert("Ingresa solo numeros")

    
}

function isNumber(n)
{
    return !isNaN(parseInt(n) && isFinite(n))
}

