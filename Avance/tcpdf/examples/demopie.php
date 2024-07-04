<?php
session_start();
error_reporting(E_ALL ^ (E_WARNING | E_NOTICE));
/*setlocale(LC_ALL,"es_MX");
setlocale(LC_TIME, "spanish");*/
date_default_timezone_set('America/Mexico_City');
$fechaactual = date('d-m-Y');
//require_once('conexion/conexion.php');
//require_once('tcpdf_include.php');
require_once('conexion/conexion.php');
require_once('tcpdf.php');

if (isset($_REQUEST['matricula']))
	{//desde administrativos
		$matricula = $_REQUEST['matricula'];
		$claveperiodo = $_REQUEST['periodo'];
	}
else{//desde alumnos
	$matricula = $_SESSION['clavepersona'];
	$claveperiodo = $_SESSION['periodoboleta'];
	$nombrealumno = $_SESSION['nombrecompleto'];
}


 $consulta1 	= "SELECT alumnos.clavecar,carrera.nombreCarrera, 
 concat(IFNULL(nombre,''),' ',apellidoPaterno,'',' ',IFNULL(apellidoMaterno,'')) as nombreCompleto, 
 alumnos.clavegrupo, cargahorarias.clavemateria as cveasignatura, asignaturas.asignatura, 
(select nombreGrupo from grupos where clave = cargahorarias.clavegrupo and claveperiodo = cargahorarias.claveperiodo 
and clavecarrera = cargahorarias.clavecar) as grupo, (select numper from grupos where clave = cargahorarias.clavegrupo 
and claveperiodo = cargahorarias.claveperiodo and clavecarrera = cargahorarias.clavecar) as cuatrimestre,
(select campus from grupos where clave = cargahorarias.clavegrupo and claveperiodo = cargahorarias.claveperiodo 
and clavecarrera = cargahorarias.clavecar) as campus,
(select sistema from grupos where clave = cargahorarias.clavegrupo and claveperiodo = cargahorarias.claveperiodo 
and clavecarrera = cargahorarias.clavecar) as sistema
FROM alumnos inner join personas on personas.clave=alumnos.matricula
 inner join cargahorarias on cargahorarias.claveperiodo=alumnos.claveperiodo and cargahorarias.clavecar=alumnos.clavecar 
and cargahorarias.clavegrupo=alumnos.clavegrupo inner join asignaturas on asignaturas.clave=cargahorarias.clavemateria 
inner join carrera on carrera.clave = cargahorarias.clavecar
where alumnos.claveperiodo='$claveperiodo' and alumnos.matricula='$matricula'
and cargahorarias.clavemateria not like 'tut%'
order by cargahorarias.clavemateria";
$rs1   		= $mysqli->query($consulta1) ;
  
   $filas1 	    = mysqli_fetch_assoc($rs1);
   $totalcalif = mysqli_num_rows($rs1);

   if (isset($_REQUEST['matricula']))
   		$nombrealumno= $filas1['nombreCompleto'];

   $estatusfinal = $filas1['estatusfinal'];
   $estatusmatextra = $filas1['estatusmatextra'];
   $estatusmatespecial = $filas1['estatusmatespecial'];
   $asignatura = $filas1['asignatura'];
   $clavemateria = $filas1['clavemateria'];
  // $claveperiodo = $filas1['claveperiodo'];  
   $clavepersona = $filas1['clavepersona'];
   $descripcion = $filas1['nombreCarrera'];
   $clavegrupo = $filas1['clavegrupo'];
   $nombreDocente = $filas1['nombre'];
   $grupo = $filas1['grupo'];
   $campus = $filas1['campus'];
   $cuatrimestre = $filas1['cuatrimestre'];
   $sistema = $filas1['sistema'];
   $clavecarrera = $filas1['clavecar'];
  
class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        // Logo
        $image_file = 'images/ut.jpg';
        $this->Image($image_file, 10, 10, 15, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
       // $this->SetFont('helvetica', 'B', 20);
        // Title
        $this->Cell(0, 15, '<< TCPDF Example 003 >>', 0, false, 'C', 0, '', 0, false, 'M', 'M');
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number $this->getAliasNbPages()
        $this->Cell(0, 10, '_', 0, false, 'C', 0, '', 0, false, 'T', 'M');

   
	}
}
// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf = new MYPDF('P', 'mm', 'LETTER', true, 'UTF-8', false);

