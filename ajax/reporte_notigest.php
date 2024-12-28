<?php



session_start();



require_once "../modelos/Reporte_Notigest.php";

// require_once "../modelos/Registro.php";





$datos = new Reporte_Notigest();



$numdoc_usuario = $_SESSION['numdoc_usuario'];

$descripcion_red = $_SESSION['red'];

$id_usuario = $_SESSION['id_usuario'];



$id_registro = isset($_POST['id']) ? limpiarCadena($_POST['id']) : "";



$registroId = isset($_GET['id_registro']) ? limpiarCadena($_GET['id_registro']) : "";



$ape_paterno = isset($_POST['ape_paterno']) ? limpiarCadena($_POST['ape_paterno']) : "";



$ape_materno = isset($_POST['ape_materno']) ? limpiarCadena($_POST['ape_materno']) : "";



$nombres = isset($_POST['nombres']) ? limpiarCadena($_POST['nombres']) : "";



$num_documento = isset($_POST['num_documento']) ? limpiarCadena($_POST['num_documento']) : "";



$edad = isset($_POST['edad']) ? limpiarCadena($_POST['edad']) : "";



$cel_gestfamiliar = isset($_POST['cel_gestfamiliar']) ? limpiarCadena($_POST['cel_gestfamiliar']) : "";



$fecha_termino = isset($_POST['fecha_termino']) ? limpiarCadena($_POST['fecha_termino']) : "";



$termino = isset($_POST['termino']) ? limpiarCadena($_POST['termino']) : "";



$lugar_termino = isset($_POST['lugar_termino']) ? limpiarCadena($_POST['lugar_termino']) : "";



$obs_red = isset($_POST['obs_red']) ? limpiarCadena($_POST['obs_red']) : "";



$obs_diresa = isset($_POST['obs_diresa']) ? limpiarCadena($_POST['obs_diresa']) : "";



$responsable_atencion = isset($_POST['responsable_atencion']) ? limpiarCadena($_POST['responsable_atencion']) : "";



