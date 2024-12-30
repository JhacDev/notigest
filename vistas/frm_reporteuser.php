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
#tablareporte {
    display: none; /* Oculta la sección de la tabla inicialmente */
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

							<h1 class="text-center">Padron de Gestantes - Red - <b><?php echo $_SESSION["red"]; ?></b> - Microred - <b><span id="dataMicroRed"></span></b> </h1>

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
					<!-- 
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

					</div> -->

					<!-- /.card-body -->

				</div>

				<!-- /.card -->

			</section>
			
			<section class="content" id="reporte_user"> 

				<div class="col-md-3">

					<div class="card card-info card-outline">

						<div class="card-header">						

							<h3 class="card-title">

								<i class="fas fa-search"></i>

								Reporte

							</h3>

						</div>

						<div class="card-body">

							<form method="gest" class="form-horizontal" id="frm_buscar" name="frm_buscar" enctype="multipart/form-data">

								<div class="row">

									<div class="row" id="datos_genreporte">

										<div class="col-xs-12 col-md-12 col-lg-12">

											<div class="form-group">

												<button type="button" class="btn btn-block btn-info" id="btn_general_reporte">Generar</button>

											</div>

										</div>

									</div>

								</div>							

							</form>

						</div>

					</div>

				</div>

			</section>
			<!-- Spinner de carga -->
			<div id="spinner" style="display: none; text-align: center;">
				<div class="spinner-border text-primary" role="status">
					<span class="sr-only">Cargando...</span>
				</div>
				<p>Cargando datos, por favor espere...</p>
			</div>
			<section class="content" id="tablareporte">

				<div class="container-fluid">


					<div class="card mb-2">

						<div class="card-header">

							<i class="fas fa-table me-1"></i>

							REPORTE NOMINAL GESTANTES AÑO ACTUAL MICRORED 
						</div>
						<div class="table-responsive">
							<div class="panel-body">

								<table id="tblistado_gest" class="table table-bordered table-hover dataTable dtr-inline">
									<thead>
									<th class="text-end" style="width: 5%;">Red</th>
											<th style="width: 3%;">Microred</th>
											<th style="width: 3%;">Código renaes</th>
											<th style="width: 3%;">Ipress</th>
											<th style="width: 3%;">Categoria</th>
											<th style="width: 3%;">SE</th>
											<th style="width: 3%;">Fecha de primera atención</th>
											<th style="width: 3%;">Apellido paterno</th>
											<th style="width: 3%;">Apellido materno</th>
											<th style="width: 4%;">Nombres</th>
											<th style="width: 3%;">Número de documento</th>
											<th style="width: 3%;">Fecha de nacimiento</th>
											<th style="width: 3%;">Edad</th>
											<th style="width: 3%;">Fecha ultima de mestruación (FUM)</th>
											<th style="width: 3%;">Fecha probable de parto (FPP)</th>
											<th style="width: 3%;">Edad gest. captada</th>
											<th style="width: 3%;">Celular gestante</th>
											<th style="width: 3%;">Departamento</th>
											<th style="width: 3%;">Provincia</th>
											<th style="width: 3%;">Distrito</th>
											<th style="width: 3%;">Centro poblado</th>
											<th style="width: 3%;">Altitud</th>
											<th style="width: 3%;">Dirección</th>
											<th style="width: 3%;">HB valor Observado</th>
											<th style="width: 3%;">HB valor Ajustado</th>
											<th style="width: 3%;">Grupo sanguíneo</th>
											<th style="width: 3%;">Factor RH</th>
											<th style="width: 3%;">Factor de riesgo</th>
											<th style="width: 3%;">Tamizaje VIF</th>
											<th style="width: 3%;">Edad gest. actual</th>
											<th style="width: 3%;">Fecha de termino</th>
											<th style="width: 3%;">Termino</th>
											<th style="width: 3%;">Lugar de termino</th>
											<th style="width: 3%;">Observación de la red</th>
											<th style="width: 3%;">Observación de la diresa</th>
											<th style="width: 3%;">Doc Profesional</th>
											<th style="width: 3%;">Nombres Profesional</th>
											<th style="width: 3%;">Celular Profesional</th>
									</thead>
									<tbody>
									</tbody>
									<tfoot>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
									</tfoot>
								</table>
							</div>
						</div>
					</div>
				</div>
			</section>
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
	<script>
				document.getElementById('btn_general_reporte').addEventListener('click', function() {
			// Mostrar el spinner
			ListarGest()
			// Ocultar la tabla y otra sección inicialmente
			document.getElementById('tablareporte').style.display = 'none';
			document.getElementById('reporte_user').style.display = 'none';
			document.getElementById('tablareporte').style.display = 'block';		
		});

	</script>

<?php

}

ob_end_flush();

?>