$(document).ready(function(){

    // Find and remove selected table rows
    $("#add-row").click(function(){
        var producto = $("#codigo").val();                    
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

});

function newTotal() {
    var total = 0;
    $('#tDetalleVenta > tbody  > tr').each(function() {
        var cellValue = $(this).find('td:eq(3)').html();
        total = parseFloat(total) + parseFloat(cellValue);  
        total = total.toFixed(2);
    });
    return total;
}

function setRowPrice(tableId, rowId, colNum, newValue)
{
    $('#'+tableId).find('tr#'+rowId).find('td:eq('+colNum+')').html(newValue);
};