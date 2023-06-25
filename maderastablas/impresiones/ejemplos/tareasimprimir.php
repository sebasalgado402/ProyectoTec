<?php
session_start();
ob_start();
$ipimpresora=$_SESSION[ewimpresora];
$idtareas=$_GET['idtareas'];
if(!$_GET or !is_numeric($idtareas) or $idtareas==0){
	header("Location: ./tareaslist.php");
	exit("Nro. de tarea incorrecto.");
}// Fin if chequeo nros.
include ("ewconfig.php");
include ("db.php");
include ("advsecu.php");
require './escpos/autoload.php';
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\NetworkPrintConnector;

// Open connection to the database
$conn = phpmkr_db_connect(HOST, USER, PASS, DB, PORT);
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
//$printer -> getPrintConnector() -> write(PRINTER::ESC . "B" . chr(3) . chr(1));
/*The B is for the bell chime, the second digit for the number of requested beeps, and the third for the time between beeps. 
Some other manufacturers use BEL or BEEP or even BEP for the chime.*/
/// Muestro los datos ////////////////////////////////////////
$sSql="SELECT * FROM `tareas` WHERE idtareas='$idtareas'";
//echo "$sSql <br />";exit();
$rs = phpmkr_query($sSql, $conn) or die("Falló al ejecutar la consulta en la línea " . __LINE__ . ": " . phpmkr_error($conn) . '<br>SQL: ' . $sSql);
if (phpmkr_num_rows($rs) < 1) {
	$_SESSION[ewSessionMessage] = "Ocurrio un error, no hay resultados.";
	header("Location: ./tareaslist.php");
	exit("Ocurrio un error, no hay resultados.");
}// Fin phpmkr_num_rows($rs)
$printer -> setJustification(Printer::JUSTIFY_CENTER);
while ($row = @phpmkr_fetch_array($rs)) {
	$printer -> setReverseColors(true);
	$printer -> setTextSize(1, 1);
	$printer -> text(" Solicitante \n");
	$printer -> setReverseColors(false);
	$printer -> selectPrintMode(Printer::MODE_FONT_A);
	$printer -> setTextSize(2, 1);
	$solicitante = wordwrap(utf8_encode($row['solicitante']),20,"\n");
	$printer -> text($solicitante."\n");
	$printer -> setReverseColors(true);
	$printer -> setTextSize(1, 1);
	$printer -> text(" Equipo \n");
	$printer -> setReverseColors(false);
	$printer -> selectPrintMode(Printer::MODE_FONT_A);
	$printer -> setTextSize(2, 1);
	$equipo = wordwrap(utf8_encode($row['equipo']),24,"\n");
	$printer -> text($equipo."\n");
	$printer -> setReverseColors(true);
	$printer -> setTextSize(1, 1);
	$printer -> text(" Lugar \n");
	$printer -> setReverseColors(false);
	$printer -> selectPrintMode(Printer::MODE_FONT_A);
	$printer -> setTextSize(2, 1);
	$lugar = wordwrap(utf8_encode($row['lugar']),20,"\n");
	$printer -> text($lugar."\n");
}// Fin while
$printer -> setJustification(Printer::JUSTIFY_CENTER);
$printer -> setTextSize(1, 1);
$printer -> text("────────────────────────────────────────────────\n");
/// Muestro el historial /////////////////////////////////////
$sSql="SELECT * FROM `historial`
INNER JOIN estados ON historial.estado=estados.idestados
INNER JOIN usuarios ON historial.usuario=usuarios.idusuarios
WHERE idtarea='$idtareas'
GROUP BY fechahistorial";
//echo "$sSql <br />";exit();
$rs = phpmkr_query($sSql, $conn) or die("Falló al ejecutar la consulta en la línea " . __LINE__ . ": " . phpmkr_error($conn) . '<br>SQL: ' . $sSql);
$printer -> setJustification(Printer::JUSTIFY_CENTER);
while ($row = @phpmkr_fetch_array($rs)) {
    $partesdt=explode(" ",$row['fechahistorial']); //aaaa-mm-dd
	$fecha_anglo = $partesdt[0];
	$partes=explode("-",$fecha_anglo); //aaaa-mm-dd
	$fechahistorial="$partes[2]/$partes[1]/$partes[0] $partesdt[1]"; //dd-mm-aaaa
	$printer -> setTextSize(2, 1);
	$printer -> text($fechahistorial."\n");
	//la sgte. linea es para las impresoras q no soportan tildes
	//$nombre = preg_replace('/&([a-z]{1,2})(acute|cedil|circ|grave|lig|orn|ring|slash|th|tilde|uml|caron);/i','$1',htmlentities($row['nombre']));
	$nombre = utf8_encode($row['nombre']);
	$printer -> text($nombre."\n");
	$printer -> text($row['estados']."\n");
	$printer -> setJustification(Printer::JUSTIFY_LEFT);
	$printer -> setTextSize(1, 1);
	//la sgte. linea es para las impresoras q no soportan tildes
	//$historialobs = preg_replace('/&([a-z]{1,2})(acute|cedil|circ|grave|lig|orn|ring|slash|th|tilde|uml|caron);/i','$1',htmlentities($row['historialobs']));
	$historialobs = utf8_encode($row['historialobs']);
	$historialobs = str_replace("\r\n","\n",$historialobs);
	$historialobs = wordwrap($historialobs,48,"\n");
	$printer -> text($historialobs."\n");
	$printer -> setJustification(Printer::JUSTIFY_CENTER);
	$printer -> text("────────────────────────────────────────────────\n");
}// Fin while
//$logo = EscposImage::load("./images/logo.png", false);
//$printer -> bitImage($logo);
//$printer -> graphics($logo);
$printer -> text("****  DIVISION INFORMATICA  ****\n");
$printer -> feed(1);
$printer -> cut();
$printer -> close();
///////// FIN IMPRESION ////////////////////////////////////////
header("Location: ./historialver.php?idhistorial=$idtareas");
?>