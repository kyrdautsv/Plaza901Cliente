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

  


$nombre = [
    'Karla Dioscorides Perez Martínez',
    'Jessy Dioscorides Perez Martínez',
    'Kandyy Martínez Alcudia',
    'Maga Yaretzi Martínez Ruiz',
    'Chucho Martínez Alcudia',
    'Luis Alfredo Martínez Ruiz',
    'Alfredo Martínez Castillo',
	'Karla Dioscorides Perez Martínez',
    'Jessy Dioscorides Perez Martínez',
    'Kandyy Martínez Alcudia',
    'Maga Yaretzi Martínez Ruiz',
    'Chucho Martínez Alcudia',
    'Luis Alfredo Martínez Ruiz',
	'Chucho Martínez Alcudia',
    'Alfredo Martínez Castillo',
	'Karla Dioscorides Perez Martínez',
    'Jessy Dioscorides Perez Martínez',
    'Kandyy Martínez Alcudia',
    'Maga Yaretzi Martínez Ruiz',
    'Chucho Martínez Alcudia',
    'Luis Alfredo Martínez Ruiz',
	'Kandyy Martínez Alcudia',
    'Maga Yaretzi Martínez Ruiz',
    'Chucho Martínez Alcudia',
    'Luis Alfredo Martínez Ruiz',
	'Chucho Martínez Alcudia',
    'Luis Alfredo Martínez Ruiz',
	'Kandyy Martínez Alcudia',
    'Maga Yaretzi Martínez Ruiz',
    'Chucho Martínez Alcudia',
    'Alfredo Martínez Castillo'
];


// ya imprime todos los nombres pero al momento de colocarlos en el td no manda nada

	 

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



$html =$html. '<h2></h2>
<table border:"hidden" cellspacing="1" cellpadding="2" style="font-size:10px; font-weight: bold;">
	<tr>
		<th colspan="4" align="center" >UNIVERSIDAD TECNOLOGICA DEL SURESTE DE VERACRUZ</th>
		
	</tr>

	<tr align="center">
		<th colspan="4" align="center">DEPARTAMENTO DE SERVICIOS ESCOLARES</th>
		
	</tr>

	<tr>
		<th  colspan="4"  align="center">ACTA DE CALIFICACIONES DEL CUATRMESTRE: MAYO-AGOSTO 2022</th>
	
		
		
	</tr>

	<tr align="center" >
		<th colspan="2" align="right">NOMBRE DE LA MATERIA:TSU EN DESARROLLO DE SW</th>		
		<th  colspan="2"align="left">GRUPO: 601</th>
	
		
	</tr>

	<tr align="center">
	<th colspan="2" align="right">CARRERA:</th>
	<th colspan="2" align="left">TSU EN DESARROLLO DE SW</th>
	
</tr>


<tr align="center">
<th colspan="2" align="right">NOMBRE DEL CATEDRATICO:</th>
<th colspan="2" align="left">HUGO GONZALEZ DAVILA</th>

</tr>
	
</table>';





$html =$html.'<h2></h2>



<table cellspacing="1" cellpadding="1" width="600" height="60px" style="padding-top:5px" style="padding-bottom:5px; font-size:8px;" table-layout: fixed; >
	<tr>
		<th style="border-collapse:collapse;" ></th>
		<th  width="150" style="border-collapse:collapse;" ></th>
		<th colspan="6" width="240" align="center" style="font-weight:bold;" border="1"  > PARCIALES</th>
		<th rowspan="3" width="40" align="center"  style="font-weight:bold;" border="1"  > FINAL</th>
		<th rowspan="3" width="80" align="center"  style="font-weight:bold;" border="1"  > EXTRAORDINARIO</th>
		<th rowspan="3" width="50" align="center"  style="font-weight:bold;" border="1"  >ESPECIAL</th>
		<th rowspan="3" width="60" align="center"  style="font-weight:bold;" border="1"  >CALIFICACION FINAL</th>
		
		
		
	</tr>

	<tr>
	<th  style="border-collapse:collapse;" ></th>
	<th style="border-collapse:collapse;" ></th>
	<th colspan="3" width="120" align="center"  style="font-weight:bold;"  border="1">ORDINARIO</th>
	<th colspan="3" width="120" align="center"   style="font-weight:bold;" border="1" >RECUPERACION</th>
	
</tr>

