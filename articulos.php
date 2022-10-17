
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include('funciones.php');
    ?>
    <meta charset="UTF-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="favicon.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="functions.js"></script>
    <title>Articulos</title>
</head>
<body>


    
    <section>
        <?php
        include('header.php');
        ?>
    </section>
    <div class="container-fluid form-control">
        <form action="articulos.php" method="post" class="offset-2 col-9">
            <h1 class="text-center display-4">Ingresar nuevo producto</h1>
            
            <div class="row">
                <div class="col-2">
                    <label for="codArticulo" class="form-label " >código de Artículo:<span style="color:red" title="Obligatorio">*</span></label>
                    <input type="text" class="form-control" name="codArticulo" id="txt__codArticulo" required>
                </div>
                <div class="col-10">
                    <label for="nombreArticulo" class="form-label" >Nombre:<span style="color:red" title="Obligatorio">*</span></label>
                    <input type="text" class="form-control" name="nombreArticulo" id="txt__nombreArticulo" required>
                </div>
            </div>

            <div class="row">

                <div class="col-4">
                    <label for="precioArticulo" class="form-label">Precio:</label>
                    <input type="number" class="form-control" name="precioArticulo" id="txt__precioArticulo" required>
                </div>
                <div class="col-4">
                    <label for="cantidadArticulo">Stock:<span style="color:red" title="Obligatorio">*</span></label>
                    <input type="number" class="form-control" class="form-label" name="cantidadArticulo" id="txt__cantidadArticulo" required>
                </div>
                <div class="col-4">
                    <label for="costoCreacionArticulo">Costo de creación:</label>
                    <input type="number" class="form-control" class="form-label" name="costoCreacionArticulo" id="txt__costoCreacionArticulo">
                </div>
                
            </div>

            <div class="row">
                <div class="offset-1 col-9">
                    <label for="categoria" class="form-label">Elija la categoria:<span style="color:red" title="Obligatorio">*</span></label>
                    <select name="categoria" id="select__categoria" class="form-select">
                    <option value="none">---</option>'
                    <?php 
                   
                        
                        cargarCategorias($conexion,$nombreBD); 
                   
                    ?>
                    </select>
                </div>
                <div class="row" id="container__btnCategoria">

                    <div class="col-12">
                    <button type="button" id="btnModal_nuevaCategoria" class="btn btn-primary form-control" data-bs-toggle="modal" data-bs-target="#modal_nuevaCategoria">
                    Nueva Categoría
                    </button>
                    </div>
                </div>
    
            </div>
            
            <div class="row">

                <label for="descripcionArticulo">descripcion:</label>
                <input type="text" class="form-control" class="form-label" name="descripcionArticulo" id="txt__descripcionArticulo">
    
                <label for="MaterialesArticulo">Materiales:</label>
                <input type="text" class="form-control" class="form-label" name="MaterialesArticulo" id="txt__materialesArticulo">
                <button type="submit" class="btn btn-outline-danger mt-2" id="btn__ingresarArticulo">Ingresar articulo nuevo</button>
            </div>
            
        </form>
    </div>
    <?php 
        if(isset($_POST['codArticulo']) && isset($_POST['nombreArticulo']) && isset($_POST['precioArticulo']) && isset($_POST['cantidadArticulo']) && isset($_POST['costoCreacionArticulo']) && isset($_POST['categoria']) && isset($_POST['descripcionArticulo']) && isset($_POST['MaterialesArticulo'])){
                nuevoArticulo($_POST['codArticulo'],$_POST['nombreArticulo'],$_POST['precioArticulo'],$_POST['cantidadArticulo'],$_POST['costoCreacionArticulo'],$_POST['categoria'],$_POST['descripcionArticulo'],$_POST['MaterialesArticulo']); 
        }

    ?>

    <div class="container-fluid col-sm-0 col-md-12 col-lg-12 mt-3 sm-0">
        <table class="table table-striped table-bordered table-primary">
        <thead class="table-dark">
            <tr >
            <!-- <th scope="col-1">#</th> -->
            
            <th scope="col-1">Id Articulo</th>
            <th scope="col-1">Código Articulo</th>
            <th scope="col-1">Nombre</th>
            <th scope="col-1">Precio</th>
            <th scope="col-1">Stock</th>
            <th scope="col-1">Costo creacion</th>
            <th scope="col-1">Vendible</th>
            <th scope="col-1">Deshabilitado</th>
            <th scope="col-1">Categoria</th>
            <th scope="col-1">Observacion</th>
            <th scope="col-1">Materiales</th>
            <th scope="col-1">Acción</th>
            </tr>
        </thead>
        <tbody class="text-center">
            <?php
                mostrarArticulos();
            ?>
        </tbody>
        </table>
    </div>
    
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
                
            
                <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="modalCategoria">Modificar articulo</button>
            </div>
            </div>
            
        </div>
    </div>
         
    <!-- Termina MODAL ELIMINAR ARTICULO -->


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>