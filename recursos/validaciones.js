// Validar solo números
function isNumericKey(evt)
{
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode >= 48 && charCode <= 57)
        return true;
    return false;
}