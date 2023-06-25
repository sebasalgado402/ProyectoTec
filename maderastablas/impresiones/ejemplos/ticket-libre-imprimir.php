<?php
session_start();
ob_start();
if(!isset($_SESSION[ewimpresora])){/*header("Location: ./login.php");*/exit("No hay IP de la impresora - linea 4");}
if(!$_POST){header("Location: ./ticket-libre.php");exit("No hay datos - linea 5");}
$texto=trim($_POST['x_texto']);
if(strlen($texto) < 2){/*header("Location: ./ticket-libre.php");*/exit("No hay texto - linea 6");}

////////////////////////////////////// la libreria requiere GD, imagemagik y mbstring ////////////////////////////

$ipimpresora=$_SESSION[ewimpresora];
require './escpos/autoload.php';
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\NetworkPrintConnector;

$dia=date("d");
$mes=date("m");
$anio=date("Y");
$fecha_hoy_lat="$dia/$mes/$anio";
///////// IMPRESION ////////////////////////////////////////////
try {
$connector = new NetworkPrintConnector($ipimpresora, 9100);
//A veces la impresora demora en responder, espero 1 segundos
//sleep(1);
} catch (Exception $e) {
    echo "Ocurri&oacute; un problema con la impresora: " . $e -> getMessage() . "\n";
	$_SESSION[ewSessionMessage] = "Ocurri&oacute; un problema con la impresora: " . $e -> getMessage();
	exit("No hay datos - linea 23");
	header("Location: ./tareaslist.php");
}
$printer = new Printer($connector);
$printer -> initialize();
//$printer -> getPrintConnector() -> write(PRINTER::ESC . "B" . chr(3) . chr(1));
/*The B is for the bell chime, the second digit for the number of requested beeps, and the third for the time between beeps. 
Some other manufacturers use BEL or BEEP or even BEP for the chime.*/
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
$printer -> initialize();
$printer -> setLineSpacing();
$printer -> setJustification(Printer::JUSTIFY_LEFT);
$texto = utf8_encode($texto);
$texto = str_replace("\r\n","\n",$texto);
$texto = wordwrap($texto,48,"\n");
$printer -> text($texto."\n");
$printer -> setJustification(Printer::JUSTIFY_CENTER);
$printer -> text($_SESSION['USR_USUARIO']."\n");
$printer -> text("****  DIVISION INFORMATICA  ****\n");
$printer -> feed(1);
$printer -> cut();
$printer -> close();
///////// FIN IMPRESION ////////////////////////////////////////
header("Location: ./ticket-libre.php");
?>