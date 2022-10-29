<!-- /.modal -->
<div class="modal fade" id="modalProductos" data-backdrop="static">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header btn-dark">
                <h4 class="modal-title" id="titleModal">Extra Large Modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formProductos" name="formProductos" role="form" method="post" enctype="multipart/form-data">
                    <div class="row col-md-12">
                        <div class="col-md-6">
                            <label for="">Categoria</label>
                            <select class="form-control form-control-lg" name="" id="">
                                <option value="">re</option>
                                <option value="">re</option>
                                <option value="">re</option>
                            </select>
                            <p class="text-center notblock">campo requerido</p>
                        </div>
                        <div class="col-md-6">
                            <label for="">Serie S/N</label>
                            <input class="form-control form-control-lg" type="text">
                            <p class="text-center notblock">campo requerido</p>
                        </div>
                        <div class="col-md-6">
                            <label for="">Detalle</label>
                            <input class="form-control form-control-lg" type="text">
                            <p class="text-center notblock">campo requerido</p>
                        </div>
                        <div class="col-md-6">
                            <label for="">Modelo</label>
                            <input class="form-control form-control-lg" type="text">
                            <p class="text-center notblock">campo requerido</p>
                        </div>
                        <div class="col-md-6">
                            <label for="">Stock Minimo</label>
                            <input class="form-control form-control-lg" type="number" min="1" value="0" required="">
                            <p class="text-center notblock">campo requerido</p>
                        </div>
                        <div class="col-md-6">
                            <label for="">img</label>
                            <input class="form-control form-control-lg" type="file">
                            <p class="text-center notblock">campo requerido</p>
                        </div>
                    </div>
                    <br>
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