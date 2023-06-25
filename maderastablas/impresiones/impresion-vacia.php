<?php
require './config.php';
require './escpos-php-2.2/autoload.php';
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\NetworkPrintConnector;
///////// IMPRESION ////////////////////////////////////////////
try {
$connector = new NetworkPrintConnector(IPIMPRESORA, 9100);
} catch (Exception $e) {
    echo "Ocurri&oacute; un problema con la impresora: " . $e -> getMessage() . "\n";
	$_SESSION[ewSessionMessage] = "Ocurri&oacute; un problema con la impresora: " . $e -> getMessage();
	header("Location: /");
}
$printer = new Printer($connector);
$printer -> initialize();
$printer -> setJustification(Printer::JUSTIFY_CENTER);
$logo = EscposImage::load("./images/logo-nuevo-jpg.jpg", false);
$printer -> bitImage($logo);
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
$printer -> text("Aqui va el contenido\n");

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
?>