<?php 
session_start();
error_reporting(E_ALL ^ (E_WARNING | E_NOTICE));
require_once('conexion/conexion.php');
date_default_timezone_set('America/Mexico_City');
require('tcpdf.php');

class MYPDF extends TCPDF {

  

    function Footer()
	{ 
	   /* Put your code here (see a working example below) */
	
	   $logoX = 186; // 186mm. The logo will be displayed on the right side close to the border of the page
	   $logoFileName = "images/logosev2.png";
	   $logoWidth = 15; // 15mm
	   $logo = $this->PageNo() . ' | '. $this->Image($logoFileName, $logoX, $this->GetY()+2, $logoWidth);
       $this->SetY(-15);
	   $this->SetX($this->w - $this->documentRightMargin - $logoWidth); // documentRightMargin = 18
	   $this->Cell(10,10, 'Av. Universidad Tecnológica Lote Grande No. 1, Sin Colonia, C.P. 96360, Nanchital, Veracruz, México', 0, 0, 'R');
	}
	public function Header() {
	}
}
$periodoanual = $_SESSION['periodoanual'];
$ficha		=	$_REQUEST['id'];
$sqlpersona = "SELECT idaspirantedato, Clave, nombre, apellidoPaterno, apellidoMaterno,correo,
telefono,curp, genero, fechanac, cveedo, cvemun, edodom,ciudaddom, aspirante.registrado,
coldom,calledom,numextdom, numintdom, codposdom,
estados.ESTNOM,municipios.MUNNOM 
FROM aspirantedato inner join aspirante
on aspirantedato.clave = aspirante.folio 
inner join estados on estados.ESTCVE = aspirantedato.CVEEDO
inner join municipios on municipios.ESTCVE= aspirantedato.CVEEDO 
and municipios.MUNCVE=aspirantedato.CVEMUN
where aspirante.anio ='$periodoanual' and aspirante.ficha =$ficha";
$rspersona			= $mysqli->query($sqlpersona);
	$totalFilas 	= mysqli_num_rows($rspersona);
	
	if($row = mysqli_fetch_assoc($rspersona))
	{
        $registrado =  $row['registrado'];
        if($registrado)
          $avance=20;
          $nombre =   mb_strtoupper($row['nombre'],'utf-8');
          $correo =  $row['correo'];
          $paterno = mb_strtoupper($row['apellidoPaterno'],'utf-8');; 
          $materno = mb_strtoupper($row['apellidoMaterno'],'utf-8');;
          $curp =    mb_strtoupper($row['curp'],'utf-8');;          
          $Telefono =    $row['telefono'];
          $Estado =    $row['ESTNOM'];
          $Municipio =    $row['MUNNOM'];
		  $direccion = "COL. ".$row['coldom']." CALLE ". $row['calledom']." ".$row['numextdom']
		  ." ".$row['numintdom']." C.P. ".$row['codposdom'];
	}

	$sqlopcion = "SELECT idaspirante, ficha,fechaficha, captura, 
	campus1, campus2, modalidad1, modalidad2, 
	(SELECT carrera.descripcion FROM carrera inner join ofertaeducativa 
	on ofertaeducativa.cvecarrera = carrera.clave where idofertaeducativa=idoferta1) as oferta1,
	(SELECT carrera.descripcion FROM carrera inner join ofertaeducativa 
	on ofertaeducativa.cvecarrera = carrera.clave where idofertaeducativa=idoferta2) as oferta2
	,(select rutareq from requisitoficha where cvereq='FOTOFICHA' and claveper=aspirante.folio) as rutafoto FROM aspirante
	where aspirante.anio ='$periodoanual' and ficha ='$ficha'";
	$rsopcion			= $mysqli->query($sqlopcion);
	$totalFilas 	= mysqli_num_rows($rsopcion);
	
	if($fila = mysqli_fetch_assoc($rsopcion))
	{
		$ficha = mb_strtoupper($fila['ficha'],'utf-8');
        $fechaficha = mb_strtoupper($fila['fechaficha'],'utf-8');
        $campus1 = mb_strtoupper($fila['campus1'],'utf-8');
		$campus1 = campus($campus1);
        $campus2 = mb_strtoupper($fila['campus2'],'utf-8');
		$campus2 = campus($campus2);
        $oferta1 = mb_strtoupper($fila['oferta1'],'utf-8');
        $oferta2 = mb_strtoupper($fila['oferta2'],'utf-8');
        $modalidad1 = mb_strtoupper($fila['modalidad1'],'utf-8');
        $modalidad2 = mb_strtoupper($fila['modalidad2'],'utf-8');
	    $rutafoto = $_SESSION['rutareq'].$fila['rutafoto'];
	   //$rutafoto = "../fichas/".$fila['rutafoto'];
    }
	function campus($campus){
		if($campus=='NH') $sede='NANCHITAL';
		if($campus=='RC') $sede='ANGEL R. CABADA';
		if($campus=='AD') $sede='AGUA DULCE';
		if($campus=='OT') $sede='OTEAPAN';
		return $sede;
	}
