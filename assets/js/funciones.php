
<?php

    $idFactura;
    $categoriasCargadas= new stdClass();

    function comprobarUsuario(){
      if(isset($_SESSION['usuarioActivo']) && $_SESSION['usu_rol']==1){
       // header('location: ./../maderastablas/principal.php');
      }elseif (isset($_SESSION['usuarioActivo']) && $_SESSION['usu_rol']>1) {
        header('location: ./../ecommerce/index.php');
      }else{
        header('location: ./../maderastablas/index.php');
      }
      
    }
    
   
    function mostrarArticulos(){
      include('./../assets/js/bd.php');
            // 2) Preparar la orden SQL
            $consulta= "SELECT * FROM articulos INNER JOIN categorias on articulos.art_categoria = categorias.cat_id ORDER BY art_id DESC";
          
            // puedo seleccionar de DB
            $db = mysqli_select_db( $conexion, $nombreBD ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );

            // 3) Ejecutar la orden y obtener datos
            $datos= mysqli_query ($conexion,$consulta);

            // 4) Ir Imprimiendo las filas resultantes
            $i = 1;
            while ($fila =mysqli_fetch_array($datos)){
              //<th scope="col-1">'.$i++.'</th>
              
                echo'
                <tr>
                    <th class="align-middle p-0" >
                      <a role="button" id="imgProducto" data-art_id='.$fila ['art_id'].' data-bs-toggle="modal" data-bs-target="#modal_cambiarIMG">
                        <img src="'.$fila ["art_imagen"].'" alt="Error cargar imagen" height="130" data-art_id='.$fila ['art_id'].'>
                      </a>
                    </th>
                    <th class="align-middle p-0" >'.$fila ["art_id"].'</th>
                    <th class="align-middle p-0">'.$fila ["art_cod"].'</th>
                    <th class="align-middle p-0">'.$fila ["art_nom"].'</th>
                    <th class="align-middle p-0">$'.$fila ["art_precio"].'</th>
                    <th class="align-middle p-0">'.$fila ["art_stock"].'</th>
                    <th class="align-middle p-0">$'.$fila ["art_costo"].'</th>
                    
                    
                    <th class="align-middle p-0">'.$fila ["cat_nom"].'</th>
                    <th class="align-middle p-0">'.$fila ["art_desc"].'</th>
                    <th class="align-middle p-0">'.$fila ["art_materiales"].'</th>
                    <th class="align-middle p-0">'.$fila ["art_notas"].'</th>
                    <th class="align-middle ">
                    
                    <a role="button" id="modificar__Articulo'.$fila ["art_id"].'" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_modificarArticulo" data-art_id='.$fila ['art_id'].' >
                    <i class="bi bi-pencil-fill"></i>
                    </a>
                    <a role="button" id="eliminar__Articulo'.$fila ["art_id"].'" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal_eliminarArticulo" data-art_id='.$fila ['art_id'].'>
                    <i class="bi bi-x-square"></i>
                    </a>
                  </th>
                </tr>';
            }
              
            mysqli_close($conexion);
        }
    function mostrarArticulos_Ecommerce(){
      include('./../assets/js/bd.php');
            // 2) Preparar la orden SQL
            $consulta= "SELECT * FROM articulos INNER JOIN categorias on articulos.art_categoria = categorias.cat_id ORDER BY art_id DESC";
          
            // puedo seleccionar de DB
            $db = mysqli_select_db( $conexion, $nombreBD ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );

            // 3) Ejecutar la orden y obtener datos
            $datos= mysqli_query ($conexion,$consulta);

            // 4) Ir Imprimiendo las filas resultantes
            $i = 1;
            while ($fila =mysqli_fetch_array($datos)){
              //<th scope="col-1">'.$i++.'</th>
              
                echo'
                <div class="product" id="art_Ecommerce" onclick="redireccionArticulo('.$fila ["art_id"].')" data-art_id="'.$fila ["art_id"].'">
                <div class="product-imagen">
                    <img src="'.$fila ["art_imagen"].'" alt="error al cargar img">
                </div>
                    <div class="card-descripcion">
                        <span>'.$fila ["cat_nom"].'</span>
                        <h5>'.$fila ["art_nom"].'</h5>
                        <h4>$'.$fila ["art_precio"].'</h4>
                    </div>
                    <a href="#"><i class="bi bi-cart4 cart"></i></a>
                </div>';
            }
              
            mysqli_close($conexion);
        }

       

        function cargarCategorias(){
          include('./../assets/js/bd.php');
          $consulta="SELECT `cat_id`, `cat_nom`, `cat_obs` FROM `categorias` ORDER BY cat_nom";
          
          //$db = mysqli_select_db( $conexion, $nombreBD) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );

          $datos= mysqli_query ($conexion,$consulta);

          if($datos){
            $categoriasCargadas = new stdClass();
            // 4) Ir Imprimiendo las filas resultantes
            while ($fila =mysqli_fetch_array($datos)){
              $id[] = $fila[0];
              $nombre [] = $fila[1];
              
              $categoriasCargadas->id = $id;
              $categoriasCargadas->nombre = $nombre;
              
              echo '<option value="'.$fila[0].'">'.$fila[1].'</option>';
            }
        
          }
          mysqli_close($conexion);
        }

        //Buscar articulos en ...

          if(isset($_POST['idAction']) && $_POST['idAction'] == 'searchIdArticulo'){
            if(!empty($_POST['idArticulo'])){
            include('./../assets/js/bd.php');
            $consulta = "SELECT * FROM `articulos` WHERE id_articulo=".$_POST['idArticulo']."";
            $db = mysqli_select_db( $conexion, $nombreBD ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );
            
            $datos= mysqli_query ($conexion,$consulta);
            
            $articulo = new stdClass();
            
            // 4) Ir Imprimiendo las filas resultantes
            while ($fila =mysqli_fetch_array($datos)){
              $id = $fila['id_articulo'];
              $precio = $fila['precio'];
              $cantidad = $fila['cantidad'];
              
              $articulo->id = $id;
              $articulo->precio = $precio;
              $articulo->cantidad = $cantidad;
            }
            
              
              mysqli_close($conexion);
          
              if($articulo){
                    $dataId = $articulo;
                  }else{
                    $dataId = 0;
                  }
              echo json_encode($articulo,JSON_UNESCAPED_UNICODE);
            }
            
          }

          if(isset($_POST['action']) && $_POST['action'] == 'procesarVenta'){
            
            $formated_DATE = date('Y-m-d');

            include('./../assets/js/bd.php');
            $consulta="SELECT max(noFactura) FROM `facturas`";
            $db = mysqli_select_db( $conexion, $nombreBD ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );

           
            $datos= mysqli_query ($conexion,$consulta);
           
            if($datos !== 0){
              $resultado = mysqli_fetch_assoc($datos);
              $idFactura=$resultado['max(noFactura)'];
                
                  if($idFactura > 0){
  
                    $arrayVenta = $_POST['detalleF'];
                    for ($i=0; $i < count($arrayVenta) ; $i++) { 
                      //print_r($arrayVenta[$i]['id_articulo']);
                      echo "<br>";
                      //insertarDetalle($arrayVenta[$i]['nroRenglon'],$idFactura,$arrayVenta[$i]['id_articulo'],$arrayVenta[$i]['cantidad'],$arrayVenta[$i]['precioTotal']);
                    
                    
                    include('./../assets/js/bd.php');
                    $consulta = "INSERT INTO `detalle_factura`(`nroRenglon`, `id_factura`, `id_articulo`, `cantidad`, `precio`) VALUES (".$arrayVenta[$i]['nroRenglon'].",".$idFactura.",".$arrayVenta[$i]['id_articulo'].",".$arrayVenta[$i]['cantidad'].",".$arrayVenta[$i]['precioTotal'].")"; 
                       
                    $db = mysqli_select_db( $conexion, $nombreBD ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );
                    $datos= mysqli_query ($conexion,$consulta);
                  
                    mysqli_close($conexion);
    
                    }
    
                    echo '
                    <div class="alert alert-success text-center" role="alert">
                    generando factura!..
                    </div>';
                    
                  }else{
                    echo '
                    <div class="alert alert-danger text-center" role="alert">
                    no se pudo!..
                    </div>';
                  }
  
                }



                ///////////
            }
            
          
          ////////------------------------------////////////////

          

        // función sql que muestra las facturas
          function mostrarFacturas(){
            include('./../assets/js/bd.php');
               
                  /* $consulta= "SELECT factura.fact_id ,factura.fact_fecha ,sum(dfact_precio) as precioTotal from detalle_factura INNER JOIN factura on detalle_factura.fact_id = factura.fact_id  GROUP BY fact_id ORDER BY fact_id DESC"; */
                  $consulta = 'call mostrar_Facturas()';
                  $datos= mysqli_query ($conexion,$consulta);
      
              
                  $i = 1;
                  while ($fila =mysqli_fetch_array($datos)){
                    //<th scope="col-1">'.$i++.'</th>
                    
                      echo'
                      <tr>
                        
                          <th>'.$fila ["fact_id"].'</th>
                          <th>'.$fila ["fact_fecha"].'</th>
                          <th>'.$fila ["precioTotal"].'</th>
                         
                        <th class="align-middle ">
                          <a role="button" id="imprimir_Factura'.$fila ["fact_id"].'" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_eliminarArticulo" data-fact_id='.$fila ['fact_id'].'>
                          <i class="bi bi-printer-fill"></i>
                          </a>
                        </th>
                      </tr>';
                  }
                    
      
                  mysqli_close($conexion);
              }
        //Termina---función sql que muestra las facturas

        // función sql que muestra los gastos
          function mostrarGastos(){
            include('./../assets/js/bd.php');
               
                  $consulta= "call mostrar_Gastos()";
      
                  $datos= mysqli_query ($conexion,$consulta);
      
              
                  $i = 1;
                  while ($fila =mysqli_fetch_array($datos)){
                    //<th scope="col-1">'.$i++.'</th>
                    
                      echo'
                      <tr>
                          <th class="col-1 text-center">'.$fila ["numeracion"].'</th>
                          <th>'.$fila ["gas_concepto"].'</th>
                          <th>'.$fila ["gas_proveedor"].'</th>
                          <th class="col-2 text-center">'.$fila ["gas_fecha"].'</th>
                          <th class="text-center">$'.$fila ["gas_total"].'</th>
                      </tr>';
                  }
                    
      
                  mysqli_close($conexion);
                  
              }
        //Termina---función sql que muestra los gastos
        
        //Comienza---mostrar articulo seleccionado

        function mostrarArticuloSeleccionado(){
          if (isset($_GET['articleID'])) {
            //echo $_GET['articleID'];
            include('./../assets/js/bd.php');
            // 2) Preparar la orden SQL
            $consulta= "SELECT * FROM articulos INNER JOIN categorias on articulos.art_categoria = categorias.cat_id where art_id = ".$_GET['articleID']."";
          
            // puedo seleccionar de DB
            $db = mysqli_select_db( $conexion, $nombreBD ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );

            // 3) Ejecutar la orden y obtener datos
            $datos= mysqli_query ($conexion,$consulta);

            $fila =mysqli_fetch_array($datos);
           
            echo '
            <main class="main">
            <div class="ProductContainer">
                <div class="MainProduct">
                    <img src="'.$fila ["art_imagen"].'" class="MainProduct__Img"
                        id="MainProduct__Img">
                </div>
                <div class="ProductCarrouselContainer">
                    <div class="ProductCarrousel">
                        <img src="'.$fila ["art_imagen"].'" class="ProductCarrousel__Img" id="ProductCarrousel__Img">
                    </div>
                    <div class="ProductCarrousel">
                        <img src="'.$fila ["art_imagen"].'" class="ProductCarrousel__Img"
                            id="ProductCarrousel__Img">
                    </div>
                    <div class="ProductCarrousel">
                        <img src="'.$fila ["art_imagen"].'" class="ProductCarrousel__Img"
                            id="ProductCarrousel__Img">
                    </div>
                    <div class="ProductCarrousel">
                        <img src="'.$fila ["art_imagen"].'" class="ProductCarrousel__Img"
                            id="ProductCarrousel__Img">
                    </div>
                </div>
            </div>
            <div class="ProductContent">
                <p class="ProductContent__Category">'.$fila ["cat_nom"].'</p>
                <p class="ProductContent__Name">'.$fila ["art_nom"].'</p>
                <p class="ProductContent__Description">'.$fila ["art_desc"].'</p>
                <p class="ProductContent__Price">$ '.$fila ["art_precio"].'</p>
                <a href="https://wa.me/573001112233?text=Hola!%20Estoy%20interesado%20en%20este%20producto" class="ProductContent__Button" target="_blank">
                    Consultar Producto
                </a>
            </div>
        </main>

        <!--Category Product List-->
    <section class="CategoryProductList">
        <p class="CategoryProductList__Title">Recomendaciónes:</p>
        <div class="CategoryProductList__Container">
            <a href="./Product.html" class="ProductCard">
                <img src="https://www.pngmart.com/files/7/Chair-PNG-Clipart.png" class="ProductCardImg" loading="lazy">
                <div class="ProductoCardContent">
                    <p class="CardName">Silla</p>
                    <p class="CardPrice">$1400</p>
                </div>
            </a>
            <a href="./Product.html" class="ProductCard">
                <img src="https://www.pngmart.com/files/7/Chair-PNG-Clipart.png" class="ProductCardImg" loading="lazy">
                <div class="ProductoCardContent">
                    <p class="CardName">Silla</p>
                    <p class="CardPrice">$1400</p>
                </div>
            </a>
            <a href="./Product.html" class="ProductCard">
                <img src="https://www.pngmart.com/files/7/Chair-PNG-Clipart.png" class="ProductCardImg" loading="lazy">
                <div class="ProductoCardContent">
                    <p class="CardName">Silla</p>
                    <p class="CardPrice">$1400</p>
                </div>
            </a>
            <a href="./Product.html" class="ProductCard">
                <img src="https://www.pngmart.com/files/7/Chair-PNG-Clipart.png" class="ProductCardImg" loading="lazy">
                <div class="ProductoCardContent">
                    <p class="CardName">Silla</p>
                    <p class="CardPrice">$1400</p>
                </div>
            </a>
        </div>
    </section>
            ';
              
            mysqli_close($conexion);

          }
        }

        //Termina---Comienza mostrar articulo seleccionado

          

        
          
    
      
  

?>
