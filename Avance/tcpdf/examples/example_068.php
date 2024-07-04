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


//$idAlumno		=	$_REQUEST['idAlumno'];
//$matricula = $_REQUEST['matricula'];
/*
$consulta = "SELECT idAlumno, matricula from alumnos";

$rsA			= $mysqli->query($consulta);
$totalFilas 	= mysqli_num_rows($rsA);



if($row = mysqli_fetch_assoc($rsA))
	{
		$idAlumno				=	$row['idAlumno'];
		$matricula	= 	$row['matricula'];//." ".$row['apellidoMaterno']." ".$row['nombre'];
		
		
	}
*/
/*
	$alumnos="";

	if($totalFilas>0)
	{
		//$alumnos = $totalFilas["idAlumno"];
	

		while($totalFilas = mysqli_fetch_array($rsA))
		{
			$alumnos = $alumnos.",".$totalFilas["idAlumno"]."-".$totalFilas["matricula"];
			
		}
		
	}


*/

  


// ya imprime todos los nombres pero al momento de colocarlos en el td no manda nada

	 

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf = new TCPDF('L', 'mm', 'A4', true, 'UTF-8', false);

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
$pdf->setFont('Helvetica', '', 6);
$pdf->SetMargins(7, 7, 7, false); 
$pdf->SetAutoPageBreak(true, 10); 
$pdf->setLineWidth(0.508);
$pdf->setFooterMargin();


// add a page


// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// Print a table

// add a page

$pdf->AddPage();



$html = '<h2></h2>
<table border="1" >			
	
<tr>
	<td width="35%" Vspace="5px" height="70px" align="center" valign="middle" style="padding-top:20px" > <BR> <img src="images/ut.jpg" Vspace="5px"  align="center"  height="45px" border="0" /></td>
	<td width="30%"  height="70px"  align="center" valign="middle" padding:"15px" style="padding-bottom:20px"  > <BR> <BR> REPORTE PARCIAL <BR> UTSV-DAC-FO-02 <BR></td>
	<td width="35%" height="70px"  align="center" valign="middle" style="padding-top:20px" ><BR> <BR> <img src="images/logosev.jpg" border="0" width="210px" heigth="45px"  Vspace="5px"/></td>

	
</tr>
</table>';



$html =$html. '<h3 align="center">UNIVERSIDAD TECNOLOGICA DEL SURESTE DE VERACRUZ</h3><BR><h3 align="center">DIRECCIÓN ACADEMICA</h3>
<table borde="0" cellspacing="1" cellpadding="3" style="font-size:10px; font-weight: bold;">


	<tr align="center">
	<th colspan="3" align="left">CARRERA</th>
	<th colspan="18" align="center" style="text-decoration: underline black;">TIC CONTA </th>
	
    </tr>

	<tr align="center">
	<th colspan="2" align="left" width="200px">REPORTE PARCIAL</th>
	<th colspan="1" align="center" border="1" width="30px" >1 </th>
	<th border="0" width="8px"  ></th>
	<th colspan="1" align="center" border="1" width="30px">2</th>
	<th border="0" width="8px"  ></th>
	<th colspan="1" align="center" border="1" width="30px">3</th>
	<th border="0" width="8px"  ></th>
	<th colspan="1" align="center" width="30px" border="1">F </th>
	<th border="0" width="8px"  ></th>
	<th colspan="1" align="center" width="30px" border="1">E </th>
	<th border="0" width="8px"  ></th>
    <th colspan="1" align="center" width="100px">CUATRIMESTRE </th>
	<th border="0" width="8px"  ></th>
	<th colspan="3" align="center"style="text-decoration: underline black;">MAYO-AGOSTO 2022 </th>
	
	</tr>

	<tr align="center">
	<th colspan="4" align="left">PERIODO DEL </th>
	<th colspan="5" align="center" style="text-decoration: underline black;">05 DE MAYO 2022 </th>
	<th colspan="4" align="left">AL </th>
	<th colspan="5" align="center" style="text-decoration: underline black;">06 DE AGOSTO 2022 </th>	
    </tr>

	<tr align="center">
	<th colspan="2" align="left" width="250px">NOMBRE DEL DOCENTE</th>
	<th colspan="9" align="center">HUGO DANIEL GONZALEZ DAVILA </th>	
    </tr>

    <tr align="center">
	<th colspan="2" align="left">No. DE GRUPOS ATENDIDOS </th>
	<th colspan="4" align="center" style="font-weight:bold; text-decoration: underline black;" >4 </th>
	<th colspan="4" align="left" width="250px">No. DE ASIGNATURAS ATENDIDADAS </th>
	<th colspan="4" align="center" style="text-decoration: underline black;"> 5 </th>	
    </tr>
	
