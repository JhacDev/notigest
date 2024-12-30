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

							<h1 class=""> Reporte en Power By - <b>PANEL DINAMICO DE GESTANTES A NIVEL DE LA REGION</b></h1>

						</div>

					</div>

				</div>

			</section>

			<section class="content">

				<!-- Default box -->

				<div class="card">

					<div class="card-header">

						<h3 class="card-title">Bienvenido: <b id="nombre_estilo"><i class="fa fa-user"></i> <?php echo $_SESSION["tipousuario"]; ?></b></h3>

					</div>

					<div class="card-body">

						<div class="col-12">

							<section class="content">
							<section>
								<div style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; background: #000;">
									<iframe title="NOTIGEST-DASHBOARD_2024" src="https://app.powerbi.com/view?r=eyJrIjoiZmY0NmJiNTMtZjUzMS00ZjExLWJkOWMtMDYzNDQ1YjNjOGYwIiwidCI6ImVjZjYwNDNjLTZkZmItNGQzYS05ZmYyLTQ3Njk5MjY5NGI2MiJ9" frameborder="0" allowfullscreen="true" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"></iframe>
								</div>
							</section>

							</section>

						</div>

					</div>

				</div>

			</section>

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

		

		<script type="text/javascript" src="scripts/panelAdmin.js"></script>


<?php

}

ob_end_flush();

?>