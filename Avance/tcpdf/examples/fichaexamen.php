<?php 
session_start();
error_reporting(E_ALL ^ (E_WARNING | E_NOTICE));
require_once('conexion/conexion.php');

require('tcpdf.php');
setlocale(LC_ALL,"es_MX");
/*
class MYPDF extends TCPDF {

  

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        //$this->SetFont('Arial','B',10);
		
        // Set font
        //$this->SetY(-10);
        // Page number
        //$this->Write(20,  'Hola');
		//$this->Write($html,'utsv');
        //$this->SetX(-20);
		$this->AliasNbPages('tpagina');
	    $this->Write(15,  $this->PageNo(),'tpagina');
    }
}*/

//include("../Conexion.php");
//$miconexion = new Conexion();
//$cn = $miconexion->conectar();
$idpersona =  $_SESSION['idPersonaficha'];
$sqlpersona = "SELECT idpersona, Clave, nombre, apellidoPaterno, apellidoMaterno,correo,
telefono,curp, genero, fechanac, cveedo, cvemun, edodom,ciudaddom, registrado,
coldom,calledom,numextdom, numintdom, codposdom FROM personas where tipo=1 and idpersona =$idpersona";
$rspersona= $mysqli->query($sqlpersona);	
$filapersona		= mysqli_fetch_assoc($rspersona);
$totalFilas = mysqli_num_rows($rspersona);
$avance=0; $registrado=0;
if($totalFilas>0)
{
  $registrado =  $filapersona['registrado'];
if($registrado)
  $avance=20;
  $nombre =   mb_strtoupper($filapersona['nombre'],'utf-8');
  $correo =  $filapersona['correo'];
  $paterno = mb_strtoupper($filapersona['apellidoPaterno'],'utf-8');; 
  $materno = mb_strtoupper($filapersona['apellidoMaterno'],'utf-8');;
  $curp =    mb_strtoupper($filapersona['curp'],'utf-8');;
  
  $genero =    $filapersona['genero'];
  $fecha =    $filapersona['fechanac'];
   $cveedo =    $filapersona['cveedo']; 
   $cvemun =    $filapersona['cvemun'];
    $estadodomicilio =    $filapersona['edodom']; //echo '---';
    $municipiodomicilio =    $filapersona['ciudaddom'];
  $coloniadomicilio =    mb_strtoupper($filapersona['coldom'],'utf-8');;
  $calledomicilio =    mb_strtoupper($filapersona['calledom'],'utf-8');;
  $numExterior =    mb_strtoupper($filapersona['numextdom'],'utf-8');;
  $numInterior =    mb_strtoupper($filapersona['numintdom'],'utf-8');;
  $codpostal =    $filapersona['codposdom'];
  $Telefono =    $filapersona['telefono'];
}

$sqlopcion = "SELECT idaspirante, ficha, captura, (select distinct campus from campus where clave = aspirante.campus1) as campus1, 
(select distinct campus from campus where clave = aspirante.campus1) as campus2, 
modalidad1, modalidad2, 
(SELECT carrera.descripcion FROM carrera inner join ofertaeducativa 
on ofertaeducativa.cvecarrera = carrera.clave where idofertaeducativa=idoferta1) as oferta1,
(SELECT carrera.descripcion FROM carrera inner join ofertaeducativa 
on ofertaeducativa.cvecarrera = carrera.clave where idofertaeducativa=idoferta2) as oferta2
,rutafoto FROM aspirante
where idpersona =$idpersona";
$rsopcion= $mysqli->query($sqlopcion);	
$totalopcion = mysqli_num_rows($rsopcion);
$filaopcion		= mysqli_fetch_assoc($rsopcion);

$campus1="";$campus2="";$modalidad1=""; $modalidad2=""; 
$idoferta1=0;$idoferta2=0;
if($totalopcion>0)
{
  $fechacaptura = substr($filaopcion['captura'],0,10);

  $campus1 = mb_strtoupper($filaopcion['campus1'],'utf-8');
  $campus2 = mb_strtoupper($filaopcion['campus2'],'utf-8');
  $oferta1 = mb_strtoupper($filaopcion['oferta1'],'utf-8');
  $oferta2 = mb_strtoupper($filaopcion['oferta2'],'utf-8');
  $modalidad1 = mb_strtoupper($filaopcion['modalidad1'],'utf-8');
  $modalidad2 = mb_strtoupper($filaopcion['modalidad2'],'utf-8');
  $rutafoto = $filaopcion['rutafoto'];
  if($idoferta1>0)
    $avance= $avance + 20;
  if($rutafoto!="" && $rutafoto!=null)
    $avance= $avance + 20;
     
}

if(!isset($_POST['id'])){
	//require_once('tcpdf/tcpdf.php');

	$pdf = new TCPDF(PDF_PAGE_ORIENTATION, 'mm', 'letter', true, 'UTF-8', false);
	
	$pdf->SetCreator(PDF_CREATOR);
	$pdf->SetAuthor('Kyrda');
	$pdf->SetTitle('Evaluación Alumno');
	
	$pdf->setPrintHeader(false); 
	$pdf->setPrintFooter(false);
	
	$pdf->SetMargins(10, 10, 10, false); 
	$pdf->SetAutoPageBreak(true, 10); 
	$pdf->SetFont('Helvetica', '', 9);
	$pdf->addPage();

	$content = '';
	$content .= '

	<table border="1" cellpadding="10">
			
	
	<tr>
		<td width="30%" align="center" valign="middle"> <img src="images/ut.png" width="60px" height="60px" alt="logo" /></td>
		<td width="40%" align="center" valign="middle">FICHA DEL ASPIRANTE<BR>
		UTSV 2021</td>
		<td width="30%" align="center"><img src="images/logosev2.png"  alt="logo" /></td>
		
	</tr>
	</table>';

	$content .= '

	<table border="1" cellpadding="10">
			
	
	<tr>
		<td width="10%" align="center" valign="middle"> </td>
		<td width="40%" align="center" valign="middle">DATOS DEL ASPIRANTE<BR>
		UTSV</td>
		<td width="10%" align="center">';
		$content .= '$fechacaptura';
		$content .= $modalidad1;
		$content .='</td>
		
	</tr>
	</table>';
	$content .= '<table border="1" cellpadding="10"><tr>
	<td width="10%" align="center" valign="middle">'.$modalidad2.'</td>		
	</tr>
	</table>';


	$pdf->writeHTML($content, true, 0, true, 0);
// output the HTML content
$nombrepdf = "EvaluacionDocentePorAlumno_".$nombreCompletoDocente.$nombrePeriodo.".pdf";
//$pdf->lastPage();
//$pdf->Footer();
	$pdf->output($nombrepdf, 'I');
	
	
	
}




?>


</body>
</html>