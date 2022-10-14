<?php

require_once('tcpdf_include.php');

require_once('../../../../Models/ModelVentas.php');


class imprimirFactura
{
	public $codigo;
	public function traerImpresionFactura()
	{
		
		//traer la imformacion de la venta
    $idVenta=$this->codigo;

    $respuesta=ModelVentas::mdlSelectVentas($idVenta);
    $respoinse=ModelVentas::mdlSelectDetalle($idVenta);
    //print_r($respuesta);
    $subTotal=number_format( $respuesta['sub_total'],2).' Bs';
    $descuento=number_format( $respuesta['descuento'],2).' Bs';
    $total=	number_format( $respuesta['total_apagar'],2).' Bs';	
    //$objVentas=new VentasModel();
    //$listVentas= $objVentas->selectVentaDetalle($idVenta); 

// create new PDF document
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
        NIT:47456775
        <br>
        Direccion: Av. Esteban Arce Nro 1485 entre Esq. Quillacollo
      </div>
   	</td>
   	<td style="background-color: white; width: 140px">
   	<div style="font-size: 8.5px; text-align: right;line-height: 15px">
        <br>
        Telefono:75985771
        <br>
        LegionOnline20@Gmail.Com
        <br>
        LEGION Gamer Store
      </div>
   	</td>
   	<td style="background-color: white; width: 110px; text-align:center; color:red"><br><br>RECIBO No. $respuesta[codigo]<br></td>
   </tr>
   <tr>
   <td style="background-color: white; width: 450px"><h4><strong>LEGION Gamer Store</strong></h4></td>
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
        Razon social:$respuesta[razon_social]
      </td>
      <td style="border: 1px solid #666; background-color: white;width: 150px;text-align: right;">
      Fecha:$respuesta[fecha] 
        
      </td>
      
	</tr>

	<tr>
	<td style="border: 1px solid #666; background-color: white;width: 540px">
      	C.I/NIT:$respuesta[nit_ci] 
      </td>
	</tr>
	<tr>
       <td style="border-bottom: 1px solid #666;background-color: white;width: 540px"></td>
     </tr>
 </table>
EOF;
$pdf->writeHTML($bloque2,false,false,false,false,'');
$bloque3=<<<EOF
<table style="font-size: 10px; padding: 5px 10px; ">
       <tr>
       <td style="border: 1px solid #666; background-color:#626363;width: 45px;text-align: center; color:white"><strong>Nro</strong></td>
        <td style="border: 1px solid #666; color: white;width: 255px;text-align: center;background-color:#626363"><strong>Caracteristicas del Item</strong></td>
        <td style="border: 1px solid #666;color: white;width: 80px;text-align: center;background-color:#626363"><strong>Cantidad</strong></td>
        <td style="border: 1px solid #666; color: white;width: 80px;text-align: center;background-color:#626363"><strong>Precio UND</strong></td>
        <td style="border: 1px solid #666;color: white;width: 80px;text-align: center;background-color:#626363"><strong>Sub Total</strong></td>
       </tr>
     </table>
EOF;
$pdf->writeHTML($bloque3,false,false,false,false,'');
foreach ($respoinse as $key => $value) {
 $m=($key+1);
 $precio= number_format($value['precio'],2).' Bs';
 $sub_totla= number_format($value['sub_total'],2).' BS';
 $Producto= $value['descripcion'];
 $caracteristicas=$value['caracteristicas'];
 $resolucion=$value['resol_dimen'];

$bloque4=<<<EOF
	 <table style="font-size: 10px; padding: 5px 10px;">
       <tr>
       <td style="border: 1px solid #666; background-color: white;width: 45px;text-align: center">$m</td>
        <td style="border: 1px solid #666; background-color: white;width: 255px;text-align: left">$Producto 
        </td>
        <td style="border: 1px solid #666; background-color: white;width: 80px;text-align: center">$value[cantidad]</td>
        <td style="border: 1px solid #666; background-color: white;width: 80px;text-align: center">$precio</td>
        <td style="border: 1px solid #666; background-color: white;width: 80px;text-align: center">$sub_totla</td>
       </tr>
     </table>

EOF;
 $pdf->writeHTML($bloque4,false,false,false,false,'');
}
$bloque5=<<<EOF
 <table style="font-size: 10px; padding: 5px 10px;">
   <tr>
    <td style="color:#333; background-color: white;width: 340px;text-align: center"></td>
    <td style="border_bottom:1px solid #666; background-color: white;width: 100px;text-align: center"></td>
    <td style="border_bottom:1px solid #666;color:#333; background-color: white;width: 100px;text-align: center"></td>
   </tr>
   <tr>
   	<td style="border_bottom:1px solid #666;color:#333; background-color: white;width: 340px;text-align: center"></td>
   	<td style="border: 1px solid #666; background-color: white;width: 100px;text-align: center">Sub Total:</td>
   	<td style="border: 1px solid #666; background-color: white;width: 100px;text-align: center">$subTotal</td>
   </tr>
   <tr>
   	<td style="border_bottom:1px solid #666;color:#333; background-color: white;width: 340px;text-align: center"></td>
   	<td style="border: 1px solid #666; background-color: white;width: 100px;text-align: center">Descuento:</td>
   	<td style="border: 1px solid #666; background-color: white;width: 100px;text-align: center">$descuento</td>
   </tr>
    <tr>
   	<td style="border_bottom:1px solid #666;color:#333; background-color: white;width: 340px;text-align: center"></td>
   	<td style="border: 1px solid #666; background-color: white;width: 100px;text-align: center">Monto Total:</td>
   	<td style="border: 1px solid #666; background-color: white;width: 100px;text-align: center">$total</td>
   </tr>
 </table>
EOF;
$pdf->writeHTML($bloque5,false,false,false,false,'');
$bloque6=<<<EOF
<div style="text-align: center">
		<p>Si tienes alguna pregunta sobre tu compra <br>Pongase en contacto con nombre <br><strong>Garantia de 1 año</strong> </p>
		<h4>¡GRACIAS POR SU COMPRA!</h4>
		<table class="termina">
			<tbody>
				<tr>
					<td style="width: 100%;"></td>
				</tr>
			</tbody>
		</table>
	</div>
EOF;
$pdf->writeHTML($bloque6,false,false,false,false,'');
//SALIDA DE CELDAS
$pdf->output('factura.php');
}
}
// set document information
$factura=new imprimirFactura();
$factura->codigo=$_GET["codigo"];
$factura->traerImpresionFactura();