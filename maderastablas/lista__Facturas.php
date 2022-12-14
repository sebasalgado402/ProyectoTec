<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        session_start();
        include("./../js/funciones.php");
        comprobarUsuario();
    ?> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <!-- Link a mis estilos -->
   <link rel="stylesheet" href="./../style.css">
    <!--Icono en la pestaña -->
    <link rel="shortcut icon" href="./../icons/favicon.png">
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

    <title>Listado Facturas</title>
</head>
<body>
    <section>
        <?php
            include('./../js/header.php');
        ?>
    </section>

    <div class="container-fluid col-lg-6 col-sm-12 table-responsive mt-2">
        
        <table class="table table-bordered align-middle">
            <thead>
                <tr class="table-dark align-middle">
                <!-- <th scope="col">#</th> -->
                <th class="align-middle p-2" scope="col">Número de factura</th>
                <th scope="col">Fecha</th>
                <th scope="col">Cliente</th>
                <th scope="col">importe Total</th>
                <th class="align-middle p-2" scope="col">Accion</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    mostrarFacturas();
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
    <script src="./../js/functions.js"></script>
    <!--  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    -->


</html>