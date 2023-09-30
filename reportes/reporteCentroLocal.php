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
$pdf->SetTitle('Informe de centros locales');
 
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
//$pdf->SetTextColor(255,204,0); //Amarillo
//$pdf->SetTextColor(34,68,136); //Azul
//$pdf->SetTextColor(153,204,0); //Verde
//$pdf->SetTextColor(204,0,0); //Marron
//$pdf->SetTextColor(245,245,205); //Gris claro
//$pdf->SetTextColor(100, 0, 0); //Color Carne
$pdf->SetFont('helvetica','B', 15); 
$pdf->Cell(100,6,'LISTA DE CENTROS LOCALES',0,0,'B');


$pdf->Ln(10); //Salto de Linea
$pdf->SetTextColor(0, 0, 0); 

//Almando la cabecera de la Tabla
$pdf->SetFillColor(102, 204, 255);
$pdf->SetFont('helvetica','B',12); //La B es para letras en Negritas


$sql = ("SELECT * FROM centro_local");

$query = mysqli_query($con, $sql);


// Crear una tabla con dos columnas
$pdf->SetFont('helvetica', '', 12);
$pdf->SetFillColor(191, 191, 255); // Color de fondo de la fila

// Definir ancho de columnas
$col1_width = 80;
$col2_width = 80;

$contadorFilas = 0;

while ($dataRow = mysqli_fetch_array($query)) {
    // Alternar colores de fondo de fila
    $colorFondo = $contadorFilas % 2 == 0 ? [153, 255, 153] : [255, 255, 128];
    
    // Crear una fila de la tabla con color de fondo alternante
    $pdf->SetFillColor($colorFondo[0], $colorFondo[1], $colorFondo[2]);
    $pdf->MultiCell($col1_width, 10, "Código: {$dataRow['codCentro']} \nNombre: {$dataRow['nombre']} \nTelefono: {$dataRow['telefono']} \nUbicacion: {$dataRow['ubicacion']}", 1, 'L', true);
    
    // Verificar si la imagen existe
    $imagen_path = '../archivosCentrosLocales/' . $dataRow['archivo'];
    if (file_exists($imagen_path)) {
        // Mostrar la imagen en la columna derecha con borde
        $pdf->Image($imagen_path, $pdf->GetX() + $col1_width, $pdf->GetY(), 60, 30);
    } else {
        // Manejar el caso en que la imagen no existe con borde
        $pdf->SetFillColor(255, 0, 0); // Color de fondo rojo para indicar imagen no disponible
        $pdf->Cell($col2_width, 30, 'Imagen no disponible', 1, 0, 'C', true);
    }
    
    // Salto de línea para la siguiente fila
    $pdf->Ln();
    
    // Incrementar el contador de filas
    $contadorFilas++;
}

// ... (código posterior)

//$pdf->AddPage(); //Agregar nueva Pagina

$pdf->Output('reporte_centroLocal'.date('d_m_y').'.pdf', 'I'); 
// Output funcion que recibe 2 parameros, el nombre del archivo, ver archivo o descargar,
// La D es para Forzar una descarga
