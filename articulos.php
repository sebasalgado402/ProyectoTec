
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include('funciones.php');
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="functions.js"></script>
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
            <h1 class="text-center display-4">Ingresar nuevo producto</h1>
            
            <div class="row">
                <div class="col-2">
                    <label for="codArticulo" class="form-label " >código de Artículo:</label>
                    <input type="text" class="form-control" name="codArticulo" id="" required>
                </div>
                <div class="col-10">
                    <label for="nombreArticulo" class="form-label" >Nombre:</label>
                    <input type="text" class="form-control" name="nombreArticulo" id="" required>
                </div>
            </div>
            <div class="row">

                <div class="col-4">
                    <label for="precioArticulo" class="form-label">Precio:</label>
                    <input type="number" class="form-control" name="precioArticulo" id="" required>
                </div>
                <div class="col-4">
                    <label for="cantidadArticulo">Stock:</label>
                    <input type="number" class="form-control" class="form-label" name="cantidadArticulo" id="" required>
                </div>
                <div class="col-4">
                    <label for="costoCreacionArticulo">Costo de creación:</label>
                    <input type="number" class="form-control" class="form-label" name="costoCreacionArticulo" id="">
                </div>
                
            </div>
            <div class="row">

                <div class="col-6">
                    <label for="categoria">Elija la categoria:</label>
                    <select name="categoria" id="categoria" class="form-control">
                    <option value="0">---</option>'
                    <?php 
                   
                        include('bd.php');
                        cargarCategorias($conexion,$nombreBD); 
                   
                    ?>
                    </select>
                </div>
                <div class="col-6">
                    <button type="button" class="btn btn-primary form-control mt-4 agregar__Categoria">Ingresar categoría nueva</button>
                </div>
            </div>
            
            <label for="descripcionArticulo">descripcion:</label>
            <input type="text" class="form-control" class="form-label" name="descripcionArticulo" id="">

            <label for="MaterialesArticulo">Materiales:</label>
            <input type="text" class="form-control" class="form-label" name="MaterialesArticulo" id="">
            
            

            <button type="submit" class="btn btn-outline-danger mt-2">Ingresar articulo nuevo</button>
        </form>
    </div>
    <?php 
        if(isset($_POST['codArticulo']) && isset($_POST['nombreArticulo']) && isset($_POST['precioArticulo']) && isset($_POST['cantidadArticulo']) && isset($_POST['costoCreacionArticulo']) && isset($_POST['categoria']) && isset($_POST['descripcionArticulo']) && isset($_POST['MaterialesArticulo'])){
            include('bd.php');

            //$codArticulo','$nombreArticulo','$descripcionArticulo',$precioArticulo,$cantidadArticulo,$costoArticulo,'$categoriaArticulo','$materialesArticulo,nombreBD
            if($conexion){
                nuevoArticulo($conexion,$_POST['codArticulo'],$_POST['nombreArticulo'],$_POST['precioArticulo'],$_POST['cantidadArticulo'],$_POST['costoCreacionArticulo'],$_POST['categoria'],$_POST['descripcionArticulo'],$_POST['MaterialesArticulo']);
            }
        }

    ?>

    <div class="container-fluid col-sm-0 col-md-12 col-lg-12 mt-3 sm-0">
        <table class="table table-striped table-bordered table-primary ">
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
            <th scope="col-1">Deshabilitado</th>
            <th scope="col-1">Categoria</th>
            <th scope="col-1">Observacion</th>
            <th scope="col-1">Materiales</th>
            <th scope="col-1">Acción</th>
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