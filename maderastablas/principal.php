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
    <!-- <link rel="stylesheet" href="./../../bootstrapIcons/font/bootstrap-icons.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!--Estilos Bootstrap -->
    <!-- <link href="./../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" > -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" >
    <!-- Estilos jQueryUI -->
    <link rel="stylesheet" href="./../jQueryUI/jquery-ui.css">
    <link rel="stylesheet" href="./../jQueryUI/jquery-ui.structure.css">
    <link rel="stylesheet" href="./../jQueryUI/jquery-ui.theme.css">
    
    <title>Inicio - Maderas tablas</title>
</head>
<body>
    <section>
        <?php
            include('./../assets/js/header.php');
        ?>
    </section>
    <div class="container col-12">

        <form action="facturar.php" class="m-2">
            <button type="submit" class="btn btn-success offset-xl-4 col-xl-4 col-sm-12 col-12">Facturacion</button>
        </form>
        <form action="lista__Facturas.php" class="m-2">
            <button type="submit" class="btn btn-success offset-xl-4 col-xl-4 col-sm-12 col-12">Ventas realizadas</button>
        </form>
        <form action="articulos.php" class="m-2">
            <button type="submit" class="btn btn-success offset-xl-4 col-xl-4 col-sm-12 col-12">Articulos</button>
        </form>
        <form action="nuevo_articulo.php" class="m-2">
            <button type="submit" class="btn btn-success offset-xl-4 col-xl-4 col-sm-12 col-12">Ingresar articulo nuevo</button>
        </form>
        <form action="actualizar_articulo.php" class="m-2">
            <button type="submit" class="btn btn-success offset-xl-4 col-xl-4 col-sm-12 col-12">Añadir stock a un producto existente</button>
        </form>
    </div>
    

   
</body>
 <!--Importa librería jquery -->
    <!-- <script src="./../assets/jQuery/jquery.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <!--Importa librería jQueryUI -->
    <script src="./../jQueryUI/jquery-ui.min.js"></script>
    <!--Importa librería boostrap -->
    <!-- <script src="./../assets/bootstrap/js/bootstrap.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <!--Importo javascript propio -->
    <script src="./../assets/js/functions.js"></script>
    <!--  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    -->


</html>