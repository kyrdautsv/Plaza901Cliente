<?php




//============================================================+
// File name   : example_006.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 006 for TCPDF class
//               WriteHTML and RTL support
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: WriteHTML and RTL support
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
//require_once('conexion/conexion.php');
require_once('tcpdf_include.php');


// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

// set document information
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor('Kandyy');
$pdf->setTitle('TCPDF Example 006');
$pdf->setSubject('TCPDF Tutorial');
$pdf->setKeywords('TCPDF, PDF, example, test, guide');


// set default header data
//$pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 006', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->setMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
//$pdf->setHeaderMargin(PDF_MARGIN_HEADER);
//$pdf->setFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->setAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->setFont('Helvetica', '', 8);
$pdf->SetMargins(7, 7, 7, false); 
$pdf->SetAutoPageBreak(true, 8); 
$pdf->setLineWidth(0.505);
$pdf->setFooterMargin();


// add a page


// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// Print a table

// add a page

$pdf->AddPage();



$html = '<h2></h2>
<table border="1" style="padding-top:3px;padding-right:2px;" >			
	
<tr>
<td width="30%" Vspace="5px" height="70px" align="center" valign="middle" style="padding-top:20px" > <BR> <img src="images/ut.jpg" Vspace="5px"  align="center"  height="45px" border="0" /></td>
	<td  width="40%"  height="70px"  align="center" valign="middle" padding:"15px" style="padding-bottom:20px;font-weight:bold;"  > <BR> <BR> FORMATO INSCRIPCIÓN <BR> UTSV-DSE-FO-03 <BR></td>
	<td width="30%" height="70px"  align="center" valign="middle" style="padding-top:20px" ><BR> <BR> </td>
</tr>



<tr>
<th style="font-weight:bold;" colspan="1" align="left" width="10%" >NOMBRE:</th>
<th align="center" width="60%" border="1" ></th>
<th  style="font-weight:bold;" colspan="1" width="12%" align="center" >MATRICULA:</th>
<th align="center" width="18%" border="1" ></th>
</tr>

<tr>
<th style="font-weight:bold;" colspan="1" align="left" width="10%" >CARRERRA:</th>
<th  colspan="3" align="center" width="90%" border="1" ></th>
</tr>

<tr>
<th style="font-weight:bold;" colspan="1" align="left" width="10%" >CAMPUS:</th>
<th align="center" width="20%" border="1" ></th>
<th style="font-weight:bold;" colspan="1" width="20%" align="center" >GRUPO:</th>
<th align="center" width="20%" border="1" ></th>
<th style="font-weight:bold;" colspan="1" width="12%" align="center" >MODALIDAD:</th>
<th align="center" width="18%" border="1" ></th>
</tr>

<tr>
<th style="font-weight:bold;" colspan="1" align="left" width="10%" >TURNO:</th>
<th style="font-weight:bold;" colspan="1" align="center" width="15%" >MATUTINO</th>
<th align="center" width="15%" border="1" ></th>
<th style="font-weight:bold;" colspan="1" width="15%" align="center" >VESPERTINO</th>
<th align="center" width="15%" border="1" ></th>
<th style="font-weight:bold;" colspan="1" width="15%" align="center" >DISCONTINUO</th>
<th align="center" width="15%" border="1" ></th>
</tr>

<tr>
<th  colspan="1" align="center" width="100%" style="background-color: #99;font-weight:bold;">DATOS DEL TUTOR</th>
</tr>

<tr>
<th style="font-weight:bold;" colspan="1" align="left" width="10%" >NOMBRE:</th>
<th align="center" width="60%" border="1" ></th>
<th style="font-weight:bold;" colspan="1" width="12%" align="center" >PARENTESCO:</th>
<th align="center" width="18%" border="1" ></th>
</tr>


<tr>
<th style="font-weight:bold;" colspan="1" align="left" width="10%" >DIRECCIÓN:</th>
<th align="center" width="60%" border="1" ></th>
<th style="font-weight:bold;" colspan="1" width="12%" align="center" >TELEFONO:</th>
<th align="center" width="18%" border="1" ></th>
</tr>

<tr>
<th  colspan="1" align="center" width="100%" style="background-color: #99;font-weight:bold;">DOCUMENTOS ENTREGADOS</th>
</tr>

<tr>
<th style="font-weight:bold;" rowspan="2" align="center" width="20%"  >DOCUMENTOS</th>
<th style="font-weight:bold;" colspan="2" align="center" width="35%" >TIPO</th>
<th  style="font-weight:bold;"colspan="2" align="center" width="30%" >CONDICIONES</th>
<th style="font-weight:bold;" rowspan="2" align="center" width="15%" >CARTA COMPROMISO</th>
</tr>


