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

<!-- Content Wrapper -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-12">
					<h1>Usuarios del sistema</h1>
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
							<th style="width: 10%;">Tipo de usuario</th>
							<th style="width: 15%;">Usuario</th>
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
														<input type="password" class="form-control" id="password_sistema" name="password_sistema" placeholder="***********" maxlength="20">	
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

	<script type="text/javascript" src="scripts/usuario.js"></script>

	<?php 
}
ob_end_flush();
?>