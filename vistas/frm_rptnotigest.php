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



		<link rel="stylesheet" href="../public/estilos/rptnotigest.css">



		<!-- Content Wrapper -->

		<div class="content-wrapper">

			<!-- Content Header (Page header) -->

			<section class="content-header">

				<div class="container-fluid">

					<div class="row mb-2">

						<div class="col-sm-12">

							<h1>Reporte del NOTIGEST - WEB</h1>

						</div>

					</div>

				</div><!-- /.container-fluid -->

			</section>



			<section class="content">

				<div class="col-md-3">

					<div class="card card-info card-outline">

						<div class="card-header">

							<h3 class="card-title">

								<i class="fas fa-search"></i>

								Reporte

							</h3>

						</div>

						<div class="card-body">

							<form method="POST" class="form-horizontal" id="frm_buscar" name="frm_buscar" enctype="multipart/form-data">

								<div class="row">

									<div class="row" id="datos_genreporte">

										<div class="col-xs-12 col-md-12 col-lg-12">

											<div class="form-group">

												<button type="button" class="btn btn-block btn-info" id="btn_general_reporte" onclick="generarRptGeneral();">Generar</button>

											</div>

										</div>

									</div>

								</div>

							</form>

						</div>

					</div>

				</div>

			</section>



			<!-- Main content -->

			<section class="content" id="tablareporte">

				<!-- Default box -->

				<div class="card">

					<div class="card-header">

						<h3 class="card-title">

							<i class="fas fa-list-alt"></i>

							Listado

						</h3>

					</div>

					<div class="card-body">

						<div class="panel-body table-responsive" id="listadoregistros">

							<table class="table table-bordered table-hover dataTable dtr-inline" id="tblistado_notigest">

								<thead>

									<th style="width: 5%;">Opciones</th>

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

									<th style="width: 3%;">Fecha registro en el sistema</th>

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

									<th></th>

									<th></th>

								</tfoot>

							</table>

						</div>

					</div>

					<!-- /.card-body -->

				</div>

				<!-- /.card -->



			</section>

			<!-- /.content -->

		</div>



	<?php



	} else {

		require "frm_accesodenegado.php";

	}

	require_once "frm_footeradmin.php";

	?>



	<script type="text/javascript" src="scripts/rptnotigest.js"></script>





<?php

}

ob_end_flush();

?>