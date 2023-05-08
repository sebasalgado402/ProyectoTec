<!DOCTYPE html>
<html lang="en">
<head>
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
    <title>Facturacion</title>
    
    
</head>
<body>
    <section>
        <?php
            include('./../assets/js/header.php');
        ?>
    </section>
    
    <div class="container-fluid col-lg-6 col-sm-12 table-responsive mt-2">
        
        <table class="table table-bordered align-middle">
            <thead>
                <tr class="table-dark align-middle">
                <!-- <th scope="col">#</th> -->
                <th scope="col">id_articulo</th>
                <th scope="col">descripcion</th>
                <th scope="col">precio</th>
                <th scope="col">cantidad</th>
                <th scope="col">Existencia</th>
                <th scope="col">Precio Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="col-1" id="th_id_articulo">
                        
                    </th>
                    <th scope="col-1">
                        <input type="text" id="txt_descripcion" class="form-control col-12">
                    </th>
                    <th scope="col-1" id="th_precio" class="text-center">
                        
                    </th>
                    <th scope="col-1">
                        <input type="number" value="0" id="txt_Cantidad" class="form-control col-12" >
                    </th>
                    <th scope="col-1" id="th_existencia">
                        <input type="text" value="0" id="txt_Stock" class="form-control col-12" disabled>
                    </th>
                    <th scope="col-1" id="th_precioTotal">
                        <input type="text" value="0" id="txt_precioTotal" class="form-control col-12" disabled>
                        
                    </th>
                </tr>
                
            
                </tbody>
            </table>
        </div>
        <div class="container-fluid col-lg-6 col-sm-12">

            
            <button type="button" class="btn btn-primary col-12 col-sm-12" id="btnAgregarFactura" disabled>Agregar a la factura</button>
            
            <table class="table table-bordered mt-2 col-lg-6 col-sm-12 text-center">
                <thead>
                    <tr class="table table-dark align-middle ">
                        <!-- <th scope="col">#</th> -->
                        <th scope="col">id_articulo</th>
                        <th scope="col">descripcion</th>
                        <th scope="col">cantidad</th>
                        <th scope="col">SubTotal</th>
                    </tr>
                </thead>
                <tbody id="tbody_detalle" class="align-middle">
                    
                    </tbody>
                </table>
        </div>
            
                
        <div class="container offset-lg-6 offset-md-9 offset-sm-6 col-8 col-lg-3 col-md-3 col-sm-4">
                    <table class="table">
                        <tbody>
                            
                            
                <tr>
                    <th> 
                        Total
                    </th>
                    <th>
                        <input type="text" value="0" id="txt_subtotalDetalle" class="form-control col-3" disabled>
                    </th>
                </tr>
               <!--  <tr>
                    <th> 
                        IVA(%)
                    </th>
                    <th>
                        <input type="text" value="0" id="txt_ivaDetalle" class="form-control col-3">
                    </th>
                </tr> -->
                <!-- <tr>
                    <th> 
                        Total
                    </th>
                    <th>
                        <input type="text" value="0" id="txt_totalDetalle" class="form-control col-3" disabled>
                    </th>
                </tr> -->
                </tbody>
            </table>
            
        </div>
        
        <div class="container-fluid col-sm-12">
            <button type="submit" class="btn btn-success col-12 col-lg-6 offset-lg-3 " id="btnProcesarCompra" disabled>Procesar compra</button>
        </div>
        <div class="container-fluid col-sm-12">
            <button type="submit"class="btn btn-danger col-12 col-lg-6 offset-lg-3" id="btnAnularCompra">Anular compra</button>
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