<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        session_start();
        include("./../js/funciones.php");
        comprobarUsuario();
    ?> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <link rel="stylesheet" href="./../style.css">
    <link rel="shortcut icon" href="./../icons/favicon.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="./../js/functions.js"></script>
    <title>Inicio - Maderas tablas</title>
</head>
<body>
    <section>
        <?php
            include('./../js/header.php');
        ?>
    </section>
    <form action="facturar.php">
        <button type="submit" class="btn btn-success offset-4 col-4 mt-2 mb-2">Facturacion</button>
    </form>
    <form action="articulos.php">
        <button type="submit" class="btn btn-success offset-4 col-4 mb-2">Articulos</button>
    </form>
    <form action="clientes.php">
        <button type="submit" class="btn btn-success offset-4 col-4">Clientes</button>
    </form>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>