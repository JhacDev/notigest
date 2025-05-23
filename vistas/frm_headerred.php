<?php

if (strlen(session_id()) < 1) {

	session_start();
}

?>

<!DOCTYPE html>

<html lang="es">

<head>

	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="shortcut icon" href="../public/imagenes/logo_diresapuno2.png">

	<title>NOTIGEST | PUNO</title>



	<!-- Google Font: Source Sans Pro -->

	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

	<!-- Font Awesome -->

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

	<!-- Bootstrap v5.0.2 -->

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">

	<!-- Bootstrap Color Picker -->

	<link rel="stylesheet" href="../public/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">

	<!-- Select2 -->

	<link rel="stylesheet" href="../public/plugins/select2/css/select2.min.css">

	<!-- DataTables -->

	<link rel="stylesheet" href="../public/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">

	<link rel="stylesheet" href="../public/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

	<link rel="stylesheet" href="../public/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

	<link rel="stylesheet" href="../public/plugins/datatables/jquery.dataTables.min.css">

	<!-- Theme style -->

	<link rel="stylesheet" href="../public/dist/css/adminlte.min.css">
	<link rel="stylesheet" href="../public/estilos/navbar.css">

</head>

<body class="hold-transition sidebar-mini sidebar-collapse">



	<div class="wrapper">



		<!-- Navbar -->
		<!-- <nav class="main-header navbar navbar-expand navbar-dark navbar-light"> -->
		<nav class="main-header navbar navbar-expand navbar-dark" id="menu">

			<!-- Left navbar links -->

			<ul class="navbar-nav">

				<li class="nav-item">

					<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>

				</li>

				<li class="nav-item d-none d-sm-inline-block">

					<a href="#" class="nav-link"><?php echo $_SESSION['apenom_usuario']; ?> </a>

				</li>

			</ul>

			<!-- Right navbar links -->

			<ul class="navbar-nav ml-auto">

				<li class="nav-item">

					<a href="#" class="nav-link"><?php echo $_SESSION['red']; ?> </a>

				</li>

				<li class="nav-item">

					<a class="nav-link" data-widget="fullscreen" href="#" role="button">

						<i class="fas fa-expand-arrows-alt"></i>

					</a>

				</li>

			</ul>

		</nav>

		<!-- /.navbar -->



		<!-- Main Sidebar Container -->

		<aside class="main-sidebar sidebar-dark-info elevation-4" id="menu">

			<!-- Brand Logo -->

			<a href="#" class="brand-link">

				<img src="../public/imagenes/logo_diresapuno2.png" alt="SedisPuno Logo" class="brand-image img-circle elevation-3" style="opacity: .8">

				<span class="brand-text font-weight-light">SISTEMA NOTIGEST </span>

			</a>



			<!-- Sidebar -->

			<div class="sidebar">

				<!-- Sidebar usuario -->

				<div class="user-panel mt-3 pb-3 mb-3 d-flex">

					<div class="image">

						<img src="../public/imagenes/hospital.png" class="img-circle elevation-2" alt="User Image">

					</div>

					<div class="info">

						<a href="#" class="d-block"><?php echo $_SESSION['tipousuario']; ?></a>

					</div>

				</div>



				<!-- SidebarSearch Form -->

				<!-- <div class="form-inline">

					<div class="input-group" data-widget="sidebar-search">

						<input class="form-control form-control-sidebar" type="search" placeholder="Buscar" aria-label="Search">

						<div class="input-group-append">

							<button class="btn btn-sidebar">

								<i class="fas fa-search fa-fw"></i>

							</button>

						</div>

					</div>

				</div> -->



				<!-- Sidebar Menu -->

				<nav class="mt-2">

					<ul class="nav nav-pills nav-sidebar nav-compact nav-child-indent flex-column" data-widget="treeview" role="menu" data-accordion="false">

						<li class="nav-header">
							<h6>REPORTES</h6>
						</li>

						<li class="nav-item">

							<a href="frm_principalred.php" class="nav-link">

								<!-- <i class="nav-icon fas fa-cube"></i> -->
								<div class="d-flex align-items-center">
									<div class="image">
										<img src="../public/imagenes/vigilancia_64.png" class="img-circle elevation-2" alt="User Image" style="max-width: 34px; height: auto;">
									</div>
									<p class="mb-0 ms-2"> <!-- mb-0 elimina el margen inferior, ms-2 añade un margen izquierdo -->
										Dashboard
									</p>
								</div>

							</a>

						</li>



						<!-- <li class="nav-header">NOTIGEST</li>	 -->

						<li class="nav-item">

							<a href="frm_rptnotigestred.php" class="nav-link">

								<!-- <i class="nav-icon fas fa-cube"></i> -->
								<div class="d-flex align-items-center">
									<div class="image">
										<img src="../public/imagenes/el-embarazo_64.png" class="img-circle elevation-2" alt="User Image" style="max-width: 34px; height: auto;">
									</div>
									<p class="mb-0 ms-2"> <!-- mb-0 elimina el margen inferior, ms-2 añade un margen izquierdo -->
										Padron de Gestantes
									</p>
								</div>
							</a>



						</li>


						<li class="nav-header">
							<h6>CERRAR SESIÓN</h6>
						</li>
						<!-- <li class="nav-header">CERRAR SESIÓN</li>	 -->
						<li class="nav-item">

							<a href="../ajax/usuario.php?op=cerrarSesion" class="nav-link">

								<!-- <i class="nav-icon fas fa-cube"></i> -->
								<div class="d-flex align-items-center">
									<div class="image">
										<img src="../public/imagenes/apagar_64.png" class="img-circle elevation-2" alt="User Image" style="max-width: 34px; height: auto;">
									</div>
									<p class="mb-0 ms-2"> <!-- mb-0 elimina el margen inferior, ms-2 añade un margen izquierdo -->
										Salir
									</p>
								</div>


							</a>

						</li>

					</ul>

				</nav>

				<!-- /.sidebar-menu -->

			</div>

			<!-- /.sidebar -->

		</aside>