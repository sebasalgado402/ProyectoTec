<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        session_start();
        include("./../assets/js/funciones.php");
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
    
    <title>Ecommerce - Maderas tablas</title>
</head>
<body>
    <?php 
        include ('./../assets/js/header.php');
        include ('./../assets/js/buscador.php');
        include ('./../assets/js/banner.php');
    ?>
   

    <section id="section-product" class="section-product">
            <div class="product-container">
                <!-- <div class="product">
                    <div class="product-imagen">
                        <img src="./../images/ejemploFactura.jpeg" alt="error al cargar img"> 
                    </div>
                    <div class="card-descripcion">
                        <span>adiddas</span>
                        <h5>Nombre Producto</h5>
                        <h4>$78</h4>
                    </div>
                    <a href="#"><i class="bi bi-cart4 cart"></i></a>
                </div> -->
                 <?php mostrarArticulos_Ecommerce(); ?> 
            </div> 
    </section>

    <?php include('./../assets/js/footer.php')?>
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