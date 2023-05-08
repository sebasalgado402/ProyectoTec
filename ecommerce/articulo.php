
<!DOCTYPE html>
<html lang="en">
<head>
    <?php   
       session_start();
       include('./../assets/js/funciones.php');
    ?> 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <title>De Maderas Tablas</title>
</head>
<body>

    <?php include('./../assets/js/header.php'); ?>
   
    <!--Product Content-->
    <?php mostrarArticuloSeleccionado();?>
    <!--Footer-->
    <footer class="footer">
        <div class="FooterMain">
            <img src="./../assets/icons/icon.png" class="FooterIcon">
            <p class="FooterTitle">De Maderas Tablas</p>
        </div>
        <div class="FooterContentContainer">
            <a href="https://www.google.com.uy/maps/place/Acu%C3%B1a+de+Figueroa+483,+50000+Salto,+Departamento+de+Salto/@-31.3945211,-57.976678,17z/data=!3m1!4b1!4m5!3m4!1s0x95addd31ecaa661f:0xfb502753e5580f73!8m2!3d-31.3945211!4d-57.9741031?hl=es-419" class="FooterContent" target="_blank">
                <img src="./../assets/icons/location.svg" class="FooterContentIcon">
                <p class="ContentTitle">Acuaña de Figueroa 483</p>
            </a>
            <a href="https://www.instagram.com/demaderatablas/" class="FooterContent" target="_blank">
                <img src="./../assets/icons/instagram.svg" class="FooterContentIcon">
                <p class="ContentTitle">@demaderatablas</p>
            </a>
        </div>
    </footer>
    <article class="Copyright">
        <p class="CopyrightText">Copyright© 2023</p>
    </article>
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