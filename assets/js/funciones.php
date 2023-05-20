
<?php

$idFactura;
$categoriasCargadas = new stdClass();

function comprobarUsuario()
{
  if (isset($_SESSION['usuarioActivo']) && $_SESSION['usu_rol'] == 1) {
    // header('location: ./../maderastablas/principal.php');
  } elseif (isset($_SESSION['usuarioActivo']) && $_SESSION['usu_rol'] > 1) {
    header('location: ./../ecommerce/index.php');
  } else {
    header('location: ./../maderastablas/index.php');
  }
}


function mostrarArticulos()
{
  include('./../assets/js/bd.php');
  // 2) Preparar la orden SQL
  $consulta = "SELECT * FROM articulos INNER JOIN categorias on articulos.art_categoria = categorias.cat_id ORDER BY art_id DESC";

  // puedo seleccionar de DB
  $db = mysqli_select_db($conexion, $nombreBD) or die("Upps! Pues va a ser que no se ha podido conectar a la base de datos");

  // 3) Ejecutar la orden y obtener datos
  $datos = mysqli_query($conexion, $consulta);

  // 4) Ir Imprimiendo las filas resultantes
  $i = 1;
  while ($fila = mysqli_fetch_array($datos)) {
    //<th scope="col-1">'.$i++.'</th>

    echo '
                <tr>
                    <th class="align-middle p-0" >
                      <a role="button" id="imgProducto" onclick="redireccionArticulo_Imagenes(' . $fila["art_id"] . ')">Modificar imagenes</a>
                    </th>
                    <th class="align-middle p-0" >' . $fila["art_id"] . '</th>
                    <th class="align-middle p-0">' . $fila["art_cod"] . '</th>
                    <th class="align-middle p-0">' . $fila["art_nom"] . '</th>
                    <th class="align-middle p-0">$' . $fila["art_precio"] . '</th>
                    <th class="align-middle p-0">' . $fila["art_stock"] . '</th>
                    <th class="align-middle p-0">$' . $fila["art_costo"] . '</th>
                    
                    
                    <th class="align-middle p-0">' . $fila["cat_nom"] . '</th>
                    <th class="align-middle p-0">' . $fila["art_desc"] . '</th>
                    <th class="align-middle p-0">' . $fila["art_materiales"] . '</th>
                    <th class="align-middle p-0">' . $fila["art_notas"] . '</th>
                    <th class="align-middle ">
                    
                    <a role="button" id="modificar__Articulo' . $fila["art_id"] . '" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_modificarArticulo" data-art_id=' . $fila['art_id'] . ' >
                    <i class="bi bi-pencil-fill"></i>
                    </a>
                    <a role="button" id="eliminar__Articulo' . $fila["art_id"] . '" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal_eliminarArticulo" data-art_id=' . $fila['art_id'] . '>
                    <i class="bi bi-x-square"></i>
                    </a>
                  </th>
                </tr>';
  }

  mysqli_close($conexion);
}
function mostrarArticulos_Ecommerce()
{
  include('./../assets/js/bd.php');
  // 2) Preparar la orden SQL
  $consulta = "SELECT * FROM articulos INNER JOIN categorias on articulos.art_categoria = categorias.cat_id ORDER BY art_id DESC";

  // puedo seleccionar de DB
  $db = mysqli_select_db($conexion, $nombreBD) or die("Upps! Pues va a ser que no se ha podido conectar a la base de datos");

  // 3) Ejecutar la orden y obtener datos
  $datos = mysqli_query($conexion, $consulta);

  // 4) Ir Imprimiendo las filas resultantes
  $i = 1;
  while ($fila = mysqli_fetch_array($datos)) {
    //<th scope="col-1">'.$i++.'</th>
    echo '<div class="ProductsList_Card" id="art_Ecommerce" onclick="redireccionArticulo(' . $fila["art_id"] . ')">
              <img src="'. $fila["art_imagen"] .'" alt="error al cargar imagen" class="ProductsList_Card-Img">
          <div class="ProductsList_Card-Content">
              <span class="ProductsList_Card-Cat">' . $fila["cat_nom"] . '</span>
              <h5 class="ProductsList_Card-Name">' . $fila["art_nom"] . '</h5>
              <h4 class="ProductsList_Card-Price">$' . $fila["art_precio"] . '</h4>
          </div>
      </div>';
    /* echo '
                <div class="product" id="art_Ecommerce" onclick="redireccionArticulo(' . $fila["art_id"] . ')" data-art_id="' . $fila["art_id"] . '">
                <div class="product-imagen">
                    <img src="' . $fila["art_imagen"] . '" alt="error al cargar img">
                </div>
                    <div class="card-descripcion">
                        <span>' . $fila["cat_nom"] . '</span>
                        <h5>' . $fila["art_nom"] . '</h5>
                        <h4>$' . $fila["art_precio"] . '</h4>
                    </div>
                    <a href="#"><i class="bi bi-cart4 cart"></i></a>
                </div>'; */
  }

  mysqli_close($conexion);
}



