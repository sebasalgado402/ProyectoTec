<?php 
     
     function desconectarBD($conexion){
      mysqli_close($conexion);
     }

    //Modificar Producto
        if(isset($_POST['action']) && $_POST['action'] == 'modificarArticulo'){
            if(!empty($_POST['modificar__Articulo'])){
              $nombreBD = 'barredadb';
              
              $conexion = mysqli_connect("localhost", "root", "","$nombreBD");

                $consulta = "SELECT * FROM `articulos` WHERE art_id = ".$_POST['modificar__Articulo']."";
                $db = mysqli_select_db( $conexion, 'barredadb' ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );
                
                $datos= mysqli_query ($conexion,$consulta);
                
                $articulo = new stdClass();
                
                desconectarBD($conexion);
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
                  
                  $articulo->art_nom =$art_nom;
                  $articulo->art_desc =$art_desc;
                  $articulo->art_precio =$art_precio;
                  $articulo->art_stock =$art_stock;
                  $articulo->art_costo =$art_costo;
                  $articulo->art_vendible =$art_vendible;
                  $articulo->art_deshabilitado =$art_deshabilitado;
                  $articulo->art_categoria =$art_categoria;
                  $articulo->art_materiales =$art_materiales;

                  
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
        

    //Termina Modificar Producto

?>