</table>';





$html =$html.'<h2></h2>



<table cellspacing="1" cellpadding="1" width="600" height="60px" style="padding-top:5px" style="padding-bottom:5px; font-size:8px;" table-layout: fixed; >
	<tr>
		<th rowspan="3" width="200px" align="center" border="1"  style="font-weight:bold;">ASIGNATURA</th>
		<th rowspan="3" width="40px" align="center" border="1"  style="font-weight:bold;" >GRUPO</th>
		<th rowspan="3" width="40px" align="center"border="1"   style="font-weight:bold;">A</th>
		<th colspan="8" width="240px" align="center" style="font-weight:bold;" border="1"  > B</th>
		<th rowspan="2"  colspan="3" width="90" align="center"  style="font-weight:bold;" border="1"  > C</th>
		<th rowspan="2" colspan="3" width="90" align="center"  style="font-weight:bold;" border="1"  > D</th>
		<th rowspan="2"  colspan="3"width="90" align="center"  style="font-weight:bold;" border="1"  >E</th>
		<th rowspan="2" colspan="3" width="90" align="center"  style="font-weight:bold;" border="1"  >F</th>
		<th rowspan="2"  colspan="3" width="90" align="center"  style="font-weight:bold;" border="1"  >G</th>
		
		
		
	</tr>

	<tr>
	<th colspan="3" align="center" border="1"  style="font-weight:bold;" >O</th>
	<th colspan="3"  align="center" border="1"  style="font-weight:bold;" >R</th>
	
	<th rowspan="2" align="center" border="1"   style="font-weight:bold;" >F</th>
	<th rowspan="2" align="center" border="1"  style="font-weight:bold;">EXT</th>
  </tr>

<tr>
<th align="center" width="30" border="1"   style="font-weight:bold;" >I</th>
<th align="center" width="30"  border="1"  style="font-weight:bold;" >II</th>
<th align="center" width="30"  border="1"  style="font-weight:bold;"  >III</th>

<th align="center"  style="font-weight:bold;" border="1" >I</th>
<th align="center"  style="font-weight:bold;" border="1">II</th>
<th align="center"  style="font-weight:bold;" border="1">III</th>

<th align="center"  style="font-weight:bold;" border="1" >I</th>
<th align="center"  style="font-weight:bold;" border="1">II</th>
<th align="center"  style="font-weight:bold;" border="1">III</th>

<th align="center"  style="font-weight:bold;" border="1" >I</th>
<th align="center"  style="font-weight:bold;" border="1">II</th>
<th align="center"  style="font-weight:bold;" border="1">III</th>

<th align="center"  style="font-weight:bold;" border="1" >I</th>
<th align="center"  style="font-weight:bold;" border="1">II</th>
<th align="center"  style="font-weight:bold;" border="1">III</th>

<th align="center"  style="font-weight:bold;" border="1" >I</th>
<th align="center"  style="font-weight:bold;" border="1">II</th>
<th align="center"  style="font-weight:bold;" border="1">III</th>

<th align="center"  style="font-weight:bold;" border="1" >I</th>
<th align="center"  style="font-weight:bold;" border="1">II</th>
<th align="center"  style="font-weight:bold;" border="1">III</th>




</tr>

<tr>

