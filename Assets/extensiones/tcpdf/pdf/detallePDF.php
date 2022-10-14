<?php

require_once('tcpdf_include.php');

require_once('../../../../Models/Tdetalle.php');


class imprimirFactura
{

	public $codigo;
	public function traerImpresionFactura()
	{
		$idVenta=$this->codigo;
		$respuesta=Tdetalle::mdlSelectVentaTerreno($idVenta);
		$detalle=Tdetalle::mdlDetalleCredito($idVenta);
        $numPag=count($detalle);
        $N=1;

        //$fechas=Tdetalle::mdlFecha_limite($idVenta);
        //var_dump($fechas);
		//var_dump($detalle);
		$idecode=100+$respuesta['id'];
		$precio='$ '.number_format($respuesta['precio_terreno'],2);
		$cuotini='$ '.number_format($respuesta['cuota_ini'],2);
		$cuotMes='$ '.number_format($respuesta['cuota_mensual'],2);
		$diferencia=$respuesta['precio_terreno']-$respuesta['cuota_ini'];

		


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
   	<td style="width: 100px"><img src="images/bello.png"></td>
   	<td style="background-color: white; width: 140px">
   	<div style="font-size: 8.5px; text-align: right;line-height: 15px">
        Pagina Facebook:IDISA Bolivia
        <br>
        Direccion Oficinas: 
        <br>
        Hurbanizacion Bello Horizonte
      </div>
   	</td>
   	<td style="background-color: white; width: 140px">
   	<div style="font-size: 8.5px; text-align: right;line-height: 15px">
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
   <td style="background-color: white; width: 150px"><h4><strong>Bello horizonte</strong></h4></td>
   <td style="background-color: white; width: 250px;text-align:center;"><h4><strong>RESUMEN DE PAGOS</strong></h4></td>
   </tr>
</table>

EOF;
$pdf->writeHTML($bloque1,false,false,false,false,'');
$bloque2=<<<EOF
  <table>
        <tr>
          <td style="width: 540px"><img src="images/back.jpg"></td>
        </tr>
  </table>
 <table style="font-size:10px; paddin:5px 10px;">
 	<tr>
 		<td style="border: 1px solid #666; background-color: white;width: 390px">
        Nombres:$respuesta[nombres_apellidos]
      </td>
      <td style="border: 1px solid #666; background-color: white;width: 150px;text-align: right;">
      Fecha de compra: $respuesta[fecha_venta]
        
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
     <tr>
        
      <td style="border: 1px solid #666; background-color: white;width: 540px;">
      Lote:$respuesta[lote] 
        
      </td>
      
    </tr>
    <tr><td style="border: 1px solid #666; background-color: white;width: 540px">
        Superficie:$respuesta[superficie]
      </td></tr>
        <tr>
    
      <td style="border: 1px solid #666; background-color: white;width: 540px;">
      Precio:$precio 
        
      </td>
    </tr>
    <tr><td style="border: 1px solid #666; background-color: white;width: 540px">
        Cuota inicial:$cuotini
      </td></tr>
        <tr>
      <td style="border: 1px solid #666; background-color: white;width: 540px;">
      Cuota mensual: $cuotMes
        
      </td>
    </tr>

 </table>
 <br>
 <br>
 <br>
EOF;
$pdf->writeHTML($bloque2,false,false,false,false,'');
if (!empty($detalle)) {
$bloque3=<<<EOF
<table style="font-size: 10px; padding: 5px 10px; ">
       <tr>
       <td style="border: 1px solid #666; background-color: #107acc;color: #FFF;width: 45px;text-align: center; color:white"><strong>Pago</strong></td>
       <td style="border: 1px solid #666; color: white;width: 125px;text-align: center;background-color: #107acc;color: #FFF"><strong>Vencimiento</strong></td>
        <td style="border: 1px solid #666; color: white;width: 130px;text-align: center;background-color: #107acc;color: #FFF"><strong>Fecha de Pago</strong></td>
        <td style="border: 1px solid #666;color: white;width: 80px;text-align: center;background-color: #107acc;color: #FFF"><strong>Monto</strong></td>
        <td style="border: 1px solid #666; color: white;width: 160px;text-align: center;background-color: #107acc;color: #FFF"><strong>Saldo</strong></td>
       </tr>
     </table>
EOF;
$pdf->writeHTML($bloque3,false,false,false,false,'');
$suma=0;
$cabecera=0;
$i=0;

foreach ($detalle as $key => $value) {
	$m=$value['numPago'];
    //$fecha=$fechas[$i]['fecha_limite']; 
	$cuota='$ '.number_format($value['cuota_mes'],2);
    $suma+=$value['cuota_mes'];
    $saldo=$diferencia-$suma;
    $formSaldo='$ '.number_format($saldo,2);

$bloque6=<<<EOF
	 <table style="font-size: 10px; padding: 5px 10px;">
       <tr>
       <td style="border: 1px solid #666; background-color: white;width: 45px;text-align: center">$m </td>
       <td style="border: 1px solid #666;text-align: center; background-color: white;width: 125px">$value[fechalimite]  
        </td>
        <td style="border: 1px solid #666;text-align: center; background-color: white;width: 130px">$value[fecha_pagado]  
        </td>
        <td style="border: 1px solid #666; background-color: white;width: 80px;text-align: center">$cuota  </td>

        <td style="border: 1px solid #666; background-color: white;width: 160px;text-align: center">$formSaldo </td>
       </tr>
     </table>

EOF;
 $pdf->writeHTML($bloque6,false,false,false,false,'');
 $i++;
 if ($cabecera==16 && $m<$numPag) {
    $N++;
$bloque8=<<<EOF
  <table>
        <tr>
          <td style="width: 540px"><img src="images/back.jpg"></td>
        </tr>
  </table>
<table>
   <tr>
    <td style="width: 100px"><img src="images/bello.png"></td>
    <td style="background-color: white; width: 140px">
    <div style="font-size: 8.5px; text-align: right;line-height: 15px">
        Pagina Facebook:IDISA Bolivia
        <br>
        Direccion Oficinas: 
        <br>
        Hurbanizacion Bello Horizonte
      </div>
    </td>
    <td style="background-color: white; width: 140px">
    <div style="font-size: 8.5px; text-align: right;line-height: 15px">
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
   <td style="background-color: white; width: 150px"><h4><strong>Bello horizonte</strong></h4></td>
   <td style="background-color: white; width: 250px;text-align:center;"><h4><strong>RESUMEN DE PAGOS</strong></h4></td>
   </tr>
</table>

EOF;
$pdf->writeHTML($bloque8,false,false,false,false,'');
$bloque9=<<<EOF
  <table>
        <tr>
          <td style="width: 540px"><img src="images/back.jpg"></td>
        </tr>
  </table>
 <table style="font-size:10px; paddin:5px 10px;">
    <tr>
        <td style="border: 1px solid #666; background-color: white;width: 390px">
        Nombres:$respuesta[nombres_apellidos]
      </td>
      <td style="border: 1px solid #666; background-color: white;width: 150px;text-align: right;">
      Fecha de compra: $respuesta[fecha_venta]
        
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
     <tr>
        
      <td style="border: 1px solid #666; background-color: white;width: 540px;">
      Lote:$respuesta[lote] 
        
      </td>
      
    </tr>
    <tr><td style="border: 1px solid #666; background-color: white;width: 540px">
        Superficie:$respuesta[superficie]
      </td></tr>
        <tr>
    
      <td style="border: 1px solid #666; background-color: white;width: 540px;">
      Precio:$precio 
        
      </td>
    </tr>
    <tr><td style="border: 1px solid #666; background-color: white;width: 540px">
        Cuota inicial:$cuotini
      </td></tr>
        <tr>
      <td style="border: 1px solid #666; background-color: white;width: 540px;">
      Cuota mensual: $cuotMes
        
      </td>
    </tr>

 </table>
 <br>
 <br>
 <br>
EOF;
$pdf->writeHTML($bloque9,false,false,false,false,'');
$bloque7=<<<EOF
<table style="font-size: 10px; padding: 5px 10px; ">
       <tr>
       <td style="border: 1px solid #666; background-color: #107acc;color: #FFF;width: 45px;text-align: center; color:white"><strong>Pago</strong></td>
       <td style="border: 1px solid #666; color: white;width: 125px;text-align: center;background-color: #107acc;color: #FFF"><strong>Vencimiento</strong></td>
        <td style="border: 1px solid #666; color: white;width: 130px;text-align: center;background-color: #107acc;color: #FFF"><strong>Fecha de Pago</strong></td>
        <td style="border: 1px solid #666;color: white;width: 80px;text-align: center;background-color: #107acc;color: #FFF"><strong>Monto</strong></td>
        <td style="border: 1px solid #666; color: white;width: 160px;text-align: center;background-color: #107acc;color: #FFF"><strong>Saldo</strong></td>
       </tr>
     </table>
EOF;
$pdf->writeHTML($bloque7,false,false,false,false,''); 
$cabecera=0;    
 }else{
    $cabecera++;
 }

}
}
//SALIDA DE CELDAS
$pdf->output('factura.pdf');
}
}
// set document information
$factura=new imprimirFactura();
$factura->codigo=$_GET["codigo"];
$factura->traerImpresionFactura();