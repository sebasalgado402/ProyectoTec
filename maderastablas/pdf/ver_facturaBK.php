<?php
require_once('tcpdf/tcpdf.php'); //Llamando a la Libreria TCPDF
include('./../../assets/js/bd.php'); //Llamando a la conexión para BD
date_default_timezone_set('America/Montevideo');


ob_end_clean(); //limpiar la memoria


class MYPDF extends TCPDF{
      
    	public function Header() {
            $bMargin = $this->getBreakMargin();
            $auto_page_break = $this->AutoPageBreak;
            $this->SetAutoPageBreak(false, 0);
            $img_file = dirname( __FILE__ ) .'./../../assets/icons/logomt.jpg';
            $this->Image($img_file, 10, 8, 25, 25, '', '', '', false, 30, '', false, false, 0);
            $this->SetAutoPageBreak($auto_page_break, $bMargin);
            $this->setPageMark();
	    }
}



//Iniciando un nuevo pdf
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, 'mm', 'Letter', true, 'UTF-8', false);
 
//Establecer margenes del PDF
$pdf->SetMargins(20, 35, 25);
$pdf->SetHeaderMargin(20);
$pdf->setPrintFooter(false);
$pdf->setPrintHeader(true); //Eliminar la linea superior del PDF por defecto
$pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM); //Activa o desactiva el modo de salto de página automático
 
//Informacion del PDF
$pdf->SetCreator('Maderas Tablas');
$pdf->SetAuthor('Administrador');
$pdf->SetTitle('Factura');
 
/** Eje de Coordenadas
 *          Y
 *          -
 *          - 
 *          -
 *  X ------------- X
 *          -
 *          -
 *          -
 *          Y
 * 
 * $pdf->SetXY(X, Y);
 */

//Agregando la primera página
$pdf->AddPage();
$pdf->SetFont('helvetica','B',10); //Tipo de fuente y tamaño de letra
//.$_POST['fact_id'].
$sqlFecha = ("call ver_factura(165)");
$queryFecha = mysqli_query($conexion, $sqlFecha);
$arrayObtenido = mysqli_fetch_array($queryFecha);

$originalDate = $arrayObtenido['fecha'];
$fechaFactura = date("d/m/Y", strtotime($originalDate));

mysqli_close($conexion);

$pdf->SetXY(150, 25);
$pdf->Write(0, 'Fecha: '. $fechaFactura);
//$pdf->SetXY(150, 30);
//$pdf->Write(0, 'Hora: '. date('h:i A'));

/* $canal ='WebDeveloper';
$pdf->SetFont('helvetica','B',10); //Tipo de fuente y tamaño de letra
$pdf->SetXY(15, 20); //Margen en X y en Y
$pdf->SetTextColor(204,0,0);
$pdf->Write(0, 'Desarrollador: Urian Viera');
$pdf->SetTextColor(0, 0, 0); //Color Negrita
$pdf->SetXY(15, 25);
$pdf->Write(0, 'Canal: '. $canal);
 */


$pdf->Ln(10); //Salto de Linea
$pdf->Cell(40,26,'',0,0,'C');
/*$pdf->SetDrawColor(50, 0, 0, 0);
$pdf->SetFillColor(100, 0, 0, 0); */
$pdf->SetTextColor(34,68,136);
//$pdf->SetTextColor(255,204,0); //Amarillo
//$pdf->SetTextColor(34,68,136); //Azul
//$pdf->SetTextColor(153,204,0); //Verde
//$pdf->SetTextColor(204,0,0); //Marron
//$pdf->SetTextColor(245,245,205); //Gris claro
//$pdf->SetTextColor(100, 0, 0); //Color Carne
$pdf->SetFont('helvetica','B', 15); 
$pdf->Cell(90,6,'Factura',0,0,'C');


$pdf->Ln(10); //Salto de Linea
$pdf->SetTextColor(0, 0, 0); 

//Almando la cabecera de la Tabla
$pdf->SetFillColor(232,232,232);
$pdf->SetFont('helvetica','B',12); //La B es para letras en Negritas
$pdf->Cell(10,6,'---',1,0,'C',1);
$pdf->Cell(60,6,'Articulos',1,0,'C',1);
$pdf->Cell(20,6,'Cantidad',1,0,'C',1);
$pdf->Cell(35,6,'Precio Unitario',1,0,'C',1);
$pdf->Cell(35,6,'SubTotal',1,1,'C',1); 
/*El 1 despues de  Fecha Ingreso indica que hasta alli 
llega la linea */

$pdf->SetFont('helvetica','',10);


//SQL para consultas Empleados
//$fechaInit = date("Y-m-d", strtotime($_POST['fecha_ingreso']));
//$fechaFin  = date("Y-m-d", strtotime($_POST['fechaFin']));
include('./../../assets/js/bd.php');
$sqlTrabajadores = ("call ver_factura(165)");
//$sqlTrabajadores = ("SELECT * FROM trabajadores");
$query = mysqli_query($conexion, $sqlTrabajadores);

while ($dataRow = mysqli_fetch_array($query)) {
        $pdf->Cell(10,6,($dataRow['nroRenglon']),1,0,'C');
        $pdf->Cell(60,6,$dataRow['articulo'],1,0,'C');
        $pdf->Cell(20,6,($dataRow['cantidad']),1,0,'C');
        $pdf->Cell(35,6,($dataRow['precioUnitario']),1,0,'C');
        $pdf->Cell(35,6,('$ '.$dataRow['precioFinal']),1,1,'C'); 
        //$pdf->Cell(35,6,(date('m-d-Y', strtotime('$ '.$dataRow['precioTotal']))),1,1,'C');
    }
    mysqli_close($conexion);

    include('./../../assets/js/bd.php');
$sqlFactura = ("call precioTotal_Factura(165)");
//$sqlTrabajadores = ("SELECT * FROM trabajadores");
$queryFactura = mysqli_query($conexion, $sqlFactura);
$totalFactura = mysqli_fetch_array($queryFactura);

    $pdf->Ln(1); //Salto de Linea
    $pdf->Cell(60,26,'',0,0,'C');
    $pdf->SetTextColor(0);
    $pdf->SetFont('helvetica','B', 15); 
    //$pdf->Cell(170,6,'Total',0,0,'C');
    $pdf->Ln(7);
    $pdf->SetFont('helvetica', 15); 
    $pdf->Cell(60,26,'',0,0,'C');
    $pdf->Cell(170,6,$totalFactura['total'],0,0,'C');




    mysqli_close($conexion);
//$pdf->AddPage(); //Agregar nueva Pagina

$pdf->Output('Factura-'.$fechaFactura[0].$fechaFactura[1].'-'.$fechaFactura[2].$fechaFactura[3].'-'.$fechaFactura[6].$fechaFactura[7].$fechaFactura[8].$fechaFactura[9].'pdf', 'I'); 
// Output funcion que recibe 2 parameros, el nombre del archivo, ver archivo o descargar,
// La D es para Forzar una descarga
