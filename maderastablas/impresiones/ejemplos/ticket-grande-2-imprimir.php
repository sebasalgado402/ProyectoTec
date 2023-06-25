<?php
session_start();
$ipimpresora=$_SESSION[ewimpresora];
require './escpos/autoload.php';
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\NetworkPrintConnector;

$dia=date("d");
$mes=date("m");
$anio=date("Y");
$fecha_hoy_lat="$dia/$mes/$anio";

try {
$connector = new NetworkPrintConnector($ipimpresora, 9100);
} catch (Exception $e) {
    echo "Ocurri&oacute; un problema con la impresora: " . $e -> getMessage() . "\n";
	$_SESSION[ewSessionMessage] = "Ocurri&oacute; un problema con la impresora: " . $e -> getMessage();
	header("Location: ./tareaslist.php");
}
$printer = new Printer($connector);

$img = EscposImage::load("./tmp/ticket.png", false);
$printer -> initialize();
$printer -> bitImage($img);
//$printer -> graphics($img);

$printer -> setLineSpacing(5);
$printer -> setJustification(Printer::JUSTIFY_CENTER);
$printer -> text("┌──────────────────────────────┐\n");
$printer -> text("│     DIVISION INFORMATICA     │\n");
$printer -> text("├──────────────────────────────┤\n");
$printer -> setTextSize(1,2);
$printer -> text("│          ".$fecha_hoy_lat."          │\n");
$printer -> initialize();
$printer -> setJustification(Printer::JUSTIFY_CENTER);
$printer -> text("└──────────────────────────────┘\n");
$printer -> text($_SESSION['USR_USUARIO']."\n");

$printer -> cut();
$printer -> close();
///////// FIN IMPRESION ////////////////////////////////////////
header("Location: ./ticket-grande.php");
?>