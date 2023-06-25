<?php
header('Content-type: image/png');
if(!$_POST){header("Location: ./ticket-libre.php");exit("No hay datos");}
$texto1=strtoupper($_POST['texto1']);
$texto2=strtoupper($_POST['texto2']);
$texto3=strtoupper($_POST['texto3']);
$im = imagecreate(208, 70);
$img = imagecreate(832, 420);
// Fondo blanco y texto azul
$fondo = imagecolorallocate($im, 255, 255, 255);
$color_texto = imagecolorallocate($im, 0, 0, 0);

// Escribir la cadena en la parte superior izquierda
imagestring($im, 5, 0, 7, $texto1, $color_texto);
imagestring($im, 5, 0, 22, $texto2, $color_texto);
imagestring($im, 5, 0, 37, $texto3, $color_texto);
imagecopyresampled($img, $im, 0, 0, 0, 0, 832, 420, 208, 70);
$img = imagerotate($img, 270, 0);
// Guardar la imagen
//imagepng($img);exit();
imagepng($img, "./tmp/ticket.png");
imagedestroy($img);
header("Location: ./ticket-grande-2-imprimir.php");
?>