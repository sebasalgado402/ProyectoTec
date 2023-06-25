<?php
	use Mike42\Escpos\Printer;
	use Mike42\Escpos\EscposImage;
	use Mike42\Escpos\PrintConnectors\NetworkPrintConnector;
	require './config.php';
	require './escpos-php-2.2/autoload.php';
	
	
	
	/*if(!$_GET or !is_numeric($cat_id) or $cat_id <= 0){
		header("Location: ./");
		exit("Nro. de categoria incorrecto.");
	}// Fin if chequeo nros.*/
	
	///////// IMPRESION ////////////////////////////////////////////
	try {
		if (isset($_POST['action']) && $_POST['action'] == 'imprimirFactura' && strlen($_POST['imprimirFactura']) > 0 ) {
			$id_fact = $_POST['imprimirFactura'];
			
			$connector = new NetworkPrintConnector(IPIMPRESORA, 9100);
			$printer = new Printer($connector);
			$printer->initialize();
			$printer->setJustification(Printer::JUSTIFY_CENTER);
			$printer->text("Rodrigo Javier Barreda Machado\n");
			$printer->text("RUT ".RUT."\n");
			$printer->text(DIRECCION."\n");
			$printer->setLineSpacing(5);
			$printer->setTextSize(1, 2);
			$printer->text("┌──────────────────────────────────────┐\n");
			$printer->text("│  Accesorios de madera para tu hogar  │\n");
			$printer->text("└──────────────────────────────────────┘\n");
			$printer->setLineSpacing();
			
			// Aquí va el contenido de la factura
			$sql = "CALL `ver_factura`($id_fact);";
			
			$result = mysqli_query($conn, $sql);
			  // Títulos de la tabla
			  $printer->setJustification(Printer::JUSTIFY_LEFT);
			  $printer->text(str_pad("Cant", 5) . str_pad("Nombre", 19) . str_pad("PrecioU", 11) . str_pad("Total", 11) . "\n");
	  
			  // Línea divisoria
			  $printer->text(str_repeat("-", 5) . str_repeat("-", 19) . str_repeat("-", 11) . str_repeat("-", 11) . "\n");
	  
			  $total = 0; // Variable para acumular el total
				while ($row = mysqli_fetch_array($result)) {
					$printer->setJustification(Printer::JUSTIFY_LEFT);
					
					$cantidad = $row['cantidad'];
					$nombre = $row['articulo'];
					$precioUnitario = "$" . $row['precioUnitario'];
					$precioFinal = "$".$row['precioFinal'];
					$total += $row['precioFinal'];
					// Ajustar el nombre del artículo si excede el ancho máximo permitido
					if (mb_strlen($nombre) > 19) {
						$nombre = mb_substr($nombre, 0, 19) . '...';
					}

					// Generar la línea de la tabla con los detalles de la factura
					$printer->text(str_pad($cantidad, 5) . str_pad($nombre, 19) . str_pad($precioUnitario, 11) . str_pad($precioFinal, 11) . "\n");
					 // Línea divisoria
					 $printer->text(str_repeat("-", 5) . str_repeat("-", 19) . str_repeat("-", 11) . str_repeat("-", 11) . "\n");
	  
				}
				
				// Calcula la cantidad de espacios en blanco necesarios para centrar el total
				$totalWidth = 46; // Ancho total de la línea
				$totalText = "Total: $" . $total; // Texto del total
				$totalSpaces = $totalWidth - mb_strlen($totalText); // Cantidad de espacios en blanco necesarios
				$leftSpaces = $totalSpaces / 2; // Espacios en blanco a la izquierda del total
				$rightSpaces = $totalSpaces - $leftSpaces; // Espacios en blanco a la derecha del total

				// Imprime el total centrado
				$printer->text(str_repeat(" ", $leftSpaces) . "Total: $" . $total . str_repeat(" ", $rightSpaces) . "\n");


				$printer->feed(1);
		
			$printer->initialize();
			$printer->setTextSize(2, 1);
			$printer->text("WHATSAPP: ".CEL."\n");
			$printer->text("INSTAGRAM:".INSTAGRAM."\n");
			
			$printer->initialize();
			$printer->text("Aceptamos todas las tarjetas, \n");
			$printer->text("MercadoPago y transferencia bancaria.\n");
			
			$printer->feed(1);
			$printer->cut();
			$printer->close();
			
			echo json_encode('exito', JSON_UNESCAPED_UNICODE);
			exit;

			

		}else{
			echo json_encode('no llega el post', JSON_UNESCAPED_UNICODE);
		}
	} catch (Exception $e) {
		
		echo json_encode("Error:La impresora no esta conectada");
		exit;
	}
	



?>