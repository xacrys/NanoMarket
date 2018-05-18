//jQuery DOM
$(document).ready(function(){
    
    // Find and remove selected table rows
    $("#add-row").click(function(){
        var producto = $("#detalle").val();                    
        var stock = parseFloat($("#stock").val());
        var pventa = parseFloat($("#precio_venta").val());
        var cantidad = parseInt($("#cantidad").val());

        if (cantidad > stock) {
            alert ('Cantidad no disponible en stock.');
            return;
        }

        if (producto != '' && pventa > 0 && cantidad > 0) {
            var stotal = pventa * cantidad;
            stotal = stotal.toFixed(2);
            var check = "<td><input type='checkbox' name='record'></td>";
            var markup = "<tr><td>"+producto+"</td><td>"+pventa+"</td><td>"+cantidad+"</td><td>"+stotal+"</td>"+check+"</tr>"; // Create <tr> with HTML
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

    // Find and remove selected table rows
    $("#btnRegistrar").click(function(){        
        //tfootId
        var tot = getTotalVenta("tDetalleVenta", "tfootId", "1");
        alert(tot);
    });

 $("#btnNuevo").click(function(){        
        //tfootId
        $("table tbody").find('input[name="record"]').each(function(){                        
            $(this).parents("tr").remove(); 
        });
        setRowPrice("tDetalleVenta", "tfootId", "1", 0 );
    });
    

    $("#producto").change(function () {
        $("#producto option:selected").each(function () {
            id_producto = $(this).val();
            valoresProducto(id_producto);
        });
    })

});

function valoresProducto(idproducto){
    var parametros = {
        "idproducto" : idproducto
    };
    $.ajax({
            data:  parametros,                   
            url:   'index.php?controlador=Venta&accion=valores',
            type:  'post',
            dataType: "json", //JSON
            beforeSend: function () {
                    //$("#resultado").html("Procesando, espere por favor...");
            },
            success:  function (response) {                
                var json_obj = $.parseJSON(response);//parse JSON
                console.log(json_obj);
                if (json_obj.idproducto == 'UNDEFINED') {                    
                    $("#stock").val('');
                    $("#precio_venta").val('');
                    alert('El Producto no existe.');
                } else {                    
                    $("#detalle").val(json_obj.detalle);
                    //alert(json_obj.detalle);
                    //$('input[name="detalle"]').val(json_obj.detalle);                                
                    $("#stock").val(json_obj.stock);
                    $("#precio_venta").val(json_obj.precio_venta);                                                
                }                
            }
    });

}

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
                } else {
                    $("#nombre").val(json_obj.nombre);
                    $("#apellido").val(json_obj.apellido);                                                
                }                
            }
    });
}

function newTotal() {
    var total = 0;
    $('#tDetalleVenta > tbody  > tr').each(function() {
        var cellValue = $(this).find('td:eq(3)').html();
        total = parseFloat(total) + parseFloat(cellValue);  
        total = total.toFixed(2);
    });
    return total;
}

function setRowPrice(tableId, rowId, colNum, newValue) {
    $('#'+tableId).find('tr#'+rowId).find('td:eq('+colNum+')').html(newValue);
}

function getTotalVenta(tableId, rowId, colNum) {
    return $('#'+tableId).find('tr#'+rowId).find('td:eq('+colNum+')').html();
}


