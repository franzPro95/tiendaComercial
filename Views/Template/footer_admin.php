<?php
date_default_timezone_set('America/La_Paz');
 $fecha = date('Y-m-d'); 
 ?>
<footer class="main-footer">
  <div class="float-right d-none d-sm-block">
    <b>Version</b> 0.01
  </div>
  <strong id="destrac"> <a href="#"></a>.</strong> 
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<script>
  const base_url="<?=base_url()?>";
</script>
<!-- jQuery -->
<script src="<?=media();?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=media();?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=media();?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=media();?>dist/js/demo.js"></script>
<script src="<?=media();?>plugins/alert-swalt/sweetalert2.all.min.js"></script>
<!-- InputMask -->
<script src="<?=media();?>plugins/moment/moment.min.js"></script>
<script src="<?=media();?>plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="<?=media();?>plugins/daterangepicker/daterangepicker.js"></script>
<script src="<?=media();?>js/numeral.min.js"></script>
<!-- ChartJS -->
<script src="<?=media();?>plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?=media();?>plugins/sparklines/sparkline.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?=media();?>plugins/jquery-knob/jquery.knob.min.js"></script>
<script src="<?=media();?>js/funtions_encript.min.js"></script>
<!-- Auto completo -->
<script src="<?=media();?>/autocomplete/js/jquery-ui.js"></script>
<!--Select2 -->
<script src="<?=media();?>plugins/select2/js/select2.full.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?=media();?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=media();?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?=media();?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?=media();?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?=media();?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?=media();?>plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?=media();?>plugins/jszip/jszip.min.js"></script>
<script src="<?=media();?>plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?=media();?>plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?=media();?>plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?=media();?>plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?=media();?>plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<?php
if ($data['page_name']=='usuarios') {
 ?>
 <script src="<?=media();?>js/funtions_usuarios.js"></script>
 <?php 
}  ?>
<?php
if ($data['page_name']=='roles') {
 ?>
 <script src="<?=media();?>js/funcions_roles.js"></script>
 <?php 
}  ?>
<?php
if ($data['page_name']=='proveedores') {
 ?>
 <script src="<?=media();?>js/funcions_proveedores.js"></script>
 <?php 
}  ?>
<?php
if ($data['page_name']=='clientes') {
 ?>
 <script src="<?=media();?>js/funcions_clientes.js"></script>
 <?php 
}  ?>
<?php
if ($data['page_name']=='registroventascon') {
 ?>
 <script src="<?=media();?>js/funcions_registroventascon.js"></script>
 <?php 
}  ?>
<?php
if ($data['page_name']=='detalleCompras') {
 ?>
 <script src="<?=media();?>js/funcions_detalleCompras.js"></script>
 <?php 
}  ?>
<?php
if ($data['page_name']=='gastos') {
 ?>
 <script src="<?=media();?>js/funcions_gastos.js"></script>
 <?php 
}  ?>
<?php
if ($data['page_name']=='compras') {
 ?>
 <script src="<?=media();?>js/funcions_compras.js"></script>
 <?php 
} 
if ($data['page_name']=='categorias') {
?>
<script src="<?=media();?>js/funtions_categorias.js"></script>
<?php 
} 
if ($data['page_name']=='inventario') {
  // code...
?>
<script src="<?=media();?>js/funcions_productos.js"></script>
<?php 
} 
if ($data['page_name']=='ventascon') {?>
  <script src="<?=media();?>js/funtions_venta_cont.js"></script>
<?php 
} 
if ($data['page_name']=='registroCompras') {
?>
<script src="<?=media();?>js/funtions_regCompras.js"></script>
<?php 
}
if ($data['page_name']=='categoriaGastos') {
?>
<script src="<?=media();?>js/funtions_gastosCat.js"></script>
<?php 
}
if ($data['page_name']=='detalleVentas') {
?>
<script src="<?=media();?>js/funtions_detalleVentas.js"></script>
<?php 
}
if ($data['page_name']=='editarVentaCon') {
?>
<script src="<?=media();?>js/funtions_editavc.js"></script>
<?php 
} 
if ($data['page_name']=='editarCompra') {
?>
<script src="<?=media();?>js/funcions_editcom.js"></script>
<?php 
} 
if ($data['page_name']=='pagos') {
?>
<script src="<?=media();?>js/funtions_pagos.js"></script>
<?php 
} if ($data['page_name']=='regPagos') {
?>
<script src="<?=media();?>js/funcions_regPagos.js"></script>
<?php 
} 
if ($data['page_name']=='edithPagoCuotas') {?>
<script src="<?=media();?>js/funcions_editPagos.js"></script>
<?php 
} 
if ($data['page_name']=='licCreditoPagados') {
?>
<script src="<?=media();?>js/funtions_licredithpagos.js"></script>
<?php 
}
if ($data['page_name']=='licCreditos') {
?>
<script src="<?=media();?>js/funcions_liccredito.js"></script>
<?php 
}
if ($data['page_name']=='licCreditosAnulados') {
?>
<script src="<?=media();?>js/funtions_licreditanulados.js"></script>
<?php 
}
if ($data['page_name']=='home') {
?>
<script src="<?=media();?>js/funtions_home.js"></script>
<?php 
} 
if ($data['page_name']=='clienteCreditos') {
  // code...
?>
<script src="<?=media();?>js/funtions_clientesCredith.js"></script>
<?php 
}
if ($data['page_name']=='movimientos') {
?>
<script src="<?=media();?>js/funtions_movimientos.js"></script>
<?php 
} if ($data['page_name']=='reporteContado') {
  // code...
?>
<script src="<?=media();?>js/funtions_productoContado.js"></script>

<?php 
}
?>
<?php 
if ($data['page_name']=='marcas') {
?>
<script src="<?=media();?>js/funtions_marcas.js"></script>
<?php 
} ?>
<?php 
if ($data['page_name']=='combos') {
?>
<script src="<?=media();?>js/funtions_combos.js"></script>
<?php 
} ?>
<?php 
if ($data['page_name']=='detalleCombox') {
?>
<script src="<?=media();?>js/funtions_reportDetalleCombox.js"></script>
<?php 
} ?>
<?php 
if ($data['page_name']=='reporteCombos') {
?>
<script src="<?=media();?>js/funtions_reporcombos.js"></script>
<?php 
} ?>
<?php 
if ($data['page_name']=='combosDisponibles') {
?>
<script src="<?=media();?>js/funtions_combosdiponibles.js"></script>
<?php 
} ?>
<!-- bootstrap color picker -->
<script src="<?=media();?>plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
</body>
</html>
