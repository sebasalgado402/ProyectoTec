
<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <?php 
    session_start();
    include("./../assets/js/funciones.php");
    comprobarUsuario();
    ?>
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Link a mis estilos -->
    <link rel="stylesheet" href="./../assets/css/style.css"> 
    <!--Icono en la pestaña -->
    <link rel="shortcut icon" href="./../assets/icons/favicon.png">
    <!--Iconos de bootstrap  -->
    <!-- <link rel="stylesheet" href="./../bootstrapIcons/font/bootstrap-icons.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!--Estilos Bootstrap -->
    <!-- <link href="./../bootstrap/css/bootstrap.min.css" rel="stylesheet" > -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" >
    <!-- Estilos jQueryUI -->
    <link rel="stylesheet" href="./../jQueryUI/jquery-ui.css">
    <link rel="stylesheet" href="./../jQueryUI/jquery-ui.structure.css">
    <link rel="stylesheet" href="./../jQueryUI/jquery-ui.theme.css">

   

    <title>Articulos</title>
</head>
<body>
   
   
<!-- MODAL MODIFICAR ARTICULO-->
        
<div class="modal fade" id="modal_modificarArticulo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Modificar Articulo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-5 pt-1 pb-1">
            
            <div class="col-12">
                    <label for="modal_modificiarArticulo__Categoria" class="form-label">Elija la categoria:</label>
                    <select name="modal_modificiarArticulo__Categoria" id="modal_modificiarArticulo__Categoria" class="form-select">
                    
                    <?php 
                        cargarCategorias(); 
                    ?>
                    </select>
                    
            </div>
           
                <div class="col-12 cargaModal">
                  no se cargaron los datos
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="modalModificar">Modificar articulo</button>
            </div>
        </div>
            
      </div>
    </div>
    </div>
    
    <!-- Termina MODAL MODIFICAR ARTICULO -->

<!-- MODAL ELIMINAR ARTICULO-->
        
<div class="modal fade" id="modal_eliminarArticulo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Eliminar Articulo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-5 pt-1 pb-1" id="datos_modalEliminar">
            
            </div>
            
                <div class="modal-footer">
                <button type="button" class="btn btn-outline-success" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger" id="modalEliminar">Eliminar articulo</button>
            </div>
            </div>
            
        </div>
    </div>
    </div>
         
    <!-- Termina MODAL ELIMINAR ARTICULO -->

<!-- MODAL Nueva Categoría-->
        
<div class="modal fade" id="modal_nuevaCategoria" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modal_nuevaCategoria" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_nuevaCategoria">Insertar nueva categoria</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-5 pt-1 pb-1">
                <div class="col-12">
                    <label for="txt__nombre_nuevaCategoria" class="form-label">Nombre de la nueva categoria</label>
                  <input type="text" name="txt__nombre_nuevaCategoria" id="txt__nombre_nuevaCategoria" class="form-control">

                    <label for="txt__observacion_nuevaCategoria" class="form-label">Observacion</label>
                  <input type="text" name="txt__observacion_nuevaCategoria" id="txt__observacion_nuevaCategoria" class="form-control">
                    
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="modalnuevaCategoria">Añadir categoría</button>
            </div>
        </div>
            
    </div>
</div>
         
    <!-- Termina Nueva Categoría -->

<!-- MODAL cambiar Imagen producto-->
        
<div class="modal fade" id="modal_cambiarIMG" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modal_cambiarIMG" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_cambiarIMG">Cambiar Imagen</h5>
                
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

                <div class="modal-body p-5 pt-1 pb-1" id="datos_modalProductoIMG">
            
                </div>

            <form enctype="multipart/form-data" id="form_cambiarImagen" method="post">
            <h1 id='idarticuloIMG' name='idArticulo'></h1>
                Añadir imagen: <input name="archivo" id="archivo" type="file"/><br>
                <div class="alert alert-success" id='txt_avisoMensaje'>...</div>
                
                <input type="hidden" id='recibeNombre_img' name='nombreImg' />
                
                <input type="submit" name="subir" value="Subir_imagen"/> <br>
            </form>
            
            
                
                    
        </div>
    </div>
</div>
         
<!-- Termina cambiar Imagen producto -->


    
    <section>
        <?php
         include("./../assets/js/header.php");
        ?>
    </section>
    
    <?php 
       /*  if(isset($_POST['codArticulo']) && isset($_POST['nombreArticulo']) && isset($_POST['precioArticulo']) && isset($_POST['cantidadArticulo']) && isset($_POST['costoCreacionArticulo']) && isset($_POST['categoria']) && isset($_POST['descripcionArticulo']) && isset($_POST['MaterialesArticulo'])){
                nuevoArticulo($_POST['codArticulo'],$_POST['nombreArticulo'],$_POST['precioArticulo'],$_POST['cantidadArticulo'],$_POST['costoCreacionArticulo'],$_POST['categoria'],$_POST['descripcionArticulo'],$_POST['MaterialesArticulo']); 
        } */

    ?>

        <section id='section-search'>
            <div class="search-container">
                <label for="txt_search"></label>
                <div class="container">
                    <div class="row">
                        <input type="text" name="txt_search" id="txt_search" class='form-control col-4'>
                    </div>
                </div>
            </div>
        </section>

    <div class="container-fluid table-responsive ">
        <table class="table table-bordered table-primary table-sm vertical-align middle-align table-hover">
        <thead class="table-dark">
            <tr >
            <!-- <th scope="col-1">#</th> -->
            
            <th scope="col-1">Foto</th>
            <th scope="col-1">Id_Art</th>
            <th scope="col-1">Cod</th>
            <th scope="col-1">Nombre</th>
            <th scope="col-1">Precio</th>
            <th scope="col-1">Stock</th>
            <th scope="col-1">Costo creacion</th>
            
            
            <th scope="col-1">Categoria</th>
            <th scope="col-1">Observacion</th>
            <th scope="col-1">Materiales</th>
            <th scope="col-1">Notas</th>
            <th scope="col-1">Acción</th>
            
        </thead>
        <tbody class="text-center col-12">
            <?php
                mostrarArticulos();
            ?>
        </tbody>
        </table>
    </div>
 
</body>
    <!--Importa librería jquery -->
    <!-- <script src="./../jQuery/jquery.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <!--Importa librería jQueryUI -->
    <script src="./../jQueryUI/jquery-ui.min.js"></script>
    <!--Importa librería boostrap -->
    <!-- <script src="./../bootstrap/js/bootstrap.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <!--Importo javascript propio -->
    <script src="./../assets/js/functions.js"></script>
    <!--  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    -->
    </html>