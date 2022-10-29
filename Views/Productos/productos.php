<?php 
headerAdmin($data);
getModal("modalProductos",$data);
?>
<!-- Content Wrapper. Contains page content -->
  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title"><em><strong>Formula de Registro de Productos</strong></em></h3>
        <br>
        <div class="row col-sm-2">
          <button type="button" class="btn btn-block btn-dark btn-lg" onclick="modal();"><i class="fas fa-plus-circle"></i> Nuevo Producto</button>
        </div>
      </div>
      <div class="card-body">
        Start creating your amazing application!
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        Footer
      </div>
      <!-- /.card-footer-->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
<script src="<?=media() ?>/js/formulario_productos.js"></script>
<?php 
 footerAdmin($data);
?>