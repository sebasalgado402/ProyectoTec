let idClienteVenta;

let datosCargar;
let objetoCargar ;
let existenciaMax = 0;

let precioTotal;
let resultadoPrecioTotal;

let idArticulo;
let subTotal_detalle;

let contadorBotonFactura = 0;
let arrayArticulos =[];

let art_id;
let i=1;
///////////////////////////////////////////////////////
$(function() {

    
    
    //Búsqueda de cliente
    $('#txt_id_cliente').keyup(function(){
        event.preventDefault();
    
    
        var cliente = $('#txt_id_cliente').val();
        var action = 'searchCliente';
    
    
         $.ajax({
            url: 'funciones.php',
            type: "POST",
            async: true,
            data: {action:action,cliente:cliente},
    
    
            success: function(response)
            {
               ////console.log(response);
               if(response == 0){
                   $('#txt_id_cliente').val('');
                   $('#txt_nombre_cliente').val('');
                   $('#txt_direccion_cliente').val('');
                   $('#txt_telefono_cliente').val('');
                   
                }else{
                   
                    var data = $.parseJSON(response);
                    idClienteVenta = data.id_cliente;
                   $('#txt_id_cliente').val(data.id_cliente);
                   $('#txt_nombre_cliente').val(data.nombre);
                   $('#txt_direccion_cliente').val(data.direccion);
                   $('#txt_telefono_cliente').val(data.telefono);
                   
               }
            },
            error: function(error){
                ////console.log(response);
            }
        }); 
    }); 

    //Autocompletar
    //Búsqueda de producto

    $('#txt_descripcion').keyup(function(){
        event.preventDefault();
    
    
        var art = $('#txt_descripcion').val();
        var articulo = art.trim();
        var action = 'searchArticulo';
    
    
         $.ajax({
            url: 'funciones.php',
            type: "POST",
            async: true,
            data: {action:action,articulo:articulo},
    
    
            success: function(response){
                
               
               if(response == 0){
                  //console.log(response);
                  
                }else{ 
                    var data = $.parseJSON(response);
                    datosCargar = data;
                   

                    $( "#txt_descripcion" ).autocomplete({
                        source: data.descripcion
                    });

                }
            },
            error: function(error){
               
            }
        }); 
    }); 
    
    $('#txt_descripcion').change(function(){
        if($('#txt_descripcion').val() !== ''){
            
            let idaction = 'searchIdArticulo';
            let idarticulo = datosCargar.id[0];
            
            tomarIdArticulo(idaction,idarticulo)
            
        }else if($('#txt_descripcion').val() == ""){
            
            limpiarCamposArt();
        }
    });
        
    ////El JSON que viene desde php , lo decodifica y obtengo los datos del artículo
    function tomarIdArticulo(idaction,idarticulo) {
              
    
                
    $.ajax({
        url: 'funciones.php',
        type: "POST",
        async: true,
        data: {idAction:idaction,idArticulo:idarticulo},
        
        
        success: function(response){
            
            
            if(response == 0){
                
            }
            objetoCargar = $.parseJSON(response);
            
            //console.log("este es el json"+response);
            
            $('#th_id_articulo').html(objetoCargar.id);
            $('#th_precio').html(objetoCargar.precio);
            idArticulo = objetoCargar.id;
            existenciaMax = objetoCargar.cantidad;
            precioTotal = objetoCargar.precio;
            
            $('#th_existencia').html(objetoCargar.cantidad); 

        },
        error: function(error){

        }
    });
}
///////////////////////////////////////////////////////
//////Función que se ejecuta cada vez que suelto una tecla en el elemento con ese ID
      $('#txt_Cantidad').change(function(){
        
        if($('#txt_Cantidad').val() !== ''){
            existenciaMax = $('#txt_Cantidad').val();
            

    if ( existenciaMax <= parseInt(objetoCargar.cantidad) && existenciaMax >=1 && $('#txt_Cantidad').val() !==''){
        calcularPrecioTotal();
        $( "#btnAgregarFactura" ).prop('disabled', false);  //quito la propiedad "disabled" al elemento con ese ID
    }else if(existenciaMax > parseInt(objetoCargar.cantidad) || existenciaMax <= 0){
        calcularPrecioTotal();
            $( "#btnAgregarFactura" ).prop('disabled', true);   //agrego la propiedad "disabled" al elemento con ese ID
    }
    
    }else{
        
        $( "#btnAgregarFactura" ).prop('disabled', true);   //agrego la propiedad "disabled" al elemento con ese ID
    }
    }); 
///////////////////////////////////////////////////////
////Función que limpia los campos de los articulos
    function limpiarCamposArt(){
        $('#th_id_articulo').html('');
        $('#txt_descripcion').val('');
        $('#th_precio').html('');
        $('#txt_Cantidad').val('');
        $('#th_existencia').html('');
        $('#th_precioTotal').html('');
    }
///////////////////////////////////////////////////////
////Calcular precioTotal
    function calcularPrecioTotal(){
        let num = $('#txt_Cantidad').val();
        //console.log("numero de input cantidad: "+num);
        //console.log("numero del precio total recibido : "+precioTotal);
        resultadoPrecioTotal = parseInt(precioTotal) * parseInt(num);
        //console.log("resultado va a ser igual = "+resultadoPrecioTotal);
        $('#th_precioTotal').html("$ "+resultadoPrecioTotal);
    }
    ///////////////////////////////////////////////////////
////Agregar producto al detalle    
    function agregarProducto(){
        
        //let idArticulo = $('#th_id_articulo').val();
        let descripcion = $('#txt_descripcion').val();
        let cantidad = $('#txt_Cantidad').val();
        //let precioTotal = $('#th_precioTotal').val();
        
        //console.log("Este es el id"+idArticulo);
        textoInsertado = `
        <tr>
        <th scope="col-1" id="${contadorBotonFactura}idArticulo_detalle">
            ${idArticulo} 
        </th>
        <th scope="col-1" id="${contadorBotonFactura}descripcion_detalle">
            ${descripcion}
        </th>
       
        <th scope="col-1" id="${contadorBotonFactura}cantidad_detalle"> 
            ${cantidad}
        </th>
       
        <th scope="col-1" id="${contadorBotonFactura}precioTotal_detalle">
            ${resultadoPrecioTotal}
            </th>
        </tr>
        `;
        $('#tbody_detalle').append(textoInsertado);
            articulo = new Object();
            articulo.idCliente = idClienteVenta;
            articulo.nroRenglon = i;
            articulo.id_articulo = idArticulo;
            articulo.nombre = descripcion;
            articulo.cantidad = cantidad;
            articulo.precioTotal = resultadoPrecioTotal;
            arrayArticulos.push(articulo);
        
            i+=1;
        limpiarCamposArt();
        
        
    }
////Al dar click al boton agregar factura.. se ejecuta el bloque de codigo..    
    $('#btnAgregarFactura').click(function(){
        contadorBotonFactura+=1;
        //console.log("Articulos en factura : "+contadorBotonFactura);
        event.preventDefault();
        agregarProducto();
        limpiarCamposArt();
        $( "#btnAgregarFactura" ).prop('disabled', true);


    });
    //////////////////////////////////////////////////////////
    $('#btnProcesarCompra').click(function(){
         event.preventDefault();
        
        //console.log(arrayArticulos); 
        

        
        var action = 'procesarVenta';

        $.ajax({
            url: 'funciones.php',
            type: "POST",
            async: true,
            data: {action:action,detalleF:arrayArticulos,clienteVenta:idClienteVenta},
            
            
            success: function(response){
                
                
                if(response == 0){
                    
                }
                //console.log(response);
                //objetoCargar = $.parseJSON(response);
                
               

            },
            error: function(error){
    
            }
        });  

        location.reload() ;
    });
    ///////////////////////////////////////////////////////////
    $('#btnGenerarFactura').click(function(){
        event.preventDefault();
        
        //console.log(arrayArticulos); 
        

        
        var action = 'generaFactura';

        $.ajax({
            url: 'funciones.php',
            type: "POST",
            async: true,
            data: {action:action,detalleF:arrayArticulos,clienteVenta:idClienteVenta},
            
            
            success: function(response){
                
                
                if(response == 0){
                    
                }
                //console.log(response);
                //objetoCargar = $.parseJSON(response);
                
               

            },
            error: function(error){
    
            }
        });  
        $('#btnGenerarFactura').attr('disabled', true);
        $('#btnProcesarCompra').attr('disabled', false);
    });

    ////////////////////////////////////////////////////////////////
    $('#btnAnularCompra').click(function(){
        location.reload() ;
    });
    ////////////////////////////////////////////////////////////////


    //Boton que modifica el articulo en modal
    $("#modalModificar").click(function(e){
        e.preventDefault();
        let arrModificar = [];
        let id = art_id;
        let categoria = $('#modal_modificiarArticulo__Categoria').val();
        let nombre = $('#modalArt__modificarNombre').val();
        let precio = $('#modalArt__modificarPrecio').val();
        let stock = $('#modalArt__modificarStock').val();
        let costo = $('#modalArt__modificarCosto').val();
        let descripcion = $('#modalArt__modificarDescripcion').val();
        let materiales = $('#modalArt__modificarMateriales').val();

        arrModificar.push(id,categoria,nombre,precio,stock,costo,descripcion,materiales);

        //console.log("este es el array a modificar"+arrModificar);

        let action = 'modalModificar_Articulo'

        $.ajax({
            url: 'ajax.php',
            type: "POST",
            async: true,
            data: {action:action,modalModificar_Articulo:arrModificar},
            
            
            success: function(response){
                
                
                if(response == 0){
                    alert('Húbo un error al modificar');
                }
                data = $.parseJSON(response);
                //console.log(data);
                if(data== 1){
                    location.reload();
                }


            },
            error: function(error){
                
            }
        });  

    });
    
    //Termina---Boton que modifica el articulo en modal
    
    //MODAL FORMULARIO MODIFICAR POR ID
    $("[id^='modificar__Articulo']").click(function(e){
        e.preventDefault();
        art_id = $(this).attr('data-art_id');
        
        //console.log(art_id);
        
        let action = 'modificarArticulo';
        
        $.ajax({
            url: 'ajax.php',
            type: "POST",
            async: true,
            data: {action:action,modificar__Articulo:art_id},
            
            
            success: function(response){
                
                
                if(response == 0){
                    //console.log("error " + response);
                }
                let data =$.parseJSON(response);
                //console.log(data);
                let innerHTML = `
                <form action="articulos.php" method="post" class="col-12">
                
                <div class="row">
                
                <div class="col-12">
                <label for="modalArt__modificarNombre" class="form-label" >Nombre:</label>
                <input type="text" class="form-control" name="modalArt__modificarNombre" id="modalArt__modificarNombre" value="${data.art_nom}">
                </div>
                </div>
                <div class="row pt-2">

                <div class="col-3">
                <label for="precioArticulo" class="form-label">Precio:</label>
                <input type="number" class="form-control" name="precioArticulo" id="modalArt__modificarPrecio" value="${data.art_precio}" required>
                </div>
                <div class="col-3">
                <label for="cantidadArticulo" class="form-label">Stock:</label>
                <input type="number" class="form-control" name="cantidadArticulo" id="modalArt__modificarStock" value="${data.art_stock}" required>
                </div>
                
                <div class="col-6">
                <label for="costoCreacionArticulo" class="form-label">Costo de creación:</label>
                <input type="number" class="form-control" name="costoCreacionArticulo" id="modalArt__modificarCosto" value="${data.art_costo}">
                
                </div>
                </div>
                
                
                
                <div class="row p-2">
                
                
                
                <label class="form-label" for="descripcionArticulo" >Descripcion:</label>
                <textarea class="form-control" name="descripcionArticulo" rows="4" cols="50" id="modalArt__modificarDescripcion">${data.art_desc}</textarea>
                <label class="form-label" for="MaterialesArticulo">Materiales:</label>
                <textarea class="form-control" name="MaterialesArticulo" rows="4" cols="50" id="modalArt__modificarMateriales">${data.art_materiales}</textarea>
                
                
                </div>
                </form>
                
                </div>
                `;
                $('.cargaModal').html(innerHTML);
                $('#categoria').html(data.cat_nom);
                $('select option[value="'+data.categoria+'"]').attr("selected", true);
                
                
                
                
            },
            error: function(error){
                
            }
        });  
        
    });
    //Termina - MODAL FORMULARIO MODIFICAR POR ID

    //Botón de ingresar nuevo Artículo
    $("#btn__ingresarArticulo").click(function(e){
        e.preventDefault();
        let producto = [];
        let codigo = $('#txt__codArticulo').val();
        let nombre = $('#txt__nombreArticulo').val();
        let categoria = $('#select__categoria').val();
        let precio = $('#txt__precioArticulo').val();
        let stock = $('#txt__cantidadArticulo').val();
        let costo = $('#txt__costoCreacionArticulo').val();
        let descripcion = $('#txt__descripcionArticulo').val();
        let materiales = $('#txt__materialesArticulo').val();

        producto.push(codigo,nombre,descripcion,precio,stock,costo,categoria,materiales);


        let action = 'nuevoArticulo'

        $.ajax({
            url: 'ajax.php',
            type: "POST",
            async: true,
            data: {action:action,nuevoArticulo:producto},
            
            
            success: function(response){
                
                
                if(response == 0){
                    alert('Húbo un error al ingresar nuevo producto');
                }
                data = $.parseJSON(response);
                ////console.log(data);
                if(data== true){
                    location.reload();
                }else if(data == 'dato duplicado'){
                    alert('Ya existe un articulo con ese ID');
                }else if(data == 'Faltan datos'){
                    alert('Complete campos obligatorios');
                }
                
                


            },
            error: function(error){
                
            }
        });  

    });
    //Termina - Botón de nuevo Artículo

    //MODAL FORMULARIO MODIFICAR POR ID
    $("[id^='eliminar__Articulo']").click(function(e){
        e.preventDefault();
        art_id = $(this).attr('data-art_id');
        //console.log(art_id);
        
        let action = 'eliminarArticulo';
        
        $.ajax({
            url: 'ajax.php',
            type: "POST",
            async: true,
            data: {action:action,eliminar__Articulo:art_id},
            
            
            success: function(response){
                
                
                if(response == 0){
                    //console.log("error " + response);
                }
                let data =$.parseJSON(response);
                //console.log("entro a eliminar el articulo: "+response);
                let innerHTML = `
                <h4 class="text-center m-5"> ¿Seguro desea eliminar ${data}? </h4> 
                `
                $('#datos_modalEliminar').html(innerHTML);
               
                
                
            },
            error: function(error){
                
            }
        });  
        
    });
    //Termina - MODAL FORMULARIO MODIFICAR POR ID

    //Boton que ELIMINA ARTICULO EN MODAL
    $("#modalEliminar").click(function(e){
        e.preventDefault();
        
        let action = 'modalEliminar_Articulo'

        $.ajax({
            url: 'ajax.php',
            type: "POST",
            async: true,
            data: {action:action,modalEliminar_Articulo:art_id},
            
            
            success: function(response){
                
                
                if(response == 0){
                    alert('Húbo un error al Eliminar');
                }
                data = $.parseJSON(response);
                //console.log(data);
                   if(data== true){
                    location.reload();
                }else{
                    alert('Húbo un error al Eliminar');
                }


            },
            error: function(error){
                
            }
        });  

    });
    
    //Termina---Boton que ELIMINA ARTICULO EN MODAL
});