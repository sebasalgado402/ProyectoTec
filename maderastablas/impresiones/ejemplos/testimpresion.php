<?php
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
	$_SESSION[ewSessionMessage] = "Ocurri&oacute; un problema con la impresora: " . $e -> getMessage();
	header("Location: ./tareaslist.php");
}
$printer = new Printer($connector);
$printer -> initialize();
$printer -> setLineSpacing(5);
$printer -> setJustification(Printer::JUSTIFY_CENTER);
$printer -> text("┌────────────────────────┐\n");
$printer -> text("│  DIVISION INFORMATICA  │\n");
$printer -> text("└────────────────────────┘\n");
$printer -> feed(1);
$printer -> selectPrintMode(Printer::MODE_EMPHASIZED);
$printer -> text("╔════════════════════════╗\n");
$printer -> text("║  DIVISION INFORMATICA  ║\n");
$printer -> text("╚════════════════════════╝\n");
$printer -> feed(1);
$printer -> text("┌────────────────────────┐\n");
$printer -> text("│  DIVISION INFORMATICA  │\n");
$printer -> text("├────────────────────────┤\n");
$printer -> text("│         Viernes        │\n");
$printer -> text("│       24/10/2019       │\n");
$printer -> text("└────────────────────────┘\n");
$printer -> setLineSpacing();
$printer -> cut();
$printer -> close();
///////// FIN IMPRESION ////////////////////////////////////////
?>