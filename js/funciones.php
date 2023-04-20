
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
    
   /*  function recargar(){
        reload();
    } */

    function mostrarArticulos(){
      include('./../js/bd.php');
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
      include('./../js/bd.php');
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
                <div class="product">
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

        function mostrarClientes(){
            // 2) Preparar la orden SQL
            $consulta= "SELECT*FROM clientes";

            // puedo seleccionar de DB
            $db = mysqli_select_db( $conexion, $nombreBD ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );

            // 3) Ejecutar la orden y obtener datos
            $datos= mysqli_query ($conexion,$consulta);

            // 4) Ir Imprimiendo las filas resultantes
            $i = 1;
            while ($fila =mysqli_fetch_array($datos)){
              //<th scope="col">'.$i++.'</th>
                echo'
                <tr>
                    <th scope="col">'.$fila ["id_cliente"].'</th>
                    <th scope="col">'.$fila ["nombre"].'</th>
                    <th scope="col">'.$fila ["direccion"].'</th>
                    <th scope="col">'.$fila ["telefono"].'</th>
                </tr>';
            }
            mysqli_close($conexion);
        }

        function cargarCategorias(){
          include('./../js/bd.php');
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

      

        function nuevoCliente($conexion,$nombre,$direccion,$telefono){
            if(strlen($nombre) >=1 && strlen($direccion) >=1 && strlen($telefono) >=1){
              include('./../js/bd.php');
                $consulta= "INSERT INTO `clientes`(`nombre`, `direccion`, `telefono`) VALUES ('$nombre','$direccion','$telefono')";
                
                //$db = mysqli_select_db( $conexion, $nombreBD ) or die ("Database connection failed: " . mysqli_error());
    
                try {
                    $datos= mysqli_query ($conexion,$consulta);
                  } catch (\Throwable $th) {
                    //throw $th;
                  }
                  
    
                  if($datos){
                   
                    echo '
                    <div class="alert alert-success text-center" role="alert">
                    Guardado exitoso!..
                    </div>';
                    
                  }else{
                    echo "no se guardo";
                  }
                
                mysqli_close($conexion);
            }else{
                echo '
                <div class="alert alert-danger text-center" role="alert">
                Debe completar todos los campos..
                </div>';
            }
        }

        //Buscar cliente
        if(isset($_POST['action']) && $_POST['action'] == 'searchCliente'){
            if(!empty($_POST['cliente'])){
              include('./../js/bd.php');
              $id = $_POST['cliente'];
              $query = mysqli_query($conexion, "select * from clientes where id_cliente LIKE '$id'");
              mysqli_close($conexion);
              $result = mysqli_num_rows($query);
              $data = '';
              if($result > 0){
                $data = mysqli_fetch_assoc($query);
              }else{
                $data = 0;
              }
              echo json_encode($data,JSON_UNESCAPED_UNICODE);
            }
            exit;
        }
        

          if(isset($_POST['idAction']) && $_POST['idAction'] == 'searchIdArticulo'){
            if(!empty($_POST['idArticulo'])){
            include('./../js/bd.php');
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

            include('./../js/bd.php');
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
                    
                    
                    include('./../js/bd.php');
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
            include('./../js/bd.php');
               
                  $consulta= "SELECT factura.fact_id ,factura.fact_fecha ,sum(dfact_precio) as precioTotal from detalle_factura INNER JOIN factura on detalle_factura.fact_id = factura.fact_id  GROUP BY fact_id ORDER BY fact_id DESC";
      
                  $datos= mysqli_query ($conexion,$consulta);
      
              
                  $i = 1;
                  while ($fila =mysqli_fetch_array($datos)){
                    //<th scope="col-1">'.$i++.'</th>
                    
                      echo'
                      <tr>
                        
                          <th>'.$fila ["fact_id"].'</th>
                          <th>'.$fila ["fact_fecha"].'</th>
                          <th>...</th>
                          <th>'.$fila ["precioTotal"].'</th>
                         
                          <th class="align-middle ">
                          
                          <form action="./../maderastablas/pdf/ver_factura.php" method="post" target="_blank">  
                            <input id="fact_id" name="fact_id" type="hidden" value='.$fila ['fact_id'].'>
                            <button type="submit" class="btn btn-success">
                              <i class="bi bi-eye-fill"></i>
                            </button>
                          </form>
                          <a role="button" id="imprimir_Factura'.$fila ["fact_id"].'" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_eliminarArticulo" data-fact_id='.$fila ['fact_id'].'>
                          <i class="bi bi-printer-fill"></i>
                          </a>
                        </th>
                      </tr>';
                  }
                    
      
                  mysqli_close($conexion);
              }
        //Termina---función sql que muestra las facturas
        


          

        
          
    
      
  

?>