// set document information
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor('KYRDA');
$pdf->setTitle('PRE-BOLETA');
$pdf->setSubject('SIGU-UTSV');
$pdf->setKeywords('UTSV, SIGU');


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
	<td width="20%" Vspace="5px" height="70px" align="center" valign="middle" style="padding-top:20px;font-weight:bold;" > <BR> <img src="images/ut.jpg" Vspace="5px"  align="center"  height="70px" border="0" /></td>
	<td width="80%"  height="70px"  align="center" valign="middle" padding:"15px" style="padding-bottom:20px;font-size:16px;font-weight:bold;"  > <BR> Universidad Tecnológica del Sureste de Veracruz<BR> <BR> PRE-BOLETA DE CALIFICACIONES<BR></td>

	


	
</tr>
</table>

<table>
<tr>
		<th align="rigth" >'.$fechaactual.'</th>
		
	</tr>
</table>';



$html =$html. ' <BR> <BR> 
<table cellpadding="3" cellspacing="1"   style="font-size:11px;border-top-width: 1px; border-right-width: 1px;border-bottom-width: 1px;border-left-width: 1x">


	<tr align="" >
	<th colspan="1" align="left"  style="font-weight:bold;"  >ALUMNO(A): </th>
	<th colspan="4" align="left"   >'.$nombrealumno.'</th>
	<th colspan="1" align="left"  style="font-weight:bold;" >MATRICULA:</th>
	<th colspan="2" align="left"  >'.$matricula.'</th>	
    </tr>

	<tr align="">
	<th colspan="1" align="left"  style="font-weight:bold;"  >CARRERA: </th>
	<th colspan="4" align="left"   >'.$descripcion.'</th>
	<th colspan="1" align="left" width="15%" style="font-weight:bold;"  >CUATRIMESTRE:</th>
	<th colspan="2" align="left"  >'.$cuatrimestre.'</th>	
    </tr>


	<tr align="">
	<th colspan="1" align="left"  style="font-weight:bold;" >CAMPUS: </th>
	<th colspan="4" align="left"  >'.$campus.'</th>
	<th colspan="1" align="left"  style="font-weight:bold;"  >GRUPO:</th>
	<th colspan="2" align="left" >'.$grupo.' </th>	
    </tr>


	<tr align="">
	<th colspan="1" align="left"  style="font-weight:bold;"  >PERIODO: </th>
	<th colspan="4" align="left"   >'.$claveperiodo.'</th>
	<th colspan="1"  align="left"  style="font-weight:bold;"  >MODALIDAD:</th>
	<th colspan="2" align="left"  >'.$sistema.'</th>	
    </tr>

	
	
	
</table>';

	

$html =$html. ' <BR> <BR> <BR> 
<table borde="0" cellspacing="1" cellpadding="3" style="font-size:9px; ">


<tr  align="" style="background-color:#b5b8b1; color: black; text-align: middle;font-weight: bold;">
	<th  colspan="2" align="center"  width="42%"  border="1" >ASIGNATURAS </th>
	<th colspan="7"  align="center"  width="58%"  border="1" >CALIFICACIONES </th>
		

    </tr>

	<tr  align="" style="background-color: #b5b8b1; color: black; text-align: middle;" >

	<th  align="center"  width="8%"  border="1" >CLAVE</th>
	<th  align="center"  width="34%"  border="1" > NOMBRE</th>
	<th  align="center"  width="8%"  border="1" >1er.  <BR>  PARCIAL</th>
	<th  align="center"  width="8%"  border="1" >2do. <BR>   PARCIAL</th>
	<th  align="center"  width="8%"  border="1" >3er.  <BR>   PARCIAL</th>	
	<th  align="center"  width="8%"  border="1" >FINAL</th>	
	<th  align="center"  width="8%"  border="1" >EXTRAORDINARIO</th>	
	<th  align="center"  width="8%"  border="1" >ESPECIAL</th>	
	<th  align="center" width="10%"  border="1" >CUATRIMESTRAL</th>	

    </tr>';