function cargarCategorias()
{
  include('./../assets/js/bd.php');
  $consulta = "SELECT `cat_id`, `cat_nom`, `cat_obs` FROM `categorias` ORDER BY cat_nom";

  //$db = mysqli_select_db( $conexion, $nombreBD) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );

  $datos = mysqli_query($conexion, $consulta);

  if ($datos) {
    $categoriasCargadas = new stdClass();
    // 4) Ir Imprimiendo las filas resultantes
    while ($fila = mysqli_fetch_array($datos)) {
      $id[] = $fila[0];
      $nombre[] = $fila[1];

      $categoriasCargadas->id = $id;
      $categoriasCargadas->nombre = $nombre;

      echo '<option value="' . $fila[0] . '">' . $fila[1] . '</option>';
    }
  }
  mysqli_close($conexion);
}

//Buscar articulos en ...

if (isset($_POST['idAction']) && $_POST['idAction'] == 'searchIdArticulo') {
  if (!empty($_POST['idArticulo'])) {
    include('./../assets/js/bd.php');
    $consulta = "SELECT * FROM `articulos` WHERE id_articulo=" . $_POST['idArticulo'] . "";
    $db = mysqli_select_db($conexion, $nombreBD) or die("Upps! Pues va a ser que no se ha podido conectar a la base de datos");

    $datos = mysqli_query($conexion, $consulta);

    $articulo = new stdClass();

    // 4) Ir Imprimiendo las filas resultantes
    while ($fila = mysqli_fetch_array($datos)) {
      $id = $fila['id_articulo'];
      $precio = $fila['precio'];
      $cantidad = $fila['cantidad'];

      $articulo->id = $id;
      $articulo->precio = $precio;
      $articulo->cantidad = $cantidad;
    }


    mysqli_close($conexion);

    if ($articulo) {
      $dataId = $articulo;
    } else {
      $dataId = 0;
    }
    echo json_encode($articulo, JSON_UNESCAPED_UNICODE);
  }
}

if (isset($_POST['action']) && $_POST['action'] == 'procesarVenta') {

  $formated_DATE = date('Y-m-d');

  include('./../assets/js/bd.php');
  $consulta = "SELECT max(noFactura) FROM `facturas`";
  $db = mysqli_select_db($conexion, $nombreBD) or die("Upps! Pues va a ser que no se ha podido conectar a la base de datos");


  $datos = mysqli_query($conexion, $consulta);

  if ($datos !== 0) {
    $resultado = mysqli_fetch_assoc($datos);
    $idFactura = $resultado['max(noFactura)'];

    if ($idFactura > 0) {

      $arrayVenta = $_POST['detalleF'];
      for ($i = 0; $i < count($arrayVenta); $i++) {
        //print_r($arrayVenta[$i]['id_articulo']);
        echo "<br>";
        //insertarDetalle($arrayVenta[$i]['nroRenglon'],$idFactura,$arrayVenta[$i]['id_articulo'],$arrayVenta[$i]['cantidad'],$arrayVenta[$i]['precioTotal']);


        include('./../assets/js/bd.php');
        $consulta = "INSERT INTO `detalle_factura`(`nroRenglon`, `id_factura`, `id_articulo`, `cantidad`, `precio`) VALUES (" . $arrayVenta[$i]['nroRenglon'] . "," . $idFactura . "," . $arrayVenta[$i]['id_articulo'] . "," . $arrayVenta[$i]['cantidad'] . "," . $arrayVenta[$i]['precioTotal'] . ")";

        $db = mysqli_select_db($conexion, $nombreBD) or die("Upps! Pues va a ser que no se ha podido conectar a la base de datos");
        $datos = mysqli_query($conexion, $consulta);

        mysqli_close($conexion);
      }

      echo '
                    <div class="alert alert-success text-center" role="alert">
                    generando factura!..
                    </div>';
    } else {
      echo '
                    <div class="alert alert-danger text-center" role="alert">
                    no se pudo!..
                    </div>';
    }
    exit;
  }



  ///////////
}


////////------------------------------////////////////



// función sql que muestra las facturas
function mostrarFacturas()
{
  include('./../assets/js/bd.php');

  /* $consulta= "SELECT factura.fact_id ,factura.fact_fecha ,sum(dfact_precio) as precioTotal from detalle_factura INNER JOIN factura on detalle_factura.fact_id = factura.fact_id  GROUP BY fact_id ORDER BY fact_id DESC"; */
  $consulta = 'call mostrar_Facturas()';
  $datos = mysqli_query($conexion, $consulta);


  $i = 1;
  while ($fila = mysqli_fetch_array($datos)) {
    //<th scope="col-1">'.$i++.'</th>

    echo '
                      <tr>
                        
                          <th>' . $fila["fact_id"] . '</th>
                          <th>' . $fila["fact_fecha"] . '</th>
                          <th>' . $fila["precioTotal"] . '</th>
                         
                        <th class="align-middle text-center">
                          <a role="button" id="imprimir_Factura' . $fila["fact_id"] . '" class="btn btn-primary" data-fact_id=' . $fila['fact_id'] . '>
                          <i class="bi bi-printer-fill"></i>
                          </a>
                        </th>
                      </tr>';
  }


  mysqli_close($conexion);
}
//Termina---función sql que muestra las facturas

