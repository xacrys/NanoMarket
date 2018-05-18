//Funcion para validar el codigo de producto al buscar
function validarBuscar(pagina, myForm, what){
    var valor = document.getElementById("inputCodigo").value;
    if(valor==null || valor.length == 0 || /^\s+$/.test(valor)){
        alert("Código del producto no acepta nulos");
        $("#inputCodigo").parent().attr("class","form-group has-error");
        return false;
       
    }
    else{
        saltar(pagina,myForm);
        return true;
    }
}

//Funcion para validar cada uno de los campos
function validarNuevo(pagina, myForm, what){
    var codigo = document.getElementById("inputCodigo").value;
    var detalle = document.getElementById("inputDetalle").value;
    var precio = document.getElementById("inputPrecio").value;
    var stock = document.getElementById("inputStock").value;

    if(codigo==null || codigo.length == 0 || /^\s+$/.test(codigo)){
        alert("Código del producto es obligatorio");
        return false;
    } else
    if(detalle==null || detalle.length == 0 || /^\s+$/.test(detalle)){
        alert("detalle del producto es obligatorio");
        return false;
    } else
    if(precio==null || precio.length == 0 || /^\s+$/.test(precio)){
        alert("precio del producto es obligatorio");
        return false;
    } else
    if(stock==null || stock.length == 0 || /^\s+$/.test(stock)){
        alert("stock del producto es obligatorio");
        return false;
    }
    else{
        saltar(pagina,myForm);
        return true;
    }
}


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
//Limpiar y deshabilitar campo
function nuevo() {
    document.getElementById("inputStock").value = "0";
    document.getElementById("inputDetalle").value = "";
    document.getElementById("inputPrecio").value = "";
    document.getElementById("inputStock").value = "";
}
//Funcion para lo ingresado en textos sea solo numeros enteros
function soloNumeros(e){
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla==8){
        return true;
    }
        
    // Patron de entrada, en este caso solo acepta numeros
    patron =/[0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}
//Funcion para lo ingresado en textos sea solo numeros decimales
function soloFlotantes(evt,input){
    // Backspace = 8, Enter = 13, ‘0′ = 48, ‘9′ = 57, ‘.’ = 46, ‘-’ = 43
    var key = window.Event ? evt.which : evt.keyCode;    
    var chark = String.fromCharCode(key);
    var tempValue = input.value+chark;
    if(key >= 48 && key <= 57){
        if(filter(tempValue)=== false){
            return false;
        }else{       
            return true;
        }
    }else{
          if(key == 8 || key == 13 || key == 0) {     
              return true;              
          }else if(key == 46){
                if(filter(tempValue)=== false){
                    return false;
                }else{       
                    return true;
                }
          }else{
              return false;
          }
    }
}
function filter(__val__){
    var preg = /^([0-9]+\.?[0-9]{0,2})$/; 
    if(preg.test(__val__) === true){
        return true;
    }else{
       return false;
    }
    
}