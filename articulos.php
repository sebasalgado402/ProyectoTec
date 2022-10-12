
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include('funciones.php');
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <section>
        <?php
        include('header.php');
        ?>
    </section>
    <div class="container-fluid form-control">
        <form action="articulos.php" method="post" class="offset-2 col-9">

            <label for="nombre" class="form-label" >Nombre:</label>
            <input type="text" class="form-control" name="nombre" id="">

            <label for="precio" class="form-label">Precio:</label>
            <input type="number" class="form-control" name="precio" id="">

            <label for="cantidad">Cantidad:</label>
            <input type="number" class="form-control" class="form-label" name="cantidad" id="">
            
            <label for="categoria">Elija la categoria:</label>
            <select name="categoria" id="categoria" class="form-control">
            <option value="0">---</option>'
                <?php 
                   
                   include('bd.php');
                   cargarCategorias($conexion,$nombreBD); 
                   
                ?>
            </select>

            <button type="submit" class="btn btn-outline-danger mt-2">Ingresar articulo nuevo</button>
        </form>
    </div>
    <?php 
        if(isset($_POST['nombre']) || isset($_POST['precio']) || isset($_POST['cantidad'])){
            include('bd.php');
            if($conexion){
                nuevoArticulo($conexion,$_POST['nombre'],$_POST['precio'],$_POST['cantidad']);
            }
        }

    ?>

    <div class="container-fluid col-8 mt-3">
        <table class="table table-striped table-bordered table-danger">
        <thead>
            <tr class="table-dark">
            <!-- <th scope="col-1">#</th> -->
            <th scope="col-1">Id Articulo</th>
            <th scope="col-1">Código Articulo</th>
            <th scope="col-1">Nombre</th>
            <th scope="col-1">Precio</th>
            <th scope="col-1">Stock</th>
            <th scope="col-1">Costo creacion</th>
            <th scope="col-1">Vendible</th>
            <th scope="col-1">Categoria</th>
            <th scope="col-1">Observacion</th>
            <th scope="col-1">Materiales</th>
            </tr>
        </thead>
        <tbody>
            <?php
            
            include('bd.php');
            if($conexion){
                mostrarArticulos($conexion,$nombreBD);
            }

            ?>
        </tbody>
        </table>
    </div>
    


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>