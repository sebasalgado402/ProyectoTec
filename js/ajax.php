<?php 
     

    //Carga el producto al modal
        if(isset($_POST['action']) && $_POST['action'] == 'modificarArticulo'){
          $modificarArticulo = $_POST['modificar__Articulo'];
            if(!empty($modificarArticulo)){
              
              include('./../js/bd.php');
                $consulta = "SELECT * FROM `articulos` WHERE art_id = ".$modificarArticulo."";
            
                $datos= mysqli_query ($conexion,$consulta);
                
                $articulo = new stdClass();
                
                mysqli_close($conexion);
                // 4) Ir Imprimiendo las filas resultantes
                while ($fila =mysqli_fetch_array($datos)){
                  $art_nom = $fila['art_nom'];
                  $art_desc = $fila['art_desc'];
                  $art_precio = $fila['art_precio'];
                  $art_stock = $fila['art_stock'];
                  $art_costo = $fila['art_costo'];
                  $art_vendible = $fila['art_vendible'];
                  $art_deshabilitado = $fila['art_deshabilitado'];
                  $art_categoria = $fila['art_categoria'];
                  $art_materiales = $fila['art_materiales'];
                  $art_imagen = $fila['art_imagen'];
                  
                  $articulo->art_nom =$art_nom;
                  $articulo->art_desc =$art_desc;
                  $articulo->art_precio =$art_precio;
                  $articulo->art_stock =$art_stock;
                  $articulo->art_costo =$art_costo;
                  $articulo->art_vendible =$art_vendible;
                  $articulo->art_deshabilitado =$art_deshabilitado;
                  $articulo->art_categoria =$art_categoria;
                  $articulo->art_materiales =$art_materiales;
                  $articulo->art_imagen =$art_imagen;

                  
                }

                

                if($articulo){
                      $data = $articulo;
                    }else{
                      $data = 0;
                    }
  
                    echo json_encode($data,JSON_UNESCAPED_UNICODE);
                    exit;
                }
              
               
    
                
              }        

    //Termina Carga el producto al modal

    //Modifica el articulo del modal
    
    if(isset($_POST['action']) && $_POST['action'] == 'modalModificar_Articulo'){
      $modificarArticulo = $_POST['modalModificar_Articulo'];
        if(!empty($modificarArticulo)){  
                  include('./../js/bd.php');
                 
                    $consulta = "UPDATE `articulos` SET `art_nom`='".$modificarArticulo[2]."',`art_desc`='".$modificarArticulo[6]."',`art_precio`='".$modificarArticulo[3]."',`art_stock`='".$modificarArticulo[4]."',`art_costo`='".$modificarArticulo[5]."',`art_vendible`='',`art_deshabilitado`='',`art_categoria`='".$modificarArticulo[1]."',`art_materiales`='".$modificarArticulo[7]."' where `art_id` = '".$modificarArticulo[0]."' ";
                    //$db = mysqli_select_db( $conexion, $nombreBD ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );
                    $datos= mysqli_query ($conexion,$consulta);

                    mysqli_close($conexion);


                    if(isset($datos)){
                      $data = 1;
                    }else{
                      $data = 'error';
                    }
                
                
                echo json_encode($data,JSON_UNESCAPED_UNICODE);
                exit; 
            
        }
      }

    //Termina- Modifica el articulo modal

    //Ingresar nuevo articulo
    if(isset($_POST['action']) && $_POST['action'] == 'nuevoArticulo'){
      $nuevoArticulo = $_POST['nuevoArticulo'];
        if(!empty($nuevoArticulo)){
          
               
          $articulo = new stdClass();

          $articulo->codigo = $nuevoArticulo[0];
          $articulo->nombre = $nuevoArticulo[1];
          $articulo->descripcion= $nuevoArticulo[2];
          $articulo->precio= $nuevoArticulo[3];
          $articulo->stock= $nuevoArticulo[4];
          $articulo->costo= $nuevoArticulo[5];
          $articulo->categoria= $nuevoArticulo[6];
          $articulo->materiales= $nuevoArticulo[7];

          if($articulo->codigo  =='' || $articulo->nombre == '' || $articulo->stock == '' || $articulo->categoria == '' || $articulo->categoria == 'none'){
            $data = 'Faltan datos';
            echo json_encode($data,JSON_UNESCAPED_UNICODE);
            exit;
          }else{

            include('./../js/bd.php');
            $consulta__siExiste= "SELECT * FROM articulos WHERE art_cod = '$articulo->codigo'";
            $datos= mysqli_query ($conexion,$consulta__siExiste);
            $siExiste = mysqli_affected_rows($conexion);
            mysqli_close($conexion);

            if($siExiste==0){
              include('./../js/bd.php');
              $insertarArticulo = "INSERT INTO `articulos`(`art_id`, `art_cod`, `art_nom`, `art_desc`, `art_precio`, `art_stock`, `art_costo`, `art_vendible`, `art_deshabilitado`, `art_categoria`, `art_materiales`) VALUES (NULL,'".$articulo->codigo."','".$articulo->nombre."','".$articulo->descripcion."',".$articulo->precio.",".$articulo->stock.",".$articulo->costo.",'S','S','".$articulo->categoria."','".$articulo->materiales."')";
  
             
              $datos= mysqli_query ($conexion,$insertarArticulo) or die(mysqli_error());
              

                if($datos){
                  $data = $datos;
                }else{
                  $data = 0;
                }
                mysqli_close($conexion);
            }else{
              $data='dato duplicado';
            }

            echo json_encode($data,JSON_UNESCAPED_UNICODE);
            exit; 
          }
          
        }
    }
    //Termina - ingresar nuevo articulo

    //Carga id para ELIMINAR en MODAL
    if(isset($_POST['action']) && $_POST['action'] == 'eliminarArticulo'){
      $eliminarArticulo = $_POST['eliminar__Articulo'];
        if(!empty($eliminarArticulo)){
          
          include('./../js/bd.php');
            $consulta = "SELECT * FROM `articulos` WHERE art_id = ".$eliminarArticulo."";
        
            $datos= mysqli_query ($conexion,$consulta);
            
            $articulo = new stdClass();
            
            mysqli_close($conexion);
            // 4) Ir Imprimiendo las filas resultantes
            while ($fila =mysqli_fetch_array($datos)){
              $art_nom = $fila['art_nom'];
              
              $articulo->art_nom =$art_nom;
              
            }

            

            if($articulo){
                  $data = $articulo->art_nom;
                }else{
                  $data = 0;
                }

                echo json_encode($data,JSON_UNESCAPED_UNICODE);
                exit;
            }
          
          }        

    //Termina Carga id para ELIMINAR en MODAL

    //Elimina el articulo seleccionado
