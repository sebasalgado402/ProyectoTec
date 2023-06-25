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
<h2><span class="phpmaker">Imprimir ticket grande (3 l&iacute;neas, 23 caracteres por l&iacute;nea.)</span></h2>
<table class="ewListAdd" style="width:35%;">
<tr>
<td><span class="phpmaker">
<a href="tareaslist.php"><img src="./images/arrow_left.png" alt="" />&nbsp;Volver al listado</a>
</span></td>
</tr>
</table>
<br />
<form name="fticket" id="fticket" action="ticket-grande-1-crear.php" method="post">
L&iacute;nea 1:<input type="text" name="texto1" id="texto1" maxlength="23" size="23" class="cajatexto" required autofocus /><br />
L&iacute;nea 2:<input type="text" name="texto2" id="texto2" maxlength="23" size="23" class="cajatexto" /><br />
L&iacute;nea 3:<input type="text" name="texto3" id="texto3" maxlength="23" size="23" class="cajatexto" /><br />
<br />
<input type="submit" name="btnAction" id="btnAction" value="Imprimir ticket">
<br />
</form>
<?php include ("footer.php") ?>