// Función de JavaScript para enviar el formulario a la página indicada.
function saltar(pagina,myForm){
    document.getElementById(myForm).action=pagina;
    document.getElementById(myForm).submit();
}

// Validar solo números
function isNumericKey(evt)
{
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode >= 48 && charCode <= 57)
        return true;
    return false;
}