if(isset($_POST['action']) && $_POST['action'] == 'modalEliminar_Articulo'){
  $eliminarArticulo = $_POST['modalEliminar_Articulo'];
    if(!empty($eliminarArticulo)){  
              include('./../js/bd.php');
              
              $id = $eliminarArticulo;
              
                $consulta = "DELETE FROM `articulos` WHERE `articulos`.`art_id` = $id";
                //$db = mysqli_select_db( $conexion, $nombreBD ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );
                $datos= mysqli_query ($conexion,$consulta) or die(mysqli_error());

                mysqli_close($conexion);

            if($datos){
              $data = $datos;
            }else{
              $data= 0 ;
            }
            
            echo json_encode($data,JSON_UNESCAPED_UNICODE);
            exit; 
        
    }
  }
    //Termina - //Elimina el articulo seleccionado

    //Inserta Nueva categoria en articulos
if(isset($_POST['action']) && $_POST['action'] == 'modalnueva_Categoria'){
  $nuevaCategoria = $_POST['modalnueva_Categoria'];

  $categoria = new stdClass();

  $categoria->nombre = $nuevaCategoria[0];
  $categoria->observacion = $nuevaCategoria[1];
    if(!empty($nuevaCategoria) && strlen($categoria->nombre)>0){  
              include('./../js/bd.php');
              
              
                $consulta = "INSERT INTO `categorias`(`cat_id`, `cat_nom`, `cat_obs`) VALUES ('','$categoria->nombre','$categoria->observacion')";
                //$db = mysqli_select_db( $conexion, $nombreBD ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );
                $datos= mysqli_query ($conexion,$consulta) or die(mysqli_error());

                mysqli_close($conexion);

            if($datos){
              $data = $datos;
            }else{
              $data= 0 ;
            }
            
            echo json_encode($data,JSON_UNESCAPED_UNICODE);
            exit; 
        
    }else{
      $data = 0;
      echo json_encode($data,JSON_UNESCAPED_UNICODE);
            exit; 
    }
  }
    //Termina - //Inserta Nueva categoria en articulos

    //Cargar imagen de producto al modal de modificar
    if(isset($_POST['action']) && $_POST['action'] == 'cambiar__imgProducto'){
      $cambiarimgProducto = $_POST['cambiar__imgProducto'];
        if(!empty($cambiarimgProducto)){
          
          include('./../js/bd.php');
            $consulta = "SELECT `art_id`,`art_imagen` FROM `articulos` WHERE art_id = ".$cambiarimgProducto."";
        
            $datos= mysqli_query ($conexion,$consulta);
            
            $articulo = new stdClass();
            
            mysqli_close($conexion);
            // 4) Ir Imprimiendo las filas resultantes
            while ($fila =mysqli_fetch_array($datos)){
              $art_imagen = $fila['art_imagen'];
              $art_id = $fila['art_id'];
              
              $articulo->art_id =$art_id;
              $articulo->art_imagen =$art_imagen;
              
            }

            

            if($articulo){
                  $data = $articulo;
                }else{
                  $data = 0;
                }

                echo json_encode($data,JSON_UNESCAPED_UNICODE);
                exit;
            }
          
          }        

    //Termina Cargar imagen de producto al modal de modificar


    //Actualiza imagen del articulo seleccionado
    
    if(isset($_FILES)){
      var_dump($_FILES);
      echo '<br>';
      //echo $_FILES['archivo']['idArticulo'];
      //echo $_POST['idArticulo'];
      if(isset($_POST['idArticulo'])){
        //Taking the files from input
        $file = $_FILES['archivo'];
        //Getting the file name of the uploaded file
        $fileName = $_FILES['archivo']['name'];
        //Getting the Temporary file name of the uploaded file
        $fileTempName = $_FILES['archivo']['tmp_name'];
        //Getting the file size of the uploaded file
        $fileSize = $_FILES['archivo']['size'];
        //getting the no. of error in uploading the file
        $fileError = $_FILES['archivo']['error'];
        //Getting the file type of the uploaded file
        $fileType = $_FILES['archivo']['type'];
       
        var_dump ($_POST['nombreImg']);
        //Getting the file ext
        $fileExt = explode('.',$fileName);
        $fileActualExt = strtolower(end($fileExt));
    
        //Array of Allowed file type
        $allowedExt = array("jpg","jpeg","png");
    
        //Checking, Is file extentation is in allowed extentation array
        if(in_array($fileActualExt, $allowedExt)){
            //Checking, Is there any file error
            if($fileError == 0){
                //Checking,The file size is bellow than the allowed file size
                if($fileSize < 10000000){
                    //Creating a unique name for file
                    //$fileNemeNew = uniqid('',true).".".$fileActualExt;
                    //File destination
                    $fileDestination = './../images/'.$_POST['nombreImg'];
                    //function to move temp location to permanent location
                    move_uploaded_file($fileTempName, $fileDestination);
                    //Message after success
                    echo "File Uploaded successfully";

                      include('./../js/bd.php');
                      //$consulta = "CALL `cambiar_imagenArt`(@rutaImagen='".$fileDestination."', @idarticulo='".$_POST['idArticulo']."');";
                      $consulta = 'UPDATE articulos SET articulos.art_imagen = "'.$fileDestination.'" WHERE articulos.art_id = '.$_POST["idArticulo"].'';
                  
                      $datos= mysqli_query ($conexion,$consulta);
                      mysqli_close($conexion);

                }else{
                    //Message,If file size greater than allowed size
                    echo "File Size Limit beyond acceptance";
                }
            }else{
                //Message, If there is some error
                echo "Something Went Wrong Please try again!";
            }
        }else{
            //Message,If this is not a valid file type
            echo "You can't upload this extention of file";
        }
    }
    }

    //Termina---Actualiza imagen del articulo seleccionado

    //Buscar producto en FACTURACION

    if(isset($_POST['action']) && $_POST['action'] == 'searchArticulo'){
      if(!empty($_POST['articulo'])){
        include('./../js/bd.php');
        $consulta = "SELECT * FROM `articulos` WHERE art_nom LIKE '%".$_POST['articulo']."%';";
        $db = mysqli_select_db( $conexion, $nombreBD ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );
        
        $datos= mysqli_query ($conexion,$consulta);
        
        $articulo = new stdClass();
        // 4) Ir Imprimiendo las filas resultantes
        while ($fila =mysqli_fetch_array($datos)){
          $id[] = $fila['art_id'];
          $nombre [] = $fila['art_nom'];
          $precio [] = $fila['art_precio'];
          $stock [] = $fila['art_stock'];
          
          $articulo->id = $id;
          $articulo->nombre = $nombre;
          $articulo->precio = $precio;
          $articulo->stock = $stock;
        }
        
          
          mysqli_close($conexion);

          if($articulo){
                $data = $articulo;
              }else{
                $data = 0;
              }

              echo json_encode($data,JSON_UNESCAPED_UNICODE);
              
          }
        
          exit;
      }
  //Termina---Buscar producto en FACTURACION

  //Procesar venta en facturacion
    $idFactura;
    if(isset($_POST['action']) && $_POST['action'] == 'procesarVenta'){
      if(!empty($_POST['procesarVenta'])){
        include('./../js/bd.php');

        $formated_DATE = date('Y-m-d');

        $consulta = "INSERT INTO `factura`(`fact_id`, `fact_fecha`) VALUES (null,'$formated_DATE')";
            
            $insertFactura= mysqli_query ($conexion,$consulta) or die(mysqli_error());
            mysqli_close($conexion);
            
                if($insertFactura == 1){
                    include('bd.php');
                    $result = mysqli_query($conexion,"SELECT Max(fact_id) FROM factura");
                    $row = mysqli_fetch_array($result);
                    $idFactura = $row[0];
                    
                    
                    mysqli_close($conexion);
                    
                    if($idFactura>0){
                      //$arrayVenta = $_POST['procesarVenta'];
                      
                      for ($i=0; $i < count($_POST['procesarVenta']) ; $i++) { 
                        
                        $venta_renglon=$_POST['procesarVenta'][$i]['nroRenglon'];
                        $venta_articulo=$_POST['procesarVenta'][$i]['id_articulo'][0];
                        $venta_cantidad=$_POST['procesarVenta'][$i]['cantidad'];
                        $venta_precio=$_POST['procesarVenta'][$i]['precioTotal'];
                      
                        include('bd.php');
                        
                        $consulta ="INSERT INTO `detalle_factura`(`dfact_renglon`, `fact_id`, `art_id`, `dfact_cantidad`, `dfact_precio`) VALUES ('$venta_renglon','$idFactura','$venta_articulo','$venta_cantidad','$venta_precio')";
                        $datos= mysqli_query ($conexion,$consulta);
                      
                        mysqli_close($conexion);
                        if($datos){
                          include('bd.php');
                        
                          $consulta ="CALL `restar_stock`($venta_articulo, $venta_cantidad)";
                          $datos= mysqli_query ($conexion,$consulta);
                        
                          mysqli_close($conexion);
                        }

                        
      
                      }
                      
                    }
                    if($idFactura){
                      $data = $datos;
                    }else{
                      $data = 0;
                    }
      
                    echo json_encode($data,JSON_UNESCAPED_UNICODE);
              }
        
            }
        exit;
    }
  //Termina---Procesar venta en facturacion

  //Buscador Ecommerce

    if(isset($_POST['action']) || $_POST['action']='buscar_ecommerce'){
      //SELECT * FROM articulos WHERE articulos.art_nom LIKE ('%', palabra , '%');
      include('bd.php');
                        
      $consulta ="SELECT * FROM articulos INNER JOIN categorias on articulos.art_categoria = categorias.cat_id WHERE articulos.art_nom Like '%".$_POST['buscar_ecommerce']."%' ORDER BY art_id DESC;";
      $datos= mysqli_query ($conexion,$consulta);

      $busqueda = new stdClass();
      while ($fila =mysqli_fetch_assoc($datos)){
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

  //Termina---Buscador Ecommerce
?>