    <?php
    session_start();
    include("./../assets/js/funciones.php");
    comprobarUsuario();
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Link a mis estilos -->
        <link rel="stylesheet" href="./../assets/css/style.css">
        <!--Icono en la pestaña -->
        <link rel="shortcut icon" href="./../assets/icons/favicon.png">
        <!--Iconos de bootstrap  -->
        <!-- <link rel="stylesheet" href="./../bootstrapIcons/font/bootstrap-icons.css"> -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <!--Estilos Bootstrap -->
        <!-- <link href="./../bootstrap/css/bootstrap.min.css" rel="stylesheet" > -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Estilos jQueryUI -->
        <link rel="stylesheet" href="./../jQueryUI/jquery-ui.css">
        <link rel="stylesheet" href="./../jQueryUI/jquery-ui.structure.css">
        <link rel="stylesheet" href="./../jQueryUI/jquery-ui.theme.css">
        <title>Document</title>
    </head>

    <body>
        <?php
        include('./../assets/js/header.php');
        ?>
       <!--  <div class="container form-control col-12">
            <form class="offset-2 col-9">
                <h1 class="text-center display-4">Ingresar nuevo producto</h1>

                <div class="row">
                    <div class="col-2">
                        <label for="codArticulo" class="form-label ">código de Artículo:<span style="color:red" title="Obligatorio">*</span></label>
                        <input type="text" class="form-control" name="codArticulo" id="txt__codArticulo" required>
                    </div>
                    <div class="col-10">
                        <label for="nombreArticulo" class="form-label">Nombre:<span style="color:red" title="Obligatorio">*</span></label>
                        <input type="text" class="form-control" name="nombreArticulo" id="txt__nombreArticulo" required>
                    </div>
                </div>

                <div class="row">

                    <div class="col-4">
                        <label for="precioArticulo" class="form-label">Precio:<span style="color:red" title="Obligatorio">*</span></label>
                        <input type="number" class="form-control" name="precioArticulo" id="txt__precioArticulo" required>
                    </div>
                    <div class="col-4">
                        <label for="cantidadArticulo">Stock:<span style="color:red" title="Obligatorio">*</span></label>
                        <input type="number" class="form-control" class="form-label" name="cantidadArticulo" id="txt__cantidadArticulo" required>
                    </div>
                    <div class="col-4">
                        <label for="costoCreacionArticulo">Costo de creación:<span style="color:red" title="Obligatorio">*</span></label>
                        <input type="number" class="form-control" class="form-label" name="costoCreacionArticulo" id="txt__costoCreacionArticulo">
                    </div>

                </div>

                <div class="row">
                    <div class="offset-1 col-9">
                        <label for="categoria" class="form-label">Elija la categoria:<span style="color:red" title="Obligatorio">*</span></label>
                        <select name="categoria" id="select__categoria" class="form-select">
                            <option value="none">---</option>'
                            
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
                </div>

                <div class="row">
                    <div class="col-2">
                        <label for="proveedor" class="form-label ">Proveedor:<span style="color:red" title="Obligatorio">*</span></label>
                        <input type="text" class="form-control" name="proveedor" id="txt__proveedor" required>
                    </div>
                    <div class="col-10">
                        <label for="provConcepto" class="form-label">Concepto:<span style="color:red" title="Obligatorio">*</span></label>
                        <input type="text" class="form-control" name="provConcepto" id="txt__provConcepto" required>
                    </div>
                    <div class="col-4">
                        <label for="gastoTotal" class="form-label">Gasto Total:<span style="color:red" title="Obligatorio">*</span></label>
                        <input type="number" class="form-control" name="gastoTotal" id="txt__gastoTotal" required>
                    </div>

                    <button type="submit" class="btn btn-outline-danger mt-2 " id="btn__ingresarArticulo">Ingresar articulo nuevo</button>
                </div>

            </form>
        </div> -->

        <form action="" class="AddProduct_FormContainer">
            <p class="AddProduct_FormTitle">Ingresar Nuevo Articulo</p>
            <!--Código de Artículo-->
            <label for="CodArt">Codigo de Articulo:<span class="AddProduct_Obligatory">*</span></label>
            <input type="text" name="codArticulo" id="txt__codArticulo" class="AddProduct_Input" required>
            <!--Nombre Articulo-->
            <label for="NomArt">Nombre de Articulo:<span class="AddProduct_Obligatory">*</span></label>
            <input type="text" name="nombreArticulo" id="txt__nombreArticulo" class="AddProduct_Input" required>
            <!--Precio Articulo-->
            <label for="PrecioArt">Precio de Articulo:</label>
            <input type="number" name="precioArticulo" id="txt__precioArticulo" class="AddProduct_Input">
            <!--Stock Articulo-->
            <label for="StockArt">Stock de Articulo:<span class="AddProduct_Obligatory">*</span></label>
            <input type="number" name="cantidadArticulo" id="txt__cantidadArticulo" class="AddProduct_Input" required>
            <!--Costo Creacion Articulo-->
            <label for="CreaArticulo">Costo de Creacion de Articulo:</label>
            <input type="number" name="costoCreacionArticulo" id="txt__costoCreacionArticulo" class="AddProduct_Input">
            <!--Categoria Articulo-->
            <div class="AddProduct_CategoryInput-Container">
                <label for="categoria">Elije la Categoria:</label>
                <div class="dropdown AddProduct_CategoryContainer">
                    
                    <select name="categoria" id="select__categoria" class="form-select bg-transparent border-2 text-black">
                            <option value="none">---</option>'
                            <?php
                            cargarCategorias();
                            ?>
                    </select>
                </div>
                <!--Boton Categoria-->
                <button class="AddProduct_BotonCategoria" id="btnModal_nuevaCategoria" data-bs-toggle="modal" data-bs-target="#modal_nuevaCategoria">
                    Crear Nueva Categoria
                </button>
            </div>

            <!--Descripcion Articulo-->
            <label for="DescArt">Descripción de Articulo:</label>
            <input type="text" name="descripcionArticulo" id="txt__descripcionArticulo" class="AddProduct_Input">

            <!--Materiales Articulo-->
            <label for="MatsArt">Materiales de Articulo:</label>
            <input type="text" name="MaterialesArticulo" id="txt__materialesArticulo" class="AddProduct_Input">

            <!--Proveedor-->
            <label for="MatsArt">Proveedor:</label>
            <input type="text" name="proveedor" id="txt__proveedor" class="AddProduct_Input">

            <!--Concepto Articulo-->
            <label for="MatsArt">Concepto:</label>
            <input type="text"  name="provConcepto" id="txt__provConcepto" class="AddProduct_Input">

            <!--Gasto Total-->
            <label for="MatsArt">Gasto Total:</label>
            <input type="number" name="gastoTotal" id="txt__gastoTotal" class="AddProduct_Input">

            <!--Boton Enviar-->
            <input type="submit" value="Ingresar Nuevo Articulo" id="btn__ingresarArticulo" class="AddProduct_BotonEnviar">
        </form>

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
    </body>
    <link rel="stylesheet" href="./../assets/css/style.css">
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