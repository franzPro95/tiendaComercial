<!-- /.modal -->
<div class="modal fade" id="modalCategorias" data-backdrop="static">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header btn-dark">
                <h4 class="modal-title" id="titleModal">Extra Large Modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formCategorias" name="formCategorias" role="form" method="post" enctype="multipart/form-data">
                    <input type="hidden" id="idCategoria" name="idCategoria">
                    <div class="form-group keyValid">
                        <div class="input-group">
                            <input class="form-control form-control-lg" id="txtNombrecategoria" name="txtNombrecategoria" type="text"
                                placeholder="Categoria" required="">
                        </div>

                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><span ></span>
                            Cancelar</button>
                        <button type="submit" id="btnActionForm" class="btn btn-dark"><span id="btnText">Guardar</span></button>
                    </div>

                </form>
            </div>
            
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->