switch ($_GET['op']) {

	case 'editar':

		

			$rspta = $datos->editarNotigestRed($id_registro, $fecha_termino, $termino, $lugar_termino, strtoupper($obs_red), strtoupper($obs_diresa));



			$respuesta = ['status' => 200, 'mensaje' => 'actualizado'];



			echo json_encode($respuesta);



		break;

		/*========================================================================

	=            Caso para listar el reporte general del notigest            =

	========================================================================*/

	case 'rptgeneralnotigest':

		$rspta = $datos->listarRptGeneralNotigestDiresa();

		$data = array();



		while ($reg = $rspta->fetch_object()) {

			$data[] = array(

				"0"	 =>	'<button class=" ms-4 btn btn-danger btn-xs" onclick="Eliminar(' . $reg->id_registro . ')"><i class="fas fa-window-close"></i></button>',

				"1"	 =>	$reg->red,

				"2"	 =>	$reg->microred,

				"3"	 =>	$reg->cod_ipress,

				"4"	 =>	$reg->ipress,

				"5"	 =>	$reg->categoria,

				"6"	 =>	$reg->se,

				"7"	 =>	$reg->fecha_atencion,

				"8"  =>	$reg->ape_paterno,

				"9"	 =>	$reg->ape_materno,

				"10" =>	$reg->nombres,

				"11" =>	$reg->num_documento,

				"12" =>	$reg->fecha_nacimiento,

				"13" =>	$reg->edad,

				"14" =>	$reg->fum,

				"15" =>	$reg->fpp,

				"16" =>	$reg->eg_captada,

				"17" =>	$reg->cel_gestfamiliar,

				"18" =>	$reg->departamento,

				"19" =>	$reg->provincia,

				"20" =>	$reg->distrito,

				"21"=> $reg->centro_poblado,

				"22" =>	$reg->altitud,

				"23" =>	$reg->direccion,

				"24" =>	$reg->hb_ajustado,

				"25" =>	$reg->hb_altitud,

				"26" =>	$reg->grupo_sanguineo,

				"27" =>	$reg->factor_rh,

				"28" =>	$reg->factor_riesgo,

				"29" =>	$reg->tamizaje_vif,

				"30" =>	$reg->eg_actual,

				"31" =>	$reg->fecha_termino,

				"32" =>	$reg->termino,

				"33" =>	$reg->lugar_termino,

				"34" =>	$reg->obs_red,

				"35" =>	$reg->obs_diresa,

				"36" =>	$reg->numdoc_usuario,

				"37" =>	$reg->apenom_usuario,

				"38" =>	$reg->numtele_usuario



			);

		}

		$results = array(

			"sEcho" => 1,

			"iTotalRecords" => count($data),

			"iTotalDisplayRecords" => count($data),

			"aaData" => $data

		);



		echo json_encode($results);

		break;



		/*========================================================================

	=            Caso para listar el reporte del notigest por Red           =

	========================================================================*/

	case 'rptnotigestred':

		$rspta = $datos->listarRptNotigestRed($descripcion_red);

		$data = array();



		while ($reg = $rspta->fetch_object()) {

			$data[] = array(

				"0"	 =>	'<button class=" ms-4 btn btn-success btn-xs" onclick="Mostrar(' . $reg->id_registro . ')"><i class="fas fa-pencil-alt"></i></button>',

				"1"	 =>	$reg->red,

				"2"	 =>	$reg->microred,

				"3"	 =>	$reg->cod_ipress,

				"4"	 =>	$reg->ipress,

				"5"	 =>	$reg->categoria,

				"6"	 =>	$reg->se,

				"7"	 =>	$reg->fecha_atencion,

				"8"  =>	$reg->ape_paterno,

				"9"	 =>	$reg->ape_materno,

				"10" =>	$reg->nombres,

				"11" =>	$reg->num_documento,

				"12" =>	$reg->fecha_nacimiento,

				"13" =>	$reg->edad,

				"14" =>	$reg->fum,

				"15" =>	$reg->fpp,

				"16" =>	$reg->eg_captada,

				"17" =>	$reg->cel_gestfamiliar,

				"18" =>	$reg->departamento,

				"19" =>	$reg->provincia,

				"20" =>	$reg->distrito,

				"21"=> $reg->centro_poblado,

				"22" =>	$reg->altitud,

				"23" =>	$reg->direccion,

				"24" =>	$reg->hb_ajustado,

				"25" =>	$reg->hb_altitud,

				"26" =>	$reg->grupo_sanguineo,

				"27" =>	$reg->factor_rh,

				"28" =>	$reg->factor_riesgo,

				"29" =>	$reg->tamizaje_vif,

				"30" =>	$reg->eg_actual,

				"31" =>	$reg->fecha_termino,

				"32" =>	$reg->termino,

				"33" =>	$reg->lugar_termino,

				"34" =>	$reg->obs_red,

				"35" =>	$reg->obs_diresa,

				"36" =>	$reg->numdoc_usuario,

				"37" =>	$reg->apenom_usuario,

				"38" =>	$reg->numtele_usuario

			);

		}

		$results = array(

			"sEcho" => 1,

			"iTotalRecords" => count($data),

			"iTotalDisplayRecords" => count($data),

			"aaData" => $data

		);



		echo json_encode($results);

		break;



		/*  CASO PARA ELIMNAR REGISTRO */

	case 'delete':

		$resp = $datos->EliminarRegistro($id_registro);

		echo json_encode($resp);

		break;









	/*=========================================================



	=            Caso para selecccionar el termino            =



	=========================================================*/



	case 'select_termino':



		echo '<option value = 0>SELECCIONE</option>



	<option value = "ABORTO">ABORTO</option>



	<option value = "PARTO">PARTO</option>



	<option value = "CESAREA">CESAREA</option>';



		break;



	/*==================================================================



	=            Caso para selecccionar el lugar de termino            =



	==================================================================*/



	case 'select_lugartermino':



		echo '<option value = 0>SELECCIONE</option>



	<option value = "INSTITUCIONAL">INSTITUCIONAL</option>



	<option value = "DOMICILIARIO">DOMICILIARIO</option>



	<option value = "PRIVADO">PRIVADO</option>';



		break;

	/*==================================================



	=            Caso para mostrar registro            =



	==================================================*/



	case 'mostrarRed':



		$rspta = $datos->mostrarNotigest($registroId);



		echo json_encode($rspta);



		break;





}

