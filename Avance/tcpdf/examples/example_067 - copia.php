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
require_once('tcpdf_include.php');
////require_once('conexion/conexion.php');

//$idAlumno		=	$_REQUEST['idAlumno'];
//$matricula = $_REQUEST['matricula'];

//$consulta = "SELECT idAlumno, matricula from alumnos";

//$rsA			= $mysqli->query($consulta);
//$totalFilas 	= mysqli_num_rows($rsA);

/*if($row = mysqli_fetch_assoc($rsA))
	{
		$idAlumno				=	$row['idAlumno'];
		$matricula	= 	$row['matricula'];//." ".$row['apellidoMaterno']." ".$row['nombre'];
		
	
	}

			

*/
// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor('Nicola Asuni');
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
$pdf->SetMargins(8, 8, 8, false); 
$pdf->SetAutoPageBreak(true, 10); 


// add a page


// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// Print a table

// add a page
$pdf->AddPage();

// create some HTML content
//$subtable = '<table  cellspacing="6" cellpadding="4"><tr><td>a</td><td>b</td></tr><tr><td>c</td><td>d</td></tr></table>';

$html = '<h2></h2>
<table border="1" cellpadding="">			
	
<tr>
	<td width="30%" height="60px" padding="5px" align="center" valign="middle"> <img src="images/logo_example.png" width="40px" height="40px" alt="logo" /></td>
	<td width="40%" align="center" valign="middle">REPORTE PARCIAL <BR> UTSV-DAC-FO-02 <BR></td>
	<td width="30%" align="center"><img src=""  alt="logo" /></td>
	
	
</tr>
</table>';



$html =$html. '<h2></h2>
<table border:"hidden" cellspacing="3" cellpadding="4">
	<tr>
		<th colspan="4" align="center">UNIVERSIDAD TECNOLOGICA DEL SURESTE DE VERACRUZ</th>
		
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
<th colspan="2" align="right">NOMBRE DEL CATEDRIATICO:</th>
<th colspan="2" align="left">CANDELARIA MARTINEZ ALCUDIA</th>

</tr>
	
</table>';





$html =$html.'<h2></h2>



<table border="1" cellspacing="1" cellpadding="1" width="600" height="60px" style="padding-top:5px" style="padding-bottom:5px">
	<tr>
		<th border-collapse:collapse;></th>
		<th border:"hidden" width="150" ></th>
		<th colspan="6" width="240" align="center" > PARCIALES</th>
		<th rowspan="3" width="40" align="center"> FINAL</th>
		<th rowspan="3" width="80" align="center"> EXTRAORDINARIO</th>
		<th rowspan="3" width="50" align="center">ESPECIAL</th>
		<th rowspan="3" width="60" align="center">CALIFICACION FINAL</th>
		
		
		
	</tr>

	<tr>
	<th border="hidden" ></th>
	<th border="hidden" ></th>
	<th colspan="3" width="120" align="center">ORDINARIO</th>
	<th colspan="3" width="120" align="center" >RECUPERACION</th>
	
</tr>

<tr>
<th align="center" width="49" >No.</th>
<th align="center" width="150">ALUMNOS</th>
<th align="center">I</th>
<th align="center">II</th>
<th align="center">III</th>
<th align="center">I</th>
<th align="center">II</th>
<th align="center">III</th>


</tr>



<tr height="25" >
<th align="center" width="49" ></th>
<th align="center" width="150" ></th>
<th align="center" width="40" ></th>
<th align="center" width="40" ></th>
<th align="center" width="40" ></th>
<th align="center" width="40" ></th>
<th align="center" width="40" ></th>
<th align="center" width="40" ></th>
<th align="center" width="40" ></th>
<th align="center" width="80" ></th>
<th align="center" width="50" ></th>
<th align="center" width="60" ></th>


</tr>



	
</table>';
$html =$html. '<h2></h2>
<table border="1" cellspacing="1" cellpadding="1" width="900" height="25" >
	<tr width="500" >
		<th width="200" height="25">TOTAL DE ALUMNOS</th>
		<th  width="40"  height="25">$</th>
		<th  width="40"  height="25">$</th>
		<th  width="40"  height="25">$</th>
		<th  width="40"  height="25">$</th>
		<th  width="40"  height="25">$</th>
		<th  width="40"  height="25">$</th>
		<th  width="40"  height="25">$</th>
		<th  width="80"  height="25">$</th>
		<th  width="50"  height="25">$</th>
		
	</tr>

	<tr>
	    <th colspan="">No. ALUMNOS ACREDITADOS</th>
	    <th >$</th>
		<th >$</th>
		<th >$</th>
		<th >$</th>
		<th >$</th>
		<th>$</th>
		<th>$</th>
		<th>$</th>
		<th>$</th>
	
    </tr>

	<tr>
	<th colspan="">No. ALUMNOS NO ACREDITADOS</th>
	<th >$</th>
	<th >$</th>
	<th >$</th>
	<th >$</th>
	<th >$</th>
	<th>$</th>
	<th>$</th>
	<th>$</th>
	<th>$</th>

    </tr>  

	<tr>
	<th colspan="">No. ALUMNOS DESERTORES</th>
	<th >$</th>
	<th >$</th>
	<th >$</th>
	<th >$</th>
	<th >$</th>
	<th>$</th>
	<th>$</th>
	<th>$</th>
	<th>$</th>

    </tr>  

	<tr>
	<th colspan="">% ALUMNOS ACREDITADOS</th>
	<th >$</th>
	<th >$</th>
	<th >$</th>
	<th >$</th>
	<th >$</th>
	<th>$</th>
	<th>$</th>
	<th>$</th>
	<th>$</th>

    </tr>  

	<tr>
	<th colspan="">% ALUMNOS NO ACREDITADOS</th>
	<th >$</th>
	<th >$</th>
	<th >$</th>
	<th >$</th>
	<th >$</th>
	<th>$</th>
	<th>$</th>
	<th>$</th>
	<th>$</th>

    </tr>  

	<tr>
	<th colspan="">% DE DESERCION</th>
	<th >$</th>
	<th >$</th>
	<th >$</th>
	<th >$</th>
	<th >$</th>
	<th>$</th>
	<th>$</th>
	<th>$</th>
	<th>$</th>

    </tr>  


	

	
</table>';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// Print some HTML Cells



// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// Print a table

// add a page


// reset pointer to the last page
$pdf->SetMargins(10, 10, 10, false); 
$pdf->SetAutoPageBreak(true, 10); 
$pdf->SetFont('Helvetica', '', 8);
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

