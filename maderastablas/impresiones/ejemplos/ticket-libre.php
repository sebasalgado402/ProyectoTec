<?php 
session_start();
ob_start();
?>
<?php
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // Always modified
header("Cache-Control: private, no-store, no-cache, must-revalidate"); // HTTP/1.1 
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache"); // HTTP/1.0
?>
<?php include ("ewconfig.php") ?>
<?php include ("db.php") ?>
<?php include ("tareasinfo.php") ?>
<?php include ("advsecu.php") ?>
<?php include ("phpmkrfn.php") ?>
<?php include ("ewupload.php") ?>
<?php
if (@$_SESSION['USR_USUARIO'] == '') {
	ob_end_clean();
	header("Location: /login.php");
	exit();
}
LoadUserLevel();
$ewCurSec = (IsLoggedIn())? CurrentUserLevelPriv("tareas") : GetAnonymousPriv("tareas");	
/*if (($ewCurSec & ewAllowEdit) <> ewAllowEdit) {
	ob_end_clean();
	header("Location: tareaslist.php");
	exit();
}*/
?>

<?php include ("header.php") ?>
<script type="text/javascript">
<!--
EW_LookupFn = "ewlookup.php"; // ewlookup file name
EW_AddOptFn = "ewaddopt.php"; // ewaddopt.php file name
//Si no está este script queda mal el margen superior
//del <h2> de la linea 42
//-->
</script>
<script src="./js/jquery.js"></script>
<script>
$(function() {
$('[id^="msj"]').on('click', function () {
	var msj = $(this).data("msj");
    $("#x_texto").val(msj+'\r');
    $("#x_texto").focus();
});

// Enviar el formulario una sola vez -----
$('#fticket').submit(function(){
    $('#btnAction').prop('disabled', true);
	$('#btnAction').val("Imprimiendo ticket...");
    });
});//fin $
</script>
<h2><span class="phpmaker">Imprimir ticket libre</span></h2>
<table class="ewListAdd" style="width:35%;">
<tr>
<td><span class="phpmaker">
<a href="tareaslist.php"><img src="./images/arrow_left.png" alt="" />&nbsp;Volver al listado</a>
</span></td>
</tr>
</table>
<br />
<form name="fticket" id="fticket" action="ticket-libre-imprimir.php" method="post">
<textarea cols="50" rows="4" id="x_texto" name="x_texto" style="border:1px solid #5A5A5A;" required autofocus></textarea>
<br /><br />
<input type="submit" name="btnAction" id="btnAction" class="vacio" style="color: #DEDEDE" value=" Imprimir ticket ">
<br />
</form>
<br />
<button class="enuso" id="msjf45f3423d" data-msj="Pronto para entregar">Pronto para entregar</button>
<button class="vacio" id="msjfgfdgs" data-msj="Contiene datos, guardar por unos dias">Contiene datos, guardar por unos dias</button>
<button class="enuso" id="msjfgf3423dgs" data-msj="Debian 10 limpio">Debian 10 limpio</button>
<button class="disponible" id="msjfdgsdfgfd" data-msj="Para recargar, ya salidos - Microtec">Para recargar, ya salidos - Microtec</button>
<button class="descartado" id="msjdfgfdgre54tdrg" data-msj="Para recargar, falta darle salida - Microtec">Para recargar, falta darle salida - Microtec</button>
<button class="recargando" id="msj347reyf4y5" data-msj="Roto, sin reparacion">Roto, sin reparacion</button>
<button class="descartado" id="msj347re4nmdvyf4y5" data-msj="Sacado de:">Sacado de:</button>
<button class="descartado" id="msj347re4nmdvyfdfgd5" data-msj="Para probar">Para probar</button>
<?php include ("footer.php") ?>