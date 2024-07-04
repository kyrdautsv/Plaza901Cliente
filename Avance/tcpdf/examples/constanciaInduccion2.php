<?php
session_start();
error_reporting(E_ALL ^ (E_WARNING | E_NOTICE));
//setlocale(LC_ALL,"es_MX");
//setlocale(LC_TIME, "spanish");
date_default_timezone_set('America/Mexico_City');
$fechaactual = date('d-m-Y');



 $año=date("Y");
 $mes=date("F");
 

 $dia=date("d");



// require_once('conexion/conexion.php');
require_once('tcpdf_include.php');
require_once('conexion/conexion.php');
// require_once('tcpdf.php');


  $ClavePeriodo =3231;
  $matricula = 20190005;  


// ya imprime todos los nombres pero al momento de colocarlos en el td no manda nada
$consulta1 	="SELECT distinct alumnos.matricula, numper, 

(select ( email) from personas where personas.clave = alumnos.matricula) as email,
(select ( curp) from personas where personas.clave = alumnos.matricula) as curp,
(select ( telefono) from personas where personas.clave = alumnos.matricula) as telefono,
(select ( nombreCarrera) from carrera where alumnos.clavecar = carrera.clave) as carrera,
(select ( descripcion) from periodo where periodo.clave = alumnos.claveperiodo) as periodo,

(select concat(personas.nombre,' ',ifnull(apellidoPaterno,''),' ', ifnull(apellidoMaterno,'')) from personas where personas.clave = alumnos.matricula) as nombrecompleto,
(select estatus from carreraalumno where matricula= alumnos.matricula and clavecar = alumnos.clavecar and periodoactual=alumnos.claveperiodo) as estatus, 
alumnos.clavecar , carrera.descripcion, grupos.campus as extcve, grupos.sistema  as siscve FROM alumnos
 inner join grupos on grupos.clave = alumnos.clavegrupo and alumnos.claveperiodo = grupos.claveperiodo
and grupos.clavecarrera = alumnos.clavecar
inner join carrera on carrera.clave = alumnos.clavecar
where alumnos.claveperiodo = '$ClavePeriodo' and matricula='$matricula'
and numper in (
SELECT  planestudio.numper -1 as estadia FROM grupos as grp
inner join planestudio on planestudio.clavecar = grp.clavecarrera
and grp.claveplan = planestudio.claveplan
where claveperiodo = alumnos.claveperiodo and clavecarrera=alumnos.clavecar 
and planestudio.claveplan=grupos.claveplan and grp.clave=alumnos.clavegrupo)";

$rs1   		= $mysqli->query($consulta1) ;
  
$filas1 	    = mysqli_fetch_assoc($rs1);
// $totalcalif = mysqli_num_rows($rs1);
	
  $nombreAlumno=$filas1['nombrecompleto'];
  $carrera=$filas1['carrera'];
  $matricula=$filas1['matricula'];
  $siscve=$filas1['siscve'];

  function getSistema($siscve){
	switch ($siscve) {
		case 'E':$texto = "ESCOLARIZADO";
	   
		break;
		
		case 'D':$texto = "DESPRESURIZADO";
	   
		break;
		default: $texto = "NA";
		
		break;
		}
	return $texto;
  }
  

  class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        // Logo aqui va la ruta
        $image_file ='images/bannerInduccion.jpg';
        $this->Image($image_file, 30, 2, 170, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('helvetica', 'B', 12);
        // Title
        $this->Cell(0, 10, '', 0, false, 'C', 0, '', 0, false, 'M', 'M');
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);

        
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        //$image_file ='images/bannerFooter.jpg';
        //$this->Image($image_file, 30, 270, 170, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        //$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}


// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf = new MYPDF('P', 'mm', 'A4', true, 'UTF-8', false);

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
$pdf->SetMargins(15, 7, 15, false); 
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

	<td width="25%" Vspace="5px" height="90px" align="center" valign="middle" style="padding-top:20px" > <BR> <img src="images/ut.jpg" Vspace="5px"  align="center"  height="65px" border="0" /></td>
	<td width="75%"  height="70px"  align="center" valign="middle" padding:"15px" style="padding-bottom:20px;font-size:14px;font-weight:bold;"  > <BR> <BR> CONSTANCIA INDUCCIÓN DE ESTADÍAS.<BR>UTSV-DVI-FO-01</td>

	

	
</tr>
</table>';



$html =$html. ' <BR> <BR> <BR> <BR> <BR> 
<table borde="0" cellspacing="1" cellpadding="3" style="font-size:12px;line-height: normal; ">


<tr align="" >
	<th colspan="12" align="right"  style="font-weight:bold;" border="0" >Nanchital de Lázaro Cárdenas del Río, <span style=" font-weight: bold;text-decoration: underline;font-size: 12px !important;">'.$dia.'</span> de  <span style=" font-weight: bold;text-decoration: underline;font-size: 12px !important;">'.$mes.'</span>  del  <span style=" font-weight: bold;text-decoration: underline;font-size: 12px !important;"> '.$año.' </span>.<BR></th>
		
    </tr>

	<tr align="" >
	<th colspan="12" align=""  style="text-align: justify;line-height: normal;"  border="0" >Por medio del presente, yo  <span style=" font-weight: bold;text-decoration: underline;font-size: 12px !important;"> '.$nombreAlumno.' </span>, alumno(a) de la Carrera 
	<span style=" font-weight: bold;text-decoration: underline;font-size: 12px !important;">'.$carrera.'</span>, con Matrícula  <span style=" font-weight: bold;text-decoration: underline;font-size: 12px !important;">'.$matricula.'</span>,
	modalidad  <span style=" font-weight: bold;text-decoration: underline;font-size: 12px !important;">'.getSistema($siscve).'</span> hago constar que recibí el “Curso de Inducción para las Estadías” del
	periodo  <span style=" font-weight: bold;text-decoration: underline;font-size: 12px !important;"></span>.<BR></th>
		
    </tr>

