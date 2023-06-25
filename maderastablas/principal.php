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
    <link rel="stylesheet" href="./../bootstrapIcons/font/bootstrap-icons.css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css"> -->
    <!--Estilos Bootstrap -->
    <link href="./../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" > -->
    <!-- Estilos jQueryUI -->
    <link rel="stylesheet" href="./../jQueryUI/jquery-ui.css">
    <link rel="stylesheet" href="./../jQueryUI/jquery-ui.structure.css">
    <link rel="stylesheet" href="./../jQueryUI/jquery-ui.theme.css">

    <title>Inicio - Maderas tablas</title>
</head>

<body id='myBody'>
    <section>
        <?php
        include('./../assets/js/header.php');
        ?>
    </section>
    <main>
        <div class="container">
            <!--Functions List-->
            <main class="FuntionsContainer">
                <a href="articulos.php" class="FuntionCard">
                    <div class="FunctionCard-Content">
                        <p class="FuntionCard_Title">Lista de Articulos</p>
                        <p class="FunctionCard_Description">Aqui podras administrar cada uno de los aspectos de tus articulos</p>
                    </div>
                    <div class="FuntionCard_Icon-Container">
                        <img src="./../assets/icons/arrow.svg" class="FuntionCard_Icon">
                    </div>
                </a>
                <a href="nuevo_articulo.php" class="FuntionCard">
                    <div class="FunctionCard-Content">
                        <p class="FuntionCard_Title">Nuevo Articulo</p>
                        <p class="FunctionCard_Description">Ingreso de un articulo nuevo </p>
                    </div>
                    <div class="FuntionCard_Icon-Container">
                        <img src="./../assets/icons/arrow.svg" class="FuntionCard_Icon">
                    </div>
                </a>
                <a href="banner_imagenes.php" class="FuntionCard">
                    <div class="FunctionCard-Content">
                        <p class="FuntionCard_Title">Imagenes de Banner</p>
                        <p class="FunctionCard_Description">Administrar imagenes que se mostraran en la pagina principal</p>
                    </div>
                    <div class="FuntionCard_Icon-Container">
                        <img src="./../assets/icons/arrow.svg" class="FuntionCard_Icon">
                    </div>
                </a>
                <a href="categorias.php" class="FuntionCard">
                    <div class="FunctionCard-Content">
                        <p class="FuntionCard_Title">Categorias</p>
                        <p class="FunctionCard_Description">Administra las categorias de tus articulos e imprime los articulos correspondientes a su categoria</p>
                    </div>
                    <div class="FuntionCard_Icon-Container">
                        <img src="./../assets/icons/arrow.svg" class="FuntionCard_Icon">
                    </div>
                </a>
                <a href="facturar.php" class="FuntionCard">
                    <div class="FunctionCard-Content">
                        <p class="FuntionCard_Title">Realizar venta</p>
                        <p class="FunctionCard_Description">Venta y control de stock de tus productos</p>
                    </div>
                    <div class="FuntionCard_Icon-Container">
                        <img src="./../assets/icons/arrow.svg" class="FuntionCard_Icon">
                    </div>
                </a>
                <a href="lista__Facturas.php" class="FuntionCard">
                    <div class="FunctionCard-Content">
                        <p class="FuntionCard_Title">Ventas Realizadas</p>
                        <p class="FunctionCard_Description">Lista de ventas realizadas - imprimir detalle de venta</p>
                    </div>
                    <div class="FuntionCard_Icon-Container">
                        <img src="./../assets/icons/arrow.svg" class="FuntionCard_Icon">
                    </div>
                </a>
                <a href="./balance.php" class="FuntionCard">
                    <div class="FunctionCard-Content">
                        <p class="FuntionCard_Title">Balance</p>
                        <p class="FunctionCard_Description">Calcula tus ganancias entre las fechas establecidas</p>
                    </div>
                    <div class="FuntionCard_Icon-Container">
                        <img src="./../assets/icons/arrow.svg" class="FuntionCard_Icon">
                    </div>
                </a>
                <a href="lista__Gastos.php" class="FuntionCard">
                    <div class="FunctionCard-Content">
                        <p class="FuntionCard_Title">Lista de gastos</p>
                        <p class="FunctionCard_Description">Busqueda de gastos hechos - insertar gastos</p>
                    </div>
                    <div class="FuntionCard_Icon-Container">
                        <img src="./../assets/icons/arrow.svg" class="FuntionCard_Icon">
                    </div>
                </a>



        </div>
    </main>

</body>
<!--Importa librería jquery -->
<script src="./../jQuery/jquery.min.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script> -->
<!--Importa librería jQueryUI -->
<script src="./../jQueryUI/jquery-ui.min.js"></script>
<!--Importa librería boostrap -->
<script src="./../bootstrap/js/bootstrap.min.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script> -->
<!--Importo javascript propio -->
<script src="./../assets/js/functions.js"></script>
<!--  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    -->


</html>