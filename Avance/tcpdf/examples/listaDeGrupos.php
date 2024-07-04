<?php
session_start();
error_reporting(E_ALL ^ (E_WARNING | E_NOTICE));
setlocale(LC_ALL,"es_MX");
setlocale(LC_TIME, "spanish");
date_default_timezone_set('America/Mazatlan');
$fechaactual = date('d-m-Y H:i:s');
//require_once('conexion/conexion.php');
//require_once('tcpdf_include.php');
require_once('conexion/conexion.php');
require_once('tcpdf.php');
$clavePeriodo=$_REQUEST['periodo'];
 $consulta1 	= "select * from periodo where clave = '$clavePeriodo'";
    $rs1   		= $mysqli->query($consulta1) ;
    $filas1	    = mysqli_fetch_assoc($rs1);
    $total1 = mysqli_num_rows($rs1);
	if($total1>0) 
	 $nombrePeriodo=$filas1['nombrePeriodo']." ".$filas1['anual'];



$claveCarrera= $_REQUEST['ClaveCarrera'];
$nombreCarrera=$_REQUEST['Carrera'];
$claveGrupo= $_REQUEST['ClaveGrupo'];

$sqlgrupo 	= "SELECT idgrupo,clave, nombreGrupo, descripcion, 
claveplan, paqcve,campus,if(sistema='E','ESCOLARIZADO','DESPRESURIZADO') as sistema, turno FROM grupos
where claveperiodo = '$clavePeriodo' and clavecarrera = $claveCarrera
and clave='$claveGrupo'";
$rsgrupo   		= $mysqli->query($sqlgrupo) ;
$filasgrupo 	    = mysqli_fetch_assoc($rsgrupo);
$totalgrupos = mysqli_num_rows($rsgrupo);

$nombreGrupo = $filasgrupo['nombreGrupo'];
$sistema = $filasgrupo['sistema'];
$turno = $filasgrupo['turno'];
$campus = $filasgrupo['campus'];
$descripcion = $filasgrupo['descripcion'];
$consulta2 	= "select distinct alumnos.matricula, concat(nombre,' ', IFNULL(apellidoPaterno,''),' ',IFNULL(apellidoMaterno,'')) as nombreCompleto,
email from alumnos inner join personas on personas.clave = alumnos.matricula
 inner join carrera on alumnos.clavecar = carrera.clave
where claveperiodo = '$clavePeriodo' and carrera.clave = '$claveCarrera' and alumnos.clavegrupo ='$claveGrupo'
order by alumnos.matricula";
    $rs2   		= $mysqli->query($consulta2) ;
    //$filas2 	    = mysqli_fetch_assoc($rs2);
    $totaldoc = mysqli_num_rows($rs2);	 

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf = new TCPDF('L', 'mm', 'LETTER', true, 'UTF-8', false);

// set document information
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor('KYRDA');
$pdf->setTitle('LISTA DE ASISTENCIA');
$pdf->setSubject('SIGU-UTSV');
$pdf->setKeywords('UTSV, SIGU, KYRDA');


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
	<td width="25%" Vspace="5px" height="70px" align="center" valign="middle" style="padding-top:20px" > <BR> <img src="images/ut.jpg" Vspace="5px"  align="center"  height="45px" border="0" /></td>
	<td width="40%"  height="70px"  align="center" valign="middle" padding:"15px" style="padding-bottom:20px;font-size:11px;"  > <BR> <BR> Universidad Tecnológica del Sureste de Veracruz <BR> LISTAS OFICIALES<BR></td>
	<td width="35%" height="70px"  align="center" valign="middle" style="padding-top:20px" ><BR> <BR> </td>

	
</tr>
</table>';



