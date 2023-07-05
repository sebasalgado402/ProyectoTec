<?php
require './config.php';
require './escpos-php-2.2/autoload.php';
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\NetworkPrintConnector;

try {
	if (isset($_POST['action']) && $_POST['action'] == 'imprimirArt_seleccionado' && strlen($_POST['imprimirArt_seleccionado']) > 0 ) {
		$art_id=$_POST['imprimirArt_seleccionado'];

		$connector = new NetworkPrintConnector(IPIMPRESORA, 9100);
		$printer = new Printer($connector);
			$printer -> initialize();
			$printer -> setJustification(Printer::JUSTIFY_CENTER);
			//$logo = EscposImage::load("./images/nike.jpg", false);
			//$printer -> bitImage($logo);
			$printer -> text("Rodrigo Javier Barreda Machado\n");
			$printer -> text("RUT ".RUT."\n");
			$printer -> text(DIRECCION."\n");
			$printer -> setLineSpacing(5);
			$printer -> setTextSize(1, 2);
			$printer -> text("┌──────────────────────────────────────┐\n");
			$printer -> text("│  Accesorios de madera para tu hogar  │\n");
			$printer -> text("└──────────────────────────────────────┘\n");
			$printer -> setLineSpacing();

			//aqui va el contenido
			$sql = "SELECT * from articulos WHERE art_id='".$art_id."' and art_stock <> 0 limit 10";
			$result = mysqli_query($conn, $sql);
			//$printer -> selectPrintMode(Printer::MODE_FONT_A);
			//$printer -> selectPrintMode(Printer::MODE_FONT_B);
			while ($row = mysqli_fetch_array($result)) {
				$printer -> setJustification(Printer::JUSTIFY_LEFT);
				$art_nom = $row['art_nom'];
				$art_precio = "$".$row['art_precio'];
				// Ajustar el nombre si excede el ancho máximo permitido
				if (mb_strlen($art_nom) > 40) {
					$art_nom = mb_substr($art_nom, 0, 40) . '...';
				}
				// Ajustar el nombre y el precio en la misma línea
				$line = str_pad($art_nom, 40, ' ') . str_pad($art_precio, 5, ' ', STR_PAD_LEFT);
				$printer->text($line . "\n");
				
				$printer -> initialize();
				$printer -> setJustification(Printer::JUSTIFY_LEFT);
				$art_desc = wordwrap($row['art_desc'],48,"\n");
				$printer -> text($art_desc."\n");
			}// Fin while


			
			$printer -> initialize();
			$printer -> text("────────────────────────────────────────────────\n");
			$printer -> setTextSize(2, 1);
			$printer -> text("WHATSAPP: ".CEL."\n");
			$printer -> text("INSTAGRAM: ".INSTAGRAM."\n");

			$printer -> initialize();
			$printer -> text("Aceptamos todas las tarjetas, \n");
			$printer -> text("MercadoPago y transferencia bancaria.\n");

			$printer -> feed(1);
			$printer -> cut();
			$printer -> close();
			///////// FIN IMPRESION ////////////////////////////////////////
			echo json_encode('exito', JSON_UNESCAPED_UNICODE);
			exit;
			}
		} catch (Exception $e) {
			echo "Ocurri&oacute; un problema con la impresora: " . $e -> getMessage() . "\n";
			$_SESSION[ewSessionMessage] = "Ocurri&oacute; un problema con la impresora: " . $e -> getMessage();
			echo json_encode('error', JSON_UNESCAPED_UNICODE);
			exit;
		}
		
		
	
?>