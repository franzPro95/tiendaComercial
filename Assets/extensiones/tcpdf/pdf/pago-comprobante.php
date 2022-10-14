<?php
require_once ('tcpdf_include.php');
require_once "../../../controladores/caja.controlador.php";
require_once "../../../modelos/caja.modelo.php";

class ImprimiePagos
{
	public $idUsuario;
	public function ctrImprimirPagos()
	{
		$valor=$this->idUsuario;
		$cm="CM-";
		$respuesta=ControladorCajas::ctrTraerVendedorpoID($valor);
		$sueldo=number_format($respuesta["sueldo"],2);

		date_default_timezone_set('America/La_Paz');

		$fecha = date('Y-m-d');
		$hora = date('H:i:s');
		$fechaActual = $fecha.' '.$hora;
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false, true);
$pdf->startPageGroup();
$pdf->AddPage();		
$bloque1=<<<EOF
<table>
   <tr>
   	<td style="width: 150px"><img src="images/logo.png"></td>
   	<td style="background-color: white; width: 140px">
   	<div style="font-size: 8.5px; text-align: right;line-height: 15px">
        <br>
        NIT:78889999900
        <br>
        Direccion: Colcapirhua km9
      </div>
   	</td>
   	<td style="background-color: white; width: 140px">
   	<div style="font-size: 8.5px; text-align: right;line-height: 15px">
        <br>
        Telefono:78889999900
        <br>
        InfinitySoft.@ContorlSis.com
      </div>
   	</td>
   	<td style="background-color: white; width: 110px; text-align:center; color:red"><br><br>Recibo de $cm$respuesta[id_vendedor]<br><br></td>
   </tr>

 </table>
EOF;
$pdf->writeHTML($bloque1,false,false,false,false,'');
$bloque2=<<<EOF
<table>
	<tr>
		<td style=" background-color: #f50772;width: 540px">
      </td>
	</tr>
</table>
<table>
   <tr>
   	<td style="background-color: white; width: 140px">
   	<div style="font-size: 8.5px; text-align: left;line-height: 15px">
        <br>
        Fecha de la facturacion
        <br>
        $fechaActual
        <br>
        <br>
        Metodo de pago
        <br>
        Efectivo
        <br>
        <br>
        Numero de cuenta
        <br>
        0000-00-0
        <br>
        <br>
        Tipo de pago
        <br>
        Sueldo por comision
        <br>
        <br>
        Comision:$respuesta[comision]%
      </div>
   	</td>
   	<td style="background-color: white; width: 220px">
   	<div style="font-size: 8.5px; text-align: right;line-height: 15px">
       
      </div>
   	</td>
   	<td style="background-color: white; width: 140px">
   	<div style="font-size: 15px; text-align: right;line-height: 15px">
        <br>
        <br>
        <br>
        <br>
        <br>
        Pagado
        <br>
        <br>
        $sueldo Bs.(BOB)
      </div>
   	</td>
   </tr>
<label for="">--------------------------------------------------------------------------------------------------------------------------------------</label>
 </table>
EOF;
$pdf->writeHTML($bloque2,false,false,false,false,'');
$bloque3=<<<EOF
<table>
   <tr>
   	<td style="width: 150px"></td>
   	<td style="background-color: white; width: 140px">
   	<div style="font-size: 8.5px; text-align: right;line-height: 15px">
        <br>
        <br>
        <br>
        <br>
        <br>
        ---------------------------------
        <br>
        Firma vendedor
      </div>
   	</td>
   	<td style="background-color: white; width: 140px">
   	<div style="font-size: 8.5px; text-align: right;line-height: 15px">
        <br>
        <br>
        <br>
        <br>
        <br>
        ----------------------------------
        <br>
        Firma encargado
        <br>
      </div>
   	</td>
   	<td style="background-color: white; width: 110px; text-align:center; color:red"><br><br> <br><br></td>
   </tr>

 </table>
EOF;
$pdf->writeHTML($bloque3,false,false,false,false,'');	
$pdf->output('pago-comprobante.pdf');		
}
}
$pagos=new ImprimiePagos();
$pagos->idUsuario=$_GET["id"];
$pagos->ctrImprimirPagos();
