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



<link rel="stylesheet" href="../public/estilos/usuario.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">



<!-- Content Wrapper -->

<div class="content-wrapper">

	<!-- Content Header (Page header) -->

	<section class="content-header">

		<div class="container-fluid">

			<div class="row mb-2">

				<div class="col-sm-12">

					<h1 class="text-center text-bold text-dark">GESTION DE USUARIOS</h1>

				</div>

			</div>

		</div><!-- /.container-fluid -->

	</section>

			<!-- /.card -->

	<section class="content">

				<div class="row text-center">

					<div class="col-xl-3 col-md-6">

						<div class="card bg-primary text-white mb-4">

							<div class="card-body fs-5">Total de Usuarios</div>
							<div class="d-flex align-items-center justify-content-center ms-3 fs-4">
							<i class="fa-solid fa-users"></i>
							<div class="ms-3 fs-4" id="totalUser" ></div>
							</div>
							<div class="card-footer d-flex align-items-center justify-content-between">

								<!-- <a class="small text-white stretched-link" href="#">View Details</a> -->

								<!-- <div class="small text-white"><i class="fas fa-angle-right"></i></div> -->

							</div>

						</div>

					</div>

					<div class="col-xl-3 col-md-6">

						<div class="card bg-warning text-white mb-4">

							<div class="card-body fs-5">Tota Administradores</div>
							<div class="d-flex align-items-center justify-content-center ms-3 fs-4">
							<i class="fa-solid fa-user-plus"></i>
							<div class="ms-3 fs-4" id="totalAdmin"></div>
							</div>
							<div class="card-footer d-flex align-items-center justify-content-between">

								<!-- <a class="small text-white stretched-link" href="#">View Details</a> -->

								<!-- <div class="small text-white"><i class="fas fa-angle-right"></i></div> -->

							</div>

						</div>

					</div>

					<div class="col-xl-3 col-md-6">

						<div class="card bg-success text-white mb-4">

							<div class="card-body fs-5">Total Usuario Activo</div>
							<div class="d-flex align-items-center justify-content-center ms-3 fs-4">
							<i class="fa-regular fa-user"></i>
							<div class="ms-3 fs-4" id="totaluseractivo"></div>
							</div>
							<div class="card-footer d-flex align-items-center justify-content-between">


							</div>

						</div>

					</div>

					<div class="col-xl-3 col-md-6">

					<div class="card bg-danger text-white mb-4">
						<div class="card-body fs-5">Total Usuario Inactivo</div>
						
						<!-- Contenedor para el total de usuarios inactivos con icono -->
						<div class="d-flex align-items-center justify-content-center ms-3 fs-4">
							<i class="fas fa-user-slash fs-4 me-2"></i> <!-- Icono de usuario inactivo de Font Awesome -->
							<div id="totalInactivo"></div> <!-- Contenedor para el total de usuarios inactivos -->
						</div>

						<div class="card-footer d-flex align-items-center justify-content-between">
							<!-- Footer de la tarjeta -->
						</div>
					</div>

					</div>

				</div>

	</section>




	<!-- Main content -->

	<section class="content">



		<!-- Default box -->

		<div class="card">

			<div class="card-header">

				<h3 class="card-title">Listado / Registro</h3>



				<div class="card-tools">

					<button class="btn btn-block btn-outline-success btn-sm" id="btnAgregar" onclick="mostrarform(true);"> <i class="fas fa-plus"></i> Nuevo registro</button>

				</div>

			</div>

			<div class="card-body">

				<div class="panel-body" id="listadoregistros">

					<table class="table table-bordered table-hover dataTable dtr-inline" id="tblistado">

						<thead>

							<th style="width: 5%;">Opciones</th>

							<th style="width: 13%;">Documento</th>

							<th style="width: 5%;">Número</th>

							<th style="width: 30%;">Apellidos y nombres</th>

							<th style="width: 15%;">Red</th>

							<th style="width: 15%;">Microred</th>

							<th style="width: 10%;">Tipo de usuario</th>

							<th style="width: 15%;">Usuario</th>

							<th style="width: 15%;">Numero de telefono</th>

							<th style="width: 7%;">Estado</th>

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

															<input type="hidden" id="id_usuario" name="id_usuario">

															<label for="tipodocidentidad">Documento de identidad</label>

															<select class="form-control select2" id="tipodocidentidad" name="tipodocidentidad" data-placeholder="SELECCIONE" style="width: 100%;"></select>

														</div>

													</div>

													<div class="col-xs-12 col-md-12 col-lg-12">

														<div class="form-group">

															<label for="numdoc_usuario">Número de documento</label>

															<input type="text" class="form-control" id="numdoc_usuario" name="numdoc_usuario" placeholder="Número de documento de identidad" maxlength="10" style="text-transform: uppercase;" onkeypress="return soloNumeros(event);" onchange="buscarDniUsuario();">

														</div>

													</div>

													<div class="col-xs-12 col-md-12 col-lg-12">

														<div class="form-group">

															<label for="apenom_usuario">Apellidos y Nombres</label>

															<input type="text" class="form-control" id="apenom_usuario" name="apenom_usuario" placeholder="Apellidos completos" maxlength="150" style="text-transform: uppercase;" onkeypress="return soloLetras(event);">

														</div>

													</div>

													<div class="col-xs-12 col-md-12 col-lg-12">

														<div class="form-group">

															<label for="numtele_usuario">Número telefónico</label>

															<input type="text" class="form-control" id="numtele_usuario" name="numtele_usuario" placeholder="Número telefónico" maxlength="9" style="text-transform: uppercase;" onkeypress="return soloNumeros(event);">

														</div>

													</div>

													<div class="col-xs-12 col-md-12 col-lg-12">

														<div class="form-group">

															<label for="email_usuario">Correo electrónico</label>

															<input type="email" class="form-control" id="email_usuario" name="email_usuario" placeholder="Correo electrónico" maxlength="50" onkeyup="copiarEmail(event);">

														</div>

													</div>

												</div>	

											</div>		

										</div>							

									</div>

									<div class="col-md-7">

										<div class="card card-info card-outline">

											<div class="card-body box-profile">	

												<h4 class="text-center display-7">DATOS DE USUARIO</h4>

												<div class="col-xs-12 col-md-12 col-lg-12">

													<div class="form-group">

														<label for="tipousuario">Tipo de usuario</label>

														<select class="form-control select2" id="tipousuario" name="tipousuario" data-placeholder="SELECCIONE" style="width: 100%;"></select>

													</div>

												</div>

												<div class="col-xs-12 col-md-12 col-lg-12" id="dato_red">

													<div class="form-group">

														<label for="red">Red de salud</label>

														<select class="form-control select2" id="red" name="red" data-placeholder="SELECCIONE" style="width: 100%;"></select>

													</div>

													<div id="addHtml"></div>

												</div>

												<div class="col-xs-12 col-md-12 col-lg-12">

													<div class="form-group">

														<label for="usuario_sistema">Usuario</label>

														<input type="text" class="form-control" id="usuario_sistema" name="usuario_sistema" placeholder="Usuario" maxlength="50">	

													</div>

												</div>	

												<div class="col-xs-12 col-md-12 col-lg-12">															

													<div class="form-group">

														<label for="password_sistema">Contraseña</label>	

														<div class="input-group">
														<input type="password" class="form-control" id="password_sistema" name="password_sistema" placeholder="***********" maxlength="20">
														<button type="button" class="btn btn-outline-success" id="togglePassword">
															Mostrar
														</button>
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

	require_once "frm_footeradmin.php"; 

	?>


	<script type="text/javascript" src="scripts/reporte-admin.js"></script>
	<script type="text/javascript" src="scripts/usuario.js"></script>
	<script>
			document.getElementById('togglePassword').addEventListener('click', function () {
			const passwordField = document.getElementById('password_sistema');
			const isPassword = passwordField.type === 'password';
			passwordField.type = isPassword ? 'text' : 'password';
			this.textContent = isPassword ? 'Ocultar' : 'Mostrar';
		});
	</script>


	<?php 

}

ob_end_flush();

?>