$html =$html. ' <BR> <BR> <BR> 
<table borde="0" cellspacing="1" cellpadding="3" style="font-size:10px; font-weight: bold;">


	<tr align="">
	<th colspan="2" align="left"  style="font-weight:bold;" border="1" >CARRERA:</th>
	<th colspan="4" align="left"  border="1" >'.$nombreCarrera.'</th>
	<th colspan="2" align="left"  style="font-weight:bold;" border="1" >ASIGNATURA:</th>
	<th colspan="4" align="left" border="1" ></th>	
    </tr>

	<tr align="left">
	<th colspan="2" align="left"  style="font-weight:bold;" border="1" >GRUPO:</th>
	<th colspan="4" align="left"  border="1" >'.$nombreGrupo.'-'.$descripcion.'</th>
	<th colspan="2" align="left"  style="font-weight:bold;" border="1" >MES: </th>
	<th colspan="4" align="left" border="1" ></th>	
    </tr>

	<tr align="left">
	<th colspan="2" align="left"  style="font-weight:bold;" border="1" >CAMPUS/SISTEMA:</th>
	<th colspan="4" align="left"  border="1" >'.$campus.'/'.$sistema.'</th>
	<th colspan="2" align="left"  style="font-weight:bold;" border="1" >TURNO: </th>
	<th colspan="4" align="left" border="1" >'.$turno.'</th>	
    </tr>

    <tr align="left">
	<th colspan="2" align="left"  style="font-weight:bold;" border="1" >PARCIAL:</th>
	<th colspan="4" align="left"  border="1" ></th>
	<th colspan="2" align="left"  style="font-weight:bold;" border="1" >PERIODO: </th>
	<th colspan="4" align="left" border="1" >'.$nombrePeriodo.'</th>	
    </tr>

	<tr align="left">
	<th colspan="2" align="left"  style="font-weight:bold;" border="1" >DOCENTE:</th>
	<th colspan="10" align="left"  border="1" ></th>
		
    </tr>


	
	
</table>';





$html =$html.'<h2></h2>



<table cellspacing="1" cellpadding="2" width="100%"  height="60px"  style="font-size:10px;" >
	<tr>
	<th  width="5%" colspan="1" align="center"  style="font-weight:bold;" border="1" >NO.</th>
	<th width="15%" colspan="3" align="center"  style="font-weight:bold;" border="1" >MATRICULA</th>
	<th  width="30%" colspan="3" align="center"  style="font-weight:bold;" border="1" >NOMBRE DEL ALUMNO</th>
	<th width="10%"colspan="6" align="center"  style="font-weight:bold;" border="1" >SEMANA 1</th>
	<th width="10%"colspan="6" align="center"  style="font-weight:bold;" border="1" >SEMANA 2</th>
	<th width="10%" colspan="6" align="center"  style="font-weight:bold;" border="1" >SEMANA 3</th>
	<th width="10%" colspan="6" align="center"  style="font-weight:bold;" border="1" >SEMANA 4</th>
	<th width="10%" colspan="1" align="center"  style="font-weight:bold;" border="1" >OBS</th>
	</tr>';

      $contador=1;
	while($filas2 = mysqli_fetch_array($rs2))
		{
			$matricula=$filas2['matricula'];
			$nombreCompleto=$filas2['nombreCompleto'];

		
	$html =$html. '


	
<tr>

<td colspan="1"  border="1" >'.$contador.'</td>
<td  colspan="3" border="1" >'.$matricula.'</td>
<td colspan="3"  border="1" >'.$nombreCompleto.'</td>
<td colspan="1"  border="1" ></td>
<td colspan="1"  colspan="1"  border="1" ></td>
<td colspan="1"  border="1" ></td>
<td colspan="1"  border="1" ></td>
<td colspan="1"  border="1" ></td>
<td colspan="1" border="1" ></td>
<td colspan="1"  border="1" ></td>
<td colspan="1"  border="1" ></td>
<td colspan="1"  border="1" ></td>
<td colspan="1" border="1" ></td>
<td  colspan="1" border="1" ></td>
<td colspan="1"  border="1" ></td>
<td colspan="1"  border="1" ></td>
<td colspan="1"  border="1" ></td>
<td colspan="1" border="1" ></td>
<td colspan="1"  border="1" ></td>
<td colspan="1"  border="1" ></td>
<td colspan="1"  border="1" ></td>
<td colspan="1" border="1" ></td>
<td  colspan="1" border="1" ></td>
<td colspan="1"  border="1" ></td>
<td colspan="1"  border="1" ></td>
<td colspan="1"  border="1" ></td>
<td colspan="1" border="1" ></td>
<td colspan="1"  border="1" ></td>


</tr>';
$contador++;
};

$html =$html. '
<tr>
<td colspan="16" style=" font-size:8px;"  border="0" >Nota: Esta lista será manipulada unicamente por Servicios Escolares.</td>
<td align ="right" colspan="20" style=" font-size:8px;"  border="0" >Fecha de Corte:'.$fechaactual.'</td>
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
$pdf->Output('example_0070.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+

?>