<tr>
<th style="font-weight:bold;" colspan="1" align="center" width="17.5%"  >ORIGINAL</th>
<th style="font-weight:bold;" colspan="1" align="center" width="17.5%" >COPIA</th>
<th style="font-weight:bold;" colspan="1" align="center" width="15%" >BUENO</th>
<th style="font-weight:bold;" colspan="1" align="center" width="15%" >DAÑADO</th>
</tr>


<tr>
<th colspan="2" align="left" width="20%"  >Acta de Nacimiento</th>
<th colspan="1" align="center" width="17.5%"  ></th>
<th colspan="1" align="center" width="17.5%" ></th>
<th colspan="1" align="center" width="15%" ></th>
<th colspan="1" align="center" width="15%" ></th>
<th colspan="1" align="center" width="15%" ></th>
</tr>


<tr>
<th colspan="2" align="left" width="20%"  >Certificado de Bachillerato</th>
<th colspan="1" align="center" width="17.5%"  ></th>
<th colspan="1" align="center" width="17.5%" ></th>
<th colspan="1" align="center" width="15%" ></th>
<th colspan="1" align="center" width="15%" ></th>
<th colspan="1" align="center" width="15%" ></th>
</tr>


<tr>
<th colspan="2" align="left" width="20%"  >Curp</th>
<th colspan="1" align="center" width="17.5%"  ></th>
<th colspan="1" align="center" width="17.5%" ></th>
<th colspan="1" align="center" width="15%" ></th>
<th colspan="1" align="center" width="15%" ></th>
<th colspan="1" align="center" width="15%" ></th>
</tr>

<tr>
<th colspan="2" align="left" width="20%"  >Ine</th>
<th colspan="1" align="center" width="17.5%"  ></th>
<th colspan="1" align="center" width="17.5%" ></th>
<th colspan="1" align="center" width="15%" ></th>
<th colspan="1" align="center" width="15%" ></th>
<th colspan="1" align="center" width="15%" ></th>
</tr>

<tr>
<th colspan="2" align="left" width="20%"  >Comprobante de Domicilio</th>
<th colspan="1" align="center" width="17.5%"  ></th>
<th colspan="1" align="center" width="17.5%" ></th>
<th colspan="1" align="center" width="15%" ></th>
<th colspan="1" align="center" width="15%" ></th>
<th colspan="1" align="center" width="15%" ></th>
</tr>

<tr>
<th colspan="2" align="left" width="20%"  >Certificado Médico</th>
<th colspan="1" align="center" width="17.5%"  ></th>
<th colspan="1" align="center" width="17.5%" ></th>
<th colspan="1" align="center" width="15%" ></th>
<th colspan="1" align="center" width="15%" ></th>
<th colspan="1" align="center" width="15%" ></th>
</tr>

<tr>
<th colspan="2" align="left" width="20%"  >Fotografías T/Infantil en B/N</th>
<th colspan="1" align="center" width="17.5%"  ></th>
<th colspan="1" align="center" width="17.5%" ></th>
<th colspan="1" align="center" width="15%" ></th>
<th colspan="1" align="center" width="15%" ></th>
<th colspan="1" align="center" width="15%" ></th>
</tr>


<tr>
<th colspan="2" align="center" width="50%"  height="35px" ></th>
<th colspan="2" align="center" width="50%" height="35px"   ></th>
</tr>

<tr>
<th  style="font-weight:bold;" colspan="2" align="center" width="50%" >FIRMA DEL ALUMNO</th>
<th  style="font-weight:bold;" colspan="2" align="center" width="50%" >NOMBRE Y FIRMA DE SERVICIOS ESCOLARES</th>
</tr>

<tr>
		<th style="font-weight:bold;font-size:medium;" colspan="4" align="left" >NOTA:  La Universidad Tecnológica del Sureste de Veracruz se reserva el 
		derecho de verificar en cualquier momento la identidad de los aspirantes y la validez de los documentos
		presentados,este documento es el comprobante que usted ya realizó el trámite de inscripción, toma de foto
		para credencial institucional a partir del 19/Sep/2022 se les avisará  con sus directores de carrera. </th>
		
</tr>

</table>';










// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// Print some HTML Cells



// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// Print a table

// add a page


// reset pointer to the last page
$pdf->SetMargins(7, 7, 7, false); 
$pdf->SetAutoPageBreak(true, 10); 
$pdf->SetFont('Helvetica', '', 7);
$pdf->lastPage();

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// Print all HTML colors

// add a page


// add a page



// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_0067.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+

?>