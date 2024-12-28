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
										<img src="../public/imagenes/logo_diresapuno2.png" class="round mx-auto d-block" alt="Responsive image" id="imagen">
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
			<!-- /.content -->
		</div>

		<?php 

	}else {
		require "frm_accesodenegado.php";
	}
	require_once "frm_footeruser.php"; 
	?>

	<?php 
}
ob_end_flush();
?>