//jQuery DOM
$(document).ready(function(){
    // Add rows
    $("#add-row").click(function(){
        var idproducto = $("#detalle").val();
        var detalle = $("#detalle option:selected").text();
        var stock = parseFloat($("#stock").val());
        var pventa = parseFloat($("#precio_venta").val());
        var cantidad = parseInt($("#cantidad").val());

        if (cantidad > stock) {
            alert ('Cantidad no disponible en stock.');
            return;
        }

        if (idproducto != '' && pventa > 0 && cantidad > 0) {
            var stotal = pventa * cantidad;
            stotal = stotal.toFixed(2);
            var check = "<td><input type='checkbox' name='record'></td>";
            var markup = "<tr><td>"+idproducto+"</td><td>"+detalle+"</td><td>"+pventa+"</td><td>"+cantidad+"</td><td>"+stotal+"</td>"+check+"</tr>"; // Create <tr> with HTML
            $("table tbody").append(markup);                                                

            //tfootId
            setRowPrice("tDetalleVenta", "tfootId", "1", newTotal());
        }                    
    });

    // Find and remove selected table rows
    $(".delete-row").click(function(){        
        $("table tbody").find('input[name="record"]').each(function(){                        
            if($(this).is(":checked")){
                    $(this).parents("tr").remove();
            }
        });

        //tfootId
        setRowPrice("tDetalleVenta", "tfootId", "1", newTotal());
    });

    // onChange select element id=detalle
    $("#detalle").change(function () {
        $("#detalle option:selected").each(function () {
            id_producto = $(this).val();
            //console.log(id_producto);
            valoresProducto(id_producto);
        });
    });

});

// Buscar Cliente desde la vista Ventas utilizando jQuery AJAX
function buscarCliente(idcliente){
    
    if (!idcliente) {
        document.getElementById("idcliente").innerHTML = "Valor requerido!";
        return false;
    }

    var parametros = {
        "idcliente" : idcliente
    };
    $.ajax({
            data:  parametros,
            url:   'index.php?controlador=Cliente&accion=buscarCli',
            type:  'post',
            dataType: "json", //JSON
            beforeSend: function () {
                    //$("#resultado").html("Procesando, espere por favor...");
            },
            success:  function (response) {                
                var json_obj = $.parseJSON(response);//parse JSON
                if (json_obj.nombre == 'UNDEFINED') {
                    $("#idcliente").val('');
                    $("#nombre").val('');
                    $("#apellido").val('');
                    alert('El Cliente no existe.');
                    document.getElementById("add-row").disabled = true;
                } else {
                    document.getElementById("add-row").disabled = false;
                    document.getElementById("idcliente").readOnly = true;
                    $("#nombre").val(json_obj.nombre);
                    $("#apellido").val(json_obj.apellido);                                                
                }                
            }
    });
}

function newTotal() {
    var total = 0;
    var numrows = 0;
    $('#tDetalleVenta > tbody  > tr').each(function() {
        var cellValue = $(this).find('td:eq(4)').html();
        total = parseFloat(total) + parseFloat(cellValue);  
        total = total.toFixed(2);
        numrows++;
    });
    if (numrows>0) {
        document.getElementById("btnRegistrar").disabled = false;
    } else {
        document.getElementById("btnRegistrar").disabled = true;
    }
    return total;
}

function setRowPrice(tableId, rowId, colNum, newValue) {
    $('#'+tableId).find('tr#'+rowId).find('td:eq('+colNum+')').html(newValue);
}

function getTotalVenta(tableId, rowId, colNum) {
    return $('#'+tableId).find('tr#'+rowId).find('td:eq('+colNum+')').html();
}

function guardarVenta() {
    var idcliente = $("#idcliente").val();
    var detalles=0;
    //Get DetalleVenta values
    $('#tDetalleVenta > tbody  > tr').each(function() {
        detalles++;
    });
    console.log(detalles);
    console.log(idcliente);

    //Solo si hay detallesVentas
    if (idcliente) {
        if (detalles>0) {
            var detalleVenta = new Array();
            var row = 0;
            
            //Get Venta values (idusuario and fecha_hora will be gotten at server side)   
            var idcliente = $("#idcliente").val();
            var forma_pago = $("#forma_pago").val();
            var total_venta = getTotalVenta("tDetalleVenta", "tfootId", "1");
            //console.log(idcliente+" "+forma_pago + " " + total_venta);
        
            //En la primera posición se envía los datos de la Venta (Cabecera)
            detalleVenta[row]={"idcliente" : idcliente, "forma_pago" : forma_pago, "total_venta" : total_venta};
            
            //Get DetalleVenta values
            $('#tDetalleVenta > tbody  > tr').each(function(row) {        
                detalleVenta[row+1]={
                    "dvCodProducto" : $(this).find('td:eq(0)').html()
                    , "dvDetalle" :$(this).find('td:eq(1)').html()
                    , "dvPUnitario" :$(this).find('td:eq(2)').html()
                    , "dvCantidad" : $(this).find('td:eq(3)').html()
                    , "dvTotal" : $(this).find('td:eq(4)').html()
                }        
            });
                
            var myJSONText = JSON.stringify( detalleVenta );    
            //console.log(myJSONText);
        
            $.ajax({
                type: 'POST',
                url: 'index.php?controlador=Venta&accion=crear',
                data: { dvArray : myJSONText },
                success: function(result) {            
                    //console.log(result);
                    if (result) {
                        document.getElementById("btnRegistrar").disabled = true;
                        alert('Venta Registrada con éxito.');
                    }
                }
            });
        } else {
            //alert('No hay productos para vender.'+detalles);
            return false;
        }                
    } else {
        //console.log('No hay productos para vender.'+detalles);
        return false;
    }            
}

function valoresProducto(idproducto){
    var parametros = {
        "idproducto" : idproducto
    };
    $.ajax({
            data:  parametros,                   
            url:   'index.php?controlador=Venta&accion=getProducto',
            type:  'post',
            dataType: "json", //JSON
            beforeSend: function () {
                    //$("#resultado").html("Procesando, espere por favor...");
            },            
            success:  function (response) {                
                var json_obj = $.parseJSON(response);//parse JSON
                //console.log(json_obj);
                if (json_obj.idproducto == 'UNDEFINED') {                    
                    $("#stock").val('');
                    $("#precio_venta").val('');
                    //console.log(json_obj.idproducto);
                } else {                    
                    //$("#detalle").val(json_obj.detalle);
                    //alert(json_obj.detalle);
                    //$('input[name="detalle"]').val(json_obj.detalle);
                    $("#stock").val(json_obj.stock);
                    $("#precio_venta").val(json_obj.precio_venta);

                    if (parseInt(json_obj.stock)<=0) {
                        alert('Producto no disponible en stock.');
                        $("#detalle").val('0');
                        $("#stock").val('');
                        $("#precio_venta").val('');
                    }

                    //console.log(json_obj.idproducto);                    
                }                
            },
            error:  function (error) {
                //console.log(error);
            }
    });

}