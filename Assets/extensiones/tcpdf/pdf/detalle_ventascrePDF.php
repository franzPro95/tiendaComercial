<?php

require_once('tcpdf_include.php');

require_once('../../../../Models/Tdetalle.php');


class imprimirFactura
{

  public $codigo;
  public function traerImpresionFactura()
  {
    $idCompra=$this->codigo;
    $respuesta=Tdetalle::mdlSelectVentaCredth($idCompra);
    $detalle=Tdetalle::mdlDetalleCredito($idCompra);
    $montoTotal='Bs '.number_format($respuesta['monto_venta'],2);
    $montoIni='Bs '.number_format($respuesta['cuota_inicial'],2);
    $montoCredi='Bs '.number_format($respuesta['monto_credito'],2);
    $fecha=$respuesta['fecha'];
    $fechaComoEntero = strtotime($fecha);
    $Mes=date("m",$fechaComoEntero);
    $Dia=date("d",$fechaComoEntero);
    $Anio=date("Y",$fechaComoEntero);

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
    <td style="width: 100px"><img src="images/multipluspdf.png"></td>

    <td style="width: 440px">
    <table > 
    <tbody style="border-radius:10px;">
       <tr>
    <th></th>
    <th></th>
    <th></th>
    <th colspan="3" style="font-family:fantasy;text-align:center">Cochabamba-Bolivia</th>
    </tr>
    <tr>
    <th></th>
    <th></th>
    <th></th>
    <th style="border: 2px solid #666;font-family:fantasy;text-align:center">DIA</th>
    <th style="border: 2px solid #666;font-family:fantasy;text-align:center">MES</th>
    <th style="border: 2px solid #666;font-family:fantasy;text-align:center">AÑO</th>
    </tr>
    <tr>
    <th></th>
    <th></th>
    <th></th>
    <th style="border: 2px solid #666;font-family:fantasy;text-align:center">$Dia</th>
    <th style="border: 2px solid #666;font-family:fantasy;text-align:center">$Mes</th>
    <th style="border: 2px solid #666;font-family:fantasy;text-align:center">$Anio</th>
    </tr>
    </tbody>
    </table>
    </td>
   </tr>
</table>

EOF;
$pdf->writeHTML($bloque1,false,false,false,false,'');
$bloque2=<<<EOF
<table style="font-size:10px; paddin:5px 10px;">
  <tr>
    <td style="font-family:fantasy; background-color: white;width: 350px">
        <strong>Señor(es):</strong> $respuesta[nom_alias]
      </td>
  </tr>

  <tr>
  <td style="font-family:fantasy; background-color: white;width: 540px">
        <strong>C.I.:</strong> $respuesta[carnet]
      </td>
  </tr>
  <tr>
  <td style="font-family:fantasy; background-color: white;width: 540px">
        <strong>Telefono:</strong> $respuesta[celular]
      </td>
  </tr>
  <tr>
  <td style="font-family:fantasy; background-color: white;width: 540px">
        <strong>Direccion:</strong> $respuesta[direccion]
      </td>
  </tr>
  <tr>
  <td style="font-family:fantasy; background-color: white;width: 540px">
        <strong>Combro:</strong> $respuesta[nombre]
      </td>
  </tr>
 </table>
  <br>
   <br>
EOF;
$pdf->writeHTML($bloque2,false,false,false,false,'');
$bloque3=<<<EOF
<table style="font-size: 10px; padding: 5px 10px; ">
   <br>
       <tr>
       <td style="border: 1px solid #666; background-color: #FF4B00;color: #FFF;width: 50px;text-align: center; color:white"><strong>Nro</strong></td>
       <td style="border: 1px solid #666; color: white;width: 170px;text-align: center;background-color: #FF4B00;color: #FFF"><strong>Descripcion</strong></td>
        <td style="border: 1px solid #666; color: white;width: 90px;text-align: center;background-color: #FF4B00;color: #FFF"><strong>Espesor</strong></td>
        <td style="border: 1px solid #666; color: white;width: 50px;text-align: center;background-color: #FF4B00;color: #FFF"><strong>Cant.</strong></td>
        <td style="border: 1px solid #666;color: white;width: 90px;text-align: center;background-color: #FF4B00;color: #FFF"><strong>Precio/und</strong></td>
        <td style="border: 1px solid #666; color: white;width: 90px;text-align: center;background-color: #FF4B00;color: #FFF"><strong>subtotal</strong></td>
       </tr>
     </table>
EOF;
$pdf->writeHTML($bloque3,false,false,false,false,'');
$suma=0;

foreach ($detalle as $key => $value) {
    $num=($key+1);
    $subTotal='Bs '.number_format($value['subtotal']);
    $precio='Bs '.number_format($value['precio_venta']);
$bloque6=<<<EOF
   <table style="font-size: 10px; padding: 5px 10px;">
       <tr>
       <td style="border: 1px solid #666; background-color: white;width: 50px;text-align: center">$num</td>
       <td style="border: 1px solid #666;text-align: center; background-color: white;width: 170px"> $value[nombre]
        </td>
        <td style="border: 1px solid #666;text-align: center; background-color: white;width: 90px"> $value[espesor] 
        </td>
        <td style="border: 1px solid #666; background-color: white;width: 50px;text-align: center"> $value[cantidad]  </td>
        <td style="border: 1px solid #666; background-color: white;width: 90px;text-align: center">$precio </td>
        <td style="border: 1px solid #666; background-color: white;width: 90px;text-align: center"> $subTotal</td>
       </tr>
     </table>

EOF;
 $pdf->writeHTML($bloque6,false,false,false,false,'');
}
$bloque7=<<<EOF
 <table style="font-size: 10px; padding: 5px 10px;">
    <tr>
    <td style="border_bottom:2px solid #666;color:#333; background-color: white;width: 360px;text-align: center"></td>
    <td style="border: 2px solid #666; background-color: white;width: 90px;text-align: center">Monto Total:</td>
    <td style="border: 2px solid #666; background-color: white;width: 90px;text-align: center">$montoTotal </td>
   </tr>
   <tr>
   	<td style="border_bottom:2px solid #666;color:#333; background-color: white;width: 360px;text-align: center"></td>
   	<td style="border: 2px solid #666; background-color: white;width: 90px;text-align: center">Cuota inicial:</td>
   	<td style="border: 2px solid #666; background-color: white;width: 90px;text-align: center"> $montoIni</td>
   </tr>
   <tr>
   	<td style="border_bottom:2px solid #666;color:#333; background-color: white;width: 360px;text-align: center"></td>
   	<td style="border: 2px solid #666; background-color: white;width: 90px;text-align: center"> Credito:</td>
   	<td style="border: 2px solid #666; background-color: white;width: 90px;text-align: center"> $montoCredi</td>
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