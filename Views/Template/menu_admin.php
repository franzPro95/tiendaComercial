<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
<!-- Brand Logo -->
<a href="<?=media() ?>/index3.html" class="brand-link">
  <img src="<?=media() ?>/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
  <span class="brand-text font-weight-light">AdminLTE 3</span>
</a>

<!-- Sidebar -->
<div class="sidebar">
  <!-- Sidebar user (optional) -->
  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
      <img src="<?=media() ?>/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
    </div>
    <div class="info">
      <a href="#" class="d-block">Alexander Pierce</a>
    </div>
  </div>
  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
      with font-awesome or any other icon font library -->
      <li class="nav-item">
        <a href="<?=base_url()?>/Proveedores" class="nav-link">
          <i class="nav-icon far fa-image"></i>
          <p>
            <em>PROVEEDORES</em>
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?=base_url()?>/Clientes" class="nav-link">
          <i class="nav-icon far fa-image"></i>
          <p>
            <em>CLIENTES</em>
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?=base_url()?>/Clientes" class="nav-link">
          <i class="nav-icon far fa-image"></i>
          <p>
            <em>USUARIOS</em>
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            <em>PRODUCTOS</em>
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="<?=base_url()?>/Categorias" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p><em>Categorias</em></p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url()?>/Productos" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p><em>Productos</em></p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=media() ?>/index3.html" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Compras</p>
            </a>
          </li>
        </ul>
      </li>
    </ul>
  </nav>
  <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>