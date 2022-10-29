function modal(){
 document.querySelector('#idCategoria').value="";
  document.querySelector('.modal-header').classList.replace('headerUpdate','headerRegister');
  document.querySelector('#btnActionForm').classList.replace('btn-info','btn-primary');
  document.querySelector('#btnText').innerHTML="Guardar";
  document.querySelector('#titleModal').innerHTML='<i class="fas fa-user-plus"></i>'+"  Crear Nuevo Categoria";
  document.querySelector('#formCategorias').reset();
  $('#modalCategorias').modal('show');
}