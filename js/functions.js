
//
let imgProductoID;
let i=1;
//
//Parte FACTURACIÓN--->
let id_articuloAgregar;
let nombre_articuloAgregar;
let cantidad_articuloAgregar;
let precio_articuloAgregar;

let precioArticulo;
//Parte FACTURACIÓN<---
///////////////////////////////////////////////////////
//función que limpia los campos de agregar producto a factura
    function limpiarCamposArt(){
        $('#th_id_articulo').html('');
        $('#txt_descripcion').val('');
        $('#th_precio').html('');
        $('#txt_Cantidad').val('');
        $('#txt_Stock').val('');
        $('#txt_precioTotal').val('');

    }
    //Termina---función que limpia los campos de agregar producto a factura
$(function() {
    
   //Boton que anula la compra
   $('#btnAnularCompra').click(function(){
        window.location.href = "./principal.php";
    });
    //Termina---Boton que anula la compra
    
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
            url: './../js/ajax.php',
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

    let imagenActual;
    $("[id^='modificar__Articulo']").click(function(e){
        e.preventDefault();
        art_id = $(this).attr('data-art_id');
        
        //console.log(art_id);
        
        let action = 'modificarArticulo';
        
        $.ajax({
            url: './../js/ajax.php',
            type: "POST",
            async: true,
            data: {action:action,modificar__Articulo:art_id},
            
            
            success: function(response){
                
                
                if(response == 0){
                    //console.log("error " + response);
                }
                let data =$.parseJSON(response);
                console.log(data);
                let innerHTML = `
                <form action="articulos.php" method="post" class="col-12">
                
                <div class="row">
                
                    <div class="col-12">
                        <label for="modalArt__modificarNombre" class="form-label" >Nombre:</label>
                        <input type="text" class="form-control" name="modalArt__modificarNombre" id="modalArt__modificarNombre" value="${data.art_nom}">
                    </div>
                
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
                `;

                imagenActual = data.art_imagen;
                
                
                //$("#selectedId option : selected").val(data.categoria);
                $('select option[value='+data.art_categoria+']').attr("selected", true);
                console.log('la categoria seleccionada es: '+data.art_categoria);
                $('.cargaModal').html(innerHTML);
                $('#categoria').html(data.cat_nom);
                
                
                
                
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
            url: './../js/ajax.php',
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

    //MODAL FORMULARIO ELIMINAR POR ID
    $("[id^='eliminar__Articulo']").click(function(e){
        e.preventDefault();
        art_id = $(this).attr('data-art_id');
        //console.log(art_id);
        
        let action = 'eliminarArticulo';
        
        $.ajax({
            url: './../js/ajax.php',
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
    //Termina - MODAL FORMULARIO ELIMINAR POR ID

    //Boton que ELIMINA ARTICULO EN MODAL
    $("#modalEliminar").click(function(e){
        e.preventDefault();
        
        let action = 'modalEliminar_Articulo'

        $.ajax({
            url: './../js/ajax.php',
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

    //Botón que agrega nueva categoría (Articulos)
    $("#modalnuevaCategoria").click(function(e){
        e.preventDefault();
        
        arrayCat=[];
        arrayCat.push($('#txt__nombre_nuevaCategoria').val());
        arrayCat.push($('#txt__observacion_nuevaCategoria').val());
       
        
        let action = 'modalnueva_Categoria'

        $.ajax({
            url: './../js/ajax.php',
            type: "POST",
            async: true,
            data: {action:action,modalnueva_Categoria:arrayCat},
            
            
            success: function(response){
                
                
                if(response == 0){
                    alert('Húbo un error al Agregar categoría');
                }
                data = $.parseJSON(response);
                //console.log(data);
                   if(data== true){
                    location.reload();
                }


            },
            error: function(error){
                
            }
        });  

    });
    
    //Termina---Botón que agrega nueva categoría (Articulos)

    //Cambiar imagen producto
    var id_imagenCambiar;
    $("[id^='imgProducto']").click(function(e){
        e.preventDefault();
        imgProductoID = $(this).attr('data-art_id');

        let action = 'cambiar__imgProducto';
        
        $.ajax({
            url: './../js/ajax.php',
            type: "POST",
            async: true,
            data: {action:action,cambiar__imgProducto:imgProductoID},
            
            
            success: function(response){
                
                
                if(response == 0){
                    console.log("error: " + response);
                }
                let data =$.parseJSON(response);
                //console.log("entro a eliminar el articulo: "+response);

               /*  div class="mb-3">
                    <label for="formFile" class="form-label">Seleccione nueva imagen</label>
                    <input class="form-control" type="file" name="subir_archivo" id="formFile" >
                </div>< */

                let innerHTML = `
                
                <h4>Imagen actual:</h4>
                <div class="col-auto text-center">
                <img src="${data.art_imagen}" alt="Error al cargar imagen" height="280" data-art_id='' id='image_gallery'> 
                </div>
                `;
                id_imagenCambiar = data.art_id;
                
                //console.log('el id imagen es: '+(data.art_id));
                $('#datos_modalProductoIMG').html(innerHTML);
                $('#idarticuloIMG').html(id_imagenCambiar);

                $('#formFile').attr("value",data.art_imagen);
                
                console.log($('#formFile').val());
                
                $('#formFile').change(function(e){
                    
                   console.log($('#formFile').val());
                   
                });
                $('#cancelar_cambiarImagen').click(function(e){
                    
                    
                    data.art_id = '';
                   console.log('esto es el id: '+data.art_id);

                });
                $('.btn-close').click(function(e){
                    
                    data.art_id = '';
                   console.log('esto es el id: '+data.art_id);

                });

                
            },
            error: function(error){
                
            }
        });  
        //datos_modalProductoIMG
    });
    
        //Boton que cambia imagen

        $('#archivo').change(function(e){
            //console.log($('#archivo').val());
            let newStr = $('#archivo').val().slice(12);
            $('#recibeNombre_img').val(newStr);
            console.log(newStr);
        });

        $("#form_cambiarImagen").on("submit", function(e){
            e.preventDefault();
            var f = $(this);
        
            var formData = new FormData(document.getElementById("form_cambiarImagen"));
            formData.append("dato", "valor");
            formData.append('idArticulo',id_imagenCambiar);
            

            $.ajax({
                url: "./../js/ajax.php",
                type: "post",
                dataType: "html",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,

                success: function(response){
                    if(response){
                        location.reload();
                    }else{
                        console.log('hubo un error'+response);
                    }
                }
            })
            

        });
    
        
        
    
        //Termina---Boton que cambia imagen
        //Termina---Cambiar imagen producto

        //Buscar articulo por nombre en FACTURACIÓN
        
        $('#txt_descripcion').keyup(function(e){
            e.preventDefault();
        
            let art = ($('#txt_descripcion').val()).trim();
            console.log(art);
            let articulo = art.trim();
            let action = 'searchArticulo';
        
        
             $.ajax({
                url: './../js/ajax.php',
                type: "POST",
                async: true,
                data: {action:action,articulo:articulo},
        
        
                success: function(response){
                    
                   
                   if(response == 0){
                      //console.log(response);
                      
                    }else{ 
                        var data = $.parseJSON(response);
                        let datosCargar = data;
                        console.log(data);
                        
                        $( "#txt_descripcion" ).autocomplete({
                            source: datosCargar.nombre
                        });
                       
                            $( "#txt_descripcion" ).change(function(e){
                                
                                art = ($('#txt_descripcion').val()).trim();
                                articulo = art.trim();
                                action = 'searchArticulo';
                                $.ajax({
                                    url: './../js/ajax.php',
                                    type: "POST",
                                    async: true,
                                    data: {action:action,articulo:articulo},
                                    
                                    
                                    success: function(response){
                                        
                                        
                                        if(response == 0){
                                            //console.log(response);
                                            
                                        }else{ 
                                            var data = $.parseJSON(response);
                                            let datosCargar = data;
                                                $( "#txt_descripcion" ).html(datosCargar.nombre);
                                                $( "#th_id_articulo" ).html(datosCargar.id);
                                                $( "#th_precio" ).html(datosCargar.precio);
                                                $( "#txt_Stock" ).val(datosCargar.stock);
                                                $( "#txt_precioTotal" ).html(datosCargar.precio);
                                                precioArticulo = parseInt(datosCargar.precio);

                                                id_articuloAgregar = datosCargar.id;
                                                nombre_articuloAgregar = datosCargar.nombre;

                                            }
                                        },
                                        error: function(error){
                                            
                                        }
                                    }); 
                                    
                                });
                                
                                
                            }
                },
                error: function(error){
                    
                }
            }); 
            
        });
        //Termina---Buscar articulo por nombre en FACTURACIÓN
        
        //Habilitar BOTON AGREGAR FACTURA
        $( "#txt_Cantidad" ).change(function(e){
            e.preventDefault();
            parseInt($( "#txt_Cantidad" ).val());
            let precioTotal =  parseInt($( "#txt_Cantidad" ).val()) * precioArticulo;
            parseInt($( "#txt_precioTotal" ).val(precioTotal));

            cantidad_articuloAgregar = $( "#txt_Cantidad" ).val();
            precio_articuloAgregar = precioTotal;
            
            if( parseInt($( "#txt_Cantidad" ).val()) >= 1 && parseInt($( "#txt_Cantidad" ).val()) <= parseInt($( "#txt_Stock" ).val())){
                $('#btnAgregarFactura').attr('disabled', false);
            }else{
                $('#btnAgregarFactura').attr('disabled', true);
            }
            
        }); 
        
        
        //Termina---Habilitar BOTON AGREGAR FACTURA
        
        // Funcionamiento de botón que agrega el articulo a la factura
        let contadorBotonFactura = 1;
        let arrayArticulos = [];
        let arraySubtotal = [];
        
        
        $( "#btnAgregarFactura" ).click(function(e){
                //let idArticulo = $('#th_id_articulo').val();
                let descripcion = $('#txt_descripcion').val();
                let cantidad = $('#txt_Cantidad').val();
                //let precioTotal = $('#th_precioTotal').val();
                
                //console.log("Este es el id"+idArticulo);
                textoInsertado = `
                <tr>
                <th scope="col-1" class="align-middle" id="${contadorBotonFactura}idArticulo_detalle">
                ${id_articuloAgregar} 
                </th>
                <th scope="col-1" class="align-middle" id="${contadorBotonFactura}descripcion_detalle">
                ${nombre_articuloAgregar}
                </th>
                
                <th scope="col-1" class="align-middle" id="${contadorBotonFactura}cantidad_detalle"> 
                ${cantidad_articuloAgregar}
                </th>
                
                <th scope="col-1" class="align-middle" id="${contadorBotonFactura}precioTotal_detalle">
                ${precio_articuloAgregar}
                </th>
                </tr>
                `;
                $('#tbody_detalle').append(textoInsertado);
                articulo = new Object();
                //articulo.idCliente = idClienteVenta;
                articulo.nroRenglon = i;
                articulo.id_articulo = id_articuloAgregar;
                articulo.nombre = nombre_articuloAgregar;
                articulo.cantidad = cantidad_articuloAgregar;
                articulo.precioTotal = precio_articuloAgregar;
                arrayArticulos.push(articulo);
                arraySubtotal.push(precio_articuloAgregar);
                    console.log(arrayArticulos);
                    i+=1;
                    limpiarCamposArt();

                    $('#btnAgregarFactura').attr('disabled', true);
                    $('#btnProcesarCompra').attr('disabled', false);
                    
                    let subTotal = arraySubtotal.reduce((a, b) => a + b, 0);
                    $('#txt_subtotalDetalle').val(subTotal);

                    let porcentajeIva = $('#txt_ivaDetalle').val();
                    let ivaConcatenado = '1.'+porcentajeIva;

                    let totalIva = (subTotal) * (ivaConcatenado) ;
                    $('#txt_totalDetalle').val(totalIva);

                        $('#txt_ivaDetalle').keyup(function(e){
                            porcentajeIva = $('#txt_ivaDetalle').val();
                            ivaConcatenado = '1.'+porcentajeIva;
                            totalIva = (subTotal) * (ivaConcatenado) ;
                            $('#txt_totalDetalle').val(totalIva);
                        });
            });
                
                
                //Termina---Funcionamiento de botón que agrega el articulo a la factura
        
        //Boton que procesa la factura
        $( "#btnProcesarCompra" ).click(function(e){
            let action ='procesarVenta';
            $.ajax({
                url: './../js/ajax.php',
                type: "POST",
                async: true,
                data: {action:action,procesarVenta:arrayArticulos},
                
                
                success: function(response){
                    
                    
                    if(response == 0){
                        alert('Húbo un error al enviar articulos 1');
                    }
                    data = $.parseJSON(response);
                    //console.log(data);
                    if(data==true){
                        alert('Venta realizada con éxito');
                        window.location.href = "./principal.php";
                    }else{
                        alert('Húbo un error al realizar venta');
                    }
    
    
                },
                error: function(error){
                    
                }
            });  
        });

        //Termina---Boton que procesa la factura

        //Boton que permite ver factura seleccionada
        
        /* $("[id^='ver_Factura']").click(function(e){
            e.preventDefault();
            fact_id = $(this).attr('data-fact_id');
            //alert(fact_id);
            
            let action = 'ver_facturaSeleccionada';
            
            $.ajax({
                url: './../maderastablas/pdf/ver_factura.php',
                type: "POST",
                async: true,
                data: {action:action,ver_Factura:fact_id},
                
                
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
            
        }); */
        
        //Termina---Boton que permite ver factura seleccionada

        //Buscador Ecommerce 

        $( "#txt_search" ).keyup(function(e){
            let action = 'buscar_ecommerce';
            let buscar = $("#txt_search").val();
            $.ajax({
                url: './../js/ajax.php',
                type: "POST",
                async: true,
                data: {buscar_ecommerce:buscar},
                
                
                success: function(response){
                    
                    
                    if(response == 0){
                        //console.log("error " + response);
                    }else{
                        let resultado = response.slice(17);
                        $('.product-container').html(resultado);
                        console.log(resultado);
                    }
                    //let data =$.parseJSON(response);
                    //console.log("entro a eliminar el articulo: "+response);
                    
                   
                    
                    
                },
                error: function(error){
                    
                }
            }); 
        });

        //Termina --- Buscador Ecommerce

});

