<?php

require_once('tcpdf_include.php');
require_once "../../../controladores/ventas.controlador.php";
require_once "../../../modelos/ventas.modelo.php";
require_once "../../../controladores/clientes.controlador.php";
require_once "../../../modelos/clientes.modelo.php";
require_once "../../../controladores/usuarios.controlador.php";
require_once "../../../modelos/usuarios.modelo.php";
require_once "../../../controladores/productos.controlador.php";
require_once "../../../modelos/productos.modelo.php";
/**
 * 
 */
class imprimirFactura
{
	public $codigo;
	public function traerImpresionFactura()
	{
		//traer la imformacion de la venta
		$itemVenta="codigo";
		$valorVenta=$this->codigo;
		$respuesta=ControladorVentas::ctrMostrarVentas($itemVenta,$valorVenta);
		$fecha=substr($respuesta["fecha"],0,-8);
		$productos=json_decode($respuesta["productos"],true);
		$neto=number_format($respuesta["neto"],2);
		$impuesto=number_format($respuesta["impuesto"],2);
		$total=number_format($respuesta["total"],2);
		//traemos al cliente
		$itemCliente="id";
		$valoCliente=$respuesta["id_cliente"];
		$respuestaCliente=ControladorClientes::ctrMostrarClientes($itemCliente,$valoCliente);
		//tremos la informacion del vendedor
		$itemVendedor="id";
		$valorVendedor=$respuesta["id_vendedor"];
		$respuestaVendedor=ControladorUsuarios::ctrMostrarUsuarios($itemVendedor,$valorVendedor);
	

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
   	<td style="background-color: white; width: 110px; text-align:center; color:red"><br><br>FACTURA No.<br>$valorVenta</td>
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
        Cliente:$respuestaCliente[nombre]
      </td>
      <td style="border: 1px solid #666; background-color: white;width: 150px;text-align: right;">
      Fecha: $fecha
        
      </td>
      
	</tr>

	<tr>
	<td style="border: 1px solid #666; background-color: white;width: 540px">
      	Vendedor:$respuestaVendedor[nombre]
      </td>
	</tr>
	<tr>
       <td style="border-bottom: 1px solid #666;background-color: white;width: 540px"></td>
     </tr>
 </table>
EOF;
$pdf->writeHTML($bloque2,false,false,false,false,'');
$bloque3=<<<EOF
<table style="font-size: 10px; padding: 5px 10px;">
       <tr>
       <td style="border: 1px solid #666; background-color: white;width: 45px;text-align: center">Nro</td>
        <td style="border: 1px solid #666; background-color: white;width: 255px;text-align: center">Producto</td>
        <td style="border: 1px solid #666; background-color: white;width: 80px;text-align: center">Cantidad</td>
        <td style="border: 1px solid #666; background-color: white;width: 80px;text-align: center">Valor UND Bs</td>
        <td style="border: 1px solid #666; background-color: white;width: 80px;text-align: center">Sub Total BS</td>
       </tr>
     </table>
EOF;
$pdf->writeHTML($bloque3,false,false,false,false,'');
foreach ($productos as $key => $value) {
	$itemPro="descripcion";
	$valorPro=$value["descripcion"];
	$orden=null;
	$suma=($key+1);
	$respuestaProducto=ControladorProductos::ctrMostrarProductos($itemPro,$valorPro,$orden);
	$valorUnitario=number_format($respuestaProducto["precio_venta"],2);
	$precioTotal=number_format($value["total"],2);
$bloque4=<<<EOF
	 <table style="font-size: 10px; padding: 5px 10px;">
       <tr>
       <td style="border: 1px solid #666; background-color: white;width: 45px;text-align: center">$suma</td>
        <td style="border: 1px solid #666; background-color: white;width: 255px;text-align: left">$value[descripcion]</td>
        <td style="border: 1px solid #666; background-color: white;width: 80px;text-align: center">$value[cantidad]</td>
        <td style="border: 1px solid #666; background-color: white;width: 80px;text-align: center">$valorUnitario</td>
        <td style="border: 1px solid #666; background-color: white;width: 80px;text-align: center">$precioTotal</td>
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
   	<td style="border: 1px solid #666; background-color: white;width: 100px;text-align: center">Neto:</td>
   	<td style="border: 1px solid #666; background-color: white;width: 100px;text-align: center">$neto</td>
   </tr>
   <tr>
   	<td style="border_bottom:1px solid #666;color:#333; background-color: white;width: 340px;text-align: center"></td>
   	<td style="border: 1px solid #666; background-color: white;width: 100px;text-align: center">Impuesto:</td>
   	<td style="border: 1px solid #666; background-color: white;width: 100px;text-align: center">$impuesto</td>
   </tr>
    <tr>
   	<td style="border_bottom:1px solid #666;color:#333; background-color: white;width: 340px;text-align: center"></td>
   	<td style="border: 1px solid #666; background-color: white;width: 100px;text-align: center">Monto Total:</td>
   	<td style="border: 1px solid #666; background-color: white;width: 100px;text-align: center">$total</td>
   </tr>
 </table>
EOF;
$pdf->writeHTML($bloque5,false,false,false,false,'');
//SALIDA DE CELDAS
$pdf->output('factura.php');
}
}
// set document information
$factura=new imprimirFactura();
$factura->codigo=$_GET["codigo"];
$factura->traerImpresionFactura();