<tr>
<th align="center" width="49"  style="font-weight:bold;" border="1" >No.</th>
<th align="center" width="150"  style="font-weight:bold;"  border="1">ALUMNOS</th>
<th align="center"  style="font-weight:bold;" border="1" >I</th>
<th align="center"  style="font-weight:bold;" border="1">II</th>
<th align="center"  style="font-weight:bold;" border="1">III</th>
<th align="center"  style="font-weight:bold;" border="1" >I</th>
<th align="center"  style="font-weight:bold;" border="1" >II</th>
<th align="center"  style="font-weight:bold;" border="1" >III</th>


</tr>';

$longitud = count($nombre);
for($i=0; $i<$longitud; $i++)
{
$html =$html.'
<tr height="25">
<th align="center" width="49" border="1" > '.$i.'</th>
<th align="center" width="150" border="1">'.$nombre[$i].'</th>
<th align="center" width="40"  border="1"></th>
<th align="center" width="40" border="1" ></th>
<th align="center" width="40" border="1" ></th>
<th align="center" width="40" border="1"></th>
<th align="center" width="40" border="1" ></th>
<th align="center" width="40"  border="1"></th>
<th align="center" width="40" border="1" ></th>
<th align="center" width="80" border="1" ></th>
<th align="center" width="50"  border="1"></th>
<th align="center" width="60" border="1" ></th>
</tr>';
};	
$html =$html. '</table>';
$html =$html. '<h2></h2>
<table border="1" cellspacing="1" cellpadding="1" width="900" height="25" font-size:8px;>
	<tr width="500" style="font-size:8px;"  >
		<th width="200" height="25"  style="font-weight:bold;" >TOTAL DE ALUMNOS</th>
		<th  width="40"  height="25"></th>
		<th  width="40"  height="25"></th>
		<th  width="40"  height="25"></th>
		<th  width="40"  height="25"></th>
		<th  width="40"  height="25"></th>
		<th  width="40"  height="25"></th>
		<th  width="40"  height="25"></th>
		<th  width="80"  height="25"></th>
		<th  width="50"  height="25"></th>
		
	</tr>

	<tr>
	    <th colspan=""  style="font-weight:bold;" >No. ALUMNOS ACREDITADOS</th>
	    <th ></th>
		<th ></th>
		<th ></th>
		<th ></th>
		<th ></th>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
	
    </tr>

	<tr>
	<th colspan=""  style="font-weight:bold;" >No. ALUMNOS NO ACREDITADOS</th>
	<th ></th>
	<th ></th>
	<th ></th>
	<th ></th>
	<th ></th>
	<th></th>
	<th></th>
	<th></th>
	<th></th>

    </tr>  

	<tr>
	<th colspan=""  style="font-weight:bold;" >No. ALUMNOS DESERTORES</th>
	<th ></th>
	<th ></th>
	<th ></th>
	<th ></th>
	<th ></th>
	<th></th>
	<th></th>
	<th></th>
	<th></th>

    </tr>  

	<tr>
	<th colspan=""  style="font-weight:bold;" >% ALUMNOS ACREDITADOS</th>
	<th ></th>
	<th ></th>
	<th ></th>
	<th ></th>
	<th ></th>
	<th></th>
	<th></th>
	<th></th>
	<th></th>

    </tr>  

	<tr>
	<th colspan=""  style="font-weight:bold;" >% ALUMNOS NO ACREDITADOS</th>
	<th ></th>
	<th ></th>
	<th ></th>
	<th ></th>
	<th ></th>
	<th></th>
	<th></th>
	<th></th>
	<th></th>

    </tr>  

	<tr>
	<th colspan=""  style="font-weight:bold;" >% DE DESERCION</th>
	<th ></th>
	<th ></th>
	<th ></th>
	<th ></th>
	<th ></th>
	<th></th>
	<th></th>
	<th></th>
	<th></th>

    </tr>  


	

	
</table>';



$html =$html. '<h1></h1>

<BR> <BR>
<table  style="margin-left:10%;">
	<tr style="margin-left:10%;" >
	    <th width="30%" style="font-weight:bold; border-collapse:collapse; text-align:center; " ></th>
		<th width="40%" style="font-weight:bold; border-style:inset; text-align:center; font-size:10px; font-family:"Helvetica"; " >DOCENTE</th>
	    <th width="30%" style="font-weight:bold; border-collapse:collapse; text-align:center;" ></th>
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