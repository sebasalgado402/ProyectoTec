<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <?php 
        session_start();
        include("./../js/funciones.php");
        if(isset($_SESSION['usuarioActivo'])){
            header('location: ./principal.php');
        }else{
        }
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
    <title>Articulos</title>
</head>
<body>
    <div class="container-fluid col-3 mt-5">
        <form action="./../js/redirect.php" method="post" class="form-control p-5">
            <!-- Usuario input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="input__User">Ingrese Usuario</label>
                <input type="text" id="input__User" name="input__Usuario" class="form-control" />
            </div>
            
            <!-- Contraseña input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="input__Password">Ingrese Contraseña</label>
                <input type="password" id="input__Password" name="input__Password" class="form-control" />
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4">Iniciar sesión</button>

        </form>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>