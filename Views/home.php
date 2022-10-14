<?php 
headerAdmin($data);
//getModal("modalBuscarProducto",$data);
date_default_timezone_set('America/La_Paz');
$fecha = date('Y-m');
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3 id="Nproductos">150</h3>

                <p>Número de productos</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="<?=base_url()?>/Productos/inventario" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3 id="Nclientes">53<sup style="font-size: 20px">%</sup></h3>

                <p>Número de clientes</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="<?=base_url()?>/clientes" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3 id="Nusuarios">44</h3>

                <p>Número de usuarios</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="<?=base_url()?>/usuarios" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3 id="Nproveedores">65</h3>

                <p>Número de proveedores</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="<?=base_url()?>/proveedores" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title"><strong>Productos con stock minimos</strong></h3>

                <div class="card-tools">
                  
                </div>
              </div>
              <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead class="btn-dark">
                <tr>
                  <th>CODIGO</th>
                  <th>IMG</th>
                  <th>NOMBRE</th>
                  <th>UND</th>
                  <th>MARCA</th>
                  <th>CATEGORIA</th>
                  <th>STOCK</th>
                  <th>PRECIO COMPRA</th>
                  <th>PRECIO VENTA</th>
                </tr>
                </thead>
                  <tbody>
                  </tbody>
              </table>
            </div>

            </div>
           <!-- solid sales graph -->
        <div class="card bg-gradient-info">
          <div class="card-header border-0">
            <h3 class="card-title">
              <i class="fas fa-th mr-1"></i>
              Grafica de ventas
            </h3>

            <div class="card-tools">
              <button type="button" class="btn btn-danger float-right" id="daterange-btn">
              <i class="far fa-calendar-alt"></i> Filtrar por fecha
              <i class="fas fa-caret-down"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <canvas class="chart" id="line-chart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
          </div>

          <!-- /.card-footer -->
        </div>
          <!-- BAR CHART -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Grafica de ventas vs compras</h3>

                <div class="card-tools">
                  
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- DONUT CHART -->
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Top productos que mas se venden</h3>

                <div class="card-tools">
                  
                </div>
              </div>
              <div class="card-body">
                <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>

            </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php 
 footerAdmin($data);
?>