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
        <h3 class="card-title"><em><strong>Formulario de registro de Clientes</strong></em></h3>
      </div>
      <div class="card-body card-footer">
        <form action="" class="formulario" id="formulario">
      <!-- Grupo: nombre -->
          <div class="formulario__grupo" id="grupo__nombre">
            <label for="nombre" class="formulario__label"><em>Razon social (requerido)</em></label>
            <div class="formulario__grupo-input">
              <input type="text" class="form-control formulario__input" name="nombre" id="nombre" placeholder="Nombre del Cliente">
              <i class="formulario__validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario__input-error">Formato de nombre incorrecto</p>
          </div>
          <!-- Grupo: Teléfono -->
          <div class="formulario__grupo" id="grupo__numDocumento">
            <label for="numDocumento" class="formulario__label"><em>Número de CI|NIT (requerido)</em></label>
            <div class="formulario__grupo-input">
              <input type="text" class="formulario__input form-control" name="numDocumento" id="numDocumento" placeholder="75985771">
              <i class="formulario__validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario__input-error">Formato de Número incorrecto</p>
          </div>
          <div class="formulario__grupo" id="grupo__tipoDocum">
            <label for="tipoDocum" class="formulario__label"><em>Tipo de Documento (requerido)</em></label>
            <div class="formulario__grupo-input">
              <select name="tipoDocumento" id="tipoDocumento" class=" formulario__input form-control">
                <option value="">Seleccione opcion</option>
                <option value="CI">CI</option>
                <option value="NIT">NIT</option>
              </select>
              <i class="formulario__validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario__input-error">Formato de la tipoDocum incorrecto</p>
          </div>
          <div class="formulario__grupo" id="grupo__telefono">
            <label for="telefono" class="formulario__label"><em>Teléfono </em></label>
            <div class="formulario__grupo-input">
              <input type="text" class="form-control formulario__input" name="telefono" id="telefono" placeholder="Teléfono">
              <i class="formulario__validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario__input-error">Formato de la direccion incorrecto</p>
          </div>
          <div class="formulario__grupo" id="grupo__direccion">
            <label for="direccion" class="formulario__label"><em>Dirección </em></label>
            <div class="formulario__grupo-input">
              <input type="text" class="form-control formulario__input" name="direccion" id="direccion" placeholder="Dirección">
              <i class="formulario__validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario__input-error">Formato de la direccion incorrecto</p>
          </div>
          <div class="formulario__mensaje" id="formulario__mensaje">
            <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena lo campos obligatorios. </p>
          </div>
          <div class="formulario__grupo formulario__grupo-btn-enviar">
            <button type="submit" class="formulario__btn"><em>Agregar</em></button>
            <p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Formulario enviado exitosamente!</p>
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
<script src="<?=media() ?>/js/formulario_cliente.js"></script>
<?php 
 footerAdmin($data);
?>