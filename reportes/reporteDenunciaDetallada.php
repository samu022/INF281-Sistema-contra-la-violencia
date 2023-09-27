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
$pdf->SetTitle('Reporte de Victimas');
 


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

$pdf->SetFont('helvetica','B', 18); 
$pdf->Cell(90,6,'LISTA DE DENUNCIAS DETALLADAS',0,0,'B');


$pdf->Ln(10); //Salto de Linea
$pdf->SetTextColor(0, 0, 0); 

$pdf->SetFont('helvetica', '', 10);

$sql = "select distinct d.codDenuncia,d.tipo,d.descripcion descripcionViolencia,d.testigo,d.seguimiento,d.fecha,
p.ci ciV,concat(p.nombre,' ',p.apePaterno,' ',p.apeMaterno) nombreCompletoV,p.fechaNaci fechaNaciV,p.sexo sexoV,p.direccion direccionV,p.estado_civil estado_civilV,p.profesion profesionV,p.telefono telefonoV,v.relacion_perpetrador,
tmp.ci,tmp.nombreCompleto,tmp.fechaNaci,tmp.sexo,tmp.direccion,tmp.estado_civil,tmp.profesion,tmp.telefono,tmp.descripcion,pr.codPrueba,pr.tipo tipoPrueba,pr.descripcion descripcionPrueba
from persona p,victima v,denuncia d,realiza r,usuario u,prueba pr,incidente_prueba ip, (select p.ci,concat(p.nombre,' ',p.apePaterno,' ',p.apeMaterno) nombreCompleto,p.fechaNaci,p.sexo,p.direccion,p.estado_civil,p.profesion,p.telefono,a.descripcion
														from persona p,agresor a,realiza r
														where p.ci=a.ci and a.ci=r.ci)tmp
where p.ci=v.ci and v.codDenuncia=d.codDenuncia and r.codDenuncia=d.codDenuncia
and r.ci_usuario=u.ci_usuario and r.ci=tmp.ci and pr.codPrueba=ip.codPrueba 
and ip.codDenuncia=d.codDenuncia
";
$query = mysqli_query($con, $sql);
$nro = 1;

$pdf->SetFillColor(0, 115, 230); // Establece el color de fondo de la cabecera

while ($dataRow = mysqli_fetch_array($query)) {
    // Establece el color de fondo de la fila actual
    $pdf->SetFillColor($nro % 2 == 0 ? 191 : 223); // Alternar colores de fondo

    // Genera el contenido HTML para los datos con estilos CSS
    $html = "
    <div style='background-color: #F2F2F2; padding: 15px; margin-bottom: 15px; border-radius: 10px;'>
        <h2 style='background-color: #ffffff; color: #fff; padding: 10px; border-radius: 5px;'>Denuncia #$nro</h2>
        
        <div style='margin-left: 20px;'>
            <h3 style='background-color: #0073e6; color: #fff; padding: 5px; border-radius: 5px;'>Detalles de la denuncia</h3>
            <ul style='list-style-type: none; padding-left: 0;'>
                <li><strong style='color: #0073e6;'>Código:</strong> {$dataRow['codDenuncia']}</li>
                <li><strong style='color: #0073e6;'>Tipo de Violencia:</strong> {$dataRow['tipo']}</li>
                <li><strong style='color: #0073e6;'>Descripción:</strong> {$dataRow['descripcionViolencia']}</li>
                <li><strong style='color: #0073e6;'>Testigo:</strong> {$dataRow['testigo']}</li>
                <li><strong style='color: #0073e6;'>Seguimiento:</strong> {$dataRow['seguimiento']}</li>
                <li><strong style='color: #0073e6;'>Fecha:</strong> {$dataRow['fecha']}</li>
            </ul>
        </div>

        <div style='margin-left: 20px;'>
            <h3 style='background-color: #0073e6; color: #fff; padding: 5px; border-radius: 5px;'>Detalles de la víctima</h3>
            <ul style='list-style-type: none; padding-left: 0;'>
                <li><strong style='color: #0073e6;'>CI:</strong> {$dataRow['ciV']}</li>
                <li><strong style='color: #0073e6;'>Nombre Completo:</strong> {$dataRow['nombreCompletoV']}</li>
                <li><strong style='color: #0073e6;'>Fecha de Nacimiento:</strong> {$dataRow['fechaNaciV']}</li>
                <li><strong style='color: #0073e6;'>Sexo:</strong> {$dataRow['sexoV']}</li>
                <li><strong style='color: #0073e6;'>Dirección:</strong> {$dataRow['direccionV']}</li>
                <li><strong style='color: #0073e6;'>Estado Civil:</strong> {$dataRow['estado_civilV']}</li>
                <li><strong style='color: #0073e6;'>Profesión:</strong> {$dataRow['profesionV']}</li>
                <li><strong style='color: #0073e6;'>Teléfono:</strong> {$dataRow['telefonoV']}</li>
                <li><strong style='color: #0073e6;'>Relación con el Perpetrador:</strong> {$dataRow['relacion_perpetrador']}</li>
            </ul>
        </div>

        <div style='margin-left: 20px;'>
            <h3 style='background-color: #0073e6; color: #fff; padding: 5px; border-radius: 5px;'>Detalles del agresor</h3>
            <ul style='list-style-type: none; padding-left: 0;'>
                <li><strong style='color: #0073e6;'>CI:</strong> {$dataRow['ci']}</li>
                <li><strong style='color: #0073e6;'>Nombre Completo:</strong> {$dataRow['nombreCompleto']}</li>
                <li><strong style='color: #0073e6;'>Fecha de Nacimiento:</strong> {$dataRow['fechaNaci']}</li>
                <li><strong style='color: #0073e6;'>Sexo:</strong> {$dataRow['sexo']}</li>
                <li><strong style='color: #0073e6;'>Dirección:</strong> {$dataRow['direccion']}</li>
                <li><strong style='color: #0073e6;'>Estado Civil:</strong> {$dataRow['estado_civil']}</li>
                <li><strong style='color: #0073e6;'>Profesión:</strong> {$dataRow['profesion']}</li>
                <li><strong style='color: #0073e6;'>Teléfono:</strong> {$dataRow['telefono']}</li>
                <li><strong style='color: #0073e6;'>Descripción:</strong> {$dataRow['descripcion']}</li>
            </ul>
        </div>

        <div style='margin-left: 20px;'>
            <h3 style='color: #0073e6;'>Detalles de las pruebas</h3>
            <ul style='list-style-type: none; padding-left: 0;'>
                <li><strong>CodPrueba:</strong> {$dataRow['codPrueba']}</li>
                <li><strong>Tipo:</strong> {$dataRow['tipoPrueba']}</li>
                <li><strong>Descripción:</strong> {$dataRow['descripcionPrueba']}</li>
            </ul>
        </div>
    </div>
";
    // Agrega el contenido HTML al PDF
    $pdf->writeHTML($html, true, false, false, false, '');

    $nro++;
}

//$tableHtml .= '</table>';
//$pdf->writeHTML($html, true, false, false, false, '');

//$pdf->AddPage(); //Agregar nueva Pagina

$pdf->Output('reporte_victimas'.date('d_m_y').'.pdf', 'I'); 
// Output funcion que recibe 2 parameros, el nombre del archivo, ver archivo o descargar,
// La D es para Forzar una descarga
