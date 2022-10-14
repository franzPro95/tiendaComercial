<?php

require_once('tcpdf_include.php');

require_once('../../../../Models/Tdetalle.php');


class imprimirFactura
{

  public $codigo;
  public function traerImpresionFactura()
  {
    $idCompra=$this->codigo;
    $respuesta=Tdetalle::mdlSelectCompras($idCompra);
    $detalleCom=Tdetalle::mdlDetalleCom($idCompra);

    $montoTotal='Bs '.number_format($respuesta['monto_total'],2);
    $fecha=$respuesta['fecha'];
    $fechaComoEntero = strtotime($fecha);
    $Mes=date("m",$fechaComoEntero);
    $Dia=date("d",$fechaComoEntero);
    $Anio=date("Y",$fechaComoEntero);

// create new PDF document
$medidas = array(297, 210);
$pdf = new TCPDF('P', 'mm', $medidas, true, 'UTF-8', false);
$pdf->startPageGroup();
$pdf->AddPage();
$pdf->Image('images/logoPortada.png',5, -4, 70, 50, 'PNG');
$bloque1=<<<EOF
<table>
   <tr>
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
<br>
<br>
<br>
<br>
EOF;
$pdf->writeHTML($bloque1,false,false,false,false,'');
$bloque2=<<<EOF
 <table style="font-size:10px; paddin:5px 10px;">
  <tr>
    <td style="font-family:fantasy; background-color: white;width: 350px">
        <strong>Señor(es):</strong> $respuesta[nombre]
      </td>
  </tr>

  <tr>
  <td style="font-family:fantasy; background-color: white;width: 540px">
        <strong>Telefono:</strong> $respuesta[telefono]
      </td>
  </tr>
  <tr>
  <td style="font-family:fantasy; background-color: white;width: 540px">
        <strong>Direccion:</strong> $respuesta[direccion]
      </td>
  </tr>
  <tr>
  <td style="font-family:fantasy; background-color: white;width: 540px">
        <strong>Registro:</strong> $respuesta[UComp]
      </td>
  </tr>
 </table>
  <br>
   <br>
EOF;
$pdf->writeHTML($bloque2,false,false,false,false,'');
$bloque3=<<<EOF
<table style="font-size: 10px; padding: 5px 10px; ">
  
       <tr>
       <td style="border: 1px solid #666; background-color: #273746;color: #FFF;width: 50px;text-align: center; color:white"><strong>Cod</strong></td>
       <td style="border: 1px solid #666; color: white;width: 170px;text-align: center;background-color: #273746;color: #FFF"><strong>Descripcion</strong></td>
        <td style="border: 1px solid #666; color: white;width: 90px;text-align: center;background-color: #273746;color: #FFF"><strong>Espesor</strong></td>
        <td style="border: 1px solid #666; color: white;width: 50px;text-align: center;background-color: #273746;color: #FFF"><strong>Cant.</strong></td>
        <td style="border: 1px solid #666;color: white;width: 90px;text-align: center;background-color: #273746;color: #FFF"><strong>Precio/und</strong></td>
        <td style="border: 1px solid #666; color: white;width: 90px;text-align: center;background-color: #273746;color: #FFF"><strong>subtotal</strong></td>
       </tr>
     </table>
EOF;
$pdf->writeHTML($bloque3,false,false,false,false,'');
$suma=0;

foreach ($detalleCom as $key => $value) {
$precio='Bs '.number_format($value['precio_compra'],2);
$subtotal='Bs '.number_format($value['Subtotal'],2);
$bloque6=<<<EOF
   <table style="font-size: 10px; padding: 5px 10px;">
       <tr>
       <td style="border: 1px solid #666; background-color: white;width: 50px;text-align: center">$value[codigo] </td>
       <td style="border: 1px solid #666;text-align: center; background-color: white;width: 170px"> $value[nombre] 
        </td>
        <td style="border: 1px solid #666;text-align: center; background-color: white;width: 90px">  
        </td>
        <td style="border: 1px solid #666; background-color: white;width: 50px;text-align: center">$value[cantidad]  </td>
        <td style="border: 1px solid #666; background-color: white;width: 90px;text-align: center">$precio  </td>
        <td style="border: 1px solid #666; background-color: white;width: 90px;text-align: center">$subtotal </td>
       </tr>
     </table>

EOF;
 $pdf->writeHTML($bloque6,false,false,false,false,'');
 }
 $bloque7=<<<EOF
 <table style="font-size: 10px; padding: 5px 10px;">
    <tr>
    <td style="border_bottom:2px solid #666;color:#333; background-color: white;width: 360px;text-align: center"></td>
    <td style="border: 2px solid #666; background-color: white;width: 90px;text-align: center">Total:</td>
    <td style="border: 2px solid #666; background-color: white;width: 90px;text-align: center">$montoTotal </td>
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