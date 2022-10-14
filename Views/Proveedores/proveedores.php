<?php 
headerAdmin($data);
//getModal("modalBuscarProducto",$data);
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
        <h3 class="card-title">Title</h3>
      </div>
      <div class="card-body">
        <form>
          <div class="row col-md-12">
            <div class="card-body  col-md-3">
              <div class="form-group">
                <label for="txtNombre">Nombre</label>
                <input type="text" class="form-control" id="txtNombre" placeholder="Ingrese Nombre">
              </div> 
            </div>
            <div class="card-body  col-md-3">
              <div class="form-group">
                <label for="Teléfono">Teléfono</label>
                <input type="text" class="form-control" id="Teléfono" placeholder="Ingrese Teléfono">
              </div> 
            </div>
            <div class="card-body  col-md-3">
              <div class="form-group">
                <label>Dirección </label>
                <textarea class="form-control" rows="3" placeholder="Igrese la dirección..."></textarea>
              </div> 
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
              <button type="submit" class="btn btn-primary pull-right">AGREGAR</button>
          </div>
        </form>
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
<?php 
 footerAdmin($data);
?>