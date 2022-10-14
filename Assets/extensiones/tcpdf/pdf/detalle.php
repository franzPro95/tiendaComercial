<?php
require_once('tcpdf_include.php');
require_once "../../../controladores/pedidos.controlador.php";
require_once "../../../modelos/pedidos.modelo.php";
class ImprimirDetalle
{
	public $id;
	
	public function ctrTraerdetallesPedidos()
	{
		$valor=$this->id;
		//se trae al pedido 
		$respuesta=ControladoPedidos::ctrTraePedido($valor);
		$detalle=ControladoPedidos::ctrMostrarListarPedidoDetalles($valor);


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
   	<td style="background-color: white; width: 110px; text-align:center; color:red"><br><br>PEDIDO No.<br>$respuesta[codigo_pedido]<br></td>
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
EOF;
$pdf->writeHTML($bloque2,false,false,false,false,'');
$bloque3=<<<EOF
<table>
        <tr>
          <td style="width: 540px"><img src="images/back.jpg"></td>
        </tr>
  </table>
 <table style="font-size:10px; paddin:5px 10px;">
 	<tr>
 		<td style="border: 1px solid #666; background-color: white;width: 390px">
        Usuario:$respuesta[nombre]
      </td>
      <td style="border: 1px solid #666; background-color: white;width: 150px;text-align: right;">
      Fecha:$respuesta[fecha] 
        
      </td>
      
	</tr>

	<tr>
	<td style="border: 1px solid #666; background-color: white;width: 540px">
      	Proveedor:$respuesta[proveedor]  Direccion:$respuesta[direccion]   Telefono:$respuesta[telefono]
      </td>
	</tr>
	<tr>
       <td style="border-bottom: 1px solid #666;background-color: white;width: 540px"></td>
     </tr>
 </table>
EOF;
$pdf->writeHTML($bloque3,false,false,false,false,'');

$bloque4=<<<EOF
<table style="font-size: 10px; padding: 5px 10px;">
       <tr>
       <td style="border: 1px solid #666; background-color: white;width: 45px;text-align: center">Nro</td>
        <td style="border: 1px solid #666; background-color: white;width: 255px;text-align: center">Producto</td>
        <td style="border: 1px solid #666; background-color: white;width: 80px;text-align: center">Cantidad</td>
        <td style="border: 1px solid #666; background-color: white;width: 80px;text-align: center">Precio Und</td>
        <td style="border: 1px solid #666; background-color: white;width: 80px;text-align: center">Sub Total BS</td>
       </tr>
     </table>
EOF;
$pdf->writeHTML($bloque4,false,false,false,false,'');
foreach ($detalle as $key => $value) {
	$suma=($key+1);
$bloque5=<<<EOF
	 <table style="font-size: 10px; padding: 5px 10px;">
       <tr>
       <td style="border: 1px solid #666; background-color: white;width: 45px;text-align: center">$value[codigo]</td>
        <td style="border: 1px solid #666; background-color: white;width: 255px;text-align: left">$value[descripcion]</td>
        <td style="border: 1px solid #666; background-color: white;width: 80px;text-align: center">$value[cantidad]</td>
        <td style="border: 1px solid #666; background-color: white;width: 80px;text-align: center">$value[precio_compra]</td>
        <td style="border: 1px solid #666; background-color: white;width: 80px;text-align: center">$value[subtotal]</td>
       </tr>
     </table>

EOF;
 $pdf->writeHTML($bloque5,false,false,false,false,'');	
}

//SALIDA DE CELDAS
$pdf->output('detalle.php');	
}
}
$detalle=new ImprimirDetalle();
$detalle->id=$_GET["id"];
$detalle->ctrTraerdetallesPedidos();

