<?php

require_once('tcpdf_include.php');

require_once('../../../../Models/Tdetalle.php');


class imprimirFactura
{

	public $codigo;
	public function traerImpresionFactura()
	{
		$idVenta=$this->codigo;
		$respuesta=Tdetalle:: mdlSelectVentaContado($idVenta);
		//$detalle=Tdetalle::mdlDetalleCredito($idVenta);
		//var_dump($respuesta);
        $numero=$respuesta['id'];
		//$idecode=100+$respuesta['id'];
		$precio='$us '.number_format($respuesta['monto_venta'],2);
		//$cuotini='Bs '.number_format($respuesta['cuota_ini'],2);
		//$cuotMes='Bs '.number_format($respuesta['cuota_mensual'],2);
		//$diferencia=$respuesta['precio_terreno']-$respuesta['cuota_ini'];

		


// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false, true);
$pdf->startPageGroup();
$pdf->AddPage();
$bloque1=<<<EOF
  <table>
        <tr>
          <td style="width: 540px"><img src="images/back.jpg"></td>
        </tr>
  </table>
<table>
  <tr>
   <td style="background-color: white; width: 540px;text-align:center"><h4><strong>REGISTRO DE CLIENTE</strong></h4></td>
   </tr>
   <tr>
   	<td style="width: 100px"><img src="images/bello.png"></td>
   	<td style="background-color: white; width: 140px">
   	<div style="font-size: 8.5px; text-align: right;line-height: 15px">
        <br>
        Pagina Facebook:IDISA Bolivia
        <br>
        Direccion Oficinas:
        <br>
        Hurbanizacion Bello Horizonte
      </div>
   	</td>
   	<td style="background-color: white; width: 140px">
   	<div style="font-size: 8.5px; text-align: right;line-height: 15px">
        <br>
        Contacto:76949048
        <br>
        Calle Tarija Nro 1510
        <br>
        Carretera Valle Alto km 15
      </div>
   	</td>
   	
    <td style="width: 150px"><img src="images/bello2.png"></td>
   </tr>
   <tr>
   <td style="background-color: white; width: 540px;text-align:center"><h4><strong>DATOS DE LA COMPRA</strong></h4></td>
   </tr>
</table>
<br>
<br>
EOF;
$pdf->writeHTML($bloque1,false,false,false,false,'');
$bloque2=<<<EOF
 <table style="font-size:10px; paddin:5px 10px;">
 	<tr>
 		<td style="border: 1px solid #666; background-color: white;width: 390px">
        Nombres:$respuesta[nombres_apellidos]
      </td>
      <td style="border: 1px solid #666; background-color: white;width: 150px;text-align: right;">
      Fecha de compra:$respuesta[fecha_venta] 
        
      </td>
      
	</tr>

	<tr>
	<td style="border: 1px solid #666; background-color: white;width: 540px">
      	C.I:$respuesta[ci]
      </td>
	</tr>
	<tr>
	<td style="border: 1px solid #666; background-color: white;width: 540px">
      	Telefono:$respuesta[telefono]
      </td>
	</tr>
    <tr>
        <td style="border: 1px solid #666; background-color: white;width: 540px">
        Manzano:$respuesta[manzano]
      </td>
    </tr>
    <tr><td style="border: 1px solid #666; background-color: white;width: 540px;">
      Lote:$respuesta[lote]
        
      </td></tr>

    <tr>
    <td style="border: 1px solid #666; background-color: white;width: 540px">
        Superficie:$respuesta[superficie]
      </td>
    </tr>
    <tr><td style="border: 1px solid #666; background-color: white;width: 540px">
        Tipo de venta:Al contado
      </td></tr>

 </table>
 <br>
<br>
 <br>
<br>
 <br>
<br>
 <br>
<br>
EOF;
$pdf->writeHTML($bloque2,false,false,false,false,'');
$bloque5=<<<EOF
<table style="font-size: 10px; padding: 5px 10px; ">
       <tr>
       <td style="border: 1px solid #666; background-color: #107acc;color: #FFF;width: 45px;text-align: center; color:white"><strong>Nro</strong></td>
        <td style="border: 1px solid #666; color: white;width: 255px;text-align: center;background-color: #107acc;color: #FFF"><strong>Fecha de Pago</strong></td>
        <td style="border: 1px solid #666;color: white;width: 240px;text-align: center;background-color: #107acc;color: #FFF"><strong>Costo Total</strong></td>
       </tr>

     </table>
EOF;
$pdf->writeHTML($bloque5,false,false,false,false,'');
$bloque6=<<<EOF
   <table style="font-size: 10px; padding: 5px 10px;">
   <tr>
   <td style="border: 1px solid #666; background-color: white;width: 45px;text-align: center"> 1</td>
    <td style="border: 1px solid #666;text-align: center; background-color: white;width: 255px">$respuesta[fecha_venta] 
    </td>
    <td style="border: 1px solid #666; background-color: white;width: 240px;text-align: center">$precio </td>
   </tr>
   </table>
EOF;
$pdf->writeHTML($bloque6,false,false,false,false,'');
$bloque7=<<<EOF
<table style="font-size: 10px; padding: 5px 10px; ">
<tr>
<td style="background-color: white; width: 450px;"><h4><strong></strong></h4></td>
</tr>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
   <tr>
   <td style="background-color: white; width: 200px;"><strong>------------------------------------------------------<br>RECIBI CONFORME</strong><br>Nombre:<br>C.I.:</td>

   <td style="background-color: white; width: 140px;"><strong></strong></td>

    <td style="background-color: white; width: 200px;"><strong>------------------------------------------------------<br>ENTREGE CONFORME</strong><br>Nombre:<br>C.I.:</td>
    
   </tr>
 </table>
EOF;
$pdf->writeHTML($bloque7,false,false,false,false,'');
//SALIDA DE CELDAS
$pdf->output('factura.pdf');
}
}
// set document information
$factura=new imprimirFactura();
$factura->codigo=$_GET["codigo"];
$factura->traerImpresionFactura();