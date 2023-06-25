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
$logo = EscposImage::load("./images/escudo-salto-ticket.png", false);
$printer -> bitImage($logo);
$printer -> feed(1);
$printer -> text("┌──────────────────────────────┐\n");
$printer -> text("│     INTENDENCIA DE SALTO     │\n");
$printer -> text("│  DIR. GESTIÓN ADIMISTRATIVA  │\n");
$printer -> text("│     CENTRAL DE INFORMES      │\n");
$printer -> text("└──────────────────────────────┘\n");
$printer -> feed(1);
$printer -> setLineSpacing();
$printer -> setJustification(Printer::JUSTIFY_LEFT);
$printer -> selectPrintMode(Printer::MODE_DOUBLE_HEIGHT);
$printer -> text("NRO. RESERVA: \n");
$printer -> text("SECTOR/OFICINA: \n");
$printer -> text("FECHA: \n");
$printer -> text("HORA: \n");
$printer -> feed(1);
$printer -> setJustification(Printer::JUSTIFY_CENTER);
$printer -> selectPrintMode(Printer::MODE_FONT_A);
$printer -> text("(+598) 473 29898 INT.203 \n");
$printer -> text("dirgestionadministrativa@salto.gub.uy \n");

$testStr = "http://190.64.80.3/servonline/agendawebcancelar.php";
$printer -> qrCode($testStr, Printer::QR_ECLEVEL_M, 4);

$printer -> feed(1);
$printer -> cut();
$printer -> close();
///////// FIN IMPRESION ////////////////////////////////////////
?>