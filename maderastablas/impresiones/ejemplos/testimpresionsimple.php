<?php
error_reporting(E_ALL);
ini_set('display_errors', True);
////////////////////////////////////// la libreria requiere GD, imagemagik y mbstring ////////////////////////////
$ipimpresora="10.0.0.238";
require './escpos/autoload.php';
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\NetworkPrintConnector;
///////// IMPRESION ////////////////////////////////////////////
try {
$connector = new NetworkPrintConnector($ipimpresora, 9100);
} catch (Exception $e) {
    echo "Ocurri&oacute; un problema con la impresora: " . $e -> getMessage() . "\n";
	//$_SESSION[ewSessionMessage] = "Ocurri&oacute; un problema con la impresora: " . $e -> getMessage();
	//header("Location: ./tareaslist.php");
}
$printer = new Printer($connector);
$printer -> initialize();
$printer -> text("DIVISION INFORMATICA");
$printer -> feed(3);
$printer -> cut();
$printer -> close();
///////// FIN IMPRESION ////////////////////////////////////////
?>