if(!isset($_POST['id'])){
	//require_once('tcpdf/tcpdf.php');

	$pdf = new TCPDF(PDF_PAGE_ORIENTATION, 'mm', 'letter', true, 'UTF-8', false);
	
	$pdf->SetCreator(PDF_CREATOR);
	$pdf->SetAuthor('Kyrda');
	$pdf->SetTitle('UTSV ADMISION');
	
	$pdf->setPrintHeader(false); 
	$pdf->setPrintFooter(true);
	
	$pdf->SetMargins(10, 20, 10, 20); 
	$pdf->SetAutoPageBreak(true, 10); 
	$pdf->SetFont('Helvetica', '', 10);
	$pdf->addPage();

	$content = '';
	$content .= '

	<table border="1" cellpadding="5">
			
	
	<tr>
		<td width="30%" align="center" valign="middle"> <img src="images/ut.png" width="70" height="70" alt="logo" /></td>
		<td width="40%" align="center" valign="middle">FICHA DEL ASPIRANTE<BR>
		ADMISIÓN UTSV<BR>'.substr($fechaficha,0,10).'<h4 style="color:red; font-size:18pt">FOLIO:'.$ficha.'</h4></td>
		<td width="30%" align="center"><img src="images/ut.png"  width="70" height="70" alt="logo" /></td>
		
	</tr>
	</table>
	<table>
	
</table>';		

$content .= '
<div id="contenedor" style="width: 100%;  height: 200;">
<table width="100%" height="300";style="padding-right:25px" style="padding-top:5px" style="padding-bottom:5px">
<tr><td width="40%">
 

<table class="tab-content" align="left" border="1" height="150px" style="padding-top:5px" style="padding-bottom:5px">
<tr><td bgcolor="#E3E4E5" align="center">IDENTIFICACIÓN PERSONAL</td></tr>
<tr><td style="width: 100%;  height:200;"><img src="'.$rutafoto.'"  height="200" alt="foto" /></td></tr>
</table>

</td><td width="60%">
<table class="tab-content" align="left" height="150px" style="padding-top:5px" style="padding-bottom:5px" >

<tr>
<td colspan="4" bgcolor="#E3E4E5" align="center">DATOS DEL ASPIRANTE</td>
</tr>
<tr><td width="25%" height="25px">NOMBRE</td>
<td width="75%">'.$nombre." ".$paterno." ".$materno.'</td></tr>
<tr><td height="25px">CURP</td>
<td >'.$curp.'</td></tr>
<tr><td height="25">TELEFONO</td>
<td>'.$Telefono.'</td></tr>
<tr><td height="25">EMAIL</td>
<td >'.$correo.'</td></tr>
<tr><td height="25">MUNICIPIO</td>
<td >'.$Municipio.'</td></tr>
<tr><td height="25">ESTADO</td>
<td >'.$Estado.'</td></tr>
<tr><td height="25">DOMICILIO</td>
<td >'.$direccion.'</td></tr>
</table>

</td></tr> 
</table> 
</div>
<div>
<table class="tab-content" align="left" border="1" height="150px" style="padding-top:5px" style="padding-bottom:5px">
<tr><td colspan="4" bgcolor="#E3E4E5" align="center">CARRERAS SELECCIONADAS</td></tr>
<tr><td width="12%">OPCION 1</td><td width="17%">'.$campus1.'</td><td width="22%">'.$modalidad1.'</td><td width="49%" >'.$oferta1.'</td></tr>
<tr><td>OPCION 2</td><td >'.$campus2.'</td><td >'.$modalidad2.'</td><td >'.$oferta2.'</td></tr>
</table>
<p></p>
<table class="tab-content" align="left" border="1" height="150px" style="padding-top:5px" style="padding-bottom:5px">
<tr><td bgcolor="#E3E4E5" align="center">ATENTO AVISO</td></tr>
<tr><td>El examen de admisión se llevará acabo el día 21 de Julio del 2023 segun la modalidad que hayan elegido, 
para ello deberá tener a la mano calculadora, hojas blancas, lápiz, borrador, 
sacapuntas, identificación con fotografía y pase de ingreso al examen,todas las indicaciones se
les harán saber en el pase de admisión a la evaluación diágnostica.</td></tr>
</table>
<p></p>
<p></p>
</div> 
<div style="width: 100%;  height: 200;">
<img src="images/logosev2.png" width="600" height="80" alt="logo" />
<p>Av. Universidad Tecnológica Lote Grande No. 1, Sin Colonia, C.P. 96360, Nanchital, Veracruz</p>
</div> 
';

	$pdf->writeHTML($content, true, 0, true, 0);

	
// output the HTML content
$nombrepdf = "utsv".$periodoanual."ficha".$ficha.".pdf";

//$pdf->Footer();

$pdf->output($nombrepdf, 'I');
	
	
	
}




?>


</body>
</html>