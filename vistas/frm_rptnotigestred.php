<?php 

// Activamos el almacenamiento en el buffer

ob_start();

session_start();

// Si la variable de session no existe

if (!isset($_SESSION['email_usuario'])) {

	header("Location: login.html");

} else {

	require_once "frm_headerred.php"; 

	if ($_SESSION['tipousuario'] == "REDES") {

		

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

												<button type="button" class="btn btn-block btn-info" id="btn_general_reporte" onclick="generarRptRed();">Generar</button>

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

						<div class="" id="listadoregistros">

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

									<!-- fin de variables -->

									<th style="width: 3%;">Dirección</th>

									<th style="width: 3%;">HB valor Observado</th>	

									<th style="width: 3%;">HB valor Ajustado</th>									

									<th style="width: 3%;">Grupo sanguíneo</th>

									<th style="width: 3%;">Factor RH</th>

									<!-- <th style="width: 2%;">Peso PG</th> -->

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

									<th></th>

								</tfoot>

							</table>

						</div>	

						<div class="col-12" id="formularioregistros">

							<form method="post" class="form-horizontal" name="formulario" id="formulario">

								<section class="content">

									<div class="container-fluid">

										<div class="row">

											<div class="col-md-5">

												<div class="card card-info card-outline">

													<div class="card-body box-profile">

														<h4 class="text-center display-7">DATOS PERSONALES</h4>

														<div class="row">

															<div class="col-xs-12 col-md-12 col-lg-12">

																<div class="form-group">

																	<input type="hidden" id="id_registro" name="id_registro">

																	<label for="num_documento">Número de documento</label>

																	<input type="text" class="form-control" id="num_documento" name="num_documento" placeholder="Número de documento de identidad" maxlength="10" style="text-transform: uppercase;" onkeypress="return soloNumeros(event);" onchange="buscarNumDocumento();" readonly>

																</div>

															</div>

															<div class="col-xs-12 col-md-12 col-lg-12">

																<div class="form-group">

																	<label for="ape_paterno">Apellido paterno</label>

																	<input type="text" class="form-control" id="ape_paterno" name="ape_paterno" placeholder="Ingrese el apellido paterno" maxlength="30" style="text-transform: uppercase;" onkeypress="return soloLetras(event); "readonly>

																</div>

															</div>

															<div class="col-xs-12 col-md-12 col-lg-12">

																<div class="form-group">

																	<label for="ape_materno">Apellido materno</label>

																	<input type="text" class="form-control" id="ape_materno" name="ape_materno" placeholder="Ingrese el apellido materno" maxlength="30" style="text-transform: uppercase;" onkeypress="return soloLetras(event);" readonly>

																</div>

															</div>

															<div class="col-xs-12 col-md-12 col-lg-12">

																<div class="form-group">

																	<label for="nombres">Nombres</label>

																	<input type="text" class="form-control" id="nombres" name="nombres" placeholder="Ingrese los nombres" maxlength="50" style="text-transform: uppercase;" onkeypress="return soloLetras(event);" readonly>

																</div>

															</div>

															<div class="col-xs-12 col-md-12 col-lg-12">

																<div class="form-group">

																	<label for="fecha_nacimiento">Fecha de nacimiento</label>

																	<input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" min="1900-01-01" max="3000-12-31" onchange="calcularEdad();" readonly>

																</div>

															</div>

															<div class="col-xs-12 col-md-12 col-lg-12">

																<div class="form-group">

																	<label for="edad">Edad</label>

																	<input type="text" class="form-control" id="edad" name="edad" placeholder="Edad" maxlength="3" style="text-transform: uppercase;" onkeypress="return soloNumeros(event);" readonly>

																</div>

															</div>

															<div class="col-xs-12 col-md-12 col-lg-12">

																<div class="form-group">

																	<label for="cel_gestfamiliar">Número telefónico</label>

																	<input type="text" class="form-control" id="cel_gestfamiliar" name="cel_gestfamiliar" placeholder="Ingrese el Número telefónico" maxlength="9" style="text-transform: uppercase;" onkeypress="return soloNumeros(event);" readonly>

																</div>

															</div>

														</div>

													</div>

												</div>

											</div>

											<div class="col-md-7">

												<div class="card card-info card-outline">

													<div class="card-body box-profile">

														<h4 class="text-center display-7">DATOS PARA ACTUALIZAR TERMINO DE GESTACION</h4>

														<div class="row">

															<div class="col-xs-12 col-md-12 col-lg-4">

																<div class="form-group">

																	<label for="fecha_termino">Fecha de termino</label>

																	<input type="date" class="form-control" id="fecha_termino" name="fecha_termino" min="1900-01-01" max="3000-12-31">

																</div>

															</div>

															<div class="col-xs-12 col-md-12 col-lg-4">

																<div class="form-group">

																	<label for="termino">Termino</label>

																	<select class="custom-select form-control select2" id="termino" name="termino" data-placeholder="SELECCIONE" style="width: 100%;"></select>

																</div>

															</div>

															<div class="col-xs-12 col-md-12 col-lg-4">

																<div class="form-group">

																	<label for="lugartermino">Lugar de termino</label>

																	<select class="custom-select form-control select2" id="lugartermino" name="lugartermino"  style="width: 100%;"></select>

																</div>

															</div>

														</div>

														<div class="row">

															<div class="col-sm-12 col-md-12 col-xs-12">

																<div class="form-group">

																	<label for="obs_red">Observaciones de la red</label>

																	<textarea class="form-control" id="obs_red" name="obs_red" placeholder="Ingrese alguna observación" style="text-transform: uppercase;"></textarea>

																</div>

															</div>

														</div>

														<div class="row">

															<div class="col-sm-12 col-md-12 col-xs-12">

																<div class="form-group">

																	<label for="obs_diresa">Observaciones de la diresa</label>

																	<textarea class="form-control" id="obs_diresa" name="obs_diresa" placeholder="Ingrese alguna observación" style="text-transform: uppercase;"></textarea>

																</div>

															</div>

														</div>

														<hr>

														<p>Responsable de la Atencion</p>

														<div class="row">

															<div class="col-xs-12 col-md-12 col-lg-4">

																<div class="form-group">

																	<label for="dociden_responsable">Número de documento</label>

																	<input type="input" class="form-control" id="dociden_responsable" name="dociden_responsable" maxlength="10" onkeypress="return soloNumeros(event);" value="<?php echo $_SESSION['numdoc_usuario']; ?>">

																</div>

															</div>

															<div class="col-xs-12 col-md-12 col-lg-8">

																<div class="form-group">

																	<label for="apenom_responsable">Apellidos y Nombres</label>

																	<input type="input" class="form-control" id="apenom_responsable" name="apenom_responsable" maxlength="10" onkeypress="return soloLetras(event);" value="<?php echo $_SESSION['apenom_usuario']; ?>">

																</div>

															</div>

														</div>

													</div>

												</div>

											</div>

										</div>

										<div class="row">

											<div class="col-sm-2 col-md-2 col-xs-12">

												<button type="submit" class="btn btn-block btn-outline-primary" id="btnGuardar">Guardar</button>

											</div>

											<div class="col-sm-2 col-md-2 col-xs-12">

												<button type="button" class="btn btn-block btn-outline-danger" onclick="cancelarform();">Cancelar</button>

											</div>

										</div>

									</div>

								</section>

							</form>

						</div>						

					</div>

					<!-- /.card-body -->			

				</div>

				<!-- /.card -->



			</section>

			<!-- /.content -->

		</div>



		<?php 



	}else {

		require "frm_accesodenegado.php";

	}

	require_once "frm_footerred.php"; 

	?>



	<script type="text/javascript" src="scripts/rptnotigest.js"></script>

	<!-- <script type="text/javascript" src="scripts/registro.js"></script> -->



	<?php 

}

ob_end_flush();

?>