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
    <title>Document</title>

</head>
<body>
    <section>
        <?php
            include('./../js/header.php');
        ?>
    </section>
    <div class="container-fluid form-control col-6">
        <form action="clientes.php" method="post" class="offset-2 col-9">
            <label for="nombre"class="form-label">Nombre:</label>
            <input type="text"class="form-control" name="nombre" id="txt_id_cliente">

            <label for="direccion"class="form-label">Dirección:</label>
            <input type="text"class="form-control" name="direccion" id="">

            <label for="telefono"class="form-label">Teléfono:</label>
            <input type="text"class="form-control" name="telefono" id="">
            <button type="submit" class="btn btn-outline-primary mt-2">Ingresar cliente nuevo</button>
        </form>
    </div>
    <?php 
        if(isset($_POST['nombre']) || isset($_POST['direccion']) || isset($_POST['telefono']) ){
            include('./../js/bd.php');
            if($conexion){
                nuevoCliente($conexion,$_POST['nombre'],$_POST['direccion'],$_POST['telefono']);
            }else{
                echo '
                  <div class="alert alert-danger text-center" role="alert">
                  Complete todos los campos..
                  </div>';
            }
        }

    ?>

    <div class="offset-2 col-8">
        <table class="table table-striped table-bordered table-primary">
        <thead>
            <tr class="table-dark">
            <!-- <th scope="col">#</th> -->
            <th scope="col">Id_cliente</th>
            <th scope="col">Nombre</th>
            <th scope="col">Direccion</th>
            <th scope="col">Telefono</th>
            </tr>
        </thead>
        <tbody>
        <?php
            include('./../js/bd.php');
            if($conexion){
                mostrarClientes($conexion);
                exit();
            }

            ?>
        </tbody>
        </table>
    </div>
    


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>