<td border="1" ></td>
<td border="1" ></td>
<td border="1" ></td>
<td border="1" ></td>
<td border="1" ></td>
<td border="1" ></td>
<td border="1" ></td>
<td border="1" ></td>
<td border="1" ></td>
<td border="1" ></td>
<td border="1" ></td>
<td border="1" ></td>
<td border="1" ></td>
<td border="1" ></td>
<td border="1" ></td>
<td border="1" ></td>
<td border="1" ></td>
<td border="1" ></td>
<td border="1" ></td>
<td border="1" ></td>
<td border="1" ></td>
<td border="1" ></td>
<td border="1" ></td>
<td border="1" ></td>
<td border="1" ></td>
<td border="1" ></td>

</tr>

<tr>

<td style="border-collapse:collapse;" ></td>
<td style="border-collapse:collapse;font-weight:bold;">TOTAL</td>
<td border="1" ></td>
<td border="1" ></td>
<td border="1" ></td>
<td border="1" ></td>
<td border="1" ></td>
<td border="1" ></td>
<td border="1" ></td>
<td border="1" ></td>
<td border="1" ></td>
<td ></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>

</tr>



</table>';
	

$html =$html. '<h2></h2>
<table  cellspacing="1" cellpadding="1" width="900" height="25" font-size:8px;>

	<tr width="" style="font-size:8px;"  >
		<th width="400px" height="15px"  style="font-weight:bold;" >A= TOTAL DE ALUMNOS (AS) POR ASIGNATURA</th>
	</tr>

	<tr style="font-size:8px;" >
		<th  width="600px"  height="15px"  style="font-weight:bold;"> B= No. DE ALUMNOS (AS) ACREDITADOS ( O= NORMAL/ORDINARIO R=REMEDIAL F= FINAL EXT = ÚLTIMA OPORTUNIDAD)</th>
	</tr style="font-size:8px;" >

	<tr style="font-size:8px;" >
		<th  width="400px"  height="15px"  style="font-weight:bold;"> C= % DE ALUMNOS (AS) ACREDITADOS</th>
	</tr style="font-size:8px;" >

	<tr style="font-size:8px;" >
		<th  width="400px"  height="15px"  style="font-weight:bold;"> D = No. DE ALUMNOS (AS) NO ACREDITADOS</th>
	</tr style="font-size:8px;" >

	<tr style="font-size:8px;" >
		<th  width="400px"  height="15px"  style="font-weight:bold;"> E= % DE ALUMNOS (AS) NO ACREDITADOS</th>
	</tr style="font-size:8px;" >

	<tr style="font-size:8px;" >
		<th  width="400px"  height="15px"  style="font-weight:bold;"> F= No. DE ALUMNOS (AS) QUE DESERTARON EN EL CUATRIMESTRE</th>
	</tr style="font-size:8px;" >

	<tr style="font-size:8px;" >
		<th  width="400px"  height="15px"  style="font-weight:bold;"> G= % DE ALUMNOS (AS) QUE DESERTARON EN EL CUATRIMESTRE</th>
			
	</tr>

		
</table>';



$html =$html. '<h1></h1>

<BR> <BR>
<table  style="">


<tr style="" >
<th width="10%" style="font-weight:bold; border=0; text-align:center; " ></th>
<th width="35%" style="font-weight:bold; border=0; text-align:center; font-size:10px; font-family:"Helvetica"; " >ALONDRA KATT MORALES</th>
<th width="10%" style="font-weight:bold; border=0; text-align:center;" ></th>
<th width="35%" style="font-weight:bold; border=0; text-align:center; font-size:10px; font-family:"Helvetica"; " >HUGO DANIEL GONZALEZ DAVILA</th>
<th width="10%" style="font-weight:bold; border-collapse:collapse; text-align:center; " ></th>
</tr>

	<tr style="" >
	    <th width="10%" style="font-weight:bold; border-collapse:collapse; text-align:center; " ></th>
		<th width="35%" style="font-weight:bold; border-style:inset; text-align:center; font-size:10px; font-family:"Helvetica"; " >DOCENTE</th>
	    <th width="10%" style="font-weight:bold; border-collapse:collapse; text-align:center;" ></th>
		<th width="35%" style="font-weight:bold; border-style:inset; text-align:center; font-size:10px; font-family:"Helvetica"; " >DIRECTOR DE CARRERA Y/O JEFE DE IDIOMAS</th>
	    <th width="10%" style="font-weight:bold; border-collapse:collapse; text-align:center; " ></th>
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