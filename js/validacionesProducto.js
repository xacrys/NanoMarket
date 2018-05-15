// Habilitar elementos DOM
function undisableTxt() {
    document.getElementById("nombre").disabled = false;
    document.getElementById("apellido").disabled = false;
}

// Habilitar elementos DOM
function undisableUpd() {
    document.getElementById("idcliente").disabled = true;
    document.getElementById("nombre").disabled = false;
    document.getElementById("apellido").disabled = false;
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
    //Limpiar y deshabilitar campos
    document.getElementById("idcliente").disabled = false;
    document.getElementById("nombre").disabled = false;
    document.getElementById("apellido").disabled = false;
    document.getElementById("telefono").disabled = false;
    document.getElementById("celular").disabled = false;
    document.getElementById("email").disabled = false;
    document.getElementById("direccion").disabled = false;
    document.getElementById("tipo_cliente").disabled = false;
    document.getElementById("idcliente").value = "";
    document.getElementById("nombre").value = "";
    document.getElementById("apellido").value = "";
    document.getElementById("telefono").value = "";
    document.getElementById("celular").value = "";
    document.getElementById("email").value = "";
    document.getElementById("direccion").value = "";
    document.getElementById("tipo_cliente").value = "0";

    //Limpiar y deshabilitar Buttons
    document.getElementById("btnRegistrar").disabled = false;
    document.getElementById("btnActualizar").disabled = true;
    document.getElementById("btnCancelar").disabled = false;
}

