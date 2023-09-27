<?php
require_once('tcpdf/tcpdf.php'); //Llamando a la Libreria TCPDF
include('../modelo/conexion.php'); //Llamando a la conexión para BD
date_default_timezone_set('America/La_Paz');

ob_end_clean(); //limpiar la memoria
$con = new Conexion();

class MYPDF extends TCPDF{
      
    	public function Header() {
            $bMargin = $this->getBreakMargin();
            $auto_page_break = $this->AutoPageBreak;
            $this->SetAutoPageBreak(false, 0);
            $img_file = dirname( __FILE__ ) .'/logo.jpg';
            $this->Image($img_file, 90, 14, 20, 25, '', '', '', false, 30, '', false, false, 0);
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
$pdf->SetCreator('UrianViera');
$pdf->SetAuthor('UrianViera');
$pdf->SetTitle('Reporte de informacion educativa');
 
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
$pdf->SetXY(150, 20);
$pdf->Write(0, 'Código: 0014ABC');
$pdf->SetXY(150, 25);
$pdf->Write(0, 'Fecha: '. date('d-m-Y'));
$pdf->SetXY(150, 30);
$pdf->Write(0, 'Hora: '. date('h:i A'));

$canal ='WebDeveloper';
$pdf->SetFont('helvetica','B',10); //Tipo de fuente y tamaño de letra
$pdf->SetXY(15, 20); //Margen en X y en Y
$pdf->SetTextColor(204,0,0);
$pdf->Write(0, 'Por un mundo sin violencia');
$pdf->SetTextColor(0, 0, 0); //Color Negrita
$pdf->SetXY(15, 25);
$pdf->Write(0, 'Tu puedes hacer la diferencia');



$pdf->Ln(35); //Salto de Linea
$pdf->Cell(40,26,'',0,0,'C');
/*$pdf->SetDrawColor(50, 0, 0, 0);
$pdf->SetFillColor(100, 0, 0, 0); */
$pdf->SetTextColor(34,68,136);

$pdf->SetFont('helvetica','B', 15); 
$pdf->Cell(100,6,'LISTA DE INFORMACION EDUCATIVA',0,0,'B');


$pdf->Ln(10); //Salto de Linea
$pdf->SetTextColor(0, 0, 0); 

$pdf->SetFont('helvetica','B', 10); 
$tableHtml = '
<table border="1" cellspacing="0" cellpadding="5">
    <tr>
        <th style="background-color: #0073e6; color: #fff; border: 1px solid #000; width: 7%;">nro</th>
        <th style="background-color: #0073e6; color: #fff; border: 1px solid #000; width: 25%;">titulo</th>
        <th style="background-color: #0073e6; color: #fff; border: 1px solid #000;">tipo violencia</th>
        <th style="background-color: #0073e6; color: #fff; border: 1px solid #000; width: 30%;">descripcion</th>
        <th style="background-color: #0073e6; color: #fff; border: 1px solid #000; width: 12%;">tipo</th>
        <th style="background-color: #0073e6; color: #fff; border: 1px solid #000; width: 15%;">fecha publicacion</th>
    </tr>';

$pdf->SetFont('helvetica','C', 10); 
$sql = "SELECT * FROM informacion_educativa";
$query = mysqli_query($con, $sql);
$esFilaPar = true;
$nro = 1;

while ($dataRow = mysqli_fetch_array($query)) {
    // Establece el color de fondo de la fila actual
    $filaColor = $esFilaPar ? '#BFBFFF' : '#DFDFFF';

    $tableHtml .= '
        <tr bgcolor="' . $filaColor . '">
            <td style="border: 1px solid #000;">' . $nro . '</td>
            <td style="border: 1px solid #000;">' . $dataRow['titulo'] . '</td>
            <td style="border: 1px solid #000;">' . $dataRow['tipoViolencia'] . '</td>
            <td style="border: 1px solid #000;">' . $dataRow['descripcion'] . '</td>
            <td style="border: 1px solid #000;">' . $dataRow['tipo'] . '</td>
            <td style="border: 1px solid #000;">' . $dataRow['fechaSubida'] . '</td>
        </tr>';

    // Cambia la variable para la siguiente fila
    $esFilaPar = !$esFilaPar;
    $nro++;
}

$tableHtml .= '</table>';
$pdf->writeHTML($tableHtml, true, false, false, false, '');

//$pdf->AddPage(); //Agregar nueva Pagina

$pdf->Output('reporte_informacionEducativa'.date('d_m_y').'.pdf', 'I'); 
// Output funcion que recibe 2 parameros, el nombre del archivo, ver archivo o descargar,
// La D es para Forzar una descarga