$suma=0;
do
{

	
	
	$clavemateria = $filas1['cveasignatura'];
	$materia = $filas1['asignatura'];
	 $sqlcalif="select distinct idcargahoraria, estatusfinal,estatusmatextra,estatusmatespecial, estatusparcial1,estatusparcial2,estatusparcial3, 
    calificacion.cveasignatura, parcial1,parcial2,parcial3,calificacion.final,calificacion.extra,calificacion.especial, 
    calificacion.cveasignatura from calificacion inner join cargahorarias on cargahorarias.claveperiodo = calificacion.cveperiodo 
    and cargahorarias.clavecar = calificacion.cvecarrera and cargahorarias.clavegrupo = calificacion.cvegrupo 
    and cargahorarias.clavemateria = calificacion.cveasignatura 
    where calificacion.matricula='$matricula' and calificacion.cveperiodo = '$claveperiodo'
    and calificacion.cveasignatura = '$clavemateria'";

	$rs5   		= $mysqli->query($sqlcalif) ;
	$filas5	    = mysqli_fetch_assoc($rs5);
	$total5 = mysqli_num_rows($rs5);
	$parcial1 ="";$parcial2 ="";$parcial3 ="";
	$final ="";$extra ="";$especial ="";

	if($total5>0){            
		/*$estatusparcial1 =  $filas5['estatusparcial1'];
		$estatusparcial2 =  $filas5['estatusparcial2'];
		$estatusparcial3 =  $filas5['estatusparcial3'];*/
		$estatusfinal =  $filas5['estatusfinal'];
		$estatusmatextra =  $filas5['estatusmatextra'];
		$estatusmatespecial =  $filas5['estatusmatespecial'];
		  $parcial1 =  $filas5['parcial1'];            
		  $parcial2 =  $filas5['parcial2'];            
		  $parcial3 =  $filas5['parcial3'];
		  $final =$filas5['final'];
		  $extra =$filas5['extra'];
		  $especial =$filas5['especial'];
		  
		  $calificacion = obtenercalificacion(1,$final,$estatusfinal,$extra,$estatusmatextra,$especial,$estatusmatespecial);
		  $suma = $suma + $calificacion;
		  if($extra=-1) $extra="";
		  if($especial=-1) $especial="";
		}
	$html =$html.'
	<tr  align="" >
	<th  align="center"  width="8%"  border="1" >'.$clavemateria.'</th>
	<th  align="left"  width="34%"  border="1" >'.$materia.'</th>
	<th  align="center"  width="8%"  border="1" >'.$parcial1.'</th>
	<th  align="center"  width="8%"  border="1" >'.$parcial2.'</th>
	<th  align="center"  width="8%"  border="1" >'.$parcial3.'</th>	
	<th  align="center"  width="8%"  border="1" >'.$final.'</th>	
	<th  align="center"  width="8%"  border="1" >'.$extra.'</th>	
	<th  align="center"  width="8%"  border="1" >'.$especial.'</th>	
	<th  align="center"  width="10%"  border="1" >'.$calificacion.'</th>	

    </tr>';	
}	while($filas1 = mysqli_fetch_array($rs1));	
$promedio = round($suma/$totalcalif,1);
$html =$html.'
	<tr  align="">
	<th  align="center"  width="42%"  border="0" ></th>
	<th  align="center"  width="8%"  border="0" ></th>
	<th  align="center"  width="8%"  border="0" ></th>
	<th  align="center"  width="8%"  border="0" ></th>	
	<th  align="center"  width="8%"  border="0" ></th>	
	<th  align="center"  width="8%"  border="0" ></th>	
	<th  align="center"  width="8%"  border="0" ></th>	
	<th  align="center"  width="10%"  border="0" ></th>	

    </tr>
	
	
	<tr  align="">
	<th  align="center"  width="42%"  border="0" ></th>
	<th  align="center"  width="8%"  border="0" ></th>
	<th  align="center"  width="8%"  border="0" ></th>
	<th  align="center"  width="8%"  border="0" ></th>	
	<th  align="center"  width="8%"  border="0" ></th>	
	<th  align="center"  width="8%"  border="0" ></th>	
	<th  align="center" style="font-weight:bold;" width="8%"  border="0" >PROMEDIO</th>	
	<th  align="center"  width="10%"  border="1" >'.$promedio.'</th>	

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
$pdf->Output('preboleta'.$claveperiodo.'_'.$matricula, 'I');

//============================================================+
// END OF FILE
//============================================================+

?>
<?php
function obtenercalificacion($estatusalumno,$final,$estatusfinal,$califextra,$estatusmatextra,$califespecial,$estatusmatespecial){
  $cuatrimestral="";
  if ($estatusalumno!=1){ //baja
    $final="Baja";
    $cuatrimestral="Baja";
}else{ //si esta activo
if ($final==-1) $final="NP";
elseif($estatusfinal =='VALIDADO'){
  $cuatrimestral=$final;
  if ($final>=0 and $final<8) 
  { 
    if($estatusmatextra=='VALIDADO'){ 
      $extra=$califextra;
      $cuatrimestral=$extra;
      if ($extra==-1){
        $extra="NP";
        $cuatrimestral=$final;
      }else { 					
        if ($extra>=0 and $extra<8) 
        {
          if($estatusmatespecial=='VALIDADO'){ 
            $especial=$califespecial;
            $cuatrimestral=$especial;
            if ($especial==-1){
              $especial="NP";
              $cuatrimestral=$extra;
            }
          }else $cuatrimestral="NC";
        }
    }
    
    }else $cuatrimestral="NC";
  }
  
}else $cuatrimestral="NC";
      
}// baja
return $cuatrimestral;
}