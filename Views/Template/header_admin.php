<?php
$user=$_SESSION['userData']; 
date_default_timezone_set('America/La_Paz');
 $fecha = date('H:m:s');
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?=$data['page_tag']; ?></title>
<!--aumentado css personalizado -->
<link rel="stylesheet" href="<?=media();?>/css/css/style.css">
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="<?=media();?>plugins/fontawesome-free/css/all.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="<?=media();?>dist/css/adminlte.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?=media();?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
<!-- DataTables -->
<link rel="stylesheet" href="<?=media();?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?=media();?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="<?=media();?>plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="<?=media();?>plugins/daterangepicker/daterangepicker.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?=media();?>plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?=media();?>plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Auto completo -->
  <link rel="stylesheet" href="<?=media();?>/autocomplete/css/jquery-ui.css">
</head>
<body class="hold-transition sidebar-mini">
  <!--loading-->
  <div id="divLoading" >
    <div>
      <img src="<?= media(); ?>/images/loang.svg" alt="Loading">
    </div>
  </div>
<!-- Site wrapper -->
<div class="wrapper">
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light btn-dark" style="background-color: #273746;">

  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars" style="color: white;"></i></a>
    </li>
  </ul>
  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Navbar Search -->
   <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas fas fa-sign-out-alt" style="color: white;"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  <?=$user['nombre'];?>
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm"></p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i><?=$fecha;?></p>
                <p class="text-sm text-muted">Fecha y Hora de Ingreso <i class=""></i><?=$user['fecha_regestro']?></p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="<?= base_url(); ?>/logout" class="dropdown-item dropdown-footer btn-danger" style='background-color: #273746;color: white;'>Cerrar</a>
        </div>
      </li>
  </ul>
</nav>
<!-- /.navbar -->
<?php require_once "menu_admin.php"; ?>