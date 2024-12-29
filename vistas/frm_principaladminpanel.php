<?php

// Activamos el almacenamiento en el buffer

ob_start();

session_start();

// Si la variable de session no existe

if (!isset($_SESSION['email_usuario'])) {

	header("Location: login.html");

} else {

	require_once "frm_headeradmin.php";

	if ($_SESSION['tipousuario'] == "ADMINISTRADOR") {



?>



<link rel="stylesheet" href="../public/estilos/principal.css">

		<!-- Content Wrapper -->

		<div class="content-wrapper">

			<!-- Content Header (Page header) -->

			<section class="content-header" id="contenedor_titulo">

				<div class="container-fluid">

					<div class="row mb-2">

						<div class="col-sm-12">

							<h1>Sistema de la notificación a la gestante - <b>NOTIGEST</b></h1>

						</div>

					</div>

				</div><!-- /.container-fluid -->

			</section>



			<!-- Main content -->

			<section class="content">

				<!-- Default box -->

				<div class="card">

					<div class="card-header">

						<h3 class="card-title">Bienvenido: <b id="nombre_estilo"><i class="fa fa-user"></i> <?php echo $_SESSION["tipousuario"]; ?></b></h3>

					</div>

					<div class="card-body">

						<div class="col-12">

							<section class="content">

								<div class="container-fluid">

									<div class="row">

										<img src="../public/imagenes/logo.png" class="round mx-auto d-block" alt="Responsive image" id="imagen">

									</div>

									<div class="row" style="text-align: center;">

										<h5>Sistema de la <b id="dis_estilo">Estrategia Sanitaria Salud Sexual y Reproductiva</b> - Dirección Regional de Salud Puno</h5>

									</div>

								</div>

							</section>

						</div>

					</div>

					<!-- /.card-body -->

				</div>

				<!-- /.card -->

			</section>

			<section class="content">

				<div class="container-fluid px-4">

					<h1 class="mt-4">Dashboard</h1>

					<ol class="breadcrumb mb-4">

						<li class="breadcrumb-item active">TABLERO INFORMATIVO</li>

					</ol>

					<div class="row">

						<div class="col-xl-2 col-md-6 text-center">

							<div class="card bg-primary text-white mb-4">

								<div class="card-body fs-5">TOTAL REGISTRO POR AÑO</div>

								<div class="ms-3 fs-3" id="totalRegistro"></div>

								<div class="card-footer d-flex align-items-center justify-content-between">

									<!-- <a class="small text-white stretched-link" href="#">View Details</a> -->

									<!-- <div class="small text-white"><i class="fas fa-angle-right"></i></div> -->

								</div>

							</div>

						</div>

						<div class="col-xl-2 col-md-6">

							<div class="card bg-warning text-white mb-4 text-center">

								<div class="card-body fs-5">TOTAL GESTANTE EN EL MES</div>

								<div class="ms-3 fs-3" id="totalRegistromes"></div>

								<div class="card-footer d-flex align-items-center justify-content-between">

									<!-- <a class="small text-white stretched-link" href="#">View Details</a> -->

									<!-- <div class="small text-white"><i class="fas fa-angle-right"></i></div> -->

								</div>

							</div>

						</div>

						<div class="col-xl-2 col-md-6">

							<div class="card bg-success text-white mb-4 text-center">

								<div class="card-body fs-5">TOTAL REGISTRO POR DIA</div>

								<div class="ms-3 fs-3" id="totalRegistrodia"></div>

								<div class="card-footer d-flex align-items-center justify-content-between">

									<!-- <a class="small text-white stretched-link" href="#">View Details</a> -->

									<!-- <div class="small text-white"><i class="fas fa-angle-right"></i></div> -->

								</div>

							</div>

						</div>

						<div class="col-xl-2 col-md-6">

							<div class="card bg-danger text-white mb-4 text-center">

								<div class="card-body fs-5">FECHA PROBABLE PARTO</div>

								<div class="ms-3 fs-3" id="totalRegistroParto"></div>

								<div class="card-footer d-flex align-items-center justify-content-between">

									<!-- <a class="small text-white stretched-link" href="#">View Details</a> -->

									<!-- <div class="small text-white"><i class="fas fa-angle-right"></i></div> -->

								</div>

							</div>

						</div>

						<div class="col-xl-2 col-md-6">

							<div class="card bg-success text-white mb-4 text-center">

								<div class="card-body fs-5">TOTAL TERMINO GESTACION</div>

								<div class="ms-3 fs-3" id="TotalTermino"></div>

								<div class="card-footer d-flex align-items-center justify-content-between">

									<!-- <a class="small text-white stretched-link" href="#">View Details</a> -->

									<!-- <div class="small text-white"><i class="fas fa-angle-right"></i></div> -->

								</div>

							</div>

						</div>

						<div class="col-xl-2 col-md-6">

							<div class="card bg-danger text-white mb-4 text-center">

								<div class="card-body fs-5">TOTAL ABORTOS POR AÑO</div>

								<div class="ms-3 fs-3" id="totalRegistroAborto"></div>

								<div class="card-footer d-flex align-items-center justify-content-between">

									<!-- <a class="small text-white stretched-link" href="#">View Details</a> -->

									<!-- <div class="small text-white"><i class="fas fa-angle-right"></i></div> -->

								</div>

							</div>

						</div>

	

					</div>

					<div class="row">

						<div class="col-xl-4">

							<div class="card mb-4">

								<div class="card-header">

									<i class="fas fa-chart-area me-1"></i>

									Reporte Total de Gestantes por año actual

								</div>

								<div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>

							</div>

						</div>

						<div class="col-xl-4">

							<div class="card mb-4">

								<div class="card-header">

									<i class="fas fa-chart-bar me-1"></i>

									Reporte Total de Gestantes por Mes

								</div>

								<div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>

							</div>

						</div>

						<div class="col-xl-4">

							<div class="card mb-4">

								<div class="card-header">

									<i class="fas fa-chart-bar me-1"></i>

									Reporte Total Lugar de Parto

								</div>

								<div class="card-body"><canvas id="myBarChartLugarParto" width="100%" height="40"></canvas></div>

							</div>

						</div>

					</div>

					<div class="card mb-4">

						<div class="card-header">

							<i class="fas fa-table me-1"></i>

							REPORTE NOMINAL GESTANTE CON FECHA PROBABLE DE PARTO EN EL MES ACTUAL.

						</div>

						<div class="card-body border-2">

							<table id="tblistado" class="table table-danger table-hover  table table-bordered">

								<thead>

									<tr>

										<th style="width: 3%;">Red</th>

										<th style="width: 3%;">Microred</th>

										<th style="width: 3%;">Ipress</th>

										<th style="width: 3%;">Documento</th>

										<th style="width: 3%;">Apellidos y Nombres</th>

										<th style="width: 3%;">Edad</th>

										<th style="width: 3%;">Eg Actual</th>

										<th style="width: 3%;">Nro Celular</th>

										<th style="width: 3%;">Fecha Probable de Parto</th>

										<th style="width: 3%;">Fecha Termino</th>

										<th style="width: 3%;">Desc Termino</th>

										<th style="width: 3%;">Desc Riesgo</th>

										<th style="width: 3%;">Desc Lugar Termino</th>

									</tr>

								</thead>

								<tbody>

								</tbody>

							</table>

						</div>

					</div>

				</div>

			</section>

			<!-- /.content -->

		</div>





	<?php



	} else {

		require "frm_accesodenegado.php";

	}

	require_once "frm_footeradmin.php";

	?>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>

		<script src="../public/assets/demo/chart-area-demo.js"></script>

		<script src="../public/assets/demo/chart-bar-demo.js"></script>

		<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>

		

		<script type="text/javascript" src="scripts/panelAdmin.js"></script>

		<!-- <script type="text/javascript" src="scripts/panel.js"></script> -->

<?php

}

ob_end_flush();

?>