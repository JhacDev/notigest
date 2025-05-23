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

										<h5><b id="dis_estilo">Estrategia Sanitaria Regional Salud Sexual y Reproductiva</b>

										        <!--<b id="dis_estilo"> Dirección Regional de Salud Puno </b>-->

										</h5>

									</div>

								</div>

							</section>



						</div>

					</div>

					<!-- /.card-body -->

				</div>

				<!-- /.card -->

				<section class="content">

								<div class="row text-center">

									<div class="col-xl-3 col-md-6">

										<div class="card bg-primary text-white mb-4">

											<div class="card-body fs-5">Total de Usuarios</div>

											<div class="ms-3 fs-4" id="totalUser" ></div>

											<div class="card-footer d-flex align-items-center justify-content-between">

												<!-- <a class="small text-white stretched-link" href="#">View Details</a> -->

												<!-- <div class="small text-white"><i class="fas fa-angle-right"></i></div> -->

											</div>

										</div>

									</div>

									<div class="col-xl-3 col-md-6">

										<div class="card bg-warning text-white mb-4">

											<div class="card-body fs-5">Total de Administradores</div>

											<div class="ms-3 fs-4" id="totalAdmin"></div>

											<div class="card-footer d-flex align-items-center justify-content-between">

												<!-- <a class="small text-white stretched-link" href="#">View Details</a> -->

												<!-- <div class="small text-white"><i class="fas fa-angle-right"></i></div> -->

											</div>

										</div>

									</div>

									<div class="col-xl-3 col-md-6">

									<div class="card bg-success text-white mb-4">
										<div class="card-body fs-5">Total Usuarios Activos</div>
										
										<!-- Contenedor para el total de usuarios activos con icono -->
										<div class="d-flex align-items-center ms-3 fs-4">
										    <i class="fas fa-user fs-4"></i> <!-- Icono de usuario de Font Awesome -->
											<div id="totaluseractivo"></div> <!-- Contenedor para el total de usuarios activos -->
										</div>

										<div class="card-footer d-flex align-items-center justify-content-between">
											<!-- Footer de la tarjeta -->
										</div>
									</div>

									</div>

									<div class="col-xl-3 col-md-6">

										<div class="card bg-danger text-white mb-4">

											<div class="card-body fs-5">Total de Usuarios Inactivos</div>

											<div class="ms-3 fs-4" id="totalInactivo"></div>

											<div class="card-footer d-flex align-items-center justify-content-between">

												<!-- <a class="small text-white stretched-link" href="#">View Details</a> -->

												<!-- <div class="small text-white"><i class="fas fa-angle-right"></i></div> -->

											</div>

										</div>

									</div>

								</div>

							</section>

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

		<script type="text/javascript" src="scripts/reporte-admin.js"></script>

		<script type="text/javascript" src="scripts/panel.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<?php

}

ob_end_flush();

?>