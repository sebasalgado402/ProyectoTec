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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Estilos jQueryUI -->
    <link rel="stylesheet" href="./../jQueryUI/jquery-ui.css">
    <link rel="stylesheet" href="./../jQueryUI/jquery-ui.structure.css">
    <link rel="stylesheet" href="./../jQueryUI/jquery-ui.theme.css">


    <title>Balance</title>
</head>
<style>
    .card {
        width: 600px;
        height: 600px;
        background-color: #f2f2f2;
        border: 1px solid #ccc;
        border-radius: 5px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .card img {
        max-width: 100%;
        max-height: 100%;
        border-radius: 5px;
    }
</style>

<body>
    <?php include('./../assets/js/header.php');
    ?>
    <h1>Subir imágenes</h1>

    <form method="POST" enctype="multipart/form-data" id='form_subirImagenes'>
        <input type="file" name="images[]" multiple>
        <br><br>
        <input type="button" onclick="subirImagen_articulo()" value="Subir imágenes">
    </form>
    <?php imagenes_articuloSeleccionado(); ?>
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