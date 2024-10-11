function operacion()
{
    let n1=parseInt(document.getElementById("n1").value);
    let n2=parseInt(document.getElementById("n2").value);
    let tipoope=document.getElementById("tipo").value;

    // <--switch se utiliza como el segun -->
    switch (tipoope)
    {
        case "suma":ope=n1+n2;break;
        case "resta": ope = n1-n2;break;
        case "multiplicacion": ope=n1*n2; break;
        case "division":ope=n1/n2;break;
        
    }

    let resultado=document.getElementById("resultado");
    resultado.innerHTML=`<h2> ${ope}</h2>`
}

