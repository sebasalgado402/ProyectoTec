
<?php
    
    $idFactura;
    
    function desconectarBD($conexion){
        mysqli_close($conexion);
    }

    function iniciarSession(){
        session_start();
    }

    function recargar(){
        reload();
    }

    function mostrarArticulos($conexion,$nombreBD){

            // 2) Preparar la orden SQL
            $consulta= "SELECT * FROM articulos INNER JOIN categorias on articulos.art_categoria = categorias.cat_id";

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
                  <th scope="col-1">
                    
                    <button type="button" class="modificar__Articulo btn btn-primary" data-bs-toggle="modal" art_id='.$fila ['art_id'].' data-bs-target="#staticBackdrop">
                    Modificar
                    </button>
                    <button type="button" class="btn btn-outline-danger mt-2" >Eliminar</button>
                  </th>
                    <th scope="col-1">'.$fila ["art_id"].'</th>
                    <th scope="col-1">'.$fila ["art_cod"].'</th>
                    <th scope="col-1">'.$fila ["art_nom"].'</th>
                    <th scope="col-1">$'.$fila ["art_precio"].'</th>
                    <th scope="col-1">'.$fila ["art_stock"].'</th>
                    <th scope="col-1">$'.$fila ["art_costo"].'</th>
                    <th scope="col-1">'.$fila ["art_vendible"].'</th>
                    <th scope="col-1">'.$fila ["art_deshabilitado"].'</th>
                    <th scope="col-1">'.$fila ["cat_nom"].'</th>
                    <th scope="col-1">'.$fila ["cat_obs"].'</th>
                    <th scope="col-1">'.$fila ["art_materiales"].'</th>
                </tr>';
            }
              

            desconectarBD($conexion);
        }

        function mostrarClientes($conexion){
        

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

            desconectarBD($conexion);
        }
        function cargarCategorias($conexion,$nombreBD){
          
          $consulta="SELECT `cat_id`, `cat_nom`, `cat_obs` FROM `categorias` ORDER BY cat_nom";
          
          $db = mysqli_select_db( $conexion, $nombreBD) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );

          $datos= mysqli_query ($conexion,$consulta);

          if($datos){
            while ($valores =mysqli_fetch_array($datos)){           
              echo '<option value="'.$valores[0].'">'.$valores[1].'</option>';
            }

          }
          desconectarBD($conexion);




        }

        function nuevoArticulo($conexion,$codArticulo,$nombreArticulo,$precioArticulo,$cantidadArticulo,$costoArticulo,$categoriaArticulo,$materialesArticulo,$descripcionArticulo){
            if(strlen($codArticulo) >=1 && strlen($nombreArticulo) >=1 && strlen($precioArticulo) >=1 && strlen($costoArticulo) >=1 && strlen($categoriaArticulo) >=1 && strlen($descripcionArticulo) >=1 ){

                $consulta= "INSERT INTO `articulos`(`art_id`, `art_cod`, `art_nom`, `art_desc`, `art_precio`, `art_stock`, `art_costo`, `art_vendible`, `art_habilitado`, `art_categoria`, `art_materiales`) VALUES ('null','$codArticulo','$nombreArticulo','$descripcionArticulo',$precioArticulo,$cantidadArticulo,$costoArticulo,'S','S','$categoriaArticulo','$materialesArticulo')";
                
               try {
                //code...
                $query = mysqli_query ($conexion ,"INSERT INTO `articulos`(`art_id`, `art_cod`, `art_nom`, `art_desc`, `art_precio`, `art_stock`, `art_costo`, `art_vendible`, `art_habilitado`, `art_categoria`, `art_materiales`) VALUES ('','$codArticulo','$nombreArticulo','$descripcionArticulo',$precioArticulo,$cantidadArticulo,$costoArticulo,'S','S','$categoriaArticulo','$materialesArticulo')") or die ( "Database connection failed: " . mysqli_error());
                
                if($query){
                   
                  echo '
                  <div class="alert alert-success text-center" role="alert">
                  Guardado exitoso!..
                  </div>';
                  
                }
               } catch (\Throwable $th) {
                echo '
                    <div class="alert alert-danger text-center" role="alert">
                    Hubo un error!!..
                    </div>';
               }
                
             
                
                desconectarBD($conexion);
            }else{
                echo '
                <div class="alert alert-danger text-center" role="alert">
                Debe completar todos los campos..
                </div>';
            }
        }

        function nuevoCliente($conexion,$nombre,$direccion,$telefono){
            if(strlen($nombre) >=1 && strlen($direccion) >=1 && strlen($telefono) >=1){
            
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
                
                desconectarBD($conexion);
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
              include('bd.php');
              $id = $_POST['cliente'];
              $query = mysqli_query($conexion, "select * from clientes where id_cliente LIKE '$id'");
              desconectarBD($conexion);
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
        //Buscar Articulo
        if(isset($_POST['action']) && $_POST['action'] == 'searchArticulo'){
          if(!empty($_POST['articulo'])){
            include('bd.php');
            $consulta = "SELECT * FROM `articulos` WHERE descripcion LIKE '%".$_POST['articulo']."%';";
            $db = mysqli_select_db( $conexion, $nombreBD ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );
            
            $datos= mysqli_query ($conexion,$consulta);
            
            $articulo = new stdClass();
            // 4) Ir Imprimiendo las filas resultantes
            while ($fila =mysqli_fetch_array($datos)){
              $id[] = $fila['id_articulo'];
              $descripcion [] = $fila['descripcion'];
              $precio [] = $fila['precio'];
              $cantidad [] = $fila['cantidad'];
              
              $articulo->id = $id;
              $articulo->descripcion = $descripcion;
              $articulo->precio = $precio;
              $articulo->cantidad = $cantidad;
            }
            
              
              desconectarBD($conexion);

              if($articulo){
                    $data = $articulo;
                  }else{
                    $data = 0;
                  }

                  echo json_encode($data,JSON_UNESCAPED_UNICODE);
                  
              }
            
              exit;
          }

          if(isset($_POST['idAction']) && $_POST['idAction'] == 'searchIdArticulo'){
            if(!empty($_POST['idArticulo'])){
            include('bd.php');
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
            
              
              desconectarBD($conexion);
          
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

            include('bd.php');
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
                    
                    
                    include('bd.php');
                    $consulta = "INSERT INTO `detalle_factura`(`nroRenglon`, `id_factura`, `id_articulo`, `cantidad`, `precio`) VALUES (".$arrayVenta[$i]['nroRenglon'].",".$idFactura.",".$arrayVenta[$i]['id_articulo'].",".$arrayVenta[$i]['cantidad'].",".$arrayVenta[$i]['precioTotal'].")"; 
                       
                    $db = mysqli_select_db( $conexion, $nombreBD ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );
                    $datos= mysqli_query ($conexion,$consulta);
                  
                    desconectarBD($conexion);
    
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

          if(isset($_POST['action']) && $_POST['action'] == 'generaFactura'){
            
            
            $formated_DATE = date('Y-m-d');
            if(isset($_POST['clienteVenta'])){

              include('bd.php');
              $consulta="SELECT max(noFactura) FROM `facturas`";
              $db = mysqli_select_db( $conexion, "$nombreBD" ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );
  
              $datos= mysqli_query ($conexion,$consulta);
             
              if($datos > 0){
                $resultado = mysqli_fetch_assoc($datos);
                $idFactura=$resultado['max(noFactura)'];
  
                include('bd.php');
               
                $consulta= "INSERT INTO `facturas`(`noFactura`, `id_cliente`, `fecha`) VALUES ('',".$_POST['clienteVenta'].",'$formated_DATE')";
                    
                $db = mysqli_select_db( $conexion, "$nombreBD" ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );
    
                try {
                    $datos= mysqli_query ($conexion,$consulta);
                  } catch (\Throwable $th) {
                    //throw $th;
                  }
                  
    
                  desconectarBD($conexion);
  
  
                  /////////////
            }

            }else{
              location.reload();
            }
            
  
             
          }

        
          
    
      
  

?>
