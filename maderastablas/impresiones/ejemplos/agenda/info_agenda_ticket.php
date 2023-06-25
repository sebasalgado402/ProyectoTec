<?php
session_start();
include("db.php");
if($_GET){
  //$idreserva = decrypt($_GET['sesid']);
  /* 2023-01-24 */
  $idreserva = $_GET['sesid'];
}else{
  header("Location: agendaweb.php");
}
// Conexion DB DMZ
$conn = conectar();
if (!$conn) { throw new Exception('Error al Abrir la DB'); }

// solicitud
$sql = "SELECT * FROM agenda_reservas res";
$sql = $sql . " LEFT JOIN agenda_tramites tra ON tra.tramiteid = res.reservatramite";
$sql = $sql . " LEFT JOIN agenda_turnos tur ON tur.turnoid = res.reservaturno";
$sql = $sql . " WHERE res.reservaid = ".$idreserva;
$result = mysqli_query($conn,$sql);
if (!$result) { throw new Exception('Error al ejecutar: '.$sql); }
$fila = mysqli_fetch_object($result);

// cierro db
cerrar($conn);

///////////// IMPRESION ////////////////////////////////////////
$ipimpresora="10.0.25.238";
if ($_SESSION["USR_USUARIO"] == 'RBARREDA'){$ipimpresora="10.0.0.238";}
if ($_SESSION["USR_USUARIO"] == 'STEXEIRANUNEZ'){$ipimpresora="10.0.25.238";}
if ($_SESSION["USR_USUARIO"] == 'CFARINHA'){$ipimpresora="10.0.25.238";}
if ($_SESSION["USR_USUARIO"] == 'CSOFFIA'){$ipimpresora="10.0.1.239";}
require './escpos/autoload.php';
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\NetworkPrintConnector;
try{
	$connector = new NetworkPrintConnector($ipimpresora, 9100);
}catch (Exception $e){
    echo "Ocurri&oacute; un problema con la impresora: " . $e -> getMessage() . "<br>";
	echo "Verifique que la impresora est&eacute; prendida y conectada a la red.";
}
//Solo imprimen los usuarios definidos mas arriba //////////////
if($_SESSION["USR_USUARIO"] == 'RBARREDA' || $_SESSION["USR_USUARIO"] == 'CSOFFIA' || $_SESSION["USR_USUARIO"] == 'STEXEIRANUNEZ' || $_SESSION["USR_USUARIO"] == 'CFARINHA'){
$printer = new Printer($connector);
$printer -> initialize();
$printer -> setLineSpacing(5);
$printer -> setJustification(Printer::JUSTIFY_CENTER);
$logo = EscposImage::load("./images/escudo-salto-ticket.png", false);
$printer -> bitImage($logo);
$printer -> feed(1);
$printer -> text("┌──────────────────────────────┐\n");
$printer -> text("│     INTENDENCIA DE SALTO     │\n");
$printer -> text("│  DIR. GESTIÓN ADMINISTRATIVA │\n");
$printer -> text("│     CENTRAL DE INFORMES      │\n");
$printer -> text("│   TEL. 473 29898 INT. 110    │\n");
$printer -> text("└──────────────────────────────┘\n");
$printer -> feed(1);
$printer -> setLineSpacing();
$printer -> setJustification(Printer::JUSTIFY_LEFT);
$printer -> selectPrintMode(Printer::MODE_EMPHASIZED);
$printer -> text("NRO. RESERVA: ".$fila->reservaid."\n");
$printer -> text("SECTOR/OFICINA: ".trim($fila->tramiteoficina)."\n");
$printer -> selectPrintMode(Printer::MODE_FONT_A);
$printer -> text(trim($fila->tramitedir)."\n");
$printer -> selectPrintMode(Printer::MODE_EMPHASIZED);
$printer -> text("FECHA: ".format_date2($fila->reservafecha)."\n");
if($fila->turnonombre == 'Presencial'){
  $printer -> text("TIPO: Presencial"."\n");
}else{
  $printer -> text("HORA: ".substr($fila->turnohora,0,5)."\n");
}
$printer -> text("SOLICITANTE: ".trim($fila->documento)."\n");
$printer -> selectPrintMode(Printer::MODE_FONT_A);
$printer -> text($fila->nombres." ".$fila->apellidos."\n");
$printer -> feed(1);
$printer -> setJustification(Printer::JUSTIFY_CENTER);
$printer -> selectPrintMode(Printer::MODE_FONT_A);
$printer -> text("Horarios de atencion: \n");
$printer -> text("Oficinas Centrales de 08:30 a 15:00 \n");
$printer -> text("Clinica de 07:00 a 10:30 \n");
$printer -> text("dirgestionadministrativa@salto.gub.uy \n");
$printer -> text("(+598) 473 29898 Interno 203 \n");
$printer -> feed(2);
$printer -> cut();
$printer -> close();
}// Fin if usuarios
///////// FIN IMPRESION ////////////////////////////////////////
header("Location: info_agenda.php?sesid=".$idreserva);
?>