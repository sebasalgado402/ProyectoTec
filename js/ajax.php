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
    
    if(isset($_POST['action']) && $_POST['action'] == 'modalcambiar_Imagen'){
      $modificar_imagenProducto = $_POST['modalcambiar_Imagen'];
        if(!empty($modificar_imagenProducto)){  
                  include('./../js/bd.php');
                 
                    $consulta = "UPDATE `articulos` SET `art_imagen` = './../images/".$modificar_imagenProducto[1]."' WHERE `articulos`.`art_id` = ".$modificar_imagenProducto[0]." limit 1";
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

    //Termina---Actualiza imagen del articulo seleccionado
?>