// función sql que muestra los gastos
function mostrarGastos()
{
  include('./../assets/js/bd.php');

  $consulta = "call mostrar_Gastos()";

  $datos = mysqli_query($conexion, $consulta);


  $i = 1;
  while ($fila = mysqli_fetch_array($datos)) {
    //<th scope="col-1">'.$i++.'</th>

    echo '
                      <tr>
                          <th class="col-1 text-center">' . $fila["numeracion"] . '</th>
                          <th>' . $fila["gas_concepto"] . '</th>
                          <th>' . $fila["gas_proveedor"] . '</th>
                          <th class="col-2 text-center">' . $fila["gas_fecha"] . '</th>
                          <th class="text-center">$' . $fila["gas_total"] . '</th>
                      </tr>';
  }


  mysqli_close($conexion);
}
//Termina---función sql que muestra los gastos

//Comienza---mostrar articulo seleccionado

function mostrarArticuloSeleccionado()
{
  if (isset($_GET['articleID'])) {
    //echo $_GET['articleID'];
    include('./../assets/js/bd.php');
    // 2) Preparar la orden SQL
    $consulta = "SELECT * FROM articulos INNER JOIN categorias on articulos.art_categoria = categorias.cat_id where art_id = " . $_GET['articleID'] . "";

    $consultaIMG = 'SELECT ruta_img
            FROM articulos
            INNER JOIN art_imagenes ON articulos.art_id = art_imagenes.art_id
            WHERE articulos.art_id = "' . $_GET['articleID'] . '" LIMIT 999999 OFFSET 1';

    $consultaPrimer_img = 'SELECT ruta_img
            FROM articulos
            INNER JOIN art_imagenes ON articulos.art_id = art_imagenes.art_id
            WHERE articulos.art_id = "' . $_GET['articleID'] . '" LIMIT 1';

    // 3) Ejecutar la orden y obtener datos
    $datos = mysqli_query($conexion, $consulta);
    $datosIMG = mysqli_query($conexion, $consultaIMG);
    $datosPrimer_img = mysqli_query($conexion, $consultaPrimer_img);

    $fila = mysqli_fetch_array($datos);
    $filaIMG = mysqli_fetch_array($datosIMG);
    $filaPrimer_IMG = mysqli_fetch_array($datosPrimer_img);

    echo '
    <!--Product Content-->
    <main class="ProductDetails">
        <div id="carouselExampleAutoplaying" class="carousel slide ProductDetails_Main" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="'.$filaPrimer_IMG['ruta_img'].'" class="ProductDetails_Main-Img " alt="...">
                </div>';
                while ($imagenRecibida = mysqli_fetch_array($datosIMG)) {


                  echo ' 
                             <div class="carousel-item">
                                 <img src="' . $imagenRecibida['ruta_img'] . '" class="ProductDetails_Main-Img" alt="...">
                                 
                             </div>';
                  // ... Resto del código ...
                }

            echo '</div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        </div>
        <div class="ProductDetails_Main-Content">
            <p class="ProductDetails_Main-Category">' . $fila["cat_nom"] . '</p>
            <p class="ProductDetails_Main-Name">' . $fila["art_nom"] . '</p>
            <p class="ProductDetails_Main-Description">' . $fila["art_desc"] . '</p>
            <p class="ProductDetails_Main-Price">$' . $fila["art_precio"] . '</p>
            <p class="ProductDetails_Main-Price">Stock:' . $fila["art_stock"] . '</p>
            <a href="https://wa.me/573001112233?text=Hola!%20Estoy%20interesado%20en%20este%20producto" class="ProductDetails_Main-Button" target="_blank">
                Consultar Producto
            </a>
        </div>
    </main>';


            

    mysqli_close($conexion);
  }
}

//Termina--- mostrar articulo seleccionado

//Comienza --- cargar 'cambio de imagenes' segun id articulo

function imagenes_articuloSeleccionado()
{
  if (isset($_GET['img_articleID'])) {

    include('./../assets/js/bd.php');
    // 2) Preparar la orden SQL
    $consulta = "SELECT * FROM articulos
            INNER JOIN art_imagenes ON articulos.art_id = art_imagenes.art_id
            WHERE articulos.art_id = " . $_GET['img_articleID'] . "";

    // puedo seleccionar de DB
    $db = mysqli_select_db($conexion, $nombreBD) or die("Upps! Pues va a ser que no se ha podido conectar a la base de datos");

    // 3) Ejecutar la orden y obtener datos
    $datos = mysqli_query($conexion, $consulta);

    $imagenes = array(); // Array para almacenar los objetos de gastos

    echo '
            <main class="main">';

    while ($fila = mysqli_fetch_array($datos)) {
      $ruta_img = $fila['ruta_img'];


      echo ' <div>
                          <img src="' . $fila["ruta_img"] . '" class="ProductCarrousel__Img" >
                      </div>';

      // ... Resto del código ...
    }

    echo '
            
        </main>';

    mysqli_close($conexion);
  }
}
//







?>
