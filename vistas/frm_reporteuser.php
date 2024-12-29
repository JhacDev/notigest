<?php

// Activamos el almacenamiento en el buffer

ob_start();

session_start();

// Si la variable de session no existe

if (!isset($_SESSION['email_usuario'])) {

	header("Location: login.html");
} else {

	require_once "frm_headeruser.php";

	if ($_SESSION['tipousuario'] == "USUARIO") {



?>
<style> 
/* Aplica el color a la cabecera */ #tblistado_gest thead 
{ 
	background-color: #175B27; /* Color de fondo de la cabecera */ 
	color: white; /* Color del texto de la cabecera */ 
} 
</style>


		<link rel="stylesheet" href="../public/estilos/principal.css">

		<!-- Content Wrapper -->

		<div class="content-wrapper">

			<!-- Content Header (Page header) -->

			<section class="content-header" id="contenedor_titulo">

				<div class="container-fluid">

					<div class="row mb-2">

						<div class="col-sm-12">

							<h1>Sistema de la notificación a la gestante - <b>NOTIGEST</b> - Red - <b><?php echo $_SESSION["red"]; ?></b> - Microred - <b><span id="dataMicroRed"></span></b> </h1>

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

										<img src="../public/imagenes/logo.png" class="round mx-auto d-block" alt="Responsive image" id="imagen" width="180" height="100">


									</div>

									<div class="row" style="text-align: center;">

										<h5>Al sistema de la <b id="dis_estilo">Estrategia Sanitaria Salud Sexual y Reproductiva</b> - Dirección Regional de Salud Puno</h5>

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

					<!-- <h1 class="mt-4">DASHBOARD</h1> -->

					<div class="card mb-4">

						<div class="card-header">

							<i class="fas fa-table me-1"></i>

							REPORTE NOMINAL GESTANTES AÑO ACTUAL MICRORED 

						</div>

						<div class="card-body border-2">

							<table id="tblistado_gest" class="table table-hover table-bordered">
								<thead>

									<tr>

										<th style="width: 3%;">Red</th>

										<th style="width: 3%;">Microred</th>

										<th style="width: 3%;">Ipress</th>

										<th style="width: 3%;">Fecha de Registro</th>

										<th style="width: 3%;">Documento</th>

										<th style="width: 3%;">Apellidos y Nombres</th>

										<th style="width: 3%;">Edad</th>

										<th style="width: 3%;">Eg Actual</th>

										<th style="width: 3%;">Nro Celular</th>

										<th style="width: 3%;">Fecha de Atencion</th>

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

	require_once "frm_footeruser.php";

	?>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>

	<script src="../public/assets/demo/chart-area-demo.js"></script>

	<script src="../public/assets/demo/chart-bar-demo.js"></script>

	<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>

	<script type="text/javascript" src="scripts/panelUser.js"></script>



<?php

}

ob_end_flush();

?>