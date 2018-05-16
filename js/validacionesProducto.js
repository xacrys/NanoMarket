function nuevoProducto(pagina,myForm){
    nuevo();
    document.getElementById(myForm).action=pagina;
    document.getElementById(myForm).submit();
    
}

//Validaciones de Formulario
function validar(pagina, myForm, what) {        
    var uidcliente = document.getElementById('idcliente').value;
    //var uemail = document.getElementById('email').value;
    if(!uidcliente){
        document.getElementById("idcliente").innerHTML = "Valor requerido!";
        return false;
    } /*else if(what.value=='Registrar' && !uemail){
        document.getElementById("email").innerHTML = "Valor requerido!";
        return false;
    }*/
    else{
        saltar(pagina,myForm);
        return true;
    }
}

function nuevo() {
    //Limpiar y deshabilitar campo
    document.getElementById("inputStock").value = "0";
    document.getElementById("inputDetalle").value = "";
    document.getElementById("inputPrecio").value = "";
    document.getElementById("inputStock").value = "";
}

