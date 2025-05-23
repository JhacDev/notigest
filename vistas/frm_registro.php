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



		<link rel="stylesheet" href="../public/estilos/registro.css">



		<!-- Content Wrapper -->

		<div class="content-wrapper">

			<!-- Content Header (Page header) -->

			<section class="content-header">

				<div class="container-fluid">

					<div class="row mb-2">

						<div class="col-sm-12">

							<h3>Registro del NOTIGEST de la Red: <?php echo $_SESSION['red']; ?>, perteneciente a la microred: <span id="dataMicroRed"></span></h3>

						</div>

					</div>

				</div><!-- /.container-fluid -->

			</section>



			<!-- Main content -->

			<section class="content">



				<!-- Default box -->

				<div class="card">

					<div class="card-header">

						<h3 class="card-title">Listado / Registro</h3>



						<div class="card-tools">

							<button class="btn btn-block btn-outline-info btn-sm" id="btnAgregar" onclick="mostrarform(true);"> <i class="fas fa-plus"></i> Nuevo registro</button>

						</div>

					</div>

					<div class="card-body">

						<div class="panel-body" id="listadoregistros">

							<table class="table table-bordered table-hover dataTable dtr-inline" id="tblistado">

								<thead>

									<th style="width: 5%;">Opciones</th>

									<th style="width: 3%;">Red</th>

									<th style="width: 3%;">Microred</th>

									<th style="width: 5%;">Ipress</th>

									<th style="width: 3%;">se</th>

									<th style="width: 3%;">Fecha de Atencion</th>

									<th style="width: 10%;">Apellidos y nombres</th>

									<th style="width: 3%;">Número de documento</th>

									<th style="width: 3%;">Fecha de Nacimiento</th>

									<th style="width: 3%;">Edad</th>

									<th style="width: 3%;">Fum</th>

									<th style="width: 3%;">Fpp</th>

									<th style="width: 3%;">eg captada</th>

									<th style="width: 3%;">cel gest</th>

									<!-- Agregamos variables -->

									<th style="width: 3%;">Departamento</th>

									<th style="width: 3%;">Provincia</th>

									<th style="width: 3%;">Distrito</th>

									<th style="width: 3%;">Centro poblado</th>

									<th style="width: 3%;">Altitud</th>

									<!-- fin de variables -->

									<th style="width: 3%;">Direccion</th>

									<th style="width: 2%;">Hb</th>

									<th style="width: 2%;">Hb_Altitud</th>

									<th style="width: 2%;">Grupo Sanguineo</th>

									<th style="width: 2%;">Factor RH</th>

									<th style="width: 2%;">Peso PG</th>

									<th style="width: 2%;">Condicion Gestante</th>

									<th style="width: 2%;">Origen</th>

									<th style="width: 2%;">Factor Riesgo</th>

									<th style="width: 2%;">VIF</th>

									<th style="width: 2%;">EG</th>

									<th style="width: 2%;">Fecha Termino</th>

									<th style="width: 2%;">Termino</th>

									<th style="width: 2%;">Lugar Termino</th>

									<th style="width: 2%;">Obs Red</th>

									<th style="width: 2%;">Obs Diresa</th>

									<th style="width: 2%;">Doc Profesional</th>

									<th style="width: 2%;">Nombres Profesional</th>

									<th style="width: 2%;">Telefono Profesional</th>

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

																	<input type="text" class="form-control" id="num_documento" name="num_documento" placeholder="Número de documento de identidad" maxlength="10" style="text-transform: uppercase;" onkeypress="return soloNumeros(event);" onchange="buscarNumDocumento();">

																</div>

															</div>

															<div class="col-xs-12 col-md-12 col-lg-12">

																<div class="form-group">

																	<label for="ape_paterno">Apellido paterno</label>

																	<input type="text" class="form-control" id="ape_paterno" name="ape_paterno" placeholder="Ingrese el apellido paterno" maxlength="30" style="text-transform: uppercase;" onkeypress="return soloLetras(event);">

																</div>

															</div>

															<div class="col-xs-12 col-md-12 col-lg-12">

																<div class="form-group">

																	<label for="ape_materno">Apellido materno</label>

																	<input type="text" class="form-control" id="ape_materno" name="ape_materno" placeholder="Ingrese el apellido materno" maxlength="30" style="text-transform: uppercase;" onkeypress="return soloLetras(event);">

																</div>

															</div>

															<div class="col-xs-12 col-md-12 col-lg-12">

																<div class="form-group">

																	<label for="nombres">Nombres</label>

																	<input type="text" class="form-control" id="nombres" name="nombres" placeholder="Ingrese los nombres" maxlength="50" style="text-transform: uppercase;" onkeypress="return soloLetras(event);">

																</div>

															</div>

															<div class="col-xs-12 col-md-12 col-lg-12">

																<div class="form-group">

																	<label for="fecha_nacimiento">Fecha de nacimiento</label>

																	<input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" min="1900-01-01" max="3000-12-31" onchange="calcularEdad();">

																</div>

															</div>

															<div class="col-xs-12 col-md-12 col-lg-12">

																<div class="form-group">

																	<label for="edad">Edad</label>

																	<input type="text" class="form-control" id="edad" name="edad" placeholder="Edad" maxlength="3" style="text-transform: uppercase;" onkeypress="return soloNumeros(event);">

																</div>

															</div>

															<div class="col-xs-12 col-md-12 col-lg-12">

																<div class="form-group">

																	<label for="cel_gestfamiliar">Número telefónico</label>

																	<input type="text" class="form-control" id="cel_gestfamiliar" name="cel_gestfamiliar" placeholder="Ingrese el Número telefónico" maxlength="9" style="text-transform: uppercase;" onkeypress="return soloNumeros(event);">

																</div>

															</div>

															<!-- Agregamos etiquetas -->

															<!-- departamento -->

															<div class="row">

															<div class="col-xs-12 col-md-12 col-lg-12">
																<div class="form-group">
																	<label for="departamento">Departamento</label>
																	<select onchange="cargar_provincias()" class="custom-select form-control select2" id="departamento" name="departamento" data-placeholder="SELECCIONE" style="width: 100%;"></select>
																</div>
															</div>

															</div>

															<!-- provincias -->

															<div class="row">

																<div class="col-xs-12 col-md-12 col-lg-12">

																	<div class="form-group">

																		<label for="provincia">Provincia</label>

																		<select onchange="carga_distritos()" class="custom-select form-control select2" id="provincia" name="provincia" placeholder="SELECCIONE" style="width: 100%;"></select>

																	</div>

																</div>

															</div>

															<!-- distrito -->

															<div class="row">

																<div class="col-xs-12 col-md-12 col-lg-12">

																	<div class="form-group">

																		<label for="distrito">Distrito</label>

																		<select onchange="carga_centropoblados()" class="custom-select form-control select2" id="distrito" name="distrito" data-placeholder="SELECCIONE" style="width: 100%;"></select>

																	</div>

																</div>

															</div>

															<!-- centro poblado -->

															<div class="row">

																<div class="col-xs-12 col-md-12 col-lg-12">

																	<div class="form-group">

																		<label for="centro_poblado">Centro poblado</label>

																		<select class="form-control select2" id="centro_poblado" name="centro_poblado" data-placeholder="SELECCIONE" style="width: 100%;"></select>

																	</div>

																</div>

															</div>



															<!-- altitud -->

															<div class="col-xs-12 col-md-12 col-lg-12">

																<div class="form-group">

																	<label for="altitud">Altitud</label>

																	<input type="text" class="form-control" id="altitud" name="altitud" placeholder="" maxlength="200" style="text-transform: uppercase;" onkeypress="return soloNumeros(event);"readonly>

																</div>

															</div>





															<div class="col-xs-12 col-md-12 col-lg-12">

																<div class="form-group">

																	<label for="direccion">Dirección</label>

																	<input type="text" class="form-control" id="direccion" name="direccion" placeholder="Ingrese la dirección" maxlength="200" style="text-transform: uppercase;">

																</div>

															</div>

														</div>

													</div>

												</div>

											</div>

											<div class="col-md-7">

												<div class="card card-info card-outline">

													<div class="card-body box-profile">

														<h4 class="text-center display-7">DATOS PARA EL NOTIGEST</h4>



														<div class="row">

															<div class="col-xs-12 col-md-12 col-lg-12">

																<div class="form-group">

																	<label for="red">Red</label>

																	<input type="text" class="form-control" name="red" id="red" maxlength="20" style="text-transform: uppercase;" value="<?php echo $_SESSION['red']; ?>">

																</div>

															</div>

														</div>



														<div class="row">

															<div class="col-xs-12 col-md-12 col-lg-12">

																<div class="form-group">

																	<label for="microred">Microred</label>

																	<!-- <select class="form-control select2" id="microred" name="microred" data-placeholder="SELECCIONE" style="width: 100%;"></select> -->

																	<input type="text" class="form-control" id="otrared" maxlength="20" style="text-transform: uppercase;" readonly>



																</div>

															</div>

														</div>



														<div class="row">

															<div class="col-xs-12 col-md-12 col-lg-7">

																<div class="form-group">

																	<label for="ipress">Ipress</label>

																	<select class="form-control select2" id="ipress" name="ipress" data-placeholder="SELECCIONE" style="width: 100%;"></select>

																</div>

															</div>

															<div class="col-xs-12 col-md-12 col-lg-3">

																<div class="form-group">

																	<label for="cod_ipress">Renaes</label>

																	<input type="text" class="form-control" id="cod_ipress" name="cod_ipress" placeholder="Código renaes" maxlength="8" style="text-transform: uppercase;" onkeypress="return soloNumeros(event);" onchange="validarCodRenaes();">

																</div>

															</div>

															<div class="col-xs-12 col-md-12 col-lg-2">

																<div class="form-group">

																	<label for="categoria">Categoria</label>

																	<input type="text" class="form-control" name="categoria" id="categoria" maxlength="20" placeholder="Categoria" style="text-transform: uppercase;">

																</div>

															</div>

														</div>

														<div class="row">

															<div class="col-xs-12 col-md-12 col-lg-4">

																<div class="form-group">

																	<label for="fecha_atencion">Fecha de atención</label>

																	<input type="date" class="form-control" id="fecha_atencion" name="fecha_atencion" min="2023-01-01" max="2025-12-31">

																</div>

															</div>

															<div class="col-xs-12 col-md-12 col-lg-4">

																<div class="form-group">

																	<label for="fum">Fecha ultima de mestruación</label>

																	<input type="date" class="form-control" id="fum" name="fum" min="2023-04-01" max="2025-12-31" onChange="obtenerFPP();">

																</div>

															</div>

															<div class="col-xs-12 col-md-12 col-lg-4">

																<div class="form-group">

																	<label for="fpp">Fecha probable de parto</label>

																	<input type="date" class="form-control" id="fpp" name="fpp" min="1900-01-01" max="3000-12-31">

																</div>

															</div>

														</div>

														<div class="row">

															<div class="col-xs-12 col-md-12 col-lg-4">

																<div class="form-group">

																	<label for="se">S.E.</label>

																	<input type="text" class="form-control" id="se" name="se" placeholder="SE" maxlength="2" style="text-transform: uppercase;" onkeypress="return soloNumeros(event);">

																</div>

															</div>

															<div class="col-xs-12 col-md-12 col-lg-4">

																<div class="form-group">

																	<label for="eg_captada">Edad gestacional captada</label>

																	<input type="text" class="form-control" id="eg_captada" name="eg_captada" placeholder="EGC" maxlength="2" style="text-transform: uppercase;" onkeypress="return soloNumeros(event);">

																</div>

															</div>

															<div class="col-xs-12 col-md-12 col-lg-4">

																<div class="form-group">

																	<label for="eg_actual">Edad gestacional actual</label>

																	<input type="text" class="form-control" id="eg_actual" name="eg_actual" placeholder="EGA" maxlength="2" style="text-transform: uppercase;" onkeypress="return soloNumeros(event);">

																</div>

															</div>

														</div>

														<div class="row">

															<div class="col-xs-12 col-md-12 col-lg-3">

																<div class="form-group">

																	<label for="hb_ajustado">Hb Observado</label>

																	<input type="text" onkeyup="formulaHBC()" class="form-control" id="hb_ajustado" name="hb_ajustado" placeholder="Hemoglobina" maxlength="5" style="text-transform: uppercase;" onkeypress="return soloDecimales(event);">

																</div>

															</div>

															<div class="col-xs-12 col-md-12 col-lg-3">

																<div class="form-group">

																	<label for="hb_altitud">Hb Ajustada</label>

																	<input type="text" class="form-control" id="hb_altitud" name="hb_altitud" placeholder="Hemoglobina" maxlength="5" style="text-transform: uppercase;" onkeypress="return soloDecimales(event);" readonly>

																</div>

															</div>

															<div class="col-xs-12 col-md-12 col-lg-3">

																<div class="form-group">

																	<label for="grupo_sanguineo">Grupo sanguíneo</label>

																	<select class="custom-select form-control select2" id="grupo_sanguineo" name="grupo_sanguineo" data-placeholder="SELECCIONE" style="width: 100%;"></select>

																</div>

															</div>

															<div class="col-xs-12 col-md-12 col-lg-3">

																<div class="form-group">

																	<label for="factor_rh">Factor Rh</label>

																	<select class="custom-select form-control select2" id="factor_rh" name="factor_rh" data-placeholder="SELECCIONE" style="width: 100%;"></select>

																</div>

															</div>

														</div>

														<div class="row">

															<div class="col-xs-12 col-md-12 col-lg-2">

																<div class="form-group">

																	<label for="peso">Peso PG</label>

																	<input type="text" class="form-control" id="peso" name="peso" placeholder="PESO" maxlength="5" style="text-transform: uppercase; width:60%" onkeypress="return soloDecimales(event);">

																</div>



															</div>

															<div class="col-xs-12 col-md-12 col-lg-2">

																<div class="form-group">

																	<label for="condicion_ges">Condicion Gestante</label>

																	<select class="custom-select form-control select2" id="condicion_ges" name="condicion_ges" data-placeholder="SELECCIONE" style="width: 100%;"></select>

																</div>



															</div>

															<div class="col-xs-12 col-md-12 col-lg-3">

																<div class="form-group">

																	<label for="origen">Origen</label>

																	<input type="text" class="form-control" id="origen" name="origen" placeholder="ORIGEN" maxlength="30" style="text-transform: uppercase; width:100%">

																</div>



															</div>

															<div class="col-xs-12 col-md-12 col-lg-3">

																<div class="form-group">

																	<label for="factor_riesgo">Factor de riesgo</label>

																	<select class="custom-select form-control select2" id="factor_riesgo" name="factor_riesgo" data-placeholder="SELECCIONE" style="width: 100%;"></select>

																</div>



															</div>

															<div class="col-xs-12 col-md-12 col-lg-2">

																<div class="form-group">

																	<label for="tamizaje_vif">Tamizaje VIF</label>

																	<select class="custom-select form-control select2" id="tamizaje_vif" name="tamizaje_vif" data-placeholder="SELECCIONE" style="width: 100%;"></select>

																</div>

															</div>

														</div>

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

																	<label for="lugar_termino">Lugar de termino</label>

																	<select class="custom-select form-control select2" id="lugar_termino" name="lugar_termino" data-placeholder="SELECCIONE" style="width: 100%;"></select>

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



	} else {

		require "frm_accesodenegado.php";

	}

	require_once "frm_footeruser.php";

	?>



	<script type="text/javascript" src="scripts/registro.js"></script>


<?php

}

ob_end_flush();

?>