<tr align="" >
	<th colspan="12" align="left"   style="text-align: justify;line-height: normal;"  border="0" >Por lo anterior y conforme a la información recibida en dicho curso, estoy consciente y de acuerdo que, para
	poder realizar la estadía, <b>MIS OBLIGACIONES SON:</b><BR></th>
		
    </tr>


<tr align="" style="text-align: justify;line-height: normal;"   >
	<th colspan="12" align="" style="padding-left: 1.5em;"   border="0" >1. Acatar los requerimientos que marca el Capítulo II tomando muy en cuenta los Art. 75, 76, 79, 80, 84,
	85, 87 de nuestro Reglamento Escolar Vigente relacionado con las Estadías.</th>
		
    </tr>



	<tr align=""  style="text-align: justify;line-height: normal;" >
	<th colspan="12" align=""  style="text-align: justify;line-height: normal;"  border="0" >2. Cumplir con todos los requerimientos administrativos en los tiempos señalados que me indico la
	Oficina de Prácticas y Estadías en el programa de actividades entregado en el curso de inducción.</th>
		
    </tr>


	
<tr align=""  >
<th colspan="12" align=""  style="text-align: justify;line-height: normal;"  border="0" >3. Asegurarme que mi seguro facultativo esté vigente.</th>
	
</tr>



<tr align="" >
	<th colspan="12" align=""  style="text-align: justify;line-height: normal;"  border="0" >4. No tener adeudos en caja.</th>
		
    </tr>

	
<tr align="" style="text-align: justify;line-height: normal;" >
<th colspan="12"  style="text-align: justify;line-height: normal;"  border="0" >5. Realizar mis estadías en la empresa que yo solicite o me fue asignada sin pretexto alguno, salvo que
por una razón ajena a mis circunstancias me lo impidan, mismo que deberé hacer de conocimiento
de manera inmediata a mi asesor académico o Director de Carrera.<BR></th>

	
</tr>





<tr align="" >
<th colspan="12" style="text-align: justify;line-height: normal;" border="0" >Dado que la estadía implica una relación directa con el sector productivo
 y social <b> ME COMPROMETO A: </b><BR></th>

	
</tr>



<tr align=""  style="text-align: justify;line-height: normal;" >
<th colspan="12"   style="text-align: justify;line-height: normal;"  border="0" >1. No divulgar cualquier información de aspecto técnico y recurso material de carácter confidencial que
así considere la empresa.</th>

	
</tr>

<tr align="" style="text-align: justify;line-height: normal;"  >
<th colspan="12"   style="text-align: justify;line-height: normal;"  border="0" >2. Si manifiesto por mi conducta que no deseo acudir al desarrollo de las estadías, o que no me
interesa el lugar donde fui aceptado, la Universidad Tecnológica del Sureste de Veracruz da por
entendido que estoy renunciando a mi periodo de estadías, por lo que la Universidad queda liberada
de cualquier responsabilidad que resulte de la misma.</th>

	
</tr>


<tr align="" style="text-align: justify;line-height: normal;" >
<th colspan="12"  style="text-align: justify;line-height: normal;"  border="0" >3. Si por una razón justificable me veo obligado a ya NO continuar con la empresa, deberé notificarlo a
mi asesor académico y al Dirección de Carrera de manera inmediata, para que determinen si es
válido o no el cambio sin perder mi periodo de estadías.</th>

	
</tr>

<tr align="" style="text-align: justify;line-height: normal;"  >
<th colspan="12"  style="text-align: justify;line-height: normal;"  border="0" >4. Me conduciré con respeto, ética y responsabilidad en todas las actividades encomendadas por mis
superiores, fomentando con ello un ambiente de trabajo en equipo con el personal de la empresa,
asesores empresariales y académicos.</th>

	
</tr>


<tr align=""  style="text-align: justify;line-height: normal;" >
<th colspan="12"  style="text-align: justify;line-height: normal;"  border="0" >Fui informado qué tengo derecho a un cambio de empresa dentro del primer mes de mi estadía y
cuáles son los causas, y que son efectuados previa autorización, tomando en cuenta el punto 5
de mis Obligaciones y punto 3 de mis Compromisos.<BR></th>

	
</tr>


<tr align=""  style="text-align: justify;line-height: normal;" >
<th colspan="12" align=""  style="font-weight:bold;" border="0" >Fui informado qué tengo derecho a un cambio de empresa dentro del primer mes de mi estadía y
cuáles son los causas, y que son efectuados previa autorización, tomando en cuenta el punto 5
de mis Obligaciones y punto 3 de mis Compromisos.</th>

</tr>



<tr align="center" >
<th colspan="12" align="center"  style="font-weight:bold;" border="0" >ATENTAMENTE<BR><BR>
</th>
<BR><BR>

	
</tr>


<tr align="center" >
<th colspan="12" align="center"  style="font-weight:bold;" border="0" >(FIRMA DEL ALUMNO)</th>

	
</tr>





</table>';





$html =$html. ' 
<table>
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