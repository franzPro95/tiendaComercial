<?php

require_once('tcpdf_include.php');

require_once('../../../../Models/Tdetalle.php');


class imprimirFactura
{

  public $codigo;
  public function traerImpresionFactura()
  {
    $idCompra=$this->codigo;
    $respuesta=Tdetalle::mdlSelectVentaCon($idCompra);
    $detalle=Tdetalle::mdlDetalleVentaCon($idCompra);
    $montoTotal='Bs '.number_format($respuesta['monto_total'],2);
    $fecha=$respuesta['fecha'];
    $fechaComoEntero = strtotime($fecha);
    $Mes=date("m",$fechaComoEntero);
    $Dia=date("d",$fechaComoEntero);
    $Anio=date("Y",$fechaComoEntero);

// create new PDF document
// create new PDF document
$medidas = array(x_size,y_size);
$pdf = new TCPDF('P', 'mm', $medidas, true, 'UTF-8', false);
$pdf->startPageGroup();
$pdf->AddPage();
$pdf->Image('images/logoPortada.png',5, -1, 35, 20, 'PNG');
// set document information
$pdf->SetTitle('Ticket de venta');
$bloque2=<<<EOF
 <br>
  <br>
   <br>
<table style="font-size:10px; paddin:5px 10px;">
  <tr>
    <td style="font-family:fantasy; background-color: white;width: 350px">
        Fecha: $respuesta[fecha]<br> 
        Orden: $respuesta[id_venta]<br>
        <strong>Señor(es):</strong>$respuesta[razon_social]
        <strong> c.i:</strong> $respuesta[carnet]
      </td>
  </tr>

  <tr>
  <td style="font-family:fantasy; background-color: white;width: 200px;text-align: center;">
       DETALLE DE VENTA
      </td>
  </tr>
 </table>
EOF;
$pdf->writeHTML($bloque2,false,false,false,false,'');
$textypos=0;
$pdf->Cell(0,$textypos,'——————————————');
$bloque3=<<<EOF
<br>
   <br>
<table style="font-size: 10px; padding: 0px 0px; ">
  
       <tr>
       <td style="width: 20px;text-align: left;"><strong>Cod</strong></td>
       <td style="width: 30px;text-align: center;"><strong>Can</strong></td>
       <td style="width: 30px;text-align: left;"><strong>Des</strong></td>
       <td style="width: 30px;text-align: center;"><strong>Pre-u</strong></td>
       <td style="width: 30px;text-align: center;"><strong>desc</strong></td>
       <td style="width: 40px;text-align: center;"><strong>sub-tot</strong></td>
       </tr>
     </table>
     <br>
EOF;
$pdf->writeHTML($bloque3,false,false,false,false,'');
$suma=0;

foreach ($detalle as $key => $value) {
    $num=($key+1);
    //$subTotal=number_format($value['subtotal']);
    $precio=number_format($value['precio_venta']);
$bloque6=<<<EOF
   <table style="font-size: 10px; ">
       <tr>
       <td style="width: 350px;text-left: center">cod:$value[codigo] $value[cantidad] $value[nombre]  und: $value[undMedida]<br>pre-u: $value[precio_venta] des: $value[descuento] sub-tot:$value[subTotal]</td>
       <td style="text-align: left;width: 90px">  
        </td>
        <td style="width: 50px;text-align: center">$precio </td>
        <td style="width: 30px;text-align: center"> 0.00</td>
       </tr>
     </table>

EOF;
 $pdf->writeHTML($bloque6,false,false,false,false,'');
}
$textypos=0;
$pdf->Cell(0,$textypos,'——————————————');
$bloque7=<<<EOF
<br>
   <br>
 <table style="font-size: 10px;">
    <tr>
    <td style="width:350px;text-left: center">
    sub-tot:  $respuesta[subTotal] des:  $respuesta[descuento]
    
    neto:  $respuesta[monto_total]
    </td>
   </tr>
 </table>
 <br>
EOF;
$pdf->writeHTML($bloque7,false,false,false,false,'');
$textypos=0;
$pdf->Cell(0,$textypos,'Gracias por la compra. . .!');
//SALIDA DE CELDAS
$pdf->output('recibo.pdf');
}
}
// set document information
$factura=new imprimirFactura();
$factura->codigo=$_GET["codigo"];
$factura->traerImpresionFactura();