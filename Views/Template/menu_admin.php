<?php
$data=$_SESSION['userData']; 
 ?>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url(); ?>/home" class="brand-link">
        <img src="<?=media(); ?>dist/img/logoPortada.png" alt="Logonav"
            class="brand-image img-circle elevation-3" width="100%" style="opacity: .8">
        <span class="brand-text font-weight-light">Mini<small>MARKET-Duff</small></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?=media(); ?>images/uploads/<?=$data['foto'];?>"  class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?=$data['nombre'];?></a>
            </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
             <?php 
             if ($data['rol']!="VENDEDOR" && $data['rol']!="ALMACENERO") {
              ?>
              <?php if ($data['rol']!="COMPRADOR") {
               ?>
                <li class="nav-item">
                    <a href="<?= base_url(); ?>/home" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            INICIO
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user-tag"></i>
                        <p>
                            USUARIOS
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <?php if ($data['rol']=='ADMINISTRADOR') {
                        ?>
                        <li class="nav-item">
                            <a href="<?= base_url(); ?>/usuarios/roles" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Roles</p>
                            </a>
                        </li>
                        <?php 
                        } ?>
                        <li class="nav-item">
                            <a href="<?= base_url(); ?>/usuarios" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Crear Usuarios</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <?php } ?>
                <li class="nav-item">
                    <a href="<?= base_url(); ?>/proveedores" class="nav-link">
                        <i class="nav-icon fas fa-truck"></i>
                        <p>PROVEEDORES</p>
                    </a>
                </li>
                <?php 
                }
                 ?>
                 <?php 
                    if ($data['rol']!="ALMACENERO" && $data['rol']!="COMPRADOR") {
                    ?>
                <li class="nav-item">
                    <a href="<?= base_url(); ?>/clientes" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>CLIENTES</p>
                    </a>
                </li>
                <?php 
                }
                ?>
                
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-box-open"></i>
                        <p>
                            PRODUCTOS
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <?php 
                        if ($data['rol']!="VENDEDOR"&&$data['rol']!="COMPRADOR") {
                        ?>
                        <li class="nav-item">
                            <a href="<?= base_url(); ?>/productos/categorias" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Categorias</p>
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a href="<?= base_url(); ?>/productos/marcas" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Marcas</p>
                            </a>
                        </li>
                        <?php 
                        }
                        ?>
                        <li class="nav-item">
                            <a href="<?= base_url(); ?>/productos/inventario" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Inventario</p>
                            </a>
                        </li>
                        <?php 
                        if ($data['rol']!="COMPRADOR"&&$data['rol']!="VENDEDOR"&&$data['rol']!="ALMACENERO") {
                        ?>
                        <li class="nav-item">
                            <a href="<?= base_url(); ?>/productos/combos" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Combos</p>
                            </a>
                        </li>
                        <?php 
                        }
                        ?>
                        <?php 
                        if ($data['rol']!="COMPRADOR") {
                        ?>
                        <li class="nav-item">
                            <a href="<?= base_url(); ?>/productos/reporteCombos" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Reporte Combos</p>
                            </a>
                        </li>
                        <?php 
                        if ($data['rol']!="ALMACENERO" &&$data['rol']!="VENDEDOR") {
                        ?>
                        <li class="nav-item">
                            <a href="<?= base_url(); ?>/productos/detalleCombox" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Detalle de combos</p>
                            </a>
                        </li>
                        <?php 
                        }
                        ?>
                        <?php 
                        }
                        ?>
                    </ul>
                </li>
                 <?php 
                if ($data['rol']!="VENDEDOR"&&$data['rol']!="ALMACENERO") {
                ?>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-balance-scale-left"></i>
                        <p>
                            COMPRAS
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url(); ?>/compras" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Orden de compra</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url(); ?>/compras/registroCompras" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Reporte de compras</p>
                            </a>
                        </li>
                        <?php 
                        if ($data['rol']!="COMPRADOR") {
                        ?>
                        <li class="nav-item">
                            <a href="<?= base_url(); ?>/compras/detalleCompras" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Detalle de compras</p>
                            </a>
                        </li>
                        <?php 
                        }
                        ?>
                    </ul>
                </li>
                <?php 
                }
                ?>
                <?php 
                if ($data['rol']!="COMPRADOR"&&$data['rol']!="ALMACENERO") {
                ?>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <p>
                            VENTAS
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url(); ?>/ventas/ventascon" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Orden de venta</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url(); ?>/productos/combosDisponibles" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Combos disponibles</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url(); ?>/registroventas/registroventascon" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Reporte de ventas</p>
                            </a>
                        </li>
                        <?php 
                        if ($data['rol']!="VENDEDOR") {
                        ?>
                        <li class="nav-item">
                            <a href="<?= base_url(); ?>/registroventas/detalleVentas" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Detalle de ventas</p>
                            </a>
                        </li>
                        <?php 
                        }
                        ?>
                    </ul>
                </li>
                <?php 
                }
                ?>
                <?php 
                if ($data['rol']!="COMPRADOR"&&$data['rol']!="ALMACENERO"&&$data['rol']!="VENDEDOR") {
                ?>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-hand-holding-usd"></i>
                        <p>
                            GASTOS
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url(); ?>/gastos/categoriaGastos" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Categorias de gastos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url(); ?>/gastos" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Gastos</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <?php 
                }
                ?>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>